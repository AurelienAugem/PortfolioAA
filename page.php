<?php get_header()?>
<main>
<?php    
    if (have_posts()):
        while (have_posts()) : the_post();
            the_content();
        endwhile;
    endif;
?>
<?php if(is_front_page()): ?>

<?php endif;?>    
</main>
<?php get_footer()?>