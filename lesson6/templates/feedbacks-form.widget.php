<?php
$name = $_POST['name'] ?? '';
$message = $_POST['message'] ?? '';

if ($_POST && isset($_POST['submit']) && $name && $message && addFeedback([
        'name' => $name,
        'message' => $message
    ])) {
    header('Location: /feedbacks');
}

?>

<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Имя</label>
    <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Текст сообщения</label>
    <textarea name="message" cols="37" rows="5" required></textarea>
  </div>
  <button name="submit" type="submit" class="btn btn-primary">Отправить</button>
</form>

