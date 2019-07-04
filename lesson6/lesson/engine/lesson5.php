<?php

$query = "SELECT * FROM geekbrains.students;";


$result = mysqli_query(myDB_connect(), $query);

$employess = [];
while ($row = mysqli_fetch_assoc($result)) {
	$employess[] = $row;
}

