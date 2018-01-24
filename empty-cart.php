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
$song = new Product('The Break Up by MGK', 0.99);
$show = new Product('Big Bang Theory Season 1', 34.99);

$cart = new ShoppingCart();
$cart->add(new LineItem($album, 1));
$cart->add(new LineItem($song, 1));
$cart->add(new LineItem($show, 1));
echo $cart->getTotal();

$cart->empty();

echo '</br>';

echo $cart->getTotal();
?>