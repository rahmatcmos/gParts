<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('validated')) {
            redirect('admin');
        }
    }

	public function index()
    {
    	$view = 'home/index';
        $this->load->model('part_model', 'part');
    	$data = array(
            'part_minim'    => $this->part->fetchMinimParts(),
            'count_part'      => $this->part->countAll(),
            'count_minim_part'    => $this->part->countMinimParts()
        );

    	gview($view,$data);
    }

    public function search($offset = array())
    {
        $view = 'parts/search';

        $this->load->model('part_model', 'part');
        //tentukan jumlah perpage boz
        $perpage = 15;
         //load dulu dong library paginationnya
        $this->load->library('pagination');
        //untuk konfigurasi pagination pake ini
        $config = array(
            'base_url' => base_url() . 'home/search/',
            'total_rows' => $this->part->countAll(),
            'per_page' => $perpage,
        );

        //inisialisasi pagination & config di atas
        $this->pagination->initialize($config);

        $data = array(
            'part_minim'    => $this->part->fetchAll(array('perpage' => $perpage, 'offset' => $offset)),
            'controller'    => 'home'
        );

        gview($view, $data);
    }

}

/* End of file welcome.php */
/* Location: ./application/controllers/home.php */