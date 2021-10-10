<?php
include '/opt/bitnami/db.php';
$name = $_POST["uname"];
$question = $_POST["que"];
$detail = $_POST["detail"];
$sql = "insert into forumtemp (name, question, detail) values ('$name', '$question', '$detail')";
$conn->query($sql);
$conn->close();
?>
