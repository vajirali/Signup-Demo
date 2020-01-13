<?php 
class Signup_model extends CI_Model{
	
	public function __construct() {
		parent::__construct();
	}
	
	public function add_update($data, $id = ""){
		if($id == ''){
			$this->db->insert('user',$data);
		}else{
			$this->db->where('id',$id);
			$this->db->update('user',$data);
		}
		return;
	}
	
	public function getData($id = ''){
		$this->db->select('*');
		$this->db->from('user');
		if($id != ''){
			$this->db->where('id',$id);
		}
		return $this->db->get()->result_array();
	}
	
	public function delete($id){
		$this->db->where('id',$id);
		$this->db->delete('user');
		return;
	}
}
?>