<?php
require_once(dirname(__FILE__) . '/../utils/init.php');

$_SESSION = array();

session_destroy();

header('location: /controllers/index-ctrl.php');

