<div class="span3" id="sidebar">
     <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
          <li class="<?php echo Route::name() == '/dashboard.php' ? 'active' : '' ?>">
               <a href="dashboard.php"><i class="icon-chevron-right"></i><i class="icon-home"></i>&nbsp;Dashboard</a>
          </li>
          <li class="<?php echo Route::name() == '/subjects.php' ? 'active' : '' ?>">
               <a href="subjects.php"><i class="icon-chevron-right"></i><i class="icon-list-alt"></i> Subject</a>
          </li>
          <li class="<?php echo Route::name() == '/class.php' ? 'active' : '' ?>">
               <a href="class.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Class</a>
          </li>
          <li class="<?php echo Route::name() == '/admin_user.php' ? 'active' : '' ?>">
               <a href="admin_user.php"><i class="icon-chevron-right"></i><i class="icon-user"></i> Admin Users</a>
          </li>
          <li class="<?php echo Route::name() == '/department.php' ? 'active' : '' ?>">
               <a href="department.php"><i class="icon-chevron-right"></i><i class="icon-building"></i> Department</a>
          </li>
          <li class="<?php echo preg_match('/(students)/i', Route::name()) ? 'active' : '' ?>">
               <a href="students.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Students</a>
          </li>
          <li class="<?php echo preg_match('/(teachers)/i', Route::name()) ? 'active' : '' ?>">
               <a href="teachers.php"><i class="icon-chevron-right"></i><i class="icon-group"></i> Teachers</a>
          </li>
          <li class="<?php echo Route::name() == '/downloadable.php' ? 'active' : '' ?>">
               <a href="downloadable.php"><i class="icon-chevron-right"></i><i class="icon-download"></i> Downloadable Materials</a>
          </li>
          <li class="<?php echo Route::name() == '/assignment.php' ? 'active' : '' ?>">
               <a href="assignment.php"><i class="icon-chevron-right"></i><i class="icon-upload"></i> Uploaded Assignments</a>
          </li>
          <li class="<?php echo Route::name() == '/content.php' ? 'active' : '' ?>">
               <a href="content.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Content</a>
          </li>
          <li class="<?php echo Route::name() == '/user_log.php' ? 'active' : '' ?>">
               <a href="user_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> User Log</a>
          </li>
          <li class="<?php echo Route::name() == '/activity_log.php' ? 'active' : '' ?>">
               <a href="activity_log.php"><i class="icon-chevron-right"></i><i class="icon-file"></i> Activity Log</a>
          </li>
          <li class="<?php echo Route::name() == '/school_year.php' ? 'active' : '' ?>">
               <a href="school_year.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i> School Year</a>
          </li>
          <li class="<?php echo Route::name() == '/fyp.php' ? 'active' : '' ?>">
               <a href="fyp.php"><i class="icon-chevron-right"></i><i class="icon-book"></i> FYP</a>
          </li>
          <li class="<?php echo preg_match('/(calendar)/i', Route::name()) ? 'active' : '' ?>">
               <a href="calendar_of_events.php"><i class="icon-chevron-right"></i><i class="icon-calendar"></i>Calendar of Events</a>
          </li>
     </ul>



</div>