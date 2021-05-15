<?php
/**
 * This file manage the html and functionality for the post sort or filter
 * in blog listing or archive page.
 *
 * @package travel-escape
 */

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! travel_escape_get_theme_mod( 'enable_archive_filter' ) ) {
	return;
}

$filter_data = isset( $_GET['_nonce'] ) && wp_verify_nonce( sanitize_text_field( wp_unslash( $_GET['_nonce'] ) ), 'travel_escape_filter_nonce_action' ) ? travel_escape_sanitize( $_GET ) : '';

$filter_orderby = isset( $filter_data['orderby'] ) ? $filter_data['orderby'] : 'none';
$filter_order   = isset( $filter_data['order'] ) ? $filter_data['order'] : 'none';

?>
<div class="post-filter-wrapper">
	<form method="GET" class="filter-form">

		<select name="orderby" class="post-filter-field orderby">
			<option <?php selected( $filter_orderby, 'none' ); ?> value="none"><?php esc_html_e( 'Order By', 'travel-escape' ); ?></option>
			<option <?php selected( $filter_orderby, 'title' ); ?> value="title"><?php esc_html_e( 'Title', 'travel-escape' ); ?></option>
			<option <?php selected( $filter_orderby, 'date' ); ?> value="date"><?php esc_html_e( 'Date', 'travel-escape' ); ?></option>
			<option <?php selected( $filter_orderby, 'modified' ); ?> value="modified"><?php esc_html_e( 'Last Modified', 'travel-escape' ); ?></option>
		</select>

		<select name="order" class="post-filter-field order">
			<option <?php selected( $filter_order, 'none' ); ?> value="none"><?php esc_html_e( 'Order In', 'travel-escape' ); ?></option>
			<option <?php selected( $filter_order, 'ASC' ); ?> value="ASC"><?php esc_html_e( 'Ascending order', 'travel-escape' ); ?></option>
			<option <?php selected( $filter_order, 'DESC' ); ?> value="DESC"><?php esc_html_e( 'Descending order', 'travel-escape' ); ?></option>
		</select>

		<?php wp_nonce_field( 'travel_escape_filter_nonce_action', '_nonce' ); ?>

		<input type="submit" value="<?php esc_attr_e( 'Filter', 'travel-escape' ); ?>">
	</form>
</div>

