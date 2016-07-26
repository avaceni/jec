<?php
$CI =& get_instance();
?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE HTML>
<html>
<head>
<title>Hexa a portfolio bootstrap Website Template | Home :: w3layouts</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Bootstrap -->
<link href="<?php echo site_url('assets/admin/css/bootstrap.min.css');?>" rel='stylesheet' type='text/css' />
<link href="<?php echo site_url('assets/admin/css/bootstrap.css');?>" rel='stylesheet' type='text/css' />
<?/*<link href='http://fonts.googleapis.com/css?family=Kreon:300,400,700' rel='stylesheet' type='text/css'>*/?>
<link href="<?php echo site_url('assets/public/css/style.css');?>" rel="stylesheet" type="text/css" media="all" />
   	<link rel="stylesheet" href="<?php echo site_url('assets/admin/css/font-awesome.min.css');?>">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
     <script src="https://oss.maxcdn.com/libs/respond.web/js/1.4.2/respond.min.js"></script>
<![endif]-->
<!-- start plugins -->
<script type="text/javascript" src="<?php echo site_url('assets/admin/js/jquery.min.js');?>"></script>
	<script>
		$(function() {
			var pull 		= $('#pull');
				menu 		= $('nav ul');
				menuHeight	= menu.height();
			$(pull).on('click', function(e) {
				e.preventDefault();
				menu.slideToggle();
			});
			$(window).resize(function(){
        		var w = $(window).width();
        		if(w > 320 && menu.is(':hidden')) {
        			menu.removeAttr('style');
        		}
    		});
		});
	</script>
</head>
<body>
<div class="header_bg" id="home"><!-- start header -->
<div class="container">
	<div class="row header text-center specials">
		<div class="h_logo">
			<a href="index.html"><img src="<?php echo site_url('assets/public/images/logo.png');?>" alt="" class="responsive"/></a>
		</div>
		<nav class="top-nav">
			<ul class="top-nav nav_list">
				<li><a href="<? echo base_url()."portofolio" ?>">portfolio</a></li>
				<li class="page-scroll"><a href="#about">About</a></li>
				<li class="logo page-scroll"><a title="hexa" href="<? echo base_url() ?>"><img src="<?php echo site_url('assets/public/images/logo.png');?>" alt="" class="responsive"/></a></li>
			    <li class="page-scroll"><a href="<? echo base_url()."blog" ?>">blog</a></li>
				<li class="page-scroll"><a href="#contact">get in touch</a></li>
			</ul>
			<a href="#" id="pull"><img src="<?php echo site_url('assets/public/images/nav-icon.png');?>" title="menu" /></a>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
</div>
