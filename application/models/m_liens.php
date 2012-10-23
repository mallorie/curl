<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_liens extends CI_Model{
	
        function get_liens(){
		return $this->db->select('*')
			->from('liens')
			->get()
			->result();
		
		
        }
	

	public function create($data)
	{
		$this->db->insert('liens', $data); 
	}
}
