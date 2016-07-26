<?php
$CI =& get_instance();
$row_name=!empty($this->recent_data['name'])?$this->recent_data['name']:"";
$row_address=!empty($this->recent_data['address'])?$this->recent_data['address']:"";
$row_phone=!empty($this->recent_data['phone'])?$this->recent_data['phone']:"";
$row_email=!empty($this->recent_data['email'])?$this->recent_data['email']:"";
$row_school=!empty($this->recent_data['school'])?$this->recent_data['school']:"";
$row_majoring=!empty($this->recent_data['majoring'])?$this->recent_data['majoring']:"";
$row_photo=!empty($this->recent_data['photo'])?$this->recent_data['photo']:"";
$row_parent_name=!empty($this->recent_data['parent_name'])?$this->recent_data['parent_name']:"";
$row_parent_job=!empty($this->recent_data['parent_job'])?$this->recent_data['parent_job']:"";
$row_parent_phone=!empty($this->recent_data['parent_phone'])?$this->recent_data['parent_phone']:"";
$row_course=!empty($this->recent_data['course'])?$this->recent_data['course']:"";
$row_program=!empty($this->recent_data['program'])?$this->recent_data['program']:"";
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
              <h1 class="entry-title ">Pendaftaran Online</h1>

            </header><!-- .entry-header -->

            <div class="entry-content">
              <div>Untuk mendaftarkan diri sebagai peserta Bimbingan Tes Jogja Education Center,
                isi form berikut. Persiapkan juga pas foto terbaru anda</div>
                <br/>
                <?=$this->session->flashdata('pesan')?>
                <div class="">
                  <? echo form_open_multipart('',array('class'=>'form-horizontal'));?>
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
                  <div class="form-group <? !empty(form_error('address'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Alamat','address', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('address', '<span class="help-block">', '</span>');
                      echo form_input('address',$row_address, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('phone'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Telepon/HP','phone', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('phone', '<span class="help-block">', '</span>');
                      echo form_input('phone',$row_phone, 'class="form-control"');
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
                  <div class="form-group <? !empty(form_error('school'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Sekolah','school', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('school', '<span class="help-block">', '</span>');
                      echo form_input('school',$row_school, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('majoring'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Jurusan','majoring', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('majoring', '<span class="help-block">', '</span>');
                      echo form_input('majoring',$row_majoring, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('photo'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Foto','photo', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('photo', '<span class="help-block">', '</span>');
                      ?>
                      <input type="file" name="image_photo" class="form-control" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('parent_name'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Nama Orang Tua','parent_name', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('parent_name', '<span class="help-block">', '</span>');
                      echo form_input('parent_name',$row_parent_name, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('parent_job'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Pekerjaan Orang Tua','parent_job', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('parent_job', '<span class="help-block">', '</span>');
                      echo form_input('parent_job',$row_parent_job, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('parent_phone'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Telepon Orang Tua','parent_phone', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('parent_phone', '<span class="help-block">', '</span>');
                      echo form_input('parent_phone',$row_parent_phone, 'class="form-control"');
                      ?>
                    </div>
                  </div>
                  <div class="form-group <? !empty(form_error('course[]'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Bimbingan Tes Yang Akan Diikuti','course', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('course[]', '<span class="help-block">', '</span>');
                      // echo form_input('course',$row_course, 'class="form-control"');
                      ?>
                      <div class="form-group">
                        <div class="checkbox col-sm-12">
                          <b>Perguruan Tinggi Kedinasan</b>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="1">
                            PKN STAN
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="2">
                            IPDN
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="3">
                            DEPHUB/STMKG
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="4">
                            STPN
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="5">
                            STIS
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="checkbox col-sm-12">
                          <b>Perguruan Tinggi Khusus</b>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="31">
                            IT-TELKOM
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="32">
                            POLTEK LPOS IND
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="33">
                            D-III UGM & SM UNY
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="34">
                            UM-UGM
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="35">
                            SBMPTN
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="checkbox col-sm-12">
                          <b>Perguruan Tinggi Kesehatan</b>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="51">
                            POLTEK KESEHATAN
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="52">
                            KEDOKTERAN UMY
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="53">
                            KEDOKTERAN UII
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="54">
                            KEBIDANAN AISYIYAH
                          </label>
                        </div>
                        <div class="checkbox col-sm-12">
                          <label>
                            <input type="checkbox" name="course[]" value="55">
                            KEPERAWATAN
                          </label>
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="checkbox col-sm-12">
                          <b>Lainnya</b>
                          <input type="text" name="course[]" value="" class="form-control">
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="form-group <? !empty(form_error('program'))?printf('has-error'):'' ?>">
                    <?
                    echo form_label('Program','program', array('class'=>'col-sm-4 control-label', 'style'=>'text-align:left'));
                    ?>
                    <div class="col-sm-6">
                      <?
                      echo form_error('program', '<span class="help-block">', '</span>');
                      $options = array(
                        '' => '--Pilih--',
                        '1' => 'General',
                        '2' => 'Exclusive',
                        );
                      echo form_dropdown('program', $options, $row_program, 'class="form-control"');
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