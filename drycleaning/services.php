<?php $services_loop = CFS() -> get("services_loop"); ?>

<?php if(!empty($services_loop)):  ?>
<section class="services-wraper">
	<div class="services-main center">
		<h2 class="h2-title">Наши услуги и цены</h2>
		<div class="services-in">
		



			<?php foreach($services_loop as $item): ?>
			
			<div class="services-item">
				<div class="services-top">
					<h3><?php echo $item["services_title"]; ?></h3>
					<?php $i = 1; ?>
					<div class="services-prices">
						<?php foreach($item["services_in_loop"] as $val): ?>
							<?php $price = str_replace("от", "<i>от</i>", $val["services_in_price"]); ?>
							<p data-price="im<?=$i?>"><?php echo $price; ?>&nbsp;P</p>
							<?php $i++; ?>
						<?php endforeach; ?>
					</div>
				</div>
				<div class="services-center">
					<div class="services-images">
						<?php $i = 1; ?>
						<?php foreach($item["services_in_loop"] as $val): ?>
							<p data-image="im<?=$i?>">
					<img src="<?=$val['services_in_file']?>" class="<?=$val['services_cl']?>">
							</p>
							<?php $i++; ?>
						<?php endforeach; ?>

					</div>
					<div class="services-list">
						<ul>
							<?php $i = 1; ?>
							<?php foreach($item["services_in_loop"] as $val): ?>
								<li><a href="#" data-link="im<?=$i?>"><?php echo $val['services_in_title']; ?></a></li>
								<?php $i++; ?>
							<?php endforeach; ?>
						</ul>
					</div>
				</div>
				<div class="services-bottom">
					<a href="#" class="js-services-link">Заказать</a>
				</div>
			</div>
<?php endforeach; ?>
			
	
<?php endif; ?>			
						
		</div>
	</div>
</section>