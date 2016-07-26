<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
        $this->load->model('register_model');
  $this->load->helper('form','url');
  $this->load->library('form_validation');
  }
  
  public function index()
  {
    $this->data['captcha_error'] = '';
    $code = $this->input->post('CaptchaCode');
    $isHuman = $this->botdetectcaptcha->Validate($code);

    $rules = $this->register_model->rules;
    $message = $this->register_model->messages;
    $this->form_validation->set_rules($rules);

    $this->data['captchaHtml'] = $this->botdetectcaptcha->Html();


    if(!(isset($_FILES['image_photo']) && is_uploaded_file($_FILES['image_photo']['tmp_name']))){
      $this->form_validation->set_rules('photo', 'Foto', 'required');    
    }
    if($this->input->post('course')==array('')){
      $this->form_validation->set_rules('course[]', 'Kursus', 'required');
    }

    foreach ($message as $key => $value) {
      $this->form_validation->set_message($key, $value);
    }

    $this->recent_data = array(
      'name'     => $this->input->post('name'),
      'address' => $this->input->post('address'),
      'phone'   => $this->input->post('phone'),
      'email'   => $this->input->post('email'),
      'school'   => $this->input->post('school'),
      'majoring'  => $this->input->post('majoring'),
      'photo'     => $this->input->post('photo'),
      'parent_name' => $this->input->post('parent_name'),
      'parent_job'   => $this->input->post('parent_job'),
      'parent_phone'   => $this->input->post('parent_phone'),
      'course'   => $this->input->post('course'),
      'program'  => $this->input->post('program'),
      );

    if($this->form_validation->run()===TRUE && $isHuman)
    {
      $data = array(
      'name'     => addslashes($this->input->post('name')),
      'address' => addslashes($this->input->post('address')),
      'phone'   => addslashes($this->input->post('phone')),
      'email'   => addslashes($this->input->post('email')),
      'school'   => addslashes($this->input->post('school')),
      'majoring'  => addslashes($this->input->post('majoring')),
      'parent_name' => addslashes($this->input->post('parent_name')),
      'parent_job'   => addslashes($this->input->post('parent_job')),
      'parent_phone'   => addslashes($this->input->post('parent_phone')),
      'program'  => $this->input->post('program'),
      'course' => json_encode($this->input->post('course')),
        'createdAt'    =>  date('Y-m-d H:i:s', time()),
        );
      
      $time_stamp = time().rand(100,999);
      $upload_path = "/assets/images/register/_{$time_stamp}";
      if (!is_readable($upload_path)){
        mkdir(".{$upload_path}", 0777, true);
      }

      if(isset($_FILES['image_photo']) && is_uploaded_file($_FILES['image_photo']['tmp_name'])){
        $config = array(
          'upload_path' => ".{$upload_path}",
          'allowed_types' => "gif|jpg|png",
          'overwrite' => TRUE,
          'max_size' => "2048000",
          'file_name' => time()
          );
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ($this->upload->do_upload('image_photo'))
        {
          $image = $this->upload->data();
          $image_name = $image['file_name'];
          $image_ext  = $image['file_type'];

          $this->register_model->insert($data);
          $new_id = $this->register_model->last_insert_id();
          $new_upload_path = "/assets/images/register/{$new_id}";
          rename(FCPATH."{$upload_path}", FCPATH."{$new_upload_path}");
          $data['id'] = $new_id;
          $data['photo'] = "$new_upload_path/{$image_name}";

          $this->register_model->update($data);
          // $this->content_model->resize_image($new_id);

        $message = <<<EOF
          <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Success!</h4>
                  Data successfully saved.
              </div>
EOF;
          $this->session->set_flashdata("pesan", $message);
          redirect('register');
        }else{
          $message = <<<EOF
            <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                      Data failed to save.
                  </div>
EOF;
    $this->session->set_flashdata("pesan", $message.$this->upload->display_errors());
          redirect('register');
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
        redirect('register');
      }      

    }
    else
    {
      if(!empty($this->input->post())){        
        if(!$isHuman){
          $this->data['captcha_error'] = 'Wrong captcha';
        }
          $message = <<<EOF
            <div class="alert alert-danger alert-dismissible">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <h4><i class="icon fa fa-ban"></i> Failed!</h4>
                      Data failed to save. {$this->data['captcha_error']}
                  </div>
        }
EOF;
    $this->session->set_flashdata("pesan", $message);
      }
      $this->render('public/register');
    } 
  }
}
