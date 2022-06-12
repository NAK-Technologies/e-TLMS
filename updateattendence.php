<!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
   <!DOCTYPE html>
<html>
<head>
  <title></title>
  <style>
    .alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
  text-align: center;
}
    .alert-success {
  padding: 20px;
  background-color: #008000;
  color: white;
  text-align: center;
}
    .update {
  text-decoration-color: white;
}
table {
  border-collapse: collapse;
  width: 50%;

}
h5,h4{
  text-align: center; }


th, td {
  text-align: center;
  padding: 8px;
}
tr:hover {background-color: #C5C6D0;}
.button2 {
  background-color: #008CBA; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  font-size: 16px;
  cursor: pointer;
   margin-top: 2%;
   border-radius: 5px;

}
.center {
  display: inline;
  justify-content: center;
 padding: 15px 32px;
 margin-left: 38%;


}
  </style>
</head>
<body>
  <?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
  
<?php 
include('dbcon.php');
$get_id=$_GET['id'];
$query="select  student_id,teacher_id,subject_id ,teacher_class_id from teacher_class_student where teacher_class_id=$get_id ";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
$show1 =mysqli_fetch_assoc($rows);
$subject=$show1['subject_id'];
$teacher=$show1['teacher_id'];
if ($totalRows==0) {
  # code...
  echo "No Rows Found";
}
else{
  ?>
  <form method="POST">
  <table border="1" align="center" style="text-align:center;">
  <tr>
    
    <th> Student Name</th>
    <th> Student id</th>
    <th> Attendence</th>
  </tr> 
  
  <?php
   $query2="select s.student_id as std,s.firstname as studentname from student s, teacher_class_student td where td.student_id=s.student_id and td.subject_id='$subject' and td.teacher_id= '$teacher'";
$rows2=$conn-> query($query2);
$totalRows2=mysqli_num_rows($rows2); 
while ($show1 =mysqli_fetch_assoc($rows)) {



while (
$show2 =mysqli_fetch_assoc($rows2)) {

  ?>    
<tr><td><?php echo $show2['studentname']; ?></td>
<td ><?php echo $show2['std']; ?></td>
<td> present<input required type="radio" name="attendance_update[<?php echo $show2['std'] ?>]" value="present">
Absent<input required type="radio" name="attendance_update[<?php echo $show2['std'] ?>]" value="absent">
</td>
  </tr>
  <?php
}
}
if (isset($_POST['submit'])) {
  
  if ($_SERVER['REQUEST_METHOD']=='POST') {
      # code...
    $date=date('d-m-y');
    $att=$_POST['attendance_update'];
    //$arr=array();
    $query="select distinct atendence_date,teacher_id,subject_id from attendance";
    $rows=$conn -> query($query);
    $b=false;
    if ($rows-> num_rows>0) {
      # code...
      while ($check=$rows-> fetch_assoc()) {
        # code...
        if ($date==$check['atendence_date'] && $teacher==$check['teacher_id'] && $subject==$check['subject_id']) {
          # code...

          $b=true;
          foreach ($att as $key=> $value) {
        $query="update  attendance set teacher_id=$teacher,subject_id=$subject,atendence='$value',atendence_date='$date' where student_id=$key and atendence_date='$date' " ;
          $insertResult=$conn-> query($query);
        }  
    
    if ($insertResult) {
        # code...
        echo "<div class='alert alert-success'>
           Attendence     Updated!!!
           </div> ";
      }
      else{
      echo "<div class='alert'>
           Attendence  not Updated!!!           </div> ";

    }
          
        }
      }
    }
    
      if (!$b) {
 echo "<div class='alert'>
           Attendence cannot be  Updated!!!           </div> ";

  }
 }



}
}

?>
</table>
<div class="center">
<button  type="submit" name="submit" value="Save" class="button2">Save </button>
</div>
</form>
</body>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
</html>
