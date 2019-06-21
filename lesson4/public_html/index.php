<?php
require_once __DIR__ . '/../config/config.php';
require_once ENGINE . 'main.php';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Галерея изображений</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</head>
  <body>
	<div class="container">
      <h2>Галерея</h2>
	  <div><?=galleryRender(IMG_DIR);?></div>
	  <form enctype="multipart/form-data" method="post">
	    <div class="form-group">
          <input type="file" name = "file">
          <p class="help-block"><?=$_FILES['file']['error']?></p>
        </div>
		<button type="submit" class="btn btn-primary">Загрузить</button>
	  </form>
	</div>
    <div class="modal fade" id="modal">
	  <div class="modal-dialog">
		<div class="modal-content">
		  <div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		  </div>
		<div class="modal-body"></div>
	    </div><!-- /.modal-content -->
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->	  
  <script type="text/javascript" src="js/imgFull.js"></script>
  </body>
</html>
