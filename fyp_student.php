<?php
include 'dbcon.php';
include 'header_dashboard.php';
include 'session.php';


$q = "select * from teacher where is_supervisor=1 and project_count < 3";
$run = mysqli_query($conn, $q);
$q = "SELECT * from student where student_id = '$session_id'";
$result = mysqli_query($conn, $q);
$row = mysqli_fetch_array($result);
$class_id = $row['class_id'];


$q = "SELECT * from tasks where class_id = '$class_id' order by id desc limit 1";
$result = mysqli_query($conn, $q);
$task = mysqli_fetch_array($result);
?>

<body>
     <?php include 'navbar_student.php'; ?>
     <div style="margin: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
          <?php if (mysqli_num_rows($result) < 1) { ?>
               <form action="students_proposal_submit.php" enctype="multipart/form-data" method="post">
                    <h3>SUBMIT PROJECT PROPOSAL</h3>
                    <div style="display: flex; gap: 10px;flex-wrap: wrap; width: 500px">
                         <input type="hidden" name="class_id" value="<?php echo $row['class_id'] ?>">
                         <div>
                              <input class="form-control" placeholder="Project Name" type="text" name="name">
                         </div>
                         <div>
                              <input class="form-control" placeholder="Student1 ID" required type="text" name="s1_id">
                         </div>
                         <div>
                              <input class="form-control" placeholder="Student2 ID" required type="text" name="s2_id">
                         </div>
                         <div>
                              <input class="form-control" placeholder="Student3 ID" required type="text" name="s3_id">
                         </div>
                         <div>
                              <input class="form-control" placeholder="Student4 ID" type="text" name="s4_id">
                         </div>
                         <div>
                              <input class="form-control" placeholder="Student5 ID" type="text" name="s5_id">
                         </div>
                         <div>
                              <input class="form-control" type="file" name="proposal">
                         </div>
                         <div>
                              <select name="teacher">
                                   <?php while ($row = mysqli_fetch_array($run)) { ?>
                                        <option value="<?php echo $row['teacher_id'] ?>"><?php echo $row['firstname'] . ' ' . $row['lastname']; ?></option>
                                   <?php } ?>
                              </select>
                         </div>
                         <div style="text-align: center; width: 100%;">
                              <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                         </div>
                    </div>
               </form>
          <?php } else { ?>
               <a href="<?php echo $task['location']; ?>" download>Download Task File</a>
               <form action="utils/submit_task.php" method="post" enctype="multipart/form-data">
                    <h3>SUBMIT Task</h3>
                    <div style="display: flex; gap: 10px;flex-wrap: wrap; width: 500px">
                         <input type="hidden" name="task_id" value="<?php echo $task['id'] ?>">
                         <div>
                              <input class="form-control" type="file" name="file">
                         </div>
                         <div style="text-align: center; width: 100%;">
                              <input class="btn btn-primary" type="submit" value="Submit" name="send">
                         </div>
                    </div>
               </form>
          <?php } ?>
     </div>

</body>