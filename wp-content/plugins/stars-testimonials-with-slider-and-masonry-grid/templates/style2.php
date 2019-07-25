<figure class="style2">
  <?php the_post_thumbnail( 'thumbnail' ); ?>
  <blockquote class="st-testimonial-bg st-testimonial-content">
  	<?php the_content(); ?>
  </blockquote>
  <div class="author">
	  <div class="starrating st-rating">
	  	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
	  </div>
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company"> <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</figure>