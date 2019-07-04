<?php

if (is_integer(mb_strpos($_SERVER['REQUEST_URI'], '/add'))) {
  echo json_encode(apiAddCart());
}
if (is_integer(mb_strpos($_SERVER['REQUEST_URI'], '/get'))) {
  if (isset($_GET))
    echo json_encode(apiGetCart($_GET['id']));
}
if (is_integer(mb_strpos($_SERVER['REQUEST_URI'], '/delete'))) {
  echo json_encode(apiDeleteCart());
}

function apiAddCart()
{
  if (!isset($_POST)) {
    die;
  }
  $cart = $_POST['cart'] ?? '';
  $productId = $cart['product_id'] ?? '';
  $qty = $cart['quantity'] ?? '';
  $cartId = $_COOKIE['idCart'] ?? false;

  function createCart($_product_id, $_qty)
  {
    $response = [
      'errors' => 0,
    ];
    $cart_id = addCart();
    if ($cart_id && !empty($_product_id) && !empty($_qty)) {
      addProductInCart($_product_id, $cart_id, $_qty);
      setcookie('idCart', $cart_id, time() + 60 * 60 * 24 * 7, '/');

    } else {
      $response['errors'] = 'Ошибка данных корзины';
    }
    $response['cart_id'] = $cart_id;
    return $response;
  }

  function updateCart($_cartId, $_product_id, $_qty)
  {
    $response = [
      'errors' => 0,
      'cart_id' => $_cartId
    ];
    {
      $cart = getCart($_cartId);
      if (isProductInCart($_product_id, $cart)) {
        increaseProductInCartQty($_product_id, $_cartId, $_qty);
      } else {
        addProductInCart($_product_id, $_cartId, $_qty);
      }
    }
    return $response;
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

  return $cartId ? updateCart($cartId, $productId, $qty) : createCart($productId, $qty);
}

function apiGetCart($id)
{
  return getCart($id);
}

function apiDeleteCart()
{
  if (!isset($_POST)) {
    die;
  }
  $response = ['errors' => 0];
  $cartId = $_POST['id'] ?? null;
  $cart = getCart($cartId);
  if (!($cart && deleteCart($cartId))) {
    $response['errors'] = 'Корзина не найдена';
  } else {
    setcookie('idCart', $cartId, time() - 100, '/');
  }
  return $response;
}