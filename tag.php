<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/
?>

<?php get_header(); ?>

<div class="container content">
    <h1><?php single_tag_title(); ?></h1>
    <div><?php echo tag_description(); ?></div> 

    <?php if (have_posts()) : ?>
        <ul class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <li>
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="thumbnail">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('category-thumbnail');
                                }
                            ?>
                        </div>
                        <p class="post-title"><?php the_title(); ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>Désolé aucun article n'est disponibles sur cette page. C'est à se demander pourquoi nous avons créé cette catégorie !!!</p>
    <?php endif; ?>

    <div class="fr">
        <?php wpex_pagination(); ?>
    </div>
</div>

<?php get_footer(); ?>