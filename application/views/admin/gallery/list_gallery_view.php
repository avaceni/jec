<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Gallery
        <small>List of Images</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Gallery</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <?=$this->session->flashdata('pesan')?>
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Images Table</h3>
                <div class="box-tools">
                	<a href="<?php echo site_url('admin/gallery/create');?>" class="btn btn-info">Add Image</a>
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
              <th>Title</th>
              <th>Image</th>
              <th>Description</th>
              <th>Publish</th>
              <th>Created At</th>
              <th></th>  
            </tr>';
            ?>
                <? if($this->data['count'] == 0) { ?>
            <tr>
              <td colspan="5">Data tidak ditemukan</td>
            </tr>
            <? }else{
              $no=0;
              foreach($this->data['data']->result() as $key => $rowContent){?>
              <tr>
                <td><? echo $this->uri->segment(4)+$key+1 ?></td>
                <td><?=$rowContent->title?></td>                
                <td><img width="100px" src="<?
                  !empty($rowContent->image_thumbnail)&&file_exists(FCPATH.$rowContent->image_thumbnail)?printf(base_url().ltrim($rowContent->image_thumbnail,'/')):printf(base_url().'assets/default/no_image_small.png')
                  ?>"></td>
                <td><?=$rowContent->description?></td>
                <td class="center"><? $rowContent->publish==1?print('<div class="fa fa-check fa-2x ico-color-green"></div>'):print('<div class="fa fa-times fa-2x ico-color-red"></div>') ?></td>
                <td><? echo $CI->general_function->getDateFormat($rowContent->createdAt) ?></td>
                <? /*
                <td><?=$rowContent->meta_keywords?></td>
                <td><?=$rowContent->meta_description?></td>
                <td><?=$rowContent->meta_author?></td>
                */ ?>
                <td>
                  <a href="<?=base_url().'admin/gallery/edit/'.$rowContent->id?>" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>
                  <a href="<?=base_url().'admin/gallery/delete/'.$rowContent->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="fa fa-trash"></i></a>
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