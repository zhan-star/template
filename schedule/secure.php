<?php
session_start();
require_once 'autoload.php';
if (!isset($_SESSION['role']) || isset($_POST['out'])) {
session_destroy();
header('Location: template/login.php');
exit;
}