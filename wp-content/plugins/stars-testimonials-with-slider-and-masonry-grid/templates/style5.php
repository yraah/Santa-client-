<figure class="st-style5">
  <?php the_post_thumbnail( 'full' ); ?>
  <div class="border one">
    <div></div>
  </div>
  <div class="border two">
    <div></div>
  </div>
  <figcaption>
    <blockquote class="st-testimonial-content"><?php the_content(); ?></blockquote>
    <div class="starrating st-rating">
      <?php do_action( 'stars_testimonial_display_rating', $stars ); ?>
    </div>    
    <h5 class="st-testimonial-title"><?php the_title(); ?><span class="st-testimonial-company"><?php echo $company; ?></span></h5>
  </figcaption> <?php echo ($url != '') ? '<a href="'.$url.'"></a>' : $url ; ?>
</figure>