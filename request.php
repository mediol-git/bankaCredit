<?php
require("./mysql.php");
$hash = $_COOKIE['hash'];
$id = $_COOKIE['id'];
if (empty($hash) || empty($id) || !$bd->auth($id, $hash)) exit;

unset($_POST['agreement']);
$bd->insertData($id, $_POST);