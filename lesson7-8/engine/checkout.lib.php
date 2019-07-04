<?php
require_once ENGINE_DIR . 'db.lib.php';
session_start();
$checkoutForm = $_POST['checkout-form'];
$id_user = $checkoutForm['id_user'] ?? '';
$name = $checkoutForm['name'] ?? '';
$phone = $checkoutForm['phone'] ?? '';
$address = $checkoutForm['address'] ?? '';
$info = $checkoutForm['info'] ?? '';


if ($checkoutForm && isset($checkoutForm['submit']) && checkoutFormValidate($id_user, $name, $phone, $address, $info)
) {
  $idOrder = addOrder([
    'id_user' => $id_user,
    'name' => $name,
    'phone' => $phone,
    'address' => $address,
    'info' => $info
  ]);
  $_SESSION['created_order_id'] = $idOrder;

  if (updateItem($_COOKIE['idCart'], 'carts', [
    'id_order' => $idOrder,
    'status' => 2
  ])) {
    setcookie('idCart', $_COOKIE['idCart'], time() - 1, '/');
  }

  header('Location: /orderConfirm');
}

function checkoutFormValidate($_name, $_id_user, $_phone, $_address, $_info)
{
  if (empty($_name) || empty($_id_user) || empty($_phone) || empty($_address) || empty($_info)) {
    $_SESSION['errors'][] = 'Обязательное поле не заполнено';
  }
  return empty($_SESSION['errors']);
}

session_write_close();