<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Part_model extends CI_Model { 

	public function __construct()
	{
	   parent::__construct();
	   $this->table_name = 'part';
	}

	public function deletePart($kd_part)
	{
		$delete = $this->db->delete($this->table_name, array('kd_part' => $kd_part)); 
		return $delete;
	}

	public function countAll($pencarian="", $by="")
	{
		$this->db->from($this->table_name);
		$this->db->order_by('zone','asc');
		if (($pencarian != '') || ($by != '')) {
			if ($by == '') {
				$by = 'nama_part';
				$this->db->like($by, $pencarian);
			} else if ($by == 'zone') {
				$this->db->where($by, $pencarian);
			} else {
				$this->db->like($by, $pencarian);
			}
			
		}
		// return $this->db->count_all($this->table_name);
		return $this->db->count_all_results();
	}

	public function fetchAll($limit = array(), $pencarian ="", $by ="")
	{       

		if (($pencarian != '') || ($by != '')) {
			if ($by == '') {
				$by = 'nama_part';
				$this->db->like($by, $pencarian);
			} else if ($by == 'zone') {
				$this->db->where($by, $pencarian);
			} else {
				$this->db->like($by, $pencarian);
			}
		}

		$this->db->order_by('zone','asc');
		$this->db->select('*');

		if ($limit == null) {
			$query = $this->db->get($this->table_name);
		} else {
			$query = $this->db->get($this->table_name, $limit['perpage'], $limit['offset']);
		}
		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
	}

	public function fetchMinimParts($limit = array(), $pencarian = "", $by = "")
	{

        if (($pencarian != '') || ($by != '')) {
			if ($by == '') {
				$by = 'nama_part';
				$this->db->like($by, $pencarian);
			} else if ($by == 'zone') {
				$this->db->where($by, $pencarian);
			} else {
				$this->db->like($by, $pencarian);
			}
		}

		$this->db->select('*');
		$this->db->order_by('zone','asc');
		$this->db->where('jml_stok < jml_min');
		if (($pencarian != '') || ($by != '')) {
			if ($by == '') {
				$by = 'nama_part';
				$this->db->like($by, $pencarian);
			} else if ($by == 'zone') {
				$this->db->where($by, $pencarian);
			} else {
				$this->db->like($by, $pencarian);
			}
		}
		if ($limit == null) {
			$query = $this->db->get($this->table_name);
		} else {
			$query = $this->db->get($this->table_name, $limit['perpage'], $limit['offset']);
		}

		if ($query->num_rows() > 0) {
			return $query->result();
		} else {
			return 0;
		}
		
	}

	public function countMinimParts($pencarian="", $by="")
	{

		$this->db->select('kd_part,nama_part,spec_detail,zone,lokasi_rak,jml_min,sat_jml_min,jml_stok,sat_jml_stok');
		$this->db->from($this->table_name);
		$this->db->order_by('zone','asc');
		$this->db->where('jml_stok < jml_min');
		if (($pencarian != '') || ($by != '')) {
			if ($by == '') {
				$by = 'nama_part';
				$this->db->like($by, $pencarian);
			} else if ($by == 'zone') {
				$this->db->where($by, $pencarian);
			} else {
				$this->db->like($by, $pencarian);
			}
		}
		return $this->db->count_all_results();
	}

	public function fetch($kode)
	{
		$this->db->where('id', $kode);  
	  	$query = $this->db->get($this->table_name);  
	  	if($query->num_rows() > 0){  
	   		return $query->row();  
	  	} else{  
	   		return null;  
	  	}  
	}

	public function update($id, $data) {
		$this->db->where('id', "$id");  
		$this->db->update($this->table_name, $data);  
		if($this->db->affected_rows() > 0){  
			return true;  
		}  
		else{  
			return false;  
		}  
	}

	public function create($data)
	 {  
	 // 	$sql="select kd_part from part order by kd_part desc";
		// $q=mysql_query($sql);
		// $r=mysql_fetch_assoc($q);
		// $urut=$r['kd_part'];
		// $urut=substr($urut,-5,5);
		// $urut++;
		// $s=strlen($urut);
		// if($s==1)
		// {
		// 	$urut="0000".$urut;
		// 	$kdp=$urut;
		// }
		// elseif($s==2)
		// {
		// 	$urut="000".$urut;
		// 	$kdp=$urut;
		// }elseif($s==3)
		// {
		// 	$kdp="00".$urut;
		// }elseif($s==4)
		// {
		// 	$kdp="0".$urut;
		// }elseif($s==0)
		// {
		// 	$kdp=$th."00001";
		// }

		// $data['kd_part'] = $kdp;
	 	$this->db->insert($this->table_name, $data);  
	 	if($this->db->affected_rows() > 0){  
	 		return true;  
	 	} else {  
	 		return false;  
	 	}  
	 } 
	
	function delete($id)
	{  
		$this->db->where('id', $id);  
		$this->db->delete($this->table_name);  
		if($this->db->affected_rows() > 0){  
			return true;  
		}  
		else{  
			return false;  
		}      
	} 

	// type a head
	public function lookPart($part)
	{
		$this->db->select('kd_part, nama_part,spec_detail');
		$this->db->like('nama_part', $part);
		$query = $this->db->get('part');
		$thepart = $query->result();
		return $thepart;
	}

	public function lookPartByKd($kd_part)
	{
		$this->db->select('kd_part, nama_part,spec_detail');
		$this->db->where('kd_part', $kd_part);
		$query = $this->db->get('part');
		$thepart = $query->row();
		return $thepart;
	}

	public function showPart($nama_part) {
		$this->db->select('*');
		$this->db->where('nama_part', $nama_part);
		$query = $this->db->get('part');
		$thepart = $query->row();
		return $thepart;
	}

	public function save_order($kd_part, $jumlah = 0) {
		if ($kd_part) {
			$this->db->select('jml_stok');
			$query = $this->db->get_where('part', array('kd_part'=>"$kd_part"));
			$part = $query->row();
			$stok_lama = (int) $part->jml_stok;

			$data = array(
			   'kd_part' => "$kd_part" ,
			   'jumlah' => $stok_lama + ((int) $jumlah)
			);

			$this->db->update('part', $data); 
		}
	}

	public function ambil_part($nama_part, $spec_detail, $qty)
	{
		$this->db->select('kd_part,jml_stok');
		$query = $this->db->get_where('part', array('nama_part'=>$nama_part, 'spec_detail'=> $spec_detail));
		$part = $query->row();
		$stok_lama = (int) $part->jml_stok;

		$data = array(
			'kd_part'	=> "$kd_part",
			'jumlah'	=> $stok_lama - ((int) $qty)
		);

		$this->db->update('part', $data);
	}

	public function getOrder($kd_order)
	{
		$this->db->select('part.kd_part,nama_part,jml');
		$this->db->join('part_pesan', 'part_pesan.kd_pesan = pesan.kd_pesan', 'left');
		$this->db->join('part', 'part.kd_part = part_pesan.kd_part', 'left');
		$this->db->where('pesan.kd_pesan', $kd_order);
		$this->db->where('pesan.jenis_pesan', 'order');
		$query = $this->db->get('pesan');
		return $query->result();
	}


	public function recordAll()
	{
		$this->db->select('ps.kd_part, part.nama_part, DATE(p.tgl_pesan) tanggal, TIME(p.tgl_pesan) waktu, ps.jml, p.jenis_pesan');
		$this->db->join('pesan p', 'p.kd_pesan = ps.kd_pesan', 'left');
		$this->db->join('part', 'part.kd_part = ps.kd_part');
		$this->db->group_by(array("p.jenis_pesan", "ps.kd_part")); 
		$this->db->where_in('p.jenis_pesan', array('tambah','ambil'));
		$query = $this->db->get('part_pesan ps');
		return $query->result();
	}

	public function recordPerBulan($bulan, $tahun, $limit = array())
	{
		$kriteria = array('MONTH(p.tgl_pesan)'=>$bulan, 'YEAR(p.tgl_pesan)'=>$tahun);

		$this->db->select('ps.kd_part, part.nama_part, DATE(p.tgl_pesan) tanggal, TIME(p.tgl_pesan) waktu, ps.jml, p.jenis_pesan');
		$this->db->join('pesan p', 'p.kd_pesan = ps.kd_pesan', 'left');
		$this->db->join('part', 'part.kd_part = ps.kd_part');
		$this->db->group_by(array("p.jenis_pesan", "ps.kd_part")); 
		$this->db->where($kriteria); 
		$this->db->where_in('p.jenis_pesan', array('tambah','ambil'));
		$query = $this->db->get('part_pesan ps');
		return $query->result();
	}

	public function recordPerItem($nama_part)
	{
		$this->db->select('ps.kd_part, part.nama_part, DATE(p.tgl_pesan) tanggal, TIME(p.tgl_pesan) waktu, ps.jml, p.jenis_pesan');
		$this->db->join('pesan p', 'p.kd_pesan = ps.kd_pesan', 'left');
		$this->db->join('part', 'part.kd_part = ps.kd_part');
		$this->db->group_by(array("p.jenis_pesan", "ps.kd_part")); 
		$this->db->like('part.nama_part', $nama_part);
		$this->db->where_in('p.jenis_pesan', array('tambah','ambil'));
		$query = $this->db->get('part_pesan ps');
		return $query->result();	
	}

}