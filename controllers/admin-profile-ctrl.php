<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Users.php');

$id=intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$users = Users::read();

include(dirname(__FILE__).'/../views/templates/header.php');
include(dirname(__FILE__).'/../views/admin-profile.php');
include(dirname(__FILE__).'/../views/templates/footer.php');
?>