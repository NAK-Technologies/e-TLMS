<?php include('dbcon.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id'];
 ?>
                                               <?php
$query="select teacher_id,subject_id from teacher_class where teacher_class_id=' $get_id' ";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
$totalRows=mysqli_num_rows($rows);
$show =mysqli_fetch_assoc($rows);
$subject_id=$show['subject_id'];
$teacher_id=$show['teacher_id'];
echo $subject_id."<br>";
echo $teacher_id."<br>";
?>