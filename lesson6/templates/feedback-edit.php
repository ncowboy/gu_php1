<?php
$id = $_GET['id'] ?? false;
?>
<?php if (!$id): ?>
  <div class="alert alert-danger" role="alert">
    Отсутствует обязательный параметр: id
  </div>
<?php endif; ?>
<?php $item = getFeedback($id) ?>
<?php if (is_null($item)): ?>
  <div class="alert alert-danger" role="alert">
    Элемент не найден
  </div>
<?php else: ?>
  <h1>Редактирование отзыва</h1>
  <form action="#" method="post">
    <div class="form-group">
      <input type="hidden" name="feedback-form-edit[id]" value="<?= $item['id'] ?>" required>
      <label for="feedBacksName">Имя</label>
      <input type="text" name="feedback-form-edit[name]" class="form-control" id="feedBacksName"
             value="<?= $item['name'] ?>" required>
    </div>
    <div class="form-group">
      <label for="feedBacksMessage">Текст сообщения</label>
      <textarea class="d-block" name="feedback-form-edit[message]" cols="37" rows="5" id="feedBacksMessage"
                required><?= $item['message'] ?></textarea>
    </div>
    <button name="feedback-form-edit[update]" type="submit" class="btn btn-primary">Сохранить</button>
  </form>
<?php endif; ?>




