<?php
include('../session.php');
require("../opener_db.php");

// $id = $_POST['proposal_id'];
$task_id = $_POST['task_id'];
$conn = $connector->DbConnector();

// $q = "SELECT * from tasks where class_id = '$class_id'";

// $result = mysqli_query($conn, $q);
// $row = mysqli_fetch_array($result);

// $id = $row['teacher_class_id'];

$input_name = basename($_FILES['file']['name']);
var_dump($input_name);
$rd2 = mt_rand(1000, 9999) . "_File";
$filename = basename($_FILES['file']['name']);
var_dump($filename);
$ext = substr($filename, strrpos($filename, '.') + 1);
$newname = "../admin/uploads/" . $rd2 . "_" . $filename;
$name_notification  = 'Added Task file name';
(move_uploaded_file($_FILES['file']['tmp_name'], $newname));
$newname =
     "admin/uploads/" . $rd2 . "_" . $filename;
mysqli_query($conn, "UPDATE tasks set ans_loc = '$newname'") or die();

header('location: ../fyp_student.php');
