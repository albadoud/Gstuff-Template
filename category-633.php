<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/

    // Create Reviews Query Posts, get only post with meta_key taq_review_score from plugin Taqyeem
    $argsReview = array(
        'post_type'         => 'post',
        'cat'               =>  get_query_var('cat'),
        'meta_key'          => 'taq_review_score',
        'showposts'         => 6,
    );

    $argsNews = array(
        'post_type'         => 'post',
        'category__in'      =>  get_query_var('cat'),
        //'cat'               =>  get_query_var('cat'),
        'showposts'         => 6,
    );

    $review_query   = new WP_Query($argsReview);
    $news_query     = new WP_Query($argsNews);
    $guide_query    = new WP_Query( array( 'cat' => 654 ) );
    $tuto_query     = new WP_Query( array( 'cat' => 655 ) );

    $reviewCount = 0;
?>

<?php get_header(); ?>

<div class="container content category">
    <h1><?php single_cat_title(); ?> : <?php echo category_description(); ?></h1>

    <div class="grid-3-1">
        <section class="bloc-type-1">
            <h2>Nos Derniers Tests</h2>
            <?php if ($review_query->have_posts()) : ?>
                <?php while ($review_query->have_posts()) : $review_query->the_post(); $reviewCount++; ?>
                    <?php if ($reviewCount == 1 ) : ?>
                        <article class="first-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('category-thumbnail-1', array('class' => 'thumbnail'));
                                    } else { ?>
                                        <img clas="thumbnail" src="<?php echo(get_template_directory_uri()); ?>/img/thumbnail-default-570x290.png" height="570" width="290" alt="" />
                                <?php } ?>
                            </a>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p>
                                <?php the_Excerpt(); ?>
                            </p>
                        </article>
                        <div class="grid-5">
                    <?php else : ?>
                        <article class="other-post">
                            <a href="<?php the_permalink(); ?>">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('category-thumbnail-2', array('class' => 'thumbnail'));
                                    } else { ?>
                                        <img class="thumbnail" src="<?php echo(get_template_directory_uri()); ?>/img/thumbnail-default-178x178.png" height="178" width="178" alt="" />
                                <?php } ?>
                                <h3><?php the_title(); ?></h3>
                            </a>
                        </article>
                    <?php endif; ?>
                <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p>Aucun article disponible !!!</p>
            <?php endif; ?>
        </section>
        <section class="news-col">
            <h2>Actualités</h2>
            <?php if (have_posts()) : ?>
                <ul>
                    <?php while ($news_query->have_posts()) : $news_query->the_post(); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                                <?php
                                    if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('news-thumbnail', array('class' => 'thumbnail'));
                                    } else { ?>
                                        <img class="thumbnail" src="<?php echo(get_template_directory_uri()); ?>/img/thumbnail-default-808x80.png" height="80" width="80" alt="" />
                                <?php } ?>
                                <p class="post-title"><?php the_title(); ?></p>
                            </a>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php else : ?>
                <p>Désolé aucun article n'est disponibles sur cette page.</p>
            <?php endif; ?>
        </section>
    </div>

    <section class="grid-1 reviews-cat">
        <h2>Comparatifs</h2>
        <div class="grid-5">
            <a href="<?php echo (get_category_link(25)); ?>"><i class="fa fa-headphones" aria-hidden="true"></i> Casque &amp; Micro-Casque</a>
            <a href="<?php echo (get_category_link(17)); ?>"><i class="fa fa-volume-up" aria-hidden="true"></i> Enceinte &amp; Barre de son</a>
            <a href="<?php echo (get_category_link(41)); ?>"><i class="fa fa-microphone" aria-hidden="true"></i> Micro</a>
            <a href="<?php echo (get_category_link(14)); ?>">Carte Son</a>
            <a href="<?php echo (get_category_link(135)); ?>">Accessoire</a>
        </div>
    </section>
    <div class="grid-3-1">
        <div>
            <section>
                <h2>Guides</h2>
                <?php if (have_posts()) : ?>
                    <div class="grid-5">
                        <?php while ($guide_query->have_posts()) : $guide_query->the_post(); ?>
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
                    </div>
                <?php else : ?>
                    <p>Désolé aucun article n'est disponibles sur cette page.</p>
                <?php endif; ?>
            </section>
            <section>
                <h2>Tutoriaux</h2>
                <?php if (have_posts()) : ?>
                    <div class="grid-5">
                        <?php while ($tuto_query->have_posts()) : $tuto_query->the_post(); ?>
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
                    </div>
                <?php else : ?>
                    <p>Désolé aucun article n'est disponibles sur cette page.</p>
                <?php endif; ?>
            </section>
        </div>
        <div class="cat-left-sidebar">
            <?php if ( is_active_sidebar( 'cat-left-sidebar' ) ) : ?>
                <ul>
                    <?php dynamic_sidebar('cat-left-sidebar'); ?>
                </ul>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>
