<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Soften_Water extends REST_Controller 
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
			'mtr_std_in_acid' => $this->post('mtr_std_in_acid'),
			'mtr_std_in_caustic' => $this->post('mtr_std_in_caustic'),
			'mtr_std_in_hotwaterGen' => $this->post('mtr_std_in_hotwaterGen'),
			'mtr_std_on_hotwaterGen'	=> $this->post('mtr_std_on_hotwaterGen'),
			'mtr_std_reject_onWtrGen' => $this->post('mtr_std_reject_onWtrGen'),
			'mtr_std_back_washSoften' => $this->post('mtr_std_back_washSoften'),
			'mtr_std_on_waterSealTank' => $this->post('mtr_std_on_waterSealTank'),
			'regenerator' => $this->post('regenerator'),
			'level_soften_water' => $this->post('level_soften_water'),
			'flow' => $this->post('flow'),
			'pres_input_rawWater' => $this->post('pres_input_rawWater'),
			'pres_send_filter' => $this->post('pres_send_filter'),
			'pres_carbon_filter' => $this->post('pres_carbon_filter'),
			'pres_softener_lama' => $this->post('pres_softener_lama'),
			'pres_input_softenerBaru' => $this->post('pres_input_softenerBaru'),
			'pres_filter_softenTank' => $this->post('pres_filter_softenTank'),
			'check_level_chlorine' => $this->post('check_level_chlorine'),
			'check_level_garam' => $this->post('check_level_garam'),
			'check_hsl_hardness' => $this->post('check_hsl_hardness'),
			'check_hsl_chlorine' => $this->post('check_hsl_chlorine'),
			'check_level_flowChlorine' => $this->post('check_level_flowChlorine'),
			'check_hasil_conductivity' => $this->post('check_hasil_conductivity'),
			'check_kadaluarsa' => $this->post('check_kadaluarsa'),
			'check_regeneration_newSoftener' => $this->post('check_regeneration_newSoftener'),
			'leaking_test' => $this->post('leaking_test'),
			'pres_pump_production' => $this->post('pres_pump_production'),
			'colour_water_tankRawWater' => $this->post('colour_water_tankRawWater'),
			'autofill_raw_water' => $this->post('autofill_raw_water'),
			'pump_feed_transfer' => $this->post('pump_feed_transfer'),
			'emergency_eye_doorWorkshop' => $this->post('emergency_eye_doorWorkshop'),
			'user_submit' => $this->post('user_submit')
		];

		if ( $this->mForm->inputSoftenWater($data) > 0 ){
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