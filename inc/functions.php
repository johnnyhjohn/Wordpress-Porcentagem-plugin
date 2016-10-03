<?php 

	function getPorcentagem($post_id){

	    $args = array(
	        'post_type'            => 'porcentagem_projeto',
	        'posts_per_page'       => -1
	    );

	    $posts = get_posts($args);

	    foreach ($posts as $key => $post) {
	        $metas = get_post_meta($post->ID, 'custom_porcentagem', true); 
	        if($metas['obra']['nome'] == $post_id){
	            return $metas['obra'];
	        }
	    }
	}

    function porcentagem_get_options()
    {
        $options 	= get_option('porcentagem_options');
        
        $defaults   = array ('porcentagem_post'   		=>  '',);

        $options    = wp_parse_args( $options, $defaults );
        
        return $options;            
    }


?>