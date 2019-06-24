<h1>Отзывы</h1>
<hr>
<div class="row">
  <div class="col-md-8" style="height: 80vh; overflow: auto">
    <?php foreach (getFeedbacks('datetime', true) as $item): ?>
      <p class="text-muted font-italic"><?= $item['datetime'] ?> by <a href="#"><?= $item['name'] ?></a></p>
      <p><?= $item['message'] ?></p>
      <div class="d-flex">
        <form action="#" method="post">
          <input type="hidden" name="feedback-delete[id]" value="<?= $item['id'] ?>" required>
          <button name="feedback-delete[delete]" type="submit" class="btn btn-danger btn-sm" title="удалить"><i
                class="fas
        fa-trash-alt"></i></button>
        </form>
        <a class="btn btn-sm btn-success ml-1" href="/feedback-edit?id=<?= $item['id'] ?>" title="редактировать"><i
              class="fas fa-pen"></i></a>
      </div>
      <hr>
    <?php endforeach; ?>
  </div>
  <div class="col-md-4">
    <h3 class="text-center">Добавить отзыв</h3>
    <form action="#" method="post">
      <div class="form-group">
        <label for="feedBacksName">Имя</label>
        <input type="text" name="feedbacks-form[name]" class="form-control" id="feedBacksName" required>
      </div>
      <div class="form-group">
        <label for="feedBacksMessage">Текст сообщения</label>
        <textarea name="feedbacks-form[message]" cols="37" rows="5" id="feedBacksName" required></textarea>
      </div>
      <button name="feedbacks-form[submit]" type="submit" class="btn btn-primary">Отправить</button>
    </form>
  </div>
</div>

