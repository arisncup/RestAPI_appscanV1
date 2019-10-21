<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Nitrogen extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Form_model', 'mForm');
	}

	public function index_post()
	{

		$data = [
			'form_id'				=> $this->post('form_id'),
			'nitrogen_level'		=> $this->post('nitrogen_level'),
			'tank_pressure'			=> $this->post('tank_pressure'),
			'outlet_pressure'		=> $this->post('outlet_pressure'),
			'flowrate_production'	=> $this->post('flowrate_production'),
			'totalizer_production'	=> $this->post('totalizer_production'),
			'cek_kebocoran'			=> $this->post('cek_kebocoran'),
			'supply_nitrogen_qc'	=> $this->post('supply_nitrogen_qc'),
			'user_submit'			=> $this->post('user_submit')
		];

		if ( $this->mForm->inputNitrogen($data) > 0 ){
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