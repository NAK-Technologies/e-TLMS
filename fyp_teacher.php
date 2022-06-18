<?php
include 'header_dashboard.php';
include 'dbcon.php';
include 'session.php';
?>

<body>



     <?php include 'navbar_teacher.php'; ?>
     <div class="container-fluid">
          <?php
          if (@$_GET['approved'] == 'true') {

               $q = "SELECT * from fyp_proposal where teacher_id='$session_id' and is_approved=1";
               $proposals = mysqli_query($conn, $q);
          } else {

               $q = "SELECT * from fyp_proposal where teacher_id='$session_id'";
               $proposals = mysqli_query($conn, $q);
          } ?>
          <form action="" method="get"><input type="hidden" name="approved" value="true"><input type="submit" value="Approved Projects" class="btn btn-primary"></form>


          <form action="utils/add_task.php" method="post" enctype="multipart/form-data" id="task_upload" style="display: none">
               <input type="hidden" id='proposal_id' name="proposal_id" value="">
               <input type="hidden" id='class_id' name="class_name" value="">
               <input type="file" name="file">
               <input type="submit" value="Add">
          </form>
          <table class="table table-striped" style="width: 800px; margin: 0 auto;">
               <tr>
                    <th>Project</th>
                    <th>Student 1</th>
                    <th>Student 2</th>
                    <th>Student 3</th>
                    <th>Student 4</th>
                    <th>Student 5</th>
                    <th></th>
                    <th>Submissions</th>
               </tr>
               <?php
               while ($proposal = mysqli_fetch_array($proposals)) {
                    $class_id = $proposal['class_id'];
                    $q = "SELECT * from tasks where class_id = '$class_id' and ans_loc != '' order by id desc limit 1";
                    $result = mysqli_query($conn, $q);
                    $task = mysqli_fetch_array($result);
                    // var_dump($task);
                    $student1_id = $proposal['student1_id'];
                    $student2_id = $proposal['student2_id'];
                    $student3_id = $proposal['student3_id'];
                    $student4_id = $proposal['student4_id'];
                    $student5_id = $proposal['student5_id'];
                    $s1 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from student where student_id = $student1_id"));
                    $s2 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from student where student_id = $student2_id"));
                    $s3 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from student where student_id = $student3_id"));
                    if ($student4_id != 0) {
                         $s4 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from student where student_id = $student4_id"));
                    }
                    if ($student4_id != 0) {
                         $s5 = mysqli_fetch_array(mysqli_query($conn, "SELECT * from student where student_id = $student5_id"));
                    }
               ?>

                    <tr>
                         <td><?php echo $proposal['project_name']; ?></td>
                         <td><?php echo $s1['firstname'] . ' ' . $s1['lastname']; ?></td>
                         <td><?php echo $s2['firstname'] . ' ' . $s2['lastname']; ?></td>
                         <td><?php echo $s3['firstname'] . ' ' . $s3['lastname']; ?></td>
                         <td><?php echo @$s4['firstname'] . ' ' . @$s4['lastname']; ?></td>
                         <td><?php echo @$s5['firstname'] . ' ' . @$s5['lastname']; ?></td>
                         <td id="proposal-action"><a href="admin/<?php echo $proposal['proposal_file']; ?>" download>Download Proposal</a>
                              <?php if (!$proposal['is_approved']) { ?>
                                   <button onclick="approveProposal(<?php echo $proposal['id'] ?>, this)">Approve</button>
                              <?php } else { ?>
                                   <button onclick="addTask(<?php echo $proposal['id'] ?>, <?php echo $proposal['class_id'] ?>)">Add Task</button>
                              <?php } ?>
                         </td>
                         <td>
                              <?php if (mysqli_num_rows($result) > 0) { ?>
                                   <a href="<?php echo $task['ans_loc']; ?>" download>Download Submission</a>
                              <?php } ?>
                              <input type="number" style="width: 100px;" placeholder="Marks" onchange="updateMarks(<?php echo $proposal['id']; ?>, this.value)">
                         </td>
                    </tr>

               <?php } ?>
          </table>
     </div>
     <script>
          function approveProposal(id, el) {
               let ajax = new XMLHttpRequest()
               ajax.onload = function() {
                    let child = `<button onclick="addTask(${id}, this)">Add Task</button>`
                    let parent = el.parentNode
                    parent.removeChild(el)
                    if (this.responseText != 'limit') {
                         parent.innerHTML += child
                    }
               }
               ajax.open('POST', 'utils/approveProposal.php')
               ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
               ajax.send(`id=${id}`)
          }

          function addTask(proposal_id, class_id) {
               let form = document.getElementById('task_upload')
               form.style.display = 'block'
               let id = document.getElementById('proposal_id')
               id.value = proposal_id
               let cid = document.getElementById('class_id')
               cid.value = class_id
          }

          function updateMarks(p_id, marks) {
               let ajax = new XMLHttpRequest()
               ajax.onload = function() {
                    if (this.responseText != 'error') {
                         console.log('done');
                    }
               }
               ajax.open('POST', 'utils/updateMarks.php')
               ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
               ajax.send(`id=${p_id}&marks=${marks}`)
          }
     </script>
</body>