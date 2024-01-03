<?php $options = get_option('vl_options'); ?>
<footer>
	<div class="footer-main center">
		<div class="footer-logo">
			<div class="footer-logo-img">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/logo1.png" alt="">
				<div>
					<p class="header-title"><?php bloginfo("name"); ?></p>
					<p class="header-description"><?php bloginfo("description"); ?></p>
				</div>
			</div>
			<p>
				<?=$options["footer_txt"]?>
			</p>
		</div>
		<div class="footer-contact">
			<h3>Контакты</h3>
			<p><a href="tel:<?=clean_phone($options['phone_main'])?>" class="footer-contact-phone"><?=$options["phone_main"]?></a></p>
			<p><a href="mailto:<?=$options['email_main']?>" class="footer-contact-mail"><?=$options['email_main']?></a></p>
			<p class="footer-adres"><?=$options["adres_main"]?></p>
			<p class="footer-social">
				<a href="tg://resolve?domain=<?=$options["tele_main"]?>" class="link-telegram"></a>
				<a href="whatsapp://send?phone=<?=$options["whatsapp_main"]?>" class="link-whatsap"></a>
			</p>
		</div>
		<div class="footer-menu">
			<?=$options["footer_legal"]?>
		</div>
	</div>
</footer>
<div class="modal-answer-wrap">
	<div class="modal-answer-in">
		<span class="modal-answer-close"></span>
		<p>Благодарим за запрос!</p>
		<p>Мы свяжемся с вами в ближайшее время!</p>
	</div>
</div>
<div id="js-modal-wraper" class="modal-wraper">
		<div class="modal-main">
			<div class="close-img"></div>
			<?php $options=get_option('vl_options'); ?>
			<div class="modal-form">
				<h2>Обратный звонок</h2>
				<form action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" method="post" class="application-form send-form js-send-form send-form-captcha" id="application-form" autocomplete="off">
					<p><input type="text" name="name" class="name" placeholder="Имя*"></p>
					<p class="message-p"><input type="text" name="message" class="message" placeholder="Cообщение*"></p>
					<p><input type="text" name="phone" class="phone" placeholder="+7(___)-___-____*"></p>
					<p><input type="hidden" class="theme" value="<?php echo "Обратный звонок";?>"></p>
					<div class="span-error">Заполните обязательные поля.</div>
					<p><textarea name="coment" class="coment" placeholder="Написать сообщение"></textarea></p>
					<div class="captcha-form">
							<script src='https://www.google.com/recaptcha/api.js'></script>
							<div class="g-recaptcha" data-sitekey="6Lc1FOsjAAAAAKeYCYxVtDpHaSDrS3cLd8vuLj7r"></div>
							<div class="captcha-error" id="recaptchaError"></div>
					</div>
					<p><input type="submit" name="order" value="Отправить"></p>
				</form>
			</div>
		</div>
</div>
<div class="footer-copy">
	<p>&copy; 2015-<?=date("Y")?>,&nbsp;<?php bloginfo("description"); ?></p>
</div>
<?php wp_footer(); ?>
<?php if(!empty($options['footer_script'])): ?>
<?=trim($options['footer_script']);?>
<?php endif; ?>
</body>
</html>