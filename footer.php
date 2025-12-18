<?php
// Footer template
?>

<footer>
    <!-- Footer Option -->
    <section id="main-footer-area " class=" dark-bg-color py-5">
        <div class="footer-wrapper w-12/12 sm:w-11/12 mx-auto px-5 py-2 flex flex-wrap md:flex-nowrap justify-between gap-5 ">
            <div class="footer-one w-12/12 md:w-4/12">
                <?php dynamic_sidebar('footer-one') ?>
            </div>
            <div class="footer-two w-12/12 md:w-4/12">
                <?php dynamic_sidebar('footer-two') ?>
            </div>
            <div class="footer-three w-12/12 md:w-4/12">
                <?php dynamic_sidebar('footer-three') ?>
            </div>
        </div>
    </section>
    <!-- copyright -->
    <section class="copyright-area">
        <div class="copyright-content">
            <p class="text-center py-3 dark-bg-color white-text-color primary-font text-[14px]"><?php echo get_theme_mod('silnytrust_footer_setting'); ?></p>
        </div>
    </section>
</footer>
<?php wp_footer(); ?>
</body>

</html>