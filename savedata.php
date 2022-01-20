<?php
$stu_name = $_POST['sname'];
$stu_address = $_POST['saddress'];
$stu_class = $_POST['class'];
$stu_phone = $_POST['sphone'];

$conn = mysqli_connect('localhost', 'root', '', 'crud') or die('Database connection failed!');

$sql = "INSERT INTO students(s_name, s_address, s_class, s_phone) VALUES ('{$stu_name}', '{$stu_address}', '{$stu_class}', '{$stu_phone}')";

$result = mysqli_query($conn, $sql) or die('Query failed');


header('Location: http://localhost/crud/index.php');

mysqli_close($conn);
