<?php

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class User extends REST_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'mUser');

		$this->methods['index_get']['limit'] = 100; // requests per hour per user/key
		$this->methods['index_post']['limit'] = 100; // requests per hour per user/key
		$this->methods['index_put']['limit'] = 100; // requests per hour per user/key
		$this->methods['index_delete']['limit'] = 100; // requests per hour per user/key
	}


	public function index_get(){

		$id = $this->get('id');

		if ( $id === null ){
			$user = $this->mUser->getUser();
		} else {
			$user = $this->mUser->getUser($id);
		}

		
		if ( $user ) {
			$this->response([
                    'status' => true,
                    'data' => $user
                ], REST_Controller::HTTP_OK);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_NOT_FOUND);
		}
	}


	public function index_post(){

		$data = [
			'name' => $this->post('name'),
			'email' => $this->post('email'),
			'password' => $this->post('password'),
			'image' => $this->post('image'),
			'role_id' => $this->post('role_id'),
			'is_active' => $this->post('is_active'),
			'date_created' => $this->post('date_created')
		];

		if ( $this->mUser->createUser($data) > 0 ){
			$this->response([
                   'status' => true,
                    'message' => 'New user has been created!'
                ], REST_Controller::HTTP_CREATED);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'Failed to create new user'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}

	}


	public function index_put(){
		
		$id = $this->put('id');
		$data = [
			'name' => $this->put('name'),
			'email' => $this->put('email'),
			'password' => $this->put('password'),
			'image' => $this->put('image'),
			'role_id' => $this->put('role_id'),
			'is_active' => $this->put('is_active'),
			'date_created' => $this->put('date_created')
		];

		if ( $this->mUser->updateUser($data, $id) > 0 ){
			$this->response([
                   'status' => true,
                    'message' => 'New user has been modified!'
                ], REST_Controller::HTTP_OK);
		} else {
			$this->response([
                    'status' => false,
                    'message' => 'Failed to modified user'
                ], REST_Controller::HTTP_BAD_REQUEST);
		}

	}


	public function index_delete(){
		
		$id = $this->delete('id');

		if ( $id === null ){
			$this->response([
                    'status' => false,
                    'message' => 'provide an id'
                ], REST_Controller::HTTP_BAD_REQUEST);
		} else {
			if ($this->mUser->deleteUser($id) > 0) {
				$this->response([
                    'status' => true,
                    'id' => $id,
                    'message' => 'deleted the resource id'
                ], REST_Controller::HTTP_OK);
			} else {
				$this->response([
                    'status' => false,
                    'message' => 'id not found!'
                ], REST_Controller::HTTP_BAD_REQUEST);
			}
		}
	}

}