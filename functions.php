<?php
/*
* My hub Theme Functions and Definitions
*
*@link https://developer.wordpress.org(themes/basic/theme-functions)
*
*@package wordpress
*@subpackage hub
*@since 1.0.0
*@version 1.2.0
*/

//Establecer el ancho máximo permitido para cualquier contenido en el tema, como por ejemplo, embeds e imágenes.
if(!isset($content_width)){
  $content_width = 800;
}

//Establecer variables globales y asignar un valor a esas variables
// global $google_fonts;
global $font_awesome;
global $hamburgers;
global $Jquery;

// $google_fonts = 'https://fonts.googleapis.com/css?family=Comfortaa|Open+Sans&display=swap';
$font_awesome = 'https://use.fontawesome.com/releases/v5.7.2/css/all.css';
$hamburgers = 'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css';
$Jquery = 'https://code.jquery.com/jquery-3.4.1.min.js';




// declaramos, registramos y cargamos los css y js
if(!function_exists('qtr_scripts')):
  function qtr_scripts() {
    // Declaramos variables
    // global $google_fonts;
    global $font_awesome;
    global $hamburgers;
    global $Jquery;

    $sweet = 'https://cdn.jsdelivr.net/npm/sweetalert2@8';
    $style = get_stylesheet_uri();

    // Registramos los archivos css

    wp_register_style('iconos', $font_awesome, array(), '5.7.2', 'all' );
    wp_register_style('hamburgers', $hamburgers, array(), '1.1.3', 'all' );
    // wp_register_style('fuentes', $google_fonts, array(), '1.0.0', 'all' );
    wp_register_style('style', $style, array(), '1.0.0', 'all' );

    // Registramos los archivos js

    wp_register_script('Jquery', $Jquery, array(), '3.4.1', true);
    wp_register_script('sweet', $sweet, array(), '1.0.0', true);

    // Cargamos los archivos dependiendo de la página en que estemos

    // if(is_front_page()):
    //   // Registramos js para esta página
    //   wp_register_script('inicio', get_template_directory_uri() . '/assets/js/inicio.js', array(), '1.0.0', true);

    //   // Cargamos los archivos css
    //   // wp_enqueue_style('slickcss');

    //   // Cargamos los archivos js
    //   wp_enqueue_script('Jquery');
    //   wp_enqueue_script('sweet');
    //   // wp_enqueue_script('slick');
    //   // wp_enqueue_script('custom');
    //   wp_enqueue_script('inicio');
    // endif;

    // Para todas las páginas

    wp_register_script('globaljs', get_template_directory_uri() . '/assets/js/bundle.js', array(), '1.0.0', true);

    // wp_enqueue_style('fuentes');
    wp_enqueue_style('iconos');
    wp_enqueue_style('hamburgers');
    wp_enqueue_style('style');

    wp_enqueue_script('globaljs');

  }
endif;
add_action( 'wp_enqueue_scripts', 'qtr_scripts' );

//Creamos Menús
if(!function_exists('qtr_menus')):
  function qtr_menus() {
    register_nav_menus(array(
      'menu_main' => __('Menú Principal', 'qtr'),
      'menu_social' => __('Menú Redes Sociales', 'qtr'),
      'menu_blog' => __('Menú Blog', 'qtr'),
    ));
  }
endif;
add_action( 'init', 'qtr_menus' );

// Creamos Widgets
if(!function_exists('qtr_register_sidebars')):
  function qtr_register_sidebars() {

    register_sidebar(array(
      'name' => __('Sidebar Principal', 'qtr'),
      'id' => 'sidebar_main',
      'description' => __('Este es el sidebar principal y aparecerá al lado del contenido principal.', 'qtr'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna I', 'qtr'),
      'id' => 'footer_uno',
      'description' => __('Columna uno del footer.', 'qtr'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna II', 'qtr'),
      'id' => 'footer_dos',
      'description' => __('Columna dos del footer.', 'qtr'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));

    register_sidebar(array(
      'name' => __('Footer Columna III', 'qtr'),
      'id' => 'footer_tres',
      'description' => __('Columna tres del footer.', 'qtr'),
      'before_widget' => '<article id="%1$s" class="Widget %2$s">',
      'after_widget' => '</article>',
      'before_title' => '<h3>',
      'after_title' => '</h3>'
    ));
  }
endif;
add_action('widgets_init', 'qtr_register_sidebars');

// Añadimos soportes básicos
if(!function_exists('qtr_setup')):
  function qtr_setup() {
    // soporte a imagen destacada
    add_theme_support('post-thumbnails');

    //soporte a etiquetas semánticas de html5
    add_theme_support('html5', array(
      'comment-list',
      'comment-form',
      'search-form',
      'gallery',
      'caption'
    ));

    // soporte a formatos de entrada
    add_theme_support('post-formats', array(
      'aside',
      'gallery',
      'link',
      'image',
      'quote',
      'status',
      'video',
      'audio',
      'chat'
    ));

    //Soporte a títulos dinámicos de páginas del sitio (para el SEO)
    add_theme_support('title-tag');

    //Soporte para que añada meta que permite interactuar con lectores RSS
    add_theme_support('automatic-feed-links');

    // Remueve meta etiqueta que muestra la versión de wordpress que usamos
    remove_action('wp_head', 'wp_generator');
  }
endif;
add_action('after_setup_theme', 'qtr_setup');

// Soportes adicionales
require_once get_template_directory() . '/inc/custom-header.php';
require_once get_template_directory() . '/inc/custom-excerpt.php';
require_once get_template_directory() . '/inc/custom-description.php';

