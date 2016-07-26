<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
  }
  
  public function index()
  {
	$this->load->model('content_model');
	$this->data['data']  = $this->content_model->get_byid(3);
    $this->render('public/home');
  }
}
