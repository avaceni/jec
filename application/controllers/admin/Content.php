<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content extends Admin_Controller {
	public $first_edit = 1;

	public function __construct() {
		parent::__construct();
		$this->load->model('content_model');
		$this->load->helper('form','url');
		$this->load->library('form_validation');
	}

	public function index()
	{
		$this->data['title'] = 'CRUD Content';

		$this->load->model('content_model');
		$this->load->library('pagination');

		$config = array();

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['base_url']     =   site_url('admin/content/index');
		$config['total_rows']   =   $this->content_model->get_rows_count();
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
		$this->data['data'] = $this->content_model->get_all_limit($per_page, $page);
		$this->data['count'] = $this->content_model->get_rows_count();

		$this->render('admin/content/view_content');
	}
	
	public function detail($id){
		$data['title'] = 'Detail';
		$this->data['data']  = $this->content_model->get_byid($id);
		$this->render('admin/content/view_detail');
	}
	public function delete($id){
		$this->content_model->delete_byid($id);
		$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Success Delete Data</div>");
		redirect('admin/content');
	}

	public function create(){
		$this->data['title'] = 'Create Content';
		$rules = $this->content_model->rules;
		$message = $this->content_model->messages;
		$this->form_validation->set_rules($rules);
		foreach ($message as $key => $value) {
			$this->form_validation->set_message($key, $value);
		}

		$this->recent_data = array(
			'title'			=> $this->input->post('title'),
			'description'	=> $this->input->post('description'),
			'content'		=> $this->input->post('content'),
			'content_type_id'		=> $this->input->post('content_type_id'),
			'publish'		=> $this->input->post('publish')=='on'?1:0,
			'meta_keywords'	=> $this->input->post('meta_keywords'),
			'meta_description'	=> $this->input->post('meta_description'),
			'meta_author'       => $this->input->post('meta_author')
			);

		if($this->form_validation->run()===FALSE)
		{
			if(!empty($this->input->post())){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Some field need to be fixed </div>");
			}
			// file_put_contents('error', json_encode(form_error('content')));
			$this->render('admin/content/view_form');
		}
		else
		{
			$data = array(
				'title'			=> addslashes($this->input->post('title')),
				'description'	=> addslashes($this->input->post('description')),
				'content'		=> addslashes($this->input->post('content')),
				'content_type_id'	=> $this->input->post('content_type_id'),
				'publish'		=> $this->input->post('publish')=='on'?1:0,
				'meta_keywords'	=> addslashes($this->input->post('meta_keywords')),
				'meta_description'	=> addslashes($this->input->post('meta_description')),
				'meta_author'       => addslashes($this->input->post('meta_author')),
				'created_by'		=> 	$this->ion_auth->user()->row()->id,
				'created_time'		=> 	date('Y-m-d H:i:s', time()),
				);
			
			$time_stamp = time().rand(100,999);
			$upload_path = "/assets/images/content/_{$time_stamp}";
			if (!is_readable($upload_path)){
				mkdir(".{$upload_path}", 0777, true);
			}

			if(isset($_FILES['cover_image']) && is_uploaded_file($_FILES['cover_image']['tmp_name'])){
				$config = array(
					'upload_path' => ".{$upload_path}",
					'allowed_types' => "gif|jpg|png",
					'overwrite' => TRUE,
					'max_size' => "2048000",
					'file_name' => time()
					);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);
				if ($this->upload->do_upload('cover_image'))
				{
					$image = $this->upload->data();
					$image_name	= $image['file_name'];
					$image_ext	= $image['file_type'];

					$this->content_model->insert($data);
					$new_id = $this->content_model->last_insert_id();
					$new_upload_path = "/assets/images/content/{$new_id}";
					rename(FCPATH."{$upload_path}", FCPATH."{$new_upload_path}");
					$data['id'] = $new_id;
					$data['image_source'] = "$new_upload_path/{$image_name}";
					$this->content_model->update($data);
					$this->content_model->resize_image($new_id);

					$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Success Add Data</div>");
					redirect('admin/content/create');
				}else{
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Failed Add Data</div></div>".$this->upload->display_errors());
					redirect('admin/content/create');
				}
			}
			else{
				$this->content_model->insert($data);
				$new_id = $this->content_model->last_insert_id();
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Success Add Data</div>");
				redirect('admin/content/create');
			}
		}	
	}

	public function edit(){
		$id = $this->uri->segment(4);
		$this->data['title'] = 'Edit Content';
		$this->data['data']  = $this->content_model->get_byid($id);
		$rules = $this->content_model->rules;
		$this->form_validation->set_rules($rules);

		$this->recent_data = array(
			'id'			=> $this->input->post('id'),
			'title'			=> $this->input->post('title'),
			'description'	=> $this->input->post('description'),
			'content'		=> $this->input->post('content'),
			'content_type_id'		=> $this->input->post('content_type_id'),
			'publish'		=> $this->input->post('publish')=='on'?1:0,
			'meta_keywords'	=> $this->input->post('meta_keywords'),
			'meta_description'	=> $this->input->post('meta_description'),
			'meta_author'       => $this->input->post('meta_author')
			);

		if(!empty($this->data['data'])){
			foreach($this->data['data'] as $rowdata){
				$this->recent_data['image_thumbnail']=base_url().$rowdata->image_thumbnail;
			}
		}

		if(empty($this->input->post())){			
			if(!empty($this->data['data'])){
				foreach($this->data['data'] as $rowdata){
					$this->recent_data['id']=$rowdata->id;
					$this->recent_data['title']=$rowdata->title;
					$this->recent_data['image_thumbnail']=base_url().$rowdata->image_thumbnail;
					$this->recent_data['description']=$rowdata->description;
					$this->recent_data['content']=stripslashes($rowdata->content);
					$this->recent_data['content_type_id']=$rowdata->content_type_id;
					$this->recent_data['publish']=$rowdata->publish;
					$this->recent_data['meta_keywords']=$rowdata->meta_keywords;
					$this->recent_data['meta_description']=$rowdata->meta_description;
					$this->recent_data['meta_author']=$rowdata->meta_author;
				}
			}
		}

		if($this->form_validation->run()===FALSE)
		{
			if(!empty($this->input->post())){
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-danger\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Some field need to be fixed</div>");
			}
			$this->render('admin/content/view_form');
		}
		else
		{
			$data = array(
				'id'			=> addslashes($this->input->post('id')),
				'title'			=> addslashes($this->input->post('title')),
				'description'	=> addslashes($this->input->post('description')),
				'content'		=> addslashes($this->input->post('content')),
				'publish'		=> $this->input->post('publish')=='on'?1:0,
				'meta_keywords'	=> addslashes($this->input->post('meta_keywords')),
				'meta_description'	=> addslashes($this->input->post('meta_description')),
				'meta_author'       => addslashes($this->input->post('meta_author')),
				'content_type_id'	=>	$this->input->post('content_type_id'),
				'created_by'		=> 	$this->ion_auth->user()->row()->id,
				'created_time'		=> 	date('Y-m-d H:i:s', time()),
				);

			if(isset($_FILES['cover_image']) && is_uploaded_file($_FILES['cover_image']['tmp_name'])){

				$upload_path = "/assets/images/content/{$id}/";
				if (!is_readable($upload_path)){
					mkdir(".{$upload_path}", 0777, true);
				}
				$config = array(
					'upload_path' => ".{$upload_path}",
					'allowed_types' => "gif|jpg|png",
					'overwrite' => TRUE,
					'max_size' => "2048000",
				// 'max_height' => "768",
				// 'max_width' => "1024",
					'file_name' => time()
					);
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				if ($this->upload->do_upload('cover_image'))
				{
					$image = $this->upload->data();
					$image_name	= $image['file_name'];
					$image_ext	= $image['file_type'];
					$data['image_source'] = $upload_path."{$image_name}";
					$this->content_model->update($data);
					$this->content_model->resize_image($id);

					$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Success Edit Data</div>");
					redirect('admin/content/edit/'.$id);
				}else{
					$this->session->set_flashdata("pesan", "<div class=\"col-md-12\"><div class=\"alert alert-danger\" id=\"alert\">Failed Edit Data</div></div>".$this->upload->display_errors());
					redirect('admin/content/edit/'.$id);
				}
			}
			else{
				$this->content_model->update($data);
				$this->session->set_flashdata("pesan", "<div class=\"alert alert-success\" id=\"alert\"><i class=\"glyphicon glyphicon-ok\"></i> Success Edit Data</div>");
				redirect('admin/content/edit/'.$id);
			}
		}	
	}

	public function check_is_number($str)
	{
	    if (!preg_match("/^[0-9]+$/i", $str)) {
	        $this->form_validation->set_message('check_is_number', '%s must be numeric value');
	        return FALSE;
	    } else {
	        return TRUE;
	    }
	}
}