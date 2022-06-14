<?php

include 'dbcon.php';

$id = $POST['id'];

$q = "UPDATE fyp_proposal set id_approved = 1 where id='$id'";

mysqli_query($conn, $q);
