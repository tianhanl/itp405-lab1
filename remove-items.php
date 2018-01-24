<?php
require('./Product.php');
require('./ShoppingCart.php');
require('./LineItem.php');
require('./Track.php');

use Apple\Checkout\LineItem;
use Apple\Checkout\ShoppingCart;
use Apple\Checkout\Track;

// Example 1
$album = new Product('Bright Soundtrack', 10.99);

$cart = new ShoppingCart();

$albumLine = new LineItem($album, 1);
$cart->add($albumLine);
echo $cart->getTotal();
echo '</br>';
$cart->remove($album);
echo $cart->getTotal();
?>