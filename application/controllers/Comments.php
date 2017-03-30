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

        if ($this->form_validation->run() === false) { // Validation fails.s
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
     * React on a petitition update.
     *
     * @see:url()
     * @return
     */
    public function update()
    {

    }

    /**
     * React on a support question.
     *
     * @see:url()
     * @return
     */
    public function support()
    {

    }

    /**
     * Report a comment in the system.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/report/{commentId}')
     * @return
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
