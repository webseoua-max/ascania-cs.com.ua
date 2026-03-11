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
add_action('wp_footer', function() {
    ?>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var inner = document.querySelector('.elementor-element-8027c60 .e-con-inner');
        if (!inner) return;
        var phones = document.createElement('div');
        phones.className = 'acs-phones-bar';
        phones.innerHTML = `
          <div class="acs-phone-item">
            <span>Автомийка:</span>
            <a class="acs-num" href="tel:+380985670202">+38 098 567 0202</a>
            <a class="acs-icon-tg" href="https://t.me/+380985670202" target="_blank" title="Написати в Telegram">
              <i class="fab fa-telegram-plane"></i>
            </a>
            <a class="acs-icon-vb" href="viber://chat?number=%2B380985670202" title="Написати у Viber">
              <i class="fab fa-viber"></i>
            </a>
          </div>
          <div class="acs-phone-item">
            <span>Кузовний ремонт:</span>
            <a class="acs-num" href="tel:+380985680202">+38 098 568 0202</a>
            <a class="acs-icon-tg" href="https://t.me/+380985680202" target="_blank" title="Написати в Telegram">
              <i class="fab fa-telegram-plane"></i>
            </a>
            <a class="acs-icon-vb" href="viber://chat?number=%2B380985680202" title="Написати у Viber">
              <i class="fab fa-viber"></i>
            </a>
          </div>
          <div class="acs-phone-item">
            <span>Підбір запчастин:</span>
            <a class="acs-num" href="tel:+380672464304">+38 067 246 4304</a>
            <a class="acs-icon-tg" href="https://t.me/+380672464304" target="_blank" title="Написати в Telegram">
              <i class="fab fa-telegram-plane"></i>
            </a>
            <a class="acs-icon-vb" href="viber://chat?number=%2B380672464304" title="Написати у Viber">
              <i class="fab fa-viber"></i>
            </a>
          </div>
        `;
        inner.insertBefore(phones, inner.children[1]);
    });
    </script>
    <?php
});
