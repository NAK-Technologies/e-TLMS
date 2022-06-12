<?php
include '../dbcon.php';


$id = $_POST['id'];
$state = $_POST['state'];

mysqli_query($conn, "UPDATE teacher SET is_supervisor=$state where teacher_id=$id");
