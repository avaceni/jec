<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
  }
  
  public function index()
  {
	$this->load->model('content_model');
	$this->data['data']  = $this->content_model->get_byid(2);
    $this->render('public/home');
  }
}
