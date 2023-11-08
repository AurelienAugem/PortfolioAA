<?php get_header()?>
<main>
    <?php get_template_part('templates/background'); 
        
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

        <?php get_template_part('templates/skillscard') ?>
        
        <span class="separation"></span>
        <section class="project-gallery opacity-none">
            <h2>Projets :</h2>
            <?php get_template_part('templates/filters'); ?>
            <div class="gallery">
                <?php 
                    $args = array(
                        'post_type' => 'projet',
                        'posts_per_page' => 10, 
                    );

                    $query = new wp_query($args);
                    if($query->have_posts()) : while($query->have_posts()) : 
                    $query->the_post();

                    get_template_part('templates/card');

                    endwhile; endif;
                    wp_reset_postdata();
                ?>
            </div>
        </section>
    <?php endif;?>    
</main>
<?php get_footer()?>