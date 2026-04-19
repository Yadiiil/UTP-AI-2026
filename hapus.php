<?php
require_once 'database/database.php';
$db = new Database();
$db->delete($_GET['id']);
header("Location: index.php");
?>