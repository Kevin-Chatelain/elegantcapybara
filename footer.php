
<footer>  
    
    <div class="footer-title">
        <h2><?php bloginfo('name'); ?></h2>
    </div>

    <div class="top">
        <div class="footer-top-left">
            <?php dynamic_sidebar('footer_left'); ?>
        </div>

        <div class="footer-top-right">
            <?php dynamic_sidebar('footer_right'); ?>
        </div>

    </div>

    <div class="middle">
        <?php dynamic_sidebar('footer-copyright'); ?>
    </div>
    

    <div class="bottom">
        <div class="capy-brand-copyright">
            <p>Designed by Kevin &copy; | Powered by Wordpress</p>
        </div>
    </div>

    <?php wp_footer(); ?>
</footer>
    
</body>
</html>