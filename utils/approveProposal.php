<?php

include '../dbcon.php';

$id = $_POST['id'];

$q = "UPDATE fyp_proposal set is_approved = 1 where id='$id'";

mysqli_query($conn, $q);
