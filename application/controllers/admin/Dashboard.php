<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{
 
  function __construct()
  {
    parent::__construct();
    $this->load->model('content_model');
    $this->load->model('comment_model');
    $this->load->model('image_model');
    $this->load->model('register_model');
  }
  
  public function index()
  {
  	$this->data['count_news'] = $this->content_model->get_published_news_count();
  	$this->data['count_comment'] = $this->comment_model->get_rows_count();
  	$this->data['count_image'] = $this->image_model->get_published_count();
  	$this->data['count_register'] = $this->register_model->get_rows_count();
    $this->render('admin/dashboard_view');
  }
}