<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Record extends CI_Controller {

    public function perbulan()
    {
		$view = 'record/perbulan';
    	$data = array();
    	gview($view, $data);
    }

    public function peritem()
    {
    	$view = 'record/peritem';
    	$data = array();
    	gview($view, $data);
    }

}

/* End of file record.php */
/* Location: ./application/controllers/record.php */