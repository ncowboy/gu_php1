<?php
if (isset($_COOKIE['idCart'])) {
  $cart = getCart($_COOKIE['idCart']);
}
?>
<div class="cart-content hidden">
  <?php ?>
  <?php if ($cart): ?>
    <?php $count = 0;
    $sum = 0; ?>
    <?php foreach ($cart as $item): ?>
      <?php $product = getProduct($item['product_id']) ?>
      <div class="cart-item">
        <div class="cart-item-img">
          <img src="uploads/<?= $product['img'] ?>" alt="<?= $product['name'] ?>">
        </div>
        <div class="cart-item-name"><?= $product['name'] ?></div>
        <div class="cart-item-qty"><?= $item['quantity'] ?></div>
        <div class="cart-item-sum"><?= $item['quantity'] * $product['price'] ?></div>
      </div>
      <?php $count += $item['quantity'];
      $sum += $item['quantity'] * $product['price'] ?>
    <?php endforeach; ?>
    <p class="text-center"><span class="cart-count"><?= $count ?></span> товаров на сумму <span
          class="cart-sum"><?= $sum ?></span> р. </p>
    <button class="cart-clear btn btn-danger mb-3" data-id="<?= $_COOKIE['idCart'] ?>">Очистить корзину</button>
    <a href="/checkout" class="btn btn-success mb-3">Оформить заказ</a>
  <?php endif; ?>
</div>
