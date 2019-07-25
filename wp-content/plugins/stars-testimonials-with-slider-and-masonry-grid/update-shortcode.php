<?php
defined('ABSPATH') or die('Nope, not accessing this');
global $wpdb;
$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
$id = esc_sql($_GET['id']);
$query = "SELECT id, testimonial_type, testimonial_style, font_family, grid_columns, testimonial_categories, shortcode_name, no_of_testimonials, testimonial_order,
                stars_color, text_color, background_color,  title_color, company_color, created_by
        FROM {$tableName}
        WHERE id = '{$id}'";
$result = $wpdb->get_row($query);
if(empty($result)) {
    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial")."';</script>";}
?>

<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php echo __('Update Shortcode', 'stars-testimonials'); ?><a target="_blank" href='<?php echo PRO_PLUGIN_URL ?>' class='upgrade-block-button open-popup'><?php echo __("Upgrade to Pro", 'stars-testimonials') ?></a></h1>
        <div class="clearfix"></div>
        <div class="testimonial-type" style="display: none" >
            <h2><?php echo __('Choose testimonial style', 'stars-testimonials'); ?> </h2>
            <div class="testimonial-col <?php echo ($result->testimonial_type == "grid")?"active":"" ?>" data-for="grid-form" data-value="grid">
                <div class="testimonial-img ">
                    <img src="<?php echo plugins_url( '/images/admin/grid.svg', __FILE__ ) ?>" alt="<?php echo __('Grid', 'stars-testimonials'); ?>"/>
                </div>
                <div class="testimonial-text">
                    <?php echo __('Grid', 'stars-testimonials'); ?>
                </div>
            </div>
            <div class="testimonial-col <?php echo ($result->testimonial_type == "wall")?"active":"" ?> has-prow-feature" data-for="custom-form" data-value="wall">
                <a target="_blank" href="<?php echo PRO_PLUGIN_URL ?>" >
                    <div class="testimonial-img">
                        <img src="<?php echo plugins_url('/images/admin/wall-pro-feature.svg', __FILE__ ) ?>" alt="<?php echo __('Wall', 'stars-testimonials'); ?>" />
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Wall', 'stars-testimonials'); ?>
                    </div>
                </a>
            </div>
            <div class="testimonial-col <?php echo ($result->testimonial_type == "slider")?"active":"" ?> has-prow-feature last" data-for="slider-form" data-value="slider">
                <a target="_blank" href="<?php echo PRO_PLUGIN_URL ?>" >
                    <div class="testimonial-img">
                        <img src="<?php echo plugins_url('/images/admin/slider-pro-feature.svg', __FILE__ ) ?>" alt="<?php echo __('Slider', 'stars-testimonials'); ?>" />
                    </div>
                    <div class="testimonial-text">
                        <?php echo __('Slider', 'stars-testimonials'); ?>
                    </div>
                </a>
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
                    <div class="grid-form-row <?php echo ($result->testimonial_style == $i)?"active":"" ?>">
                        <div class="grid-form-row-left">
                            <div class="list_item">
                                <input type="radio" class="radio-btn" <?php echo (esc_attr($result->testimonial_style) == $i)?"checked":"" ?> name="testimonial_style" id="grid-style-<?php echo $i ?>" value="<?php echo $i ?>" <?php echo ($i>5)?"disabled":"" ?>  />
                                <label for="grid-style-<?php echo $i ?>" class="label">Choose style #<?php echo $i ?></label>
                            </div>
                            <a <?php echo ($i<=5)?'href="javascript:;"':' target="_blank" href="'.PRO_PLUGIN_URL.'"  '; ?> class="testimonial-button is-hidden <?php echo ($i>5)?"disabled-class":"customize-button" ?>"><?php echo ($i<=5)?__('Customize', 'stars-testimonials'):__('Upgrade to Pro', 'stars-testimonials'); ?></a>
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
        <div class="testimonial-form-data not-pro-version <?php echo esc_attr($result->testimonial_type) ?>-form" id="custom-form" style="display: block;">
            <form action="<?php echo $_SERVER['REQUEST_URI'] ?>&submit=true" method="post" id="testimonial_form">
                <input type="hidden" name="testimonial_type" id="testimonial_type" value="<?php echo esc_attr($result->testimonial_type) ?>" />
                <input type="hidden" name="testimonial_style" id="testimonial_style" value="<?php echo esc_attr($result->testimonial_style) ?>" />
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
                                    <input class="form-control required" value="<?php echo $result->shortcode_name ?>" id="shortcode_name" type="text" name="shortcode_name" />

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
                                        <input type="text" readonly class="form-control custom-select" name="font_family" id="font_family" <?php echo ($result->font_family=="")?"":"style='font-family: {$result->font_family}'" ?> value="<?php echo ($result->font_family=="")?"Default":$result->font_family ?>" >
                                        <span class="select-arrow"></span>
                                        <div name="font_family" id="font_family" class="select-content" >
                                            <ul>
                                                <li data-value='Default' class="<?php echo ($result->font_family=="")?"active":"" ?>">Default</li>
                                                <?php foreach($fonts as $key=>$value) {
                                                    echo "<li class='".((esc_attr($result->font_family) == $value)?"active":"")."' style='font-family: ".$value."' data-value='{$value}'>{$value}</li>";
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
                                        <input class="grid-columns" id="grid_columns" type="text" min="1" max="5" value="<?php echo esc_attr($result->grid_columns) ?>" name="grid_columns" step="1" />
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="grid_categories"><?php echo __("Categories", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <?php
                                        $selectedCategory = $result->testimonial_categories;
                                        $selectedCategoryArray = explode(",",$selectedCategory);
                                        ?>
                                        <select name="testimonial_categories[]" id="grid_categories" class="select-box select2" multiple="multiple" >
                                            <?php foreach($terms as $term) {
                                                echo "<option ".((in_array($term->term_id, $selectedCategoryArray)?"selected":""))." value='{$term->term_id}'>{$term->name}</option>";
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
                                    <input type="number" class="form-control" name="no_of_testimonials" id="no_of_testimonials" value="<?php echo esc_attr($result->no_of_testimonials) ?>" max="5" min="1" step="1"/>
                                    <a target="_blank" href="<?php echo PRO_PLUGIN_URL ?>"  class="pro-feature-link"><?php echo __("Upgrade for unlimited testimonials") ?></a>
                                </td>
                            </tr>
                            <tr>
                                <th scope="row">
                                    <label for="testimonial_order"><?php echo __("Order", 'stars-testimonials') ?>:</label>
                                </th>
                                <td>
                                    <div class="select-box">
                                        <select name="testimonial_order" id="testimonial_order" class="select-box" >
                                            <option <?php echo esc_attr($result->testimonial_order)==1?"selected":"" ?> value="1"><?php echo __("Date ascending", 'stars-testimonials') ?></option>
                                            <option <?php echo esc_attr($result->testimonial_order)==2?"selected":"" ?> value="2"><?php echo __("Date descending", 'stars-testimonials') ?></option>
                                            <option <?php echo esc_attr($result->testimonial_order)==3?"selected":"" ?> value="3"><?php echo __("Title ascending", 'stars-testimonials') ?></option>
                                            <option <?php echo esc_attr($result->testimonial_order)==4?"selected":"" ?> value="4"><?php echo __("Title descending", 'stars-testimonials') ?></option>
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
                            <?php foreach($settingArray as $title) {
                                $customColor = $result->{$title['slug']."_color_custom"};
                                ?>
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
                                                    <input type="radio" class="color-<?php echo $key ?>" name="<?php echo $title['slug'] ?>_color" <?php echo $result->{$title['slug']."_color"}==$color?"checked":"" ?> value="<?php echo $color ?>" id="<?php echo $title['slug']."-".$key ?>-color">
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
                                            <div class="custom-color-box">
                                                <div class="inline-block">
                                                    <span><i class="fa fa-question" aria-hidden="true"></i></span>
                                                </div>
                                                <div class="inline-block">
                                                    <input class="custom-color testimonial-color-picker form-control" placeholder="FFFFFF" disabled />
                                                </div>
                                                <div class="inline-block">
                                                    <a target="_blank" href="<?php echo PRO_PLUGIN_URL ?>"  class="pro-feature-link"><?php echo __("Pro Feature","stars-testimonials") ?></a>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>
                    </div>
                    <div class="setting-box-right">
                        <div class="preview-section">
                            <div class="preview-inner" id="preview-box">
                                <?php
                                echo "<style>";
                                if($result->stars_color != "") {
                                    echo "#preview-box .starrating{color:#{esc_attr".esc_attr($result->stars_color)."}";
                                }
                                if($result->text_color != "") {
                                    echo "#preview-box .st-testimonial-content{color:#".esc_attr($result->text_color)."}";
                                }
                                if($result->background_color != "") {
                                    echo "#preview-box figure.style2 blockquote.st-testimonial-bg{background-color:#".esc_attr($result->background_color)."}";
                                }
                                if($result->title_color != "") {
                                    echo "#preview-box .st-testimonial-title{color:#".esc_attr($result->title_color)."}";
                                }
                                if($result->company_color != "") {
                                    echo "#preview-box .st-testimonial-company{color:#".esc_attr($result->company_color)."}";
                                }
                                if($result->font_family != "") {
                                    echo ".custom-select, #preview-box figure, #preview-box blockquote{font-family:".esc_attr($result->font_family)."}";
                                }
                                echo "</style>";
                                ?>
                                <?php $j = 1; include "templates/admin/style".esc_attr($result->testimonial_style).".php"; ?>
                                <div class="clearfix"></div>
                            </div>
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
                <input type="hidden" name="id" value="<?php echo $result->id ?>">
                <input type="hidden" name="nonce" value="<?php echo wp_create_nonce("star_testimonial_update_nonce_".$result->id) ?>" >
            </form>
        </div>
        <div style="display: none">
            <div id="pro-popup">
                <div class="pro-popup">
                    <div class="pro-popup-content">
                        <h2><?php echo __("Upgrade", 'stars-testimonials') ?></h2>
                        <p class="title-text"><?php echo __("Get all Pro features for just <span>$19/year</span>", 'stars-testimonials') ?></p>
                        <p><?php echo __("(We will not automatically renew your plan)", 'stars-testimonials') ?></p>
                        <div class="pro-features">
                            <ul>
                                <li><?php echo __("Infinite testimonials", 'stars-testimonials') ?></li>
                                <li><?php echo __("Custom color (HEX code)", 'stars-testimonials') ?></li>
                                <li><?php echo __("Wall and slider testimonials", 'stars-testimonials') ?></li>
                                <li><?php echo __("All template styles", 'stars-testimonials') ?> </li>
                            </ul>
                            <div class="clear"></div>
                        </div>
                        <div class="pro-feature-form">
                            <form action="" method="post">
                                <div class="pro-feature-input">
                                    <label for="website_url"><?php echo __("Your website URL:", 'stars-testimonials') ?></label>
                                    <input type="text" name="website_url" id="website_url" placeholder="www.yourdomain.com">
                                </div>
                                <div class="pro-feature-button">
                                    <button type="submit" class="paypal-button"><img src="<?php echo plugins_url( '/images/admin/paypal-button.jpg', __FILE__ ) ?>" alt="<?php echo __('Buy now with paypal', 'stars-testimonials'); ?>" /></button>
                                    <span><?php echo __("14 days money back guarantee", 'stars-testimonials') ?></span>
                                </div>
                                <div class="pro-payment-options">
                                    <img src="<?php echo plugins_url( '/images/admin/payment-options.png', __FILE__ ) ?>" alt="<?php echo __('Payment Options', 'stars-testimonials'); ?>" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="pro-popup-footer">
                        <div class="client-testimonial-list">
                            <div class="client-testimonial">
                                <div class="client-testimonial-left">
                                    <img src="<?php echo plugins_url( '/images/admin/client-image.png', __FILE__ ) ?>" alt="<?php echo __('Client image Options', 'stars-testimonials'); ?>" />
                                </div>
                                <div class="client-testimonial-right">
                                    <p><?php echo __('Just installed chaty a couple days back. Was a bit skeptical. Then some leads came through via whatsapp on my site haha. Sold', 'stars-testimonials'); ?></p>
                                    <p class="client-name"><?php echo __('Deepak Shukla, pearllemon', 'stars-testimonials'); ?></p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once 'help.php'; ?>