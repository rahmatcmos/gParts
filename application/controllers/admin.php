<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->check_isvalidated();
	}

	public function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }

    public function index()
    {
    	$view = 'admin/index';
    	$data = array();

    	gview($view,$data);
    }

}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */