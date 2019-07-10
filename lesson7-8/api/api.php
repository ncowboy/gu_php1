<?php

require_once ENGINE_DIR . 'db.lib.php';

if(is_integer(mb_strpos($_SERVER['REQUEST_URI'], '/api/cart'))){
  require_once API_DIR . 'cartApi.php';
}
