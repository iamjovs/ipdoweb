 <?php
    if (!isset($_SESSION['user_id'])) {
        // user is already logged in, redirect to dashboard page
        header("Location: login.php");
        exit();
    }
    $id = $_SESSION['user_id'];

    $astmt = $conn->prepare('SELECT * FROM users INNER JOIN campus ON users.campus_id = campus.campus_id  WHERE user_id = ?');
        $astmt->bind_param('i', $id);
        $astmt->execute();
        $aresult = $astmt->get_result();
        $udata = $aresult->fetch_assoc();

 ?>

 <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="dashboard.php" class="logo d-flex align-items-center">
        <img src="assets/images/essu-logo-mini.png" style="max-height: 3em;" alt="">
        <span class="d-none d-lg-block" style="font-size: 1.3em; font-weight: 700;">Institutional Planning Department Office</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">
        <li class="nav-item dropdown pe-3">
          <a class="nav-link nav-profile d-flex align-items-center pe-0 " href="#" data-bs-toggle="dropdown">
            <?php
                
             
                if($udata['account']=='Admin'){
                    echo'<span class="badge m-2" style ="background: #8F00FF;">Admin</span>';
                    echo'<span class="badge bg-warning">Director</span>';
                }else if($udata['account']=='Supervisor'){
                    echo'<span class="badge bg-primary">Supervisor</span>';
                }else if($udata['account']=='Staff'){
                    echo'<span class="badge bg-secondary">Staff</span>';
                }
              echo'<span class="d-none d-md-block dropdown-toggle ps-2">'.ucfirst(substr($udata['first_name'], 0,1)).'. '.ucfirst($udata['last_name']).' '.ucfirst($udata['suffix']) .'</span>';
            ?>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <?php
              echo'<h6>'.ucfirst($udata['first_name']).' '.ucfirst($udata['last_name']).' '.ucfirst($udata['suffix']) .'</h6>';
              echo'<span class="badge bg-success m-2">'.$udata['campus_name'].' CAMPUS </span>';
              ?>
              
              
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="./users-profile.php">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" id="logout" href="includes/logout.php">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->
