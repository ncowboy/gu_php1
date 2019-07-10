<h1 class="text-center">Регистрация</h1>
<div class="row mt-5">
  <div class="col-md-4 offset-md-4">
    <form method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="sign-up-form[login]" placeholder="Логин">
      </div>
      <div class="form-group">
        <input type="text" class="form-control" name="sign-up-form[name]" placeholder="Имя">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="sign-up-form[email]" placeholder="email">
      </div>
      <div class="form-group">
        <input type="email" class="form-control" name="sign-up-form[email-repeat]" placeholder="Повторите email">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="sign-up-form[password]" placeholder="Пароль">
      </div>
      <button type="submit" name="sign-up-form[submit]" class="btn btn-success">Зарегистрироваться</button>
    </form>
    <div class="text-danger">
      <?php if (isset($_SESSION['errors'])): ?>
        <?php foreach ($_SESSION['errors'] as $error): ?>
          <p><?= $error ?></p>
        <?php endforeach; ?>
      <?php endif; ?>
    </div>
  </div>
</div>
