<?php
/*
 * This is the child theme for Hello Elementor theme, generated with Generate Child Theme plugin by catchthemes.
 *
 * (Please see https://developer.wordpress.org/themes/advanced-topics/child-themes/#how-to-create-a-child-theme)
 */
add_action( 'wp_enqueue_scripts', 'acs_enqueue_styles' );
function acs_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array('parent-style')
    );
		wp_enqueue_style('acs-global', get_stylesheet_directory_uri() . '/assets/css/global.css' );
}
function acs_scripts() {
	wp_enqueue_script('acs-custom', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);
}
add_action( 'wp_enqueue_scripts', 'acs_scripts' );
/*
 * Your code goes below
 */
// off xml
add_filter('xmlrpc_enabled', '__return_false');
//clasic widget
add_filter( 'gutenberg_use_widgets_block_editor', '__return_false' );
add_filter( 'use_widgets_block_editor', '__return_false' );
//remove wpcf7 autop
add_filter('wpcf7_autop_or_not', '__return_false');
//url widget
function alter_login_headerurl() {
	return '/'; 
}
add_action('login_headerurl','alter_login_headerurl');
// === Телефони у верхньому рядку хедера ===
add_action( 'elementor/frontend/section/before_render', function( $element ) {
    if ( $element->get_id() === '8027c60' ) {
        add_action( 'elementor/frontend/container/before_render', function( $inner ) {
            if ( $inner->get_id() === '8027c60' ) {
                ob_start();
                ?>
                <div class="acs-phones-bar">
                  <div class="acs-phone-item">
                    <span>Автомийка:</span>
                    <a class="acs-num" href="tel:+380985670202">+38 098 567 0202</a>
                    <a class="acs-icon-tg" href="https://t.me/+380985670202" target="_blank">
                      <svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248-1.97 9.289c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L8.32 14.617l-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.496.969z"/></svg>
                    </a>
                    <a class="acs-icon-vb" href="viber://chat?number=%2B380985670202">
                      <svg viewBox="0 0 24 24"><path d="M11.4 0C8.9 0 3.8 1 1.8 6.3c-.7 1.9-.8 4.4-.8 5.8 0 1.6.1 4.6 1.7 6.3.5.5 1.1.9 1.9 1l.01 2.2s-.02.6.38.74c.49.15.9-.31 2-.63.01-.01.01-.02.02-.03.56.05 1.12.07 1.67.07 2.4 0 7-.95 8.88-6.07.72-1.93.78-4.44.78-5.8 0-1.62-.12-4.59-1.67-6.32C14.56.66 12.6 0 11.4 0z"/></svg>
                    </a>
                  </div>
                  <div class="acs-phone-item">
                    <span>Кузовний ремонт:</span>
                    <a class="acs-num" href="tel:+380985680202">+38 098 568 0202</a>
                    <a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank">
                      <svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248-1.97 9.289c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L8.32 14.617l-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.496.969z"/></svg>
                    </a>
                    <a class="acs-icon-vb" href="viber://chat?number=%2B380985680202">
                      <svg viewBox="0 0 24 24"><path d="M11.4 0C8.9 0 3.8 1 1.8 6.3c-.7 1.9-.8 4.4-.8 5.8 0 1.6.1 4.6 1.7 6.3.5.5 1.1.9 1.9 1l.01 2.2s-.02.6.38.74c.49.15.9-.31 2-.63.01-.01.01-.02.02-.03.56.05 1.12.07 1.67.07 2.4 0 7-.95 8.88-6.07.72-1.93.78-4.44.78-5.8 0-1.62-.12-4.59-1.67-6.32C14.56.66 12.6 0 11.4 0z"/></svg>
                    </a>
                  </div>
                  <div class="acs-phone-item">
                    <span>Підбір запчастин:</span>
                    <a class="acs-num" href="tel:+380672464304">+38 067 246 4304</a>
                    <a class="acs-icon-tg" href="https://t.me/+380672464304" target="_blank">
                      <svg viewBox="0 0 24 24"><path d="M12 0C5.373 0 0 5.373 0 12s5.373 12 12 12 12-5.373 12-12S18.627 0 12 0zm5.562 8.248-1.97 9.289c-.145.658-.537.818-1.084.508l-3-2.21-1.447 1.447 1.394c-.16.16-.295.295-.605.295l.213-3.053 5.56-5.023c.242-.213-.054-.333-.373-.12L8.32 14.617l-2.96-.924c-.643-.204-.657-.643.136-.953l11.57-4.461c.537-.194 1.006.131.496.969z"/></svg>
                    </a>
                    <a class="acs-icon-vb" href="viber://chat?number=%2B380672464304">
                      <svg viewBox="0 0 24 24"><path d="M11.4 0C8.9 0 3.8 1 1.8 6.3c-.7 1.9-.8 4.4-.8 5.8 0 1.6.1 4.6 1.7 6.3.5.5 1.1.9 1.9 1l.01 2.2s-.02.6.38.74c.49.15.9-.31 2-.63.01-.01.01-.02.02-.03.56.05 1.12.07 1.67.07 2.4 0 7-.95 8.88-6.07.72-1.93.78-4.44.78-5.8 0-1.62-.12-4.59-1.67-6.32C14.56.66 12.6 0 11.4 0z"/></svg>
                    </a>
                  </div>
                </div>
                <?php
                ob_end_clean();
            }
        });
    }
});