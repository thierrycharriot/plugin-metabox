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
     * Register Metabox
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
     * Display Metabox
     * @link       https://github.com/thierrycharriot
     * @since      0.0.1
     */    
    public function metabox_display() {
        echo '<label for="metabox_input">Metabox input: </label>';
        echo '<input id="metabox_input" type="text" name="metabox_input" />';

    }
 }