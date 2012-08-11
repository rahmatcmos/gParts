<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Parts extends CI_Controller {

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
 		
    }

    public function search($offset = 0)
    {
    	$view = 'parts/search';

    	$this->load->model('part_model', 'part');
        //tentukan jumlah perpage boz
        $perpage = 15;
         //load dulu dong library paginationnya
        $this->load->library('pagination');
        //untuk konfigurasi pagination pake ini
        $config = array(
            'base_url' => base_url() . 'parts/search/',
            'total_rows' => $this->part->countAll(),
            'per_page' => $perpage,
        );

        //inisialisasi pagination & config di atas
        $this->pagination->initialize($config);

        $data = array(
            'part_minim'    => $this->part->fetchAll(array('perpage' => $perpage, 'offset' => $offset)),
            'controller'	=> 'parts'
        );

    	gview($view, $data);
    }

    public function tambah()
    {
        $view = 'parts/new';
        $data = array();
        gview($view, $data);
    }

    public function create()
    {
        $part = $this->input->post();

        $this->load->model('part_model', 'part');
        if($this->part->create($part)){  
            echo json_encode(array('saved'=>true)) ;
        } else{  
            echo json_encode(array('saved'=>false)) ;
        }  
        exit;
    }

    public function edit()
    {
    	$view = 'parts/edit';
    	$data = array();
    	gview($view, $data);
    }

    public function update()
    {
        $part = $this->input->post();
        if($part['kd_part'] != null){  
            $this->db->update('part', $part, "kd_part = ".$part['kd_part']);
            echo json_encode(array('saved'=>true)) ;
        } else{  
            echo json_encode(array('saved'=>false)) ;
        }  
        exit;
    }

    // isi typeahead edit part
    public function lookup_part()
    {
        if ($this->input->get('part')) {
            $this->load->model('part_model', 'part');
            $parts = $this->part->lookPart($this->input->get('part'));
            $parts_ok = array();
            foreach ($parts as $row) {
                $kd_part = $row->kd_part;
                $nama_part = $row->nama_part;
                $spec_detail = $row->spec_detail;
                $result = $nama_part." -> ".$spec_detail;
                array_push($parts_ok, $result);
            }
            echo json_encode($parts_ok);
        }
        exit;
    }

    public function get_part()
    {
        $part = $this->input->get('part');
        $parta = explode(' -> ', $part);
        $this->load->model('part_model', 'part');
        $part_detail = $this->part->showPart($parta[0]);
        // show part where        
        echo json_encode($part_detail);
        exit;
    }
    public function get_part_by_kd()
    {
        $kd_part = $this->input->get('kd_part');
        $this->load->model('part_model', 'part');
        $part_detail = $this->part->lookPartByKd($kd_part);
        // echo $this->db->last_query();exit;
        echo json_encode($part_detail);
        exit;
    }


    public function order($offset = 0)
    {
        $view = 'parts/order';

        $this->load->model('part_model', 'part');
        //tentukan jumlah perpage boz
        $perpage = 15;
         //load dulu dong library paginationnya
        $this->load->library('pagination');
        //untuk konfigurasi pagination pake ini
        $config = array(
            'base_url' => base_url() . 'parts/order/',
            'total_rows' => $this->part->countMinimParts(),
            'per_page' => $perpage,
        );

        //inisialisasi pagination & config di atas
        $this->pagination->initialize($config);

        $data = array(
            'part_minim'    => $this->part->fetchMinimParts(array('perpage' => $perpage, 'offset' => $offset))
        );

        gview($view, $data);
    }

    public function cart_count()
    {
        $data= array('cart_isi'      => $this->part->cart_count());
        return json_encode($data);
        exit;
    }


    public function tambah_stock()
    {
        $view = 'parts/tambah_stock';
        $data = array();
        gview($view, $data);
    }

    public function ambil_part()
    {
        $view = 'parts/ambil_stock';
        $data = array();
        gview($view, $data);
    }

    public function ambil_part_save()
    {
        $list_parts = $this->input->post('parts');
        // echo count($list_parts);exit;
        $this->load->model('part_model', 'part');
        if (count($list_parts) > 0) {
            $pesan = array(
                    'tgl_pesan' => date('Y-m-d H:i:s'),
                    'jenis_pesan'  => 'ambil',
                );
            $this->db->insert('pesan', $pesan); 
            $kd_pesan = $this->db->insert_id();
            $save_item = array();
            foreach ($list_parts as $item) {
                $part = explode(' -> ', $item['nama_part']);
                $nama_part = trim($part[0]);
                $spec_detail = trim($part[1]);
                $qty = $item['qty'];

                $this->db->select('kd_part,jml_stok');
                $query = $this->db->get_where('part', array('nama_part'=>$nama_part, 'spec_detail'=> $spec_detail));
                $part = $query->row();

                $stok_lama = $part->jml_stok;
                $stok_baru = $stok_lama - $qty;

                $part_pesan = array(
                   'kd_pesan' => $kd_pesan,
                   'kd_part' => $part->kd_part,
                   'jml' => $qty,
                   
                );
                $this->db->insert('part_pesan', $part_pesan); 

                $update = array(
                    'jml_stok' => $stok_baru
                );

                $this->db->where('kd_part', $part->kd_part);  
                $this->db->update('part', $update);
                
            }
            echo json_encode(array('result'=>TRUE));
        } else {
            echo json_encode(array('result'=>FALSE));
        }
    }
}

/* End of file parts.php */
/* Location: ./application/controllers/parts.php */