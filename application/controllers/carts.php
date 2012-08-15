<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct()
	{
	   parent::__construct();
       // load library buat simpan cart di session_commit()
	   $this->load->library('Part_cart');
	}

    /* masukkan part dalam cart session */
    public function save_cart()
    {
        $id = $this->input->post('kd_part');
        $qty = $this->input->post('jumlah');

        $this->part_cart->add($id, $qty);
        $result['return'] = true;
        echo json_encode($result);
        exit;
    }

    // tampilkan list cart (print)
    public function show_cart()
    {
        if ($this->part_cart->count() > 0) {
            // ambil max kd_pesan
            $this->db->select_max('kd_pesan');
            $query = $this->db->get('pesan');
            $pesan = $query->row();
            // kd_pesan diambil setelah tanggal ex.20120405__
            $kd_pesan_old = substr($pesan->kd_pesan, 8);
            // generate kd_pesan baru (ditambah 1)
            $kd_pesan_new = ((int) $kd_pesan_old) + 1;
            // siapkan variable
            $pesan = array(
                    'kd_pesan' => date('Ymd').$kd_pesan_new, // kd_pesan baru tanggal+kd_pesan
                    'tgl_pesan' => date('Y-m-d H:i:s'),
                    'jenis_pesan'  => 'order',
                );
            // input ke database
            $this->db->insert('pesan', $pesan); 
            // $kd_pesan = $this->db->insert_id();
            $save_item = array();
            // ambil part yang ada di cart
            $items = $this->part_cart->items();
            // loop
            foreach ($items as $kd_part => $qty) {
                // dapatkan informasi tiap part
                $this->db->select('nama_part,spec_detail, jml_stok');
                $query_get = $this->db->get_where('part', array('kd_part'=>$kd_part));
                $row = $query_get->row();

                // set ke variable
                $nama_part = $row->nama_part;
                $spec_detail = $row->spec_detail;
                $stok_lama = $row->jml_stok;
                $stok_baru = $stok_lama + $qty;

                $part_pesan = array(
                   'kd_pesan' => $pesan['kd_pesan'],
                   'kd_part' => $kd_part,
                   'jml' => $qty,
                   
                );
                $this->db->insert('part_pesan', $part_pesan); 

                // $update = array(
                //     'jml_stok' => $stok_baru
                // );
                // $this->db->where('kd_part', $kd_part);  
                // $this->db->update('part', $update);

                // save ke $save_item untuk ditampilkan saat print
                array_push($save_item, array('kd_part'=>$kd_part, 'nama_part' => $nama_part, 'spec_detail'=>$spec_detail, 'qty'=> $qty));
            }
            $show = array(
                'kd_pesan'  => $pesan['kd_pesan'],
                'tgl_pesan' => date("j M Y"),
                'items'     => $save_item
            );
            // clear cart part
            $this->part_cart->clear();
            // tampilkan view tanpa layout
            $this->load->view('carts/show_cart', $show);
        } else {
            // jika tidak ada part di cart list
            echo "<i>No part is ordered</i>, <a href='javascript:void(0)' onclick='window.close()'>Close</a>";
        }
    }

}

/* End of file charts.php */
/* Location: ./application/controllers/charts.php */