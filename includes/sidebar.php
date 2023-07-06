
  



<!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      

      <li class="nav-item">
        <a class="nav-link" data-bs-target="#administration-nav" data-bs-toggle="collapse" href="">
          <i class="bi bi-menu-button-wide"></i><span>Administration</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
         <ul id="administration-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="administration.php">
              <i class="bi bi-circle"></i><span>Administration Overview</span>
              
            </a>
          </li>
          <li>
            <a href="administration_report.php">
              <i class="bi bi-circle"></i><span>Administration Data</span>
            </a>
          </li>
       
        </ul>
      </li><!-- End Administration Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#instruction-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Instruction</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="instruction-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="instruction.php">
              <i class="bi bi-circle"></i><span>Instruction Overview</span>
              
            </a>
          </li>
          <li>
            <a href="semester_enrollees.php">
              <i class="bi bi-circle"></i><span>Semester Enrollees</span>
              
            </a>
          </li>
          <li>
            <a href="aaccup_accredited_programs.php">
              <i class="bi bi-circle"></i><span>AACCUP Accredited Programs</span>
              
            </a>
          </li>
          <li>
            <a href="curricular_programs.php">
              <i class="bi bi-circle"></i><span>Curricular Programs</span>
              
            </a>
          </li>
           <li>
            <a href="faculty_profile.php">
              <i class="bi bi-circle"></i><span>Faculty Profile</span>
              
            </a>
          </li>
        </ul>
      </li><!-- End Instruction Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#research-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Research</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="research-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="research.php">
              <i class="bi bi-circle"></i><span>Research Overview</span>
              
            </a>
          </li>
          <li>
            <a href="research_report.php">
              <i class="bi bi-circle"></i><span>Research Data</span>
              
            </a>
          </li>
        </ul>
      </li><!-- End Research Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#extension-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Extension</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="extension-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="extension.php">
              <i class="bi bi-circle"></i><span>Extension Overview</span>
            </a>
          </li>
          <li>
            <a href="extension_report.php">
              <i class="bi bi-circle"></i><span>Extension Data</span>
              
            </a>
          </li>
        </ul>
      </li><!-- End Extension Nav -->
      
      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#finance-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Finance and Production</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="finance-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="financeandproduction.php">
              <i class="bi bi-circle"></i><span>Finance and Production Overview</span>
              
            </a>
          </li>
          <li>
            <a href="financeandproduction_report.php">
              <i class="bi bi-circle"></i><span>Finance and Production Data</span>
              
            </a>
          </li>
        </ul>
      </li><!-- End Extension Nav -->

      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#more-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-archive"></i><span>Data</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="more-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="scholarship_student_ojt.php">
              <i class="bi bi-circle"></i><span>Scholarships/Student Assistants/OJT</span>
              
            </a>
          </li>
          <li>
            <a href="enrollment_etax.php">
              <i class="bi bi-circle"></i><span>Enrollment of E-tax Payments</span>
              
            </a>
          </li>
           <li>
            <a href="memorandum_of_agreement.php">
              <i class="bi bi-circle"></i><span>Memorandum of Agreements</span>
              
            </a>
          </li>
           <li>
            <a href="appointments_of_personnel.php">
              <i class="bi bi-circle"></i><span>Appointments of Personnel Salary Grade</span>
              
            </a>
          </li>
          <li>
            <a href="capital_projects.php">
              <i class="bi bi-circle"></i><span>Capital Outlay Projects/ Purchase of Equipment/ Supplies and Materials</span>
              
            </a>
          </li>
        </ul>
      </li><!-- End Extension Nav -->
    </ul>

  </aside><!-- End Sidebar-->

  <script type="text/javascript">
    // get the current URL of the page
      var currentUrl = window.location.href;

      // get the anchor elements in the sidebar
      var navLinks = document.querySelectorAll('.sidebar-nav a');

      // loop through each anchor element and update its class and attribute
      navLinks.forEach(function(link) {
        // check if the href attribute matches the current URL
        if (link.href === currentUrl) {
          // add the "active" class to the anchor element
          link.classList.add('active');

          // find the parent collapse element of the anchor element
          var collapseEl = link.closest('.collapse');

          // check if the collapse element exists
          if (collapseEl) {
            // add the "show" class to the collapse element
            collapseEl.classList.add('show');

            // find the parent anchor element of the collapse element
            var parentLink = collapseEl.parentNode.querySelector('a[data-bs-toggle="collapse"]');

            // check if the parent anchor element exists
            if (parentLink) {
              // add the "active" class to the parent anchor element
              parentLink.classList.add('active');
            }
          }
        }
      }); 
  </script>