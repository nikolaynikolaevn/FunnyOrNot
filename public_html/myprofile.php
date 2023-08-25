<?php
session_start();
require_once 'php/db_config.php';
include "php/class/class.user.php";
$User = new User($pdo);
echo "<br><b>My profile details:</b><br><br>Username: ".$User->username."<br>Email:".$User->email."<br>Birthdate: ".$User->birthdate;
?>