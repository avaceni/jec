<?php
$CI =& get_instance();
?>
<div class="blog"><!-- start main -->
	<div class="container">
		<div class="main row">
			<div class="col-md-8 blog_left">
				<h2 class="style">our recent blogs</h2>
				<?
				foreach ($this->data['data']->result() as $key => $rowContent) {
				?>
				<div class="blog_main">
					<a href="<? echo base_url()."content/{$rowContent->id}" ?>"><img width="600px" src="<?
									!empty($rowContent->image_popular)&&file_exists(FCPATH.$rowContent->image_popular)?printf(base_url().ltrim($rowContent->image_popular,'/')):printf(base_url().'assets/default/no_image_big.png')
									?>" alt="" class="blog_img img-responsive"/></a>
					<h4><a href="<? echo base_url()."content/{$rowContent->id}" ?>"><?= $rowContent->title ?></a></h4>
						<div class="blog_list pull-left">
							  <ul class="list-unstyled">
								<li><i class="fa fa-calendar-o"></i><span><?
					 			echo $CI->general_function->getDateFormat($rowContent->created_time); ?></span></li>
								<?/*<li><a href="#"><i class="fa fa-comment"></i><span>Comments</span></a></li>*/?>
						  		<li><i class="fa fa-user"></i><span><? echo $rowContent->username ?></span></li>
						  		<li><a href="#"><i class="fa fa-eye"></i><span><?= $rowContent->total_view ?></span></a></li>
							  </ul>
						</div>
					<div class="b_left pull-right">
						<?/*<a href=""><i class="fa fa-heart"></i><span> 28</span></a>*/?>
					</div>
					<div class="clearfix"></div>
					<p class="para"><?
					 echo $CI->general_function->shortText($rowContent->description, 120) ?></p>
					<div class="read_more btm">
						<a href="<? echo base_url()."content/{$rowContent->id}" ?>">selengkapnya</a>
					</div>
				</div>
				<?
					}
				?>
			</div>
			<div class="col-md-4 blog_right">
				<ul class="ads_nav list-unstyled">
					<h4>Ads 125 x 125</h4>
						<li><a href="#"><img src="<?php echo site_url('assets/public/images/ads_pic.jpg');?>" alt=""> </a></li>
						<li><a href="#"><img src="<?php echo site_url('assets/public/images/ads_pic.jpg');?>" alt=""> </a></li>
						<li><a href="#"><img src="<?php echo site_url('assets/public/images/ads_pic.jpg');?>" alt=""> </a></li>
						<li><a href="#"><img src="<?php echo site_url('assets/public/images/ads_pic.jpg');?>" alt=""> </a></li>
					<div class="clearfix"></div>
				</ul>
				<ul class="tag_nav list-unstyled">
					<h4>tags</h4>
						<li class="active"><a href="#">art</a></li>
						<li><a href="#">awesome</a></li>
						<li><a href="#">classic</a></li>
						<li><a href="#">photo</a></li>
						<li><a href="#">wordpress</a></li>
						<li><a href="#">videos</a></li>
						<li><a href="#">standard</a></li>
						<li><a href="#">gaming</a></li>
						<li><a href="#">photo</a></li>
						<li><a href="#">music</a></li>
						<li><a href="#">data</a></li>
						<div class="clearfix"></div>
				</ul>
				<!-- start social_network_likes -->
					<div class="social_network_likes">
				      		 <ul class="list-unstyled">
				      		 	<li><a href="#" class="tweets"><div class="followers"><p><span>2k</span>Followers</p></div><div class="social_network"><i class="twitter-icon"> </i> </div></a></li>
				      			<li><a href="#" class="facebook-followers"><div class="followers"><p><span>5k</span>Followers</p></div><div class="social_network"><i class="facebook-icon"> </i> </div></a></li>
				      			<li><a href="#" class="email"><div class="followers"><p><span>7.5k</span>members</p></div><div class="social_network"><i class="email-icon"> </i></div> </a></li>
				      			<li><a href="#" class="dribble"><div class="followers"><p><span>10k</span>Followers</p></div><div class="social_network"><i class="dribble-icon"> </i></div></a></li>
				      			<div class="clear"> </div>
				    		</ul>
		          	</div>
				<div class="news_letter">
					<h4>news letter</h4>
						<form>
							<span><input type="text" placeholder="Your email address"></span>
							<span  class="pull-right fa-btn btn-1 btn-1e"><input type="submit" value="subscribe"></span>
						</form>
				</div>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
</div><!-- end main -->
