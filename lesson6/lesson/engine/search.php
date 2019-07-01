<?php

$search = $_GET['search'] ?? NULL;
$sort = $_GET['sort'] ?? NULL;
$order = "";
$searchBy = $_GET['searchBy'] ?? '';

function getSearchBy($searchBy, $search)
{
if (count($searchBy) == 1)
	return "$searchBy[0] LIKE \"%$search%\"";

	$getWhere = "";
	foreach ($searchBy as $key => $value) {
		if ($key == 0) {
			$getWhere .= "$value LIKE \"%$search%\"";
			continue;
		}
		$getWhere .= " OR $value LIKE \"%$search%\"";
	}

	return $getWhere;
}


switch ($sort) {
	case 1 :
		$order = order("id");
		break;
	case 2 :
		$order = order("id", false);
		break;
	case 3 :
		$order = order("name");
		break;
	case 4 :
		$order = order("name", false);
		break;
	case 5 :
		$order = order("age");
		break;
	case 6 :
		$order = order("age", false);
		break;
}

function order($name, $sort = true)
{
	if ($sort)
		return " ORDER BY students.{$name};";
	return " ORDER BY students.{$name} DESC;";
}

$SQL_query = "SELECT * FROM geekbrains.students";

if ($search) {
	$SQL_query .= " WHERE ".getSearchBy($searchBy, $search);

	$SQL_query .= $order;

}


$result = mysqli_query(myDB_connect(), $SQL_query);

$employess = [];
while ($result && $row = mysqli_fetch_assoc($result)) {
	$employess[] = $row;
}

