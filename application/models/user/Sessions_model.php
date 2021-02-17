<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Sessions_model extends CI_Model
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


	function get_all_sessions()
	{
		$query = $this->db->get('product_sessions');
		return $query->result();
	}


	function get_session_by_id($args1)
	{
		$query = $this->db->get_where('product_sessions', array('id' => $args1));
		return $query->row();
	}
	function get_session_by_session_key($args1)
	{
		$query = $this->db->get_where('product_sessions', array('session_key' => $args1));
		return $query->row();
	}

	function insert_session_data($data)
	{
		$ress = $this->db->insert('product_sessions', $data) ? $this->db->insert_id() : false;
		return $ress;
	}


	function update_session_data($args1, $data)
	{
		$this->db->where('id', $args1);
		return $this->db->update('product_sessions', $data);
	}
}
