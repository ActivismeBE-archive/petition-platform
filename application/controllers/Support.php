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
class Support extends MY_Controller
{
	public $user        = []; /** @var array $user          The authencated user data.  		*/
	public $permissions = []; /** @var array $permissions   The authencated permissions data. 	*/
	public $abilities   = []; /** @var array $abilities     The authencated abilities data. 	*/

	/**
	 * Support constructor.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
        $this->load->library(['form_validation', 'blade', 'session', 'pagination', 'paginator']);
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
     * Display all the support questions.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/support')
     * @return blade view.
     */
    public function index()
    {
        $data['title']      = 'Support';
        $data['categories'] = Category::where('category_module', 'Support')->get();

        if (! in_array('Admin', $this->permissions)) {
            $data['question']   = Question::where('public', '=', 'N')->get();

        } else {
            $data['question']   = Question::all();
        }

        return $this->blade->render('support/index', $data);
    }

    /**
     * Create view for a new petition.
     *
     * @see:url('GET|HEAD', '')
     * @return Blade view.
     */
    public function create()
    {
		$data['title']      = 'Nieuwe support vraag.';
		$data['categories'] = Category::where('category_module', '=', 'support')->get();

		return $this->blade->render('support/create', $data);
    }

    /**
     * Store the new support question.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/support/store')
     * @return Response | Blade view.
     */
    public function store()
    {
        $this->form_validation->set_rules('title', 'Titel', 'trim|required');
        $this->form_validation->set_rules('deszcription', 'Vraag', 'trim|required');

        if ($this->form_validation->run() === false) { // Validation fails
            $data['title'] = 'Nieuwe support vraag';

            return $this->blade->render('support/create', $data);
        }

        // Validation passes. Move on with our logic.
		$input['author_id']   = $this->user['id'];
        $input['title']       = $this->input->post('title');
        $input['description'] = $this->input->post('description');

        $this->security->xss_clean($input);       // NOTE: Sanitize all the inputs.
        $db['create'] = Question::create($input); // NOTE: Support question storage in the db.

        if ($db['create']) { // Support question has been stored.
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw vraag is aangemaakt in het systeem.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Change the status of a support question.
     *
     * @see:url()
     * @return
     */
    public function status()
    {
    	//
    }
}
