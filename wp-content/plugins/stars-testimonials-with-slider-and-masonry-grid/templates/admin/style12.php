<figure class="st-style12">
  <img width="440" height="320" class="attachment-full size-full wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
  <figcaption class="st-testimonial-bg">
    <h3 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?></h3>
    <h5 class="st-testimonial-company"><?php echo $companyArray[$j-1]; ?></h5>
    <blockquote class="st-testimonial-content st-testimonial-bg">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <span class="cp-load-after-post"></span>
    </blockquote>
  </figcaption><?php echo ($url != '') ? '<a href="'.$company.'"></a>' : '' ; ?>
</figure>
