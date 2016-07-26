<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
  }
  
  public function index()
  {
  	$this->load->model('image_model');
    $this->data['data'] = $this->image_model->get_all_published_image(10, 0);
    $this->data['count'] = $this->image_model->get_published_count();
    $this->render('public/gallery');
  }
}
