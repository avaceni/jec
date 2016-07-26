<?
$row_id=!empty($this->recent_data['id'])?$this->recent_data['id']:"";
$row_title=!empty($this->recent_data['title'])?$this->recent_data['title']:"";
$row_description=!empty($this->recent_data['description'])?$this->recent_data['description']:"";
$row_content=!empty($this->recent_data['content'])?$this->recent_data['content']:"";
$row_content_type_id=!empty($this->recent_data['content_type_id'])?$this->recent_data['content_type_id']:"";
$row_image=!empty($this->recent_data['image_thumbnail'])?$this->recent_data['image_thumbnail']:(base_url().'assets/default/no_image_small.png');
$row_publish=!empty($this->recent_data['publish'])?$this->recent_data['publish']:"";
$row_meta_keywords=!empty($this->recent_data['meta_keywords'])?$this->recent_data['meta_keywords']:"";
$row_meta_description=!empty($this->recent_data['meta_description'])?$this->recent_data['meta_description']:"";
$row_meta_author=!empty($this->recent_data['meta_author'])?$this->recent_data['meta_author']:"";

?>
<div class="row">
	<p class="row-margin-top-bottom"> <a href="<?=base_url().'admin/content'?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
	</p>
	<div class="panel panel-default row-margin-top-bottom">
		<div class="panel-heading"><b>Content Form</b></div>
		<div class="panel-body">
			<?=$this->session->flashdata('pesan')?>
			<? echo form_open_multipart('',array('class'=>''));?>
			<table class="table table-striped">
				<tr>
					<td style="width:15%;"><? echo form_label('Title','title');?></td>
					<td>
						<div class="col-sm-8">
							<input type="hidden" name="id" class="form-control" value="<?=$row_id?>">
							<?
							$data = array(
								'name'        => 'title',
								'id'          => 'username',
								'class'       => 'form-control',
								'value'       => $row_title,
								'maxlength'   => '10',
								'size'        => '50',
								'style'       => 'font-size:20px',
								);
							echo form_input($data);
							?>
							<? //echo form_input('title',$row_title,'class="form-control"');?>
							<div class="form-error"><? echo form_error('title');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Cover Image','cover_image');?></td>
					<td>
						<div class="col-sm-12"><img src="<? !empty($row_image)&&file_exists(FCPATH.$row_image)?printf(base_url().ltrim($row_image,'/')):printf(base_url().'assets/default/no_image_small.png') ?>"></div>
						<div class="col-sm-8">
							<input type="file" name="cover_image" class="form-control" accept="image/*">
							<? //echo form_input('cover_image',$row_image,'class="form-control"');?>
							<div class="form-error"><? echo form_error('cover_image');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Description','description');?></td>
					<td>
						<div class="col-sm-12">
							<!-- <textarea name="description" class="form-control" rows="3"><?=$row_description?></textarea> -->
							<? echo form_textarea('description',$row_description,'class="form-control"');?>
							<div class="form-error"><? echo form_error('description');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Content','content');?></td>
					<td>
						<div class="col-sm-12">
							<? echo form_textarea('content',$row_content,'id="editor_content" class="form-control"');?>
							<div class="form-error"><? echo form_error('content');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Publish','publish');?></td>
					<td>
					<div class="col-sm-4">
						<input type="checkbox" name="publish" <?$row_publish==1?print('checked'):''?>>
						<? //echo form_checkbox('publish','',$row_publish); ?>
						<div class="form-error"><? echo form_error('publish');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Content Type','content_type_id');?></td>
					<td>
					<div class="col-sm-4">
						<?
							$options = array(
								'1'	=> 'Page',
								'2'	=> 'Portofolio',
		                	);
							echo form_dropdown('content_type_id', $options, $row_content_type_id, 'class="form-control"');
						?>
						<? //echo form_checkbox('publish','',$row_publish); ?>
						<div class="form-error"><? echo form_error('content_type_id');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Meta Key','meta_keywords');?></td>
					<td>
						<div class="col-sm-4">
							<!-- <input type="text" name="meta_keywords" class="form-control" value="<?=$row_meta_keywords?>"> -->
							<? echo form_input('meta_keywords',$row_meta_keywords,'class="form-control"');?>
							<div class="form-error"><? echo form_error('meta_keywords');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Meta Description','meta_description');?></td>
					<td>
						<div class="col-sm-4">
							<!-- <input type="text" name="meta_description" class="form-control" value="<?=$row_meta_description?>"> -->
							<? echo form_input('meta_description',$row_meta_description,'class="form-control"');?>
							<div class="form-error"><? echo form_error('meta_description');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td><? echo form_label('Meta Author','meta_author');?></td>
					<td>
						<div class="col-sm-4">
							<!-- <input type="text" name="meta_author" class="form-control" value="<?=$row_meta_author?>"> -->
							<? echo form_input('meta_author',$row_meta_author,'class="form-control"');?>
							<div class="form-error"><? echo form_error('meta_author');?></div>
						</div>
					</td>
				</tr>
				<tr>
					<td colspan="2">
						<input type="submit" class="btn btn-success" value="Save">
						<button type="reset" class="btn btn-default">Reset</button>
					</td>
				</tr>
			</table>
			<script>
				var editor = CKEDITOR.instances['editor_content'];
				if (editor) { editor.destroy(true); }
				CKEDITOR.replace( 'editor_content' );
			</script>
			<?php echo form_close();?>
		</div>
	</div>    <!-- /panel -->
</div>