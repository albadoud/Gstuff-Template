<?php
    // Configure Theme
    add_theme_support( 'post-thumbnails' );                         // Add Featured Images
    add_theme_support( 'title-tag' );                               // Add Document Title
    add_theme_support( 'automatic-feed-links' );

    // Generate other image sizes
    add_image_size( 'news-thumbnail', 80, 80, true );
    add_image_size( 'yarpp-thumbnail', 120, 120, true );            // For plugin YARPP
    add_image_size( 'category-thumbnail', 200, 200, true );
    add_image_size( 'category-thumbnail-1', 570, 290, true );
    add_image_size( 'category-thumbnail-2', 178, 178, true );

    // Filter

    // Register Sidebars
    function gamerstuff_sidebar() {

        $args = array(
            'id'            => 'main-sidebar',
            'class'         => 'main-sidebar',
            'name'          => 'Main Sidebar',
            'description'   => 'Main sidebar for categories, tags etc...',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'post-sidebar',
            'class'         => 'post-sidebar',
            'name'          => 'Posts Sidebar',
            'description'   => 'For clasic posts',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'cat-left-sidebar',
            'class'         => 'cat-left-sidebar',
            'name'          => 'Cat Left Sidebar',
            'description'   => 'Category Left Sidebar',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'footer-1',
            'class'         => 'footer-1',
            'name'          => 'Footer 1',
            'description'   => 'Footer Block 1',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'footer-2',
            'class'         => 'footer-2',
            'name'          => 'Footer 2',
            'description'   => 'Footer Block 2',
        );
        register_sidebar( $args );

        $args = array(
            'id'            => 'footer-3',
            'class'         => 'footer-3',
            'name'          => 'Footer 3',
            'description'   => 'Footer Block 3',
        );
        register_sidebar( $args );

    }
    add_action( 'widgets_init', 'gamerstuff_sidebar' );


    // Navigaion menu
    register_nav_menus(array(
        'nav-header' => 'Navigation (header)'
    ));


    // Wordpress Customize
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
    remove_action('wp_head', 'wp_dlmp_l10n_style' );
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');


    // Pagination
    if ( !function_exists( 'wpex_pagination' ) ) {
        
        function wpex_pagination() {
            
            $prev_arrow = '<i class="fa fa-caret-left" aria-hidden="true"></i>';
            $next_arrow = '<i class="fa fa-caret-right" aria-hidden="true"></i>';
            
            global $wp_query;
            $total = $wp_query->max_num_pages;
            $big = 999999999; // need an unlikely integer
            if( $total > 1 )  {
                 if( !$current_page = get_query_var('paged') )
                     $current_page = 1;
                 if( get_option('permalink_structure') ) {
                     $format = 'page/%#%/';
                 } else {
                     $format = '&paged=%#%';
                 }
                echo paginate_links(array(
                    'base'          => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format'        => $format,
                    'current'       => max( 1, get_query_var('paged') ),
                    'total'         => $total,
                    'mid_size'      => 3,
                    'type'          => 'list',
                    'prev_text'     => $prev_arrow,
                    'next_text'     => $next_arrow,
                 ) );
            }
        }
    }

    // Template for comments and pingbacks
    if ( ! function_exists( 'gamerstuff_comment' ) ) :

        function gamerstuff_comment( $comment, $args, $depth ) {
            $GLOBALS['comment'] = $comment;
            switch ( $comment->comment_type ) :
                case 'pingback' :
                case 'trackback' :
            ?>
                <li class="post pingback">
                    <p><?php _e( 'Pingback:', 'gamerstuff' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Modifier)', 'gamerstuff' ), ' ' ); ?></p>
            <?php
                    break;
                default :
            ?>
            <li>
                <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
                    <p class="comment-author vcard">
                        <?php echo get_avatar( $comment, 80 ); ?>
                        <?php printf( __( '%s <span class="says">à écrit :</span>', 'gamerstuff' ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
                    </p>
                    <?php if ( $comment->comment_approved == '0' ) : ?>
                        <em><?php _e( 'Votre commentaire est en attente de modération.', 'gamerstuff' ); ?></em>
                        <br />
                    <?php endif; ?>
     
                    <p class="comment-meta commentmetadata">
                        <time pubdate datetime="<?php comment_time( 'c' ); ?>"><?php printf( __( '%1$s at %2$s', 'gamerstuff' ), get_comment_date(), get_comment_time() ); ?></time>
                        <?php edit_comment_link( __( '(Modifier)', 'gamerstuff' ), ' ' ); ?>
                    </p>

                    <div class="comment-content"><?php comment_text(); ?></div>

                    <p class="reply">
                        <i class="fa fa-reply" aria-hidden="true"></i> <?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
                    </p>
                </div>
            <?php
                    break;
            endswitch;
        }
        endif;
?>
