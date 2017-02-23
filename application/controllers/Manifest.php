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
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/manifest')
     * @return
     */
	public function index()
	{
        $data['title']   = 'Manifest backend';
        $data['recent']  = Petitions::all();
        $data['popular'] = Petitions::all();

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
        $petitionId       = $this->security->xss_clean($this->uri->segment(3));
        $data['petition'] = Petitions::find($petitionId);

        if ((int) count($data['petition']) === 0) { // No petition found.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Er is geen petitie gevonden met de id #'. $petitionId);
        }

        $data['title'] = $data['petition']->title;
        return $this->blade->render('petitions/show', $data);
    }

    /**
     * Create a new petition in the system.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/manifest/create')
     * @return
     */
	public function create()
	{
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
