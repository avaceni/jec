<?php
$CI =& get_instance();
$row_name=!empty($this->recent_data['name'])?$this->recent_data['name']:"";
$row_from=!empty($this->recent_data['from'])?$this->recent_data['from']:"";
$row_comment=!empty($this->recent_data['comment'])?$this->recent_data['comment']:"";
$row_email=!empty($this->recent_data['email'])?$this->recent_data['email']:"";
?>
<div class="top-section">
  <div class="cfa"><div class="container"><div class="col-md-8"><span class="cfa-text">Tertarik mengikuti Bimbingan Tes di Jogja Education Center?</span></div><div class="col-md-4"><a class="btn btn-lg cfa-button" href="<?=base_url().'register';?>">Daftar Sekarang</a></div></div></div>        </div>
  <div id="content" class="site-content container">

    <div class="container main-content-area">
      <div class="row pull-left">
       <div id="primary" class="content-area col-sm-12 col-md-8">
        <main id="main" class="site-main" role="main">

          <article class="post type-post status-publish format-standard has-post-thumbnail hentry category-uncategorized tag-sticky-2 tag-template">
            <header class="entry-header page-header">

              <h1 class="entry-title ">Buku Tamu</h1>

            </header><!-- .entry-header -->

            <div class="entry-content">
              <div>Untuk mengisi buku tamu, isi nama lengkap, asal (sekolah/alamat), alamat email dan isi komentar. Komentar anda akan ditayangkan setelah disetujui.</div>
                <br/>
                <?=$this->session->flashdata('pesan')?>
                <div class="">
                  <? echo form_open('',array('class'=>'form-horizontal'));?>
                  <div class="form-group <? !empty(form_error('name'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Nama','name', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('name', '<span class="help-block">', '</span>');
                      echo form_input('name',$row_name, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('from'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Asal','from', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('from', '<span class="help-block">', '</span>');
                      echo form_input('from',$row_from, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('email'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Email','email', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('email', '<span class="help-block">', '</span>');
                      echo form_input('email',$row_email, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('comment'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Komentar','comment', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('comment', '<span class="help-block">', '</span>');
                      $data = array(
                        'name'        => 'comment',
                        'id'          => 'title',
                        'class'       => 'form-control',
                        'value'       => $row_comment,
                        'rows'        => '3',
                        'maxlength'   => '100'
                        );
                      echo form_textarea($data);
                      ?>
                    </div>
                  </div>
                                <div class="form-group <? !empty($this->data['captcha_error'])?printf('has-error'):'' ?>">
              <?
                    echo form_label('Captcha','program', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
              <div class="col-sm-6">
                  <?php echo $this->data['captchaHtml']; ?>
                    <div style="position: relative; top: -10px;">
                    <input class="form-control" style="width:250px;" type="text" name="CaptchaCode" id="CaptchaCode" value="" />
                      
                    </div>
                  
                </div><!-- -->
                
                <!-- /.col -->
              </div>
                  <div class="col-sm-6">
                  <div class="box-footer">
                    <? echo form_submit('submit', 'SAVE', 'class="btn btn-info pull-right"');?>
                    <? echo form_close();?>
                    </div>
                  </div>

                </div>
                <!-- /.col -->
              </div>

            </article><!-- #post-## -->
          </main><!-- #main -->
        </div>

        <?            
        $this->load->view('templates/dazzling/_parts/secondary_view');
                // echo $this->data['current_user_menu'];
        ?>
      </div><!-- close .row -->
    </div><!-- close .container -->
        </div><!-- close .site-content -->