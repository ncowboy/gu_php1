<?php

define('A_TAG_OPEN', '<a data-toggle="modal" data-target="#modal" href="#"');
define('A_TAG_CLOSE', '</a>');
define('IMG_TAG_OPEN', '<img width="200" class="img img-thumbnail" src="');
define('IMG_TAG_CLOSE', '">');
define('TYPE_ERROR', 'Неподдерживаемый тип файла. Допускаются форматы jpg, png, gif');
define('SUCCESS', 'Файл успешно загружен');
define('NO_FILE', 'Файл не выбран');
define('ERROR', 'Ошибка при загрузке файла');

$uploadFile = IMG_DIR . basename($_FILES['file']['name']);
$supportedTypes = ['png' => 'image/png', 'jpg' => 'image/jpeg', 'gif' => 'image/gif'];
$file = $_FILES['file'];
$tmp = $_FILES['file']['tmp_name'];


function galleryRender($path)
{
  if (!is_dir($path)) echo 'Директория не существует';
  $files = scandir($path);
  $result = '';
  if (isset($files)) {
    for ($i = 2; $i < count($files); $i++) {
      $imgUrl = IMG_DIR . $files[$i];
      $result .= A_TAG_OPEN . '>' . IMG_TAG_OPEN . $imgUrl . IMG_TAG_CLOSE . A_TAG_CLOSE;
    }
    return $result;
  }
}

filesUpload($uploadFile, $supportedTypes, $file, $tmp);

function filesUpload($_uploadFile, $_supportedTypes, $_file, $_tmp)
{
  if (isset($_file) && !empty($_tmp)) {
    if (!array_search(mime_content_type($_tmp), $_supportedTypes)) {
      $_FILES['file']['error'] = TYPE_ERROR;
    } elseif (move_uploaded_file($_tmp, $_uploadFile)) {
      $_FILES['file']['error'] = SUCCESS;
    } else {
      $_FILES['file']['error'] = ERROR;
    }
  } elseif (isset($_file) && empty($_tmp)) {
    $_FILES['file']['error'] = NO_FILE;
  }
}
 