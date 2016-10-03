<?php  


////////////////////////////////////////////////////////////////
#################### CRIANDO METABOX
////////////////////////////////////////////////////////////////
$prefix = 'custom_';
$custom_meta_fields_porcentagem = array(
    array(
        'label' => '',
        'desc'  => '',
        'id'    => $prefix.'porcentagem',
        'type'  => 'porcentagem' // type para ser selecionado no switch
    )
);

///////////////////////////////////////////////////////////////////////////////////////////
function show_porcentagem_meta_box() {
    global $custom_meta_fields_porcentagem, $post;
    
    echo '<input type="hidden" name="custom_meta_box_nonce" value="'.wp_create_nonce(basename(__FILE__)).'" />';
     
    echo '<table class="form-table">';
    foreach ($custom_meta_fields_porcentagem as $field) {
        $meta = get_post_meta($post->ID, $field['id'], true);
        echo '<tr><td>';
        switch ($field['type']) {
            case 'porcentagem':
                if ($meta) {
                    $args = array(
                        'post_type'        => 'obras',
                        'posts_per_page'   => -1
                    );
                
                    $posts = get_posts( $args );

                    echo '<div class="item-1">
                        <h5>Obra:</h5>
                        <input type="hidden" value="" name="'.$field['id'].'[obra][data]" id="data-alt">
                        <select data-select="'.$meta['obra']['nome'].'" name="'.$field['id'].'[obra][nome]">';
                    foreach ($posts as $post) {
                        echo "<option value='".$post->ID."'>".$post->post_title.'</option>';
                    };
                    echo '</select>
                    <label>Escavação</label>
                    <select data-select="'.$meta['obra']['escavacao'].'" name="'.$field['id'].'[obra][escavacao]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Fundação</label>
                    <select data-select="'.$meta['obra']['fundacao'].'" name="'.$field['id'].'[obra][fundacao]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Estrutura</label>
                    <select data-select="'.$meta['obra']['estrutura'].'" name="'.$field['id'].'[obra][estrutura]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Alvenaria</label>
                    <select data-select="'.$meta['obra']['alvenaria'].'" name="'.$field['id'].'[obra][alvenaria]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Acabemento Externo</label>
                    <select data-select="'.$meta['obra']['acabamento_externo'].'" name="'.$field['id'].'[obra][acabamento_externo]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Acabemento Interno</label>
                    <select data-select="'.$meta['obra']['acabamento_interna'].'" name="'.$field['id'].'[obra][acabamento_interna]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                </div>';
                } else {
                    $args = array(
                        'post_type'        => 'obras',
                        'posts_per_page'   => -1
                    );
                
                    $posts = get_posts( $args );
                    
                    echo '<div class="item-1"><h5>Obra:</h5>
                    <input type="hidden" value="" name="'.$field['id'].'[obra][data]" id="data-alt">
                    <select name="'.$field['id'].'[obra][nome]">';

                    var_dump($field['id'].'[obra][data]');
                    foreach ($posts as $post) {
                        echo "<option value='".$post->ID."'>".$post->post_title.'</option>';
                    };
                    echo '</select>';
                    echo '
                    <label>Escavação</label>
                    <select name="'.$field['id'].'[obra][escavacao]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Fundação</label>
                    <select data-select="'.$field['obra']['fundacao'].'" name="'.$field['id'].'[obra][fundacao]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Estrutura</label>
                    <select name="'.$field['id'].'[obra][estrutura]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Alvenaria</label>
                    <select name="'.$field['id'].'[obra][alvenaria]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Acabemento Externo</label>
                    <select name="'.$field['id'].'[obra][acabamento_externo]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    <label>Acabemento Interno</label>
                    <select name="'.$field['id'].'[obra][acabamento_interna]">
                        <option value="0">0%</option>
                        <option value="25">25%</option>
                        <option value="50">50%</option>
                        <option value="75">75%</option>
                        <option value="100">100%</option>
                    </select>
                    </div>';
                }  
            break;
        }             
        echo '<span class="description">'.$field['desc'].'</span>';  
        echo '</td></tr>';
    } // end foreach
    echo '</table>'; // end table
}



function add_metabox_porcentagem() {
    add_meta_box(
        'custom_meta_box',      // $id
        'Porcentagens',               // $title - titulo que será mostrado 
        'show_porcentagem_meta_box',     // $callback - função de calback
        'porcentagem_projeto',             // $page - post_type que será mostrado
        'normal',               // $context
        'high');                // $priority
}
add_action( 'admin_init', 'add_metabox_porcentagem' );

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