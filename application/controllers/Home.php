<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index() {
		$data = array(
			'title' => "General Dashboard"
		);
		$this->load->view('login', $data);
	}

	public function auth_login(){
		$data = array(
			'title' => "Login"
		);
		$this->load->view('login',$data);
	}

	public function login_aksi(){
		$this->load->view('index');
	}
}
