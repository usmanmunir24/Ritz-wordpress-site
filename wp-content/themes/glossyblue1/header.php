<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title><?php bloginfo('name'); ?> <?php if(is_single()) { ?>
&raquo; Blog Archive <?php } ?> <?php wp_title(); ?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" media="screen"/>
</head>
<body>
<div id="page">
<div id="header">
		<div id="headerimg">
			<h1><a href="<?php echo get_option('home');?>/"><?php bloginfo('name');?></a></h1>
			<div class="description"><?php bloginfo('description');?></div>
		</div>
		<ul id="nav">
			<?php wp_list_pages('sort_column=menu_order&depth=1&title_li=');?>
			<!--
			<li><a href="#">Home</a></li>
			<li><a href="#">About</a></li>
			<li><a href="#">Portfolio</a></li>
			<li><a href="#">Links</a></li>
			<li><a href="#">Contact</a></li>
			-->
		</ul>
	</div>
	<!-- /Header-->