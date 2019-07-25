<?php
defined('ABSPATH') or die('Nope, not accessing this');
global $wpdb;
$tableName = $wpdb->prefix . DB_TESTIMONIAL_TABLE_NAME;
$id = $_GET['id'];
$query = "SELECT id
        FROM {$tableName}
        WHERE id = '{$id}'";
$result = $wpdb->get_row($query);
if(empty($result)) {
    echo "<script>window.location='".admin_url("edit.php?post_type=stars_testimonial&page=all-shortcodes")."';</script>";}
?>

<div class="wrap">
    <div class="testimonial-setting">
        <h1><?php echo __('Shortcode Preview', 'stars-testimonials'); ?>  <?php echo "[testimonial_stars id={$id}]" ?></h1>
        <div class="preview-box">
            <?php
                echo do_shortcode('[testimonial_stars id='.$id.']');
            ?>
        </div>
    </div>
</div>