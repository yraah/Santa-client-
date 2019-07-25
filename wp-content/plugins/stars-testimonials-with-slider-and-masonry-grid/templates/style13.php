<figure class="st-style13">
  <?php the_post_thumbnail( 'full' ); ?>
  <figcaption>
    <blockquote class="st-testimonial-content">
      <?php the_content(); ?>
    </blockquote>
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h5 class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></h5>
  </figcaption>
</figure>