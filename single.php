<?php get_header()?>
<main>
    <div class="deep-background">
        <div class="glass-mask"></div>
        <span class="sp1"></span>
        <span class="sp2"></span>
        <span class="sp3"></span>
    </div>
    <?php    
        if (have_posts()):
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
    ?>  
</main>
<?php get_footer()?>