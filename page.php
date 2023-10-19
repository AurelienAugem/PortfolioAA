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
    ?>
    <section class="pf-page-content">
                <?the_content();?>
    </section>
    <?php
            endwhile;
        endif;
    ?>
    <?php if(is_front_page()): ?>
        <section class="project-gallery">
            <?php 
                $args = array(
                    'post_type' => 'projet',
                    'posts_per_page' => 4, 
                );

                $query = new wp_query($args);
                if($query->have_posts()) : while($query->have_posts()) : 
                  $query->the_post();

                  get_template_part('templates/card');

                endwhile; endif;
                wp_reset_postdata();
            ?>
        </section>
    <?php endif;?>    
</main>
<?php get_footer()?>