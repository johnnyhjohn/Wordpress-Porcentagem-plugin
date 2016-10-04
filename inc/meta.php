<?php  

$custom_meta_fields_porcentagem = $meta->config;

function metaForm()
{
    global $custom_meta_fields_porcentagem, $post;
    
    $post_type      = porcentagem_get_options()['porcentagem_post'];

    $post_type_name = get_post_type_object($post_type);
    $post_type_name = $post_type_name->labels->name;

    $args = array(
        'post_type'        => $post_type,   
        'posts_per_page'   => -1
    );

    $posts = get_posts( $args );

    if($post_type == ""){
        echo '<div class="updated error fade">
                <p>' . __('Vá em Configurações e selecione um Tipo de Post.', 'porcentagem') . '</p>
            </div>';
        return false;
    };

    if(empty($posts)){
        echo '<div class="updated error fade">
                <p>' . __('Cadastre ao menos um item em '. $post_type_name .'.', 'porcentagem') . '</p>
            </div>';
        return false;
    }

    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />
        <div class="form-table meta-porcentagem">';
    foreach ($custom_meta_fields_porcentagem as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        
        if ($meta) :

            $i = 0;

            echo '<div class="items">
            <h5>'. $post_type_name .'</h5>
            <input type="hidden" value="" name="'.$field['id'].'[data]" id="data-alt">
            <select id="nomePost" name="'.$field['id'].'[post_ID]">';
            foreach ($posts as $post) :
                echo "<option value='".$post->ID."'>".$post->post_title.'</option>';
            endforeach;
            echo '</select>';

            foreach($meta['item'] as $row) :
                echo '<div class="item item-'. $i .'">
                    <label>Nome do Campo</label>
                    <input type="text" name="'.$field['id'].'[item]['.$i.'][nome]" placeholder="Nome do campo" value="'. $row['nome'] .'">
                    <label>Porcentagem</label>';
                ?>
                    <select name="<?php echo $field['id'].'[item]['.$i.'][porcentagem]'; ?>">
                        <option value="0"   <?php echo ($row['porcentagem'] == '0')   ? 'selected' : ''; ?> >0%</option>
                        <option value="25"  <?php echo ($row['porcentagem'] == '25')  ? 'selected' : ''; ?>>25%</option>
                        <option value="50"  <?php echo ($row['porcentagem'] == '50')  ? 'selected' : ''; ?>>50%</option>
                        <option value="75"  <?php echo ($row['porcentagem'] == '75')  ? 'selected' : ''; ?>>75%</option>
                        <option value="100" <?php echo ($row['porcentagem'] == '100') ? 'selected' : ''; ?>>100%</option>
                    </select>
                    <button type="button" class="remove-porcentagem">-</button>
                    <button type="button" class="add-porcentagem">+</button>
                </div>
        <?php 
            $i++;   
            endforeach; // Final do foreach dos items
        ?>
        </div>
        <? else :

            echo '<div class="items">
                <h5>'. $post_type_name .'</h5>
                <input type="hidden" value="" name="'.$field['id'].'[data]" id="data-alt">
                <select id="nomePost" name="'.$field['id'].'[post_ID]">';
                foreach ($posts as $post) {
                    echo "<option value='".$post->ID."'>".$post->post_title.'</option>';
                };

                echo '</select>
                    <div class="item item-0">
                        <label>Nome do Campo</label>
                        <input type="text" name="'.$field['id'].'[item][0][nome]" placeholder="Nome do campo">
                        <label>Porcentagem</label>'
                ?>
                    <select name="<?php echo $field['id'].'[item][0][porcentagem]'; ?>">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <button type="button" class="remove-porcentagem">-</button>
                    <button type="button" class="add-porcentagem">+</button>
                </div> <!-- Final .item -->
            </div> <!-- Final .items -->
        <?php 
        endif;
    } // end foreach
    echo '</div>'; // end div
}
function save_porcentagem($post_id) {
    global $custom_meta_fields_porcentagem;
     
    // verify nonce
    if (!wp_verify_nonce($_POST['custom_meta_box_nonce'], basename(__FILE__))) 
        return $post_id;
    // check autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE)
        return $post_id;
    // check permissions
    if ('page' == $_POST['post_type']) {
        if (!current_user_can('edit_page', $post_id))
            return $post_id;
        } elseif (!current_user_can('edit_post', $post_id)) {
            return $post_id;
    }
     
    // loop through fields and save the data
    foreach ($custom_meta_fields_porcentagem as $field) {
        $old = get_post_meta($post_id, $field['id'], true);
        $new = $_POST[$field['id']];
        if ($new && $new != $old) {
            update_post_meta($post_id, $field['id'], $new);
        } elseif ('' == $new && $old) {
            delete_post_meta($post_id, $field['id'], $old);
        }
    } // end foreach     
}
add_action('save_post', 'save_porcentagem');

?>