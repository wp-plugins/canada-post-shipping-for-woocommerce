<?php
/**
* Plugin Name: Canada Post Shipping For WooCommerce By CanShip
* Description: Adds Canada Post shipping rates to WooCommerce 
* Version: 1.0.1
* Author: CanShip
*/

if ( ! defined( 'ABSPATH' ) ) { 
    exit; // Exit if accessed directly
}

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
    
	function canada_post_shipping_init() {
			if ( ! class_exists( 'Canada_Post_Shipping_For_WooCommerce_By_CanShip' ) ) {
				
				class Canada_Post_Shipping_For_WooCommerce_By_CanShip extends WC_Shipping_Method {
					
					 /**
					 * Constructor for your shipping class
					 *
					 * @access public
					 * @return void
					 */
					public function __construct() {
						$this->id                 = 'canada_post_shipping'; // Id for your shipping method. Should be uunique.
						$this->method_title       = __( 'Canada Post Shipping For WooCommerce' );  // Title shown in admin
						$this->method_description = __( 'This plugin lets you automatically calculate Canada Post shipping rates. <br /><br /> If you need help with the plugin the best place to get support is our website. <br /><br /><a href="http://www.canadianshippingcalculator.com/">Visit our website here for support</a>'); // Description shown in admin
						$this->title = 'Canada Post';

						$this->init();
					}
				
					/**
					 * Init your settings
					 *
					 * @access public
					 * @return void
					 */
					function init() {
						// Load the settings API
						$this->init_form_fields(); // This is part of the settings API. Override the method to add your own settings
						$this->init_settings(); // This is part of the settings API. Loads settings you previously init.

						// Save settings in admin if you have any defined
						add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
					}
					
					public function generate_settings_html() {
						
						parent::generate_settings_html();

						echo "<table class='wc_status_table widefat'>";
							echo "<thead>";
								echo "<tr>";
									echo "<th colspan=6><h3>Letter Mail Rates</h3></th>";
								echo "</tr>";
								echo "<tr>";
									echo "<th>";
										echo "Min Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Width";
									echo "</th>";
									echo "<th>";
										echo "Max Length";
									echo "</th>";
									echo "<th>";
										echo "Max Height";
									echo "</th>";
									echo "<th>";
										echo "Price";
									echo "</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tr>";
								echo "<td>";
									echo "0g";
								echo "</td>";
								echo "<td>";
									echo "30g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "156mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$1.00";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "31g";
								echo "</td>";
								echo "<td>";
									echo "50g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "156mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$1.20";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "51g";
								echo "</td>";
								echo "<td>";
									echo "100g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$1.80";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "101g";
								echo "</td>";
								echo "<td>";
									echo "200g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$2.95";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "201g";
								echo "</td>";
								echo "<td>";
									echo "300g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$4.10";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "301g";
								echo "</td>";
								echo "<td>";
									echo "400g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$4.70";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "401g";
								echo "</td>";
								echo "<td>";
									echo "500g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$5.05";
								echo "</td>";
							echo "</tr>";
						echo "</table>";
						
						echo "<br />";
						echo "<br />";
						
						echo "<table class='wc_status_table widefat'>";
							echo "<thead>";
								echo "<tr>";
									echo "<th colspan=6><h3>U.S.A Letter-Post Rates</h3></th>";
								echo "</tr>";
								echo "<tr>";
									echo "<th>";
										echo "Min Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Width";
									echo "</th>";
									echo "<th>";
										echo "Max Length";
									echo "</th>";
									echo "<th>";
										echo "Max Height";
									echo "</th>";
									echo "<th>";
										echo "Price";
									echo "</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tr>";
								echo "<td>";
									echo "0g";
								echo "</td>";
								echo "<td>";
									echo "30g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "150mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$1.20";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "31g";
								echo "</td>";
								echo "<td>";
									echo "50g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "150mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$1.60";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "51g";
								echo "</td>";
								echo "<td>";
									echo "100g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$2.95";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "101g";
								echo "</td>";
								echo "<td>";
									echo "200g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$5.15";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "201g";
								echo "</td>";
								echo "<td>";
									echo "500g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$10.30";
								echo "</td>";
							echo "</tr>";
						echo "</table>";
						
						echo "<br />";
						echo "<br />";				
						
						echo "<table class='wc_status_table widefat'>";
							echo "<thead>";
								echo "<tr>";
									echo "<th colspan=6><h3>International Letter-Post Rates</h3></th>";
								echo "</tr>";
								echo "<tr>";
									echo "<th>";
										echo "Min Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Weight";
									echo "</th>";
									echo "<th>";
										echo "Max Width";
									echo "</th>";
									echo "<th>";
										echo "Max Length";
									echo "</th>";
									echo "<th>";
										echo "Max Height";
									echo "</th>";
									echo "<th>";
										echo "Price";
									echo "</th>";
								echo "</tr>";
							echo "</thead>";
							echo "<tr>";
								echo "<td>";
									echo "0g";
								echo "</td>";
								echo "<td>";
									echo "30g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "150mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$2.50";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "31g";
								echo "</td>";
								echo "<td>";
									echo "50g";
								echo "</td>";
								echo "<td>";
									echo "245mm";
								echo "</td>";
								echo "<td>";
									echo "150mm";
								echo "</td>";
								echo "<td>";
									echo "5mm";
								echo "</td>";
								echo "<td>";
									echo "$3.60";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "51g";
								echo "</td>";
								echo "<td>";
									echo "100g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$5.90";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "101g";
								echo "</td>";
								echo "<td>";
									echo "200g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
										echo "270mm";
									echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$10.30";
								echo "</td>";
							echo "</tr>";
							echo "<tr>";
								echo "<td>";
									echo "201g";
								echo "</td>";
								echo "<td>";
									echo "500g";
								echo "</td>";
								echo "<td>";
									echo "380mm";
								echo "</td>";
								echo "<td>";
									echo "270mm";
								echo "</td>";
								echo "<td>";
									echo "20mm";
								echo "</td>";
								echo "<td>";
									echo "$20.60";
								echo "</td>";
							echo "</tr>";
						echo "</table>";
						
						echo "<br />";
						echo "<br />";
					}
					
					/**
					* init_form_fields function
					*/
					public function init_form_fields() {
						$this->form_fields = array(
								'enabled' => array(
									'title' => __('Enable/Disable', 'woocommerce'),
									'label' => __('Enable this shipping method', 'woocommerce'),
									'type' => 'checkbox')
							);
					}

					/**
					 * calculate_shipping function.
					 *
					 * @access public
					 * @param mixed $package
					 * @return void
					 */
					public function calculate_shipping( $package ) {
						
						$contents = array_values($package["contents"]);					
						$total = 0;
						$allow_shipping = true;
						
						for ($i = 0; $i < count($contents); $i++)
						{						
							if ($contents[$i]["data"]->has_weight()
								&& $contents[$i]["data"]->has_dimensions())
							{
								$amount = 0.00;
							
								// Get product dimensions
								$weight = $contents[$i]["data"]->get_weight();
								$width = $contents[$i]["data"]->width;
								$height = $contents[$i]["data"]->height;
								$length = $contents[$i]["data"]->length;
							
								// Organize package sizes
								$max = max($width, $height, $length);
								$min = min($width, $height, $length);
								$middle = $width + $height + $length - $max - $min;
					
								// Check to see if standard Canada Post can handle the package
								if ($weight > 0.5) {
									$allow_shipping = false;
								}
							
								if ($max > 38 || $max <= 0.0) {
									$allow_shipping = false;
								}
							
								if ($middle > 27 || $middle <= 0.0) {
									$allow_shipping = false;
								}
							
								if ($min > 2 || $min <= 0.0) {
									$allow_shipping = false;
								}
							
								// Calculate the shipping
								switch ($package["destination"]["country"]) {
									case 'CA':
										if ($weight <= 0.03 && $max <= 24.5 && $middle <= 15.6 && $min <= 0.5) {
											$amount = 1.00;
											break;
										}
										if ($weight <= 0.05 && $max <= 24.5 && $middle <= 15.6 && $min <= 0.5) {
											$amount = 1.20;
											break;
										}
										if ($weight <= 0.1 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 1.80;
											break;
										}
										if ($weight <= 0.2 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 2.95;
											break;
										}
										if ($weight <= 0.3 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 4.10;
											break;
										}
										if ($weight <= 0.4 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 4.70;
											break;
										}
										if ($weight <= 0.5 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 5.05;
											break;
										}
										break;
									case 'US':
										if ($weight <= 0.03 && $max <= 24.5 && $middle <= 15.0 && $min <= 0.5) {
											$amount = 1.20;
											break;
										}
										if ($weight <= 0.05 && $max <= 24.5 && $middle <= 15.0 && $min <= 0.5) {
											$amount = 1.60;
											break;
										}
										if ($weight <= 0.1 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 2.95;
											break;
										}
										if ($weight <= 0.2 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 5.15;
											break;
										}
										if ($weight <= 0.3 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 10.30;
											break;
										}
										break;
									default:
										if ($weight <= 0.03 && $max <= 24.5 && $middle <= 15.0 && $min <= 0.5) {
											$amount = 2.50;
											break;
										}
										if ($weight <= 0.05 && $max <= 24.5 && $middle <= 15.0 && $min <= 0.5) {
											$amount = 3.60;
											break;
										}
										if ($weight <= 0.1 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 5.90;
											break;
										}
										if ($weight <= 0.2 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 10.30;
											break;
										}
										if ($weight <= 0.3 && $max <= 38.0 && $middle <= 27.0 && $min <= 2.0) {
											$amount = 20.60;
											break;
										}
										break;
								}
							
								$total += $amount * $contents[$i]["quantity"];
							}
							else
							{
								$allow_shipping = false;
							}
						}
												
						// If it doesn't fit then don't add a shipping rate
						if ($allow_shipping) {
							$rate = array(
								'id' => $this->id,
								'label' => $this->title,
								'cost' => $total,
								'calc_tax' => 'per_item'
							);

							// Register the rate
							$this->add_rate( $rate );
						}
					}
				}
			}
		}

		add_action( 'woocommerce_shipping_init', 'canada_post_shipping_init' );

		function add_your_shipping_method( $methods ) {
			$methods[] = 'Canada_Post_Shipping_For_WooCommerce_By_CanShip';
			return $methods;
		}

		add_filter( 'woocommerce_shipping_methods', 'add_your_shipping_method' );

}