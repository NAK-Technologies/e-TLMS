<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style>
		.alert {
  padding: 20px;
  background-color: #f44336;
  color: white;
}
		.alert-success {
  padding: 20px;
  background-color: #008000;
  color: white;
}
		.update {
  text-decoration-color: white;
}
table {
  border-collapse: collapse;
  width: 50%;

}


th, td {
  text-align: center;
  padding: 8px;
}
tr:hover {background-color: #C5C6D0;}
.button2 {background-color: #008CBA; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
	</style>
</head>
<body>
	<?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
	
<?php 
include('dbcon.php');
$get_id=$_GET['id'];
$query="select  student_id,teacher_id,subject_id ,teacher_class_id from teacher_class_student where teacher_class_id=' $get_id' ";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
$show1 =mysqli_fetch_assoc($rows);
$subject=$show1['subject_id'];
$teacher=$show1['teacher_id'];




$query4="select t.firstname as teah_name1,t.lastname as teah_name2  from teacher t where t.teacher_id= $teacher  ";
$rows4=$conn-> query($query4);
$totalRows3=mysqli_num_rows($rows4);
$show3 =mysqli_fetch_assoc($rows4);
$teacher_name=$show3['teah_name1'];
$teacher_name2=$show3['teah_name2'];

$query5="select s.subject_code as subcode,s.subject_title as subtitle  from subject s where s.subject_id= $subject  ";
$rows5=$conn-> query($query5);
$totalRows4=mysqli_num_rows($rows5);
$show4 =mysqli_fetch_assoc($rows5);
$subjectcode=$show4['subcode'];
$subjecttitle=$show4['subtitle'];

if ($totalRows==0) {
	# code...
	echo "No Rows Found";
}
else{
	?>
	<form method="POST">
		<h2 style="text-align: center;">Attendence</h2>
		<h4>Course Code: <?php echo $subjectcode ?></h4>
		<h4>Course Title: <?php echo $subjecttitle ?></h4>
		<h5>Teacher Name: <?php echo $teacher_name. " ". $teacher_name2 ?></h5>
	<table border="1" align="center" style="text-align:center;">
	<tr>
		
		<th> Student Name</th>
		<th> Student id</th>
		<th> Attendence</th>
	</tr>	
	<?php 
	$query2="select s.student_id as std,s.firstname as studentname from student s, teacher_class_student td where td.student_id=s.student_id and td.subject_id='$subject' and td.teacher_id= '$teacher' and  td.teacher_class_id='$get_id'";
$rows2=$conn-> query($query2);
$totalRows2=mysqli_num_rows($rows2);
	
while ($show1 =mysqli_fetch_assoc($rows)) {

while ( $show2 =mysqli_fetch_assoc($rows2)) {

	?> 		
<tr><td><?php echo $show2['studentname']; ?></td>
<td ><?php echo $show2['std']; ?></td>
<td> present<input required type="radio" name="attendance[<?php echo $show2['std'] ?>]" value="present">
Absent<input required type="radio" name="attendance[<?php echo $show2['std'] ?>]" value="absent">
</td>
	</tr>
	<?php
}
}
if (isset($_POST['submit'])) {
 	
 	if ($_SERVER['REQUEST_METHOD']=='POST') {
 			# code...
 		$date=date('d-m-y');
 		$att=$_POST['attendance'];
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
 					echo "<div class='alert'>
 					 Attendence  already taken!!!;
 					 </div>";

 					
 				}
 			}
 		}
 		
 			if (!$b) {
 				foreach ($att as $key=> $value) {
 	if($value=='present'){

 						$query5="insert into attendance(teacher_class_id,student_id,teacher_id,subject_id,atendence,atendence_date	) values($get_id,$key,$teacher,$subject,'$value','$date')";
 					$insertResult=$conn-> query($query5);

 			}
 			else{
 				$query5="insert into attendance(teacher_class_id,student_id,teacher_id,subject_id,atendence,atendence_date	) values($get_id,$key,$teacher,$subject,'$value','$date')";
 					$insertResult=$conn-> query($query5);

 		}
 	}
 			
 		
 		if ($insertResult) {
 				# code...
 				echo "<div class='alert alert-success'>
 					 Attendence   taken!!!
 					 </div> ";
 			}
 			else{
 			echo "<div class='alert'>
 					 Attendence  not taken!!!;
 					 </div> ";

 		}
 	}
 }



}
}

?>
</table>
<button  type="submit" name="submit" value="Save" class="button2">Save </button>
<button  type="submit" name="update" value="Update" class="button2 "> 
<a onclick="window.open('updateattendence.php<?php echo '?id='.$get_id;  ?>')" style="color: white" >update</a></button>
</form>
</body>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
</html>
