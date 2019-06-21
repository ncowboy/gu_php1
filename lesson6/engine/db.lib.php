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


function getProducts()
{
  $items = [];
  $sql = 'SELECT * FROM products';
  $result = result(connect(), $sql);
  while ($row = mysqli_fetch_assoc($result)) {
    $items[] = $row;
  }
  mysqli_close(connect());
  return $items;

}