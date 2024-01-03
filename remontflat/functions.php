<?php
	add_action("wp_enqueue_scripts","myload_styles");
	add_action('wp_footer','my_load_scripts');
	add_action("after_setup_theme","myregister_nav_menus");
	add_action("admin_menu","vl_register_page");
	add_action("admin_init","vl_register_setting");
	add_action("admin_enqueue_scripts","wp_load_admin_scripts");
	add_action('init','modify_jquery');
	function modify_jquery(){
		if (!is_admin()) {
			// Убираем подключенную старую версию библиотеки
			wp_deregister_script('jquery');
		}
	}
	
	// Disable Gutenberg editor.
	add_filter('use_block_editor_for_post_type', '__return_false', 10);
	// Don't load Gutenberg-related stylesheets.
	add_action( 'wp_enqueue_scripts', 'remove_block_css', 100 );
	function remove_block_css() {
		wp_dequeue_style( 'wp-block-library' ); // WordPress core
		wp_dequeue_style( 'wp-block-library-theme' ); // WordPress core
	}
	
	function myload_styles(){
		wp_enqueue_style("style",get_stylesheet_uri(),array(),"2.5.0");
		wp_enqueue_script("jquery-script",get_template_directory_uri()."/assets/js/jquery-script.js",array(),"1.3",true);
	}
	function my_load_scripts(){
		wp_deregister_script( 'wp-embed' );
	}
	
	function wp_load_admin_scripts(){
		wp_enqueue_style("admin_style",get_template_directory_uri()."/admin/admin_style.css");
		wp_enqueue_style("jquery.dataTables.min",get_template_directory_uri()."/admin/jquery.dataTables.min.css");
		wp_enqueue_script("jquery.dataTables.min",get_template_directory_uri()."/admin/jquery.dataTables.min.js",array('jquery'));
		wp_enqueue_script("handler",get_template_directory_uri()."/admin/handler.js",array("jquery","jquery.dataTables.min"));
	?>
		<script>
			var path="<?php bloginfo("template_url"); ?>";
		</script>
	<?php 
	}
	remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
	remove_action( 'wp_print_styles', 'print_emoji_styles' );
	remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
	remove_action( 'admin_print_styles', 'print_emoji_styles' );
	add_filter('xmlrpc_enabled', '__return_false');
	add_filter('script_loader_tag', 'clean_script_tag');
	add_filter('show_admin_bar', '__return_false');
	function clean_script_tag($src) {
		return str_replace("type='text/javascript'", '', $src);
	}
	function myregister_nav_menus(){
		add_theme_support("post-thumbnails");
		register_nav_menus(array(
			'header_menu' => 'Меню в хедере',
			'footer_menu1' => 'Меню в футере1',
			'mobil_menu' => 'Мобильное меню',
		));
	}
	function vl_register_page(){
		add_menu_page("Настройки темы","Настройки темы","manage_options","vl_options_page","vl_options_page_cb","dashicons-hammer");
		add_submenu_page("vl_options_page","Список заявок","Список заявок","manage_options","vl_peoples_page","vl_peoples_page_cb");

	}
	function vl_options_page_cb(){
		?>
			<div class="wrap">
				<h2>Настройки темы</h2>
				<form action="options.php" method="post">
					<?php settings_fields("vl_option_group"); ?>
					<?php do_settings_sections("vl_options_page"); ?>
					<?php submit_button(); ?>
				</form>
			</div>
		<?php
	}
	
	function vl_register_setting(){
		register_setting("vl_option_group","vl_options");
		
		add_settings_section("vl_contact_section_id","","","vl_options_page");
		
		add_settings_field("vl_phone_main_id","Телефон","vl_phone_main_cb","vl_options_page","vl_contact_section_id", array("label_for"=>"vl_phone_main_id"));
		
		add_settings_field("vl_email_main_id","Email","vl_email_main_cb","vl_options_page","vl_contact_section_id", array("label_for"=>"vl_email_main_id"));
		
		add_settings_field("vl_whatsapp_main_id","WhatsaApp","vl_whatsapp_main_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_whatsapp_main_id"));		
			
		add_settings_field("vl_tele_main_id","Telegram","vl_tele_main_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_tele_main_id"));
		
		add_settings_field("vl_adres_main_id","Адрес","vl_adres_main_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_adres_main_id"));	
				
		add_settings_field("vl_footer_txt_id","Текстовый блок в футере","vl_footer_txt_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_footer_txt_id"));

		add_settings_field("vl_footer_legal_id","Адрес - ИП в футере","vl_footer_legal_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_footer_legal_id"));
		
		add_settings_field("vl_header_script_id","Блок для скриптов в шапке сайта","vl_header_script_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_header_script_id"));		
		
		add_settings_field("vl_footer_script_id","Блок для скриптов в подвале сайта	","vl_footer_script_cb","vl_options_page","vl_contact_section_id",
		array("label_for"=>"vl_footer_script_id"));
		
	}
	
	function vl_phone_main_cb(){
		$options=get_option('vl_options');
		?>
			<input type="text" id="vl_phone_main_id" name="vl_options[phone_main]" value="<?php echo esc_attr($options['phone_main']); ?>" class="regular-text">
		<?php
	}	
	
	
	function vl_email_main_cb(){
		$options=get_option('vl_options');
		?>
			<input type="text" id="vl_email_main_id" name="vl_options[email_main]" value="<?php echo esc_attr($options['email_main']); ?>" class="regular-text">
		<?php
	}
	
	function vl_whatsapp_main_cb(){
		$options=get_option('vl_options');
		?>
			<input type="text" id="vl_whatsapp_main_id" name="vl_options[whatsapp_main]" value="<?php echo esc_attr($options['whatsapp_main']); ?>" class="regular-text">
		<?php
	}
	
	function vl_tele_main_cb(){
		$options=get_option('vl_options');
		?>
			<input type="text" id="vl_tele_main_id" name="vl_options[tele_main]" value="<?php echo esc_attr($options['tele_main']); ?>" class="regular-text">
		<?php
	}
	
	function vl_adres_main_cb(){
		$options=get_option('vl_options');
		?>
			<input type="text" id="vl_adres_main_id" name="vl_options[adres_main]" value="<?php echo esc_attr($options['adres_main']); ?>" class="regular-text">
		<?php
	}
	
	function vl_footer_txt_cb(){
		$options=get_option('vl_options');
		?>
			<textarea id="vl_footer_txt_id" name="vl_options[footer_txt]" style="width:500px;height:150px;"><?php echo esc_attr($options['footer_txt']); ?></textarea>
		<?php
	}

	function vl_footer_legal_cb(){
		$options=get_option('vl_options');
		?>
			<textarea id="vl_footer_legal_id" name="vl_options[footer_legal]" style="width:500px;height:150px;"><?php echo esc_attr($options['footer_legal']); ?></textarea>
		<?php
	}
	
	
	function vl_header_script_cb(){
		$options=get_option('vl_options');
		?>
			<textarea id="vl_header_script_id" name="vl_options[header_script]" style="width:500px;height:200px;"><?php echo esc_attr($options['header_script']); ?></textarea>
		<?php
	}	
	
	function vl_footer_script_cb(){
		$options=get_option('vl_options');
		?>
			<textarea id="vl_footer_script_id" name="vl_options[footer_script]" style="width:500px;height:200px;"><?php echo esc_attr($options['footer_script']); ?></textarea>
		<?php
	}
	
	function vl_peoples_page_cb(){
		if(isset($_POST['check'])){
			$str_delete=implode(",",$_POST['check']);
			global $wpdb;
			$query=$wpdb->query("DELETE FROM `st_peoples` WHERE id IN($str_delete)");
		}
		?>
			<div class="wrap">
				<h2>Список заявок</h2>
				<?php
					global $wpdb;
					$row=$wpdb->get_results("SELECT * FROM `st_peoples` ORDER BY `id` DESC",ARRAY_A);?>
					<?php if(!empty($row)): ?>
					<form action="" method="post">
						<table class="table-application js-table">
							<thead>
								<tr>
									<th>ID</th>
									<th>Имя</th>
									<th>Телефон</th>
									<th>Время добавления</th>
									<th>Комментарий</th>
								</tr>
							</thead>
							<tbody>
								<?php foreach($row as $key=>$value): ?>
									<tr>
										<td><input type="checkbox" name="check[]" value="<?=$value['id']?>"></td>
										<td><?=$value['name']?></td>
										<td style="white-space:nowrap;"><?=$value['phone']?></td>
										<?php date_default_timezone_set('EUROPE/MOSCOW'); ?>
										<td><?php echo date("Y-m-d H:i",$value['date']); ?></td>
										<td><?=$value['coment']?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
						<?php submit_button("Удалить"); ?>
					</form>
					<?php else: ?>
					<p>Заявок нет.</p>
					<?php endif; ?>
			</div>
		<?php
	}
	
/*
*** clean phone
*/
	function clean_phone($phone){
		$phone=trim(strip_tags($phone));
		$phone=str_replace(" ","",$phone);
		$phone=str_replace("(","",$phone);
		$phone=str_replace(")","",$phone);
		$phone=str_replace("-","",$phone);
		if($phone[0] == "8") $phone="+7".substr($phone,1);
		return $phone;
	}
	


/*
***  form
*/

add_action("wp_ajax_send_mail","send_mail");
add_action("wp_ajax_nopriv_send_mail","send_mail");
function clearStr($data){
		return htmlspecialchars(trim(strip_tags($data)),ENT_QUOTES);
	}
function send_mail(){
	$url_site = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'];
	global $wpdb;
	remove_all_filters("wp_mail_from");
	remove_all_filters("wp_mail_from_name");
	$phone = (clearStr($_POST['phone']));
	$name = mb_strtolower(clearStr($_POST['name']));
	$coment = (clearStr($_POST['coment']));
	$message = (clearStr($_POST['message']));
	$theme = (clearStr($_POST['theme']));
	
	
	if(empty($phone)) die("Вы ввели неверные данные");
	if(!empty($message)) die("Вы ввели неверные данные");
	if(str_starts_with($name,"http") || str_starts_with($phone,"http")) die("Вы ввели неверные данные");
	if(!empty($coment)){
			$findme1   = 'http://';
			$findme2   = 'https://';
			$pos1 = stripos($coment, $findme1);
			$pos2 = stripos($coment, $findme2);

			if ($pos1 !== false or $pos2 !== false) {
				die("Вы ввели неверные данные");
			}
	}
	
	if($theme == "Обратный звонок"){
		$secret = "6Lc1FOsjAAAAADsDqGeRyMIn3fxOO-Dh83qs82D_";
		$key = clearStr($_POST['g-recaptcha-response']);
		if(!$key) die("Не ввели капчу");
		$url_google = "https://www.google.com/recaptcha/api/siteverify";
		$response_end = $url_google."?secret=".$secret."&response=".$key."&remoteip=".$_SERVER['REMOTE_ADDR'];
		$data = file_get_contents($response_end);
		$data_arr = json_decode($data);
		if($data_arr -> success == false){
			echo "Капча введена неправильно"; die();
		}
	}
	
	
		$subject='=?UTF-8?B?'.base64_encode('Получено сообщение  с сайта '.$url_site).'?=';
		$options=get_option('vl_options');
		$to=$options['email_main'];
		$message="<html>
		<head>
		</head>
		<body style='font-size:20px;color:#333;padding:10px;'>
		<p>Здравствуйте!</p>
		<br>Получено сообщение с сайта {$url_site} <br>";
		if(!empty($name)) $message.="<br>Имя: $name<br>";
		if(!empty($phone)) $message.="<br>Телефон: <a href='tel:".$phone."'>$phone</a><br>";
		if(!empty($coment)) $message.="<br>Комментарий: $coment";
		$message.="</body></html>";
		$headers="MIME-Version: 1.0\r\n";
		$headers.="Content-type:text/html;charset=utf-8\r\n";
		if(preg_match('/[a-z0-9-_]+[a-z0-9-_\.]+@[a-z0-9-_\.]+\.[a-z]+/',$to)){
			if(!mail($to,$subject,$message,$headers)) die("Вы ввели неверные данные");
			
			/* send tg */
			$token="1868495900:AAHX-YT-O16WRCcvW2fTTt0wXajEsvyLMW8";
			$chat_id="-1001255476265";
		
			$txtTelegram=strip_tags($message,"<br>");
			$txtTelegram=str_replace("<br><br>","%0A",$txtTelegram);			
			$txtTelegram=str_replace("<br>","",$txtTelegram);
			$txtTelegram=str_replace("\t"," ",$txtTelegram);

			$sendToTelegram = file_get_contents("https://api.telegram.org/bot{$token}/sendMessage?chat_id={$chat_id}&parse_mode=html&&text={$txtTelegram}");
			
				$sql_table="CREATE TABLE IF NOT EXISTS `st_peoples` (
						`id` INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY ,
						`name` VARCHAR( 255 ) NOT NULL ,
						`phone` VARCHAR( 255 ) NOT NULL ,
						`coment` TEXT NOT NULL ,
						`date` INT NOT NULL 
						) ENGINE = MYISAM";
				$wpdb->query($sql_table);
				
				$date=time();
				$sql=$wpdb->prepare("INSERT INTO `st_peoples`(`name`,`phone`,`date`,`coment`) 
				VALUES('%s','%s',$date,'%s')",[$name,$phone,$coment]);
				$res=$wpdb->query($sql);
					if(!$res){
						die("Ошибка при добавлении в базу данных. Попробуйте ещё раз!");
					}
					die('1');
		}
		die("Вы ввели неверные данные");
}

/*
*** desctop or mobile
*/
function isMobile(){ 
	return preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]);
}

/*
*** enable .webp
*/
function webp_upload_mimes( $existing_mimes ) {
	// add webp to the list of mime types
	$existing_mimes['webp'] = 'image/webp';

	// return the array back to the function with our added mime type
	return $existing_mimes;
}
add_filter( 'mime_types', 'webp_upload_mimes' );

/*
*** delete empty span
*/
add_filter('tiny_mce_before_init', 'my_adds_alls_elements', 20);
function my_adds_alls_elements($init) {
if(current_user_can('unfiltered_html')) {
$init['extended_valid_elements'] = 'span[*]';
}
return $init;
}
?>