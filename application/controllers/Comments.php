<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Comments controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Comments extends MY_Controller
{
    public $user        = []; /** @var array $user         The authencated user data         */
    public $abilities   = []; /** @var array $abilities    The authencated user permissions. */
    public $permissions = []; /** @var array $permissions  The authencated user permissions  */


    /**
     * Comments constructor
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'form_validation', 'blade']);
        $this->load->helper(['url']);

        $this->user         = $this->session->userdata('user');
        $this->permissions  = $this->session->userdata('permissions');
        $this->abilities    = $this->session->userdata('abilities');
    }

    /**
     * Return the list of middlewares you want to be applied,
     * Here is list of some valid options
     *
     * admin_auth                    // As used below, simplest, will be applied to all
     * someother|except:index,list   // This will be only applied to posts()
     * yet_another_one|only:index    // This will be only applied to index()
     *
     * @return array
     */
    protected function middleware()
    {
        return [];
    }

    public function getId()
    {
        $commentId = $this->security->xss_clean($this->uri->segment(3));
		echo json_encode(Comment::select('id')->find($commentId));
    }

    /**
     * Insert a new comment for a petition.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/insert/{petitionId}')
     * @return Response|Redirect
     */
    public function insert()
    {
        $petitionId = $this->security->xss_clean($this->uri->segment(3));
        $this->form_validation->set_rules('comment', 'Reactie', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation fails.
            $data['petition']  = Petitions::with('signatures')->find($petitionId);
            $data['countries'] = Countries::all();
            $data['cities']    = Cities::all();

            return $this->blade->render('', $data);
        }

        // No validation errors. So move on with the logic.

        $data['comment'] = $this->input->post('comment');

        $MySQL['insert']   = Comment::create($this->security->xss_clean($data));
        $MySQL['relation'] = Petitions::find($petitionId)->comments()->attach($MySQL['insert']->id, [
            'author_id' =>  $this->security->xss_clean($this->user['id'])
        ]);

        if ($MySQL['insert'] && $MySQL['relation']) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw reactie is toegevoegd.');
        }

        return redirect(base_url('manifest/show/' . $petitionId));
    }

    /**
     * React on a petition update.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/update/{type}')
     * @return Redirect|Response
     */
    public function update()
    {
        $commentId = $this->security->xss_clean($this->input->post('id'));
        $this->form_validation->set_rules('comment', 'Reactie', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails. 
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden uw reactie niet aanpassen.');

            return redirect($_SERVER['HTTP_REFERER']);
        } 

        // No validation errors are found. So move on with our logic.
        $input['comment'] = $this->input->post('comment');

        switch ($this->security->xss_clean($this->uri->segment(3))) { // Authorization check in database query's.
            case 'support': // The comment is in the support category. 
                $user = Comment::with(['support'])->find($commentId)->toArray();
                $uuid = $user['support'][0]['pivot']['author_id'];
                break; 
            case 'update': // The comment is in the petition update category. 
                $user = Comment::with(['updates'])->find($commentId)->toArray(); 
                $uuid = $user['updates'][0]['pivot']['author_id'];
                break;
            case 'petition': // The comment is in the petition section.
                $user = Comment::with(['petitions'])->find($commentId)->toArray();
                $uuid = $user['petitions'][0]['pivot']['author_id'];
                break; 
            default:
                return redirect($_SERVER['HTTP_REFERER']);
        }

        if ((int) $uuid === $this->user['id'] || in_array('Admin', $this->permissions)) { // The user is the author or admin.
            if (Comment::find($commentId)->update($this->security->xss_clean($input))) { // Comment has been updated.
                $this->session->set_flashdata('class', 'alert alert-success');
                $this->session->set_flashdata('message', 'Uw reactie is aangepast');
            }
        } else {
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'U hebt niet de machtiging om de reactie te wijzigen');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * React on a support question.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/support/{questionId}')
     * @return Redirect|Response
     */
    public function support()
    {
        $supportId = $this->security->xss_clean($this->uri->segment(3));
        $this->form_validation->set_rules('comment', 'Reactie', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $data['question'] = Question::find($supportId);
            $data['data']     = $data['question']->title;

            return $this->blade->render('support/show', $data);
        }

        // No validation errors are found. Move on with our logic. 
        $comment = $this->input->post('comment');

        $db['insert']   = Comment::crate($this->security->xss_clean($comment)); 
        $db['relation'] = Comment::find($db['insert']->id)->support()->attach($supportId);

        if ($db['insert'] && $db['relation']) { // Record has been created
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw reactie is opgeslagen.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Delete a comment in the database.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/comments/delet/{type}/{commentId}')
     * @return Redirect|Response
     */
    public function delete() 
    {
        $param['type']      = $this->uri->segment(3); 
        $param['commentId'] = $this->uri->segment(4); 

        $this->security->xss_clean($param); // Initialize and stripe the segment. 

        if (Comment::find($param['commentId'])) { // The comment has been found in the system.
            switch ($param['type']) {
                case 'support':
                    $query = Comment::with('support')->find($param['commentId'])->toArray();
                    $user  = $query['support'][0]['pivot']['author_id'];

                    if ((int) $user === $this->user['id'] || in_array('Admin', $this->permissions)) {   // Can delete the comment.
                        $unconnect = Comment::find($param['commentId'])->support()->sync([]);           // Disconnect the comment from the suupport question. 
                        $delete    = Comment::find($param['commentId'])->delete();                      // Delete the comment in the database

                        if ($unconnect && $delete) {                                                    // THe comment has been deleted. 
                            $this->session->set_flashdata('class', 'alert alert-success');
                            $this->session->set_flashdata('message', 'De reactie is verwijderd');
                        }
                    } 

                    break;
                case 'update':
                    $query = Comment::with('updates')->find($param['commentId'])->toArray();
                    $user  = $query['updates'][0]['pivot']['author_id'];

                    if ((int) $user === $this->user['id'] || in_array('Admin', $this->permissions)) {   // Can delete the comment.
                        $unconnect = Comment::find($param['commentId'])->updates()->sync([]);           // Disconnect the comment form the update.
                        $delete    = Comment::find($param['commentId'])->delete();                      // Delete the comment in the database.

                        if ($unconnect && $delete) {                                                    // Check if the record has been deleted. 
                            $this->session->set_flashdata('class', 'alert alert-success');
                            $this->session->set_flashdata('message', 'De reactie is verwijderd');
                        }
                    }

                    break; 
                case 'petition':
                    $query = Comment::with('petitions')->find($param['commentId'])->toArray();
                    $user  = $query['petitions'][0]['pivot']['author_id'];

                    if ((int) $user === $this->user['id'] || in_array('Admin', $this->permissions)) {   // Can delete the comment. 
                        $unconnect = Comment::find($param['commentId'])->petitions()->sync([]);         // Disconnect the comment from the petition. 
                        $delete    = Comment::find($param['commentId'])->delete();                      // Delete the comment in the database. 

                        if ($unconnect && $delete) {                                                    // Check if the unconnect and delete has been done.
                            $this->session->set_flashdata('class', 'alert alert-success');
                            $this->session->set_flashdata('message', 'De reactie is verwijderd');
                        }
                    } 

                    break;
                default:
                    $this->session->set_flashdata('class', 'alert alert-danger');
                    $this->session->set_flashdata('message', 'Wij konden de reactie niet verwijderen');
            }
        }

        return redirect($_SERVER['HTTP_REFERER']); // Redirect back to the previous route. 
    }

    /**
     * Report a comment in the system.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/report/{commentId}')
     * @return Response|Redirect
     */
    public function report()
    {
        $this->form_validation->set_rules('type', 'Type', 'trim|required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation fails.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden de rapportering niet verwerken');

            return redirect($_SERVER['HTTP_REFERER']);
        }

        // No validation errors found. Mo)ve on with the logic.
        $input['reason_id']   = $this->input->post('reason');
        $input['description'] = $this->input->post('description');

        if (Reports::create($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De rapportering is opgeslagen.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
