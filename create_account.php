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

  <title>Create Account | Intitutional Planning and Development Office</title>

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
          <form id="create_accform">
            

            <div class="divider d-flex flex-column align-items-center my-4">
              <img src="assets/images/websitelogo_sm.png" alt="" height="125" style=" -webkit-filter: drop-shadow(1px 1px 1px rgba(255, 255, 255, 1));
                      filter: drop-shadow(1px 1px 15px rgba(255, 255, 255, 100));"> 
              <h3 class="text-center fw-bold mx-3 mb-0">Create Account</h3>
            </div>

            <!-- Email input -->
            <div class="form-outline mb-2">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" id="email" name ="email" class="form-control form-control-lg"
                  placeholder="Enter Email Address" required />
        
            </div>

            <!-- Password input -->
            <div class="form-outline mb-2 d-flex">
              <div class="form-outline mb-3">
                <label class="form-label" for="form3Example4">Password</label>
                <div class="input-group">
                    <input type="password" id="password" name="password" class="form-control form-control-lg"
                  placeholder="Enter Password" required />
                   
                </div>
              </div>
              <div class="form-outline mb-2" style="margin-left: 2em;">
                <label class="form-label" for="form3Example4">Confirm Password</label>
                <div class="input-group">
                    <input type="password" id="confirm_password" name ="confirm_password" class="form-control form-control-lg "
                  placeholder="Confirm Password" required/>
                   <button id="toggleIcon" class="btn btn-outline-secondary" type="button"><i class="fas fa-eye"></i></button>
                </div>
              </div>
            </div>

            
            <div class="form-outline mb-2 d-flex" >
              <!-- First Name input -->
              <div class="form-outline mb-2">
                  <label class="form-label" for="form3Example3">Firstname</label>
                  <input type="text" id="fname" name ="fname" class="form-control form-control-lg"
                    placeholder="Enter Firstname" required/>
              </div>

              <!-- Last Name input -->
              
              <div class="form-outline mb-2" style="margin-left: 1em;">
                    <label class="form-label" for="form3Example3">Lastname</label>
                    <input type="text" id="lname" name ="lname" class="form-control form-control-lg"
                      placeholder="Enter Lastname" required/>
              </div>

              <!-- Suffix input -->
              
              <div class="form-outline mb-2" style="margin-left: 1em; width: 5em;">
                    <label class="form-label" for="form3Example3">Suffix</label>
                    <input type="text" id="suf" name ="suf" class="form-control form-control-lg"
                      placeholder="" />
              </div>

            </div>
              <!-- Campus input -->
              <div class="form-outline mb-2 overflow-visible">
                <div class="form-outline mb-2 overflow-visible">
                      <label class="form-label" for="form3Example3">Campus</label>
                      <select class="form-select form-control-lg" name="campus" id="campus" required>
                        <option disabled selected value> -- Select Campus -- </option>
                        <?php
                            while ($row = $scampus -> fetch_assoc()) {
                                echo "<option value='".$row['campus_id']."'>".$row['campus_name']."</option>";
                            }
                        ?>
                      </select>
                </div>


              <!--Account type input-->
              <div class="form-outline mb-2 overflow-visible" id="acc" >
                    <label class="form-label" for="form3Example3">Account type</label>
                    <select class="form-select form-control-lg" name="account" id="account" required>
                      <option disabled selected value> -- Select Account Type -- </option>
                      <option value="Director">Director</option>
                      <option value="Supervisor">Supervisor</option>
                      <option value="Staff">Staff</option>';
                 
                    </select>
              </div>

              <div class="text-center text-lg-start mt-4 pt-2 d-flex flex-column justify-content-center align-items-center">
                <button type="submit" name="submit" class="btn btn-success btn-lg"
                  style="padding: .3em 2.5em .6em 2.5em;">Create Account</button>
                <p class="small fw-bold mt-2 pt-1 mb-0">Already have an account? <a href="login.php"
                    class="link-danger">Login</a></p>
              </div>

          </form>
        </div>
      </div>
    </div>

    
  </section>


  <script type="text/javascript">
      
      var passwordInput = document.getElementById("password");
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
    $("#create_accform").submit(function(event) {
            event.preventDefault(); //prevent default form submit behavior
            var form_data = $(this).serialize(); //serialize form data
            $.ajax({
              url: "includes/crajax.php",
              type: "POST",
              data: form_data,
              dataType: "json",
              success: function(response) {
                if (response.status == "success") {
                  Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = "login.php"; //redirect to login page
                    }
                  });
                } else {
                  Swal.fire({
                    title: "Error!",
                    text: response.message,
                    icon: "error",
                    showCancelButton: false,
                    confirmButtonColor: "#3085d6",
                    confirmButtonText: "OK"
                  });
                }
              },
              error: function(jqXHR, textStatus, errorThrown) {
                Swal.fire({
                  title: "Error!",
                  text: "Failed to create account. Please try again.",
                  icon: "error",
                  showCancelButton: false,
                  confirmButtonColor: "#3085d6",
                  confirmButtonText: "OK"
                });
              }
            });
          });
        });


      </script>




  <?php
          include 'includes/footer.php';
  ?>