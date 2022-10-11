<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class qmc_principal extends CI_Controller {

	public function index()
	{
		$this->load->view('qmc/principal');
	}
}
