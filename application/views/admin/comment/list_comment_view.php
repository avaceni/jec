<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Comments
        <small>List of Comment</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Comment</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?=$this->session->flashdata('pesan')?>
    	<div class="row">
        <div class="col-xs-12">
          <div class="box box-info">
            <div class="box-header">
              <h3 class="box-title">Comment Table</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?
				echo '<table class="table table-bordered table-striped">';
				echo '<tbody>';
				echo
  				'<tr>
              <th>#</th>
              <th>Name</th>
              <th>From</th>
              <th>Comment</th>
              <th>CreatedAt</th>
              <th></th>
            </tr>';
            ?>
                <? if($this->data['count'] == 0) { ?>
            <tr>
              <td colspan="6">Data tidak ditemukan</td>
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
                <td><?=$rowContent->from?></td>
                <td><?=$rowContent->comment?></td>
                <td><? echo $CI->general_function->getDateFormat($rowContent->createdAt) ?></td>
                <? /*
                <td><?=$rowContent->meta_keywords?></td>
                <td><?=$rowContent->meta_description?></td>
                <td><?=$rowContent->meta_author?></td>
                */ ?>
                <td>
                <?
                  if($rowContent->publish == 0){
                ?>
                  <a href="<?=base_url().'admin/comment/publish/'.$rowContent->id?>" class="btn btn-default btn-sm"><i class="fa fa-thumbs-o-down"></i></a>
                  <?
                }
                else {
                  ?>
                  <a href="<?=base_url().'admin/comment/unpublish/'.$rowContent->id?>" class="btn btn-success btn-sm"><i class="fa fa-thumbs-o-up"></i></a>
                  <?
                  }
                  ?>
                  <a href="<?=base_url().'admin/comment/delete/'.$rowContent->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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
  <!-- /.content-wrapper -->