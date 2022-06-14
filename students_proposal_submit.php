<?php
include 'dbcon.php';

if (isset($_POST['submit'])) {
     $s1 = $_POST['s1_id'];
     $s2 = $_POST['s2_id'];
     $s3 = $_POST['s3_id'];
     $s4 = $_POST['s4_id'];
     $s5 = $_POST['s5_id'];
     $name = $_POST['name'];

     $image = addslashes(file_get_contents($_FILES['proposal']['tmp_name']));
     $image_name = addslashes($_FILES['proposal']['name']);
     $image_size = getimagesize($_FILES['proposal']['tmp_name']);

     move_uploaded_file($_FILES["proposal"]["tmp_name"], "admin/uploads/projects/" . $_FILES["proposal"]["name"]);
     $location = "uploads/projects/" . $_FILES["proposal"]["name"];

     $q = "INSERT INTO fyp_proposal (student1_id, student2_id, student3_id, student4_id, student5_id, project_name, proposal_file) values ('$s1','$s2','$s3','$s4','$s5','$name','$location')";

     if (mysqli_query($conn, $q)) {
          echo 'done';
     } else {
          echo 'error';
     }
}
