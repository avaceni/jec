<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Content extends Public_Controller {

	function __construct()
	{
		parent::__construct();
	}

	public function index($id)
	{
		$this->load->model('content_model');
		$this->content_model->add_total_view($id);
		$this->data['data']  = $this->content_model->get_byid($id);
		$this->render('public/detail_content');
	}
}
