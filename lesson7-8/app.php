<?php
require_once 'config/paths.config.php';
require_once ENGINE_DIR . 'autoload.php';
autoload(ENGINE_DIR);
if(is_integer(mb_strpos($_SERVER['REQUEST_URI'], '/api'))){
  require_once API_DIR . 'api.php';
} else {
  require_once TEMPLATES_DIR . '/layout.php';
}

