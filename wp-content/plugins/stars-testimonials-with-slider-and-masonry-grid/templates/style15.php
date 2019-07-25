<figure class="st-style15">
  <?php the_post_thumbnail( 'thumbnail', array('class' => 'profile') ); ?>
  <figcaption class="st-testimonial-bg">
    <blockquote class="st-testimonial-content"><?php the_content(); ?></blockquote>
  </figcaption>
  <h3 class="st-testimonial-title"><?php the_title(); ?><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h3>
</figure>