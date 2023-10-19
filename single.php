<?php get_header()?>
<main>
    <?php get_template_part('templates/background'); 
    
        if (have_posts()):
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
    ?>  
</main>
<?php get_footer()?>