<?php
define('ROOT_DIR', __DIR__ . '/lesson6/');

function myDB_connect () {

	$defaultConfig = require ROOT_DIR . 'config/db_configs/config.default.php';

	if (!file_exists(ROOT_DIR . 'config/db_configs/config.php')) {
		echo 'Создайте файл конфигурации';
		$localConfig = [];
	} else {
		$localConfig = require ROOT_DIR . 'config/db_configs/config.php';
	}

	$config = array_merge($defaultConfig, $localConfig);

		$mysqli = mysqli_connect(
		$config['db_host'],
		$config['db_user'],
		$config['db_pass'],
		$config['db_name']

	);

	return $mysqli;
}


myDB_connect();