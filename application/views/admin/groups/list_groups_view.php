<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<?php
$CI =& get_instance();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Groups
        <small>List of Groups</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Groups</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
    	<div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Group Table</h3>
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
            if(!empty($groups))
			{
				echo '<table class="table table-bordered table-striped">';
				echo '<tbody>';
				echo
				'<tr>
                  <th>#</th>
                  <th>Group Name</th>
                  <th>Group Description</th>
                  <th></th>
                </tr>';
                $i = 1;
				foreach($groups as $group)
				{
					echo '<tr>';
					echo '<td>'.$i.'</td>'.'<td>'.$group->name.'</td><td>'.$group->description.'</td><td>'.anchor('admin/groups/edit/'.$group->id,'<i class="fa fa-pencil"></i>',array('class'=>'btn btn-info btn-sm'));
					if(!in_array($group->name, array('admin','members'))) echo ' '.anchor('admin/groups/delete/'.$group->id,'<i class="fa fa-trash"></i>',array('class'=>'btn btn-danger btn-sm'));
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