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
