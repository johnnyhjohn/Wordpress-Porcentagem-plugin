<?php  

class CustomMeta extends Porcentagem
{

	public $config;

	public function __construct()
	{
		parent::__construct();
		$this->init();
	}

	public function setConfig( $config )
	{
		$this->config = $config;

		return $this->config;
	}

	public function init()
	{
		function add_metabox_porcentagem() {
		    add_meta_box(
		        'custom_meta_box',      		// $id
		        'Porcentagens',               	// $title - titulo que será mostrado 
		        'metaForm',    					// $callback - função de calback
		        'porcentagem_projeto',          // $page - post_type que será mostrado
		        'normal',               		// $context
		        'high');                		// $priority
		}
		add_action( 'admin_init', 'add_metabox_porcentagem' );
	}
}


?>