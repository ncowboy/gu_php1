<?php

include './../engine/autoload.php';
autoload('./../config');

if ($_POST['age'] && $_POST['name'] && $_POST['lang'] ) {
	$name = $_POST['name'];
	$age = $_POST['age'];
	$lang = $_POST['lang'];


$INSERT_query = sprintf("INSERT INTO geekbrains.students (name, age, lang) VALUES (\"%s\", \"%s\", \"%s\")", $name, $age, $lang);

$insert_query = mysqli_query(myDB_connect(), $INSERT_query);

}

header('Location: /index.php');

die;