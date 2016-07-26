<?
foreach($this->data['data'] as $rowdata){
	$row_id=$rowdata->id;
	$row_title=$rowdata->title;
	$row_image_popular=$rowdata->image_popular;
	$row_description=$rowdata->description;
	$row_content=$rowdata->content;
	$row_publish=$rowdata->publish;
	$row_meta_keywords=$rowdata->meta_keywords;
	$row_meta_description=$rowdata->meta_description;
	$row_meta_author=$rowdata->meta_author;
}
?>
<div class="row">
	<div class="row-margin-top-bottom ">
		<div class="content-navigation"> <a href="<?=base_url().'admin/content'?>" class="btn btn-sm btn-primary"><i class="fa fa-arrow-left"></i> Back</a>
		</div>
		<div class="content-navigation" style="margin-left: 10px"> <a href="<?=base_url().'admin/content/edit/'.$row_id?>" class="btn btn-sm btn-info"><i class="glyphicon glyphicon-pencil"></i> Edit</a>
		</div>
	</div>
</div>
<div class="row">
	<!-- Main component for a primary marketing message or call to action -->
	<div class="panel panel-default">
		<div class="panel-heading"><b>Detail</b></div>
		<div class="panel-body">

			<table class="table table-striped">
				<tr>
					<td>Title</td>
					<td><?=$row_title?></td>
				</tr>
				<tr>
					<td>Image</td>
					<td><img src="<?
						!empty($row_image_popular)&&file_exists(FCPATH.$row_image_popular)?printf(base_url().ltrim($row_image_popular,'/')):printf(base_url().'assets/default/no_image_big.png')
						?>"></td>
					</tr>
					<tr>
						<td>Description</td>
						<td><?=$row_description?></td>
					</tr>
					<tr>
						<td>Content</td>
						<td><?=stripslashes($row_content)?></td>
					</tr>
					<tr>
						<td>Publish</td>
						<td><? $row_publish==1?print('<div class="fa fa-check fa-3x ico-color-green"></div>'):print('<div class="fa fa-times fa-2x ico-color-red"></div>'); ?></td>
					</tr>
					<tr>
						<td>Meta Key</td>
						<td><?=$row_meta_keywords?></td>
					</tr>
					<tr>
						<td>Meta Des</td>
						<td><?=$row_meta_description?></td>
					</tr>
					<tr>
						<td>Meta Auth</td>
						<td>
							<?=$row_meta_author?>
						</td>
					</tr>

				</table>
			</div>
		</div>    <!-- /panel -->

	</div> <!-- /container -->