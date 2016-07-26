<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Register
        <small>List of Register</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Register</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?=$this->session->flashdata('pesan')?>
    	<div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Register Table</h3>
              <div class="box-tools">
                <div id="export-pdf" style="float: right;">
                  <a href="<?= base_url()."admin/register/registerpdf" ?>" id="register-pdf" class="btn btn-info">PDF</a>
                </div>
                <div id="registration-range" class="col-xs-3 input-group" style="float: right;">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" name="register-range" class="date-range form-control pull-right active" id="register-range">
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?
				echo '<table class="table table-bordered table-striped">';
				echo '<tbody>';
				echo
  				'<tr>
              <th>#</th>
              <th>Nama</th>
              <th>Alamat</th>
              <th>Telepon/HP</th>
              <th>Sekolah</th>
              <th>Bimbingan Tes</th>
              <th>Jurusan</th>
              <th>Tanggal Daftar</th>
              <th></th>  
            </tr>';
            ?>
                <? if($this->data['count'] == 0) { ?>
            <tr>
              <td colspan="9">Data tidak ditemukan</td>
            </tr>
            <? }else{
              $no=0;
              foreach($this->data['data']->result() as $key => $rowContent){?>
              <tr>
                <td><? echo $this->uri->segment(4)+$key+1 ?></td>
                <td><?=$rowContent->name?></td>
                <? /*
                <td><img width="200px" src="<?
                  !empty($rowContent->path)&&file_exists(FCPATH.$rowContent->path)?printf(base_url().ltrim($rowContent->path,'/')):printf(base_url().'assets/default/no_image_small.png')
                  ?>"></td>
                  */ ?>
                <td><?=$rowContent->address?></td>
                <td><?=$rowContent->phone?></td>
                <td><?=$rowContent->school?></td>
                <td><? echo $CI->general_function->getCourse($rowContent->course) ?></td>
                <td><? $rowContent->program==1?print('General'):print('Exclusive') ?></td>
                <td><? echo $CI->general_function->getDateFormat($rowContent->createdAt) ?></td>
                <? /*
                <td><?=$rowContent->meta_keywords?></td>
                <td><?=$rowContent->meta_description?></td>
                <td><?=$rowContent->meta_author?></td>
                */ ?>
                <td>
                  <a href="<?=base_url().'admin/register/singlepdf'?>" id="<?= $rowContent->id ?>" class="btn btn-info btn-sm single-pdf"><i class="fa fa-print"></i></a>
                  <a href="<?=base_url().'admin/register/detail/'.$rowContent->id?>" class="btn btn-warning btn-sm"><i class="fa fa-search"></i></a>
                  <a href="<?=base_url().'admin/register/delete/'.$rowContent->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <? }
            }?>
            <?
				echo '</tbody>';
				echo '</table>';
            ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      <div class="row"><div class="col-xs-12"><?echo $this->data['pagging'];?></div></div>
    </section>
    <!-- /.content -->
  </div>
  <script type="text/javascript">
</script>
  <!-- /.content-wrapper -->