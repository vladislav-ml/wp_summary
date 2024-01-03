<?php $options = get_option('vl_options'); ?>
<footer>
	<p>2018-<?=date("Y")?> г., Выездная профессиональная химчистка в Красноярске.</p>
</footer>
<div class="modal-answer-wrap">
	<div class="modal-answer-in">
		<span class="modal-answer-close"></span>
		<p>Благодарим за запрос!</p>
		<p>Мы свяжемся с вами в ближайшее время!</p>
	</div>
</div>
<?php wp_footer(); ?>
<?php if(!empty($options['footer_script'])): ?>
<?=trim($options['footer_script']);?>
<?php endif; ?>
</body>
</html>