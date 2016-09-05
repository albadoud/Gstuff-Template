<?php
    /**
     * @package WordPress
     * @subpackage gamerstuff
    **/

    get_header();

    while ( have_posts() ) : the_post();

    $classes = array(
        'container',
        'content',
    );
?>
    <article id="post-<?php the_ID(); ?>" <?php post_class($classes); ?>>
        <h1><?php the_title(); ?></h1>
        <ul class="article-info">
            <li><i class="fa fa-calendar"></i> <?php the_time('j F Y') ?></li>
            <li><i class="fa fa-user"></i> <a href=""><?php the_author() ?></a></li>
            <li><i class="fa fa-sitemap"></i> <?php the_category(', ') ?></li>
            <li><i class="fa fa-comments"></i><?php comments_popup_link('Pas de commentaires', '1 Commentaire', '% Commentaires'); ?></li>
            <?php edit_post_link( 'Editer', '<li><i class="fa fa-pencil-square-o" aria-hidden="true"></i>', '</li>'); ?>
        </ul>
        <div class="grid-3-1">
            <div>
                <?php the_post_thumbnail(); ?>

                <section class="post-content">
                    <?php the_content(); ?>
                </section>

                <p><?php the_tags(); ?></p>

                <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if ( comments_open() || get_comments_number() ) :
                        comments_template();
                    endif;
                ?>
            </div>
            <aside id="sidebar">
                <?php if ( is_active_sidebar( 'post-sidebar' ) ) : ?>
                    <ul>
                        <?php dynamic_sidebar('post-sidebar'); ?>
                    </ul>
                <?php endif; ?>
            </aside>
        </div>
    </article>
<?php
    endwhile;

    get_footer();
?>
