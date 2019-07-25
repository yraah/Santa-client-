<figure class="style16">
  <img width="440" height="320" class="profile wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-thumb-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
  <figcaption>
    <h2 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?></h2>
    <h4 class="st-testimonial-company"><?php echo $companyArray[$j-1]; ?></h4>
    <div class="starrating st-rating" title="Rated 4.5 out of 5.0">
      <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
    </div>
    <blockquote class="st-testimonial-bg st-testimonial-content">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      <span class="cp-load-after-post"></span>
    </blockquote>
  </figcaption>
</figure>
