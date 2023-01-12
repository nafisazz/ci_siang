<?php 
 
class model extends CI_Model{
	function tampil_data(){
		return $this->db->get('pendaftaran');
	}
}