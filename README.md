# Plugin de Porcentagem para Wordpress
#### Contributors: Johnny John
#### Requires at least: 4.4.1
#### Tested up to: 4.6.1


### Description

Com este plugin, você poderá adicionar uma seção de porcentagem para seus projetos, podendo dizer em quantos % ele está e em qual tipo de post irá ser utilizado. Podendo usar para mostrar o andamento de projetos, demonstrar suas habilidades em certas áreas, ou qualquer tipo de display que utilize porcentagem.

### Installation

e.g.

1. Faça o upload da pasta do plugin para a pasta \`/wp-content/plugins/\`.
2. Ative o plugin no menu 'Plugin' no wordpress.
3. Vá em 'Configurações' e selecione qual Post_Type( tipo de post) o plugin será relacionado.
4. Vá no menu 'Porcentagens Projeto' e insira suas porcentagens em algum post.
5. Para ele aparecer no seu site, use a função '<?php $porcentagem = getPorcentagem($post->ID); ?>' deste modo:
	Ex : '
		
		<?php 			
			$args = array(
						'post_type' => [YOUR_POST_TYPE]',
			);

			$my_query = new WP_Query($args);

			while($my_query->have_posts() ) : $my_query->the_post();
			
				$porcentagem = getPorcentagem($post->ID);

				foreach ($porcentagem['item'] as $key => $value) {
					echo $value['nome'].' - '.$value['porcentagem'].'<br>';
				}
			endwhile;
		?>'
