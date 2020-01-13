<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('login_model');
	}
	
	public function index(){
		if($this->session->userdata('admin_loggedin') == 1){
			redirect('admin/Dashboard');
		}else{
			if($this->input->post('btn_submit') == 1){
				$data_i = $this->input->post();
				$result = $this->login_model->checkLogin($data_i['email'],md5($data_i['password']));
				if($result){
					$this->session->set_userdata('admin_loggedin',1);
					$this->session->set_userdata('admin_userdata',$result[0]['id']);
					redirect('admin/Dashboard');
				}else{
					$this->session->set_flashdata('error','Error! Please try again...');
					redirect('admin/Login/');
				}
			}else{
				$this->load->view('admin/login');
			}
		}
	}
	
	public function logout(){
		$this->session->unset_userdata('admin_loggedin');
		$this->session->unset_userdata('admin_userdata');
		redirect('admin/Login/');
	}
}
