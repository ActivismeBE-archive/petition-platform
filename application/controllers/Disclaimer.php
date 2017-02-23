<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Disclaimer controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Disclaimer extends MY_Controller
{
    public $user        = [];   /** @var array $user         The userdata about the authencated user.  */
    public $permissions = [];   /** @var array $permissions  The authencated user permissions.         */
    public $abilities   = [];   /** @var array $abilities    The authencated user abilities.           */

    /**
     * Disclaimer constructor
     *
     * @return void|null|int
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->permissions = $this->session->userdata('permissions');
        $this->abilities   = $this->session->userdata('abilities');
    }

    /**
     * Show the disclaimers for the petitions.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/disclaimer')
     * @return blade view.
     */
    public function index()
    {
        $data['title'] = 'Disclaimer';
        return $this->blade->render('disclaimer', $data);
    }
}
