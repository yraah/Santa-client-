<figure class="st-style17">
  <figcaption class="st-testimonial-bg"><?php the_post_thumbnail( 'thumbnail', array('class' => 'profile') ); ?>
    <blockquote class="st-testimonial-content"><?php the_content(); ?></blockquote>
  </figcaption>
  <h3 class="st-testimonial-title"><?php the_title(); ?><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h3>
    <span class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    	<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </span>  
</figure>