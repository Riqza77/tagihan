<?php

class M_tagihan extends CI_Model
{

	public function join()
	{
		$this->db->select('*');
		$this->db->from('tagihan');
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');
		$query =$this->db->get();
		return $query;
	}

	
	public function sc($mul,$sel)
	{
		$this->db->select('*');
		$this->db->from('tagihan')
        ->where('month(tagihan)', date($mul))
        ->where('year(tagihan)', date($sel));
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');

		$query =$this->db->get();
		return $query;
	}

	
	public function join_id($kd)
	{
		$this->db->select('*');
		$this->db->from('tagihan')
        ->where('tagihan.kode', $kd);
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');

		$query =$this->db->get();
		return $query;
	}

	public function get_tagihan($kd, $id)
	{
		$this->db->select('*');
		$this->db->from('tagihan')
        ->where('id_tagihan', $id)
        ->where('tagihan.kode', $kd);
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');

		$query =$this->db->get();
		return $query;
	}

	
	public function sc_id($kd,$mul,$sel)
	{
		$this->db->select('*');
		$this->db->from('tagihan')
        ->where('tagihan.kode', $kd)
        ->where('tagihan>=', $mul)
        ->where('tagihan<=', $sel);
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');

		$query =$this->db->get();
		return $query;
	}


	public function tot()
	{
		$this->db->select('SUM(harga) as total');
		$this->db->from('tagihan')
		->where('status=','Lunas');
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');
		$query =$this->db->get();
		return $query;
	}

	public function tot_bul($mul,$sel)
	{
		$this->db->select('SUM(harga) as total');
		$this->db->from('tagihan')
		->where('status=','Lunas')
        ->where('month(tagihan)', date($mul))
        ->where('year(tagihan)', date($sel));;
		$this->db->join('user', 'tagihan.kode = user.kode', 'LEFT');
		$this->db->join('area', 'user.area = area.id_area', 'LEFT');
		$this->db->join('paket', 'user.paket = paket.id_paket', 'LEFT');
		$query =$this->db->get();
		return $query;
	}

	
}