<?php defined('BASEPATH') OR exit('No direct sccript access awwoled');

/**
 * Account controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Account extends MY_Controller
{
    public $user        = [];   /** @var array $user         The userdata about the authencated user.  */
    public $permissions = [];   /** @var array $permissions  The authencated user permissions.         */
    public $abilities   = [];   /** @var array $abilities    The authencated user abilities.           */

    /**
     * Account constructor.
     *
     * @return void|int|null
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade', 'form_validation']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
    }

    /**
     * Delete some account out the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/account/delete/{id}')
     * @return redirect
     */
    public function delete()
    {
        $acountId = $this->security->xss_clean($this->uri->segment(3));

        if ((int) $accountId === $this->user['id']) { // User check before the delete.
            if (Authencate::find($accountId)->delete()) { // User account is deleted.
                $class = "alert alert-success";
                $message = 'Wat jammer :(. Je account is verwijderd. We hopen je snel terug te zien';

                if ($this->user) { // The account is authencated. So delete the session.
                    $this->session->unset_userdata('user');
                    $this->session->unset_userdata('permissions');
                    $this->session->unset_userdata('abilities');
                    $this->session->sess_destroy();
                }
            }
        } else { // Check >>> Fails
            $class   = 'alert alert-danger';
            $message = 'Het account dat je probeerde te verwijderen is niet het uwe.';
        }

        $this->session->set_flashdata('class', $class);
        $this->session->set_flashdata('message', $message);

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
