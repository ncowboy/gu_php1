<?php
require_once ROOT_DIR . 'config/db.config.php';
function connect()
{
  return mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB);
}

function result($link, $sql)
{
  $res = mysqli_query($link, $sql) or die('Ошибка: ' . mysqli_error($link));
  return $res;
}

function getItems($table, $sort = false, $desc = false)
{
  $items = [];
  $sql = "SELECT * FROM {$table}";
  if ($sort) {
    $sql .= " ORDER BY {$sort}";
  }
  if ($desc) {
    $sql .= ' DESC';
  }
  $result = result(connect(), $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
  }
  mysqli_close(connect());
  return $items;
}

function getItemById($id, $table)
{
  $sql = "SELECT * FROM {$table} WHERE id = {$id}";
  $result = result(connect(), $sql);
  mysqli_close(connect());
  return mysqli_fetch_assoc($result);

}

function getItemByParam($param, $value, $table)
{
  $sql = "SELECT * FROM {$table} WHERE {$param}='{$value}'";
  $result = result(connect(), $sql);
  mysqli_close(connect());
  return mysqli_fetch_assoc($result);
}

function addItem($table, $values = null)
{
  $columns = '';
  $vals = '';
  if (isset($values)) {
    foreach ($values as $key => $value) {
      $columns .= $key . ', ';
      $vals .= '\'' . $value . '\'' . ', ';
    }
  }
  $columnsFormatted = mb_substr($columns, 0, mb_strlen($columns) - 2);
  $valsFormatted = mb_substr($vals, 0, mb_strlen($vals) - 2);
  $sql = "INSERT INTO {$table}({$columnsFormatted})";
  $sql .= " VALUES({$valsFormatted})";
  $connect = connect();
  if (result($connect, $sql)) {
    return mysqli_insert_id($connect);
  }
}

function deleteItem($id, $table)
{
  $sql = "DELETE FROM {$table} WHERE id = {$id}";
  if (result(connect(), $sql)) {
    return mysqli_close(connect());
  }
}

function updateItem($id, $table, $values)
{
  $sql = "UPDATE {$table} SET ";
  foreach ($values as $key => $value) {
    $sql .= "{$key}='{$value}', ";
  }
  $sqlFormatted = mb_substr($sql, 0, mb_strlen($sql) - 2);
  $sqlFormatted .= "WHERE id = {$id}";
  if (result(connect(), $sqlFormatted)) {
    return mysqli_close(connect());
  }
}

function getProducts($sort = false, $desc = false)
{
  return getItems('products', $sort, $desc);
}

function getFeedbacks($sort, $desc)
{
  return getItems('feedbacks', $sort, $desc);
}

function getProduct($id)
{
  return getItemById($id, 'products');
}

function getFeedback($id)
{
  return getItemById($id, 'feedbacks');
}

function addFeedback($values)
{
  return addItem('feedbacks', $values);
}

function addUser($values)
{
  return addItem('users', $values);
}

function addCart()
{
  return addItem('carts');
}

function getUser($login)
{
  return getItemByParam('login', $login, 'users');
}

function deleteFeedback($id)
{
  return deleteItem($id, 'feedbacks');
}

function updateFeedback($id, $values)
{
  return updateItem($id, 'feedbacks', $values);
}

function addProductInCart($productId, $cartId, $qty)
{
  $sql = "INSERT INTO products_in_cart(product_id, cart_id, quantity) VALUES ({$productId}, {$cartId}, {$qty})";
  if (result(connect(), $sql)) {
    return mysqli_close(connect());
  }
}

function getCart($id)
{
  $items = [];
  $sql = "SELECT * FROM products_in_cart WHERE cart_id={$id}";
  $result = result(connect(), $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
  }
  mysqli_close(connect());
  return $items;
}

function increaseProductInCartQty($product_id, $cart_id, $qty)
{
  $sql = "UPDATE products_in_cart SET quantity = quantity + {$qty} WHERE cart_id={$cart_id} AND product_id={$product_id}";
  if (result(connect(), $sql)) {
    return mysqli_close(connect());
  }

}

function calculateCartCount($id)
{
  $sql = "SELECT SUM(quantity) FROM products_in_cart WHERE cart_id={$id}";
    return mysqli_fetch_row(result(connect(), $sql))[0];
}