<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AuthMiddleware 
{
	protected $controller; 
	protected $ci; 

	public function __construct($controller, $ci)
	{
		$this->controller = $controller; 
		$this->ci         = $ci;

		$this->ci->load->library(['session']);
        $this->ci->load->helper(['url']);
	}

	public function run() 
	{
		if (! $this->ci->session->userdata('user')) {
			return redirect(base_url('auth'));
		}
	}
}