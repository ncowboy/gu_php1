<?php
require_once ENGINE_DIR . 'db.lib.php';
if (isset($_POST['cart'])) {
  $cart = $_POST['cart'];
  $productId = $cart['product_id'] ?? '';
  $qty = $cart['quantity'] ?? '';
  $cartId = $_COOKIE['idCart'] ?? false;
  $cartId ? updateCart($cartId, $productId, $qty) : createCart($productId, $qty);
}

function createCart($_product_id, $_qty)
{
  $cartId = addCart();
  if ($cartId && !empty($_product_id) && !empty($_qty)) {
    addProductInCart($_product_id, $cartId, $_qty);
    setcookie('idCart', $cartId, time() + 60 * 60 * 24 * 7);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  } else {
    echo 'Ошибка данных корзины';
  }
}

function updateCart($_cartId, $_product_id, $_qty)
{
  $cart = getCart($_cartId);
  if (isProductInCart($_product_id, $cart)) {
    increaseProductInCartQty($_product_id, $_cartId, $_qty);
  } else {
    addProductInCart($_product_id, $_cartId, $_qty);
  }
}

function isProductInCart($id, $_cart)
{
  if (isset($_cart)) {
    foreach ($_cart as $item) {
      if ($item['product_id'] === $id) {
        return true;
      }
    }
  }
  return false;
}



