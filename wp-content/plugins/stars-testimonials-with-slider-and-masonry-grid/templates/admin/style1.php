<figure class="style1">
  <blockquote class="st-testimonial-content st-testimonial-bg">
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
    <span class="cp-load-after-post"></span>  	<div class="arrow"></div>
  </blockquote>
  <img width="440" height="320" class="attachment-full size-full wp-post-image" src="<?php echo plugins_url( '../../images/admin/user-'.$j.'.jpg', __FILE__ ) ?>" alt="<?php echo __('User '.$j, 'stars-testimonials'); ?>"/>
  <div class="author st-testimonial-bg">
    <h5 class="st-testimonial-title"><?php echo $clientArray[$j-1]; ?><span class="st-testimonial-company">- <?php echo $companyArray[$j-1]; ?></span></h5>
      <span class="starrating st-rating" title="Rated 4.5 out of 5.0">
          <i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-half-o"></i>
      </span>
  </div>
</figure>