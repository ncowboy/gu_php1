<?php
require_once '../config/config.php';

function addImageIntoDb($file, $size){
  $connect = mysqli_connect(HOST, USER, PASS, DB);
  $result = mysqli_query($connect, "INSERT INTO images(name, thumb_name, size)VALUES('$file', 'resized_$file', '$size')");
  mysqli_close($connect);
  return $result;
}

function getImages(){
  $connect = mysqli_connect(HOST, USER, PASS, DB);
  $result = mysqli_query($connect, "SELECT * FROM images ORDER BY count DESC");
  $images = [];
  while($row = mysqli_fetch_assoc($result)){
    $images[] = $row;
  }
  mysqli_close($connect);
  return $images;
}

function getImage($id){
  $connect = mysqli_connect(HOST, USER, PASS, DB);
  $result = mysqli_query($connect, "SELECT * FROM images WHERE id={$id}");
  mysqli_close($connect);
  return mysqli_fetch_assoc($result); 
}

function increaseCount($id, $count){
  $connect = mysqli_connect(HOST, USER, PASS, DB);
  $result = mysqli_query($connect, "UPDATE images SET count={$count} WHERE id={$id}");
  mysqli_close($connect);
  return $result;
}

