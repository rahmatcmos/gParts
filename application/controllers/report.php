<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Report extends CI_Controller {

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
        $view = 'report/index';
        $data = array();
    	gview($view, $data);
    }

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */