<?php
$user = getUser($_SESSION['user_name']);
?>
<h1>Оформление заказа</h1>
<div class="row mt-5">
  <div class="col-md-4 offset-md-4">
    <form method="post">
      <input type="hidden" name="checkout-form[id_user]" value="<?=$user['id']?>">
      <div class="form-group">
        <input type="text" class="form-control" name="checkout-form[name]" placeholder="Имя"
               value="<?= $user['name'] ?>">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="checkout-form[phone]" placeholder="Телефон">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="checkout-form[address]" placeholder="Адрес">
      </div>
      <div class="form-group">
        <textarea cols="50" rows="7" name="checkout-form[info]" placeholder="Дополнительная информация"></textarea>
      </div>
      <button type="submit" name="checkout-form[submit]" class="btn btn-primary">Оформить</button>
    </form>
    <div class="text-danger">
      <?= $_SESSION['errors'][0] ?? '' ?>
    </div>
  </div>



