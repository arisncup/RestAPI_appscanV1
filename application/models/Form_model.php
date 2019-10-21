<?php

class Form_model extends CI_Model
{
	//POST Nitrogen
	public function inputNitrogen($data)
	{
		$this->db->insert('form_nitrogen', $data);
		return $this->db->affected_rows();
	}

	//POST Nitrogen Generator
	public function inputNitrogenGen($data)
	{
		$this->db->insert('form_nitrogen_generator', $data);
		return $this->db->affected_rows();
	}

	//POST IPA System
	public function inputIpaSystem($data)
	{
		$this->db->insert('form_ipa_system', $data);
		return $this->db->affected_rows();
	}

	//POST City Water
	public function inputCityWater($data)
	{
		$this->db->insert('form_city_water', $data);
		return $this->db->affected_rows();
	}

	//POST Soften Water
	public function inputSoftenWater($data)
	{
		$this->db->insert('form_soften_water', $data);
		return $this->db->affected_rows();
	}
}