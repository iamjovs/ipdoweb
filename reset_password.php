  <?php
      include 'includes/header.php';
      include 'includes/scripts.php';
      session_start();
       if (isset($_SESSION['user_id'])) {
          // user is already logged in, redirect to dashboard page
          header("Location: dashboard.php");
          exit();
      } 

      $scampus = $conn->query("SELECT * FROM campus");

      
    
  ?>

  <title>Reset Password | Intitutional Planning and Development Office</title>

  </head>
  <style type="text/css">
  .divider:after,.divider:before {
          content: "";
          flex: 1;
          height: 1px;
          background: #eee;
          }
  .h-custom {
          height: calc(100% - 73px);
  }
  @media (max-width: 450px) {
      .h-custom {
          height: 100%;
      }
  }

  </style>
  <body>

  <section class="vh-100">
    <div class="container-fluid h-custom">
      <div class="row d-flex justify-content-center align-items-center h-100">
        
        <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
          <form id="reset_passform">
            

            <div class="divider d-flex flex-column align-items-center my-4">
              <img src="assets/images/websitelogo_sm.png" alt="" height="125" style=" -webkit-filter: drop-shadow(1px 1px 1px rgba(255, 255, 255, 1));
                      filter: drop-shadow(1px 1px 15px rgba(255, 255, 255, 100));"> 
              <h3 class="text-center fw-bold mx-3 mb-0">Reset Password</h3>
            </div>

         

            <!-- Password input -->
              <div class="form-outline mb-2" >
                <label class="form-label" for="form3Example4">New Password</label>
                <div class="input-group">
                    <input type="password" id="new_password" name ="new_password" class="form-control form-control-lg "
                  placeholder="Enter New Password" required/>
                   <button id="toggleIcon" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                </div>
              </div>
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Confirm Password</label>
                <div class="input-group">
                    <input type="password" id="confirm_password" name="confirm_password" class="form-control form-control-lg"
                  placeholder="Confirm Password" required />
                   
                </div>
              </div>
              
            
              <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column justify-content-center align-items-center">
                <button type="submit" name="submit" id="reset_change" class="btn btn-success btn-lg"
                  style="padding: .3em 2.5em .6em 2.5em;">Change Password</button>
              </div>

          </form>
        </div>
      </div>
    </div>

    
  </section>


  <script type="text/javascript">
      
      var passwordInput = document.getElementById("new_password");
      var toggleIcon = document.getElementById("toggleIcon");
      var passwordInput1 = document.getElementById("confirm_password");
      toggleIcon.addEventListener("click", function() {
        if (toggleIcon.firstChild.classList.contains("fa-eye")) {
          toggleIcon.firstChild.classList.remove("fa-eye");
          toggleIcon.firstChild.classList.add("fa-eye-slash");
          passwordInput.type = "text";
          passwordInput1.type = "text";
        } else {
          toggleIcon.firstChild.classList.remove("fa-eye-slash");
          toggleIcon.firstChild.classList.add("fa-eye");
          passwordInput.type = "password";
          passwordInput1.type = "password";
        }
      });
      


    $(document).ready(function() {
    $('#reset_passform').on('submit', function(event) {
          event.preventDefault();

          var resnewPassword = $('#new_password').val();
          var resconfirmPassword = $('#confirm_password').val();

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
                      resnewPassword: resnewPassword,
                      resconfirmPassword: resconfirmPassword
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
  </script>




  <?php
          include 'includes/footer.php';
  ?>