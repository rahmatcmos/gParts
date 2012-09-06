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

    public function year()
    {
        $this->db->select("p.jenis_pesan, MONTH(p.tgl_pesan) bulan, sum(ps.jml) jml");
        $this->db->join('pesan p', 'p.kd_pesan = ps.kd_pesan', 'left');
        $this->db->join('part', 'part.kd_part = ps.kd_part', 'left');
        $this->db->where_in('p.jenis_pesan', array('tambah','ambil'));
        $this->db->group_by(array('MONTH(p.tgl_pesan)', 'p.jenis_pesan'));
        $query = $this->db->get('part_pesan ps');
        $reports = $query->result();
        $data = array();
        $xml = '<chart>';
        foreach ($reports as $report) {
            $jenis_pesan = $report->jenis_pesan;
            $jml = array();
            for ($i=1; $i <= 12; $i++) { 
                if ($report->bulan == $i) {
                    array_push($jml, (int)  $report->jml);
                } else {
                    array_push($jml, 0);
                }
            }
            $qty = implode(',', $jml);
            $xml .= 
            "<series>
                <name>$jenis_pesan</name>
                <data>$qty</data>
            </series>"
            ;
        }
        $xml .= '</chart>';

        header('Content-type: text/xml');
        echo $xml;
        exit;
    }

}

/* End of file report.php */
/* Location: ./application/controllers/report.php */