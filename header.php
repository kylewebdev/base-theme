<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0" />
	<meta name="description" content="Put your description here.">

	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>

	<div id="page">
		<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', '_base'); ?></a>

		<header>
			<div class="container mx-auto text-primary">
				<!-- <a href="/">
					<h1>Header</h1>
				</a> -->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Primary Menu', '_base'); ?></button>

					<?php wp_nav_menu(
						array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
						)
					); ?>
				</nav>
			</div>
		</header>
		<main id="primary" class="site-main">
