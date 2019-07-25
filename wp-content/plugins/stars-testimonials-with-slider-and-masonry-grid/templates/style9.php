<figure class="style9">
  <blockquote class="st-testimonial-content st-testimonial-bg"><?php the_content(); ?></blockquote>
  <div class="author">
    <?php the_post_thumbnail( 'thumbnail' ); ?>
    <h5 class="st-testimonial-title"><?php the_title(); ?></h5><span class="st-testimonial-company"><?php do_action( 'stars_testimonial_display_company', $company, $url); ?></span>
  </div>
</figure>