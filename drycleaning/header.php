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
		<div class="header-in">
			<div class="header-logo">
				<img src="<?php bloginfo('template_url');?>/assets/images/sofa3-logo.png" alt="">
				<p class="logo-title">химчистка-24.рф</p>
			</div>
			<!--
			<div class="header-nav">
				<nav>
				<?php
					wp_nav_menu( [
						'theme_location'  => 'header_menu',
						'menu'            => '', 
						'container'       => '',
					]);
				?>
				</nav>
			</div>
-			-->
			<div class="header-icons">
				<p class="header-icons-left">Оценим по фото</p>
				<i class="fas fa-long-arrow-alt-right"></i>
				<p class="header-icons-right">
					<a href="https://t.me/<?=$options["tg_main"]?>" class="contacts-telegram"></a>
					<a href="https://wa.me/<?=clean_phone($options["whatsapp_main"])?>" class="contacts-whatsapp"></a>
					<a href="viber://chat?number=<?=$options["viber_main"]?>" class="contacts-viber"></a>
				</p>
			</div>
			<div class="header-contact">
				<p class="header-phone">
					<a href="tel:<?=clean_phone($options["phone_main"]);?>" class="link-phone"><?=$options["phone_main"]?></a>
				</p>
				<p class="header-email"><a href="mailto:<?=$options["email_main"]?>"><?=$options["email_main"]?></a></p>
			</div>
		</div>
	</div>
</header>