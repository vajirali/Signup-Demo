<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller  {

	public function __construct() {
       parent::__construct();
    }
	
	public function index()
	{
		$this->load->view('admin/dashboard');
	}
	
	public function do_dash()
	{
		exit('Admin Dashboard second here...');
	}
	
	public function do_dash_parameter($cc = '')
	{
		exit('Admin Dashboard third here...'.$cc);
	}
}
