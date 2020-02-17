<?php
/**
 * The Header for our theme
 * @package WordPress
 * @subpackage Parker et Parker
 * @since Parker et Parker 1.0
 * @author Philippe BARTOLESCHI - Smart 7
 */
?>
<!DOCTYPE html>
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
	<title><?php wp_title( '|', true, 'right' ); ?></title>
	<meta http-equiv="imagetoolbar" content="false" />
	<link rel="dns-prefetch" href="//ajax.googleapis.com" />
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<!--[if lt IE 9]>
	    <script src="<?php echo get_template_directory_uri(); ?>/bower_components/html5shiv/dist/html5shiv.js"></script>
	<![endif]-->

	<?php wp_head(); ?>

	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/libs.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/sweetalert2.min.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/app.min.css"/>

	<?php $ua = fo('ua_code'); ?>
	<?php if ($ua): ?>
		<!-- Google Analytics -->
		<script>
			(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
					(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
				m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
			})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

			ga('create', '<?php echo $ua; ?>', 'auto');
			ga('send', 'pageview');
		</script>
		<!-- End Google Analytics -->
	<?php endif ?>
</head>
<body <?php body_class(); ?>>
<header>
	<?php display_main_menu() ?>
	<?php if (is_front_page()): ?>
		<?php display_front_slide(); ?>
	<?php else: ?>
		<?php display_head_page(); ?>
	<?php endif ?>
</header>