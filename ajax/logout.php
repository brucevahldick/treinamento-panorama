<?php
require_once '../header.php';
require_once '../model/Session.php';

$session = new Session();
$session->logOutUser();
header("Location: ../login.php");