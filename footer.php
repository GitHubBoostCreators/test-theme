</main>
<?php echo do_shortcode(get_theme_mod('footer_content')) ?>
<?php wp_footer(); ?>
<?php if (get_theme_mod("enable_scrolltop")) : ?>
    <div class="scrollToTop d-print-none"><span class="scrollToTop-content"></span></div>
<?php endif; ?>

</body>

</html>