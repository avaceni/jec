<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        My Profile
        <small>Edit your profile here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">My Profile</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Profile Form</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
          </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-6">
            <? echo form_open('',array('class'=>''));?>
              <div class="form-group">
                <?
					echo form_label('First name','first_name');
					echo form_error('first_name');
					echo form_input('first_name',set_value('first_name',$user->first_name),'class="form-control"');
				?>
              </div>
              <div class="form-group">
                <?
					echo form_label('Last name','last_name');
					echo form_error('last_name');
					echo form_input('last_name',set_value('last_name',$user->last_name),'class="form-control"');
				?>
              </div>
              <div class="form-group">
                <?
	    			echo form_label('Company','company');
					echo form_error('company');
					echo form_input('company',set_value('company',$user->company),'class="form-control"');
				?>
              </div>
              <div class="form-group">
                <?
                	echo form_label('Phone','phone');
					echo form_error('phone');
					echo form_input('phone',set_value('phone',$user->phone),'class="form-control"');
				?>
              </div>
            </div>
            <!-- /.col -->
            <div class="col-md-6">
              <div class="form-group">
                <?
                	echo form_label('Username','username');
					echo form_error('username');
					echo form_input('username',set_value('username',$user->username),'class="form-control" readonly');
				?>
              </div>
              <div class="form-group">
                <?
                	echo form_label('Email','email');
					echo form_error('email');
					echo form_input('email',set_value('email',$user->email),'class="form-control" readonly');
				?>
              </div>
              <div class="form-group">
                <?
                	echo form_label('Change password','password');
					echo form_error('password');
					echo form_password('password','','class="form-control"');
				?>
              </div>
              <div class="form-group">
                <?
					echo form_label('Confirm changed password','password_confirm');
					echo form_error('password_confirm');
					echo form_password('password_confirm','','class="form-control"');
				?>
              </div>
              <div class="box-footer">
           		<? echo form_submit('submit', 'SAVE', 'class="btn btn-info pull-right"');?>
              </div>
            </div>
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