<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Petition manifest controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Manifest extends MY_Controller
{
    public $user        = [];   /** @var array $user         The userdata about the authencated user.  */
    public $permissions = [];   /** @var array $permissions  The authencated user permissions.         */
    public $abilities   = [];   /** @var array $abilities    The authencated user abilities.           */

    /**
     * Manifest constructor.
     *
     * @return int|void|null
     */
	public function __construct()
	{
		parent::__construct();
		$this->load->library(['session', 'form_validation', 'blade']);
		$this->load->helper(['url']);

		$this->user        = $this->session->userdata('user');
		$this->permissions = $this->session->userdata('permissions');
		$this->abilities   = $this->session->userdata('abilities');
	}

    /**
     * Display all the petitions in the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/manifest')
     * @return Blade view.
     */
	public function index()
	{
        $data['title']    = 'Manifest backend';
        $data['recent']   = Petitions::all();
        $data['popular']  = Petitions::all();

        if ($this->user) {
            $data['userPetitions'] = Petitions::where('creator_id', $this->user['id'])->get();
        }

        return $this->blade->render('petitions/index', $data);
	}

    /**
     * Show a specific petition.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/manifest/show/{id}')
     * @return
     */
    public function show()
    {
        $petitionId  = $this->security->xss_clean($this->uri->segment(3));
        $relCriteria = function ($query) {
            $query->where('publish', 'Y');
            $query->paginate(15); // NOTE: Ne"eds debugging.
         };

        $data['petition']  = Petitions::with(['signatures' => $relCriteria])->find($petitionId);
        $data['countries'] = Countries::all();
        $data['cities']    = Cities::all();


        if ((int) count($data['petition']) === 0) { // No petition found.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Er is geen petitie gevonden met de id #'. $petitionId);
        }

        $data['title'] = $data['petition']->title;
        return $this->blade->render('petitions/show', $data);
    }

    /**
     * Create a new petition into the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/manifest/create')
     * @return Blade view.
     */
    public function create()
    {
        $data['title']      = 'Nieuwe petitie';
        $data['categories'] = Category::where('category_module', 'petition')->get();

        return $this->blade->render('petitions/create', $data);
    }

    /**
     * Create a new petition in the system.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/manifest/create')
     * @return
     */
	public function store()
	{
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('description', 'Petitie manifest', 'trim|required');
        $this->form_validation->set_rules('category', 'Categorie', 'trim|required');

        if ($this->form_validation->run() === true) { // Validation passes.
            $input['title']       = $this->input->post('title');
            $input['description'] = $this->input->post('description');
            $input['category_id'] = $this->input->post('category');
            $input['creator_id']  = $this->user['id'];

            if (Petitions::create($this->security->xss_clean($input))) { // Data >>> Stored to the database.
                $this->session->set_flashdata('class', 'alert alert-success');
                $this->session->set_flashdata('message', 'Wij hebben de petitie aangemaakt');
            }

            return $this->blade->render('petitions/create');
        }

        $this->session->set_flashdata('class', 'alert alert-danger');
        $this->session->set_flashdata('message', 'Wij konden de petitie niet aanmeken');

        return redirect($_SERVER['HTTP_REFERER']);
	}

    /**
     * Delete a specific petition.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/manifest/delete/{id}')
     * @return Redirect
     */
	public function delete()
	{
        $manifestId = $this->uri->segment(3);

        if (Petition::find($manifestId)->delete()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De petitie is verwijderd');
        }
	}
}
