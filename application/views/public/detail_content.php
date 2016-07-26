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
<div class="blog"><!-- start main -->
	<div class="container">
		<div class="main row">
			<h2 class="style"><?= $row_title ?></h2>
			<div class="details row">
				<div class="col-md-6">
					<img width='600px' src="<?
									!empty($row_image_popular)&&file_exists(FCPATH.$row_image_popular)?printf(base_url().ltrim($row_image_popular,'/')):printf(base_url().'assets/default/no_image_big.png')
									?>" alt="" class="img-responsive"/>
				</div>
				<div class="">
					<?= stripslashes($row_content) ?>
</div>
		</div>
	</div>
</div><!-- end main -->