<?php
include 'dbcon.php';
include 'header_dashboard.php';
include 'session.php';


?>

<body>
     <?php include 'navbar_student.php'; ?>
     <form action="students_proposal_submit.php" enctype="multipart/form-data" method="post">
          <div style="margin: 20px; display: flex; flex-direction: column; justify-content: center; align-items: center;">
               <h3>SUBMIT PROJECT PROPOSAL</h3>
               <div style="display: flex; gap: 10px;flex-wrap: wrap; width: 500px">
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
                    <div style="text-align: center; width: 100%;">
                         <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                    </div>
               </div>
          </div>
     </form>
</body>