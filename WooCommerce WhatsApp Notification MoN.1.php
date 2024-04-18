الاضفه الجديده مرجعه جميع الاكواد

ملف  وحد مرجعه







<?php
/**
 * Plugin Name: WooCommerce WhatsApp Notification MoN.1
 * Description: يرسل تفاصيل العميل والمنتجات إلى واتساب.
 * Version: 1.0.1.2
 * Author: Mostafa Nabil
 */

 
if (!defined('ABSPATH')) {
    exit;
}

define('OMW_PLUGIN_PATH', plugin_dir_path(__FILE__));
define('OMW_PLUGN_URL', plugin_dir_url(__FILE__));
define('OMW_VERSION', '2.3.3');
define('OMW_PHP_MINIMUM_VERSION', '7.0');
define('OMW_WP_MINIMUM_VERSION', '5.5');

/**
 * Check PHP and WP version before including plugin class
 */
if (!version_compare(PHP_VERSION, OMW_PHP_MINIMUM_VERSION, '>=')) {
    add_action('admin_notices', 'omw_admin_notice_php_version_fail');
} elseif (!version_compare(get_bloginfo('version'), OMW_WP_MINIMUM_VERSION, '>=')) {
    add_action('admin_notices', 'omw_admin_notice_wp_version_fail');
} else {
    include_once OMW_PLUGIN_PATH . 'includes/class-omw-plugin.php';
    OMW_Plugin::instance();
}

/**
 * Admin notice PHP version fail
 *
 * @since 1.6
 * @return void
 */
function omw_admin_notice_php_version_fail()
{
    $message = sprintf(
        esc_html__('This plugin requires PHP version %2$s or greater.', 'woo-order-on-whatsapp'),
        OMW_PHP_MINIMUM_VERSION
    );

    $html_message = sprintf('<div class="notice notice-error"><p>%1$s</p></div>', $message);
    echo wp_kses_post($html_message);
}

/**
 * Admin notice WP version fail
 *
 * @since 1.6
 * @return void
 */
function omw_admin_notice_wp_version_fail()
{
    $message = sprintf(
        esc_html__('This plugin requires WordPress version %2$s or greater.', 'woo-order-on-whatsapp'),
        OMW_WP_MINIMUM_VERSION
    );

    $html_message = sprintf('<div class="notice notice-error"><p>%1$s</p></div>', $message);
    echo wp_kses_post($html_message);
}





/**
*style.css الملف الثاني
*/

@charset "UTF-8";

.div_evowap_btn {
    margin: 20px 0px;
}

.div_evowap_btn .evowap_btn {
    padding: 12px 30px;
    background: #25d366;
    border-radius: 5px;
    color: #ffffff;
    font-size: 16px;
    position: relative;
    display: inline-flex;
    width: auto;
    transition: all .3s !important;
    align-items: center;
    box-shadow: 0 2px 2px 0px rgba(45, 62, 79, .3) !important;
}

.evowap_btn:hover {
    color: #ffffff !important;
    background: #21bd5b;
    transform: translateY(-3px);
    box-shadow: 0 8px 25px -5px rgba(45, 62, 79, .3) !important;
}

#svg_wapp_evowap {
    margin-right: 10px !important;
}

.wowa-thankyou {
    text-align: center;
    background: #efefef;
    padding: 30px;
    margin-bottom: 20px;
}

.wowa-thankyou h2 {
    font-size: 35px;
    font-family: inherit;
    margin-bottom: 5px;
}

.wowa-thankyou h3 {
    font-size: 18px;
    font-family: inherit;
    font-weight: 400;
}


/**
*admin-style.css الملف الثالث
*
*/


.myd-tabs-content {
    display: none;
}

.myd-tabs-content--active {
    display: block;
}

.owm-pro-tag {
    background: red;
    border-radius: 4px;
    padding: 2px 5px;
    color: #fff;
    font-size: 12px;
}


/**
* الملف الربع 
*admin-  settings  .js
*/

function mydChangeTab(e) {
	e.preventDefault();
	let tabs = document.querySelectorAll('.myd-tab'),
		tabContent = document.querySelectorAll('.myd-tabs-content'),
		clicked = e.target;

	tabs.forEach(item => {
		item.classList.remove('nav-tab-active');
	});
	tabContent.forEach(item => {
		item.classList.remove('myd-tabs-content--active');
	});
	clicked.classList.add('nav-tab-active');
	document.getElementById(clicked.id + '-content').classList.add('myd-tabs-content--active');
}

// Enable/disable hiding prices and buttons
function togglePriceAndButtons(isEnabled) {
	let prices = document.querySelectorAll('.product-price'),
		buttons = document.querySelectorAll('.add-to-cart-button');

	if (isEnabled) {
		prices.forEach(item => {
			item.style.display = 'block';
		});
		buttons.forEach(item => {
			item.innerText = 'Add to Cart';
		});
	} else {
		prices.forEach(item => {
			item.style.display = 'none';
		});
		buttons.forEach(item => {
			item.innerText = 'WhatsApp Icon';
		});
	}
}

// Customize checkout button
function customizeCheckoutButton(text, color) {
	let checkoutButton = document.querySelector('.checkout-button');

	checkoutButton.innerText = text;
	checkoutButton.style.backgroundColor = color;
}

// Add custom fields in checkout page

// Customize notification messages and send to WhatsApp

// Security and protection settings

// Add control options in WordPress admin panel

document.addEventListener('DOMContentLoaded', function () {
	let toggleSwitch = document.getElementById('toggle-switch');
	toggleSwitch.addEventListener('change', function () {
		let isEnabled = this.checked;
		togglePriceAndButtons(isEnabled);
	});

	let customText = 'Send to WhatsApp';
	let customColor = '#00ff00'; // Green color

	customizeCheckoutButton(customText, customColor);
});



/**
* الملف الخامس
*front  -js.js
*/


jQuery(document).ready(function ($) {
	"use strict";

	// Enable/disable hiding prices and buttons
	function togglePriceAndButtons(isEnabled) {
		if (isEnabled) {
			$('.product-price').css('display', 'block');
			$('.add-to-cart-button').text('Add to Cart');
		} else {
			$('.product-price').css('display', 'none');
			$('.add-to-cart-button').text('WhatsApp Icon');
		}
	}

	// Customize checkout button
	function customizeCheckoutButton(text, color) {
		$('.checkout-button').text(text).css('background-color', color);
	}

	// Show product images on checkout page
	function showProductImagesOnCheckout() {
		$('.checkout-product-image').css('display', 'block');
	}

	// Change complete order button text to "Send to WhatsApp"
	function changeCompleteOrderButtonText(text) {
		$('.checkout-button').text(text);
	}

	// Change complete order button color to green
	function changeCompleteOrderButtonColor(color) {
		$('.checkout-button').css('background-color', color);
	}

	// Customize checkout page fields
	function customizeCheckoutFields() {
		// Add custom fields and modify existing fields
	}

	// Customize notification messages and send to WhatsApp

	// Security and protection settings

	// Add control options in WordPress admin panel

	// Implementing functionalities
	let toggleSwitch = document.getElementById('toggle-switch');
	toggleSwitch.addEventListener('change', function () {
		let isEnabled = this.checked;
		togglePriceAndButtons(isEnabled);
	});

	let customText = 'Send to WhatsApp';
	let customColor = '#00ff00'; // Green color

	customizeCheckoutButton(customText, customColor);
	showProductImagesOnCheckout();
	changeCompleteOrderButtonText(customText);
	changeCompleteOrderButtonColor(customColor);
	customizeCheckoutFields();
});





/**
* الملف السادس
*includes
*     abstract-class-button.php
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Abstract class for extending other button categories
 */
abstract class OMW_Button {
	/**
	 * SVG Icon
	 *
	 * @var string
	 * @since 2.8
	 */
	public $icon = '<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="svg_wapp_evowap" x="0px" y="0px" width="25px" height="25px" viewBox="0 0 90 90" style="enable-background:new 0 0 90 90;" xml:space="preserve"><path id="WhatsApp" d="M90,43.841c0,24.213-19.779,43.841-44.182,43.841c-7.747,0-15.025-1.98-21.357-5.455L0,90l7.975-23.522 c-4.023-6.606-6.34-14.354-6.34-22.637C1.635,19.628,21.416,0,45.818,0C70.223,0,90,19.628,90,43.841z M45.818,6.982 c-20.484,0-37.146,16.535-37.146,36.859c0,8.065,2.629,15.534,7.076,21.61L11.107,79.14l14.275-4.537 c5.865,3.851,12.891,6.097,20.437,6.097c20.481,0,37.146-16.533,37.146-36.857S66.301,6.982,45.818,6.982z M68.129,53.938 c-0.273-0.447-0.994-0.717-2.076-1.254c-1.084-0.537-6.41-3.138-7.4-3.495c-0.993-0.358-1.717-0.538-2.438,0.537 c-0.721,1.076-2.797,3.495-3.43,4.212c-0.632,0.719-1.263,0.809-2.347,0.271c-1.082-0.537-4.571-1.673-8.708-5.333 c-3.219-2.848-5.393-6.364-6.025-7.441c-0.631-1.075-0.066-1.656,0.475-2.191c0.488-0.482,1.084-1.255,1.625-1.882 c0.543-0.628,0.723-1.075,1.082-1.793c0.363-0.717,0.182-1.344-0.09-1.883c-0.27-0.537-2.438-5.825-3.34-7.977 c-0.902-2.15-1.803-1.792-2.436-1.792c-0.631,0-1.354-0.09-2.076-0.09c-0.722,0-1.896,0.269-2.889,1.344 c-0.992,1.076-3.789,3.676-3.789,8.963c0,5.288,3.879,10.397,4.422,11.113c0.541,0.716,7.49,11.92,18.5,16.223 C58.2,65.771,58.2,64.336,60.186,64.156c1.984-0.179,6.406-2.599,7.312-5.107C68.398,56.537,68.398,54.386,68.129,53.938z" fill="#FFFFFF"/></svg>';

	/**
	 * Button Text
	 *
	 * @since 2.8
	 */
	public $button_text;

	/**
	 * Target Option
	 *
	 * @since 2.8
	 */
	public $target;

	/**
	 * Custom Message for sending on WhatsApp
	 *
	 * @since 2.8
	 */
	public $button_custom_message;

	/**
	 * Method to output the button
	 *
	 * @since 2.8
	 * @return void
	 */
	abstract protected function output_btn();

	/**
	 * Create shared text
	 *
	 * @since 2.8
	 */
	abstract protected function create_shared_text();
	/**
	 * Create WhatsApp link
	 *
	 * @since 2.8
	 */
	public function create_whatsapp_link( $shared_text ) {
		return sprintf(
			'https://wa.me/%1$s?text=%2$s',
			OMW_Plugin::instance()->phone_number,
			urlencode( html_entity_decode ( $shared_text, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) )
		);
	}

	/**
	 * Create HTML button
	 *
	 * @since 2.8
	 */
	public function create_button( $link, $target, $button_text ) {
		?>
		<div class="div_evowap_btn">
			<?php if ( is_singular( 'product' ) && wc_get_product()->is_type( 'variable' ) ) : ?>
				<form id="woapp-fields">
					<input type="hidden" id="woapp_number" value="'.$phone.'"></input>
					<input type="hidden" id="woapp_message" value="'.$encode_message.'"></input>
					<input type="hidden" id="woapp_name" value="'.$this->evowap_get_product_name().'"></input>
					<input type="hidden" id="woapp_reg_price" value="'.$this->evowap_get_product_price().'"></input>
					<input type="hidden" id="woapp_link" value="'.$this->evowap_get_product_link().'"></input>
				</form>
			<?php endif; ?>

			<?php printf(
				'<a href="%1$s" class="evowap_btn" id="evowap_btn" role="button" target="%2$s">%3$s%4$s</a>',
				esc_attr( $link ),
				esc_attr( $target ),
				$this->icon,
				esc_html( $button_text )
			); ?>
		</div>
		<?php
	}

	/**
	 * Formatted price with currency
	 *
	 * @param object $product
	 * @since 2.8
	 */
	public function get_formmated_price( $product ) {
		$price = wc_get_price_including_tax( $product );
		return OMW_Utils::format_price( $price );
	}
}




/**
* الملف السابع
*includes
*     class- Flying car button on the home page.php
*/



<?php
// Display the icon and link it to the cart page
add_action('wp_footer', 'add_floating_cart_icon');
function add_floating_cart_icon() {
    ?>
    <style>
        .floating-cart-icon {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 999;
            transition: transform 0.3s ease-in-out;
        }
        .floating-cart-icon:hover {
            transform: scale(1.1);
        }
    </style>
    <div class="floating-cart-icon">
        <a href="<?php echo wc_get_cart_url(); ?>" class="cart-link">
            <img src="<?php echo get_template_directory_uri(); ?>/images/cart-icon.svg" alt="Shopping Cart">
        </a>
    </div>
    <?php
}

// Add settings options
add_action('admin_init', 'add_floating_cart_settings');
function add_floating_cart_settings() {
    add_settings_section('floating_cart_settings', 'Floating Cart Icon Settings', 'floating_cart_settings_callback', 'general');
    add_settings_field('enable_floating_cart', 'Enable Floating Cart Icon', 'enable_floating_cart_callback', 'general', 'floating_cart_settings');
    register_setting('general', 'enable_floating_cart');
}

function floating_cart_settings_callback() {
    echo '<p>Here you can enable or disable the floating cart icon.</p>';
}

function enable_floating_cart_callback() {
    $checked = get_option('enable_floating_cart') ? 'checked' : '';
    echo '<input type="checkbox" id="enable_floating_cart" name="enable_floating_cart" value="1" ' . $checked . '>';
}




/**
* الملف الثامن
*includes
*     class- admin .php
*/


<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class to handle administrative options.
 *
 * @since 2.8
 */
class OMW_Admin {
    /**
     * Option group for settings.
     *
     * @since 2.8
     */
    public $option_group;

    /**
     * Plugin name.
     *
     * @since 2.8
     */
    public $plugin_name;

    /**
     * Options page slug.
     *
     * @since 2.8
     */
    public $page_options_slug;

    /**
     * Page title.
     *
     * @since 2.0
     */
    public $page_title;

    /**
     * Settings array.
     *
     * @since 2.8
     */
    public $settings = [];

    /**
     * Page templates array.
     *
     * @since 2.0
     */
    public $templates = [];

    /**
     * Class constructor.
     *
     * @since 2.8
     */
    public function __construct() {

        $this->option_group = 'evwapp-settings-group';
        $this->plugin_name = 'Order Mobile for WooCommerce'; // Your plugin name
        $this->page_title = 'Order on Mobile for WooCommerce Options'; // Options page title
        $this->page_options_slug = 'order-on-mobile-for-woocommerce-config';
        $this->settings = [
            // You can add more settings here
        ];

        $this->templates = [
            // Customize template paths here
        ];
    }

    /**
     * Add admin page for settings.
     *
     * @since 2.8
     * @return void
     */
    public function add_admin_page() {

        add_menu_page(
            apply_filters( 'omw_admin_page_title', $this->page_title ),
            apply_filters( 'omw_admin_page_name', $this->plugin_name ),
            'manage_options',
            apply_filters( 'omw_admin_page_slug', $this->page_options_slug ),
            [ $this, 'create_admin_page' ],
            OMW_PLUGN_URL . 'assets/img/whatsapp.png',
            56
        );
    }

    /**
     * Register settings.
     *
     * @since 2.8
     * @return void
     */
    public function register_settings() {

        /**
         * Action to implement more admin settings.
         */
        $settings = apply_filters( 'omw_before_register_admin_settings', $this->settings );

        foreach( $settings as $setting_name => $data ) {

            register_setting(
                $data['option_group'],
                $setting_name,
                $data['args']
            );
        }
    }

    /**
     * Create admin settings page.
     *
     * @since 2.8
     * @return void
     */
    public function create_admin_page() {

        /**
         * Action to edit/extend admin page templates.
         */
        $templates = apply_filters( 'omw_after_output_templates', $this->templates );

        include_once OMW_PLUGIN_PATH . 'templates/admin/tab-header.php';
        foreach( $templates as $template ) {
            include_once $template;
        }
        include_once OMW_PLUGIN_PATH . 'templates/admin/tab-footer.php';
    }
}



/**
* الملف التاسع
*includes
*     class- button-product-page .php
*/


<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class to add button in single product page
 *
 * @since 2.8
 */
class OMW_Button_Product_Page extends OMW_Button {
	/**
	 * Product object
	 *
	 * @since 2.8
	 */
	public $product;

	/**
	 * Hide price option
	 *
	 * @since 2.8
	 */
	public $hide_price;

	/**
	 * Hide add to cart button
	 *
	 * @since 2.8
	 */
	public $hide_add_to_cart_button;

	/**
	 * Hide plugin button on mobile
	 *
	 * @since 2.8
	 */
	public $hide_whatsapp_button_on_mobile;

	/**
	 * Construct the class
	 *
	 * @since 2.8
	 */
	public function __construct() {

		$this->hide_price = get_option( 'evwapp_opiton_remove_price' );
		$this->hide_add_to_cart_button = get_option( 'evwapp_opiton_remove_cart_btn' );
		$this->hide_whatsapp_button_on_mobile = get_option( 'evwapp_opiton_remove_btn' );
		$this->button_custom_message = get_option( 'evwapp_opiton_message' );
		$this->button_text = get_option( 'evwapp_opiton_text_button' );
		$this->target = get_option( 'evwapp_opiton_target' );
	}

	/**
	 * Output button
	 *
	 * @since 2.8
	 * @return void
	 */
	public function output_btn() {

		if ( is_singular( 'product' ) ) {

			$this->product = wc_get_product();
			$shared_text = $this->create_shared_text();
			$whatsapp_link = $this->create_whatsapp_link( $shared_text );

			return $this->create_button( $whatsapp_link, $this->target, $this->button_text );

		} else {

			return esc_html_e( 'Sorry, it\'s not a product page. Please use this shortcode only on your product page.', 'woo-order-on-whatsapp' );
		}
	}

	/**
	 * Create shared text
	 *
	 * @since 2.8
	 */
	public function create_shared_text() {

		$product = $this->product;

		return sprintf(
			'%1$s%2$s%3$s%4$s%5$s%6$s%7$s',
			$this->button_custom_message,
			OMW_Utils::$doble_break_line,
			$product->get_name(),
			OMW_Utils::$break_line,
			$this->get_formmated_price( $product ),
			OMW_Utils::$break_line,
			$product->get_permalink()
		);
	}

	/**
	 * Hide WooCommerce product page elements
	 *
	 * @since 2.8
	 * @return void
	 */
	public function hide_woo_elements() {

		if ( is_singular( 'product' ) ) {

			if ( $this->hide_price === 'yes' ) {
				?>
				<style>.product .price {display: none !important;}</style>
				<?php
			}

			if ( $this->hide_add_to_cart_button === 'yes' ) {
				?>
				<style>.product .cart {display: none !important;}</style>
				<?php
			}

			if ( $this->hide_whatsapp_button_on_mobile === 'yes' ) {
				?>
				<style>@media screen and (min-width: 768px) {.div_evowap_btn {display: none !important;}}</style>
				<?php
			}
		}
	}
}



/**
* الملف العاشر
*includes
*     class-Edit the Checkout page.php
*/


<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Class to edit checkout fields in WooCommerce
 *
 * @since 2.8
 */
class OMW_Edit_Checkout_Page extends OMW_Admin {
	/**
	 * Construct the class
	 *
	 * @since 2.8
	 */
	public function __construct() {
		parent::__construct();
	}

	/**
	 * Add custom fields to checkout page
	 *
	 * @since 2.8
	 */
	public function add_custom_checkout_fields( $fields ) {

		$fields['billing']['billing_first_name']['label'] = __( 'First Name', 'woo-order-on-whatsapp' );
		$fields['billing']['billing_last_name']['label'] = __( 'Last Name', 'woo-order-on-whatsapp' );
		$fields['billing']['billing_company']['label'] = __( 'Company', 'woo-order-on-whatsapp' );
		$fields['billing']['billing_address_1']['label'] = __( 'Address', 'woo-order-on-whatsapp' );
		$fields['billing']['billing_phone']['label'] = __( 'Phone', 'woo-order-on-whatsapp' );
		$fields['billing']['billing_email']['label'] = __( 'Email', 'woo-order-on-whatsapp' );

		return $fields;
	}

	/**
	 * Make custom checkout fields required or optional
	 *
	 * @since 2.8
	 */
	public function make_checkout_fields_required_optional( $fields ) {

		$fields['billing']['billing_first_name']['required'] = true;
		$fields['billing']['billing_last_name']['required'] = true;
		$fields['billing']['billing_company']['required'] = false; // Set to true if needed
		$fields['billing']['billing_address_1']['required'] = true;
		$fields['billing']['billing_phone']['required'] = true;
		$fields['billing']['billing_email']['required'] = true;

		return $fields;
	}

	/**
	 * Initialize the class
	 *
	 * @since 2.8
	 */
	public function init() {
		add_filter( 'woocommerce_checkout_fields', array( $this, 'add_custom_checkout_fields' ) );
		add_filter( 'woocommerce_checkout_fields', array( $this, 'make_checkout_fields_required_optional' ) );
	}
}

$omw_edit_checkout_page = new OMW_Edit_Checkout_Page();
$omw_edit_checkout_page->init();




/**
* الملف الحادي عشر
*includes
*     class- omw-plugin .php
*/




<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * OMW plugin main class
 *
 * Class to initialize the plugin.
 *
 * @since 2.8
 */
final class OMW_Plugin {
    /**
     * Instance
     *
     * @since 2.2
     *
     * @access private
     * @static
     *
     * @var OMW_Init The single instance of the class.
     */
    private static $_instance = null;

    /**
     * Button in product page option
     *
     * @since 2.8
     * @var string
     */
    public $button_in_product_page;

    /**
     * Button in cart page option
     *
     * @since 2.8
     * @var string
     */
    public $button_in_cart_page;

    /**
     * Phone option
     *
     * @since 2.8
     * @var int
     */
    public $phone_number;

    /**
     * Instance
     *
     * Ensures only one instance of the class is loaded or can be loaded.
     *
     * @since 2.2
     *
     * @access public
     * @static
     *
     * @return OMW_Init An instance of the class.
     */
    public static function instance() {

        if (is_null(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /**
     * Constructor
     *
     * Private method for preventing instance outside the class.
     *
     * @since 2.2
     *
     * @access private
     */
    private function __construct() {

        $this->button_in_product_page = get_option('evwapp_opiton_show_btn_single');
        $this->button_in_cart_page = get_option('evwapp_opiton_show_cart');
        $this->phone_number = get_option('evwapp_opiton_phone_number');

        /**
         * Do action for pro version check loaded
         *
         * @since 2.0
         */
        do_action('omw_plugin_loaded');

        // Init plugin
        add_action('plugins_loaded', [$this, 'init']);
    }

    /**
     * Initialize the plugin
     *
     * Load the plugin and all classes after WooCommerce and other plugins are loaded.
     *
     * @since 2.2
     *
     * @access public
     */
    public function init() {

        /**
         * Check if WooCommerce is activated
         */
        if (!$this->plugin_is_active('woocommerce/woocommerce.php')) {

            add_action('admin_notcies', [$this, 'notice_woo_inactived']);
            return;
        }

        /**
         * Do action for init other extensions
         *
         * @since 2.0
         */
        do_action('omw_plugin_init');

        /**
         * Include initial required files
         */
        include_once OMW_PLUGIN_PATH . 'includes/class-utils.php';
        include_once OMW_PLUGIN_PATH . 'includes/abstract-class-button.php';

        /**
         * Include admin class
         */
        if (is_admin()) {

            include_once OMW_PLUGIN_PATH . 'includes/class-admin.php';

            $admin = new OMW_Admin;
            add_action('admin_init', [$admin, 'register_settings']);
            add_action('admin_menu', [$admin, 'add_admin_page']);
        }

        /**
         * Check option and include product page btn class
         */
        if ($this->button_in_product_page === 'yes') {

            include_once OMW_PLUGIN_PATH . 'includes/class-button-product-page.php';

            $button_product_page = new OMW_Button_Product_Page;
            add_action('wp_head', [$button_product_page, 'hide_woo_elements']);
            add_action('woocommerce_after_add_to_cart_form', [$button_product_page, 'output_btn']);
            add_shortcode('woo-order-on-whatsapp', [$button_product_page, 'output_btn']);
        }

        /**
         * Check option and include cart page btn class
         */
        if ($this->button_in_cart_page === 'yes') {

            include_once OMW_PLUGIN_PATH . 'includes/class-button-cart.php';

            $button_cart = new OMW_Button_Cart;
            add_action('woocommerce_after_cart_table', [$button_cart, 'output_btn']);
        }

        /**
         * Enqueue styles and scripts
         */
        add_action('wp_enqueue_scripts', [$this, 'enqueue_plugin_css']);
        add_action('wp_enqueue_scripts', [$this, 'enqueue_plugin_js']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_plugin_css']);
        add_action('admin_enqueue_scripts', [$this, 'enqueue_admin_plugin_js']);
    }

    /**
     * Admin notice - WooCommerce
     *
     * Warning when the site doesn't have WooCommerce activated.
     *
     * @since 2.2
     *
     * @access public
     */
    public function notice_woo_inactived() {

        $message = sprintf(
            esc_html__('%1$s requires WooCommerce to be installed and activated.', 'woo-order-on-whatsapp'),
            '<strong>Order on WhatsApp for WooCommerce</strong>'
        );

        $html_message = sprintf('<div class="notice notice-error"><p>%1$s</p></div>', $message);

        echo wp_kses_post($html_message);
    }

    /**
     * Enqueue CSS
     *
     * Register and enqueue CSS.
     *
     * @since 2.2
     *
     * @access public
     */
    public function enqueue_plugin_css() {

        wp_enqueue_style('omw_style', OMW_PLUGN_URL . '/assets/css/style.css', array(), OMW_VERSION);
    }

    /**
     * Enqueue JS
     *
     * Register and enqueue JS.
     *
     * @since 2.2
     *
     * @access public
     */
    public function enqueue_plugin_js() {

        wp_enqueue_script('omw_script', OMW_PLUGN_URL . '/assets/js/front-js.js', array('jquery'), OMW_VERSION, true);
    }

    /**
     * Enqueue ADMIN CSS
     *
     * Register and enqueue CSS.
     *
     * @since 2.2
     *
     * @access public
     */
    public function enqueue_admin_plugin_css() {

        wp_enqueue_style('omw_admin_style', OMW_PLUGN_URL . '/assets/css/admin/admin-style.css', array(), OMW_VERSION);
    }

    /**
     * Enqueue ADMIN JS
     *
     * Register and enqueue JS.
     *
     * @since 2.2
     *
     * @access public
     */
    public function enqueue_admin_plugin_js() {

        wp_enqueue_script('omw_admin_script', OMW_PLUGN_URL . '/assets/js/admin/admin-settings.js', [], OMW_VERSION, true);
    }

    /**
     * Check plugin is activated
     *
     * @since 2.8
     * @return boolean
     * @param string $plugin
     */
    public function plugin_is_active($plugin) {

        return function_exists('is_plugin_active') ? is_plugin_active($plugin) : in_array($plugin, (array)get_option('active_plugins', array()), true);
    }
}




/**
* الملف الثاني عشر
*includes
*     class- utils  .php
*/



<?php

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Class with static methods to help and format the plugins/functions.
 *
 * @since 2.8
 */
class OMW_Utils {
    /**
     * Simple break line.
     *
     * @var string
     */
    public static $break_line = PHP_EOL;

    /**
     * Double break line.
     *
     * @var string
     */
    public static $double_break_line = PHP_EOL . PHP_EOL;

    /**
     * Format phone like WooCommerce settings.
     *
     * @param mixed $price The price to format.
     * @return string Formatted price.
     * @since 2.8
     */
    public static function format_price($price) {
        if (empty($price)) {
            return '';
        }

        $currency = get_woocommerce_currency_symbol();
        $thousand_separator = get_option('woocommerce_price_thousand_sep');
        $decimal_separator = get_option('woocommerce_price_decimal_sep');
        $number_of_decimals = get_option('woocommerce_price_num_decimals');

        return $currency . ' ' . number_format($price, $number_of_decimals, $thousand_separator, $decimal_separator);
    }

    /**
     * Tag for pro version.
     *
     * @return string Pro version tag.
     * @since 2.0
     */
    public static function get_pro_tag() {
        return '<span class="owm-pro-tag">' . esc_html__('Only on Pro', 'woo-order-on-whatsapp') . '</span>';
    }
}






/**
* الملف الثالث عشر
*templates
*     tab- advanced .php
*/



<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="tab-advanced-content" class="myd-tabs-content">
    
    <h2><?php esc_html_e( 'Advanced Settings', 'woo-order-on-whatsapp' );?></h2>
    <p><?php esc_html_e( 'In this section you can edit some advanced options.', 'woo-order-on-whatsapp' );?></p>
            
    <table class="form-table">
        <tbody>
            <tr class="evwapp_trackingcode">
                <th scope="row">
                    <label for="wow_tracking_code"><b>Change</b></label>
                </th>
                <td>
                    <input type="text" name="evwapp_tracking_code" class="evwapp_input" value="<?php echo get_option('evwapp_tracking_code'); ?>">
                    <p class="wow_desc">Enter your tracking code here.</p>
                </td>
            </tr>
        </tbody>
    </table>

</div>



/**
* الملف الرابع عشر
*templates
*     tab- cart .php
*/


<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="tab-cart-content" class="myd-tabs-content">
    
    <h2><?php esc_html_e( 'Cart Page', 'woo-order-on-whatsapp' );?></h2>
    <p><?php esc_html_e( 'In this section you can edit some options for the button on the cart page.', 'woo-order-on-whatsapp' );?></p>
        
    <table class="form-table">
        <tbody>
            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_message_cart"><?php esc_html_e( 'Your custom message', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                    <textarea name="evwapp_opiton_message_cart" id="evwapp_opiton_message_cart" class="large-text" rows="5"><?php echo get_option( 'evwapp_opiton_message_cart' );?></textarea>
                </td>
            </tr>
            
            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_text_button_cart"><?php esc_html_e( 'Button text', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                   <input type="text" name="evwapp_opiton_text_button_cart" id="evwapp_opiton_text_button_cart" class="regular-text" value="<?php echo get_option('evwapp_opiton_text_button_cart'); ?>">
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_cart_button_target"><?php esc_html_e( 'Open in new tab?', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                    <input type="checkbox" name="evwapp_opiton_cart_button_target" id="evwapp_opiton_cart_button_target" value="_blank" <?php checked( get_option('evwapp_opiton_cart_button_target'), '_blank' );?>><?php esc_html_e( 'Yes, open in a new tab.', 'woo-order-on-whatsapp' );?><br>
                </td>
            </tr>
        </tbody>
    </table>
</div>





/**
* الملف الخمس عشر
*templates
*     tab- checkout .php 
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="tab-checkout-content" class="myd-tabs-content">

    <h2><?php esc_html_e( 'Checkout', 'woo-order-on-whatsapp' );?></h2>
    <p><?php esc_html_e( 'In this section, you can edit your message used in the redirect after checkout.', 'woo-order-on-whatsapp' );?></p>
    
    <div class="card">
        <h3><?php esc_html_e( 'How to use?', 'woo-order-on-whatsapp' );?></h3>
        <p>2 - <?php esc_html_e( 'Define the template for the products loop in "Template for Products Loop" for use in your custom message.', 'woo-order-on-whatsapp' );?></p>
        <p>2 - <?php esc_html_e( 'Create a full custom message in "Custom Order Message" for use when the customer is redirected to WhatsApp after checkout.', 'woo-order-on-whatsapp' );?></p>
    </div>

    <h3><?php esc_html_e( 'Template for Products Loop', 'woo-order-on-whatsapp' );?> <?php OMW_Utils::get_pro_tag(); ?></h3>
    <p class="description"><?php esc_html_e( 'Available tokens for the product loop.', 'woo-order-on-whatsapp' );?></p>

    <ul>
        <li><code>{product-name}</code> - <?php esc_html_e( 'Product Name', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{product-price}</code> - <?php esc_html_e( 'Product Price', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{product-qty}</code> - <?php esc_html_e( 'Product Quantity', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{product-sku}</code> - <?php esc_html_e( 'Product Sku', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{product-attributes}</code> - <?php esc_html_e( 'Product Attributes', 'woo-order-on-whatsapp' );?>.</li>
    </ul>

    <textarea name="evwapp_opiton_product_order_message" class="large-text" disabled rows="6"><?php echo get_option( 'evwapp_opiton_product_order_message' );?></textarea>

    <div class="card">
        <h3><?php esc_html_e( 'Important:', 'woo-order-on-whatsapp' );?></h3>
        <p><?php esc_html_e( '"Template for Products Loop" is a loop, so you must use each token once. The plugin will repeat this loop for all products in your order.', 'woo-order-on-whatsapp' );?></p>
    </div>

    <h3><?php esc_html_e( 'Custom Order Message', 'woo-order-on-whatsapp' );?> <?php OMW_Utils::get_pro_tag(); ?></h3>
    <p class="description"><?php esc_html_e( 'Available tokens for the message.', 'woo-order-on-whatsapp' );?></p>
        
    <ul>
        <li><code>{order-number}</code> - <?php esc_html_e( 'Order Number', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{order-payment}</code> - <?php esc_html_e( 'Order Payment', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{order-subtotal}</code> - <?php esc_html_e( 'Order Subtotal', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{order-total}</code> - <?php esc_html_e( 'Order Total', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{order-note}</code> - <?php esc_html_e( 'Order Note', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{order-products}</code> - <?php esc_html_e( "Order Products. This token is the result of the configuration above, don't forget to add it.", 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-name}</code> - <?php esc_html_e( 'Customer Name', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-phone}</code> - <?php esc_html_e( 'Customer Phone', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-mail}</code> - <?php esc_html_e( 'Customer Mail', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-address}</code> - <?php esc_html_e( 'Customer Address', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-state}</code> - <?php esc_html_e( 'Customer State', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-city}</code> - <?php esc_html_e( 'Customer City', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{customer-zipcode}</code> - <?php esc_html_e( 'Customer Zipcode', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{shipping-total}</code> - <?php esc_html_e( 'Shipping Total', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{shipping-method}</code> - <?php esc_html_e( 'Shipping Method', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{meta-{[your-meta-field]}</code> - <?php esc_html_e( 'Get value from custom fields', 'woo-order-on-whatsapp' );?>.</li>
        <li><code>{meta-data-{[your-meta]}</code> - <?php esc_html_e( 'Get value from custom order meta (Inputs created in the checkout form)', 'woo-order-on-whatsapp' );?>.</li>
    </ul>

    <textarea name="evwapp_opiton_order_message" class="large-text" rows="20" disabled ><?php echo get_option( 'evwapp_opiton_order_message' );?></textarea>

</div>





/**
* الملف السادس عشر
*templates
*     tab- footer .php
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="myd-tab-footer">
    <form method="post" action="">
        <?php wp_nonce_field( 'evwapp_settings_nonce', 'evwapp_settings_nonce' ); ?>

        <p class="submit">
            <button type="submit" name="submit_dados_update" id="submit_evwapp" class="button button-primary"><?php esc_html_e( 'Save Settings', 'woo-order-on-whatsapp' );?></button>
        </p>
    </form>
</div>




/**
* الملف السابع عشر
*templates
*     tab- general .php
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="tab-general-content" class="myd-tabs-content myd-tabs-content--active">

    <h2><?php esc_html_e( 'General Settings', 'woo-order-on-whatsapp' );?></h2>
    <p><?php esc_html_e( 'In this section, you can edit general options.', 'woo-order-on-whatsapp' );?></p>
            
    <table class="form-table">
        <tbody>
            <tr">
                <th scope="row">
                    <label for="evwapp_opiton_phone_number"><?php esc_html_e( 'WhatsApp Number', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                    <input type="number" name="evwapp_opiton_phone_number" id="evwapp_opiton_phone_number" class="regular-text" value="<?php echo get_option('evwapp_opiton_phone_number'); ?>">
                    <p class="description"><?php esc_html_e( 'Enter your WhatsApp number with the country code (e.g., 5551XXXXXXXXX)', 'woo-order-on-whatsapp');?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_show_thank"><?php esc_html_e( 'Auto Redirect After Checkout?', 'woo-order-on-whatsapp' );?> <?php OMW_Utils::get_pro_tag(); ?></label>
                </th>
                <td>
                    <input type="checkbox" disabled name="evwapp_opiton_show_thank" id="evwapp_opiton_show_thank" value="yes" <?php checked( get_option('evwapp_opiton_show_thank'), 'yes' );?>><?php esc_html_e( 'Yes, redirect after checkout.', 'woo-order-on-whatsapp' );?>
                    <p class="description"><?php esc_html_e( 'Customers will be redirected to WhatsApp with a custom message defined on the "Checkout" tab.', 'woo-order-on-whatsapp' );?></p>
                </td>
            </tr>
            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_show_btn_single"><?php esc_html_e( 'Show Button in Product Page?', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                    <input type="checkbox" name="evwapp_opiton_show_btn_single" id="evwapp_opiton_show_btn_single" value="yes" <?php checked( get_option('evwapp_opiton_show_btn_single'), 'yes' );?>><?php esc_html_e( 'Yes, show button on single product pages.', 'woo-order-on-whatsapp' );?>
                    <p class="description"><?php esc_html_e( 'The button will be displayed on the product page after the "add to cart" button.', 'woo-order-on-whatsapp' );?></p>
                </td>
            </tr>

            <tr>
                <th scope="row">
                    <label for="evwapp_opiton_show_cart"><?php esc_html_e( 'Show Button in Cart Page?', 'woo-order-on-whatsapp' );?></label>
                </th>
                <td>
                    <input type="checkbox" name="evwapp_opiton_show_cart" id="evwapp_opiton_show_cart" value="yes" <?php checked( get_option('evwapp_opiton_show_cart'), 'yes' );?>><?php esc_html_e( 'Yes, show button on the cart page.', 'woo-order-on-whatsapp' );?>
                    <p class="description"><?php esc_html_e( 'The button will be displayed on the cart page.', 'woo-order-on-whatsapp' );?></p>
                </td>
            </tr>
        </tbody>
    </table>

    <div class="card">
        <h3><?php esc_html_e( 'Widget for Elementor', 'woo-order-on-whatsapp' );?> <?php OMW_Utils::get_pro_tag(); ?></h3>
        <p><?php echo wp_kses_post( __( 'Now, the <b>PRO version</b> has a <b>Widget for Elementor!</b> You can use that on all pages and select which product the button gets and redirects information to WhatsApp. Open the Elementor editor and search for: "Order on WhatsApp Button".', 'woo-order-on-whatsapp' ) );?></p>
    </div>
</div>





/**
* الملف الثامن عشر
*templates
*     tab- header .php 
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div class="wrap">
    
    <h1><?php esc_html_e( 'Order on WhatsApp for WooCommerce', 'woo-order-on-whatsapp' );?></h1>
    <?php settings_errors(); ?>

    <nav class="nav-tab-wrapper">
        <a href="#tab_general" id="tab-general" class="nav-tab myd-tab nav-tab-active" onclick="mydChangeTab(event)"><?php esc_html_e( 'General', 'woo-order-on-whatsapp' );?></a>
        <a href="#tab_checkout" id="tab-checkout" class="nav-tab myd-tab" onclick="mydChangeTab(event)"><?php esc_html_e( 'Checkout', 'woo-order-on-whatsapp' );?></a>
        <a href="#tab_single_product" id="tab-single-product" class="nav-tab myd-tab" onclick="mydChangeTab(event)"><?php esc_html_e( 'Product Page', 'woo-order-on-whatsapp' );?></a>
        <a href="#tab_cart" id="tab-cart" class="nav-tab myd-tab" onclick="mydChangeTab(event)"><?php esc_html_e( 'Cart Page', 'woo-order-on-whatsapp' );?></a>
        <a href="#tab_support" id="tab-support" class="nav-tab myd-tab" onclick="mydChangeTab(event)"><?php esc_html_e( 'Support', 'woo-order-on-whatsapp' );?></a>
    </nav>

    <form method="post" action="options.php">
    <?php settings_fields( 'evwapp-settings-group' ); ?>



/**
* الملف التاسع عشر
*templates
*     tab- single-product .php
*/



<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
?>
<div id="tab-single-product-content" class="myd-tabs-content">

<h2><?php esc_html_e( 'Product Page', 'woo-order-on-whatsapp' );?></h2>
<p><?php esc_html_e( 'In this section, you can edit options for the button on the Product Page.', 'woo-order-on-whatsapp' );?></p>

<table class="form-table">
    <tbody>
        <tr>
            <th scope="row">
                <label for="evwapp_opiton_message"><?php esc_html_e( 'Your custom message', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <textarea name="evwapp_opiton_message" id="evwapp_opiton_message" class="large-text" rows="5"><?php echo get_option( 'evwapp_opiton_message' );?></textarea>
            </td>
        </tr>
        
        <tr>
            <th scope="row">
                <label for="evwapp_opiton_text_button"><?php esc_html_e( 'Button text', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <input type="text" name="evwapp_opiton_text_button" id="evwapp_opiton_text_button" class="regular-text" value="<?php echo get_option( 'evwapp_opiton_text_button' ); ?>">
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="evwapp_opiton_target"><?php esc_html_e( 'Open in new tab?', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <input type="checkbox" name="evwapp_opiton_target" id="evwapp_opiton_target" value="_blank" <?php checked( get_option('evwapp_opiton_target'), '_blank' );?>><?php esc_html_e( 'Yes, open in new tab.', 'woo-order-on-whatsapp' );?><br>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="evwapp_opiton_remove_btn"><?php esc_html_e( 'Hide button on desktop device?', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <input type="checkbox" name="evwapp_opiton_remove_btn" id="evwapp_opiton_remove_btn" value="yes" <?php checked( get_option('evwapp_opiton_remove_btn'), 'yes' );?>><?php esc_html_e( 'Yes, remove WhatsApp Button on Desktop.', 'woo-order-on-whatsapp' );?><br>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="evwapp_opiton_remove_price"><?php esc_html_e( 'Hide Price in Product Page?', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <input type="checkbox" name="evwapp_opiton_remove_price" id="evwapp_opiton_remove_price" value="yes" <?php checked( get_option('evwapp_opiton_remove_price'), 'yes' );?>><?php esc_html_e( 'Yes, remove price in Product page.', 'woo-order-on-whatsapp' );?><br>
            </td>
        </tr>

        <tr>
            <th scope="row">
                <label for="evwapp_opiton_remove_cart_btn"><?php esc_html_e( 'Hide "Add to Cart" Button?', 'woo-order-on-whatsapp' );?></label>
            </th>
            <td>
                <input type="checkbox" name="evwapp_opiton_remove_cart_btn" id="evwapp_opiton_remove_cart_btn" value="yes" <?php checked( get_option('evwapp_opiton_remove_cart_btn'), 'yes' );?>><?php esc_html_e( 'Yes, remove Add to Cart button.', 'woo-order-on-whatsapp' );?><br>
            </td>
        </tr>
    </tbody>
</table>

</div>

?>