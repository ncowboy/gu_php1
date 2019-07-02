<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <title>Галерея изображений</title>
  <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="/css/style.css">
  <link rel="stylesheet" type="text/css" href="/css/fileinput.min.css">
  <script type="text/javascript" src="/js/jquery.min.js"></script>
  <script type="text/javascript" src="/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="/js/fileinput.min.js"></script>
</head>
  <body>
      <?php
      switch (uriController()) {
        case null: include_once 'gallery.php';
          break;
        case 'image': include_once 'image.php';
          break;
        default: include_once '404.php';
          break;
      }
      ?>
  <script type="text/javascript">
	$(function(){
		$("#file").fileinput({
			showPreview: false,
			browseLabel: 'Открыть...',
			removeLabel: 'Отменить',
			uploadLabel: 'Загрузить',
			msgPlaceholder: 'Выбрать файл...'
			});
		});
  </script>  
  </body>
</html>
