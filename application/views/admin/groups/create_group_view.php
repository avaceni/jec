<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
	<div class="row">
		<div class="col-lg-12">
			<h1 class="page-header">Create Group</h1>
		</div>
		<!-- /.col-lg-12 -->
	</div>
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
			<?php echo $this->session->flashdata('message');?>
			<?php echo form_open('',array('class'=>'form-horizontal'));?>
			<div class="form-group">
				<?php echo form_label('Group name','group_name');?>
				<?php echo form_error('group_name');?>
				<?php echo form_input('group_name','','class="form-control"');?>
			</div>
			<div class="form-group">
				<?php echo form_label('Group description','group_description');?>
				<?php echo form_error('group_description');?>
				<?php echo form_input('group_description','','class="form-control"');?>
			</div>
			<?php echo form_submit('submit', 'Create group', 'class="btn btn-primary btn-lg btn-block"');?>
			<?php echo form_close();?>
		</div>
	</div>