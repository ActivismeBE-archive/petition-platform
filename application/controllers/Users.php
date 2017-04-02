<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public $user        = []; /** */
    public $abilities   = []; /** @var array $abilities    The ablities for the authencated user. */
    public $permissions = []; /** @var array $permissions  The permissions for the authencated user.  */

    /**
     * Users constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library(['session', 'blade', 'form_validation', 'pagination', 'paginator']);
        $this->load->helper(['url']);

        $this->user        = $this->session->userdata('user');
        $this->abilities   = $this->session->userdata('abilities');
        $this->permissions = $this->session->userdata('permissions');
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
     * Get the backend index for the login management.
     *
     * @see:url('GYET|HEAD', 'http://www.petities.activisme.be/users')
     * @return Blade view
     */
    public function index()
    {
        $data['title'] = 'Loginbeheer';
        $data['db_users'] = new Authencate;

        // Users pagination.
        $this->pagination->initialize($this->paginator->relation(base_url('users'), count($data['db_users']->all()), 3, 3));
        $data['users']      = $data['db_users']->skip($this->input->get('page'))->take(15)->get();
        $data['users_link'] = $this->pagination->create_links();

        return $this->blade->render('users/index', $data);
    }

    /**
     * Search for a user in the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/users/search')
     * @return Blade view
     */
    public function search()
    {
        $term = $this->security->xss_clean($this->input->get('term'));

        $data['title'] = 'Zoekresultaten voor' . $term;
        $data['users'] = Authencate::where('name', 'LIKE', '%' . $term . '%')
            ->orWhere('username', 'LIKE', '%' . $term . '%')
            ->orWhere('email', 'LIKE', '%' . $term . '%')
            ->get();

        $this->blade->render('users/index', $data);
    }

    /**
     * Show a the specific user data for a account.
     *
     * @see:url('GET|HEAD, 'http://www.petities.activisme.be/users/show/{userId}')
     * @return Response|Blade view
     */
    public function show()
    {
        $userId = $this->security->xss_clean($this->uri->segment(3));

        $data['user']  = Authencate::find($userId);
        $data['title'] = 'Profiel: ' . $data['user']->name . '(' . $data['user']->username . ')';

        if ((int) count($data['user']) === 0) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'Wij konden geen gebruiker vinden met de id #' . $userId);

            return redirect($_SERVER['HTTP_REFERER']);
        }

        return $this->blade->render('users/show', $data);
    }

	/**
	 * Block a user in the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/users/block/{userId}')
     * @return Response|Redirect
	 */
    public function block()
	{
		$this->form_validation->set_rules('reason', 'Rede blokkering', 'trim|required');

		if ($this->form_validation->run() === false) { // Validation errors.
            $this->session->set_flashdata('class', 'alert alert-danger');
            $this->session->set_flashdata('message', 'Wij konden de blokkering niet verwerken.');

            return redirect(base_url('users')); // Validation error so move to the index page.
        }

        // No validation errors move on with our logic.
        $param['userid'] = $this->security->xss_clean($this->uri->segment(3));

		$db['user']   = Authencate::find($param['userId']);
		$db['reason'] = Ban::create($this->security->xss_clean($this->input->post('reason')));

		if ($db['blocked'] && $db['reason']) { // The user is banned.
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', '');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

	/**
	 * Unblock a user in the system.
	 *
	 * @see:url('GET|HEAD', 'http://www.activisme.be/users/unblock/{userId}')
	 * @return Response|redirect
	 */
	public function unblock()
	{
		$param['userId'] = $this->security->xss_clean($this->uri->segment(3));
		$db['user']      = Authencate::find($param['userId']);

		if ($db['user']->update(['blocked' => 'N'])) { // User is unblocked in the system.
			$this->session->set_flashdata('class', 'alert alert-success');
			$this->session->set_flashdata('message', $db['user']->name . ' is gedeblokkeerd.');
		}

		return redirect($_SERVER['HTTP_REFERER']);
	}

    /**
     * Delete an user account on the system.
     *
     * @see:url('GET|HEAD', 'http://www.petities.activisme.be/users/delete/{userId}')
     * @return Redirect|Response
     */
    public function delete()
    {
        $userId = $this->uri->segment(3);

        if (Authencate::find($this->security->xss_clean($userId))) {
            $this->session->set_flashdata('class', 'alert alert-success');
            $this->session->set_flashdata('message', 'De gebruiker is verwijderd.');
        }

        return redirect($_SERVER['HTTP_REFERER']);
    }
}
