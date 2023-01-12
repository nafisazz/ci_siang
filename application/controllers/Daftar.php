<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Daftar extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
		$this->load->library('form_validation');
		$this->load->library('session');
		$this->load->library('upload');
		$this->load->library('pagination');
		$this->load->library('email');
		$this->load->model('model');
	}


	public function index()
    {
        $data['title']='Data Pendaftaran';
        $data['pendaftaran']=$this->model->tampilPendaftaran();
        //$this->load->view('templates/auth_header', $data);
		$this->load->view('admin/daftar', $data);
		//$this->load->view('dashboard/template/footer');
        }
}
?>