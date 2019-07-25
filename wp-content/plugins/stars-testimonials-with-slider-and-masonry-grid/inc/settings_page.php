<?php
	global $post;
	$company = get_post_meta( $post->ID, 'testimonial_company_name', true );
	$url = get_post_meta( $post->ID, 'testimonial_company_url', true );
	$stars = get_post_meta( $post->ID, 'testimonial_stars', true );
?>
<table class="widefat">
	<tr>
		<th>Company Name / Rank</th>
		<td><input type="text" class="widefat" name="testimonial_company_name" value="<?php echo $company; ?>"></td>
		<td><p class="description">Provide Company name here</p></td>
	</tr>
	<tr>
		<th>Link</th>
		<td><input type="text" class="widefat" name="testimonial_company_url" value="<?php echo $url; ?>"></td>
		<td><p class="description">Provide URL or leave blank to disable</p></td>
	</tr>
	<tr>
		<th>Stars Rating</th>
		<td>
			<select class="widefat" name="testimonial_stars">
				<option <?php selected( $stars, '5.0', true ); ?> value="5.0">5.0</option>
				<option <?php selected( $stars, '4.5', true ); ?> value="4.5">4.5</option>
				<option <?php selected( $stars, '4.0', true ); ?> value="4.0">4.0</option>
				<option <?php selected( $stars, '3.5', true ); ?> value="3.5">3.5</option>
				<option <?php selected( $stars, '3.0', true ); ?> value="3.0">3.0</option>
				<option <?php selected( $stars, '2.5', true ); ?> value="2.5">2.5</option>
				<option <?php selected( $stars, '2.0', true ); ?> value="2.0">2.0</option>
				<option <?php selected( $stars, '1.5', true ); ?> value="1.5">1.5</option>
				<option <?php selected( $stars, '1.0', true ); ?> value="1.0">1.0</option>
				<option <?php selected( $stars, '0.5', true ); ?> value="0.5">0.5</option>
				<option <?php selected( $stars, 'disable', true ); ?> value="disable">Disable</option>
			</select>
		</td>
		<td><p class="description">Select rating between 0.5 to 5.0</p></td>
	</tr>
</table>