<?
$CI =& get_instance();
?>
<?
$row_id=!empty($this->recent_data['id'])?$this->recent_data['id']:"";
$row_title=!empty($this->recent_data['title'])?$this->recent_data['title']:"";
$row_description=!empty($this->recent_data['description'])?$this->recent_data['description']:"";
$row_content=!empty($this->recent_data['content'])?$this->recent_data['content']:"";
$row_content_type_id=!empty($this->recent_data['content_type_id'])?$this->recent_data['content_type_id']:"";
$row_image=!empty($this->recent_data['image_thumbnail'])?$this->recent_data['image_thumbnail']:(base_url().'assets/default/no_image_small.png');
$row_publish=!empty($this->recent_data['publish'])?$this->recent_data['publish']:"";
$row_meta=!empty($this->recent_data['meta'])?$this->recent_data['meta']:"";

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Edit Page
        <small>Edit your pages here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Edit Page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <?=$this->session->flashdata('pesan')?>
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Custom Menu Page</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <? echo form_open_multipart('',array('class'=>''));?>
            <input type="hidden" name="id" class="form-control" value="<?=$row_id?>">
              <div class="form-group <? !empty(form_error('title'))?printf('has-error'):'' ?>">
                <?
          echo form_label('Title','title');
          echo form_error('title', '<span class="help-block">', '</span>');
              $data = array(
                'name'        => 'title',
                'id'          => 'title',
                'class'       => 'form-control',
                'value'       => $row_title,
                'rows'        => '2',
                'style'       => 'font-size:20px',
                );
              echo form_textarea($data);
        ?>
              </div>
              <div class="form-group <? !empty(form_error('cover_image'))?printf('has-error'):'' ?>">
                <?
          echo form_label('Cover Image','cover_image');
          ?>
          <div class="col-sm-12"><img src="<? !empty($row_image)&&file_exists(FCPATH.$row_image)?printf(base_url().ltrim($row_image,'/')):printf(base_url().'assets/default/no_image_small.png') ?>"></div>
          <?
          echo form_error('cover_image', '<span class="help-block">', '</span>');
        ?>
        <input type="file" name="cover_image" class="form-control" accept="image/*">
              </div>
              <div class="form-group <? !empty(form_error('description'))?printf('has-error'):'' ?>">
                <?
            echo form_label('Description','description');
          echo form_error('description', '<span class="help-block">', '</span>');
          echo form_textarea('description',$row_description,'class="form-control"');
        ?>
              </div>

              <? /*
              <div class="form-group <? !empty(form_error('publish'))?printf('has-error'):'' ?>">
                <?
                  echo form_label('Content Type','content_type_id');
          echo form_error('content_type_id', '<span class="help-block">', '</span>');
        ?>
            <?
              $options = array(
                '1' => 'Menu Page',
                '2' => 'News',
                      );
              echo form_dropdown('content_type_id', $options, $row_content_type_id, 'class="form-control"');
            ?>
              </div>
              */ ?>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group <? !empty(form_error('content'))?printf('has-error'):'' ?>">
                <?
                  echo form_label('Content','content');
          echo form_error('content', '<span class="help-block">', '</span>');
          echo form_textarea('content',$row_content,'id="editor_content" class="form-control"');
        ?>
              </div>
                            <div class="form-group <? !empty(form_error('publish'))?printf('has-error'):'' ?>">
                <?
                  echo form_label('Publish','publish');
          echo form_error('publish', '<span class="help-block">', '</span>');
        ?>
        <input type="checkbox" name="publish" <?$row_publish==1?print('checked'):''?>>
              </div>
              <div class="form-group <? !empty(form_error('meta'))?printf('has-error'):'' ?>">
            <? /*
          echo form_label('Meta','meta');
          echo form_error('meta', '<span class="help-block">', '</span>');
          echo form_textarea('meta',$row_meta,'class="form-control"');
            */ ?>
              <div class="box-footer">
              <? echo form_submit('submit', 'SAVE', 'class="btn btn-info pull-right"');?>
              </div>
            </div>
                  <script>
        var editor = CKEDITOR.instances['editor_content'];
        if (editor) { editor.destroy(true); }
        CKEDITOR.replace( 'editor_content' );
      </script>
            <? echo form_close();?>
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