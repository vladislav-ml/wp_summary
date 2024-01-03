<?php get_header(); ?>
<?php $options = get_option('vl_options'); ?>
<section class="content-wraper">
	<div class="content-main center">
		<?php $page_id = 8; ?>
		<?php $page_main_arr = new WP_Query(array(
			"page_id" => $page_id,
			"posts_per_page" => 1,
		));  ?>
		<?php if ($page_main_arr -> have_posts()) :  
		while ($page_main_arr -> have_posts()) : $page_main_arr -> the_post(); ?>
					<h1 class="h1-title"><?php the_title(); ?></h1>
			<div class="content-in">
				<div class="content-left">
					<div class="content-left-in">
						<?php $advantages = CFS() -> get("advantages"); ?>
						<?php $steps = CFS() -> get("step_wraper"); ?>
						<?php $faqs = CFS() -> get("faq_wraper"); ?>
						<?php the_content(); ?>
					</div>
				</div>
				<div class="content-right">
					<div class="content-right-in">
						<h2>Вызвать специалиста</h2>
						<form action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" method="POST" class="form-send" autocomplete="off">
							<p><input type="text" name="name" class="name" placeholder="Имя"></p>
							<p><input type="text" name="phone" class="phone" placeholder="Телефон"></p>
							<div class="span-error">Заполните обязательные поля.</div>
							<p class="p-submit"><input type="submit" value="Заказать"><label></label></p>
						</form>
					</div>
				</div>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
	</div>
</section>

<!-- start block services -->
<?php get_template_part("services"); ?>
<!-- end block services -->

<!-- start block jobs -->
<?php get_template_part("jobs"); ?>
<!-- end block jobs -->

<!-- start block advantages -->
<?php if(!empty($advantages)): ?>
	<section class="adv-wraper" id="advantages">
		<div class="adv-main center">
		<?=$advantages?>
		</div>
	</section>
<?php endif; ?>
<!-- end block advantages -->

<!-- start block work -->
<?php if(!empty($steps)): ?>
<section class="work-wraper" id="works">
	<div class="work-main center">
		<h2 class="h2-title">Как мы работаем</h2>
		<div class="work-in">
			<?php $i = 1; ?>
			<?php foreach($steps as $step): ?>
				<div class="work-item">
					<div class="work-left">
						<h3><i><?=$i?></i><?=$step["step_title"]?></h3>
						<div><?=$step["step_text"]?></div>
					</div>
					<div class="work-right">
						<?=$step["step_icon"]?>
					</div>
				</div>
				<?php $i++; ?>
			<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- end block work -->

<!-- block faq -->
<?php if(!empty($faqs)): ?>
	<section class="faq-wraper" id="faq">
		<div class="faq-main center">
			<h2 class="h2-title">Часто задаваемые вопросы</h2>
			<div class="faq-in">	
				<?php foreach($faqs as $faq): ?>
					<div class="faq-item">
						<p class="faq-title"><?=$faq["faq_question"]?><span class="faq-icon">+</span></p>
						<div class="faq-text" style="display: none;">
							<p><?=$faq["faq_answer"]?></p>
						</div>
					</div>
				<?php endforeach; ?>
									
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- end block faq -->
<!-- start block contact -->
<section class="contacts-wraper">
	<div class="contacts-main center">
		<h2 class="h2-title">Наши контакты</h2>
		<div class="contacts-in">
			<div class="contacts-left">
				<a href="https://t.me/<?=$options["tg_main"]?>" class="contacts-telegram"></a>
				<a href="https://wa.me/<?=clean_phone($options["whatsapp_main"])?>" class="contacts-whatsapp"></a>
				<a href="viber://chat?number=<?=$options["viber_main"]?>" class="contacts-viber"></a>
			</div>
			<div class="contacts-right">
				<a href="tel:<?=clean_phone($options["phone_main"]);?>" class="contacts-phone"><?=$options["phone_main"]?></a>
				<a href="tel:<?=clean_phone($options["phone_main2"]);?>" class="contacts-phone"><?=$options["phone_main2"]?></a>
			</div>
		</div>
	</div>
</section>
<!-- end block contact -->
<?php get_footer(); ?>