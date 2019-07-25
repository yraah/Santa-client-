<?php
defined('ABSPATH') or die('Nope, not accessing this');
?>
<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php echo __('Create Shortcode', 'stars-testimonials'); ?><a target="_blank" href='<?php echo PRO_PLUGIN_URL ?>' class='upgrade-block-button open-popup'><?php echo __("Upgrade to Pro", 'stars-testimonials') ?></a></h1>
        <div class="clearfix"></div>
    </div>
    <div class="testimonial-setting">
        <div class="testimonial-type">
            <div class="testimonial-type-left">
                <h2><?php echo __('Choose testimonial style', 'stars-testimonials'); ?> </h2>
            </div>
            <div class="testimonial-type-right">
                <div class="testimonial-col" data-for="grid-form" data-value="grid">
                    <div class="testimonial-img ">
                        <img src="<?php echo plugins_url( '/images/admin/grid.svg', __FILE__ ) ?>" alt="<?php echo __('Grid', 'stars-testimonials'); ?>"/>
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Grid', 'stars-testimonials'); ?>
                    </div>
                </div>
                <div class="testimonial-col has-prow-feature" data-for="custom-form" data-value="wall">
                    <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank">
                        <div class="testimonial-img">
                            <img src="<?php echo plugins_url( '/images/admin/wall-pro-feature.svg', __FILE__ ) ?>" alt="<?php echo __('Wall', 'stars-testimonials'); ?>" />
                        </div>
                        <div class="testimonial-text">
                            <?php echo __('Wall', 'stars-testimonials'); ?>
                        </div>
                    </a>
                </div>
                <div class="testimonial-col has-prow-feature last" data-for="slider-form" data-value="slider">
                    <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank">
                        <div class="testimonial-img">
                            <img src="<?php echo plugins_url( '/images/admin/slider-pro-feature.svg', __FILE__ ) ?>" alt="<?php echo __('Slider', 'stars-testimonials'); ?>" />
                        </div>
                        <div class="testimonial-text">
                            <?php echo __('Slider', 'stars-testimonials'); ?>
                        </div>
                    </a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="testimonial-form-data grid-box" id="grid-form">
            <div class="testimonial-grid-box">
                <form action="" method="post" >
                    <?php
                    $clientArray = array("Tim Forever","Hans Down","Desmond Eagle");
                    $companyArray = array("UX Design","Web Inc.","Accountant");
                    ?>
                    <?php $start = 1; $end=17; for($i=$start;$i<=$end;$i++) { ?>
                    <div class="grid-form-row <?php echo ($i>5)?"disabled":"" ?>">
                        <div class="grid-form-row-left">
                            <div class="list_item">
                                <input type="radio" class="radio-btn" name="testimonial_style" id="grid-style-<?php echo $i ?>" value="<?php echo $i ?>" <?php echo ($i>5)?"disabled":"" ?> />
                                <label for="grid-style-<?php echo $i ?>" class="label">Choose style #<?php echo $i ?></label>
                            </div>
                            <a <?php echo ($i<=5)?'href="javascript:;"':'href="'.PRO_PLUGIN_URL.'" target="_blank" '; ?> class="testimonial-button is-hidden <?php echo ($i>5)?"disabled-class":"customize-button" ?>"><?php echo ($i<=5)?__('Customize', 'stars-testimonials'):__('Upgrade to Pro', 'stars-testimonials'); ?></a>
                        </div>
                        <div class="grid-form-row-right">
                            <div class="grid-style-box">
                                <?php $to = ($i==10)?2:3; for($j=1;$j<=$to;$j++) { ?>
                                    <div class="col-1-<?php echo $to ?>">
                                        <?php include "templates/admin/style".$i.".php"; ?>
                                    </div>
                                <?php } ?>
                            <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <?php } ?>
                </form>
            </div>
        </div>
        <div class="testimonial-form-data not-pro-version" id="custom-form">
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>&submit=true" method="post" id="testimonial_form">
                <input type="hidden" name="testimonial_type" id="testimonial_type" />
                <input type="hidden" name="testimonial_style" id="testimonial_style" />
                <div class="setting-box">
                    <div class="setting-box-left">
                        <h2><?php echo __('General settings', 'stars-testimonials'); ?></h2>
                        <?php
                        $arg = array(
                            'taxonomy' => 'stars_testimonial_cat',
                            'hide_empty' => false,
                            'order' => "ASC",
                            'orderby' => 'name'
                        );
                        $terms = get_terms($arg);
                        ?>
                        <table class="form-table">
                            <tr>
                                <th scope="row">
                                    <label for="shortcode_name"><?php echo __("Shortcode name", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <input class="form-control required" id="shortcode_name" type="text" name="shortcode_name" />

                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="font_family"><?php echo __("Font Family", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <?php $fonts = $GLOBALS['fontFamily']; ?>
                                    <?php foreach($fonts as $key=>$value) { ?>
                                        <link href="https://fonts.googleapis.com/css?family=<?php echo urlencode($value) ?>" rel="stylesheet" tyle="text/css">
                                    <?php } ?>
                                    <div class="custom-select-box" id="font-family">
                                        <input type="text" readonly class="form-control custom-select" name="font_family" id="font_family" value="Default" >
                                        <span class="select-arrow"></span>
                                        <div name="font_family" id="font_family" class="select-content" >
                                            <ul>
                                            <li data-value='Default' class="active">Default</li>
                                            <?php foreach($fonts as $key=>$value) {
                                                echo "<li style='font-family: ".$value."' data-value='{$value}'>{$value}</li>";
                                            } ?>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="grid_columns"><?php echo __("Columns", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="grid-columns-box">
                                        <input class="grid-columns" id="grid_columns" type="text" min="1" max="5" value="3" name="grid_columns" step="1" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="grid_categories"><?php echo __("Categories", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <select name="testimonial_categories[]" id="grid_categories" class="select-box select2" multiple="multiple" >
                                            <?php foreach($terms as $term) {
                                                echo "<option value='{$term->term_id}'>{$term->name}</option>";
                                            } ?>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="no_of_testimonials"><?php echo __("# of testimonials", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <input type="number" class="form-control" name="no_of_testimonials" id="no_of_testimonials" value="3" min="1" max="5" step="1"/>
                                    <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank" class="pro-feature-link"><?php echo __("Upgrade for unlimited testimonials") ?></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="testimonial_order"><?php echo __("Order", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <select name="testimonial_order" id="testimonial_order" class="select-box" >
                                            <option value="1"><?php echo __("Date ascending", 'stars-testimonials') ?></option>
                                            <option value="2"><?php echo __("Date descending", 'stars-testimonials') ?></option>
                                            <option value="3"><?php echo __("Title ascending", 'stars-testimonials') ?></option>
                                            <option value="4"><?php echo __("Title descending", 'stars-testimonials') ?></option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <h2><?php echo __('Color settings', 'stars-testimonials'); ?></h2>
                        <?php
                        global $settingArray;
                        ?>
                        <table class="form-table" id="custom-color">
                            <?php foreach($settingArray as $title) { ?>
                                <tr class="dynamic-color-col color-<?php echo $title['slug'] ?>-col" data-col="<?php echo $title['slug'] ?>">
                                    <th scope="row">
                                        <label for=""><?php echo $title['title'] ?>:</label>
                                    </th>
                                    <td class="color-row" data-class="<?php echo $title['class'] ?>">
                                        <div class="custom-radios">
                                            <input type="hidden" name="<?php echo $title['slug'] ?>_color" value="" />
                                            <?php foreach($title['color'] as $key=>$color) { ?>
                                                <style>
                                                    .color-<?php echo $title['slug'] ?>-col .custom-radios input[type="radio"].color-<?php echo $key ?> + label span {
                                                        background-color: #<?php echo $color ?>;
                                                        border-color: #<?php echo $color ?>;
                                                    }
                                                </style>
                                                <div>
                                                    <input type="radio" class="color-<?php echo $key ?>" name="<?php echo $title['slug'] ?>_color" value="<?php echo $color ?>" id="<?php echo $title['slug']."-".$key ?>-color">
                                                    <label for="<?php echo $title['slug']."-".$key ?>-color">
                                                      <span>
                                                        <i class="fa fa-check" aria-hidden="true"></i>
                                                      </span>
                                                    </label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="custom-color-box">
                                            <div class="inline-block">
                                                <span><i class="fa fa-question" aria-hidden="true"></i></span>
                                            </div>
                                            <div class="inline-block">
                                                <input class="custom-color testimonial-color-picker form-control" placeholder="FFFFFF" disabled />
                                            </div>
                                            <div class="inline-block">
                                                <a href="<?php echo PRO_PLUGIN_URL ?>" target="_blank" class="pro-feature-link"><?php echo __("Pro Feature","stars-testimonials") ?></a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="setting-box-right">
                        <div class="preview-section">
                            <div class="preview-inner" id="preview-box"></div>
                        </div>
                        <div class="preview-buttons">
                            <a href="javascript:;" class="testimonial-button pull-left back-button" ><i class="fa fa-angle-double-left"></i> <?php echo __("Back", 'stars-testimonials') ?></a>
                            <a href="javascript:;" class="submit-button testimonial-button" ><?php echo __("Finish", 'stars-testimonials') ?> <i class="fa fa-angle-double-right"></i></a>
                            <div class="clearfix"></div>
                            <a href="javascript:;" class="reset-button testimonial-button" ><i class="fa fa-refresh"></i> <?php echo __("Reset", 'stars-testimonials') ?></a>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <input type="hidden" name="action" value="save_testimonial_setting">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("star_testimonial_add_nonce") ?>" >
                <input type="hidden" name="id" value="">
            </form>
        </div>
    </div>
</div>
<?php include_once 'help.php'; ?>