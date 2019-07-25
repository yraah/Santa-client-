<figure class="style11">
  <blockquote class="st-testimonial-bg st-testimonial-content"><?php the_content(); ?></blockquote>
  <div class="author">
    <?php the_post_thumbnail( 'thumbnail' ); ?>
    <h5 class="st-testimonial-title"><?php the_title(); ?> <span class="st-testimonial-company"> <?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span></h5>
  </div>
</figure>