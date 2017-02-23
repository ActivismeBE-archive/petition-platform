<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Authencation controller.
 *
 * @author    Tim Joosten   <Topairy@gmail.com>
 * @copyright Activisme-BE  <info@activisme.be>
 * @license:  MIT license
 * @since     2017
 * @package   Petitions
 */
class Auth extends CI_Controller
{
    public $user        = [];   /** @var array $user         The userdata about the authencated user.  */
    public $permissions = [];   /** @var array $permissions  The authencated user permissions.         */
    public $abilities   = [];   /** @var array $abilities    The authencated user abilities.           */

    /**
     * Authencation constructor.
     *
     * @return void|int|null
     */
	public function __construct()
	{
        parent::__construct();
        $this->load->library(['session', 'form_validation']);
        $this->load->helper(['url']);

        $this->user         = $this->session->userdata('user');
        $this->permissions  = $this->session->userdata('permissions');
        $this->abilities    = $this->session->userdata('abilities');
	}

    /**
     * Verify the user login against the database.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/auth/verify')
     * @return bool
     */
	public function verify()
	{
        $this->form_validation->set_rules('email', 'email', 'trim|required');
        $this->form_validation->set_rules('password', 'Wachtwoord', 'trim|required|callback_check_database');

        if ($this->form_validation->run() == false) { // Validation fails.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden het authencatie verzoek niet verwerken.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
	}

    /**
     * [INTERNAL]: Check the given user input against the database.
     *
     * @param  string $password    The user given password.
     * @return bool
     */
	public function check_database($password)
	{
        $input['email'] = $this->security->xss_clean($this->input->post('email'));
        $MySQL['user']  = Authencate::where('email', $input['email'])
            ->with(['permissions', 'abilities'])
            ->where('blocked', 'N')
            ->where('password', md5($password));

        if ($MySQL['user']->count() === 1) { // User is found with the given credentails
            $authencation = []; // Empty userdata array .
            $permissions  = []; // Empty permissions array.
            $abilities    = []; // Empty abilities array.

            // Build up the permissions and abilites array
            foreach ($MySQL['user']->get() as $user) {
                foreach ($user->permissions as $permission) {
                    array_push($permissions, $permission->name);
                }

                foreach ($user->abilities as $ability) {
                    array_push($abilities, $ability->name);
                }

                $authencation['id']         = $user->id;
                $authencation['name']       = $user->name;
                $authencation['email']      = $user->email;
                $authencation['username']   = $user->username;
            }

            $this->session->set_userdata('user', $authencation);
            $this->session->set_userdata('permissions', $permissions);
            $this->session->set_userdata('abilities', $abilities);

            return true;
        } else { // Usr is not found or the password doesn't match.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wrong credentials given.');

            $this->form_validation->set_message('check_database', 'Foutieve login gegevens.');

            return false;
        }
	}

    /**
     * View for creating a new user.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/auth/register')
     * @return blade view.
     */
    public function register()
    {

    }

    /**
     * Store the new user in the database.
     *
     * @see:url('POST', 'http://www.petities.activisme.be/auth/store')
     * @return redirect
     */
    public function store()
    {
        $this->form_validation->set_rules('username', 'username', 'trim|required');
        $this->form_validation->set_rules('name', 'name', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'trim|required');
        $this->form_validation->set_rules('email', 'password', 'trim|required');

        if ($this->form_validation->run() == false) {
            $data['title'] = 'Registratie';

            return $this->blade->render('', $data);
        }

        // No errors so move on with the logic.
        $input['username'] = $this->input->post('username');
        $input['name']     = $this->input->post('name');
        $input['password'] = md5($this->input->post('password'));
        $input['email']    = $this->input->post('email');
        $input['blocked']  = 'N';
        $input['ban_id']   = 0;

        if (Authencate::create($this->security->xss_clean($input))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Uw account is aangemaakt');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }

    /**
     * Log the user out in the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/auth/logout')
     * @return Redirect
     */
    public function logout()
    {
        $this->session->unset_userdata('user');
        $this->session->unset_userdata('permissions');
        $this->session->unset_userdata('abilities');

        if ($this->session->sess_destroy()) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'U bent nu uitgelogd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
