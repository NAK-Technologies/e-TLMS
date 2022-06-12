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
table {
  border-collapse: collapse;
  width: 100%;
}

th, td {
  text-align: left;
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

<?php $get_id = $_GET['id']; ?>
<?php 
include('dbcon.php');
$query="select * from attendence where student_id=220";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
echo $totalRows;
	?>
	<form method="POST">
	<table border="1" align="center" style="text-align:center;">
	<tr>
		<th>teacher_class_id</th>
		<th>student_id</th>
		<th>teacher_id</th>
		<th>Attendence</th>
		<th>Attendence_date</th>
	</tr>	
	
	<?php
while ($show =mysqli_fetch_assoc($rows)) {?> 		
<td><?php echo $show['subject_id']; ?></td>
<td><?php echo $show['student_id']; ?></td>
<td><?php echo $show['teacher_id']; ?></td>
<td><?php echo $show['atendence']; ?></td>
<td><?php echo $show['atendence_date']; ?></td>
</td></tr>
<?php }?>
</table>
</form>
</body>
</html>
