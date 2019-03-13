<?php if ( ! defined( 'ABSPATH' ) ) exit;

final class NF_Admin_Menus_Dashboard extends NF_Abstracts_Submenu
{
    public $parent_slug = 'ninja-forms';

    public $page_title = 'Dashboard';

    public $menu_slug = 'ninja-forms';

    public $priority = 1;

    public function __construct()
    {
        parent::__construct();
        add_filter( 'ninja-forms-dashboard-promotions', array( $this, 'manage_promotions' ), 10, 1 );
    }

    public function get_page_title()
    {
        if( isset( $_GET[ 'form_id' ] ) ) {
            return __( 'Form Builder', 'ninja-forms' );
        }
        return __( 'Dashboard', 'ninja-forms' );
    }

    public function get_capability()
    {
        return apply_filters( 'ninja_forms_admin_all_forms_capabilities', $this->capability );
    }

    public function display()
    {
        // This section intentionally left blank.
    }

    public function manage_promotions( $promotions )
    {

        
    }

    public function check_for_membership( $promotions )
    {
        if( class_exists( 'NF_Layouts' ) ) {
            unset( $promotions[ 'personal-20' ] );
            unset( $promotions[ 'personal-50' ] );
        }
        return $promotions;
    }

} // End Class NF_Admin_Settings
