<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class inf_principal extends CI_Controller {

	public function index()
	{
		$this->load->view('inf/principal');
	}
}
