<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Users
        <small>List of Users</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">User Table</h3>
                <div class="box-tools">
                	<a href="<?php echo site_url('admin/users/create');?>" class="btn btn-info">Add User</a>
              	</div>
              <? /*             
				<div class="box-tools">
	                <ul class="pagination pagination-sm no-margin pull-right">
	                  <li><a href="#">«</a></li>
	                  <li><a href="#">1</a></li>
	                  <li><a href="#">2</a></li>
	                  <li><a href="#">3</a></li>
	                  <li><a href="#">»</a></li>
	                </ul>
              	</div>
              	*/ ?>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
            <?
            if(!empty($users))
			{
				echo '<table class="table table-bordered table-striped">';
				echo '<tbody>';
				echo
				'<tr>
                  <th>#</th>
                  <th>Username</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Last Login</th>
                  <th></th>
                </tr>';
                $i = 1;
				foreach($users as $user)
				{
					echo '<tr>';
					echo '<td>'.$i.'</td><td>'.$user->username.'</td><td>'.$user->first_name.' '.$user->last_name.'</td></td><td>'.$user->email.'</td><td>'.date('Y-m-d H:i:s', $user->last_login).'</td><td>';
					if($current_user->id != $user->id) echo anchor('admin/users/edit/'.$user->id,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info btn-sm')).' '.anchor('admin/users/delete/'.$user->id,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger btn-sm'));
					else echo '&nbsp;';
					echo '</td>';
					echo '</tr>';
					$i++;
				}
				echo '</tbody>';
				echo '</table>';
			}
            ?>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->