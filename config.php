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

require_once('inc/functions.php');
require_once('porcentagem.php');
require_once('custom_meta.php');


$porcentagem = new Porcentagem();
$meta 		 = new CustomMeta();

$porcentagem->init();


