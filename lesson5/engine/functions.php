<?php

require_once 'db.php';
require_once 'resize.php';

define('A_TAG', '<div class="image col-md-3"><a target="_blank" href="image?id=');
define('IMG_TAG', '<img class="img img-thumbnail" src="');
define('COUNT_OPEN', '<div>Количество просмотров: <span class="badge">');
define('COUNT_CLOSE', '</span></div></div>');
define('TYPE_ERROR', 'Неподдерживаемый тип файла. Допускаются форматы jpg, png, gif');
define('SUCCESS', 'Файл успешно загружен');
define('NO_FILE', 'Файл не выбран');
define('ERROR', 'Ошибка при загрузке файла');

$file = $_FILES['file'];
$uploadDir = 'img/';
$uploadTbDir = 'img/thumbs/';
$uploadFile = $uploadDir . basename($file['name']);
$uploadTbFile = $uploadTbDir . 'resized_' . basename($file['name']);
$supportedTypes = ['png' => 'image/png', 'jpg' => 'image/jpeg', 'gif' => 'image/gif'];
$tmp = $file['tmp_name'];

function galleryRender($_uploadTbDir)
{
  $images = getImages();
  if (isset($images)) {
    foreach ($images as $img) {
      echo A_TAG . $img['id'] . '">' . IMG_TAG . urldecode($_uploadTbDir . $img['thumb_name']) . '"></a>' .
        COUNT_OPEN . $img['count'] . COUNT_CLOSE;
    }
  }
}

function filesUpload($_uploadFile, $_uploadTbFile, $_supportedTypes, $_file, $_tmp)
{
  if (isset($_file) && !empty($_tmp)) {
    if (!array_search(mime_content_type($_tmp), $_supportedTypes)) {
      $_FILES['file']['error'] = TYPE_ERROR;
    } elseif (create_thumbnail($_tmp, $_uploadTbFile, 200, 200) && move_uploaded_file($_tmp, $_uploadFile) && addImageIntoDb($_file['name'], $_file['size'])) {
      $_FILES['file']['error'] = SUCCESS;
    } else {
      $_FILES['file']['error'] = ERROR;
    }
  } elseif (isset($_file) && empty($_tmp)) {
    $_FILES['file']['error'] = NO_FILE;
  }
}

function uriController()
{
  $uriArr = explode('/', $_SERVER['REQUEST_URI']);
  $requestDelimiter = stripos($uriArr[1], '?');
  if ($requestDelimiter) {
    return mb_substr($uriArr[1], 0, $requestDelimiter);
  } else {
    return $uriArr[1];
  }
}

function renderImage($_uploadDir)
{
  if (isset($_GET['id'])) {
    $image = getImage($_GET['id']);
    echo '<img class="img img-responsive" src="' . $_uploadDir . $image['name'] . '">';
    $image['count']++;
    increaseCount($image['id'], $image['count']);
  }
} 
 