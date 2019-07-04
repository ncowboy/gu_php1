<?php
$order = getOrder($_SESSION['created_order_id']);
$cart = getItemByParam('id_order', $order['id'], 'carts');
$orderSummary = getCart($cart['id']);
?>
<h1>Заказ №<?=$_SESSION['created_order_id']?> оформлен</h1>
<h2>Детали заказа: </h2>
<table class="table table-striped">
  <tr>
    <th>Имя</th>
    <td><?=$order['name']?></td>
  </tr>
  <tr>
    <th>Телефон</th>
    <td><?=$order['phone']?></td>
  </tr>
  <tr>
    <th>Адрес</th>
    <td><?=$order['address']?></td>
  </tr>
  <tr>
    <th>Информация</th>
    <td><?=$order['info']?></td>
  </tr>
</table>

<h2>Состав заказа: </h2>
<table class="table table-striped table-hover">
  <tr>
    <th>#</th>
    <th>Товар</th>
    <th>Цена</th>
    <th>Количество</th>
    <th>Стоимость</th>
  </tr>
  <?php $total = 0; ?>
  <?php foreach ($orderSummary as $key => $row):?>

    <tr>
      <th><?=$key + 1?></th>
      <th><?=$row['name']?></th>
      <th><?=$row['price']?> р.</th>
      <th><?=$row['quantity']?></th>
      <th><?=$row['price'] * $row['quantity']?> р.</th>
    </tr>
    <?php $total += $row['price'] * $row['quantity']; ?>
  <?php endforeach; ?>
</table>
<h3>Итого: <?=$total?> р.</h3>
