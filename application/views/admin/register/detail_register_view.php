<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
foreach($this->data['data'] as $rowdata){
  $row_id=$rowdata->id;
  $row_name=$rowdata->name;
  $row_address=$rowdata->address;
  $row_phone=$rowdata->phone;
  $row_email=$rowdata->email;
  $row_school=$rowdata->school;
  $row_majoring=$rowdata->majoring;
  $row_photo=$rowdata->photo;
  $row_parent_name=$rowdata->parent_name;
  $row_parent_job=$rowdata->parent_job;
  $row_parent_phone=$rowdata->parent_phone;
  $row_course=$rowdata->course;
  $row_program=$rowdata->program;
  $row_createdAt=$rowdata->createdAt;
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Registration Detail
        <small>View your register here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Registration Detail</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">News Detail</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-10" style="font-size: 20px;">
                    <span class="editable editable-click"><?=$row_name?></span>
                  </div>
                </div>
              </div>
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Foto</label>
                  <div class="col-sm-10">
            <img width="200px" class="img-responsive img-thumbnail" src="<?
            !empty($row_photo)&&file_exists(FCPATH.$row_photo)?printf(base_url().ltrim($row_photo,'/')):printf(base_url().'assets/default/no_image_small.png')
            ?>">
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_address?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Telepon/HP</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_phone?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->            
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_email?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Sekolah</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_school?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Jurusan</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_majoring?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Nama Orangtua</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_parent_name?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Pekerjaan Orangtua</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=$row_parent_job?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->            
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Telepon/HP Orangtua</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=($row_parent_phone)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Bimbingan yang Diikuti</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><? echo $CI->general_function->getCourse($row_course)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Program</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><? $row_program==1?print('General'):print('Exclusive') ?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-bottom:10px">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Waktu Daftar</label>
                  <div class="col-sm-10">
                    <span class="editable editable-click"><?=($row_createdAt)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->