<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Nitrogen_Generator extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_model', 'mForm');
	}

	public function index_post()
	{

		$data = [
			'form_id' => $this->post('form_id'),
			'purity' => $this->post('purity'),
			'pressure' => $this->post('pressure'),
			'dewpoint' => $this->post('dewpoint'),
			'running_hours'	=> $this->post('running_hours'),
			'pressure_Tank_5000' => $this->post('pressure_Tank_5000'),
			'pressure_Tank_2000' => $this->post('pressure_Tank_2000'),
			'pressure_out_prv' => $this->post('pressure_out_prv'),
			'user_submit' => $this->post('user_submit')
		];

		if ( $this->mForm->inputNitrogenGen($data) > 0 ){
			$this->response([
                    'status' => true,
                    'message' => 'new data has been created!'
                ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'failed to create new data'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}

	}
}