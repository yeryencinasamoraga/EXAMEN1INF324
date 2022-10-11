<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class index_principal extends CI_Controller {

	public function index()
	{
		$this->load->view('index_principal');
	}
}
