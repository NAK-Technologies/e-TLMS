<?php
include('../session.php');
require("../opener_db.php");

$id = $_POST['proposal_id'];
$class_id = $_POST['class_name'];
$conn = $connector->DbConnector();

$q = "SELECT * from teacher_class where class_id = '$class_id'";

$result = mysqli_query($conn, $q);
$row = mysqli_fetch_array($result);

$id = $row['teacher_class_id'];

$input_name = basename($_FILES['file']['name']);
var_dump($input_name);
$rd2 = mt_rand(1000, 9999) . "_File";
$filename = basename($_FILES['file']['name']);
var_dump($filename);
$ext = substr($filename, strrpos($filename, '.') + 1);
$newname = "../admin/uploads/" . $rd2 . "_" . $filename;
$name_notification  = 'Add Task file name';
(move_uploaded_file($_FILES['file']['tmp_name'], $newname));
$newname =
     "admin/uploads/" . $rd2 . "_" . $filename;
mysqli_query($conn, "INSERT INTO tasks (location,class_id) VALUES ('$newname','$class_id')") or die();
mysqli_query($conn, "insert into notification (teacher_class_id,notification,date_of_notification,link) value('$id','$name_notification',NOW(),'fyp_student.php')") or die();

header('location: ../fyp_teacher.php');
