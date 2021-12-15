<?php

// $mes = error_log(json_encode(['user_agent' => $_SERVER['HTTP_USER_AGENT'], 'date' => date('Y-m-d  H:i:s',strtotime('now'))]));

// var_dump($mes);
/**
 * Casino Theme functions and definitions
 *
 * Sets up the theme and provides some helper functions, which are used
 * in the theme as custom template tags. Others are attached to action and
 * filter hooks in WordPress to change core functionality.
 *
 * When using a child theme (see https://codex.wordpress.org/Theme_Development and
 * https://codex.wordpress.org/Child_Themes), you can override certain functions
 * (those wrapped in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before the parent
 * theme's file, so the child theme functions would be used.
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are instead attached
 * to a filter or action hook.
 *
 * For more information on hooks, actions, and filters, @link https://codex.wordpress.org/Plugin_API
 *
 * @package WordPress
 * @subpackage Casino_Theme
 * @since Casino Theme 1.0
 */

// Set up the content width value based on the theme's design and stylesheet.
if ( ! isset( $content_width ) )
	$content_width = 625;

/**
 * Casino Theme setup.
 *
 * Sets up theme defaults and registers the various WordPress features that
 * Casino Theme supports.
 *
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_editor_style() To add a Visual Editor stylesheet.
 * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
 * 	custom background, and post formats.
 * @uses register_nav_menu() To add support for navigation menus.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_setup() {
	/*
	 * Makes Casino Theme available for translation.
	 *
	 * Translations can be filed at WordPress.org. See: https://translate.wordpress.org/projects/wp-themes/casinotheme
	 * If you're building a theme based on Casino Theme, use a find and replace
	 * to change 'casinotheme' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'casinotheme' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// Adds RSS feed links to <head> for posts and comments.
	add_theme_support( 'automatic-feed-links' );

	// This theme supports a variety of post formats.
	add_theme_support( 'post-formats', array( 'aside', 'image', 'link', 'quote', 'status' ) );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menu( 'primary', __( 'Primary Menu', 'casinotheme' ) );

	/*
	 * This theme supports custom background color and image,
	 * and here we also set up the default background color.
	 */
	add_theme_support( 'custom-background', array(
		'default-color' => 'e6e6e6',
	) );

	// This theme uses a custom image size for featured images, displayed on "standard" posts.
	add_theme_support( 'post-thumbnails' );
	set_post_thumbnail_size( 624, 9999 ); // Unlimited height, soft crop
    add_image_size( 'sk-small-1', 160, 160, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-2', 217, 108, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-3', 70, 70, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-4', 218, 168, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-5', 42, 42, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-6', 220, 170, true ); //Latest Posts_sk thumb
    add_image_size( 'sk-small-7', 160, 130, true ); //Latest Posts_sk thumb
    
	// Indicate widget sidebars can use selective refresh in the Customizer.
	add_theme_support( 'customize-selective-refresh-widgets' );
}
add_action( 'after_setup_theme', 'casinotheme_setup' );

/**
 * Add support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Return the Google font stylesheet URL if available.
 *
 * The use of Open Sans by default is localized. For languages that use
 * characters not supported by the font, the font can be disabled.
 *
 * @since Casino Theme 1.2
 *
 * @return string Font stylesheet or empty string if disabled.
 */
 
 
function casinotheme_get_font_url() {
	$font_url = '';

	/* translators: If there are characters in your language that are not supported
	 * by Open Sans, translate this to 'off'. Do not translate into your own language.
	 */
	if ( 'off' !== _x( 'on', 'Open Sans font: on or off', 'casinotheme' ) ) {
		$subsets = 'latin,latin-ext';

		/* translators: To add an additional Open Sans character subset specific to your language,
		 * translate this to 'greek', 'cyrillic' or 'vietnamese'. Do not translate into your own language.
		 */
		$subset = _x( 'no-subset', 'Open Sans font: add new subset (greek, cyrillic, vietnamese)', 'casinotheme' );

		if ( 'cyrillic' == $subset )
			$subsets .= ',cyrillic,cyrillic-ext';
		elseif ( 'greek' == $subset )
			$subsets .= ',greek,greek-ext';
		elseif ( 'vietnamese' == $subset )
			$subsets .= ',vietnamese';

		$query_args = array(
			'family' => 'Open+Sans:400italic,700italic,400,700',
			'subset' => $subsets,
		);
		$font_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
	}

	return $font_url;
}

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		//'primary' => esc_html__( 'Primary', 'casino' ),
        'top'    => 'Низ меню, самый низ',    //Название месторасположения меню в шаблоне
	    'bottom' => 'Нижнее меню'      //Название другого месторасположения меню в шаблоне
	) );

/**
 * Enqueue scripts and styles for front end.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_scripts_styles() {
	global $wp_styles;

	/*
	 * Adds JavaScript to pages with the comment form to support
	 * sites with threaded comments (when in use).
	 */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
		wp_enqueue_script( 'comment-reply' );

	// Adds JavaScript for handling the navigation menu hide-and-show behavior.
	wp_enqueue_script( 'casinotheme-navigation', get_template_directory_uri() . '/js/navigation.js', array( 'jquery' ), '20140711', true );

	$font_url = casinotheme_get_font_url();
	if ( ! empty( $font_url ) )
		wp_enqueue_style( 'casinotheme-fonts', esc_url_raw( $font_url ), array(), null );

	// Loads our main stylesheet.
	wp_enqueue_style( 'casinotheme-style', get_stylesheet_uri() );

	// Loads the Internet Explorer specific stylesheet.
	wp_enqueue_style( 'casinotheme-ie', get_template_directory_uri() . '/css/ie.css', array( 'casinotheme-style' ), '20121010' );
	$wp_styles->add_data( 'casinotheme-ie', 'conditional', 'lt IE 9' );
}
add_action( 'wp_enqueue_scripts', 'casinotheme_scripts_styles' );

/**
 * Filter TinyMCE CSS path to include Google Fonts.
 *
 * Adds additional stylesheets to the TinyMCE editor if needed.
 *
 * @uses casinotheme_get_font_url() To get the Google Font stylesheet URL.
 *
 * @since Casino Theme 1.2
 *
 * @param string $mce_css CSS path to load in TinyMCE.
 * @return string Filtered CSS path.
 */
function casinotheme_mce_css( $mce_css ) {
	$font_url = casinotheme_get_font_url();

	if ( empty( $font_url ) )
		return $mce_css;

	if ( ! empty( $mce_css ) )
		$mce_css .= ',';

	$mce_css .= esc_url_raw( str_replace( ',', '%2C', $font_url ) );

	return $mce_css;
}
add_filter( 'mce_css', 'casinotheme_mce_css' );

/**
 * Filter the page title.
 *
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since Casino Theme 1.0
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function casinotheme_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name', 'display' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'casinotheme' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'casinotheme_wp_title', 10, 2 );

/**
 * Filter the page menu arguments.
 *
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_page_menu_args( $args ) {
	if ( ! isset( $args['show_home'] ) )
		$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'casinotheme_page_menu_args' );

/**
 * Register sidebars.
 *
 * Registers our main widget area and the front page widget areas.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_widgets_init() {
/*	register_sidebar( array(
		'name' => __( 'Main Sidebar', 'casinotheme' ),
		'id' => 'sidebar-1',
		'description' => __( 'Appears on posts and pages except the optional Front Page template, which has its own widgets', 'casinotheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'First Front Page Widget Area', 'casinotheme' ),
		'id' => 'sidebar-2',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'casinotheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );

	register_sidebar( array(
		'name' => __( 'Second Front Page Widget Area', 'casinotheme' ),
		'id' => 'sidebar-3',
		'description' => __( 'Appears when using the optional Front Page template with a page set as Static Front Page', 'casinotheme' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );*/
    
    register_sidebar(array(
        'name' => __('На главной верх'),
        'id' => 'index-widget-top',
        'description' => __('Верхняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="br4">',
        'after_title' => '</h1>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('На главной низ'),
        'id' => 'index-widget-bottom',
        'description' => __('Нижняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="br3">',
        'after_title' => '</h2>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
        
    register_sidebar(array(
        'name' => __('На главной баннеры самый верх'),
        'id' => 'index-widget-tops',
        'description' => __('Верхняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="br32">',
        'after_title' => '</h2>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('На всех страницах футер'),
        'id' => 'index-widget-butt',
        'description' => __('Футер'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="br3">',
        'after_title' => '</h2>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
    
    
    
    
    register_sidebar(array(
        'name' => __('Игровые автоматы верх'),
        'id' => 'index-widget-avtomat-top',
        'description' => __('Верхняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="br4">',
        'after_title' => '</h1>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('Игровые автоматы низ'),
        'id' => 'index-widget-avtomat-bottom',
        'description' => __('Нижняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="br3">',
        'after_title' => '</h2>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));    
    
    
    register_sidebar(array(
        'name' => __('Статьи верх'),
        'id' => 'index-widget-stati-top',
        'description' => __('Верхняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1 class="br4">',
        'after_title' => '</h1>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));
    
    register_sidebar(array(
        'name' => __('Статьи низ'),
        'id' => 'index-widget-stati-bottom',
        'description' => __('Нижняя часть'),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h2 class="br3">',
        'after_title' => '</h2>',
        'before_text' => '<div class="cat_desc">',
        'after_text' => '</div>',
    ));  
    
}
add_action( 'widgets_init', 'casinotheme_widgets_init' );

if ( ! function_exists( 'casinotheme_content_nav' ) ) :
/**
 * Displays navigation to next/previous pages when applicable.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_content_nav( $html_id ) {
	global $wp_query;

	if ( $wp_query->max_num_pages > 1 ) : ?>
		<nav id="<?php echo esc_attr( $html_id ); ?>" class="navigation" role="navigation">
			<h3 class="assistive-text"><?php _e( 'Post navigation', 'casinotheme' ); ?></h3>
			<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', 'casinotheme' ) ); ?></div>
			<div class="nav-next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', 'casinotheme' ) ); ?></div>
		</nav><!-- .navigation -->
	<?php endif;
}
endif;

if ( ! function_exists( 'casinotheme_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own casinotheme_comment(), and that function will be used instead.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
		// Display trackbacks differently than normal comments.
	?>
	<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
		<p><?php _e( 'Pingback:', 'casinotheme' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( __( '(Edit)', 'casinotheme' ), '<span class="edit-link">', '</span>' ); ?></p>
	<?php
			break;
		default :
		// Proceed with normal comments.
		global $post;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment">
			<header class="comment-meta comment-author vcard">
				<?php
					echo get_avatar( $comment, 44 );
					printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
						get_comment_author_link(),
						// If current post author is also comment author, make it known visually.
						( $comment->user_id === $post->post_author ) ? '<span>' . __( 'Post author', 'casinotheme' ) . '</span>' : ''
					);
					printf( '<a href="%1$s"><time datetime="%2$s">%3$s</time></a>',
						esc_url( get_comment_link( $comment->comment_ID ) ),
						get_comment_time( 'c' ),
						/* translators: 1: date, 2: time */
						sprintf( __( '%1$s at %2$s', 'casinotheme' ), get_comment_date(), get_comment_time() )
					);
				?>
			</header><!-- .comment-meta -->

			<?php if ( '0' == $comment->comment_approved ) : ?>
				<p class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.', 'casinotheme' ); ?></p>
			<?php endif; ?>

			<section class="comment-content comment">
				<?php comment_text(); ?>
				<?php edit_comment_link( __( 'Edit', 'casinotheme' ), '<p class="edit-link">', '</p>' ); ?>
			</section><!-- .comment-content -->

			<div class="reply">
				<?php comment_reply_link( array_merge( $args, array( 'reply_text' => __( 'Reply', 'casinotheme' ), 'after' => ' <span>&darr;</span>', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->
	<?php
		break;
	endswitch; // end comment_type check
}
endif;

if ( ! function_exists( 'casinotheme_entry_meta' ) ) :
/**
 * Set up post entry meta.
 *
 * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
 *
 * Create your own casinotheme_entry_meta() to override in a child theme.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_entry_meta() {
	// Translators: used between list items, there is a space after the comma.
	$categories_list = get_the_category_list( __( ', ', 'casinotheme' ) );

	// Translators: used between list items, there is a space after the comma.
	$tag_list = get_the_tag_list( '', __( ', ', 'casinotheme' ) );

	$date = sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a>',
		esc_url( get_permalink() ),
		esc_attr( get_the_time() ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() )
	);

	$author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
		esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
		esc_attr( sprintf( __( 'View all posts by %s', 'casinotheme' ), get_the_author() ) ),
		get_the_author()
	);

	// Translators: 1 is category, 2 is tag, 3 is the date and 4 is the author's name.
	if ( $tag_list ) {
		$utility_text = __( 'This entry was posted in %1$s and tagged %2$s on %3$s<span class="by-author"> by %4$s</span>.', 'casinotheme' );
	} elseif ( $categories_list ) {
		$utility_text = __( 'This entry was posted in %1$s on %3$s<span class="by-author"> by %4$s</span>.', 'casinotheme' );
	} else {
		$utility_text = __( 'This entry was posted on %3$s<span class="by-author"> by %4$s</span>.', 'casinotheme' );
	}

	printf(
		$utility_text,
		$categories_list,
		$tag_list,
		$date,
		$author
	);
}
endif;

/**
 * Extend the default WordPress body classes.
 *
 * Extends the default WordPress body class to denote:
 * 1. Using a full-width layout, when no active widgets in the sidebar
 *    or full-width template.
 * 2. Front Page template: thumbnail in use and number of sidebars for
 *    widget areas.
 * 3. White or empty background color to change the layout and spacing.
 * 4. Custom fonts enabled.
 * 5. Single or multiple authors.
 *
 * @since Casino Theme 1.0
 *
 * @param array $classes Existing class values.
 * @return array Filtered class values.
 */
function casinotheme_body_class( $classes ) {
	$background_color = get_background_color();
	$background_image = get_background_image();

	if ( ! is_active_sidebar( 'sidebar-1' ) || is_page_template( 'page-templates/full-width.php' ) )
		$classes[] = 'full-width';

	if ( is_page_template( 'page-templates/front-page.php' ) ) {
		$classes[] = 'template-front-page';
		if ( has_post_thumbnail() )
			$classes[] = 'has-post-thumbnail';
		if ( is_active_sidebar( 'sidebar-2' ) && is_active_sidebar( 'sidebar-3' ) )
			$classes[] = 'two-sidebars';
	}

	if ( empty( $background_image ) ) {
		if ( empty( $background_color ) )
			$classes[] = 'custom-background-empty';
		elseif ( in_array( $background_color, array( 'fff', 'ffffff' ) ) )
			$classes[] = 'custom-background-white';
	}

	// Enable custom font class only if the font CSS is queued to load.
	if ( wp_style_is( 'casinotheme-fonts', 'queue' ) )
		$classes[] = 'custom-font-enabled';

	if ( ! is_multi_author() )
		$classes[] = 'single-author';

	return $classes;
}
add_filter( 'body_class', 'casinotheme_body_class' );

/**
 * Adjust content width in certain contexts.
 *
 * Adjusts content_width value for full-width and single image attachment
 * templates, and when there are no active widgets in the sidebar.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_content_width() {
	if ( is_page_template( 'page-templates/full-width.php' ) || is_attachment() || ! is_active_sidebar( 'sidebar-1' ) ) {
		global $content_width;
		$content_width = 960;
	}
}
add_action( 'template_redirect', 'casinotheme_content_width' );

/**
 * Register postMessage support.
 *
 * Add postMessage support for site title and description for the Customizer.
 *
 * @since Casino Theme 1.0
 *
 * @param WP_Customize_Manager $wp_customize Customizer object.
 */
function casinotheme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector' => '.site-title > a',
			'container_inclusive' => false,
			'render_callback' => 'casinotheme_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector' => '.site-description',
			'container_inclusive' => false,
			'render_callback' => 'casinotheme_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'casinotheme_customize_register' );





function trim_title_chars($count, $after, $title) {
    if($title == ''){
        $title = get_the_title();
    }
  
  if (mb_strlen($title) > $count) $title = mb_substr($title,0,$count);
  else $after = '';
  echo $title . $after;
}

function trim_content_chars($count, $after) {
  $content = get_the_content();
  
  $search = array ("'<img[^>]*?>'si");                    // интерпретировать как php-код

$replace = array ("");

$content = preg_replace($search, $replace, $content);

  if (mb_strlen($content) > $count) $content = mb_substr($content,0,$count);
  else $after = '';
  echo $content . $after;
}
    
    
    
    
// Creating the widget 
class wpb_widget extends WP_Widget {

    function __construct() {
        parent::__construct(
        // Base ID of your widget
        'wpb_widget', 
        
        // Widget name will appear in UI
        __('Баннер для главной', 'wpb_widget_domain'), 
        
        // Widget description
        array( 'description' => __( 'Баннеры', 'wpb_widget_domain' ), ) 
        );
    }

// Creating widget front-end
// This is where the action happens
public function widget( $args, $instance ) {
    $title = apply_filters( 'widget_title', $instance['title'] );
    $title2 = apply_filters( 'widget_title2', $instance['title2'] );
    $title3 = apply_filters( 'widget_title3', $instance['title3'] );
    $title4 = apply_filters( 'widget_title4', $instance['title4'] );
    
    // before and after widget arguments are defined by themes
    echo $args['before_widget'];
    if ( ! empty( $title ) )
        //echo $args['before_title'] . $title . $args['after_title'];
        
      		echo '  <div class="top_banner_one">
                        <a href="'.$title4.'" target="_blank" class="top_banner_img" title="'.$title.'"></a>
                        <div class="top_banner_ch">Бонус:</div>
                        <div class="top_banner_num">'.$title3.'</div>
                    </div>';

    //echo $args['after_widget'];
}
		
// Widget Backend 
public function form( $instance ) {
    if ( isset( $instance[ 'title' ] ) ) {
        $title = $instance[ 'title' ];
    }
    else {
        $title = __( 'Заголовок', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'title2' ] ) ) {
        $title2 = $instance[ 'title2' ];
    }
    else {
        $title2 = __( 'http://casino.kotenko.biz/wp-content/uploads/2016/12/ban_1.png', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'title3' ] ) ) {
        $title3 = $instance[ 'title3' ];
    }
    else {
        $title3 = __( '95%', 'wpb_widget_domain' );
    }
    if ( isset( $instance[ 'title4' ] ) ) {
        $title4 = $instance[ 'title4' ];
    }
    else {
        $title4 = __( 'http://i.com', 'wpb_widget_domain' );
    }

    

// Widget admin form
?>
    <p>
        <label for="<?php echo $this->get_field_id( 'title' ); ?>">Название alt, title</label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'title2' ); ?>">Картинка 160*160</label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" type="text" value="<?php echo esc_attr( $title2 ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'title3' ); ?>">Процент</label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" type="text" value="<?php echo esc_attr( $title3 ); ?>" />
    </p>
    
    <p>
        <label for="<?php echo $this->get_field_id( 'title4' ); ?>">Ссфлка url</label> 
        <input class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" type="text" value="<?php echo esc_attr( $title4 ); ?>" />
    </p>
    


<?php 
}
	
    // Updating widget replacing old instances with new
    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['title2'] = ( ! empty( $new_instance['title2'] ) ) ? strip_tags( $new_instance['title2'] ) : '';
        $instance['title3'] = ( ! empty( $new_instance['title3'] ) ) ? strip_tags( $new_instance['title3'] ) : '';
        $instance['title4'] = ( ! empty( $new_instance['title4'] ) ) ? strip_tags( $new_instance['title4'] ) : '';
        return $instance;
    }
} // Class wpb_widget ends here    
    
    

// Register and load the widget
function wpb_load_widget() {
	register_widget( 'wpb_widget' );
}
add_action( 'widgets_init', 'wpb_load_widget' );




function wp_corenavi() {
global $wp_query, $wp_rewrite;
  $pages = '';
  $max = $wp_query->max_num_pages;
  if (!$current = get_query_var('paged')) $current = 1;
  $a['base'] = str_replace(999999999, '%#%', get_pagenum_link(999999999));
  $a['total'] = $max;
  $a['current'] = $current;

  $total = 1; //1 - выводить текст "Страница N из N", 0 - не выводить
  $a['mid_size'] = 3; //сколько ссылок показывать слева и справа от текущей
  $a['end_size'] = 1; //сколько ссылок показывать в начале и в конце
  $a['prev_text'] = '&laquo;'; //текст ссылки "Предыдущая страница"
  $a['next_text'] = '&raquo;'; //текст ссылки "Следующая страница"
 
  if ($max > 1) echo '<div class="page_all">';
  if ($total == 1 && $max > 1) $pages = '<div class="page_name">Страницы:</div>'."\r\n";
  echo $pages . paginate_links($a);
  if ($max > 1) echo '</div>';
  }


function my_home_category( $query ) {
    if ( $query->is_home() && $query->is_main_query() ) {
        $query->set( 'post_type', 'igrovue-avtomatu' );
    }
}
add_action( 'pre_get_posts', 'my_home_category' );
    
/**
 * Render the site title for the selective refresh partial.
 *
 * @since Casino Theme 2.0
 * @see casinotheme_customize_register()
 *
 * @return void
 */
function casinotheme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Casino Theme 2.0
 * @see casinotheme_customize_register()
 *
 * @return void
 */
function casinotheme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Enqueue Javascript postMessage handlers for the Customizer.
 *
 * Binds JS handlers to make the Customizer preview reload changes asynchronously.
 *
 * @since Casino Theme 1.0
 */
function casinotheme_customize_preview_js() {
	wp_enqueue_script( 'casinotheme-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20141120', true );
}
add_action( 'customize_preview_init', 'casinotheme_customize_preview_js' );





function create_meta_desc() {
    if($_SERVER['REQUEST_URI'] == '/igrovue-avtomatu/' || $_SERVER['REQUEST_URI'] == '/stati/'){
        $url = substr($_SERVER['REQUEST_URI'], 1, -1);
        $obj = get_post_type_object( $url );
        $title_desc = explode("#", $obj->description);
        if(strlen($title_desc['0']) > 1){
            echo "<title>".$title_desc['0']."</title>";
            remove_theme_support( 'title-tag' );
        }
        if(strlen($title_desc['1']) > 1){
        echo "<meta name='description' content='".$title_desc['1']."' />";
        }
        
    }
}

add_action('wp_head', 'create_meta_desc', 0);
