<?php defined('BASEPATH') OR exit('No direct script access allowed');

class AdminMiddleware 
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
		if (! in_array('Admin', $this->ci->session->userdata('permissions'))) {
			return redirect($_SERVER['HTTP_REFERER']);
		}
	}
}