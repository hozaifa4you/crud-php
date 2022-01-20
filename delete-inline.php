<?php
$stu_id = $_GET['id'];

include './config.php';

$sql = "DELETE FROM students WHERE s_id = '{$stu_id}'";

$result =   mysqli_query($conn, $sql) or die('Query unsuccessful.');


// header('Location: http://localhost/crud/index.php');
header('Location: http://localhost/crud/index.php');

mysqli_close($conn);
