<?php defined('BASEPATH') or exit('No direct script access allowed');

class Report extends MY_Controller
{
    public $user        = [];
    public $abilities   = [];
    public $permissions = [];

    public function __construct()
    {
        parent::__construct();

        $this->user         = $this->session->userdata();
        $this->permissions  = $this->session->userdata();
        $this->abilities    = $this->session->userdata();
    }

    protected function middleware()
    {
        return ['admin'];
    }

    public function index()
    {
        $data['title']          = 'Rapporteringen';
        $data['reportComments'] = '';
        $data['reportUpdates']  = '';

        return $this->blade->render('reports/comments', $data);
    }
}
