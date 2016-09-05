<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/
?>

<?php get_header(); ?>

        <div class="container">
            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <article class="other-post">
                        <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('news-thumbnail', array('class' => 'thumbnail'));
                                } else { ?>
                                    <img class="thumbnail" src="<?php echo(get_template_directory_uri()); ?>/img/thumbnail-default-808x80.png" height="80" width="80" alt="" />
                            <?php } ?>
                            <h3><?php the_title(); ?></h3>
                        </a>
                    </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

<?php get_footer(); ?>
