<?php
    include 'includes/header.php';
    session_start();
    $id = $_SESSION['user_id'];
    
    $ustmt = $conn->prepare('SELECT * FROM users INNER JOIN campus ON users.campus_id = campus.campus_id  WHERE user_id = ?');
        $ustmt->bind_param('i', $id);
        $ustmt->execute();
        $uresult = $ustmt->get_result();
        $urow = $uresult->fetch_assoc();

?>

<title>Dashboard | Intitutional Planning and Development Office</title>

</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Profile</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
          <li class="breadcrumb-item">Users</li>
          <li class="breadcrumb-item active">Profile</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section profile">
      <div class="row">
      

        <div class="col-xl-5">

          <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <ul class="nav nav-tabs nav-tabs-bordered">

                <li class="nav-item">
                  <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#profile-overview">Overview</button>
                </li>

                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
                </li>


                <li class="nav-item">
                  <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change Password</button>
                </li>

              </ul>
              <div class="tab-content pt-2">

                <div class="tab-pane fade show active profile-overview" id="profile-overview">
                 

                  <h5 class="card-title">Profile Details</h5>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label ">Full Name</div>
                    <?php
                    echo'<div class="col-lg-9 col-md-8">'.ucfirst($urow['last_name']).', '.ucfirst($urow['first_name']).' '.ucfirst($urow['suffix']).'</div>'
                    ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Campus</div>
                     <?php

                    echo' <div class="col-lg-9 col-md-8">'.$urow['campus_name'].'</div>'
                    ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Account</div>
                    <?php

                    echo' <div class="col-lg-9 col-md-8">'.$urow['account'].'</div>'
                    ?>
                  </div>

                  <div class="row">
                    <div class="col-lg-3 col-md-4 label">Email</div>
                    <?php

                    echo' <div class="col-lg-9 col-md-8">'.$urow['email'].'</div>'
                    ?>
                  </div>

                </div>

                <div class="tab-pane fade profile-edit pt-3" id="profile-edit">

                  <!-- Profile Edit Form -->
                  <form id="edit_profile">
                   

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">First Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="fname" value="<?php echo $urow['first_name'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Last Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="fullName" type="text" class="form-control" id="lname" value="<?php echo $urow['last_name'] ?>">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Suffix</label>
                      <div class="col-md-8 col-lg-2">
                        <input name="fullName" type="text" class="form-control" id="suf" value="<?php echo $urow['suffix'] ?>">
                      </div>
                    </div>


                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

                </div>


                <div class="tab-pane fade pt-3" id="profile-change-password">
                  <!-- Change Password Form -->
                  <form id="change-password-form">

                    <div class="row mb-3">
                      <label for="currentPassword" class=" col-md-4 col-lg-3 col-form-label">Current Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input type="password" class="form-control" id="current-password" name="current_password" required >
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="newpassword" type="password" class="form-control" id="new-password" name="new_password" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="renewpassword" type="password" class="form-control" id="confirm-password" name="confirm_password" required>
                      </div>
                    </div>
                    <button id="toggleIcon" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>

                    <div class="text-center">
                      <button type="submit" class="btn btn-success">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
        include 'includes/scripts.php';
?>

<script type="text/javascript">
  

  $(document).ready(function() {
  $('#edit_profile').on('submit', function(event) {
        event.preventDefault();

        var fname = $('#fname').val();
        var lname = $('#lname').val();
        var suf = $('#suf').val();

        // display confirmation message using SweetAlert2
        Swal.fire({
            title: 'Are you sure you want to update your profile?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, update profile',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  url: 'includes/ajax.php',
                  method: 'POST',
                  data: {
                    fname: fname,
                    lname: lname,
                    suf: suf
                  },
                  success: function(response) {
                    if (response == 'success') {
                      // display success message using SweetAlert2
                      Swal.fire('Success', 'Your Profile is now Updated.', 'success').then((result) => {
                          if (result.isConfirmed) {
                              // auto refresh navbar.php and user-profile.php pages
                              window.location.reload();
                          }
                      });
                    } else {
                      // display error message using SweetAlert2
                      Swal.fire('Error', response, 'error');
                    }
                  }
                });
            }
        });
    });
  });

  $(document).ready(function() {
  $('#change-password-form').on('submit', function(event) {
        event.preventDefault();

        var currentPassword = $('#current-password').val();
        var newPassword = $('#new-password').val();
        var confirmPassword = $('#confirm-password').val();

        // display confirmation message using SweetAlert2
        Swal.fire({
            title: 'Are you sure you want to change your password?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, change password',
            cancelButtonText: 'Cancel'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                  url: 'includes/ajax.php',
                  method: 'POST',
                  data: {
                    currentPassword: currentPassword,
                    newPassword: newPassword,
                    confirmPassword: confirmPassword
                  },
                  success: function(response) {
                    if (response == 'success') {
                      // display success message using SweetAlert2
                      Swal.fire('Success', 'Your password has been changed', 'success');
                    } else {
                      // display error message using SweetAlert2
                      Swal.fire('Error', response, 'error');
                    }
                  }
                });
            }
        });
      });
  });


  var op = document.getElementById("current-password");
  var np = document.getElementById("new-password");
  var cp = document.getElementById("confirm-password");
  var toggleIcon = document.getElementById("toggleIcon");

  toggleIcon.addEventListener("click", function() {
      if (toggleIcon.firstChild.classList.contains("fa-eye")) {
        toggleIcon.firstChild.classList.remove("fa-eye");
        toggleIcon.firstChild.classList.add("fa-eye-slash");
        op.type = "text";
        np.type = "text"
        cp.type = "text"
      } else {
        toggleIcon.firstChild.classList.remove("fa-eye-slash");
        toggleIcon.firstChild.classList.add("fa-eye");
        op.type = "password";
        np.type = "password"
        cp.type = "password"
      }
    });


</script>
<?php
        include 'includes/footer.php';
?>