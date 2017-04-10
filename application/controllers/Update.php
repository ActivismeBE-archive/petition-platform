<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Petition update controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Update extends MY_Controller
{
    public $user        = []; /** @var array $user          The authencated user data.  */
    public $permissions = []; /** @var array $permissions   The authencated permissions data. */
    public $abilities   = []; /** @var array $abilities     The authencated abilities data. */

    /**
     * Update constructor
     *
     * @return void|null|int
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['form_validation', 'session', 'pagination', 'paginator']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
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

    /**
     * Show the updates for a petition.
     *
     * @url:see('GET|HEAD', 'http://www.petities.activisme.be/update/{petitionId}')
     * @return Response|Blade view
     */
    public function index()
    {
        $petitionId       = $this->security->xss_clean($this->uri->segment(3));
        $data['petition'] = Petitions::with(['comments', 'creator', 'updates'])->find($petitionId);

        if ((int) count($data['petition']) === 0) {
            $this->session->set_flashdata('class', 'alert alert-warning');
            $this->session->set_flashdata('message', 'Er is geen petitie gevonden met de id #'. $petitionId);

            return redirect($_SERVER['HTTP_REFERER']);
        }

        $data['title'] = $data['petition']->title;

        // Paginate results.
        $this->pagination->initialize($this->paginator->relation(base_url('manifest/show/' . $data['petition']->id), $data['petition']->updates()->count(), 4, 4));
        $data['updates']      = $data['petition']->comments()->skip($this->input->get('page'))->take(4)->get();
        $data['updates_link'] = $this->pagination->create_links();

        return $this->blade->render('petitions/updates', $data);
    }

    /**
     * Store a new update for a petition in the database.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/update/store')
     * @return Redirect|Response
     */
    public function insert()
    {
        $this->form_validation->set_rules('title', 'Title', 'trim|required');
        $this->form_validation->set_rules('description', 'Beschrijving', 'trim|required');

        if ($this->form_validation->run() === false) { // Form validation fails.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden de update niet registreren.');

            return redirect($_SERVER['HTTP_REFERER']);
        }

        $petitionId = $this->security->xss_clean($this->input->post('id'));

        // No validation errors found. So move on with the logic.
        $input['author_id']   = $this->user['id'];
        $input['title']       = $this->input->post('title');
        $input['description'] = $this->input->post('description');

        // Database operations.
        $MySQL['create'] = Updates::create($this->security->xss_clean($input));
        $MySQL['assign'] = Petitions::find($petitionId)->updates()->attach($MySQL['create']->id);

        if ($MySQL['assign'] && $MySQL['create']) { // Rel assign and input >>> OK
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De update is ingevoegd bij uw petitie');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Show a specific update for a petition.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/update/petitionId')
     * @return Blade view | Response.
     */
    public function show()
    {
        $petitionId = $this->security->xss_clean($this->uri->segment(3));
        $data['petition'] = Petitions::find($petitionId);

        if ((int) count($data['petition']) === 0) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Wij konden geen petitie update vinden met de id #' . $petitionId);
        }

        return $this->blade->render('petitions/show', $data);
    }

    /**
     * Delete a update from a petition.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/update/delete/{petition}/{update}')
     * @return Response
     */
    public function delete()
    {
        $param['petition'] = $this->uri->segment(3);
        $param['update']   = $this->uri->segment(4);

        $this->security->xss_clean($param);

        // Database handlings.
        $MySQL['unassign'] = Petitions::find($param['petition'])->updates()->detach($param['update']);
        $MySQL['delete']   = Updates::find($param['update'])->delete();

        if ($MySQL['unassign'] && $MySQL['delete']) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De petitie update is verwijderd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
