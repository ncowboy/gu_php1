<?php

function getRoute()
{
  $uri = $_SERVER['REQUEST_URI'];
  $requestDelimiter = stripos($uri, '?');
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
    default:
      $template = 'catalog.php';
      break;
  }
  return $template;
}