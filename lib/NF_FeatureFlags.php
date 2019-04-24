<?php

final class NF_FeatureFlags
{
    public function __construct()
    {
        add_action( 'admin_init', array( $this, 'listener' )  );
    }

    public function listener() {
        if( ! current_user_can( 'manage_options' ) ) return;

        if( isset( $_GET[ 'nf-use-cache' ] ) ) {
            switch( $_GET[ 'nf-use-cache' ] ) {
                case '0':
                    update_option('ninja_forms_cache_mode', false);
                    break;
                case '1':
                    update_option('ninja_forms_cache_mode', true);
                    break;
                default:
                    update_option('ninja_forms_cache_mode', false);
                    break;
            }
        }
    }
}

new NF_FeatureFlags();