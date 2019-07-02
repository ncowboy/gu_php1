<div class="container">
  <?php getImage($_GET['id']) ? renderImage($uploadDir) : include_once '404.php'; ?> 
</div>
