<div class="navbar navbar-fixed-top navbar-inverse">
	<div class="navbar-inner">
		<div class="container-fluid">
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span>
				<span class="icon-bar"></span><span class="icon-bar"></span>
			</a>
			<a class="brand" href="#">Welcome to: Online Training Learning Management System</a>
			<div class="nav-collapse collapse">
				<ul class="nav pull-right">
					<?php $query = mysqli_query($conn, "select * from student where student_id = '$session_id'") or die();
					$row = mysqli_fetch_array($query);
					?>
					<li class="dropdown">
						<a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i><?php echo $row['firstname'] . " " . $row['lastname'];  ?> <i class="caret"></i></a>
						<ul class="dropdown-menu">
							<li><a tabindex="-1" href="change_password_student.php"><i class="icon-circle"></i> Change Password</a></li>
							<li><a tabindex="-1" href="#myModal_student" data-toggle="modal"><i class="icon-picture"></i> Change Avatar</a></li>
							<li class="divider"></li>
							<li>
								<a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
							</li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
	</div>
</div>
<?php
$path = explode('/', $_SERVER['REQUEST_URI']);
$path = end($path);
$path = explode('.', $path);
$path = $path[0];
// echo $path;
if ($path != 'fyp_student') {


	$q = "SELECT * from student inner join class on student.class_id=class.class_id  where student_id = '$session_id' and class.has_assignment = 1";
	$r = mysqli_query($conn, $q);
	if (mysqli_num_rows($r) > 0) {
?>
		<span onclick="window.location.href = 'fyp_student.php'" style="height: 50px; width: 50px; display: flex; justify-content: center; align-items: center; border-radius: 50%; background-color: #3388ff; box-shadow: 2px 2px 5px #33333373; color: white; position: fixed; bottom: 100px; left: 100px; cursor: pointer;"><i class="icon-book"></i> <b style="color: black;"></span>
<?php }
} ?>
<?php include('avatar_modal_student.php'); ?>