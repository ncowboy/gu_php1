<h1>Отзывы</h1>
<hr>
<div class="row">
  <div class="col-md-8" style="height: 80vh; overflow: auto">
    <?php foreach (getFeedbacks('datetime', true) as $item):?>
    <p class="text-muted font-italic"><?=$item['datetime']?> by <a href="#"><?=$item['name']?></a></p>
    <p><?=$item['message']?></p>
      <hr>
    <?php endforeach; ?>
  </div>
  <div class="col-md-4">
    <h3 class="text-center">Добавить отзыв</h3>
      <?php include_once 'feedbacks-form.widget.php'; ?>
  </div>

</div>

