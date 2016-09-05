<?php
/**
 * @package WordPress
 * @subpackage gamerstuff
**/
?>

        <footer>
            <div class="container grid-3">
                <div><ul><?php dynamic_sidebar('footer-1'); ?></ul></div>
                <div><ul><?php dynamic_sidebar('footer-2'); ?></ul></div>
                <div><ul><?php dynamic_sidebar('footer-3'); ?></ul></div>
            </div>
            <div class="footer-logo">
                <img src="/wp-content/themes/gamerstuff/img/gamer-stuff-logo.png" height="82" width="250" alt="" />
            </div>
            <div class="grid-2 copyright">
                <p>&copy; Gamerstuff.fr <?php echo date('Y'); ?></p>
                <p>Réalisation : David Craff</p>
            </div>
        </footer>

        <script src="/wp-content/themes/gamerstuff/js/vendor/jquery-3.1.0.min.js"></script>
        <script src="/wp-content/themes/gamerstuff/js/vendor/jquery.fitvids.js"></script>
        <script src="https://npmcdn.com/isotope-layout@3.0/dist/isotope.pkgd.min.js"></script>
        <script src="/wp-content/themes/gamerstuff/js/main.js"></script>

        <?php wp_footer(); ?>

    </body>
</html>
