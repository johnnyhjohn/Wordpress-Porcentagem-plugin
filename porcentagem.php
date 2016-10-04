<?php
/**
*	Classe principal do plugin de porcentagem
* 	onde irá iniciar o plugin com as configurações de Post Type e 
* 	o menu de configuração
*	
*/
class Porcentagem{

	/**
	*
	*	Objeto responsável pelo tipo de post que o plugin
	* 	Estará relacionado
	*
	*/
	public $post_type;

	/**
	*
	*	@author Johnny John
	*
	*	@description
	*	Método construtor que alimenta o Objeto $post_type com a opção selecionada
	* 	No menu de configuração.
	*
	*/
	public function __construct()
	{
		$this->post_type = porcentagem_get_options()['porcentagem_post'];
	}

	/**
	*
	*	@author Johnny John
	*
	*	@description 
	*	Método que consistem em iniciar o post_type do plugin
	* 	Montando as configurações de post e do menu de configuração
	*
	*/
	public function init()
	{	
		$this->setMenu();
		$this->setConfiguracao();
	}

	/**
	*
	*	@author Johnny John
	*
	*	@description
	*	Método que fará as configurações iniciais do plugin
	*
	*/

	protected function setMenu()
	{

		function register_porcentagens() {
		 
		    $labels = array(
		        'name' 					=> _x( 'Porcentagens Projetos', 'porcentagem_projeto' ),
		        'singular_name' 		=> _x( 'Porcentagens Projetos', 'porcentagem_projeto' ),
		        'add_new' 				=> _x( 'Adicionar Novo Status', 'porcentagem_projeto' ),
		        'add_new_item' 			=> _x( 'Adicionar Porcentagens Projetos', 'porcentagem_projeto' ),
		        'edit_item' 			=> _x( 'Editar Item', 'porcentagem_projeto' ),
		        'new_item' 				=> _x( 'Novo Porcentagens Projetos', 'porcentagem_projeto' ),
		        'view_item' 			=> _x( 'Ver Porcentagens Projetos', 'porcentagem_projeto' ),
		        'search_items' 			=> _x( 'O que esta procurando?', 'porcentagem_projeto' ),
		        'not_found' 			=> _x( 'Nenhum item encontrado', 'porcentagem_projeto' ),
		        'not_found_in_trash' 	=> _x( 'Nenhum item encontrado no lixo.', 'porcentagem_projeto' ),
		        'parent_item_colon' 	=> _x( 'Parent Porcentagens Projetos:', 'porcentagem_projeto' ),
		        'menu_name' 			=> _x( 'Porcentagens Projetos', 'porcentagem_projeto' ),
		    );
		 
		    $args = array(
		        'labels' 				=> $labels,
		        'hierarchical' 			=> true,
		        'description' 			=> '',
		        'supports' 				=> array( 'title' ),
		        'public' 				=> true,
		        'show_ui' 				=> true,
		        'show_in_menu' 			=> true,
		        'menu_position' 		=> 5,
		        'show_in_nav_menus' 	=> true,
		        'publicly_queryable' 	=> true,
		        'exclude_from_search' 	=> false,
		        'has_archive' 			=> true,
		        'query_var' 			=> true,
		        'can_export' 			=> true,
		        'rewrite' 				=> true,
		        'capability_type' 		=> 'post'
		    );
		 
		    register_post_type( 'porcentagem_projeto', $args );
		}
		 
		add_action( 'init', 'register_porcentagens' );
	}

	/**
	*
	*	@author Johnny John
	*
	*	@description
	*	Método que fará as configurações para o plugin aparecer na aba de "Configurações" do Wordpress
	*	E onde o administrador irá configurar o tipo de post que o plugin será relacionado.
	*
	*/
	protected function setConfiguracao()
	{
		add_action('admin_menu', 'menu_configuracao'); 
		function menu_configuracao() 
		{
		    include (PLUGIN_PATH . '/inc/opcoes.php');
		    add_options_page('Porcentagem', 'Porcentagem', 'manage_options', 'porcentagem-opcao', 'plugin_configuracao');
		}		
	}	

}

?>