<?php
include 'header_dashboard.php';
include 'session.php';

$q = "SELECT * from fyp_proposal";
$proposals = mysqli_query($conn, $q);


?>

<body>
     <?php include 'navbar_teacher.php'; ?>
     <div class="container-fluid">
          <table>
               <tr>
                    <th>Project</th>
                    <th>Student 1</th>
                    <th>Student 2</th>
                    <th>Student 3</th>
                    <th>Student 4</th>
                    <th>Student 5</th>
                    <th></th>
               </tr>
               <?php
               while ($proposal = mysqli_fetch_array($proposals)) {
                    $student1_id = $proposal['student1_id'];
                    $student2_id = $proposal['student2_id'];
                    $student3_id = $proposal['student3_id'];
                    $student4_id = $proposal['student4_id'];
                    $student5_id = $proposal['student5_id'];
                    $s1 = "SELECT * from student where student_id = $student1_id";
                    $s2 = "SELECT * from student where student_id = $student2_id";
                    $s3 = "SELECT * from student where student_id = $student3_id";
                    $s4 = "SELECT * from student where student_id = $student4_id";
                    $s5 = "SELECT * from student where student_id = $student5_id";
               ?>

                    <tr>
                         <td><?php echo $proposal['project_name']; ?></td>
                         <td><?php echo $s1['firstname'] . ' ' . $s1['lastname']; ?></td>
                         <td><?php echo $s2['firstname'] . ' ' . $s2['lastname']; ?></td>
                         <td><?php echo $s3['firstname'] . ' ' . $s3['lastname']; ?></td>
                         <td><?php echo $s4['firstname'] . ' ' . $s4['lastname']; ?></td>
                         <td><?php echo $s5['firstname'] . ' ' . $s5['lastname']; ?></td>
                         <td><a href="admin/<?php echo $proposal['proposal_file']; ?>" download>File</a> <button onclick="approveProposal(<?php echo $proposal['id'] ?>)">Approve</button></td>
                    </tr>

               <?php } ?>
          </table>
     </div>
     <script>
          function approveProposal(id) {
               let ajax = new XMLHttpRequest()
               ajax.open('POST', 'utils/approveProposal.php')
               ajax.setRequestHeader('Content-type', 'application/x-www-form-urlencoded')
               ajax.send(`id=${id}`)
          }
     </script>
</body>