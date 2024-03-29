<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Record extends CI_Controller {

    public function __construct()
    {
       parent::__construct();
       $this->check_isvalidated();
       $this->load->model('part_model', 'part');
    }

    public function check_isvalidated()
    {
        if (!$this->session->userdata('validated')) {
            redirect('login');
        }
    }


    public function perbulan($offset = 0)
    {
		$view = 'record/perbulan';

        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        if (empty($tahun) || empty($bulan)) {
            $tahun = date('Y');
            $bulan = date('m');
        }
        //tentukan jumlah perpage boz
        // $perpage = 5;
        // $records = $this->part->recordPerBulan($bulan, $tahun, array('perpage' => $perpage, 'offset' => $offset));
         //load dulu dong library paginationnya
        // $this->load->library('pagination');
        //untuk konfigurasi pagination pake ini
        // $config = array(
        //     'base_url' => base_url() . 'record/perbulan/',
        //     'total_rows' => count($this->part->recordAll()),
        //     'per_page' => $perpage,
        // );

        //inisialisasi pagination & config di atas
        // $this->pagination->initialize($config);
        $records = $this->part->recordPerBulan($bulan, $tahun);
        $data = array('records'=>$records, 'bulan'=>$bulan, 'tahun'=>$tahun);
        // echo json_encode($record);exit;
    	gview($view, $data);

    }

    public function perbulan_print()
    {
        $view = 'record/perbulan_print';

        $tahun = $this->input->get('tahun');
        $bulan = $this->input->get('bulan');

        if (empty($tahun) || empty($bulan)) {
            $tahun = date('Y');
            $bulan = date('m');
        }

        $records = $this->part->recordPerBulan($bulan, $tahun);
        $data = array('records'=>$records, 'bulan'=>$bulan, 'tahun'=>$tahun);
        $this->load->view($view, $data);

    }

    public function peritem()
    {
    	$view = 'record/peritem';
        $part = $this->input->get('part');
        if ($part) {
            $records = $this->part->recordPerItem($part);
        } else {
            $records = $this->part->recordAll();
        }
        $data = array('records'=>$records, 'part'=>$part);
    	gview($view, $data);
    }

    public function peritem_print()
    {
        $view = 'record/peritem_print';
        $part = $this->input->get('part');
        if ($part) {
            $records = $this->part->recordPerItem($part);
        } else {
            $records = $this->part->recordAll();
        }
        $data = array('records'=>$records, 'part'=>$part);
        $this->load->view($view, $data);
    }

}

/* End of file record.php */
/* Location: ./application/controllers/record.php */