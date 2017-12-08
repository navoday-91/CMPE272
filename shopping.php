<?php
include_once('shopcart/jcart/jcart.php');
?>

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="ABC Solutions">
    <title>Test Page</title>
<link rel="stylesheet" type="text/css" media="screen, projection" href="shopcart/jcart/css/jcart.css" />

    <script type="text/javascript" src="shopcart/jcart/js/jquery-1.4.4.min.js"></script>
    <script type="text/javascript" src="shopcart/jcart/js/jcart.min.js"></script>
</head>
<body>
<div id="jcart"><?php $jcart->display_cart();?></div>

<form method="post" action="" class="jcart">
                                                <fieldset>
                                                        <input type="hidden" name="jcartToken" value="a5f891d47d110daa64619b1dae6ba104" />
                                                        <input type="hidden" name="my-item-id" value="ABC-123" />
                                                        <input type="hidden" name="my-item-name" value="Soccer Ball" />
                                                        <input type="hidden" name="my-item-price" value="25.00" />
                                                        <input type="hidden" name="my-item-url" value="" />

                                                        <ul>
                                                                <li><strong>Soccer Ball</strong></li>
                                                                <li>Price: $25.00</li>
                                                                <li>
                                                        <label>Qty: <input type="text" name="my-item-qty" value="1" size="3" /></label>
                                                                </li>
                                                        </ul>

                                                        <input type="submit" name="my-add-button" value="add to cart" class="button" />
                                                </fieldset>
                                        </form>
</body>
</html>