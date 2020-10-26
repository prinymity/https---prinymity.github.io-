<?php
/**
 * Additional PHP for blocks.
 *
 * @package ghostkit
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * GhostKit_Settings
 */
class GhostKit_Settings {
    /**
     * Slug of the plugin screen.
     *
     * @var $plugin_screen_hook_suffix
     */
    protected $plugin_screen_hook_suffix = null;

    /**
     * GhostKit_Settings constructor.
     */
    public function __construct() {
        // work only if Gutenberg available.
        if ( ! function_exists( 'register_block_type' ) ) {
            return;
        }

        // Load admin style sheet and JavaScript.
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );

        // Sometimes redirect is not working on page opens. Admin Init is a solution.
        add_action( 'admin_init', array( $this, 'go_pro_redirect' ) );

        // Add the options page and menu item.
        add_action( 'admin_menu', array( $this, 'admin_menu' ) );
    }

    /**
     * Register and enqueue admin-specific style sheet.
     */
    public function admin_enqueue_scripts() {
        $screen = get_current_screen();

        wp_enqueue_style(
            'ghostkit-admin',
            ghostkit()->plugin_url . 'assets/admin/css/admin.min.css',
            array(),
            filemtime( ghostkit()->plugin_path . 'assets/admin/css/admin.min.css' )
        );

        wp_enqueue_style(
            'ghostkit-settings',
            ghostkit()->plugin_url . 'settings/style.min.css',
            array(),
            filemtime( ghostkit()->plugin_path . 'settings/style.min.css' )
        );

        if ( 'toplevel_page_ghostkit' !== $screen->id ) {
            return;
        }

        $block_categories = array();
        if ( function_exists( 'get_block_categories' ) ) {
            $block_categories = get_block_categories( get_post() );
        } elseif ( function_exists( 'gutenberg_get_block_categories' ) ) {
            $block_categories = gutenberg_get_block_categories( get_post() );
        }

        // enqueue blocks library.
        wp_enqueue_script( 'wp-block-library' );

        wp_add_inline_script(
            'wp-blocks',
            sprintf( 'wp.blocks.setCategories( %s );', wp_json_encode( $block_categories ) ),
            'after'
        );

        // Ghost Kit Settings.
        wp_enqueue_script(
            'ghostkit-settings',
            ghostkit()->plugin_url . 'settings/index.min.js',
            array( 'ghostkit-helper', 'wp-data', 'wp-element', 'wp-components', 'wp-api', 'wp-api-request', 'wp-i18n' ),
            filemtime( ghostkit()->plugin_path . 'settings/index.min.js' ),
            true
        );

        wp_localize_script(
            'ghostkit-settings',
            'ghostkitSettingsData',
            array(
                'api_nonce' => wp_create_nonce( 'wp_rest' ),
                'api_url'   => rest_url( 'ghostkit/v1/' ),
            )
        );

        // phpcs:ignore
        do_action( 'enqueue_block_editor_assets' );

        wp_enqueue_style( 'wp-components' );
    }

    /**
     * Go Pro.
     * Redirect to the Pro purchase page.
     */
    public function go_pro_redirect() {
        // phpcs:ignore
        if ( ! isset( $_GET['page'] ) || empty( $_GET['page'] ) ) {
            return;
        }

        // phpcs:ignore
        if ( 'ghostkit_go_pro' === $_GET['page'] ) {
            // phpcs:ignore
            wp_redirect( ghostkit()->go_pro_link() );
            exit();
        }
    }

    /**
     * Add admin menu.
     */
    public function admin_menu() {
        add_menu_page(
            esc_html__( 'Ghost Kit', 'ghostkit' ),
            esc_html__( 'Ghost Kit', 'ghostkit' ),
            'manage_options',
            'ghostkit',
            array( $this, 'display_admin_page' ),
            'dashicons-admin-ghostkit',
            56.9
        );

        add_submenu_page(
            'ghostkit',
            '',
            esc_html__( 'Blocks', 'ghostkit' ),
            'manage_options',
            'ghostkit'
        );
        add_submenu_page(
            'ghostkit',
            '',
            esc_html__( 'Icons', 'ghostkit' ),
            'manage_options',
            'admin.php?page=ghostkit&sub_page=icons'
        );
        add_submenu_page(
            'ghostkit',
            '',
            esc_html__( 'Typography', 'ghostkit' ),
            'manage_options',
            'admin.php?page=ghostkit&sub_page=typography'
        );
        add_submenu_page(
            'ghostkit',
            '',
            esc_html__( 'Fonts', 'ghostkit' ),
            'manage_options',
            'admin.php?page=ghostkit&sub_page=fonts'
        );
        add_submenu_page(
            'ghostkit',
            '',
            esc_html__( 'CSS & JavaScript', 'ghostkit' ),
            'manage_options',
            'admin.php?page=ghostkit&sub_page=css_js'
        );
        add_submenu_page(
            'ghostkit',
            '',
            '<span class="dashicons dashicons-star-filled" style="font-size: 17px"></span> ' . esc_html__( 'Go Pro', 'ghostkit' ),
            'manage_options',
            'ghostkit_go_pro',
            array( $this, 'go_pro_redirect' )
        );
    }

    /**
     * Render the admin page.
     */
    public function display_admin_page() {
        ?>
        <div class="ghostkit-admin-page"></div>
        <?php
    }
}

new GhostKit_Settings();
