<?php
/**
 * Class Metabox
 *
 * @link       https://github.com/thierrycharriot
 * @since      0.0.1
 *
 */

 class Metabox {

    /**
     * Metabox Register 
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_register() {
        /**
         * https://developer.wordpress.org/reference/functions/add_meta_box/
         * add_meta_box( string $id, string $title, callable $callback, string|array|WP_Screen $screen = null, string $context = 'advanced', string $priority = 'default', array $callback_args = null )
         * Adds a meta box to one or more screens.
         */
        add_meta_box( 'metabox_post', 'MetaBox Post', array( $this, 'metabox_display' ), 'post', 'side', 'default' );
    }

    /**
     * Metabox Display 
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_display() {
        echo '<label for="metabox_input">Metabox input: </label>';
        echo '<input id="metabox_input" type="text" name="metabox_input" />';
    }

    /**
     * Metabox Save 
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_save( $post_id ) {
        if( ( isset( $_POST['metabox_input'] ) ) && $_POST['metabox_input'] !== '0' ) {
            /**
             * https://developer.wordpress.org/reference/functions/sanitize_text_field/
             * sanitize_text_field( string $str )
             * Sanitizes a string from user input or from the database.
             */
            $metabox_input = sanitize_text_field( $_POST['metabox_input'] );
            /**
             * https://developer.wordpress.org/reference/functions/update_post_meta/
             * update_post_meta( int $post_id, string $meta_key, mixed $meta_value, mixed $prev_value = '' )
             * Updates a post meta field based on the given post ID.
             */
            update_post_meta( $post_id, 'metabox_input', $metabox_input );
        } else {
            /**
             * https://developer.wordpress.org/reference/functions/delete_post_meta/
             * delete_post_meta( int $post_id, string $meta_key, mixed $meta_value = '' )
             * Deletes a post meta field for the given post ID.
             */
            delete_post_meta( $post_id, 'metabox_input', $metabox_input );
        }
    }
 }