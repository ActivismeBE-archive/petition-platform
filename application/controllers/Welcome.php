<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Welcome controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Welcome extends MY_Controller
{
    public $user        = [];   /** @var array $user         The userdata about the authencated user.  */
    public $permissions = [];   /** @var array $permissions  The authencated user permissions.         */
    public $abilities   = [];   /** @var array $abilities    The authencated user abilities.           */

    /**
     * Welcome constructor
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['blade', 'session']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
    }

    /**
     * The front page for the activismeBE petitions.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be')
     * @return blade view.
     */
	public function index()
	{
        $data['title']     = 'Petities';
        $data['petitions'] = Petitions::take(4)->get();

        return $this->blade->render('home', $data);
	}
}
