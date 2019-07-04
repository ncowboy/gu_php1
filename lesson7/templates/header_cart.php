<?php
if(isset($_COOKIE['idCart'])) {
  $cart = getCart($_COOKIE['idCart']);
}
?>
<div class="cart-content hidden">
  <?php if ($cart): ?>
    <?php foreach ($cart as $item): ?>
    <?php $product = getProduct($item['product_id']) ?>
      <div class="cart-item">
        <div class="cart-item-img">
          <img src="uploads/<?=$product['img']?>" alt="<?=$product['name']?>">
        </div>
        <div class="cart-item-name"><?=$product['name']?></div>
        <div class="cart-item-qty"><?=$item['quantity']?></div>
        <div class="cart-item-sum"><?= $item['quantity'] * $product['price']?></div>
        <a href="#" class="cart-item-delete"><i class="fas fa-times-circle"></i></a>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
