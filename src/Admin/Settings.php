<?php

namespace WooCommerceStoreTimer\Admin;

use WooCommerceStoreTimer\Lib;

defined( 'ABSPATH' ) || exit;

/**
 * Class Settings.
 *
 * @since   1.0.0
 * @package WooCommerceStoreTimer\Admin
 */
class Settings extends Lib\Settings {

	/**
	 * Get settings tabs.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_tabs() {
		$tabs = array(
			'general'         => __( 'General', 'wc-store-timer' ),
			'things'         => __( 'Things', 'wc-store-timer' ),
		);

		return apply_filters( 'wc_store_timer_settings_tabs', $tabs );
	}

	/**
	 * Get settings.
	 *
	 * @param string $tab Current tab.
	 *
	 * @since 1.0.0
	 * @return array
	 */
	public function get_settings( $tab ) {
		$settings = array();

		switch ( $tab ) {
			case 'general':
				$settings = array(
					[
						'title' => __( 'General settings', 'wc-store-timer' ),
						'type'  => 'title',
						'desc'  => __( 'The following options affect how the plugin will work.', 'wc-store-timer' ),
						'id'    => 'general_options',
					],
					[
						'title'    => __( 'Disable purchase for', 'wc-store-timer' ),
						'desc'     => __( 'Select an option to disable store purchase.', 'wc-store-timer' ),
						'desc_tip' => true,
						'id'       => 'wcst_disable_purchase',
						'type'     => 'select',
						'options'  => array(
							'all_products'        => __( 'All Products', 'wc-store-timer' ),
							'products'            => __( 'Products', 'wc-store-timer' ),
							'products_type'       => __( 'Product Type', 'wc-store-timer' ),
							'products_tags'       => __( 'Products Tags', 'wc-store-timer' ),
							'products_categories' => __( 'Products Categories', 'wc-store-timer' ),
						),
						'default'  => 'all_products',
					],
					[
						'title'             => __( 'Product', 'wc-store-timer' ),
						'desc'              => __( 'Select a product to disable store purchase.', 'wc-store-timer' ),
						'desc_tip'          => true,
						'id'                => 'wcst_disable_product_purchase',
						'type'              => 'select',
						'options'           => array(
							'default' => __( 'Search by Product', 'wc-store-timer' ),
						),
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase',
							'data-cond-value' => 'products',
						),
					],
					[
						'title'             => __( 'Product type', 'wc-store-timer' ),
						'desc'              => __( 'Select product types to disable store purchase.', 'wc-store-timer' ),
						'desc_tip'          => true,
						'id'                => 'wcst_disable_product_type_purchase',
						'type'              => 'select',
						'options'           => array(
							'simple_product'   => __( 'Simple Product', 'wc-store-timer' ),
							'grouped_product'  => __( 'Grouped Product', 'wc-store-timer' ),
							'external_or_affiliate_product' => __( 'External/Affiliate', 'wc-store-timer' ),
							'variable_product' => __( 'Variable Product', 'wc-store-timer' ),
						),
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase',
							'data-cond-value' => 'products_type',
						),
					],
					[
						'title'             => __( 'Product tags', 'wc-store-timer' ),
						'desc'              => __( 'Select product tags to disable store purchase.', 'wc-store-timer' ),
						'desc_tip'          => true,
						'id'                => 'wcst_disable_product_tags_purchase',
						'type'              => 'select',
						'options'           => array(
							'default' => __( 'Search by Product Tags', 'wc-store-timer' ),
						),
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase',
							'data-cond-value' => 'products_tags',
						),
					],
					[
						'title'             => __( 'Product categories', 'wc-store-timer' ),
						'desc'              => __( 'Select product categories to disable store purchase.', 'wc-store-timer' ),
						'desc_tip'          => true,
						'id'                => 'wcst_disable_product_cat_purchase',
						'type'              => 'select',
						'options'           => array(
							'default' => __( 'Search by Product Categories', 'wc-store-timer' ),
						),
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase',
							'data-cond-value' => 'products_categories',
						),
					],
					[
						'title'    => __( 'Time condition', 'wc-store-timer' ),
						'desc'     => __( 'Select a time range to disable store purchase.', 'wc-store-timer' ),
						'desc_tip' => true,
						'id'       => 'wcst_disable_purchase_time',
						'type'     => 'select',
						'options'  => array(
							'date'           => __( 'Date', 'wc-store-timer' ),
							'weekly'         => __( 'Weekly on ever [Saturday - Sunday] ', 'wc-store-timer' ),
							'monthly'        => __( 'Monthly on every [1-31', 'wc-store-timer' ),
							'month_of'       => __( 'On the month of [January - December]', 'wc-store-timer' ),
							'public_holiday' => __( 'Public Holidays [US - Canada]', 'wc-store-timer' ),
						),
						'default'  => 'date',
					],
					[
						'desc'              => __( 'Start date.', 'wc-store-timer' ),
						'id'                => 'wcst_disable_purchase_start_date',
						'type'              => 'date',
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase_time',
							'data-cond-value' => 'date',
						),
					],
					[
						'desc'              => __( 'End date.', 'wc-store-timer' ),
						'id'                => 'wcst_disable_purchase_end_date',
						'type'              => 'date',
						'default'           => 'default',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase_time',
							'data-cond-value' => 'date',
						),
					],
					[
						'desc'              => __( 'Select day or multiple days for every weeks.', 'wc-store-timer' ),
						'id'                => 'wcst_disable_purchase_weekly',
						'type'              => 'multiselect',
						'options'           => array(
							'saturday'  => __( 'Saturday', 'wc-store-timer' ),
							'sunday'    => __( 'Sunday', 'wc-store-timer' ),
							'monday'    => __( 'Monday', 'wc-store-timer' ),
							'tuesday'   => __( 'Tuesday', 'wc-store-timer' ),
							'wednesday' => __( 'Wednesday', 'wc-store-timer' ),
							'thursday'  => __( 'Thursday', 'wc-store-timer' ),
							'friday'    => __( 'Friday', 'wc-store-timer' ),
						),
						'default'           => 'date',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase_time',
							'data-cond-value' => 'weekly',
						),
					],
					[
						'desc'              => __( 'Select date or multiple dates for every months.', 'wc-store-timer' ),
						'id'                => 'wcst_disable_purchase_monthly',
						'type'              => 'multiselect',
						'options'           => array(
							'1' => __( '1', 'wc-store-timer' ),
							'2' => __( '2', 'wc-store-timer' ),
							'3' => __( '3', 'wc-store-timer' ),
							'4' => __( '4', 'wc-store-timer' ),
							'5' => __( '5', 'wc-store-timer' ),
						),
						'default'           => 'date',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase_time',
							'data-cond-value' => 'monthly',
						),
					],
					[
						'desc'              => __( 'Select month or multiple month for every year.', 'wc-store-timer' ),
						'id'                => 'wcst_disable_purchase_monthly',
						'type'              => 'multiselect',
						'options'           => array(
							'january'   => __( 'January', 'wc-store-timer' ),
							'february'  => __( 'February', 'wc-store-timer' ),
							'march'     => __( 'March', 'wc-store-timer' ),
							'april'     => __( 'April', 'wc-store-timer' ),
							'may'       => __( 'May', 'wc-store-timer' ),
							'june'      => __( 'June', 'wc-store-timer' ),
							'july'      => __( 'July', 'wc-store-timer' ),
							'august'    => __( 'August', 'wc-store-timer' ),
							'september' => __( 'September', 'wc-store-timer' ),
							'october'   => __( 'October', 'wc-store-timer' ),
							'november'  => __( 'November', 'wc-store-timer' ),
							'december'  => __( 'December', 'wc-store-timer' ),
						),
						'default'           => 'date',
						'custom_attributes' => array(
							'data-cond-id'    => 'wcst_disable_purchase_time',
							'data-cond-value' => 'month_of',
						),
					],
					[
						'title'    => __( 'Notice text', 'wc-store-timer' ),
						'desc'     => __( 'Write a short notice.', 'wc-store-timer' ),
						'desc_tip' => true,
						'id'       => 'wcst_notice_text',
						'type'     => 'textarea',
					],
					[
						'type' => 'sectionend',
						'id'   => 'general_options',
					],
				);
				break;
		}

		return apply_filters( 'wc_store_timer_get_settings_' . $tab, $settings );
	}

	/**
	 * Output settings form.
	 *
	 * @param array $settings Settings.
	 *
	 * @return void
	 * @since 1.0.0
	 */
	protected function output_form( $settings ) {
		$current_tab = $this->get_current_tab();
		/**
		 * Action hook to output settings form.
		 *
		 * @since 1.0.0
		 */
		do_action( 'wc_store_timer_settings_' . $current_tab );
		parent::output_form( $settings );
	}

	/**
	 * Output tabs.
	 *
	 * @param array $tabs Tabs.
	 *
	 * @since 1.0.0
	 * @return void
	 */
	public function output_tabs( $tabs ) {
		parent::output_tabs( $tabs );
		if ( wc_store_timer()->get_docs_url() ) {
			echo sprintf( '<a href="%s" class="nav-tab" target="_blank">%s</a>', esc_url( wc_store_timer()->get_docs_url() ), esc_html__( 'Documentation', 'wc-store-timer' ) );
		}
	}
}
