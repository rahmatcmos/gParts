<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
	   $this->load->library('Part_cart');
	}

    public function save_cart()
    {
        $id = $this->input->post('kd_part');
        $qty = $this->input->post('jumlah');

        $this->part_cart->add($id, $qty);
        $result['return'] = true;
        echo json_encode($result);
        exit;
    }

    public function show_cart()
    {
        if ($this->part_cart->count() > 0) {
            $pesan = array(
                    'tgl_pesan' => date('Y-m-d H:i:s'),
                    'jenis_pesan'  => 'order',
                );
            $this->db->insert('pesan', $pesan); 
            $kd_pesan = $this->db->insert_id();
            $save_item = array();
            $items = $this->part_cart->items();
            foreach ($items as $kd_part => $qty) {
                $this->db->select('nama_part,spec_detail, jml_stok');
                $query_get = $this->db->get_where('part', array('kd_part'=>$kd_part));
                $row = $query_get->row();

                $nama_part = $row->nama_part;
                $spec_detail = $row->spec_detail;
                $stok_lama = $row->jml_stok;
                $stok_baru = $stok_lama + $qty;

                $part_pesan = array(
                   'kd_pesan' => $kd_pesan,
                   'kd_part' => $kd_part,
                   'jml' => $qty,
                   
                );
                $this->db->insert('part_pesan', $part_pesan); 

                $update = array(
                    'jml_stok' => $stok_baru
                );
                $this->db->where('kd_part', $kd_part);  
                $this->db->update('part', $update);
                
                array_push($save_item, array('kd_part'=>$kd_part, 'nama_part' => $nama_part, 'spec_detail'=>$spec_detail, 'qty'=> $qty));
            }
            $show = array(
                'kd_pesan'  => $kd_pesan,
                'tgl_pesan' => date("j M Y"),
                'items'     => $save_item
            );
            $this->part_cart->clear();
            $this->load->view('carts/show_cart', $show);
        } else {
            echo "<i>No part is ordered</i>, <a href='javascript:void(0)' onclick='window.close()'>Close</a>";
        }
    }

}

/* End of file charts.php */
/* Location: ./application/controllers/charts.php */