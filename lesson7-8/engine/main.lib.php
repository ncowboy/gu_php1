<?php

if($_SERVER['REQUEST_URI'] === '/checkout' && !$_SESSION['isAuth']) {
  header('Location: /login');
}

if($_SERVER['REQUEST_URI'] === '/orderConfirm' && !$_SESSION['created_order_id']) {
  header('Location: /catalog');
}

function getRoute()
{
  $uri = $_SERVER['REQUEST_URI'];
  $requestDelimiter = mb_stripos($uri, '?');
  if ($requestDelimiter) {
    return mb_substr($uri, 0, $requestDelimiter);
  } else {
    return $uri;
  }
}

function getTemplate()
{
  $template = null;
  switch (getRoute()) {
    case '/product':
      $template = 'product-description.php';
      break;
    case '/feedbacks':
      $template = 'feedbacks.php';
      break;
    case '/feedback-edit':
      $template = 'feedback-edit.php';
      break;
    case '/login':
      $template = 'login.php';
      break;
    case '/register':
      $template = 'register.php';
      break;
    case '/profile':
      $template = 'profile.php';
      break;
    case '/checkout':
      $template = 'checkout.php';
      break;
    case '/orderConfirm':
      $template = 'order-confirm.php';
      break;
    default:
      $template = 'catalog.php';
      break;
  }
  return $template;
}