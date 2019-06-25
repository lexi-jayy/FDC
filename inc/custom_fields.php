<?php


$metaboxes = array(
    'services_meta' => array(
       'title' => 'Services Information',
       'post_type' => 'services',
       'fields' => array(
           'Services' => array(
                'title' => 'Our Services',
                'type' => 'text',
                'description' => 'This is for our Services'
           )
       )
    )
);


function create_custom_meta_boxes(){
    global $metaboxes;

    if(!empty($metaboxes)){
        foreach ($metaboxes as $metaboxID => $metabox){
            add_meta_box($metaboxID, $metabox['title'], 'output_custom_meta_box', $metabox['post_type'], 'normal', 'high', $metabox);
        };
    }
}

add_action('admin_init', 'create_custom_meta_boxes');

function output_custom_meta_box($post, $metabox){
    $fields = $metabox['args']['fields'];

    $customValues = get_post_custom($post->ID);

    echo '<input type="hidden" name="post_format_meta_box_nonce" value="' . wp_create_nonce( basename(__FILE__) ) . '">';

    if($fields){
        foreach ($fields as $fieldID => $field){
            if(isset($field['condition'])){
                $condition = 'class="formBlock conditionalField" data-condition="' . $field['condition'] .'"';
            } else {
                $condition = 'class="formBlock"';
            }

            switch($field['type']){
                case 'text':
                    echo '<div id="' . $fieldID . '" ' .$condition. '>';
                        echo '<label for="'. $fieldID .'">' . $field['title'] . '</label>';
                        echo '<input type="text" name="' . $fieldID .  '" class="inputField" value="'.$customValues[$fieldID][0] .  '">';
                    echo '</div>';
                break;
                default:
                    echo '<div id="' . $fieldID . '" ' .$condition. '>';
                        echo '<label for="'. $fieldID .'">' . $field['title'] . '</label>';
                        echo '<input type="text" name="' . $fieldID .  '" class="inputField" value="'.$customValues[$fieldID][0] .  '">';
                    echo '</div>';
                    break;
            }
        }
    }
}


function save_custom_metaboxes($postID){
    global $metaboxes;

    if(! wp_verify_nonce( $_POST['post_format_meta_box_nonce'], basename(__FILE__))){
        return $postID;
    }

    if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE){
        return $postID;
    }

    if( $_POST['post_type'] == 'page'){
        if(! current_user_can('edit_page', $postID)){
            return $postID;
        }
    } elseif(! current_user_can('edit_post', $postID)){
        return $postID;
    }

    $postType = get_post_type();

    foreach ($metaboxes as $metaboxID => $metabox){
        if($metabox['post_type'] == $postType){
            $fields = $metabox['fields'];
            foreach ($fields as $fieldID => $field){
                $oldValue = get_post_meta($postID, $fieldID, true);
                $newValue = $_POST[$fieldID];

                if($newValue && $newValue != $oldValue){
                    update_post_meta($postID, $fieldID, $newValue);
                } elseif ($newValue == '' || ! isset($_POST[$fieldID])){
                    delete_post_meta($postID, $fieldID, $oldValue);
                }
            }
        }
    }
}

add_action('save_post', 'save_custom_metaboxes');