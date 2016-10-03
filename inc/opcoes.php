<?php


function plugin_configuracao()
{

    $options    =   porcentagem_get_options();
    
    if (isset($_POST['form_submit'])    &&  wp_verify_nonce($_POST['porcentagem_form_nonce'],'porcentagem_form_submit')){

        $options['porcentagem_post'] = $_POST['porcentagem_post'];
        
                            
        echo '<div class="updated fade"><p>' . __('Settings Saved', 'post-types-order') . '</p></div>';

        update_option('porcentagem_options', $options);
        update_option('porcentagem_configurado', 'TRUE');
           
    }
    
    $queue_data = get_option('porcentagem_options');
    
?>
<div id="cpto" class="wrap"> 
    <div id="icon-settings" class="icon32"></div>
    <h2><?php _e('Configurações Gerais', 'porcentagem_post') ?></h2>
   
    <form id="form_data" name="form" method="post">   
        <br />                            
        <table class="form-table">
            <tbody>
                <tr valign="top">
                    <th scope="row" style="text-align: left;"><label><?php _e('Selecione o Tipo de Post que será relacionado às porcentagens.', 'porcentagem_post') ?></label></th>
                    <td>
                    <p><label>
                    <select name="porcentagem_post">
                        <?php
                            $post_types = get_post_types();
                            foreach( $post_types as $post_type_name ) :
                                //ignore list
                                $ignore_post_types  =   array(
                                                                'reply',
                                                                'topic',
                                                                'report',
                                                                'status'  
                                                            );
                                
                                if(in_array($post_type_name, $ignore_post_types))
                                    continue;
                                
                                if(is_post_type_hierarchical($post_type_name))
                                    continue;
                                    
                                $post_type_data = get_post_type_object( $post_type_name );
                                if($post_type_data->show_ui === FALSE)
                                    continue;
                        ?>
                            <option value="<?php echo $post_type_name; ?>" <?php if(isset($options['porcentagem_post']) && $options['porcentagem_post'] == $post_type_name) {echo ' selected="selected"';} ?>>
                            <?php _e( $post_type_data->labels->singular_name, 'porcentagem_post' ) ?></option>
                        <?php endforeach; ?>
                        </select> 
                         </label></p>
                    </td>
                </tr>
                
            </tbody>
        </table>
                           
        <p class="submit">
            <input type="submit" name="Submit" class="button-primary" value="<?php 
            _e('Save Settings', 'porcentagem_post') ?>">
        </p>
        <?php  wp_nonce_field('porcentagem_form_submit','porcentagem_form_nonce'); ?>
        <input type="hidden" name="form_submit" value="true" />
   </form>
</div>
<?php
}

?>