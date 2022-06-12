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

	</style>
</head>
<body>
<?php 
include('dbcon.php');
$query="select * from teacher_class ";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
//echo $totalRows;
	?>
	<form method="POST">
	<table border="1" align="center" style="text-align:center;">
	<tr>
		<th>teacher_class_student_id</th>
		<th>teacher_class_id</th>
		<th>subject_id</th>
		<th>teacher_id</th>
		<th>student_id</th>
		<th>Attendence</th>
	</tr>	
	
	<?php
while ($show =mysqli_fetch_assoc($rows)) {


?> 		
<tr><td><?php echo $show['teacher_id']; ?></td>
<td ><?php echo $show['teacher_class_id']; ?></td>
<td ><?php echo $show['subject_id']; ?></td>
<td><?php echo $show['teacher_id']; ?></td>
<td><?php echo $show['student_id']; ?></td>
<td> present<input required type="radio" name="attendance[<?php echo $show['student_id']?>]" value="present">
Absent<input required type="radio" name="attendance[<?php echo $show['student_id'] ?>]" value="absent">
</td></tr>

<?php }

 ?>


<?php
 if (isset($_POST['submit'])) {
 	
 	if ($_SERVER['REQUEST_METHOD']=='POST') {
 			# code...
 		$date=date('d-m-y');
 		$att=$_POST['attendance'];

 		$query="select distinct attendence_date from teacher_class_student";
 		$rows=$conn -> query($query);
 		$b=false;
 		if ($rows-> num_rows>0) {
 			# code...
 			while ($check=$rows-> fetch_assoc()) {
 				# code...
 				if ($date==$check['attendence_date']) {
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

 					
	echo $value ."<br>";
 					echo $key."<br>";


}
			else{
 					
 				
 					echo $value ."<br>";
 					echo $key."<br>";



}
}
 			}
 			
 		
 		
 	}
 }

?>
</table>
<input type="submit" name="submit" value="Get Values">
</form>
</body>
</html>
