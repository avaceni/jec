<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends Admin_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('comment_model');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config = array();

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['base_url']     =   base_url().'admin/comment/index';
		$config['total_rows']   =   $this->comment_model->get_rows_count();
		$config['per_page']     =   $per_page = 5;
		$config['uri_segment']  =   4;
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
		$page = ($this->uri->segment(4)) ? ($this->uri->segment(4)) : 0;
		$this->data['data'] = $this->comment_model->get_all_limit($per_page, $page);
		$this->data['count'] = $this->comment_model->get_rows_count();

		$this->render('admin/comment/list_comment_view');
	}

	public function delete($id){
		$this->comment_model->delete_byid($id);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Success Delete Data.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
		redirect('admin/comment/index');
	}

	public function publish($id){
		$data = array(
				'id'			=> $id,
				'publish'		=> 1,
				);
		$this->comment_model->update($data);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Success Showing Comment.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
		redirect('admin/comment/index');
	}

	public function unpublish($id){
		$data = array(
				'id'			=> $id,
				'publish'		=> 0,
				);
		$this->comment_model->update($data);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Success Hiding Comment.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
		redirect('admin/comment/index');
	}

}