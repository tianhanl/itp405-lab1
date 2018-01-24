<?php

namespace Apple\Checkout;

function condition($var)
{
  return $product->name == $var->product->name;
}

class ShoppingCart
{
  protected $lineItems = [];

  public function add($lineItem)
  {
    $this->lineItems[] = $lineItem;
  }

  public function remove($product)
  {
    $this->lineItems = array_filter($this->lineItems, function ($e) {
      return $e->product->name == $product->name;
    });
  }

  public function empty()
  {
    $this->lineItems = [];
  }

  public function getTotal()
  {
    $total = 0;

    foreach ($this->lineItems as $lineItem) {
      $total += $lineItem->getTotal();
    }

    return $total;
  }
}
