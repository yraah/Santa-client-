<figure class="style4 st-testimonial-bg">
  <blockquote class="st-testimonial-content"><?php the_content(); ?></blockquote>
      	<div class="starrating st-rating" title="Rated <?php echo $stars; ?> out of 5.0">
    		<?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    	</div>
  <div class="author"><?php the_post_thumbnail( 'thumbnail' ); ?>
    <h5 class="st-testimonial-title"><?php the_title(); ?></h5><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span>
  </div>
</figure>