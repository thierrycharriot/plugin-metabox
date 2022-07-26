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
        add_meta_box( 'metabox_post', 'MetaBox Post', array( $this, 'metabox_render' ), 'post', 'side', 'default' );
    }

    /**
     * Metabox Display 
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_render() {
        echo '<label for="metabox_input">Metabox input:</label>';
        /**
         * https://developer.wordpress.org/reference/functions/get_post_meta/
         * get_post_meta( int $post_id, string $key = '', bool $single = false )
         * Retrieves a post meta field for the given post ID.
         * 
         * https://developer.wordpress.org/reference/functions/get_the_id/
         * get_the_ID()
         * Retrieves the ID of the current item in the WordPress Loop.
         */
        $metabox_value =  get_post_meta( get_the_ID(), 'metabox_input', true );
        echo '<input id="metabox_input" type="text" name="metabox_input" style="margin-top: 0.9em;" value="' . $metabox_value . '" />';
    }

    /**
     * Metabox Save 
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_save( $post_id ) {
        /**
         * https://developer.wordpress.org/reference/functions/current_user_can/
         * current_user_can( string $capability, mixed $args )
         * Returns whether the current user has the specified capability.
         */
        if(array_key_exists( 'metabox_input', $_POST ) && current_user_can( 'edit_post', $post_id, 'metabox_input' ) ) {
            if( $_POST['metabox_input'] === '' ) {
                /**
                 * https://developer.wordpress.org/reference/functions/delete_post_meta/
                 * delete_post_meta( int $post_id, string $meta_key, mixed $meta_value = '' )
                 * Deletes a post meta field for the given post ID.
                 */
                delete_post_meta( $post_id, 'metabox_input' ); // Debug OK         
            } else {
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
            }
        }
    }
 }