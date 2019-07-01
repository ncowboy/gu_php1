<?php
$user = getUser($_SESSION['user_name']);
?>
<div class="row">
  <div class="col-md-4 offset-md-4">
    <h2>Привет, <?= $user['login'] ?>!</h2>
    <p>email: <?= $user['email'] ?></p>
    <form action="#" method="post">
      <button name="logout[submit]" type="submit" class="btn btn-outline-dark">Выход</button>
    </form>
  </div>
</div>
