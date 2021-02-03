<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Prints_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function trash_gig($args2)
	{
		$this->db->where('id', $args2);
		$this->db->delete('gigs');
		return true;
	}

	function get_all_designs()
	{
		$query = $this->db->get('designs');
		return $query->result();
	}


	function get_design_by_id($args1)
	{
		$query = $this->db->get_where('designs', array('id' => $args1));
		return $query->row();
	}

	function insert_print_data($data)
	{
		$ress = $this->db->insert('prints', $data) ? $this->db->insert_id() : false;
		return $ress;
	}


	function update_design_data($args1, $data)
	{
		$this->db->where('id', $args1);
		return $this->db->update('designs', $data);
	}
}
