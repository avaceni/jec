<?
$CI =& get_instance();
?>
<div class="container"><!-- start main -->
	<div class="main row">
		<h2 class="style">list of projects</h2>
		<?
		$portofolio_data = array('1','2','3','4','5');
		$i = 1;
		foreach($this->data['data']->result() as $key => $rowContent){
			if($i%4==1){
				?>
				<div class="grids_of_4 row">
					<?
				}
				?>
				<div class="col-md-3 images_1_of_4">
					<div class="fancyDemo">
						<a rel="group" title="" href="<? echo base_url()."content/{$rowContent->id}" ?>"><img src="<?
							!empty($rowContent->image_list)&&file_exists(FCPATH.$rowContent->image_list)?printf(base_url().ltrim($rowContent->image_list,'/')):printf(base_url().'assets/default/no_image_medium.png')
							?>" alt=""class="img-responsive"/></a>
						</div>
						<h3><a href="<? echo base_url()."content/{$rowContent->id}" ?>"><?= $rowContent->title ?></a></h3>
						<p class="para"><?
							echo $CI->general_function->shortText($rowContent->description, 120) ?></p>
							<h4><a href="<? echo base_url()."content/{$rowContent->id}" ?>">Selengkapnya</a> </h4>
						</div>
						<?
						if($i%4==0){
							?>
						</div>
						<?
					}
					$i++;
				}
				?>
			</div>
		</div><!-- end main -->
	</div>