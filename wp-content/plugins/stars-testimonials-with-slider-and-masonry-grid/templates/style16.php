<figure class="style16">
  <?php the_post_thumbnail( 'thumbnail', array('class' => 'profile') ); ?>
  <figcaption>
    <h2 class="st-testimonial-title"><?php the_title(); ?></h2>
    <h4 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h4>
    <div class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>    
    <blockquote class="st-testimonial-bg st-testimonial-content"><?php the_content(); ?></blockquote>
  </figcaption>
</figure>