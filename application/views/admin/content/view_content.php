<!-- Main component for a primary marketing message or call to action -->
<div class="row">
	<div class="panel panel-default row-margin-top-bottom">
		<div class="panel-heading"><b>Content List</b></div>
		<div class="panel-body">
			<p><?=$this->session->flashdata('pesan')?> </p>
			<div class="col-lg-2 row-margin-bottom"><a href="http://127.0.0.1/code/admin/content/create" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-plus"></i> Add Content</a></div>
			<div class="clear"></div>
			<div class="col-lg-12">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>No</th>
							<th>Title</th>
							<th>Image</th>
							<th>Description</th>
							<th>Type</th>
							<th>Publish</th>							
							<? /*
							<th>Meta-Key</th>
							<th>Meta-Des</th>
							<th>Meta-Auth</th>
							*/ ?>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<? if($this->data['count'] == 0) { ?>
						<tr>
							<td colspan="6">Data tidak ditemukan</td>
						</tr>
						<? }else{
							$no=0;
							foreach($this->data['data']->result() as $key => $rowContent){?>
							<tr>
								<td><? echo $this->uri->segment(4)+$key+1 ?></td>
								<td><?=$rowContent->title?></td>								
								<td><img width="200px" src="<?
									!empty($rowContent->image_thumbnail)&&file_exists(FCPATH.$rowContent->image_thumbnail)?printf(base_url().ltrim($rowContent->image_thumbnail,'/')):printf(base_url().'assets/default/no_image_small.png')
									?>"></td>
								<td><?=$rowContent->description?></td>
								<td class="center"><? $rowContent->content_type_id==1?print('Page'):print('Portofolio') ?></td>
								<td class="center"><? $rowContent->publish==1?print('<div class="fa fa-check fa-3x ico-color-green"></div>'):print('<div class="fa fa-times fa-3x ico-color-red"></div>') ?></td>
								<? /*
								<td><?=$rowContent->meta_keywords?></td>
								<td><?=$rowContent->meta_description?></td>
								<td><?=$rowContent->meta_author?></td>
								*/ ?>
								<td>
									<a href="<?=base_url().'admin/content/edit/'.$rowContent->id?>" class="btn btn-info btn-sm"><i class="glyphicon glyphicon-pencil"></i></a>
									<a href="<?=base_url().'admin/content/detail/'.$rowContent->id?>" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i></a>
									<a href="<?=base_url().'admin/content/delete/'.$rowContent->id?>" class="btn btn-danger btn-sm" onclick="return confirm('Anda Yakin menghapus data ini?')"><i class="glyphicon glyphicon-trash"></i></a>
								</td>
							</tr>
							<? }
						}?>
					</tbody>
				</table>
				<?echo $this->data['pagging'];?>
			</div>
		</div>
	</div>    <!-- /panel -->
</div>