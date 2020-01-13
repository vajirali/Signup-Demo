<?php
class Signup extends CI_Controller{
	
	public function __construct() {
		parent::__construct();
		$this->load->model('signup_model');
	}
  
  
	public function add($id = ''){
		$data['title'] = 'Signup';
		if($this->input->post('btn_submit') == 1){
			$data_i = $this->input->post();
			// pre($data_i);
			unset($data_i['cpassword']);
			unset($data_i['btn_submit']);
			$data_i['hobby'] = implode(",",$data_i['hobby']);
			if($data_i['password'] == ''){
				unset($data_i['password']);	
			}else{
				$data_i['password'] = md5($data_i['password']);
			}
			
			if(!empty($_FILES["profile"]['name'])){
				//image upload
				$config['upload_path'] = 'uploads/';
				$config['allowed_types'] = 'gif|jpg|png|jpeg';
				$config['max_size'] = '999999999';
				$config['max_width']  = '55555555';
				$config['max_height']  = '3000000';
				$config['file_name'] = time().'_'.$_FILES["profile"]['name'];
				
				$this->load->library('upload', $config);
				if (!$this->upload->do_upload('profile')){
					$this->session->set_flashdata('error',$this->upload->display_errors());
					redirect('signup/add');
					exit();
				}else{
					$data = $this->upload->data();
					$data_i['profile'] = $data['file_name'];
				}
			}
			$this->signup_model->add_update($data_i, $id);
			if($id == ''){
				$this->session->set_flashdata('success','Record Added Successfully.');
			}else{
				$this->session->set_flashdata('success','Record Updated Successfully.');
			}
				redirect('signup/viewall');
		}
		if($id != ''){
			$result = $this->signup_model->getData($id)[0];
			$data['id'] = $result['id'];
			$data['fname'] = $result['fname'];
			$data['lname'] = $result['lname'];
			$data['email'] = $result['email'];
			$data['gender'] = $result['gender'];
			$data['hobby'] = $result['hobby'];
			$data['profile'] = $result['profile'];
		}
		$this->load->view('signup',$data);
	}
	
	public function viewall(){
		$data['title'] = 'View all Records';
		$data['result'] = $this->signup_model->getData();
		$this->load->view('viewall',$data);
	}
	
	public function delete($id){
		$this->signup_model->delete($id);
		$this->session->set_flashdata('success','Record Deleted Successfully.');
		redirect('signup/viewall');
	}
	
	public function uploadimages(){
		$data = array();
		if($this->input->post('btn_submit') == 1){
			$count = count($_FILES["profile"]['name']);
			for($i = 0; $i < $count; $i++){
				if(!empty($_FILES["profile"]['name'][$i])){
					$_FILES['file']['name']     = time().'_'.$_FILES['profile']['name'][$i];
					$_FILES['file']['type']     = $_FILES['profile']['type'][$i];
					$_FILES['file']['tmp_name'] = $_FILES['profile']['tmp_name'][$i];
					$_FILES['file']['error']     = $_FILES['profile']['error'][$i];
					$_FILES['file']['size']     = $_FILES['profile']['size'][$i];
				
					$config['upload_path'] = 'uploads/';
					$config['allowed_types'] = 'gif|jpg|png|jpeg';
					$config['max_size'] = '99999999999';
					$config['max_width']  = '5555555555';
					$config['max_height']  = '300000000';
					
					$this->load->library('upload', $config);
					if (!$this->upload->do_upload('file')){
						echo $this->upload->display_errors();
						$this->session->set_flashdata('error',$this->upload->display_errors());
						exit('uploading error');
					}else{
						$data = $this->upload->data();
						$allimages[] = $data['file_name'];
					}
				}
			}
			pre($allimages);
		}else{
			$this->load->view('uploadimages',$data);
		}
	}
}
?>