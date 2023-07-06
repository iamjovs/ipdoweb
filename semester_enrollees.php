<?php
    include 'includes/header.php';
    session_start();
    
?>
 
<title>Semester Enrollees Report | Intitutional Planning and Development Office</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
   <main id="main" class="main">
    <div class="row">
      <div class="pagetitle ">
        <h1> <strong>Semester Enrollees Programs</strong></h1>
      </div>
      <nav>
        <ol class="breadcrumb">
          
          <li class="breadcrumb-item active">Semester Enrollees Report</li>
          
        </ol>
        <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="clearForm()" data-bs-target="#verticalycentered"><i class="bi bi-plus-circle me-1"></i>Add Data</button>
     
      </nav>
      </div>
     
    </div><!-- End Page Title -->


            



     <!-- Add centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><strong>Add Semester Enrollees Data</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3 over" id="rscform" method="post" style="font-size: .9em;">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="rscsemester" name="rscquarter" style="font-size: .9em;" required>
                      <option disable selected value=""></option>
                      <option value="1">1st Semester</option>
                      <option value="2">2nd Semester</option>
                    </select>
                    <label for="floatingSelect">Quarter</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="rscyear" name="rscyear" required>
                        <option disabled selected value=""></option>
                        
                      </select>
                      <label for="admyear">Year</label>
                    </div>
                </div>
                
                <h6 class="modal-title"><strong>Curricular Programs</strong></h6>
                <div class="col-md-12">
                  <div class="form-floating ">
                    <input type="number" class="form-control" id="tp_jo" name="tp_jo" placeholder="Teaching Personel (JO)">
                    <label for="floatingName">Advanced Education Program</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating ">
                    <input type="number" class="form-control" id="tp_jo" name="tp_jo" placeholder="Teaching Personel (JO)">
                    <label for="floatingName">Baccalaureate Degree</label>
                  </div>
                 <div class="col-md-12">
                  <div class="form-floating ">
                    <input type="number" class="form-control" id="tp_jo" name="tp_jo" placeholder="Teaching Personel (JO)">
                    <label for="floatingName">Baccalaureate Degree</label>
                  </div>
               <div class="modal-footer justify-content-center">
              <button   class="btn btn-primary" >Add Data</button>
              <button type="reset" class="btn btn-secondary" onclick="clearForm();">Reset</button>
              </div>
              </form><!-- End floating Labels Form -->
            </div>
          
          </div>
        </div>
      </div><!-- End AddVertically centered Modal-->

  

 
          <!-- End confirm Vertically centered Modal-->
  </main><!-- End #main -->
 
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
        include 'includes/scripts.php';
?>
<script>
    // Listen for the form to be submitted
  $(document).ready(function() {
        $('#rscform').submit(function(event) {
       
            event.preventDefault(); // Prevent the form from submitting normally
            var form = $(this);
            var admdata = form.serialize();
            // Get data from the form
            var tp_pl = $('#tp_pl').val();
            var tp_jo = $('#tp_jo').val();
            var ntp_pl = $('#ntp_pl').val();
            var cjo = $('#cjo').val();
            var admyear = $('#admyear').val();
            var admquarter = $('#admquarter').val();

            var formData = 
                
                  '<table class="table table-bordered table-striped ">'+
                    
                    '<tbody>'+
                      '<tr>'+
                        '<td></i><span class="p-2"><strong>Teaching Personel(Plantilla)</strong></span></td>'+
                        '<td class="text-center">'+ tp_pl +'</td>'+
                      '</tr>'+
                      '<tr>'+
                
                        '<td><span class="p-2"><strong>Teaching Personel(JO)</strong></span></td>'+
                        '<td class="text-center">'+ tp_jo +'</td>'+
                      '</tr>'+
                      '<tr>'+
                        '<td><span class="p-2"><strong>Non-Teaching Personel(Plantilla)</strong></span></td>'+
                        '<td class="text-center">'+ ntp_pl +'</td>'+
                      '</tr>'+
                      '<tr>'+
                        '<td><span class="p-2"><strong>Job Order & Casual</strong></span></td>'+
                        '<td class="text-center">'+ cjo +'</td>'+
                      '</tr>'+
                      '<tr>'+
                        '<td><span class="p-2"><strong>Quarter</strong></span></td>'+
                        '<td class="text-center">'+ admquarter +'</td>'+
                      '</tr>'+
                      '<tr>'+
                        '<td><span class="p-2"><strong>Year</strong></span></td>'+
                        '<td class="text-center">'+ admyear +'</td>'+
                      '</tr>'+
                    '</tbody>'+
                  '</table>';
                 




            Swal.fire({
                  title: 'Confirm Data',
                  html: formData,
                  showCancelButton: true,
                  confirmButtonText: 'Confirm',
                  cancelButtonText: 'Cancel'
            }).then((result) => {
              if (result.isConfirmed) {
                     // Send the data to the server using AJAX
                    $.ajax({
                      url: 'includes/ajax.php',
                      method: 'post',
                      data: admdata,
                      dataType: 'json',
                      success: function(response) {
                        if (response.success) {
                          Swal.fire({
                            icon: 'success',
                            title: 'Data Insertion Success',
                            timer: 1000,
                            showConfirmButton: true,
                            text: response.message
                          }).then(function() {
                            window.location.href = 'administration_report.php';
                          });
                        }else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data Insertion Failed',
                                text: response.message,
                            });
                        }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                            Swal.fire({
                                icon: 'error',
                                title: 'Data Insertion Failed',
                                text: errorThrown
                            });
                        }
                        });
                }
            });

  
          
        });
    });




     function clearForm() {
      // Select all input and select elements and reset their values
      document.querySelectorAll('input, select').forEach(element => {
        if (element.type === 'select-one') {
          element.selectedIndex = 0; // Reset selected option to the first option
        } else {
          element.value = ''; // Reset input value to an empty string
        }
      });
    }

    $(document).ready(function() {
  // Get the current year
  var currentYear = new Date().getFullYear();
  
  // Loop through the past four years and add options to the select element
  for (var i = 0; i < 4; i++) {
    var year = currentYear - i;
    $('#admyear').append($('<option>', {
      value: year,
      text: year
    }));
  }
}); 
</script>
 


<?php
        include 'includes/footer.php';
?>