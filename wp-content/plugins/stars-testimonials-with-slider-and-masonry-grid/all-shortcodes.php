<?php
defined('ABSPATH') or die('Nope, not accessing this');
$results = get_posts(array("post_type"=>"stars_testimonial","numberposts" => 1));
if(count($results) == 0) {
    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial")."';</script>";
}

global $wpdb;
$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
$query = "SELECT id, testimonial_type, testimonial_style, grid_columns, testimonial_categories, shortcode_name, no_of_testimonials, testimonial_order, slides_to_scroll, scroll_speed,
            navigation_dots, navigation_arrows, is_slider_autoplay, slider_interval, stars_color, stars_color_custom, text_color, text_color_custom, background_color,
            background_color_custom, title_color, title_color_custom, company_color, company_color_custom, created_by
        FROM {$tableName} ORDER BY id DESC";
$results = $wpdb->get_results($query);
?>
<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php echo __('All Shortcodes', 'stars-testimonials'); ?><a href='<?php echo PRO_PLUGIN_URL ?>' target="_blank" class='upgrade-block-button open-popup'><?php echo __("Upgrade to Pro", 'stars-testimonials') ?></a> <?php if(count($results)!=0) { ?> <a href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new") ?>" class="button pull-right">Add New</a> <?php } ?></h1>
        <div class="clearfix"></div>
    </div>
    <div class="search-results">
        <?php if(count($results)>0) { ?>
            <table class="wp-list-table widefat fixed striped posts">
                <thead>
                    <tr>
                        <th width="110"><b><?php echo __("Type", 'stars-testimonials') ?></b></th>
                        <th width="20%"><b><?php echo __("Name", 'stars-testimonials') ?></b></th>
                        <th><b><?php echo __("Shortcode", 'stars-testimonials') ?></b></th>
                        <th width="110" class="text-center"><b><?php echo __("Action", 'stars-testimonials') ?></b></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $clientArray = array("Tim Forever","Hans Down","Desmond Eagle");
                $companyArray = array("UX Design","Web Inc.","Accountant");
                ?>
                    <?php foreach ($results as $row) { ?>
                        <tr data-nonce="<?php echo wp_create_nonce("star_testimonial_remove_nonce_".$row->id) ?>" id="row-<?php echo $row->id ?>" data-id="<?php echo $row->id ?>" data-type="<?php echo $row->testimonial_type ?>">
                            <td><?php echo ucfirst($row->testimonial_type) ?></td>
                            <td><?php echo $row->shortcode_name ?></td>
                            <td>
                                <div class="copy-shortcode">
                                    <?php echo "[testimonial_stars id={$row->id}]" ?><a title="<?php echo __("Click to copy", 'stars-testimonials') ?>" href="javascript:;"><i class="fa fa-clone"></i></a>
                                </div>
                                <div class="sr-only">
                                    <input type="text" id="short-code-<?php echo $row->id ?>" value="[testimonial_stars id=<?php echo $row->id?>]">
                                </div>
                            </td>
                            <td class="action-buttons text-center" >
                                <a class="view-preview" target="_blank" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=preview&id=".$row->id) ?>"><span class="badge bg-blue"><i class="fa fa-eye"></i></span></a>
                                <?php if(current_user_can('edit_posts')) { ?>
                                <a class="update-preview" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=edit&id=".$row->id) ?>"><span class="badge bg-green"><i class="fa fa-pencil"></i></span></a>
                                <?php } ?>
                                <?php if(current_user_can('delete_posts')) { ?>
                                <a class="remove-preview" href="javascript:;"><span class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
        <div class="no-results">
            <a class="add-new-record" href="<?php echo site_url("wp-admin/edit.php?post_type=stars_testimonial&page=all-shortcodes&task=add-new") ?>"><?php echo __("Create Your First Shortcode", 'stars-testimonials') ?></a>
        </div>
        <?php } ?>
    </div>
</div>
<?php include_once 'help.php'; ?>