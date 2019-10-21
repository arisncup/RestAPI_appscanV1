<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Ipa_System extends REST_Controller 
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
			'fresh_ethanol_in' => $this->post('fresh_ethanol_in'),
			'fresh_ethanol_out' => $this->post('fresh_ethanol_out'),
			'fresh_ethanol_level' => $this->post('fresh_ethanol_level'),
			'spent_ethanol_in'	=> $this->post('spent_ethanol_in'),
			'spent_ethanol_out' => $this->post('spent_ethanol_out'),
			'spent_ethanol_level' => $this->post('spent_ethanol_level'),
			'leakage' => $this->post('leakage'),
			'user_submit' => $this->post('user_submit')
		];

		if ( $this->mForm->inputIpaSystem($data) > 0 ){
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