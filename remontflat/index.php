<?php get_header(); ?>
<?php global $post; ?>
<!-- start block slider-->
<section class="slider-wraper">
<div class="slider-main js-slider-main">
	<div class="slider-item" style="background-image:url(<?php bloginfo('template_url'); ?>/assets/images/slider1.jpg)">
	</div>
	<div class="slider-item" style="background-image:url(<?php bloginfo('template_url'); ?>/assets/images/slider2.jpg)">
	</div>
</div>
	<div class="calc-wraper center">
		<div class="calc-wraper-in">
			<div class="calc-left" id="calculator">
				<form action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" class="calc-form js-send-form" method="post" autocomplete="off">
					<h2>Расчёт стоимости ремонта</h2>
					<div class="calc-item">
						<h3>Тип помещения</h3>
						<div class="calc-type-wraper calc-type-pm">
							<div class="calc-type">
								<p data-price="0"><span class="active"><i></i></span>Квартира</p>
							</div>
							<div class="calc-type">
								<p data-price="10000"><span><i></i></span>Коттедж</p>
							</div>
							<div class="calc-type">
								<p data-price="12000"><span><i></i></span>Офис</p>
							</div>
						</div>
					</div>
					<div class="calc-item">				
						<h3>Тип ремонта</h3>
						<div class="calc-type-wraper calc-type-flat">
							<div class="calc-type-wraper">
								<div class="calc-type">
									<p data-price="4800"><span class="active"><i></i></span>Косметический</p>
								</div>
								<div class="calc-type">
									<p data-price="9900"><span><i></i></span>Капитальный</p>
								</div>
								<div class="calc-type">
									<p data-price="10800"><span><i></i></span>Евроремонт</p>
								</div>
								<div class="calc-type">
									<p data-price="14900"><span><i></i></span>Элитный</p>
								</div>
							</div>
						</div>
					</div>
					<div class="calc-item calc-item-size">
						<h3>Площадь помещения, м<sup>2</sup></h3>
						<div class="calc-range">
							<div class="calc-range-left">
								<div id="slider-range-min"></div>
							</div>
							<div class="calc-range-right">
								<p>
								 <input type="number" id="amount" max="300" min="20" step="1" class="amount-number">
								</p>
							</div>
							
						</div>
					</div>
					<div class="calc-item calc-item-price">
						<h3>Примерная стоимость ремонта</h3>
						<p class="price-sum"><span>234 000</span> р.</p>
					</div>
					<div class="calc-item calc-item-form">
						<h3>Введите номер телефона</h3>
						<div class="calc-form-phone">
							<p><input type="text" name="phone" class="phone" placeholder="Ваш телефон"></p>
							<p><input type="submit" name="send-submit" class="send-submit"></p>
						</div>
						<p class="calc-info">
							Ваши контактные данные не будут переданы третьим лицам. Менеджер свяжется с вами в течение суток.
						</p>
					</div>
				</form>
			</div>
			<div class="calc-right">
				<div class="main-block">
				<?php if (have_posts()) :  while (have_posts()) : the_post(); ?>
					   <h1><?php the_title(); ?></h1>
					   <?php $flats = CFS() -> get("flat_block"); ?>
					   <?php $remonts = CFS() -> get("remont_block"); ?>
					   <?php $portfolio = CFS() -> get("portfolio_block"); ?>
					   <?php $times_block = CFS() -> get("times_block"); ?>
					   <?php $about_block = CFS() -> get("about_block"); ?>
					   <?php $faq_block = CFS() -> get("faq_block"); ?>
					   <?php the_content(); ?>
				<?php endwhile; ?>
				<?php endif; ?>

					<form action="<?php echo admin_url('admin-ajax.php?action=send_mail'); ?>" method="post" class="form-block-phone js-send-form" autocomplete="off">
						<p><input type="text" name="phone" class="phone" placeholder="Ваш телефон"></p>
						<p><input type="submit" name="send-submit" class="send-submit" value="Вызвать замерщика"></p>
					</form>
					<p class="main-block-info">
						Ваши контактные данные не будут переданы третьим лицам. Менеджер свяжется с вами в течение суток.
					</p>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end block slider -->

<!-- start block flat -->
<?php if(!empty($flats)):?>
	<section class="flat-wraper">
		<div class="flat-main center">
			<h2 class="h2-title">В каких помещениях делаем ремонт?</h2>
			<div class="flat-in">
				<?php foreach($flats as $flat): ?>
				
					<div class="flat-item">
					<?php $image_url = wp_get_attachment_url($flat["flat_block_img"]) ?>
					<?php $image_url_full = kama_thumb_src("w=570&h=353",$image_url); ?>
						<img src="<?=$image_url_full?>" alt="">
						<p class="flat-title"><?=$flat["flat_block_title"]?></p>
						<div class="flat-txt">
							<div>
								<p class="flat-price"><?=$flat["flat_block_price"]?></p>
								<p class="flat-order"><a href="#" class="flat-order-link js-modal">Заказать</a></p>
							</div>
						</div>
					</div>
				
				<?php endforeach; ?>
				
			</div>
		</div>
	</section>
<?php endif; ?>
<!-- end block flat -->

<!-- start block options -->
<?php if(!empty($remonts)): ?>
<section class="options-wraper" id="type_remont">
	<div class="options-main center">
		<h2 class="h2-title">Делаем следующие виды ремонта</h2>
		<ul class="options-top">
			<?php $i = 0; ?>
			<?php foreach($remonts as $remont): ?>
				<li><a class="options-link" href="#" data-remont="tab<?=$i?>"><?=$remont["remont_block_title"]?></a></li>
				<?php $i++; ?>
			<?php endforeach; ?>

		</ul>
		
		<?php $i = 0; ?>
		<div class="sort-block">
			<p class="sort-block-p"><?=$remonts[0]["remont_block_title"]?></p>
			<div class="sort-block-div">
			<?php foreach($remonts as $remont): ?>
				<p><a href="#" <?php if($i==0) { echo 'class="sort-active"';}?>  data-remont="tab<?=$i?>"><?=$remont["remont_block_title"]?></a></p>
				<?php $i++; ?>
			<?php endforeach;?>
			</div>
		</div>
		<div class="options-bottom">
			
		<?php $i = 0; ?>
		<?php foreach($remonts as $remont): ?>
			
			<div class="options-item" id="tab<?=$i?>">
				<div class="options-item-left">
					<?php $image_url = wp_get_attachment_url($remont["remont_block_img"]) ?>
					<?php $image_remont_url = kama_thumb_src("w=420&h=696",$image_url); ?>
					<img src="<?=$image_remont_url?>" alt="">
				</div>
				<div class="options-item-right">
					<?=$remont["remont_block_txt"]?>
					<div class="options-price-wraper">
						<p class="options-price"><?=$remont["remont_block_price"]?></p>
						<p class="options-order"><a href="#" class="options-order-link js-modal">Заказать</a></p>
					</div>
				</div>
			</div>
			<?php $i++; ?>
			
		<?php endforeach; ?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- end block options -->

<!-- start block portfolio -->
<?php if(!empty($portfolio)): ?>
<section class="portfolio-wraper" id="portfolio">
		<h2 class="h2-title">Реализовали более 100 проектов</h2>
		<div class="js-portfolio-main">
			
			<?php foreach($portfolio as $gallery): ?>
			<div class="portfolio-item">
				<div class="portfolio-item-left">
					<?php $image_url = wp_get_attachment_url($gallery["portfolio_block__img"]) ?>
					<?php $image_full = kama_thumb_src("w=945&h=587",$image_url); ?>
					<img src="<?=$image_full?>" alt="">
					<div class="portfolio-txt">
						<h2><?=$gallery["portfolio_block_title"]?></h2>
							<div class="portfolio-txt-in">
								<div>
									<p>Цена:</p>
									<p class="portfolio-price"><?=$gallery["portfolio_block_price"]?></p>
								</div>
								<div>
									<p>Площадь:</p>
									<p><?=$gallery["portfolio_block_size"]?> м<sup>2</sup></p>
								</div>
							</div>
							<a href="#" class="portfolio-order js-modal">Вызвать замерщика</a>
					</div>
					<div class="portfolio-img">
						<div class="portfolio-img-in">
							<?php if(!empty($gallery["portfolio_block_ids"])): ?>
							<?php  $ids_img = explode(",",$gallery["portfolio_block_ids"]); ?>
							<?php foreach( $ids_img as $item):  ?>
							
							<?php $image_url = wp_get_attachment_url($item) ?>
							<?php $image_url_full = kama_thumb_src("w=100&h=100",$image_url); ?>
								<div>
									<a href="<?=$image_url?>" class="fancybox-thumb" data-caption="<?=$gallery["portfolio_block_title"]?>">
										<img src="<?=$image_url_full?>" alt="">
									</a>
								</div>
							<?php endforeach; ?>
							
							<?php endif; ?>
							
						</div>
					</div>
				</div>
				
			</div>
			<?php endforeach; ?>
			
		</div>
</section>
<?php endif; ?>
<!-- end block portfolio -->

<!-- start block times -->
<?php if(!empty($times_block)): ?>
<section class="times-wraper" id="times">
	<div class="times-main center">
		<h2 class="h2-title">Цена и сроки выполнения ремонтных работ</h2>
		<div class="times-in">
			<?=$times_block?>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- end block times -->

<!-- start block about -->
<?php if(!empty($about_block)): ?>
<section class="about-wraper" id="about">
	<div class="about-main center">
		<h2 class="h2-title">Как мы работаем</h2>
		<div class="about-in">
			<div class="about-left">
			<?php $i = 0;?>
			<?php foreach($about_block as $about):?>
				<?php if($i > 2) break;?>
				<div class="about-item">
					<?php $image_url = wp_get_attachment_url($about["about_block_img"]) ?>
					<p><img src="<?=$image_url?>" alt=""></p>
					<h3><?=$about["about_block_title"]?></h3>
					<div><?=$about["about_block_img_txt"]?></div>
				</div>
			<?php $i++; ?>
			<?php endforeach; ?>

			</div>
			<div class="about-center">
				<img src="<?php bloginfo('template_url'); ?>/assets/images/work-man.png" alt="">
			</div>
			<div class="about-right">
			<?php $i = 0;?>
			<?php foreach($about_block as $about):?>
				<?php if($i > 2):?>
					<div class="about-item">
						<?php $image_url = wp_get_attachment_url($about["about_block_img"]) ?>
						<p><img src="<?=$image_url?>" alt=""></p>
						<h3><?=$about["about_block_title"]?></h3>
						<div><?=$about["about_block_img_txt"]?></div>
					</div>
				<?php endif; ?>
			<?php $i++; ?>
			<?php endforeach; ?>
			</div>
		</div>
	</div>
</section>
<?php endif; ?>
<!-- end block about -->

<!-- start block faq -->
<?php if(!empty($faq_block)): ?>
<section class="faq-wraper" id="faq">
	<div class="faq-main center">
		<h2 class="h2-title">Часто задаваемые вопросы о ремонте</h2>
		<div class="faq-in">
		
			<?php foreach($faq_block as $faq): ?>
				<div class="faq-item">
					<div class="faq-top">
						<p class="faq-icon"><span class="faq-plus"></span></p>
						<h3><?=$faq["faq_block_title"]?></h3>
					</div>
					<div class="faq-bottom">
						<?=$faq["faq_block_txt"]?>
					</div>
				</div>
			<?php endforeach; ?>

		</div>
	</div>
</section>
<?php endif; ?>
<!-- end block faq -->

<?php get_footer(); ?>