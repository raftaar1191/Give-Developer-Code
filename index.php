<?php
/**
* Plugin Name: Give - Development Plugin
* Plugin URI: https://raftaar1191.com
* Description: The most robust, flexible, and intuitive way to accept donations on WordPress.
* Author: Raftaar1191
* Author URI: https://raftaar1191.com
* Version: 1.0.0
*/



/**
 * Moves the custom amount to the beginning of the dropdown.
 *
 * @param $output
 * @param $form_id
 */
function give_dropdown_donations_custom_amount_first( $output, $form_id ) {

	$prices             = apply_filters( 'give_form_variable_prices', give_get_variable_prices( $form_id ), $form_id );
	$display_style      = give_get_meta( $form_id, '_give_display_style', true );
	$custom_amount      = give_get_meta( $form_id, '_give_custom_amount', true );
	$custom_amount_text = give_get_meta( $form_id, '_give_custom_amount_text', true );
	if ( empty( $custom_amount_text ) ) {
		$custom_amount_text = esc_html__( 'Give a Custom Amount', 'give' );
	}

	if ( 'dropdown' === $display_style ) {

		$output = '<label for="give-donation-level-select-' . $form_id . '" class="give-hidden">' . esc_html__( 'Choose Your Donation Amount', 'give' ) . ':</label>';
		$output .= '<select id="give-donation-level-select-' . $form_id . '" class="give-select give-select-level give-donation-levels-wrap">';

		// Custom Amount.
		if ( give_is_setting_enabled( $custom_amount ) && ! empty( $custom_amount_text ) ) {
			$output .= '<option data-price-id="custom" class="give-donation-level-custom give-default-level" value="custom" selected>' . $custom_amount_text . '</option>';
		}

		//first loop through prices.
		foreach ( $prices as $price ) {
			$level_text    = apply_filters( 'give_form_level_text', ! empty( $price['_give_text'] ) ? $price['_give_text'] : give_currency_filter( give_format_amount( $price['_give_amount'], array( 'sanitize' => false ) ) ), $form_id, $price );
			$level_classes = apply_filters( 'give_form_level_classes', 'give-donation-level-' . $price['_give_id']['level_id'], $form_id, $price );

			$output .= '<option data-price-id="' . $price['_give_id']['level_id'] . '" class="' . $level_classes . '" value="' . give_format_amount( $price['_give_amount'], array( 'sanitize' => false ) ) . '">';
			$output .= $level_text;
			$output .= '</option>';
		}


		$output .= '</select>';


	}

	echo $output;

}


add_filter( 'give_form_level_output', 'give_dropdown_donations_custom_amount_first', 10, 2 );