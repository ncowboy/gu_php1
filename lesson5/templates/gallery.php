<?php filesUpload($uploadFile, $uploadTbFile, $supportedTypes, $file, $tmp);  ?>
<div class="container">
  <h2>Галерея</h2>
  <div class="row"><?= galleryRender($uploadTbDir);?></div>
  <form class="form-inline" role="form" enctype="multipart/form-data" method="post">
    <div class="form-group">
      <input type="file" name="file" id="file" >
      <p class="help-block"><?=$_FILES['file']['error']?></p>
    </div>
  </form>
</div>
