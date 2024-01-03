<?php $jobs_loop = CFS() -> get("jobs-loop"); ?>
<?php if(!empty($jobs_loop)):  ?>
	<section class="jobs-wraper">
		<div class="jobs-main center">
			<h2 class="h2-title">Примеры наших работ</h2>
			<div class="jobs-in">
				<div class="js-jobs-in">
					<?php foreach($jobs_loop as $item): ?>
						<div>
							<?php $url_img = $item['jobs-image']; ?>
							<?php $url_img_kama = kama_thumb_src("w=400&h=400", $url_img);  ?>
							<a href="<?=$url_img?>" class="fancybox-thumb">
								<img src="<?=$url_img_kama?>">
							</a>
						</div>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</section>
<?php endif; ?>