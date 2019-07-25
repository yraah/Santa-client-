<figure class="st-style14">
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content">
      <p><?php the_content(); ?>
    </blockquote>
    <div class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>      
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h4 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h4>
  </figcaption>
</figure>