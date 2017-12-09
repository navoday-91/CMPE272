<?php

// jCart v1.3
// http://conceptlogic.com/jcart/

// This file demonstrates a basic store setup

// If your page calls session_start() be sure to include jcart.php first

// jCart v1.3
// http://conceptlogic.com/jcart/

//error_reporting(E_ALL);

// Cart logic based on Webforce Cart: http://www.webforcecart.com/
class Jcart {

	public $config     = array();
	private $items     = array();
	private $names     = array();
	private $prices    = array();
	private $qtys      = array();
	private $urls      = array();
	private $subtotal  = 0;
	private $itemCount = 0;

	function __construct() {

		// Get $config array
		include_once('config-loader.php');
		$this->config = $config;
	}

	/**
	* Get cart contents
	*
	* @return array
	*/
	public function get_contents() {
		$items = array();
		foreach($this->items as $tmpItem) {
			$item = null;
			$item['id']       = $tmpItem;
			$item['name']     = $this->names[$tmpItem];
			$item['price']    = $this->prices[$tmpItem];
			$item['qty']      = $this->qtys[$tmpItem];
			$item['url']      = $this->urls[$tmpItem];
			$item['subtotal'] = $item['price'] * $item['qty'];
			$items[]          = $item;
		}
		return $items;
	}

	/**
	* Add an item to the cart
	*
	* @param string $id
	* @param string $name
	* @param float $price
	* @param mixed $qty
	* @param string $url
	*
	* @return mixed
	*/
	private function add_item($id, $name, $price, $qty = 1, $url) {

		$validPrice = false;
		$validQty = false;

		// Verify the price is numeric
		if (is_numeric($price)) {
			$validPrice = true;
		}

		// If decimal quantities are enabled, verify the quantity is a positive float
		if ($this->config['decimalQtys'] === true && filter_var($qty, FILTER_VALIDATE_FLOAT) && $qty > 0) {
			$validQty = true;
		}
		// By default, verify the quantity is a positive integer
		elseif (filter_var($qty, FILTER_VALIDATE_INT) && $qty > 0) {
			$validQty = true;
		}

		// Add the item
		if ($validPrice !== false && $validQty !== false) {

			// If the item is already in the cart, increase its quantity
			if($this->qtys[$id] > 0) {
				$this->qtys[$id] += $qty;
				$this->update_subtotal();
			}
			// This is a new item
			else {
				$this->items[]     = $id;
				$this->names[$id]  = $name;
				$this->prices[$id] = $price;
				$this->qtys[$id]   = $qty;
				$this->urls[$id]   = $url;
			}
			$this->update_subtotal();
			return true;
		}
		elseif ($validPrice !== true) {
			$errorType = 'price';
			return $errorType;
		}
		elseif ($validQty !== true) {
			$errorType = 'qty';
			return $errorType;
		}
	}

	/**
	* Update an item in the cart
	*
	* @param string $id
	* @param mixed $qty
	*
	* @return boolean
	*/
	private function update_item($id, $qty) {

		// If the quantity is zero, no futher validation is required
		if ((int) $qty === 0) {
			$validQty = true;
		}
		// If decimal quantities are enabled, verify it's a float
		elseif ($this->config['decimalQtys'] === true && filter_var($qty, FILTER_VALIDATE_FLOAT)) {
			$validQty = true;
		}
		// By default, verify the quantity is an integer
		elseif (filter_var($qty, FILTER_VALIDATE_INT))	{
			$validQty = true;
		}

		// If it's a valid quantity, remove or update as necessary
		if ($validQty === true) {
			if($qty < 1) {
				$this->remove_item($id);
			}
			else {
				$this->qtys[$id] = $qty;
			}
			$this->update_subtotal();
			return true;
		}
	}


	/* Using post vars to remove items doesn't work because we have to pass the
	id of the item to be removed as the value of the button. If using an input
	with type submit, all browsers display the item id, instead of allowing for
	user-friendly text. If using an input with type image, IE does not submit
	the	value, only x and y coordinates where button was clicked. Can't use a
	hidden input either since the cart form has to encompass all items to
	recalculate	subtotal when a quantity is changed, which means there are
	multiple remove	buttons and no way to associate them with the correct
	hidden input. */

	/**
	* Reamove an item from the cart
	*
	* @param string $id	*
	*/
	private function remove_item($id) {
		$tmpItems = array();

		unset($this->names[$id]);
		unset($this->prices[$id]);
		unset($this->qtys[$id]);
		unset($this->urls[$id]);

		// Rebuild the items array, excluding the id we just removed
		foreach($this->items as $item) {
			if($item != $id) {
				$tmpItems[] = $item;
			}
		}
		$this->items = $tmpItems;
		$this->update_subtotal();
	}

	/**
	* Empty the cart
	*/
	public function empty_cart() {
		$this->items     = array();
		$this->names     = array();
		$this->prices    = array();
		$this->qtys      = array();
		$this->urls      = array();
		$this->subtotal  = 0;
		$this->itemCount = 0;
	}

	/**
	* Update the entire cart
	*/
	public function update_cart() {

		// Post value is an array of all item quantities in the cart
		// Treat array as a string for validation
		if (is_array($_POST['jcartItemQty'])) {
			$qtys = implode($_POST['jcartItemQty']);
		}

		// If no item ids, the cart is empty
		if ($_POST['jcartItemId']) {

			$validQtys = false;

			// If decimal quantities are enabled, verify the combined string only contain digits and decimal points
			if ($this->config['decimalQtys'] === true && preg_match("/^[0-9.]+$/i", $qtys)) {
				$validQtys = true;
			}
			// By default, verify the string only contains integers
			elseif (filter_var($qtys, FILTER_VALIDATE_INT) || $qtys == '') {
				$validQtys = true;
			}

			if ($validQtys === true) {

				// The item index
				$count = 0;

				// For each item in the cart, remove or update as necessary
				foreach ($_POST['jcartItemId'] as $id) {

					$qty = $_POST['jcartItemQty'][$count];

					if($qty < 1) {
						$this->remove_item($id);
					}
					else {
						$this->update_item($id, $qty);
					}

					// Increment index for the next item
					$count++;
				}
				return true;
			}
		}
		// If no items in the cart, return true to prevent unnecssary error message
		elseif (!$_POST['jcartItemId']) {
			return true;
		}
	}

	/**
	* Recalculate subtotal
	*/
	private function update_subtotal() {
		$this->itemCount = 0;
		$this->subtotal  = 0;

		if(sizeof($this->items > 0)) {
			foreach($this->items as $item) {
				$this->subtotal += ($this->qtys[$item] * $this->prices[$item]);

				// Total number of items
				$this->itemCount += $this->qtys[$item];
			}
		}
	}

	/**
	* Process and display cart
	*/
	public function display_cart() {

		$config = $this->config; 
		$errorMessage = null;

		// Simplify some config variables
		$checkout = $config['checkoutPath'];
		$priceFormat = $config['priceFormat'];

		$id    = $config['item']['id'];
		$name  = $config['item']['name'];
		$price = $config['item']['price'];
		$qty   = $config['item']['qty'];
		$url   = $config['item']['url'];
		$add   = $config['item']['add'];

		// Use config values as literal indices for incoming POST values
		// Values are the HTML name attributes set in config.json
		$id    = $_POST[$id];
		$name  = $_POST[$name];
		$price = $_POST[$price];
		$qty   = $_POST[$qty];
		$url   = $_POST[$url];

		// Optional CSRF protection, see: http://conceptlogic.com/jcart/security.php
		$jcartToken = $_POST['jcartToken'];

		// Only generate unique token once per session
		if(!$_SESSION['jcartToken']){
			$_SESSION['jcartToken'] = md5(session_id() . time() . $_SERVER['HTTP_USER_AGENT']);
		}
		// If enabled, check submitted token against session token for POST requests
		if ($config['csrfToken'] === 'true' && $_POST && $jcartToken != $_SESSION['jcartToken']) {
			$errorMessage = 'Invalid token!' . $jcartToken . ' / ' . $_SESSION['jcartToken'];
		}

		// Sanitize values for output in the browser
		$id    = filter_var($id, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$name  = filter_var($name, FILTER_SANITIZE_SPECIAL_CHARS, FILTER_FLAG_STRIP_LOW);
		$url   = filter_var($url, FILTER_SANITIZE_URL);

		// Round the quantity if necessary
		if($config['decimalPlaces'] === true) {
			$qty = round($qty, $config['decimalPlaces']);
		}

		// Add an item
		if ($_POST[$add]) {
			$itemAdded = $this->add_item($id, $name, $price, $qty, $url);
			// If not true the add item function returns the error type
			if ($itemAdded !== true) {
				$errorType = $itemAdded;
				switch($errorType) {
					case 'qty':
						$errorMessage = $config['text']['quantityError'];
						break;
					case 'price':
						$errorMessage = $config['text']['priceError'];
						break;
				}
			}
		}

		// Update a single item
		if ($_POST['jcartUpdate']) {
			$itemUpdated = $this->update_item($_POST['itemId'], $_POST['itemQty']);
			if ($itemUpdated !== true)	{
				$errorMessage = $config['text']['quantityError'];
			}
		}

		// Update all items in the cart
		if($_POST['jcartUpdateCart'] || $_POST['jcartCheckout'])	{
			$cartUpdated = $this->update_cart();
			if ($cartUpdated !== true)	{
				$errorMessage = $config['text']['quantityError'];
			}
		}

		// Remove an item
		/* After an item is removed, its id stays set in the query string,
		preventing the same item from being added back to the cart in
		subsequent POST requests.  As result, it's not enough to check for
		GET before deleting the item, must also check that this isn't a POST
		request. */
		if($_GET['jcartRemove'] && !$_POST) {
			$this->remove_item($_GET['jcartRemove']);
		}

		// Empty the cart
		if($_POST['jcartEmpty']) {
			$this->empty_cart();
		}

		// Determine which text to use for the number of items in the cart
		$itemsText = $config['text']['multipleItems'];
		if ($this->itemCount == 1) {
			$itemsText = $config['text']['singleItem'];
		}

		// Determine if this is the checkout page
		/* First we check the request uri against the config checkout (set when
		the visitor first clicks checkout), then check for the hidden input
		sent with Ajax request (set when visitor has javascript enabled and
		updates an item quantity). */
		$isCheckout = strpos(request_uri(), $checkout);
		if ($isCheckout !== false || $_REQUEST['jcartIsCheckout'] == 'true') {
			$isCheckout = true;
		}
		else {
			$isCheckout = false;
		}

		// Overwrite the form action to post to gateway.php instead of posting back to checkout page
		if ($isCheckout === true) {

			// Sanititze config path
			$path = filter_var($config['jcartPath'], FILTER_SANITIZE_URL);

			// Trim trailing slash if necessary
			$path = rtrim($path, '/');

			$checkout = $path . '/gateway.php';
		}

		// Default input type
		// Overridden if using button images in config.php
		$inputType = 'submit';

		// If this error is true the visitor updated the cart from the checkout page using an invalid price format
		// Passed as a session var since the checkout page uses a header redirect
		// If passed via GET the query string stays set even after subsequent POST requests
		if ($_SESSION['quantityError'] === true) {
			$errorMessage = $config['text']['quantityError'];
			unset($_SESSION['quantityError']);
		}

		// Set currency symbol based on config currency code
		$currencyCode = trim(strtoupper($config['currencyCode']));
		switch($currencyCode) {
			case 'EUR':
				$currencySymbol = '&#128;';
				break;
			case 'GBP':
				$currencySymbol = '&#163;';
				break;
			case 'JPY':
				$currencySymbol = '&#165;';
				break;
			case 'CHF':
				$currencySymbol = 'CHF&nbsp;';
				break;
			case 'SEK':
			case 'DKK':
			case 'NOK':
				$currencySymbol = 'Kr&nbsp;';
				break;
			case 'PLN':
				$currencySymbol = 'z&#322;&nbsp;';
				break;
			case 'HUF':
				$currencySymbol = 'Ft&nbsp;';
				break;
			case 'CZK':
				$currencySymbol = 'K&#269;&nbsp;';
				break;
			case 'ILS':
				$currencySymbol = '&#8362;&nbsp;';
				break;
			case 'TWD':
				$currencySymbol = 'NT$';
				break;
			case 'THB':
				$currencySymbol = '&#3647;';
				break;
			case 'MYR':
				$currencySymbol = 'RM';
				break;
			case 'PHP':
				$currencySymbol = 'Php';
				break;
			case 'BRL':
				$currencySymbol = 'R$';
				break;
			case 'USD':
			default:
				$currencySymbol = '$';
				break;
		}

		////////////////////////////////////////////////////////////////////////
		// Output the cart

		// Return specified number of tabs to improve readability of HTML output
		function tab($n) {
			$tabs = null;
			while ($n > 0) {
				$tabs .= "\t";
				--$n;
			}
			return $tabs;
		}

		// If there's an error message wrap it in some HTML
		if ($errorMessage)	{
			$errorMessage = "<p id='jcart-error'>$errorMessage</p>";
		}

		// Display the cart header
		echo tab(1) . "$errorMessage\n";
		echo tab(1) . "<form method='post' action='$checkout'>\n";
		echo tab(2) . "<fieldset>\n";
		echo tab(3) . "<input type='hidden' name='jcartToken' value='{$_SESSION['jcartToken']}' />\n";
		echo tab(3) . "<table border='1'>\n";
		echo tab(4) . "<thead>\n";
		echo tab(5) . "<tr>\n";
		echo tab(6) . "<th colspan='3'>\n";
		echo tab(7) . "<strong id='jcart-title'>{$config['text']['cartTitle']}</strong> ($this->itemCount $itemsText)\n";
		echo tab(6) . "</th>\n";
		echo tab(5) . "</tr>". "\n";
		echo tab(4) . "</thead>\n";
		
		// Display the cart footer
		echo tab(4) . "<tfoot>\n";
		echo tab(5) . "<tr>\n";
		echo tab(6) . "<th colspan='3'>\n";

		// If this is the checkout hide the cart checkout button
		if ($isCheckout !== true) {
			if ($config['button']['checkout']) {
				$inputType = "image";
				$src = " src='{$config['button']['checkout']}' alt='{$config['text']['checkout']}' title='' ";
			}
			echo tab(7) . "<input type='$inputType' $src id='jcart-checkout' name='jcartCheckout' class='jcart-button' value='{$config['text']['checkout']}' />\n";
		}

		echo tab(7) . "<span id='jcart-subtotal'>{$config['text']['subtotal']}: <strong>$currencySymbol" . number_format($this->subtotal, $priceFormat['decimals'], $priceFormat['dec_point'], $priceFormat['thousands_sep']) . "</strong></span>\n";
		echo tab(6) . "</th>\n";
		echo tab(5) . "</tr>\n";
		echo tab(4) . "</tfoot>\n";			
		
		echo tab(4) . "<tbody>\n";

		// If any items in the cart
		if($this->itemCount > 0) {

			// Display line items
			foreach($this->get_contents() as $item)	{
				echo tab(5) . "<tr>\n";
				echo tab(6) . "<td class='jcart-item-qty'>\n";
				echo tab(7) . "<input name='jcartItemId[]' type='hidden' value='{$item['id']}' />\n";
				echo tab(7) . "<input id='jcartItemQty-{$item['id']}' name='jcartItemQty[]' size='2' type='text' value='{$item['qty']}' />\n";
				echo tab(6) . "</td>\n";
				echo tab(6) . "<td class='jcart-item-name'>\n";

				if ($item['url']) {
					echo tab(7) . "{$item['name']}</a>\n";;
				}
				else {
					echo tab(7) . $item['name'] . "\n";
				}
				echo tab(7) . "<input name='jcartItemName[]' type='hidden' value='{$item['name']}' />\n";
				echo tab(6) . "</td>\n";
				echo tab(6) . "<td class='jcart-item-price'>\n";
				echo tab(7) . "<span>$currencySymbol" . number_format($item['subtotal'], $priceFormat['decimals'], $priceFormat['dec_point'], $priceFormat['thousands_sep']) . "</span><input name='jcartItemPrice[]' type='hidden' value='{$item['price']}' />\n";
				echo tab(7) . "\n";
				echo tab(6) . "</td>\n";
				echo tab(5) . "</tr>\n";
			}
		}

		// The cart is empty
		else {
			echo tab(5) . "<tr><td id='jcart-empty' colspan='3'>{$config['text']['emptyMessage']}</td></tr>\n";
		}
		echo tab(4) . "</tbody>\n";
		echo tab(3) . "</table>\n\n";

		echo tab(3) . "<div id='jcart-buttons'>\n";

		if ($config['button']['update']) {
			$inputType = "image";
			$src = " src='{$config['button']['update']}' alt='{$config['text']['update']}' title='' ";
		}

		echo tab(4) . "<input type='$inputType' $src name='jcartUpdateCart' value='{$config['text']['update']}' class='jcart-button' />\n";

		if ($config['button']['empty']) {
			$inputType = "image";
			$src = " src='{$config['button']['empty']}' alt='{$config['text']['emptyButton']}' title='' ";
		}

		echo tab(4) . "<input type='$inputType' $src name='jcartEmpty' value='{$config['text']['emptyButton']}' class='jcart-button' />\n";
		echo tab(3) . "</div>\n";

		// If this is the checkout display the PayPal checkout button
		if ($isCheckout === true) {
			// Hidden input allows us to determine if we're on the checkout page
			// We normally check against request uri but ajax update sets value to relay.php
			echo tab(3) . "<input type='hidden' id='jcart-is-checkout' name='jcartIsCheckout' value='true' />\n";

			// PayPal checkout button
			if ($config['button']['checkout'])	{
				$inputType = "image";
				$src = " src='{$config['button']['checkout']}' alt='{$config['text']['checkoutPaypal']}' title='' ";
			}

			if($this->itemCount <= 0) {
				$disablePaypalCheckout = " disabled='disabled'";
			}

			echo tab(3) . "<input type='$inputType' $src id='jcart-paypal-checkout' name='jcartPaypalCheckout' value='{$config['text']['checkoutPaypal']}' $disablePaypalCheckout />\n";
		}

		echo tab(2) . "</fieldset>\n";
		echo tab(1) . "</form>\n\n";
		
		echo tab(1) . "<div id='jcart-tooltip'></div>\n";
	}
}

// Start a new session in case it hasn't already been started on the including page
@session_start();

// Initialize jcart after session start
$jcart = $_SESSION['jcart'];
if(!is_object($jcart)) {
	$jcart = $_SESSION['jcart'] = new Jcart();
}

// Enable request_uri for non-Apache environments
// See: http://api.drupal.org/api/function/request_uri/7
if (!function_exists('request_uri')) {
	function request_uri() {
		if (isset($_SERVER['REQUEST_URI'])) {
			$uri = $_SERVER['REQUEST_URI'];
		}
		else {
			if (isset($_SERVER['argv'])) {
				$uri = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['argv'][0];
			}
			elseif (isset($_SERVER['QUERY_STRING'])) {
				$uri = $_SERVER['SCRIPT_NAME'] . '?' . $_SERVER['QUERY_STRING'];
			}
			else {
				$uri = $_SERVER['SCRIPT_NAME'];
			}
		}
		$uri = '/' . ltrim($uri, '/');
		return $uri;
	}
}
?>

<!doctype html>

<?php
$cookie_name = "prev_visits";
$cookie_value = $_COOKIE[$cookie_name];
$cookie_value = json_decode($cookie_value, true);
$services_dict = array(1 => "<a href = 'services/str_cnslt.php'>Strategy and Consulting</a>",
2 => "<a href = 'services/branding1.php'>Corporate Identity</a>",
3 => "<a href = 'services/webdesign.php'>Web Design & Development</a>",
4 => "<a href = 'services/branding.php'>Branding</a>",
5 => "<a href = 'services/digmrktng.php'>Digital Marketing</a>",
6 => "<a href = 'services/promotions.php'>Promotional Material</a>",
7 => "<a href = 'services/portal.php'>Portal Designs and CMS</a>",
8 => "<a href = 'services/process_mgmt.php'>Process Management</a>",
9 => "<a href = 'services/comp_cert.php'>Compliance and Standardization</a>",
10 => "<a href = 'services/analytics.php'>Surveys & Analytics</a>",
11 => "<a href = 'services/mkt_trends.php'>Market Trends</a>",
12 => "<a href = 'services/supp_chain.php'>Supply Chain Consulting</a>",
13 => "<a href = 'services/digmrktng.php'>Design and Reinvent</a>",
14 => "<a href = 'services/legalconsulting.php'>Legal Consulting</a>",
);
?>




<!-- start coded_template: id:3859515515 path:generated_layouts/3859515505.html --><!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]--><!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en">        <![endif]--><!--[if IE 8]>    <html class="no-js lt-ie9" lang="en">               <![endif]--><!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]--><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="ABC Solutions">
    <meta name="description" content="ABC Consulting provides analytics services and understands perspective required for building and implementation of Business and Market Data.">
    <meta name="generator" content="HubSpot">
    <title>Most Reviewed</title>
    

    
    
    <script src="https://static.hsstatic.net/jquery-libs/static-1.4/jquery/jquery-1.11.2.js"></script>
    <script type="text/javascript">hsjQuery = window['jQuery']</script>
    <link href="https://static.hsstatic.net/content_shared_assets/static-1.4049/css/public_common.css" rel="stylesheet">
    <meta property="og:description" content=".">
    <meta property="og:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:title" content="">


    <link rel="stylesheet" type="text/css" media="screen, projection" href="style.css" />

		<link rel="stylesheet" type="text/css" media="screen, projection" href="jcart/css/jcart.css" />
    
    <link rel="canonical" href="http://www.e-zest.com/bpm_consulting/">

<meta name="viewport" content="width=device-width, initial-scale=1">
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-362796-1', 'auto');
  ga('send', 'pageview');

</script>

<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }
    
    .dropdown .dropdown-menu {
        position: absolute;
        top: 100%;
        float: right;
        display: none;
        margin: 0;
    
        /****************
         ** NEW STYLES **
         ****************/
    
        /** Remove list bullets */
        width: 200px; /** Set the width to 100% of it's parent */
        padding: 0;
        
        #jcart * { margin:0; padding:0; font-family:arial, tahoma, verdana, sans-serif; }
        #jcart, #jcart input, #jcart-tooltip { font-size:12px; }
        
        #jcart fieldset { border:0; }
        
        #jcart-error { text-align:center; padding:5px; }
        
        #jcart table { width:100%; border:0; background:#fff; border-collapse:collapse; }
        #jcart thead {  }
        #jcart-title {  }
        #jcart tbody {  }
        #jcart tfoot {  }
        #jcart tr {  }
        #jcart th { background:#ccffcc }
        #jcart th, #jcart td { padding:5px; border:0; border:solid 1px #ccc; vertical-align:middle; text-align:left; font-weight:normal; }
        #jcart #jcart-empty { text-align:center; }
        
        .jcart-item-qty { width:25%; }
        #jcart .jcart-item-name { width:50%; font-weight:bold; }
        #jcart .jcart-item-price { width:25%; font-weight:bold; text-align:right; }
        .jcart-item-price span { display:block; }
        
        .jcart-remove { font-size:11px; font-weight:normal; }
        
        #jcart-subtotal { display:block; }
        #jcart-subtotal strong {  }
        
        #jcart-buttons input { padding:2px; margin:2px; }
        
        #jcart-checkout { float:right; padding:2px; }
        
        #jcart-paypal-checkout { display:block; width:14em; padding:10px; margin:20px auto; }
        
        #jcart-tooltip { display:none; position:absolute; padding:3px 7px 3px 25px; background:url(../images/checkmark.png) 3px center no-repeat #fdfdfd; border:1px solid #a6c9e2; z-index:9999; }

    }
    
    .dropdown:hover .dropdown-menu {
        display: inline-block;
    }
    
    /** Button Styles **/
    .dropdown button {
        background: #FF6223;
        color: #FFFFFF;
        border: none;
        margin: 0;
        padding: 0.4em 0.8em;
        font-size: 1em;
    }
    
    /** List Item Styles **/
    .dropdown a {
        display: block;
        padding: 0.2em 0.8em;
        text-decoration: none;
        background: #CCCCCC;
        color: #333333;
    }
    
    /** List Item Hover Styles **/
    .dropdown a:hover {
        background: #BBBBBB;
    }
    
    
    .dropdown .dropdown-menu.jcart-item-name { width:50%; font-weight:bold; }
    .dropdown .dropdown-menu.jcart-item-price { width:25%; font-weight:bold; text-align:right; }
    .dropdown .dropdown-menu.jcart-item-qty { width:25%; }
    
    
     
        
        form {
            min-height: 200px;
        }
    
</style>


<meta property="og:image" content="images/abclogo.jpg">
<meta property="og:image:type" content="image/png">
<meta property="og:image:width" content="200">
<meta property="og:image:height" content="200">
<meta property="og:url" content="http://abc-consulting.tk/">
<link href="//cdn2.hubspot.net/hub/-1/hub_generated/template_assets/1495141902003/hubspot_default/shared/responsive/layout.min.css" rel="stylesheet">


<link rel="stylesheet" href="https://www.e-zest.com/hs-fs/hub/744339/hub_generated/template_assets/1499943837348/custom/system/css/Act-Theme-Custom.min.css">


    <!-- The style tag has been deprecated. Attached stylesheets are included in the required_head_tags page variable. -->
    <!-- Act Theme Main.js, please do not delete -->
<script src="//cdn2.hubspot.net/hub/273774/file-1924801657-js/mp/themes/Act-Theme/js/act-async-load.js"></script>
<!--/ Act Theme Main.js, please do not delete -->
    


</head>
<body class="act-theme act-two-column-hero   hs-content-id-3699427022 hs-site-page page " style="">
    <div class="header-container-wrapper">
    <div class="header-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-global_group " style="" data-widget-type="global_group" data-x="0" data-w="12">
<!-- start coded_template: id:3646437396 path:generated_global_groups/3646437371.html -->
<div class="" data-global-widget-path="generated_global_groups/3646437371.html"><div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell header-wrapper with-navigation" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell header-inner-wrapper centered" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span4 widget-span widget-type-logo header-logo" style="" data-widget-type="logo" data-x="0" data-w="4">
<!--end layout-widget-wrapper -->
</div><!--end widget-span -->
<div class="span8 widget-span widget-type-menu menu-reset flyouts-fade flyouts-slide main-navigation sticky menu-top-15" style="" data-widget-type="menu" data-x="4" data-w="8">
<div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_module_14496767418724" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_menu" style="" data-hs-cos-general-type="widget" data-hs-cos-type="menu"><div id="hs_menu_wrapper_module_14496767418724" class="hs-menu-wrapper active-branch flyouts hs-menu-flow-horizontal" role="navigation" data-sitemap-name="Main">
 <ul>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children"><a href="../index.php">Home</a>
  </li>
  <li class="hs-menu-item hs-menu-depth-1 hs-item-has-children"><a href="../php/logout.php">Logout</a>
  </li>
  <li>
      <div class="dropdown">
              <button>Cart</button>
              <div class="dropdown-menu">
                    <div id="jcart"><?php $jcart->display_cart();?></div>
              </div>
      </div>
  </li>
  <li class="hs-menu-item hs-menu-depth-1"><a href="https://navoday91.wordpress.com/"><span>Blog</span></a></li>
 </ul>
</div></span></div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
</div><!-- end coded_template: id:3646437396 path:generated_global_groups/3646437371.html -->

            </div><!--end widget-span -->
        </div><!--end row-->
        </div><!--end row-wrapper -->

    </div><!--end header -->
</div><!--end header wrapper -->

<div class="body-container-wrapper">
    <div class="body-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-cell hero-wrapper" style="" data-widget-type="cell" data-x="0" data-w="12">

                <div class="row-fluid-wrapper row-depth-1 row-number-2 ">
                <div class="row-fluid ">
                    <div class="span12 widget-span widget-type-cell centered-small" style="" data-widget-type="cell" data-x="0" data-w="12">

                        <div class="row-fluid-wrapper row-depth-2 row-number-1 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-header " style="" data-widget-type="header" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_14509432248707604" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_header" style="" data-hs-cos-general-type="widget" data-hs-cos-type="header"><h1><span id="hs_cos_wrapper_name" class="hs_cos_wrapper hs_cos_wrapper_meta_field hs_cos_wrapper_type_text" style="" data-hs-cos-general-type="meta_field" data-hs-cos-type="text">
                                        ABC Market
                                    </span></h1></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-2 row-number-2 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_14509432659418859" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p>Most Reviewed Products</p></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                        <div class="row-fluid-wrapper row-depth-2 row-number-3 ">
                        <div class="row-fluid ">
                            <div class="span12 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="0" data-w="12">
                                <div class="cell-wrapper layout-widget-wrapper">
                                    <span id="hs_cos_wrapper_module_145112232657853958" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_rich_text" style="" data-hs-cos-general-type="widget" data-hs-cos-type="rich_text"><p><a class="default-button" href="/request-for-services">Get In Touch ›</a></p></span>
                                </div><!--end layout-widget-wrapper -->
                            </div><!--end widget-span -->
                        </div><!--end row-->
                        </div><!--end row-wrapper -->
                    </div><!--end widget-span -->
            </div><!--end row-->
            </div><!--end row-wrapper -->
            <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
            <div class="row-fluid ">
                <div class="span12 widget-span widget-type-raw_jinja " style="" data-widget-type="raw_jinja" data-x="0" data-w="12">








    

    
    
    

    
    
    
    
    

    

    

    

    











    <style>

        body .hero-wrapper {

            
            

            
            

            
            
                background-color: #fcfcfc;
            

            
            
                background-image: url(https://www.e-zest.com/hubfs/background_images/mgmt-consulting-services.jpg?t=1510343398533);
            

            
            
                background-position: center center;
            

            
            
                background-repeat: no-repeat;
            

            
            
                background-attachment: fixed;
            

            
            
                -webkit-background-size: cover;
                background-size: cover;
            

            
            
        }
        
        
        
        
        
        
            body .hero-wrapper,
            body .hero-wrapper q,
            body .hero-wrapper blockquote,
            body .hero-wrapper hr,
            body .hero-wrapper .field > label {
                color: #ffffff;
            }
            body .hero-wrapper hr {
                background: #ffffff;
            }
        
        
        
        
            body .hero-wrapper h1,
            body .hero-wrapper h2,
            body .hero-wrapper h3,
            body .hero-wrapper h4,
            body .hero-wrapper h5,
            body .hero-wrapper h6,
            body .hero-wrapper .section-intro {
                color: #ffffff;
            }
            body .hero-wrapper h1:after {
                background: #ffffff;
            }
        

        
        
            body .hero-wrapper a {
                color: #ffffff;
            }
        

    </style>



</div><!--end widget-span -->

            </div><!--end row-->
            </div><!--end row-wrapper -->
        </div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
<div class="row-fluid-wrapper row-depth-0 row-number-1 ">
<div class="row-fluid ">
    <div class="span12 widget-span widget-type-cell content-section columns-section two-column-right-section" style="" data-widget-type="cell" data-x="0" data-w="12">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
    <script language="javascript" type="text/javascript">
            var token = "<?php echo($_SESSION['jcartToken']) ?>";                        
                                        
    </script>                                
                <?php             
                                            $connection = mysqli_connect("localhost", "navoday", "redhat");
                                            if ($connection->connect_error) {
                                                die("Connection failed: " . $connection->connect_error);
                                                echo('connection to db failed');
                                                echo($connection);
                                                }
                                    
                                                // Selecting Database
                                                $username = $_SESSION['login_user'];
                                                $db = mysqli_select_db($connection, "abc");
                                                // SQL query to fetch information of registerd users and finds user match.
                                                $query = mysqli_query($connection, "select productid from reviews group by productid order by count(*) DESC;");
                                                $rows = mysqli_num_rows($query);
                                                if ($rows > 0) {
                                                    while ($user = $query->fetch_assoc()) {
                                                        if (substr($user['productid'], 0, 2) == 'NN'){
                                                            $ch = curl_init();
                                                            curl_setopt($ch, CURLOPT_URL, "http://www.wonderarchitectures.ga/curleach.php?id=".$user['productid']);
                                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            
                                                            $result = curl_exec($ch);
                                                            echo($result);
                                                        }
                                                        if (substr($user['productid'], 0, 2) == 'AS'){
                                                            $ch = curl_init();
                                                            curl_setopt($ch, CURLOPT_URL, "http://anavsharma.com/barkinghampalace/altproduct.php?id=".$user['productid']);
                                                            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                                                            
                                                            $result = curl_exec($ch);
                                                            echo($result);
                                                        }
                                                        
                                                    }}
                ?>
				


				<div class="clear"></div>

				

				<?php
					//echo '<pre>';
					//var_dump($_SESSION['jcart']);
					//echo '</pre>';
				?>
			</div>    
                                    <?php
                                        
                                        
                                    ?>
</div></div></div></div></div>
                    
    

<div class="footer-container-wrapper">
    <div class="footer-container container-fluid">

        <div class="row-fluid-wrapper row-depth-1 row-number-1 ">
        <div class="row-fluid ">
            <div class="span12 widget-span widget-type-global_group " style="" data-widget-type="global_group" data-x="0" data-w="12">
<!-- start coded_template: id:3670990962 path:generated_global_groups/3670990947.html -->
<div class="" data-global-widget-path="generated_global_groups/3670990947.html"><div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-wrapper" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-main" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell centered medium-stack" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-4 ">
<div class="row-fluid ">
<div class="span3 widget-span widget-type-cell footer-column" style="" data-widget-type="cell" data-x="0" data-w="3">

<div class="row-fluid-wrapper row-depth-2 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-linked_image " style="" data-widget-type="linked_image" data-x="0" data-w="12">
<div class="cell-wrapper layout-widget-wrapper">

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->



</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

<div class="row-fluid-wrapper row-depth-1 row-number-1 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell footer-bottom" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-2 ">
<div class="row-fluid ">
<div class="span12 widget-span widget-type-cell centered" style="" data-widget-type="cell" data-x="0" data-w="12">

<div class="row-fluid-wrapper row-depth-1 row-number-3 ">
<div class="row-fluid ">
<div class="span6 widget-span widget-type-page_footer footer-copyright1 footer-go-foggy" style="" data-widget-type="page_footer" data-x="0" data-w="6">
<div class="cell-wrapper layout-widget-wrapper">
<span id="hs_cos_wrapper_module_144967676630618" class="hs_cos_wrapper hs_cos_wrapper_widget hs_cos_wrapper_type_page_footer" style="" data-hs-cos-general-type="widget" data-hs-cos-type="page_footer">
<footer>
    <span class="hs-footer-company-copyright">© 2017 ABC Consulting</span>
</footer>
</span></div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
<div class="span6 widget-span widget-type-rich_text " style="" data-widget-type="rich_text" data-x="6" data-w="6">
<div class="cell-wrapper layout-widget-wrapper">
</div><!--end layout-widget-wrapper -->
</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->

</div><!--end widget-span -->
</div><!--end row-->
</div><!--end row-wrapper -->
</div><!-- end coded_template: id:3670990962 path:generated_global_groups/3670990947.html -->

            </div><!--end widget-span -->
        </div><!--end row-->
        </div><!--end row-wrapper -->

    </div><!--end footer -->
</div><!--end footer wrapper -->


    
<script type="text/javascript" src="https://static.hsstatic.net/content_shared_assets/static-1.4049/js/public_common.js"></script>
<script src="https://static.hsstatic.net/AsyncSupport/static-1.7/js/post_listing_asset.js"></script>
<script>
  hsjQuery(document).ready(function () {
    var options = {
      'id': "769389336",
      'listing_url': "/_hcms/postlisting?blogId=3203284127&maxLinks=4&listingType=recent&orderByViews=false&hs-expires=1510948570&hs-version=1&hs-signature=AIj1bPu_wEV1mX3BQFFGxva6jXwLwEzDoA",
      'include_featured_image': false
    };
    window.hsPopulateListingFeed(options);
  });
</script>


        <!--[if lte IE 8]>
        <script charset="utf-8" src="https://js.hsforms.net/forms/v2-legacy.js"></script>
        <![endif]-->
     
<script src="https://js.hsforms.net/forms/v2.js"></script>

    <script>
        hbspt.forms.create({
            portalId: '744339',
            formId: '22c3f1ae-be53-4109-b02c-7c16cbfd6f26',
            formInstanceId: '3043',
            pageId: 3699427022,
            
            
            
            
            pageName: "Business Process Management (BPM) Consulting Services",
            
            
            redirectUrl: "http:\/\/www.e-zest.com\/bpm_consulting\/?portalId=744339&hsFormKey=82c8f16f8eb4834c41d62892df3e71ac#module_144967676630613",
            
            
            
            css: '',
            target: '#hs_form_target_module_144967676630613',
            
            
            
            
            
            contentType: "standard-page",
            
            formData: {
            cssClass: 'hs-form stacked hs-custom-form'
            }
        });
    </script>


<!-- Start of HubSpot Analytics Code -->
<script type="text/javascript">
var _hsq = _hsq || [];
_hsq.push(["setContentType", "standard-page"]);
_hsq.push(["setCanonicalUrl", "http:\/\/www.e-zest.com\/bpm_consulting\/"]);
_hsq.push(["setPageId", "3699427022"]);
_hsq.push(["setContentMetadata", {
    "contentPageId": 3699427022,
    "legacyPageId": "3699427022",
    "contentGroupId": null,
    "abTestId": null,
    "languageVariantId": 3699427022,
    "languageCode": null
}]);
_hsq.push(["setTargetedContentMetadata", []]);
</script>

<script type="text/javascript" id="hs-script-loader" async defer src="//js.hs-scripts.com/744339.js"></script>
<!-- End of HubSpot Analytics Code -->


<script type="text/javascript">
var hsVars = {
    ticks: 1510343470960,
    page_id: 3699427022,
    content_group_id: 0,
    portal_id: 744339,
    app_hs_base_url: "https://app.hubspot.com",
    language: "en",
    analytics_page_type: "standard-page"
}
</script>

        <script type="text/javascript" src="jcart/js/jquery-1.4.4.min.js"></script>
		<script type="text/javascript" src="jcart/js/jcart.min.js"></script>




    <!-- Generated by the HubSpot Template Builder - template version 1.03 -->

<!-- end coded_template: id:3859515515 path:generated_layouts/3859515505.html -->
</body></html>