<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Newspages extends Admin_Controller
{
 
  function __construct()
  {
    parent::__construct();
    $this->load->model('content_model');
	$this->load->helper('form','url');
	$this->load->library('form_validation');
  }
  
  public function index()
  {
  		$this->data['title'] = 'CRUD Content';
		$this->load->library('pagination');

		$config = array();

		$config['full_tag_open'] = "<ul class='pagination pagination-sm' style='position:relative; top:-25px;'>";
		$config['full_tag_close'] ="</ul>";
		$config['base_url']     =   base_url().'admin/newspages/index';
		$config['total_rows']   =   $this->content_model->get_news_count();
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
		$this->data['data'] = $this->content_model->get_all_news($per_page, $page);
		$this->data['count'] = $this->content_model->get_news_count();

		$this->render('admin/newspages/list_news_view');
  }

	public function detail($id){
		$data['title'] = 'Detail';
		$this->data['data']  = $this->content_model->get_byid($id);
		$this->render('admin/newspages/detail_news_view');
	}
	public function delete($id){
		$this->content_model->delete_byid($id);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully deleted.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
		redirect('admin/newspages/index');
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
			'meta'	=> $this->input->post('meta'),
			);

		if($this->form_validation->run()===FALSE)
		{
			if(!empty($this->input->post())){
					$message = <<<EOF
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
			                Data failed to save.
			            </div>
EOF;
		$this->session->set_flashdata("pesan", $message);
			}
			// file_put_contents('error', json_encode(form_error('content')));
			$this->render('admin/newspages/news_form_view');
		}
		else
		{
			$data = array(
				'title'			=> addslashes($this->input->post('title')),
				'description'	=> addslashes($this->input->post('description')),
				'content'		=> addslashes($this->input->post('content')),
				'content_type_id'	=> 2,
				'publish'		=> $this->input->post('publish')=='on'?1:0,
				'meta'       => addslashes($this->input->post('meta')),
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

				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully saved.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
					redirect('admin/newspages/create');
				}else{
					$message = <<<EOF
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
			                Data failed to save.
			            </div>
EOF;
		$this->session->set_flashdata("pesan", $message.$this->upload->display_errors());
					redirect('admin/newspages/create');
				}
			}
			else{
				$this->content_model->insert($data);
				$new_id = $this->content_model->last_insert_id();
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully saved.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
				redirect('admin/newspages/create');
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
			'content_type_id'		=> 2,
			'publish'		=> $this->input->post('publish')=='on'?1:0,
			'meta'	=> $this->input->post('meta'),
			);

		if(!empty($this->data['data'])){
			foreach($this->data['data'] as $rowdata){
				$this->recent_data['image_thumbnail']=$rowdata->image_thumbnail;
			}
		}

		if(empty($this->input->post())){			
			if(!empty($this->data['data'])){
				foreach($this->data['data'] as $rowdata){
					$this->recent_data['id']=$rowdata->id;
					$this->recent_data['title']=stripslashes($rowdata->title);
					$this->recent_data['image_thumbnail']=$rowdata->image_thumbnail;
					$this->recent_data['description']=stripslashes($rowdata->description);
					$this->recent_data['content']=stripslashes($rowdata->content);
					$this->recent_data['content_type_id']=$rowdata->content_type_id;
					$this->recent_data['publish']=$rowdata->publish;
					$this->recent_data['meta']=stripslashes($rowdata->meta);
				}
			}
		}

		if($this->form_validation->run()===FALSE)
		{
			if(!empty($this->input->post())){
					$message = <<<EOF
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
			                Data failed to save.
			            </div>
EOF;
		$this->session->set_flashdata("pesan", $message);
			}
			$this->render('admin/newspages/news_form_view');
		}
		else
		{
			$data = array(
				'id'			=> addslashes($this->input->post('id')),
				'title'			=> addslashes($this->input->post('title')),
				'description'	=> addslashes($this->input->post('description')),
				'content'		=> addslashes($this->input->post('content')),
				'publish'		=> $this->input->post('publish')=='on'?1:0,
				'meta'	=> addslashes($this->input->post('meta')),
				'content_type_id'	=>	2,
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

				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully saved.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
					redirect('admin/newspages/edit/'.$id);
				}else{
					$message = <<<EOF
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
			                Data failed to save.
			            </div>
EOF;
		$this->session->set_flashdata("pesan", $message);
					redirect('admin/newspages/edit/'.$id);
				}
			}
			else{
				$this->content_model->update($data);
				$message = <<<EOF
					<div class="alert alert-success alert-dismissible">
			            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			            <h4><i class="icon fa fa-check"></i> Success!</h4>
			            Data successfully saved.
			        </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
				redirect('admin/newspages/edit/'.$id);
			}
		}	
	}

}