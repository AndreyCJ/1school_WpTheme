<?php 

  function school_files() {
    wp_enqueue_style('Roboto-font', '//fonts.googleapis.com/css?family=Roboto:300,400,500');
    wp_enqueue_style('OpenSans-font', '//fonts.googleapis.com/css?family=Open+Sans:400,600,700&amp;subset=cyrillic');
    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.5.0/css/all.css');
    wp_enqueue_style('school_main_styles', get_stylesheet_uri(), NULL, '1.0');// microtime();
    wp_enqueue_style('flickity-styles', get_theme_file_uri('/includes/flickity.css'));
    wp_enqueue_script('flickity-script', get_theme_file_uri('/includes/flickity.pkgd.min.js'));
    wp_enqueue_script('main-js', get_theme_file_uri('/js/main.js'), NULL, '1.0', true); 
    wp_localize_script('main-js', 'schoolData', [
      'root_url' => get_site_url()
    ]);
  }

  add_action('wp_enqueue_scripts', 'school_files');

  add_filter( 'excerpt_length', function(){
    return 12;
  } );
  function wpdocs_excerpt_more( $more ) {
    return '...';
  }
  add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );
  add_filter( 'show_admin_bar', '__return_false' );
  add_filter( 'allow_major_auto_core_updates', '__return_true' );  


  function school_features() {
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocationOne', 'Footer Menu Location One');
    register_nav_menu('footerMenuLocationTwo', 'Footer Menu Location Two');
    add_theme_support('title-tag');
  }
  add_action('after_setup_theme', 'school_features');


  add_theme_support( 'post-thumbnails' ); 


  // SHORTCODES
  function space_shortcode() {
    return '<span class="space-shortcode"></span>';
  }

  add_shortcode('space-sc', 'space_shortcode');


  /**
   * Register our sidebars and widgetized areas.
   */
  function home_slider_widget() {

    register_sidebar( array(
      'name'          => 'Контейнер слайдера',
      'id'            => 'home_slider_widget',
    ) );

  }
  add_action( 'widgets_init', 'home_slider_widget' );

  function footer_widget_area() {
    register_sidebar( array(
      'name'          => 'Footer Widget Area #1',
		  'id'            => 'footer_widget_area',
		  'before_widget' => '<div class="menu">',
		  'after_widget'  => '</div>',
    ));
  }
  add_action( 'widgets_init', 'footer_widget_area' );

  function sidebar_widget_area() {
    register_sidebar( array(
      'name'          => 'Sidebar widget area',
		  'id'            => 'sidebar_widget_area',
		  'before_widget' => '<div class="single-widget">',
		  'after_widget'  => '</div>',
    ));
  }
  add_action( 'widgets_init', 'sidebar_widget_area' );
?>
