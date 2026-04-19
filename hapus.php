<?php
require_once 'partials/database.php';
$db = new Database();
$db->delete($_GET['id']);
header("Location: index.php");
?>