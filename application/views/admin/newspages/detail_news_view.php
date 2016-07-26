<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
foreach($this->data['data'] as $rowdata){
  $row_id=$rowdata->id;
  $row_title=$rowdata->title;
  $row_image_popular=$rowdata->image_popular;
  $row_description=$rowdata->description;
  $row_content=$rowdata->content;
  $row_publish=$rowdata->publish;
  $row_meta=$rowdata->meta;
}
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail News
        <small>View your news detail here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Detail News</li>
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
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Title</label>
                  <div class="col-sm-10">
                    <?=$row_title?>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Image</label>
                  <div class="col-sm-10">
            <img class="img-responsive" src="<?
            !empty($row_image_popular)&&file_exists(FCPATH.$row_image_popular)?printf(base_url().ltrim($row_image_popular,'/')):printf(base_url().'assets/default/no_image_big.png')
            ?>">
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Description</label>
                  <div class="col-sm-10">
                    <?=$row_description?>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Content</label>
                  <div class="col-sm-10">
                    <?=stripslashes($row_content)?>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Publish</label>
                  <div class="col-sm-10">
                    <? $row_publish==1?print('<div class="fa fa-check fa-2x ico-color-green"></div>'):print('<div class="fa fa-times fa-2x ico-color-red"></div>'); ?>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            <? /*
            <div class="col-sm-12">
              <div class="form-group">
                  <label class="col-sm-2 control-label">Meta</label>
                  <div class="col-sm-10">
                    <?=$row_meta?>
                  </div>
                </div>
              </div>
            <!-- /.col -->
            */ ?>
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