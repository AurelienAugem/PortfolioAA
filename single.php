<?php get_header()?>
<main>
    <?php get_template_part('templates/background'); 
    
        if (have_posts()):
            while (have_posts()) : the_post();

            $description = get_post_meta(get_the_id(),'description_du_projet',true);
            $lienGit = get_post_meta(get_the_id(),'lien_github',true);
            $technos = get_the_terms($post->ID, 'techno');
            $projectType = get_the_terms($post->ID, 'project_type');
            $techno = portfolio_array_taxo($technos);
            $type = portfolio_taxo($projectType);
    ?>
            <section class="post">
                <div class="post-content">
                    <div  class="post-title">
                        <h2><?php the_title(); ?></h2>
                    </div>
                    <div class="post-image">
                        <?php the_content(); ?>
                    </div>
                    <div class="techno">
                            <?php 
                                for ($i=0; $i < count($techno); $i++) { 
                                    if ($techno[$i]->slug == "html") {
                                        echo wp_get_attachment_image(51);
                                    }elseif ($techno[$i]->slug == "css") {
                                        echo wp_get_attachment_image(50);
                                    }elseif ($techno[$i]->slug == "javascript") {
                                        echo wp_get_attachment_image(52);
                                    }elseif ($techno[$i]->slug == "php") {
                                        echo wp_get_attachment_image(53);
                                    }elseif ($techno[$i]->slug == "wordpress") {
                                        echo wp_get_attachment_image(54);
                                    }
                                } 
                            ?>
                    </div>
                    <div class="post-type">
                        <p class="type">Projet de type : <?php echo $type; ?> </p>
                    </div>
                    <div class="post-description">
                        
                        <p class="text-description"><?php echo $description; ?></p>
                    </div>
                    <div class="git-link">
                        <a href=<?php echo $lienGit; ?> target="_blank">Lien vers le code sur GitHub</a>
                    </div>
                </div>
                

            </section>
    <?php            
            endwhile;
        endif;
    ?>  
</main>
<?php get_footer()?>