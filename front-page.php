<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/
?>

<?php get_header(); ?>

        <div class="container">
        	<h1>Voici la page d'accueil du site</h1>
            <?php if(have_posts()) : ?>
                <?php while(have_posts()) : the_post(); ?>
                    <h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>

<?php get_footer(); ?>
