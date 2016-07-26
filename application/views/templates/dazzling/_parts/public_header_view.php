<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<html lang="en-US" prefix="og: http://ogp.me/ns#">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title><? $this->uri->segment(1)!=''?printf(ucwords($this->uri->segment(1)).' - Jogja Education Center'):printf('Jogja Education Center') ?></title>
<? /*
<meta name="description" content="Free Flat Design WordPress Bootstrap Theme"/>
<meta name="robots" content="noodp"/>
<link rel="canonical" href="https://colorlib.com/dazzling/" />
<link rel="next" href="https://colorlib.com/dazzling/page/2/" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Dazzling Demo - Free Flat Design WordPress Bootstrap Theme" />
<meta property="og:description" content="Free Flat Design WordPress Bootstrap Theme" />
<meta property="og:url" content="https://colorlib.com/dazzling/" />
<meta property="og:site_name" content="Dazzling Demo" />

<!--[if lte IE 8]>
<link rel='stylesheet' id='jetpack-carousel-ie8fix-css'  href='https://colorlib.com/dazzling/wp-content/plugins/jetpack/modules/carousel/jetpack-carousel-ie8fix.css?ver=20121024' type='text/css' media='all' />
<![endif]-->
*/ ?>
<link rel="icon" href="<?=base_url().'assets/dazzling/images/default/jec_logo.png'?>" type="image/png">
<link rel='stylesheet' href="<?php echo base_url('assets/dazzling/css/bootstrap.min.css');?>" type='text/css' media='all' />
<link rel='stylesheet' href="<?php echo base_url('assets/dazzling/css/font-awesome.min.css');?>" type='text/css' media='all' />
<link rel='stylesheet' href="<?php echo base_url('assets/dazzling/css/flexslider.css');?>" type='text/css' media='all' />
<link rel='stylesheet' href="<?php echo base_url('assets/dazzling/css/style.css');?>" type='text/css' media='all' />
<link rel="stylesheet" href="<?php echo base_url('assets/dazzling/css/blueimp-gallery.min.css');?>">
<link rel="stylesheet" href="<?php echo base_url('assets/dazzling/css/bootstrap-image-gallery.min.css');?>">
  <link type="text/css" rel="Stylesheet" 
    href="<?php echo CaptchaUrls::LayoutStylesheetUrl() ?>" />

<script type='text/javascript' src="<?php echo base_url('assets/dazzling/js/jquery.js');?>"></script>
<script type='text/javascript' src="<?php echo base_url('assets/dazzling/js/bootstrap.min.js');?>"></script>

<? /*
<link rel='dns-prefetch' href='//v0.wordpress.com'>
<link rel='dns-prefetch' href='//jetpack.wordpress.com'>
<link rel='dns-prefetch' href='//s0.wp.com'>
<link rel='dns-prefetch' href='//s1.wp.com'>
<link rel='dns-prefetch' href='//s2.wp.com'>
<link rel='dns-prefetch' href='//public-api.wordpress.com'>
<link rel='dns-prefetch' href='//0.gravatar.com'>
<link rel='dns-prefetch' href='//1.gravatar.com'>
<link rel='dns-prefetch' href='//2.gravatar.com'>
*/ ?>
<style type='text/css'>img#wpstats{display:none}</style><style type="text/css">.entry-content {font-family: Helvetica Neue,Helvetica,Arial,sans-serif; font-size:14px; font-weight: normal; color:#6B6B6B;}.osc_servicebox .glyphicon {
	font-size: 40px;
	padding-top: 5px;
	background: #1FA67A;
	border-radius: 50%;
	color: #fff;
}
.osc_servicebox {
	text-align: center;
}
p.site-description {
	display: none;
}</style>		<style type="text/css">.recentcomments a{display:inline !important;padding:0 !important;margin:0 !important;}</style>
<style type="text/css">
	.navbar > .container .navbar-brand {
		color: #1fa67a;
	}
</style>
	<!--[if lt IE 9]>
<script src="https://colorlib.com/dazzling/wp-content/themes/dazzling/inc/js/html5shiv.min.js"></script>
<script src="https://colorlib.com/dazzling/wp-content/themes/dazzling/inc/js/respond.min.js"></script>
<![endif]-->

</head>

<body class="home blog infinite-scroll">
	<div id="page" class="hfeed site">

		<nav class="navbar navbar-default" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>

					<div id="logo">
						<span class="site-title"><a class="navbar-brand" href="#" title="Jogja Education Center" rel="home">Jogja Education Center</a></span>
					</div><!-- end of #logo -->
					<p class="site-description">Free Flat Design WordPress Bootstrap Theme</p>

				</div>
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul id="menu-all-pages" class="nav navbar-nav">
						<li class="menu-item <? strtolower($this->uri->segment(1))==''?printf('active'):'' ?>">
							<a title="Home" href="<?=base_url();?>">Home</a>
						</li>
						<li class="<? strtolower($this->uri->segment(1))=='profile'?printf('active'):'' ?> menu-item menu-item-type-post_type menu-item-object-page">
							<a title="Gallery" href="<?=base_url().'profile';?>">Profil</a>
						</li>
						<li class="<? strtolower($this->uri->segment(1))=='comment'?printf('active'):'' ?> menu-item menu-item-type-post_type menu-item-object-page">
							<a title="Shortcodes" href="<?=base_url().'comment';?>">Buku Tamu</a>
						</li>
						<? 
						if(
							strtolower($this->uri->segment(1))=='info-pt-khusus' ||
							strtolower($this->uri->segment(1))=='info-pt-kedinasan' ||
							strtolower($this->uri->segment(1))=='info-pt-kesehatan' ||
							strtolower($this->uri->segment(1))=='info-bimbingan-tes' ||
							strtolower($this->uri->segment(1))=='privat'
							){ $menu_program = "active"; }
							else{ $menu_program = ""; }
						?>
						<li  class="menu-item dropdown <?= $menu_program ?>">
							<a title="About" href="#" data-toggle="dropdown" class="dropdown-toggle">Program <span class="caret"></span></a>
							<ul role="menu" class=" dropdown-menu">
							<li class="menu-item <? strtolower($this->uri->segment(1))=='info-pt-khusus'?printf('active'):'' ?>"><a href="<?=base_url().'info-pt-khusus';?>"><span class="fa fa-graduation-cap"></span>&nbsp;Info PT Khusus</a></li>
							<li class="menu-item <? strtolower($this->uri->segment(1))=='info-pt-kedinasan'?printf('active'):'' ?>"><a href="<?=base_url().'info-pt-kedinasan';?>"><span class="fa fa-black-tie"></span>&nbsp;Info PT Kedinasan</a></li>
							<li class="menu-item <? strtolower($this->uri->segment(1))=='info-pt-kesehatan'?printf('active'):'' ?>"><a href="<?=base_url().'info-pt-kesehatan';?>"><span class="fa fa-medkit"></span>&nbsp;Info PT Kesehatan</a></li>
							<li class="menu-item <? strtolower($this->uri->segment(1))=='info-bimbingan-tes'?printf('active'):'' ?>"><a href="<?=base_url().'info-bimbingan-tes';?>"><span class="fa fa-file"></span>&nbsp;Info Bimbingan Tes</a></li>
							<li class="menu-item <? strtolower($this->uri->segment(1))=='privat'?printf('active'):'' ?>"><a href="<?=base_url().'privat';?>"><span class="fa fa-star-o"></span>&nbsp;Privat</a></li><? /*
							<li role="presentation" class="divider"></li>
							<li id="menu-item-1641" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-1641"><a title="glyphicon-comment" href="https://colorlib.com/dazzling/about/page-with-comments/"><span class="glyphicon glyphicon-comment"></span>&nbsp;Page with comments</a></li>
							<li role="presentation" class="divider"></li>
							<li role="presentation" class="disabled"><a href="#">This item is disabled</a></li> */?>
						</ul>
					</li>
					<li class="menu-item <? strtolower($this->uri->segment(1))=='news'?printf('active'):'' ?>"><a title="Languages" href="<?=base_url().'news';?>">Berita</a></li>
					<li class="menu-item <? strtolower($this->uri->segment(1))=='register'?printf('active'):'' ?>"><a title="Languages" href="<?=base_url().'register';?>">Pendaftaran Online</a></li>
					<li class="menu-item <? strtolower($this->uri->segment(1))=='gallery'?printf('active'):'' ?>"><a title="Languages" href="<?=base_url().'gallery';?>">Galeri</a></li>
					<li class="menu-item <? strtolower($this->uri->segment(1))=='contact'?printf('active'):'' ?>"><a title="Languages" href="<?=base_url().'contact';?>">Kontak</a></li>
					</ul></div>		</div>
				</nav>