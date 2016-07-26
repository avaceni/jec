<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perguruantinggi extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
  }
  
  public function index($id)
  {
	$this->load->model('content_model');
	$this->data['data']  = $this->content_model->get_byid($id);
    $this->render('public/home');
  }
}
