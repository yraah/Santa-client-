<figure class="style1">
  <blockquote class="st-testimonial-content st-testimonial-bg">
	<?php the_content(); ?>
  	<div class="arrow"></div>
  </blockquote>
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="author st-testimonial-bg">
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company">- <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
    <span class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </span>
  </div>
</figure>