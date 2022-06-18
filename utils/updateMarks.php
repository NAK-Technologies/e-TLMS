<?php
include '../dbcon.php';


$id = $_POST['id'];
$marks = $_POST['marks'];

$q = "UPDATE fyp_proposal set marks='$marks' where id='$id'";

if (mysqli_query($conn, $q)) {
     echo 'done';
} else {
     echo 'error';
}
