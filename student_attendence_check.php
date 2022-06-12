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
h5,h4{
  text-align: center; }


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
  cursor: pointer;
}

  </style>
</head>
<body>
  <?php include('header_dashboard.php'); ?>
<?php include('session.php'); ?>
  
<?php 
include('dbcon.php');
$id=$_GET['id'];
$std_sub=$_GET['sub'];
$std_teach=$_GET['teach'];
$query="select * from attendance where student_id=$id and subject_id=$std_sub and teacher_id=$std_teach";
$rows=$conn-> query($query);
$totalRows=mysqli_num_rows($rows);
  ?>
  <form method="POST">
<table border="1" align="center" style="text-align:center;">
  <h2 style="text-align: center;">Attendence</h2>
  <tr>
    <th>Attendence_date</th>
      <th>Attendence</th>
  </tr> 
  
  <?php
while ($show =mysqli_fetch_assoc($rows)) {?>    
<td><?php echo $show['atendence_date']; ?></td>
<td><?php echo $show['atendence']; ?></td>
</td></tr>
<?php }?>
</table>
</form>
</body>
</html>
