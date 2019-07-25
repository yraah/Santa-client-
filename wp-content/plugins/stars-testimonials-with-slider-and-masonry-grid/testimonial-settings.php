<?php
defined('ABSPATH') or die('Nope, not accessing this');
$type = 'testimonial';
if(isset($_GET['type'])) {
    if($_GET['type'] == 'settings') {
        $type = 'settings';
    }
}?>
<div class="wrap">
    <nav class="nav-tab-wrapper woo-nav-tab-wrapper">
        <a href="<?php echo esc_url( admin_url( 'options-general.php?page=testimonial-setting' ) ); ?>" class="nav-tab <?php echo ($type == "testimonial"?"nav-tab-active":"") ?> "><?php echo __('Testimonial Type', 'stars-testimonials'); ?></a>
        <a href="<?php echo esc_url( admin_url( 'options-general.php?page=testimonial-setting&type=settings' ) ); ?>" class="nav-tab <?php echo ($type == "settings"?"nav-tab-active":"") ?>"><?php echo __('Testimonial Setting', 'stars-testimonials'); ?></a>
    </nav>
    <div class="testimonial-setting">
        <?php if($type == "testimonial") { ?>
        <h1><?php echo __('Choose testimonial type', 'stars-testimonials'); ?></h1>
            <div class="testimonial-type">
                <div class="testimonial-col active" data-for="grid-form">
                    <div class="testimonial-img ">
                        <img src="<?php echo plugins_url( '/images/grid.png', __FILE__ ) ?>" alt="<?php echo __('Grid', 'stars-testimonials'); ?>"/>
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Grid', 'stars-testimonials'); ?>
                    </div>
                </div>
                <div class="testimonial-col has-prow-feature" data-for="wall-form">
                    <img class="prow-feature-img" src="<?php echo plugins_url( '/images/pro-feature.png', __FILE__ ) ?>" alt="<?php echo __('Pro Feature', 'stars-testimonials'); ?>""/>
                    <div class="testimonial-img">
                        <img src="<?php echo plugins_url( '/images/wall.png', __FILE__ ) ?>" alt="<?php echo __('Wall', 'stars-testimonials'); ?>" />
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Wall', 'stars-testimonials'); ?>
                    </div>
                </div>
                <div class="testimonial-col last has-prow-feature" data-for="slider-form">
                    <img class="prow-feature-img" src="<?php echo plugins_url( '/images/pro-feature.png', __FILE__ ) ?>" alt="<?php echo __('Pro Feature', 'stars-testimonials'); ?>"/>
                    <div class="testimonial-img">
                        <img src="<?php echo plugins_url( '/images/slider.png', __FILE__ ) ?>" alt="<?php echo __('Slider', 'stars-testimonials'); ?>" />
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Slider', 'stars-testimonials'); ?>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="testimonial-form-data active" id="grid-form">
                <div class="testimonial-grid-box">
                    <form action="" >
                        <div class="grid-form-row">
                            <div class="grid-form-row-left">
                                <div class="list_item">
                                    <input checked type="radio" class="radio-btn" name="choice" id="grid-style-1" />
                                    <label for="grid-style-1" class="label">Choose style #1</label>
                                </div>
                                <a href="javascript:;" class="customize-button"><?php echo __('Customize', 'stars-testimonials'); ?></a>
                            </div>
                            <div class="grid-form-row-right">
                                <img src="<?php echo plugins_url( '/images/styles/style-1.png', __FILE__ ) ?>" alt="<?php echo __('Style 1', 'stars-testimonials'); ?>" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="grid-form-row">
                            <div class="grid-form-row-left">
                                <div class="list_item">
                                    <input type="radio" class="radio-btn" name="choice" id="grid-style-2" />
                                    <label for="grid-style-2" class="label">Choose style #2</label>
                                </div>
                            </div>
                            <div class="grid-form-row-right">
                                <img src="<?php echo plugins_url( '/images/styles/style-1.png', __FILE__ ) ?>" alt="<?php echo __('Style 2', 'stars-testimonials'); ?>" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="grid-form-row">
                            <div class="grid-form-row-left">
                                <div class="list_item">
                                    <input type="radio" class="radio-btn" name="choice" id="grid-style-3" />
                                    <label for="grid-style-3" class="label">Choose style #3</label>
                                </div>
                            </div>
                            <div class="grid-form-row-right">
                                <img src="<?php echo plugins_url( '/images/styles/style-1.png', __FILE__ ) ?>" alt="<?php echo __('Style 3', 'stars-testimonials'); ?>" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="grid-form-row">
                            <div class="grid-form-row-left">
                                <div class="list_item">
                                    <input type="radio" class="radio-btn" name="choice" id="grid-style-4" />
                                    <label for="grid-style-4" class="label">Choose style #4</label>
                                </div>
                            </div>
                            <div class="grid-form-row-right">
                                <img src="<?php echo plugins_url( '/images/styles/style-1.png', __FILE__ ) ?>" alt="<?php echo __('Style 4', 'stars-testimonials'); ?>" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="grid-form-row">
                            <div class="grid-form-row-left">
                                <div class="list_item">
                                    <input type="radio" class="radio-btn" name="choice" id="grid-style-5" />
                                    <label for="grid-style-5" class="label">Choose style #5</label>
                                </div>
                            </div>
                            <div class="grid-form-row-right">
                                <img src="<?php echo plugins_url( '/images/styles/style-1.png', __FILE__ ) ?>" alt="<?php echo __('Style 5', 'stars-testimonials'); ?>" />
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="testimonial-form-data" id="wall-form">

            </div>

            <div class="testimonial-form-data" id="slider-form">
                <form action="" method="post">
                    <div class="setting-box">
                        <div class="setting-box-left">
                            <h2><?php echo __('General settings', 'stars-testimonials'); ?></h2>
                            <table class="form-table">
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Columns:</label>
                                    </th>
                                    <td>
                                        <input type="hidden" name="grid_columns" id="grid_columns" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_categories">Categories:</label>
                                    </th>
                                    <td>
                                        <select name="grid_categories" id="grid_categories" class="select-box" >
                                            <option>-All</option>
                                        </select>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_no_of_testimonials"># of testimonials:</label>
                                    </th>
                                    <td>
                                        <input type="number" name="grid_no_of_testimonials" id="grid_no_of_testimonials" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_orders">Order:</label>
                                    </th>
                                    <td>
                                        <select name="grid_categories" id="grid_categories" class="select-box" >
                                            <option>-</option>
                                        </select>
                                    </td>
                                </tr>
                            </table>
                            <h2><?php echo __('Color settings', 'stars-testimonials'); ?></h2>
                            <table class="form-table">
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Stars:</label>
                                    </th>
                                    <td>
                                        <div class="custom-radios">
                                            <div>
                                                <input type="radio" class="yellow-color" name="color" value="#fff618" id="stars-yellow-color" checked >
                                                <label for="stars-yellow-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="orange-color" name="color" value="#ffa318" id="stars-orange-color">
                                                <label for="stars-orange-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="blue-color" name="color" value="#5278ff" id="stars-blue-color">
                                                <label for="stars-blue-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="slate-blue-color" name="color" value="#72e484" id="stars-slate-blue-color">
                                                <label for="stars-slate-blue-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="green-color" name="color" value="#72e484" id="stars-green-color">
                                                <label for="stars-green-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="black-color" name="color" value="#696969" id="stars-black-color">
                                                <label for="stars-black-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                            <div>
                                                <input type="radio" class="brown-color" name="color" value="#bababa" id="stars-brown-color">
                                                <label for="stars-brown-color">
                                                  <span>
                                                    <i class="fa fa-check" aria-hidden="true"></i>
                                                  </span>
                                                </label>
                                            </div>

                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Text:</label>
                                    </th>
                                    <td>
                                        <input type="hidden" name="grid_columns" id="grid_columns" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Background:</label>
                                    </th>
                                    <td>
                                        <input type="hidden" name="grid_columns" id="grid_columns" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Title:</label>
                                    </th>
                                    <td>
                                        <input type="hidden" name="grid_columns" id="grid_columns" />
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">
                                        <label for="grid_columns">Company:</label>
                                    </th>
                                    <td>
                                        <input type="hidden" name="grid_columns" id="grid_columns" />
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="setting-box-right"></div>
                        <div class="clear"></div>
                    </div>
                </form>

            </div>

            <div class="testimonial-form-data" id="customize-setting">
                <h2><?php echo __('General settings', 'stars-testimonials'); ?></h2>
                <form action="" method="post">
                    <div class="setting-box">
                        <div class="setting-box-left"></div>
                        <div class="setting-box-right"></div>
                        <div class="clear"></div>
                    </div>
                </form>
            </div>
        <?php } ?>
    </div>
</div>
<?php include_once 'help.php'; ?>