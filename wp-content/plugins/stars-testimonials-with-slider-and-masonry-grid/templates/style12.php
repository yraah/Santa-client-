<figure class="st-style12">
	<?php the_post_thumbnail( 'full' ); ?>
  <figcaption class="st-testimonial-bg">
    <h3 class="st-testimonial-title"><?php the_title(); ?></h3>
    <h5 class="st-testimonial-company"><?php echo $company; ?></h5>
    <blockquote class="st-testimonial-content">
      <?php the_content(); ?>
    </blockquote>
  </figcaption><?php echo ($url != '') ? '<a href="'.$company.'"></a>' : '' ; ?>
</figure>