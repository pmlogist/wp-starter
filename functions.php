<?php


/**
 * Styles
 */

function pmlogist_register_styles()
{
  $version = wp_get_theme()->get("Version");

  wp_enqueue_style(
    "pmlogist_app_css",
    get_template_directory_uri() . "/css/app.css",
    array('pmlogist_adobe_fonts', 'pmlogist_tabler_icons'),
    $version,
    "all"
  );

  wp_enqueue_style(
    "pmlogist_adobe_fonts",
    "https://use.typekit.net/fkx3hwc.css",
    array(),
    "1.0",
    'all'
  );

  wp_enqueue_style(
    "pmlogist_tabler_icons",
    "https://cdn.jsdelivr.net/npm/@tabler/icons@latest/iconfont/tabler-icons.min.css",
    array(),
    "1.0",
    'all'
  );
}
add_action("wp_enqueue_scripts", "pmlogist_register_styles");

/**
 * Javscript
 */
function pmlogist_register_scripts()
{
  $version = wp_get_theme()->get("Version");


  wp_enqueue_script("pmlogist_vue_js", "https://unpkg.com/vue@3/dist/vue.global.prod.js", array(), true);
  wp_enqueue_script("pmlogist_sfc_js", "https://cdn.jsdelivr.net/npm/vue3-sfc-loader/dist/vue3-sfc-loader.js", array(), true);

  wp_enqueue_script(
    "pmlogist_app_js",
    get_template_directory_uri() . "/js/app.js",
    array("pmlogist_menu_js"),
    $version,
    true
  );

  wp_enqueue_script(
    "pmlogist_menu_js",
    get_template_directory_uri() . "/js/menu.js",
    array(),
    $version,
    true
  );

  wp_localize_script("pmlogist_app_js", "WP_STORE", array(
    "components" => parse_url(get_template_directory_uri(), PHP_URL_PATH) . "/js/components",
    "base_url" => get_site_url("url"),
    "api_url" => get_site_url("url") . "/wp-json/wp/v2"
  ));
}
add_action("wp_enqueue_scripts", "pmlogist_register_scripts");



function pmlogist_setup()
{
  // Add default posts and comments RSS feed links to head.
  add_theme_support("automatic-feed-links");
  add_theme_support("title-tag");

  /**
   * Add post-formats support.
   */
  add_theme_support(
    'post-formats',
    array(
      'link',
      'aside',
      'gallery',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat',
    )
  );
  add_theme_support('post-thumbnails');
  set_post_thumbnail_size(1568, 9999);

  register_nav_menus(
    array(
      'primary' => esc_html__('Primary menu', 'pmlogist'),
      'footer'  => esc_html__('Secondary menu', 'pmlogist'),
    )
  );
}
add_action('after_setup_theme', 'pmlogist_setup');



// Active link
function add_active_link_primary_menu($classes, $item)
{
  if (in_array('current-page-ancestor', $classes) || in_array('current-menu-item', $classes)) {
    $classes[] = 'text-black ';
  }
  return $classes;
}
add_filter('nav_menu_css_class', 'add_active_link_primary_menu', 10, 2);

function add_additional_class_on_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);
