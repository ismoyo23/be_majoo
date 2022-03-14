<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('curl_get');
    }

	public function index()
	{
        $this->load->view('layout/user_header');
        $this->load->view('users/homeUser');
    }

}