<?php
require_once(dirname(__FILE__) . '/../utils/init.php');
require_once(dirname(__FILE__) . '/../models/Users.php');

$id = intval(trim(filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT)));
$users = new Users();
$delete = $users->delete($id);

header('Location: /controllers/admin-profile-ctrl.php');
?>