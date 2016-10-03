<?php
/**
* Plugin Name: Porcentagem
* Plugin URI: 
* Description: Plugin de porcentagens
* Version: 1.2
* Author: Johnny John
* Author URI: http://www.finer.com.br/
**/

// Definição de constantes
define('PLUGIN_PATH',   plugin_dir_path(__FILE__));
define('PLUGIN_URL',    plugins_url('', __FILE__));


// Dependências do plugin
require_once('inc/functions.php');
require_once('porcentagem.php');
require_once('custom_meta.php');


// Instanciamos a classe principal e em seguida dos custom meta box
$porcentagem = new Porcentagem();
$meta 		 = new CustomMeta();

// Invocamos o método de inicialização do Plugin
$porcentagem->init();


