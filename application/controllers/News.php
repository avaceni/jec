<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
    $this->load->model('content_model');
  }
  
  public function index()
  {
    $this->load->library('pagination');

    $config = array();

    $config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
    $config['full_tag_close'] ="</ul>";
    $config['base_url']     =   base_url().'news/';
    $config['total_rows']   =   $this->content_model->get_published_news_count();
    $config['per_page']     =   $per_page = 5;
    $config['uri_segment']  =   2;
    $config['num_tag_open'] = '<li>';
    $config['num_tag_close'] = '</li>';
    $config['next_tag_open'] = "<li>";
    $config['next_tagl_close'] = "</li>";
    $config['prev_tag_open'] = "<li>";
    $config['prev_tagl_close'] = "</li>";
    $config['first_tag_open'] = "<li>";
    $config['first_tagl_close'] = "</li>";
    $config['last_tag_open'] = "<li>";
    $config['last_tagl_close'] = "</li>";
    $config['first_link']   =   'First';
    $config['last_link']    =   'Last';
    $config['next_link']    =   'Next';
    $config['prev_link']    =   'Prev';
    $config['cur_tag_open'] =   "<li class='active'><a>";
    $config['cur_tag_close']=   "</a></li>";
    $config['num_links'] = 9;

    $this->pagination->initialize($config);
    $this->data['pagging'] = $this->pagination->create_links();
    $page = ($this->uri->segment(2)) ? ($this->uri->segment(2)) : 0;
    $this->data['data'] = $this->content_model->get_all_published_news($per_page, $page);
    $this->data['count'] = $this->content_model->get_published_news_count();

    $this->render('public/news');
  }
}
