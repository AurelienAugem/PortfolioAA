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
        <section class="skills">
            <figure class="show-skills">
                <div class="skills-block">
                    <p class="skills-label">HTML</p>
                    <div class="skills-progress">
                        <div class="progression"></div>
                    </div>
                </div>
                <div class="skills-block">
                    <p class="skills-label">CSS</p>
                    <div class="skills-progress">
                        <div class="progression"></div>
                    </div>
                </div>
                <div class="skills-block">
                    <p class="skills-label">javascript</p>
                    <div class="skills-progress">
                        <div class="progression"></div>
                    </div>
                </div>
                <div class="skills-block">
                    <p class="skills-label">PHP</p>
                    <div class="skills-progress">
                        <div class="progression"></div>
                    </div>
                </div>
                <div class="skills-block">
                    <p class="skills-label">WordPress</p>
                    <div class="skills-progress">
                        <div class="progression"></div>
                    </div>
                </div>
            </figure>
        </section>
        <span class="separation"></span>
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