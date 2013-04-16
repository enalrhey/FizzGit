<?php 
/*--------------------------------------
    Sidebars, Footer Widget Areas
----------------------------------------*/

function no_wpautop($content) 
{ 
        $content = do_shortcode( shortcode_unautop($content) ); 
        $content = preg_replace( '#^<\/p>|^<br \/>|<p>$#', '', $content );
        return $content;
}

    register_sidebar(
    array(
        'name' => 'Blog Sidebar',
        'before_widget' => '<div class="widget clearfix %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<header><h5>',
        'after_title' => '</h5></header>',
    ));

    register_sidebar(
    array(
        'id'   => 'footer-section-1',
        'name' => 'Footer Section 1',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="footer_section"><h4 class="footer_title">',
        'after_title' => '</h4></div>',
    ));

    register_sidebar(
    array(
        'id'   => 'footer-section-2',
        'name' => 'Footer Section 2',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="footer_section"><h4 class="footer_title">',
        'after_title' => '</h4></div>',
    ));

    register_sidebar(
    array(
        'id'   => 'footer-section-3',
        'name' => 'Footer Section 3',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="footer_section"><h4 class="footer_title">',
        'after_title' => '</h4></div>',
    ));

    register_sidebar(
    array(
        'id'   => 'footer-section-4',
        'name' => 'Footer Section 4',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<div class="footer_section"><h4 class="footer_title">',
        'after_title' => '</h4></div>',
    ));

/*--------------------------------------
    Define constants
----------------------------------------*/

define( 'PARENT_DIR', get_template_directory() );
define( 'CHILD_DIR', get_stylesheet_directory() );
define( 'PARENT_URL', get_template_directory_uri() );
define( 'CHILD_URL', get_stylesheet_directory_uri() );

define( 'METROFY_WIDGETS', get_template_directory() . '/widgets/' );
define('METROFY_FUNCTIONS', get_template_directory() . '/functions/');

/*----------------------------------------
//Load widgets - Tabbed 'Recent' vs 'Popular'
----------------------------------------*/
require_once (METROFY_WIDGETS . 'metrofy-tabbed.php');

//Register Widgets
add_action( 'widgets_init', 'metrofy_load_widgets' );
function metrofy_load_widgets() {
    register_widget( 'Metrofy_Tabbed' );
}

//Load SMOF
require_once (PARENT_DIR . '/admin/' .'index.php');
//if (is_admin()){
  //  require_once(METROFY_FUNCTIONS . '/zilla-shortcodes/zilla-shortcodes.php');    
//}
//Load Page Builder
require_once(get_template_directory() . '/admin/aqua-page-builder/aq-page-builder.php');

/*----------------------------------------
    Register main menu
----------------------------------------*/
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}

function register_menus() {
  register_nav_menus(
    array( 'main-menu' => __( 'Main Menu', 'tmg-framework' ) )
  );
}
add_action( 'init', 'register_menus' );

function metrofy_nav_fallback() {
    wp_page_menu( 'show_home=0&include=999' );
}


//load Short Codes
require_once (PARENT_DIR . '/shortcodes.php');

//Define ContentWidth
if ( ! isset( $content_width ) )
    $content_width = 960;
 
function mytheme_adjust_content_width() {
    global $content_width;
 
    if ( is_page_template( 'single.php' ) )
        $content_width = 635;
}
add_action( 'template_redirect', 'mytheme_adjust_content_width' );


/*----------------------------------------
//Register core styles and scripts and load fonts
----------------------------------------*/
$root = get_template_directory_uri();

function theme_scripts_method() {
    global $root, $post, $var_prefix; 

    //Enqueue 'Lato' and 'Open Sans' fonts
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'tmg_lato', "$protocol://fonts.googleapis.com/css?family=Lato:300,400,700,900,300italic,400italic,700italic' rel='stylesheet' type='text/css" );
    wp_enqueue_style( 'tmg_opensans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700,600' rel='stylesheet' type='text/css" );

    //Theme Stylesheets
    wp_enqueue_style("base_css", $root."/stylesheets/base.css");
    wp_enqueue_style("skeleton_css", $root."/stylesheets/skeleton.css", array('base_css'));
    wp_enqueue_style("layout_css", $root."/stylesheets/layout.css", array('base_css', 'skeleton_css'));
    wp_enqueue_style("glyphicons_css", $root."/stylesheets/bootstrap.glyph.css");

    //default options
    $skin = "light";
    $color = "blue";
    //get user configured values
    $tmg_data = get_option(OPTIONS);
    $skin = $tmg_data['skin'];
    $color = $tmg_data['themeColor'];
    //load color and skin styles
    wp_enqueue_style("skin", $root."/stylesheets/themes/".$skin.".css", array('layout_css'));
    wp_enqueue_style("colorscheme", $root."/stylesheets/themes/".$color.".css", array('skin'));

    //Modernizer - load after jQuery 
    wp_register_script('modernizr', $root."/javascripts/modernizr-2.5.3.min.js", array('jquery'));   

    //Isotope
    if(is_home() || is_front_page() || is_page_template('portfolio-template.php'))
    {
        wp_register_script("isotope", $root."/javascripts/jquery.isotope.js", array('jquery'), false, true);    
        wp_enqueue_script('isotope'); 
    }
    
    //Flex Slider
    wp_enqueue_style("flexslider_css", $root."/stylesheets/flexslider.css");
	wp_register_script('flexslider', $root."/javascripts/jquery.flexslider-min.js", array('jquery'), false, true);    

    //PrettyPhoto
    wp_enqueue_style("prettyPhoto_css", $root."/stylesheets/prettyPhoto.css");
    wp_register_script("prettyPhoto", $root."/javascripts/jquery.prettyPhoto.js", array('jquery'), false, true);
    
    //Superfish and Supersubs
    wp_enqueue_style("superfish_css", $root."/stylesheets/superfish.css");
    wp_register_script("hoverIntent", $root."/javascripts/jquery.hoverIntent.minified.js", array('jquery'), false, true);
    wp_register_script("superfish", $root."/javascripts/superfish.js", array('jquery'), false, true);
    wp_register_script("supersubs", $root."/javascripts/supersubs.js", array('jquery', 'superfish'), false, true);        

    //jQuery Easing
    wp_register_script("jqueryeasing", $root."/javascripts/jquery.easing.js", array('jquery'), false, true);   

    //Portfolio Hover
    wp_register_script("portfoliohover", $root."/javascripts/portfoliohover.js", array('jquery', 'jqueryeasing'), false, true);   

    //validate
    wp_register_script("validate", $root."/javascripts/jquery.validate.min.js", array('jquery'), false, true);    

    //Custom scripts    
    wp_register_script("custom", 
        $root."/javascripts/custom.js", 
        array('jquery', 'prettyPhoto', 'supersubs', 'superfish', 'flexslider',/* 'address',*/ 'portfoliohover', 'modernizr'), 
        false, 
        true);

    wp_enqueue_script('modernizr');     
    wp_enqueue_script('flexslider'); 
    wp_enqueue_script('prettyPhoto'); 
    wp_enqueue_script('jqueryeasing'); 
    wp_enqueue_script('hoverIntent'); 
    wp_enqueue_script('superfish'); 
    wp_enqueue_script('supersubs');    
    wp_enqueue_script('portfoliohover');
    wp_enqueue_script('validate'); 
    wp_enqueue_script('custom');    

    if ( is_singular() ) wp_enqueue_script( "comment-reply" );    	
}    
 
add_action('wp_enqueue_scripts', 'theme_scripts_method');

/*-------------------------------------------------------------------------
//Custom Post Types for Portfolio Items
//This code tells WordPress when to run our setup function
---------------------------------------------------------------------------*/
// Register Portfolio post type

add_action('init', 'portfolio_register');

function portfolio_register() {
    
    $labels = array(
        'name'          => _x('Portfolio Items', 'post type general name', 'tmg-framework' ),
        'singular_name' => _x('Portfolio Item', 'post type singular name', 'tmg-framework' ),
        'add_new'       => _x('Add New', 'portfolio item', 'tmg-framework' ),
        'add_new_item'  => __('Add New Portfolio Item', 'tmg-framework' ),
        'edit_item'     => __('Edit Portfolio Item', 'tmg-framework' ),
        'new_item'      => __('New Portfolio Item', 'tmg-framework' ),
        'view_item'     => __('View Portfolio Item', 'tmg-framework' ),
        'search_items'  => __('Search Portfolio', 'tmg-framework' ),
        'not_found'     =>  __('Nothing found', 'tmg-framework' ),
        'not_found_in_trash'    => __('Nothing found in Trash', 'tmg-framework' ),
        'parent_item_colon'     => ''
    );
    
        $args = array(
        'labels' => $labels,
        'public' => true,
        'publicly_queryable' => true,
        'show_ui' => true,
        'query_var' => true,
        'rewrite' => true,
        'capability_type' => 'post',
        'hierarchical' => false,
        'menu_position' => null,
        'supports' => array('title','editor','thumbnail'), 
        'taxonomies' => array('post_tag') 
    );

    register_post_type( 'portfolio' , $args );
}

add_action( 'init', 'create_portfolio_taxonomies', 0 );

function create_portfolio_taxonomies() {
    register_taxonomy( 'portfolio_types', 'portfolio', 
        array( 
            'hierarchical' => true, 
            'label' => 'Item Categories', 
            'query_var' => true, 
            'rewrite' => array( 'slug' => 'portfolio_types' ) ) );
    register_taxonomy( 'skills', 'portfolio', 
        array( 
            'hierarchical' => true, 
            'label' => 'Skills', 
            'query_var' => true, 
            'rewrite' => true ) );
    register_taxonomy_for_object_type('post_tag', 'portfolio');

    /*Initiate Metabox creation*/
    //Get all taxonomies for showing in portfolio page metabox
    global $all_portfolio_terms;
    global $terms;
    $args = array( 'taxonomy' => 'portfolio_types');
    $terms = get_terms('portfolio_types', $args);//get_terms( 'category', 'orderby=count&hide_empty=0' );//get_terms($args);
    $count = count($terms);
    $all_portfolio_terms[9999] = "All";
    if ( $count > 0 )
    {        
        foreach ( $terms as $term ) 
        {
            $all_portfolio_terms[$term->term_id] = $term->name;    
        }
    } 

    //Get all blog categories
    global $all_blog_terms;
    $blog_terms = get_terms('category', 'orderby=count&hide_empty=0');
    $count = count($blog_terms);
    $all_blog_terms[9999] = "All";
    if ( $count > 0 )
    {        
        foreach ( $blog_terms as $term ) 
        {
            $all_blog_terms[$term->term_id] = $term->name;    
        }
    } 

    // Include the meta box script
    //require_once RWMB_DIR . 'meta-box.php';
    // Include the meta box definition 
    include ("functions/tmg_meta.php");
    /*end - metabox creation*/
}

// add post-formats to post_type 'portfolio'
add_post_type_support( 'portfolio', 'post-formats' );

//Post thumbnails
if ( function_exists( 'add_theme_support' ) ) {
    add_theme_support('post-thumbnails'); 
    set_post_thumbnail_size( 660, 266 );
}

//Feed Links
add_theme_support( 'automatic-feed-links' );


//Post formats
$formats = array( 
            'gallery', 
            'quote', 
            'video');

add_theme_support( 'post-formats', $formats ); 

// Enable Shortcodes in excerpts and widgets
add_filter('widget_text', 'do_shortcode');
add_filter( 'the_excerpt', 'do_shortcode');
add_filter('get_the_excerpt', 'do_shortcode');

/**
 * Slug
 *
 */

function the_slug($postID="") {
    
    global $post;
    $postID = ( $postID != "" ) ? $postID : $post->ID;
    $post_data = get_post($postID, ARRAY_A);
    $slug = $post_data['post_name'];
    return $slug;
}

/*--------------------------------------------------------------------------*/
//      Custom background styles for home page sections
/*--------------------------------------------------------------------------*/

/**
* Custom background style for sections
* @param int $postid the post Id
* @return string $content
*/

if(!function_exists('tmg_get_custom_styles'))
{
    function tmg_get_custom_styles($content){
        $section_posts = get_posts( array(
            'numberposts' => -1,
            'post_type' => 'page')
        );

        $content .= '/*Custom Styles - Auto Generated*/';

        if( empty($section_posts) ) return $content;
                   
        $output = '/* Custom section styles */';

        foreach( $section_posts as $post ) {

            $postid = $post->ID;

            $useCustomStyles = get_post_meta( $postid, 'tmg_section_use_custom', true );
            if($useCustomStyles == "no") continue;
            $slug = the_slug($postid);
            $output .= "\n#".$slug." {\n";

            $bg_url = get_post_meta($postid, 'tmg_section_background_url', true);
            $bgImageSrc = wp_get_attachment_image_src( $bg_url, 'full');
            $bg_img_url = $bgImageSrc[0];
            if( !empty($bg_url) ) {
                $bg_repeat = get_post_meta($postid, 'tmg_section_background_repeat', true);
                //$bg_position = get_post_meta($postid, 'tmg_background_position', true);

                $output .= "\tbackground-image: url($bg_img_url);\n";
                $output .= "\tbackground-repeat: $bg_repeat;\n";
                //$output .= "\tbackground-position: top $bg_position;\n";
            }

            $bg_color = get_post_meta($postid, 'tmg_section_background_color', true);
            if( !empty($bg_color) && $bg_color != '#' ) {
                $output .= "\tbackground-color: $bg_color;\n";
            } else {
                $output .= "\tbackground-color: transparent;\n";
            }            

            $output .= "}\n";
        }

        $content .= $output . "\n";
        return $content;
        
    }    
}
add_action( 'tmg_custom_styles', 'tmg_get_custom_styles', 10);

/*----------------------------------------
    Read more link for excerpts
----------------------------------------*/
function new_excerpt_more($more) {
       global $post;
    return ' <div class="readmore"><a href="'. get_permalink($post->ID) . '" class="button thin">Read more <i class="icon-chevron-right icon-white"></i></a></div>';
}
add_filter('excerpt_more', 'new_excerpt_more');

/*----------------------------------------
    Read more link for full content
----------------------------------------*/
function tmg_more_link( $more_link, $more_link_text ) {
    global $post;
    return ' <div class="readmore"><a href="'. get_permalink($post->ID) . '" class="button thin">Read more <i class="icon-chevron-right icon-white"></i></a></div>';
}

add_filter( 'the_content_more_link', 'tmg_more_link', 10, 2 );

/*----------------------------------------
    Comments & Comment Styles
----------------------------------------*/

if ( !function_exists( 'tmg_comments' ) ) :
function tmg_comments($comment, $args, $depth) {
$GLOBALS['comment'] = $comment; ?>
    <li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
            <?php echo get_avatar($comment,$size='40' ); ?>
            <div class="message"> <!--comment-meta commentmetadata-->

                <?php if ($comment->comment_approved == '0') : ?>
                    <em><?php _e('Comment is awaiting moderation', 'tmg-framework' );?></em> <br />
                <?php endif; ?>
                <div class="comment-meta">
                    <span class="author-name"><?php echo get_comment_author_link(); ?></span>
                    <span class="comment-date"><?php echo get_comment_date(); ?></span> 
                    <?php edit_comment_link(__('Edit comment', 'tmg-framework' ),'  ',''); ?> 
                </div>
                <div class="comment-reply">
                    <?php comment_reply_link(array_merge( $args, array('reply_text' => __('Reply', 'tmg-framework' ),'depth' => $depth, 'max_depth' => $args['max_depth']))); ?>
                </div>
                <?php comment_text() ?>

            </div>
    </li>
<?php  }
endif;

/*----------------------------------------
Posted_On - Post Meta Information
----------------------------------------*/

if ( ! function_exists( 'skeleton_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Skeleton 1.0
 */
function skeleton_posted_on() {
    global $tmg_data;
    $icon_class = "icon-black";
    if(strtolower($tmg_data['skin']) == "dark")
        $icon_class = " icon-white";

    printf( __( '<i class="icon-calendar %1$s"></i> %2$s <span class="meta-sep"> | </span> <i class="icon-user %1$s"></i> %3$s','tmg-framework' ),
        $icon_class,
        sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
            get_permalink(),
            esc_attr( get_the_time() ),
            get_the_date()
        ),
        sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
            get_author_posts_url( get_the_author_meta( 'ID' ) ),
            sprintf( esc_attr__( 'View all posts by %s', 'tmg-framework' ), get_the_author() ),
            get_the_author()
        )
    );
}

endif;

/*----------------------------------------
Posted_In - Post Meta Information
----------------------------------------*/

if ( ! function_exists( 'skeleton_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Skeleton 1.0
 */
function skeleton_posted_in() {
    
    // Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list( '', ', ' );
    if ( $tag_list ) {
        $posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tmg-framework' );
    } elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
        $posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tmg-framework' );
    } else {
        $posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'tmg-framework' );
    }
    // Prints the string, replacing the placeholders.
    printf(
        $posted_in,
        get_the_category_list( ', ' ),
        $tag_list,
        get_permalink(),
        the_title_attribute( 'echo=0' )
    );
}

endif;

/*----------------------------------------
Custom Breadcrumbs function
----------------------------------------*/
function dimox_breadcrumbs() {

    /* === OPTIONS === */
    $text['home']     = 'Home'; // text for the 'Home' link
    $text['category'] = 'Archive by Category "%s"'; // text for a category page
    $text['search']   = 'Search Results for "%s" Query'; // text for a search results page
    $text['tag']      = 'Posts Tagged "%s"'; // text for a tag page
    $text['author']   = 'Articles Posted by %s'; // text for an author page
    $text['404']      = 'Error 404'; // text for the 404 page

    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $showOnHome  = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter   = ' &raquo; '; // delimiter between crumbs
    $before      = '<span class="current">'; // tag before the current crumb
    $after       = '</span>'; // tag after the current crumb
    /* === END OF OPTIONS === */

    global $post;
    $homeLink = home_url('/');
    $linkBefore = '<span typeof="v:Breadcrumb">';
    $linkAfter = '</span>';
    $linkAttr = ' rel="v:url" property="v:title"';
    $link = $linkBefore . '<a' . $linkAttr . ' href="%1$s">%2$s</a>' . $linkAfter;

    if (is_home() || is_front_page()) {

        if ($showOnHome == 1) echo '<div id="crumbs"><a href="' . $homeLink . '">' . $text['home'] . '</a></div>';

    } else {

        echo '<div id="crumbs" xmlns:v="http://rdf.data-vocabulary.org/#">' . sprintf($link, $homeLink, $text['home']) . $delimiter;

        if ( is_category() ) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                $cats = get_category_parents($thisCat->parent, TRUE, $delimiter);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
            }
            echo $before . sprintf($text['category'], single_cat_title('', false)) . $after;

        } elseif ( is_search() ) {
            echo $before . sprintf($text['search'], get_search_query()) . $after;

        } elseif ( is_day() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo sprintf($link, get_month_link(get_the_time('Y'),get_the_time('m')), get_the_time('F')) . $delimiter;
            echo $before . get_the_time('d') . $after;

        } elseif ( is_month() ) {
            echo sprintf($link, get_year_link(get_the_time('Y')), get_the_time('Y')) . $delimiter;
            echo $before . get_the_time('F') . $after;

        } elseif ( is_year() ) {
            echo $before . get_the_time('Y') . $after;

        } elseif ( is_single() && !is_attachment() ) {
            if ( get_post_type() != 'post' ) {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                printf($link, $homeLink . '/' . $slug['slug'] . '/', $post_type->labels->singular_name);
                if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;
            } else {
                $cat = get_the_category(); $cat = $cat[0];
                $cats = get_category_parents($cat, TRUE, $delimiter);
                if ($showCurrent == 0) $cats = preg_replace("#^(.+)$delimiter$#", "$1", $cats);
                $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
                $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
                echo $cats;
                if ($showCurrent == 1) echo $before . get_the_title() . $after;
            }

        } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;

        } elseif ( is_attachment() ) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID); $cat = $cat[0];
            $cats = get_category_parents($cat, TRUE, $delimiter);
            $cats = str_replace('<a', $linkBefore . '<a' . $linkAttr, $cats);
            $cats = str_replace('</a>', '</a>' . $linkAfter, $cats);
            echo $cats;
            printf($link, get_permalink($parent), $parent->post_title);
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
            if ($showCurrent == 1) echo $before . get_the_title() . $after;

        } elseif ( is_page() && $post->post_parent ) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = sprintf($link, get_permalink($page->ID), get_the_title($page->ID));
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) echo $delimiter;
            }
            if ($showCurrent == 1) echo $delimiter . $before . get_the_title() . $after;

        } elseif ( is_tag() ) {
            echo $before . sprintf($text['tag'], single_tag_title('', false)) . $after;

        } elseif ( is_author() ) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . sprintf($text['author'], $userdata->display_name) . $after;

        } elseif ( is_404() ) {
            echo $before . $text['404'] . $after;
        }

        if ( get_query_var('paged') ) {
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
            echo __('Page', 'tmg-framework' ) . ' ' . get_query_var('paged');
            if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        echo '</div>';

    }
} // end dimox_breadcrumbs()

/*----------------------------------------
    Custom Pagination Function
----------------------------------------*/
function pagination($pages = '', $range = 4)
{  
     $showitems = ($range * 2)+1;  
 
     global $paged;
     if(empty($paged)) $paged = 1;
 
     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   
 
     if(1 != $pages)
     {
         echo "<div class=\"pagination\"><span>Page ".$paged." of ".$pages."</span>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&laquo; First</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lsaquo; Previous</a>";
 
         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                 echo ($paged == $i)? "<span class=\"current\">".$i."</span>":"<a href='".get_pagenum_link($i)."' class=\"inactive\">".$i."</a>";
             }
         }
 
         if ($paged < $pages && $showitems < $pages) echo "<a href=\"".get_pagenum_link($paged + 1)."\">Next &rsaquo;</a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($pages)."'>Last &raquo;</a>";
         echo "</div>\n";
     }
}

/*------------------------------------------------------------------------*/
/* Localization
/*------------------------------------------------------------------------*/

function theme_localization(){
    $lang_dir = get_template_directory() . '/lang';

    load_theme_textdomain( 'tmg-framework', $lang_dir);
}
add_action( 'after_theme_setup', 'theme_localization' );

/*------------------------------------------------------------------------*/
/* hack for the_category rel="category tag" that breaks w3c validation
/*------------------------------------------------------------------------*/
add_filter( 'the_category', 'replace_cat_tag' );
 
function replace_cat_tag ( $text ) {
    $text = str_replace('rel="category tag"', "", $text); 
    return $text;
}

/*------------------------------------------------------------------------*/
/* Menu Walker to update in-page links in menu when show in inner pages
/*------------------------------------------------------------------------*/
class custom_menu_walker extends Walker_Nav_Menu
{
    /**
     * @see Walker::start_el()
     * @since 3.0.0
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param object $item Menu item data object.
     * @param int $depth Depth of menu item. Used for padding.
     * @param int $current_page Menu item ID.
     * @param object $args
     */
    function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

        $class_names = $value = '';

        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
        $class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

        $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
        $id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

        $output .= $indent . '<li' . $id . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        
        //We will only update the href values for in-page links to correctly point to home page sections
        if($item->url[0] == '#')
            $item->url = get_option("siteurl").'/'.$item->url;
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'>';
        $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }

}

/*------------------------------------------------------------------------*/
/* Include admin init
/*------------------------------------------------------------------------*/
$tempdir = get_template_directory();
require_once($tempdir .'/admin/init.php');

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * Here, we register the recommended plugins for the theme - Metabox included with the TGMPA library
 * and one from the .org repo.
 */
    function my_theme_register_required_plugins() 
    {

        /**
         * Array of plugin arrays. Required keys are name and slug.
         * If the source is NOT from the .org repo, then source is also required.
         */
        $plugins = array(

            // Include MetaBox plugin for Post/Page/Portfolio meta info
            array(
                 'name'      => 'Meta Box',
                 'slug'      => 'meta-box',
                 'required'  => true,
                 'force_activation'      => true,
                 'force_deactivation'    => true,
            ),

            // Include Customized Brankic Social Media Widget
            array(
                'name'                  => 'Brankic Social Media Widget', // The plugin name
                'slug'                  => 'brankic-social-media-widget', // The plugin slug (typically the folder name)
                'source'                => get_stylesheet_directory_uri() . '/plugins/brankic-social-media-widget.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),

            // Include Customized Zilla Shortcodes Plugin
            array(
                'name'                  => 'Zilla Shortcodes', // The plugin name
                'slug'                  => 'zilla-shortcodes', // The plugin slug (typically the folder name)
                'source'                => get_stylesheet_directory_uri() . '/plugins/zilla-shortcodes.zip', // The plugin source
                'required'              => true, // If false, the plugin is only 'recommended' instead of required
                'version'               => '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
                'force_activation'      => false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
                'force_deactivation'    => false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
                'external_url'          => '', // If set, overrides default API URL and points to an external URL
            ),

            // Include Contact Form 7 from WordPress.org            
            array(
                 'name'      => 'Contact-Form-7',
                 'slug'      => 'contact-form-7',
                 'required'  => true,
            ),
             
            // Include Twitter Widget Pro from WordPress.org            
            array(
                 'name'      => 'Twitter Widget Pro',
                 'slug'      => 'twitter-widget-pro',
                 'required'  => false,
            ),
        );

        // Change this to your theme text domain, used for internationalising strings
        $theme_text_domain = 'tmg-framework';

        /**
         * Array of configuration settings. Amend each line as needed.
         * If you want the default strings to be available under your own theme domain,
         * leave the strings uncommented.
         * Some of the strings are added into a sprintf, so see the comments at the
         * end of each line for what each argument will be.
         */
        $config = array(
            'domain'            => $theme_text_domain,          // Text domain - likely want to be the same as your theme.
            'default_path'      => '',                          // Default absolute path to pre-packaged plugins
            'parent_menu_slug'  => 'themes.php',                // Default parent menu slug
            'parent_url_slug'   => 'themes.php',                // Default parent URL slug
            'menu'              => 'install-required-plugins',  // Menu slug
            'has_notices'       => true,                        // Show admin notices or not
            'is_automatic'      => false,                       // Automatically activate plugins after installation or not
            'message'           => '',                          // Message to output right before the plugins table
            'strings'           => array(
                'page_title'                                => __( 'Install Required Plugins', $theme_text_domain ),
                'menu_title'                                => __( 'Install Plugins', $theme_text_domain ),
                'installing'                                => __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
                'oops'                                      => __( 'Something went wrong with the plugin API.', $theme_text_domain ),
                'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
                'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
                'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
                'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
                'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
                'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
                'return'                                    => __( 'Return to Required Plugins Installer', $theme_text_domain ),
                'plugin_activated'                          => __( 'Plugin activated successfully.', $theme_text_domain ),
                'complete'                                  => __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
                'nag_type'                                  => 'updated' // Determines admin notice type - can only be 'updated' or 'error'
            )
        );

        tgmpa( $plugins, $config );

    }
?>