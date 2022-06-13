<?php
include '../dbcon.php';

$state = $_POST['state'];
$id = $_POST['class_id'];

$q = "UPDATE class set has_assignment = $state where class_id = '$id'";

if (mysqli_query($conn, $q)) {
     echo 'true';
} else {
     echo 'false';
}
