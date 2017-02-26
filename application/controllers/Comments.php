<?php if defined('BASEPATH') OR exit ('No direct script access allowed');

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

        $this->user         = $this->session->userdata('user');
        $this->permissions  = $this->session->userdata('permissions');
        $this->abilities    = $this->session->userdata('abilities');
    }

    /**
     * Insert a new comment for a petition.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/comments/insert/{petitionId}')
     * @return Response|Redirect
     */
    public function insert()
    {
        $this->form_validation->set_rules('Comment', 'Reactie', 'trim|required');

        if ($this->$this->form_validation->run() === false) { // Validation fails.
            $data['title'] = '';
            
            return $this->blade->render('', $data);
        }

        // No validation errors. So move on with the logic.
        $petitionId = $this->security->xss_clean($this->uri->segement(3));

        $data['comment'] = $this->input->post('comment');
        $data['user_id'] = $this->security->xss_clean($this->user['id']);

        $MySQL['insert']   = Comment::create($this->security->xss_clean($data));
        $MySQL['relation'] = Petitions::find($petitionId)->comments()->attach($MySQL['insert']->id);

        if ($MySQL['insert'] && $MySQL['relation']) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw reactie is toegevoegd.');
        }

        return redirect(base_url('manifest/show/' . $petitionId));
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
            $data['title'] = '';

            return $this->blade->render('', $data);
        }

        return redirect("");
    }
}
