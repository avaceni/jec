<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comment extends Public_Controller {

  function __construct()
  {
    parent::__construct();
    $this->load->library('general_function');
    $this->load->model('comment_model');
    $this->load->helper('form','url');
    $this->load->library('form_validation');
  }
  
  public function index()
  {
    $this->data['captcha_error'] = '';
    $code = $this->input->post('CaptchaCode');
    $isHuman = $this->botdetectcaptcha->Validate($code);

    $rules = $this->comment_model->rules;
    $message = $this->comment_model->messages;
    $this->form_validation->set_rules($rules);

    $this->data['captchaHtml'] = $this->botdetectcaptcha->Html();

    foreach ($message as $key => $value) {
      $this->form_validation->set_message($key, $value);
    }

    $this->recent_data = array(
      'name'     => $this->input->post('name'),
      'from' => $this->input->post('from'),
      'comment'   => $this->input->post('comment'),
      'email'   => $this->input->post('email'),
      'publish'   => 0
      );

    if($this->form_validation->run()===TRUE && $isHuman)
    {
      $data = array(
      'name'     => addslashes($this->input->post('name')),
      'from' => addslashes($this->input->post('from')),
      'comment'   => addslashes($this->input->post('comment')),
      'email'   => addslashes($this->input->post('email')),
      'createdAt' => date('Y-m-d H:i:s', time()),
      );
      
      $this->comment_model->insert($data);
      $new_id = $this->comment_model->last_insert_id();
      $message = <<<EOF
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
        <h4><i class="icon fa fa-check"></i> Success!</h4>
        Data successfully saved.
      </div>
EOF;
      $this->session->set_flashdata("pesan", $message);
      redirect('comment');
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
          Data failed to save.
        </div>
EOF;
        $this->session->set_flashdata("pesan", $message);
      }
      $this->render('public/comment');
    }
  }
}
