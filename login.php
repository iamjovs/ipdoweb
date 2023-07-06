<?php
    include 'includes/header.php';
    include 'includes/scripts.php';
    session_start();
    if (isset($_SESSION['user_id'])) {
        // user is already logged in, redirect to dashboard page
        header("Location: dashboard.php");
        exit();
    } 
    
?>

<title>Login | Intitutional Planning and Development Office</title>

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
        <form method="post" id="login-form" action="login.php">
          
          <div class="divider d-flex align-items-center my-4">
            <img src="assets/images/websitelogo_sm.png" alt="" height="125" style=" -webkit-filter: drop-shadow(1px 1px 1px rgba(255, 255, 255, 1));
                    filter: drop-shadow(1px 1px 15px rgba(255, 255, 255, 100)); ">
            </div>
          <div class="divider d-flex align-items-center my-4">
              
            <h3 class="text-center fw-bold mx-3 mb-0">Institutional Planning Department Office</h3>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <label class="form-label" for="form3Example3">Email address</label>
            <input type="email" id="email" name ="email" class="form-control form-control-lg"
              placeholder="Enter email address" required />
            
          </div>

          <!-- Password input -->
          <div class="form-outline mb-3">
            <label class="form-label" for="form3Example4">Password</label>
            <div class="input-group">
                <input type="password" id="pass" name ="pass" class="form-control form-control-lg"
              placeholder="Enter password" required />
               <button id="toggleIcon" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
            </div>
          </div>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <!--
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
          
            <a href="forgot_password.php" class="text-body">Forgot password?</a>
              -->
          </div>

          <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column justify-content-center align-items-center">
            <button type="submit" name="submit" id= "login-btn"class="btn btn-success btn-lg"
              style="padding: .3em 2.5em .6em 2.5em;">Login</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="create_account.php"
                class="link-danger">Create Account</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

  
</section>


<script type="text/javascript">
    var passwordInput = document.getElementById("password");
    var toggleIcon = document.getElementById("toggleIcon");

    toggleIcon.addEventListener("click", function() {
      if (toggleIcon.firstChild.classList.contains("fa-eye")) {
        toggleIcon.firstChild.classList.remove("fa-eye");
        toggleIcon.firstChild.classList.add("fa-eye-slash");
        passwordInput.type = "text";
      } else {
        toggleIcon.firstChild.classList.remove("fa-eye-slash");
        toggleIcon.firstChild.classList.add("fa-eye");
        passwordInput.type = "password";
      }
    });
    
     $(document).ready(function() {
          $('#login-form').submit(function(event) {
              event.preventDefault();
              var form = $(this);
              var formData = form.serialize();
              $.ajax({
                  url: 'includes/ajax.php',
                  type: 'post',
                  data: formData,
                  dataType: 'json',
                  success: function(response) {
                      if (response.success) {
                          Swal.fire({
                              icon: 'success',
                              title: 'Login Successful',
                              timer: 1000,
                              showConfirmButton: false
                          }).then(function() {
                              window.location.href = 'dashboard.php';
                          });
                      } else {
                          Swal.fire({
                              icon: 'error',
                              title: 'Login Failed',
                              text: response.message
                          });
                      }
                  }
              });
          });
      });

    </script>

<?php
        include 'includes/footer.php';
?>