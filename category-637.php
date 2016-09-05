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


    <div class="filters">
        <h2>Que chechez-vous ?</h2>
        <div class="grid-3">
            <div class="ui-group">
                <p>Audio</p>
                <div class="button-group js-radio-button-group" data-filter-group="audio">
                    <button class="button is-checked" data-filter="">Tous</button>
                    <button class="button" data-filter=".mono">Mono</button>
                    <button class="button" data-filter=".stereo">Stéréo</button>
                    <button class="button" data-filter=".surround">Surround</button>
                </div>
            </div>
            <div class="ui-group">
                <p>Connexion</p>
                <div class="button-group js-radio-button-group" data-filter-group="connect">
                    <button class="button is-checked" data-filter="">Tous</button>
                    <button class="button" data-filter=".filaire">Filaire</button>
                    <button class="button" data-filter=".wireless">Sans-fil</button>
                </div>
            </div>
            <div class="ui-group">
                <p>Type</p>
                <div class="button-group js-radio-button-group" data-filter-group="type">
                    <button class="button is-checked" data-filter="">Tous</button>
                    <button class="button" data-filter=".intra">Intra-auriculaire</button>
                    <button class="button" data-filter=".supra">Supra-auriculaire</button>
                    <button class="button" data-filter=".circum">Circum-auriculaire</button>
                </div>
            </div>
            <div class="ui-group">
                <p>Audio</p>
                <div class="button-group js-radio-button-group" data-filter-group="">
                    <button class="button is-checked" data-filter="">Tous</button>
                    <button class="button" data-filter=".mono">Fermé</button>
                    <button class="button" data-filter=".stereo">Ouvert</button>
                </div>
            </div>
        </div>
        <div class="ui-group">
            <p>Plateforme</p>
            <div class="button-group js-radio-button-group" data-filter-group="device">
                <button class="button is-checked" data-filter="">Tous</button>
                <button class="button" data-filter=".pc">PC</button>
                <button class="button" data-filter=".mac">Mac</button>
                <button class="button" data-filter=".ps4">Playstation 4</button>
                <button class="button" data-filter=".ps3">Playstation 3</button>
                <button class="button" data-filter=".xb1">Xbox One</button>
                <button class="button" data-filter=".xb360">Xbox 360</button>
                <button class="button" data-filter=".mobile">Mobile</button>
            </div>
        </div>
        <div class="ui-group">
            <p>Réduction de bruit</p>
            <div class="button-group js-radio-button-group" data-filter-group="noise">
                <button class="button is-checked" data-filter="">Tous</button>
                <button class="button" data-filter=".noisepassive">Passive</button>
                <button class="button" data-filter=".noiseactive">Active</button>
            </div>
        </div>
        <div class="ui-group">
            <p>Marque</p>
            <div class="button-group js-radio-button-group grid-6" data-filter-group="brand">
                <div>
                    <button class="button is-checked" data-filter="">Tous</button>
                    <button class="button" data-filter=".astro">Astro Gaming</button>
                    <button class="button" data-filter=".asus">Asus</button>
                    <button class="button" data-filter=".attitudeone">Attitude One</button>
                    <button class="button" data-filter=".beyerdynamic">Beyerdynamic</button>
                </div>
                <div>
                    <button class="button" data-filter=".creative">Creative (Sound Blaster)</button>
                    <button class="button" data-filter=".cmstorm">CM Storm</button>
                    <button class="button" data-filter=".corsair">Corsair</button>
                    <button class="button" data-filter=".kingston">Kingston</button>
                    <button class="button" data-filter=".klipsch">Klipsch</button>
                </div>
                <div>
                    <button class="button" data-filter=".razer">Razer</button>
                    <button class="button" data-filter=".rha">RHA</button>
                    <button class="button" data-filter=".madcatz">Mad Catz</button>
                    <button class="button" data-filter=".ozone">Ozone</button>
                    <button class="button" data-filter=".plantronics">Plantronics</button>
                </div>
                <div>
                    <button class="button" data-filter=".psb">PSB</button>
                    <button class="button" data-filter=".qpad">Qpad</button>
                    <button class="button" data-filter=".roccat">Roccat</button>
                    <button class="button" data-filter=".sennheiser">Sennheiser</button>
                    <button class="button" data-filter=".sharkoon">Sharkoon</button>
                </div>
                <div>
                    <button class="button" data-filter=".skullcandy">Skullcandy</button>
                    <button class="button" data-filter=".sony">Sony</button>
                    <button class="button" data-filter=".steelseries">Steelseries</button>
                    <button class="button" data-filter=".thrustmaster">Thrustmaster</button>
                    <button class="button" data-filter=".tritton">Tritton</button>
                </div>
                <div>
                    <button class="button" data-filter=".ttesports">Tt eSPORTS</button>
                    <button class="button" data-filter=".turtlebeach">Turtle Beach</button>
                </div>
            </div>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <ul class="post-list">
            <?php while (have_posts()) : the_post(); ?>
                <li class="review <?php if (get_post_custom_values( 'gstuff_headset' )){$mykey_values = get_post_custom_values( 'gstuff_headset' ); foreach ( $mykey_values as $key => $value ) {echo "$value ";}};?>">
                    <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
                        <div class="thumbnail">
                            <?php
                                if ( has_post_thumbnail() ) {
                                    the_post_thumbnail('category-thumbnail');
                                }
                            ?>
                        </div>
                        <p class="debug-custom-field"><?php if (get_post_custom_values( 'gstuff_headset' )){$mykey_values = get_post_custom_values( 'gstuff_headset' ); foreach ( $mykey_values as $key => $value ) {echo "$value ";}};?>
                            <br>
                            <?php if (get_post_custom_values( 'taq_review_score' )){$mykey_values = get_post_custom_values( 'taq_review_score' ); foreach ( $mykey_values as $key => $value ) {echo "$value ";}};?>
                        </p>
                        <p class="post-title"><?php the_title(); ?></p>
                    </a>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php else : ?>
        <p>Désolé aucun article n'est disponibles sur cette page. C'est à se demander pourquoi nous avons créé cette catégorie !!!</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>