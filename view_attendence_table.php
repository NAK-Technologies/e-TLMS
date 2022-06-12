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
$query="select  distinct s.subject_id as subject, s.subject_code as subcode,s.subject_title as subtitle,t.firstname as teacher_name,t.teacher_id as teacherid from teacher t , subject s,teacher_class_student td where t.teacher_id=td.teacher_id and td.subject_id=s.subject_id and td.student_id=$get_id ";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);


if ($totalRows==0) {
	# code...
	echo "No Rows Found";
}
else{




	?>
	<form method="POST">
		<h2 style="text-align: center;">Attendence</h2>
	<table border="1" align="center" style="text-align:center;">
	<tr>
		<th>subjectid</th>
		<th> Subject Name</th>
		<th> Course Code</th>
		<th>Teacher Name</th>
		<th> Attendence</th>
	</tr>
	<?php
while ($show1 =mysqli_fetch_assoc($rows)){


$subject=$show1['subject'];
$teacher=$show1['teacherid'];
$subjectcode=$show1['subcode'];
$subjecttitle=$show1['subtitle'];
$teacher_n=$show1['teacher_name'];

?>

<?php
echo "<tr>
<td>". $subject."</td>
<td>".$subjectcode."</td>
<td>".$subjecttitle."</td>
<td>".$teacher_n."</td>
<td><a href='student_attendence_check.php?sub=$subject&id=$get_id&teach=$teacher'> View Attenedence</a></td>
</tr>";
 
}
}
?>
</table>
</form>
</body>
<?php include('footer.php'); ?>
<?php include('script.php'); ?>
</html>
