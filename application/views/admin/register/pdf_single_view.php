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
      <img width="100%" class="img-responsive" src="<? echo base_url().'assets/default/header.png'; ?> ">
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
          <h4 style="font-weight:bold;text-align:center;" class="box-title">FORMULIR PENDAFTARAN</h4>          
        </div>
        <!-- /.box-header -->
        <div class="box-body" style="margin-left:20px;margin-right:20px">
          <div class="row">
            <div class="col-sm-12" style="width:100%;margin-bottom:10px;font-size:16px;font-weight:bold">
                Identitas Pendaftar
            </div>
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Nama</div>
                  <div class="" style="float: left; width: 70%;">
                    <span><?= $row_name?></span>
                  </div>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Alamat</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_address?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Telepon/HP</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_phone?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->            
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Email</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_email?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Sekolah</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_school?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Jurusan</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_majoring?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-top:10px;width:100%;margin-bottom:10px;font-size:16px;font-weight:bold">
                Identitas Orang Tua
            </div>
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Nama Orangtua</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_parent_name?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Pekerjaan Orangtua</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?= $row_parent_job?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->            
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Telepon/HP Orangtua</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><?=($row_parent_phone)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="margin-top:10px;width:100%;margin-bottom:10px;font-size:16px;font-weight:bold">
                Program
            </div>
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Bimbingan yang Diikuti</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><? echo $CI->general_function->getCourse($row_course)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;">
                  <div class="" style="float: left; width: 30%;">Program</div>
                  <div class="" style="float: left; width: 70%;">
                    <span class="editable editable-click"><? $row_program==1?print('General'):print('Exclusive') ?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            
            <div class="col-sm-12" style="width:100%;margin-top:10px">
              <div class="form-group" style="font-size:14px;width:30%;float:right;">
                  <div class="" style="text-align: center;">
                    <span class="editable editable-click">Yogyakarta, <?echo $CI->general_function->getDateFormat3($row_createdAt)?></span>
                  </div>
                </div>
              </div>
            <!-- /.col -->            
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;width:30%;float:right;">
                  <div class="" style="text-align: center; float:right;">
                  <img width="150px" class="" src="<?
                  !empty($row_photo)&&file_exists(FCPATH.$row_photo)?printf(base_url().ltrim($row_photo,'/')):printf(base_url().'assets/default/no_image_small.png')
                  ?>">
                  </div>
                </div>
              </div>
            <div class="col-sm-12" style="width:100%;">
              <div class="form-group" style="font-size:14px;width:30%;float:right;">
                  <div class="" style="text-align: center; float:right;">
                    <span><?= '( '.$row_name.' )'?></span>
                  </div>
              </div>
            </div>              
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