<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>">
<title><?php echo wp_get_document_title(); ?></title>
<link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="referrer" content="no-referrer">
<?php $options = get_option('vl_options'); ?>
<?php if(!empty($options['header_script'])): ?>
<?=trim($options['header_script']);?>
<?php endif; ?>
<?php wp_head(); ?>
</head>
<body <?php echo body_class(); ?>>
<header>
	<div class="header-main center">
		<span class="menu-link active"><i class="fas fa-bars"></i></span>
		<div class="header-logo">
			<img src="<?php bloginfo('template_url'); ?>/assets/images/logo1.png" alt="">
			<div>
				<p class="header-title"><?php bloginfo("name"); ?></p>
				<p class="header-description"><?php bloginfo("description"); ?></p>
			</div>
		</div>
		<div class="header-nav">
			<nav>
			<?php if(!isMobile()): ?>
				<?php
					wp_nav_menu( [
						'theme_location'  => 'header_menu',
						'menu'            => '', 
						'container'       => '',
					]);
				?>
			<?php else: ?>
			<?php
					wp_nav_menu( [
						'theme_location'  => 'mobil_menu',
						'menu'            => '', 
						'container'       => '',
					]);
				?>
			<?php endif; ?>
			</nav>
			<div class="nav-close">&#215;</div>
		</div>
		<div class="header-contact">
			<p class="header-phone">
				<a href="tg://resolve?domain=<?=$options["tele_main"]?>" class="link-telegram"></a>
				<a href="whatsapp://send?phone=<?=$options["whatsapp_main"]?>" class="link-whatsap"></a>
				<a href="tel:<?=clean_phone($options["phone_main"]);?>" class="link-phone"><?=$options["phone_main"]?></a>
			</p>
			<p class="header-order"><a href="#" class="js-modal">Обратный звонок</a></p>
		</div>
	</div>
</header>