<?php

include '../dbcon.php';
include '../session.php';

$id = $_POST['id'];

$q = "SELECT project_count from teacher where teacher_id='$session_id'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_array($result);
if ((int)$row['project_count'] < 3) {

     $count = (int) $row['project_count'] + 1;

     $q = "UPDATE fyp_proposal set is_approved = 1 where id='$id'";


     if (mysqli_query($conn, $q)) {

          echo 'done';
          $q = "UPDATE teacher set project_count='$count' where teacher_id = '$session_id'";
          mysqli_query($conn, $q);
     } else {
          echo 'error';
     }
} else {
     echo 'limit';
}
