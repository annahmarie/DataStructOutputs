<?php
class BST_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}

	public function isdbempty()
	{
		$query = $this->db->get('tblnumberlist');
		$data = $query->result_array();
		if (empty($data))
		{
			 return true;
		}
		else
		{
			return false;
		}

	}

	public function insertfirstinputtodb($input)
	{
		$data = array (
			'value' => $input,
			'parentID' => 0,
			'side' => "none"
			);

		return $this->db->insert('tblnumberlist', $data);

	}

	public function insertinputtodb($input, $root, $side)
	{
		$query = $this->db->get_where('tblnumberlist', array('value'=> $root));
		$data = $query->row_array();
		$parentID = $data['ID'];
		$data = array (
			'value' => $input,
			'parentID' => $parentID,
			'side' => $side
			);

		return $this->db->insert('tblnumberlist', $data);

	}

	public function getrootnode()
	{
		$query = $this->db->get_where('tblnumberlist', array('parentID'=>0));
		$data = $query->row_array();

		return $data;

	}

	public function isparentchildless($root, $side)
	{
		$query = $this->db->get_where('tblnumberlist', array('value'=>$root));
		$data = $query->row_array();
		$ID = $data['ID'];
		$query = $this->db->get_where('tblnumberlist', array('parentID'=>$ID, 'side'=>$side));
		$data = $query->row_array();

		if (empty($data))
		{
			 return true;
		}

		else
		{
			 return $data;
		}


	}

	
	
}