<?php
/*
 * Plugin Name: Tuncalc
 * Description: Простой расчет стоимости. Для вывода на странице используйте шорткод [tun-display].
 * Author URI:  https://github.com/tunnet/
 * Author:      Tunnet
 * Version:     1.0.0
 */


function enqueue_scripts() {

	wp_enqueue_script( 'tun-script', plugin_dir_url( __FILE__ ) . 'js/script.js', array( 'jquery' ));

}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts' );
$true_page = 'tuncalc-options.php';



function true_options() {
	global $true_page;
	add_options_page( 'Калькулятор', 'Калькулятор', 'manage_options', $true_page, 'true_option_page');  
}
add_action('admin_menu', 'true_options');
 




function true_option_page(){
	global $true_page;
	?><div class="wrap">
		<h2>Параметры калькулятора</h2>
		<form method="post" enctype="multipart/form-data" action="options.php">
			<?php 
			settings_fields('true_options'); 
			do_settings_sections($true_page);
			?>
			<p class="submit">  
				<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
			</p>
		</form>
	</div><?php
}
 



function true_option_settings() {
	global $true_page;

	register_setting( 'true_options', 'true_options', 'true_validate_settings' );
 




	add_settings_section( 'true_section_1', 'Основный настройки', '', $true_page );
 
 	$true_field_params = array(
		'type'      => 'tel',
		'id'        => 'gold',
		'desc'      => 'Процентная ставка для варианта <b>GOLD</b>.',
	);
	add_settings_field( 'gold', 'Gold', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

 	$true_field_params = array(
		'type'      => 'tel',
		'id'        => 'silver',
		'desc'      => 'Процентная ставка для варианта <b>SILVER</b>.',
	);
	add_settings_field( 'silver', 'Silver', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'number',
		'id'        => 'minvalue',
		'desc'      => 'Сумма минимальной покупки',
	);
	add_settings_field( 'minvalue', 'Минимальная сумма', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'number',
		'id'        => 'purchase',
		'desc'      => 'Сумма минимальной покупки для получения сертификата',
	);
	add_settings_field( 'purchase', 'Минимальная покупка', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );

	$true_field_params = array(
		'type'      => 'number',
		'id'        => 'gift',
		'desc'      => 'Cтоимость подарочного сертификата',
	);
	add_settings_field( 'gift', 'Подарочный сертификат', 'true_option_display_settings', $true_page, 'true_section_1', $true_field_params );
 
	


	
 
	add_settings_section( 'true_section_2', 'Другие настройки', '', $true_page );

	$true_field_params = array(
		'type'      => 'select',
		'id'        => 'my_select',
		'desc'      => 'обозначение валюты.',
		'vals'		=> array( 'грн' => 'грн', 'дол' => 'долларов', 'евро' => 'евро', 'руб' => 'руб')
	);
	add_settings_field( 'my_select_field', 'Валюта', 'true_option_display_settings', $true_page, 'true_section_2', $true_field_params );
 
}
add_action( 'admin_init', 'true_option_settings' );
 

function true_option_display_settings($args) {
	extract( $args );
 
	$option_name = 'true_options';
 
	$o = get_option( $option_name );
 
	switch ( $type ) {  
		case 'number':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			$o[$id] = floatval(str_replace(',','.',$o[$id]));
			echo "<input class='regular-text' type='number' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'tel':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			$o[$id] = floatval(str_replace(',','.',$o[$id]));
			echo "<input class='regular-text' maxlength='4' step='0.01' min='0' max='9999' type='tel' id='$id' name='" . $option_name . "[$id]' value='$o[$id]' />";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'textarea':  
			$o[$id] = esc_attr( stripslashes($o[$id]) );
			$o[$id] = floatval(str_replace(',','.',$o[$id]));
			echo "<textarea class='code large-text' cols='50' rows='10' type='text' id='$id' name='" . $option_name . "[$id]'>$o[$id]</textarea>";  
			echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
		break;
		case 'checkbox':
			$checked = ($o[$id] == 'on') ? " checked='checked'" :  '';  
			echo "<label><input type='checkbox' id='$id' name='" . $option_name . "[$id]' $checked /> ";  
			echo ($desc != '') ? $desc : "";
			echo "</label>";  
		break;
		case 'select':
			echo "<select id='$id' name='" . $option_name . "[$id]'>";
			foreach($vals as $v=>$l){
				$selected = ($o[$id] == $v) ? "selected='selected'" : '';  
				echo "<option value='$v' $selected>$l</option>";
			}
			echo ($desc != '') ? $desc : "";
			echo "</select>";  
		break;
		case 'radio':
			echo "<fieldset>";
			foreach($vals as $v=>$l){
				$checked = ($o[$id] == $v) ? "checked='checked'" : '';  
				echo "<label><input type='radio' name='" . $option_name . "[$id]' value='$v' $checked />$l</label><br />";
			}
			echo "</fieldset>";  
		break; 
	}
}
 
function true_validate_settings($input) {
	foreach($input as $k => $v) {
		$valid_input[$k] = trim($v);
 		var_dump($valid_input[$k]);
		// if (empty($valid_input[$k])) { 
		// 	$valid_input[$k] = ''; 
		// }
		
	}
	return $valid_input;
}





function calc_run(){
	ob_start();
	$page = require dirname(__FILE__).'/tc-public-display.php';
	return ob_get_clean();
}
add_shortcode('tun-display', 'calc_run');


function gold_func(){
	$my_options = get_option( 'true_options' );
	return $my_options['gold'];
}
add_shortcode('tun-gold', 'gold_func');

function silver_func(){
	$my_options = get_option( 'true_options' );
	return $my_options['silver'];

}
add_shortcode('tun-silver', 'silver_func');





register_activation_hook( __FILE__, 'setup_options' );
function setup_options() {
	$default_options=array(
		'gold'=>3.5,
		'silver'=>6.5,
		'minvalue'=>1000,
		'purchase'=>5000,
		'gift'=>300,
		'my_select'=>'грн',
	);
	add_option( 'true_options', $default_options);
}