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

<title>Forgot Password | Intitutional Planning and Development Office</title>

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
        <form id="reset-password-form">
          

          <div class="divider d-flex flex-column align-items-center my-4">
             <img src="assets/images/websitelogo_sm.png" alt="" height="125" style=" -webkit-filter: drop-shadow(1px 1px 1px rgba(255, 255, 255, 1));
                    filter: drop-shadow(1px 1px 15px rgba(255, 255, 255, 100));"> 
            <h3 class="text-center fw-bold mx-3 mb-0">Forgot Password</h3>
          </div>

          <!-- Email input -->
          <div class="form-outline mb-4">
            <div class="alert alert-success text-center mb-4 mt-4 pt-2" role="alert"> Enter your Email and instructions will be sent to you!</div>
            <input type="email" id="remail" name ="remail" class="form-control form-control-lg"
              placeholder="Enter email address" />
            
          </div>

        

          
          <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column justify-content-center align-items-center">
            <button type="submit" class="btn btn-success btn-lg"
              style="padding: .3em 2.5em .6em 2.5em;">Reset Password</button>
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="create_account.php"
                class="link-danger">Create Account</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>

  
</section>

<script type="text/javascript">
  $(document).ready(function() {
  // listen for form submit event
  $('#reset-password-form').on('submit', function(event) {
      event.preventDefault(); // prevent default form submission
      
      // get form data
      var formData = $(this).serialize();
      
      // send AJAX request to server
      $.ajax({
        url: 'includes/repassword.php',
        type: 'POST',
        data: formData,
        dataType: 'json',
        success: function(response) {
          // show SweetAlert2 popup based on response type
          if (response.type == 'success') {
            Swal.fire({
              icon: 'success',
              title: 'Password reset email sent!',
              text: response.message
            });
          } else {
            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: response.message
            });
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'An error occurred while processing your request'
          });
        }
      });
    });
  });

</script>

<?php
    
    include 'includes/footer.php';
?>