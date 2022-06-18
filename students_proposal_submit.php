<?php
include 'dbcon.php';

if (isset($_POST['submit'])) {
     $s1 = $_POST['s1_id'];
     $s2 = $_POST['s2_id'];
     $s3 = $_POST['s3_id'];
     $s4 = $_POST['s4_id'];
     $s5 = $_POST['s5_id'];
     $class_id = $_POST['class_id'];
     $teacher = $_POST['teacher'];
     if ($s4 == '') {
          $s4 = 0;
     }
     if ($s5 == '') {
          $s5 = 0;
     }
     $name = $_POST['name'];
     // var_dump($s4, $s5);
     $image = addslashes(file_get_contents($_FILES['proposal']['tmp_name']));
     $image_name = addslashes($_FILES['proposal']['name']);
     $image_size = getimagesize($_FILES['proposal']['tmp_name']);
     move_uploaded_file($_FILES["proposal"]["tmp_name"], "admin/uploads/projects/" . $_FILES["proposal"]["name"]);
     $location = "uploads/projects/" . $_FILES["proposal"]["name"];
     // echo ($location);

     $q = "INSERT INTO fyp_proposal (student1_id, student2_id, student3_id, student4_id, student5_id, project_name, proposal_file, teacher_id, class_id) values ($s1,$s2,$s3,$s4,$s5,'$name','$location','$teacher', $class_id)";

     if (mysqli_query($conn, $q)) {
          echo 'done';
          header('location: fyp_student.php');
     } else {
          echo 'error';
     }
}
