<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Menupages extends Admin_Controller
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
		$this->render('admin/menupages/menu_pages_view');
	}
	public function edit()
	{
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
			'meta'	=> $this->input->post('meta'),
			);

		if(!empty($this->data['data'])){
			foreach($this->data['data'] as $rowdata){
				$this->recent_data['image_thumbnail']= $rowdata->image_thumbnail;
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
			$this->render('admin/menupages/menu_pages_form');
		}
		else
		{
			$data = array(
				'id'			=> addslashes($this->input->post('id')),
				'title'			=> addslashes($this->input->post('title')),
				'description'	=> addslashes($this->input->post('description')),
				'content'		=> addslashes($this->input->post('content')),
				'publish'		=> $this->input->post('publish')=='on'?1:0,
				'meta'	=> addslashes(strtolower($this->input->post('meta'))),
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

					$message = <<<EOF
						<div class="alert alert-success alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-check"></i> Success!</h4>
			                Data successfully saved.
			            </div>
EOF;
					$this->session->set_flashdata("pesan", $message);
					redirect('admin/menupages/edit/'.$id);
				}else{
					$message = <<<EOF
						<div class="alert alert-danger alert-dismissible">
			                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
			                <h4><i class="icon fa fa-ban"></i> Failed!</h4>
			                Data failed to save.
			            </div>
EOF;
		$this->session->set_flashdata("pesan", $message);
					redirect('admin/menupages/edit/'.$id);
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
				redirect('admin/menupages/edit/'.$id);
			}
		}	
	}

}