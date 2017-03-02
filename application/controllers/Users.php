<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends MY_Controller
{
    public $user        = []; /** */
    public $abilities   = []; /** */
    public $permissions = []; /** @var array $permissions  The permissions for the authencated user.  */

    /**
     * Users constructor.
     *
     * @return int|void|null
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->library():
        $this->load->helpder();

        $this->user        =
        $this->abilities   =
        $this->permissions =
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

    public function index()
    {

    }

    public function status()
    {
    }

    public function delete()
    {

    }
}
