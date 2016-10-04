<?php
/**
* Plugin Name: Porcentagem
* Plugin URI: 
* Description: Plugin de porcentagens
* Version: 1.2
* Author: Johnny John
* Author URI: http://www.finer.com.br/
**/

define('PLUGIN_PATH',   plugin_dir_path(__FILE__));
define('PLUGIN_URL',    plugins_url('', __FILE__));

if(is_admin()) {
	wp_enqueue_script('porcentagem' , PLUGIN_URL.'/porcentagem.js');
	function porcentagem_css() {
		echo '<link rel="stylesheet" type="text/css" href="'. PLUGIN_URL .'/porcentagem.css">';
	}
	add_action('admin_enqueue_scripts', 'porcentagem_css');
}

require_once('inc/functions.php');
require_once('porcentagem.php');
require_once('custom_meta.php');

$porcentagem = new Porcentagem();
$meta 		 = new CustomMeta();

$porcentagem->init();

$meta_config = array(
    array(
        'label' => '',
        'desc'  => '',
        'id'    => 'custom_porcentagem',
        'type'  => 'porcentagem' // type para ser selecionado no switch
    )
);

$meta->setConfig( $meta_config );

include_once('inc/meta.php');
