<figure class="style10">
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content"><?php the_content(); ?></blockquote>
    <div class="arrow"></div>
  </figcaption>
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="author">
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company">- <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
    <span class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </span>    
  </div>
</figure>