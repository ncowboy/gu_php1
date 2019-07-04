<h1 class="text-center">Вход</h1>
<div class="row mt-5">
  <div class="col-md-4 offset-md-4">
    <form method="post">
      <div class="form-group">
        <input type="text" class="form-control" name="sign-in-form[login]" placeholder="Логин">
      </div>
      <div class="form-group">
        <input type="password" class="form-control" name="sign-in-form[password]" placeholder="Пароль">
      </div>
      <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" name="sign-in-form[remember]">
        <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
      </div>
      <button type="submit" name="sign-in-form[submit]" class="btn btn-primary">Войти</button>
    </form>
    <div class="text-danger">
      <?=$_SESSION['errors'][0] ?? ''?>
    </div>
  </div>
</div>

