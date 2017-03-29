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
        $data['categories'] = '';
        $data['question']   = '';

        return $this->blade->render('support/index', $data);
    }
}
