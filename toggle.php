<?php
include 'db.php';
$id = $_GET['id'];
// change status
$conn->query("UPDATE users SET status = IF(status='active','inactive','active') WHERE id=$id");
header("Location: index.php");
?>
