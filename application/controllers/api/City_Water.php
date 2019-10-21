<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class City_Water extends REST_Controller 
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
			'meter_stand' => $this->post('meter_stand'),
			'pressure' => $this->post('pressure'),
			'mtr_stand_in_warehouse' => $this->post('mtr_stand_in_warehouse'),
			'mtr_stand_in_qc'	=> $this->post('mtr_stand_in_qc'),
			'mtr_stand_in_tmnoffice' => $this->post('mtr_stand_in_tmnoffice'),
			'mtr_stand_in_toilet' => $this->post('mtr_stand_in_toilet'),
			'mtr_stand_in_canteen' => $this->post('mtr_stand_in_canteen'),
			'mtr_stand_eye_shower' => $this->post('mtr_stand_eye_shower'),
			'mtr_stand_in_toilet_utility' => $this->post('mtr_stand_in_toilet_utility'),
			'user_submit' => $this->post('user_submit')
		];

		if ( $this->mForm->inputCityWater($data) > 0 ){
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