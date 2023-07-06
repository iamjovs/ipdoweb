<?php
    include 'includes/header.php';
    session_start();
    
?>
 
<title>Extension Report | Intitutional Planning and Development Office</title>

</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
   <main id="main" class="main">
    <div class="row">
      <div class="pagetitle ">
        <h1> <strong> Extension</strong></h1>
      </div>
      <nav>
        <ol class="breadcrumb">   
          <li class="breadcrumb-item active">Extension Report</li>
        </ol>
        <div class="card-body"> 
          <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="clearForm()" data-bs-target="#verticalycentered"><i class="bi bi-plus-circle me-1"></i>Add Data</button>
        </div>
      </nav>
    
     
    </div><!-- End Page Title -->

    <table id="example" class="display table "  style="width:100%; font-weight: bold; padding-top: 1em;">
      <thead>
        <tr class="table-warning">
          <th></th>
          <th><h5><span class="badge bg-warning" style=" padding-left: 8em; padding-right: 8em;">CAMPUS</span></h5></th>
          <th><h5><span class="badge bg-warning" style=" padding-left: 8em; padding-right: 8em;">PERIOD</span></h5></th>
          <th><h5><span class="badge bg-warning" style=" padding-left: 8em; padding-right: 8em;">YEAR</span></h5></th>
          <th></th>
        </tr>
      </thead>
    </table>
    <!-- End Table with hoverable rows -->
               
    
     <!-- Add centered Modal -->
      <div class="modal fade" id="verticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><strong>Add Extension Data</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="extform" method="post" style="font-size: .9em;">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="extquarter" name="extquarter" style="font-size: .9em;" required>
                      <option disable selected value=""></option>
                      <option value="1">1st Quarter</option>
                      <option value="2">2nd Quarter</option>
                      <option value="3">3rd Quarter</option>
                      <option value="4">4th Quarter</option>
                    </select>
                    <label for="floatingSelect">Quarter</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="extyear" name="extyear" required>
                        <option disabled selected value=""></option>
                      </select>
                      <label for="admyear">Year</label>
                    </div>
                </div>
                <h5 class="modal-title"><strong>Extension Services</strong></h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="ext_proj" name="ext_proj" placeholder="Number of Extension Projects/Activities">
                    <label for="floatingName">Number of Extension Projects/Activities</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="ext_client" name="ext_client" placeholder="Number of Clients Served">
                    <label for="floatingName">Number of Clients Served</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="ext_faculty" name="ext_faculty" placeholder="Extension Related Activies attended by Faculty">
                    <label for="floatingName">Extension Related Activies attended by Faculty</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="act_gad" name="act_gad" placeholder="GAD Related Projects">
                    <label for="floatingName">GAD Related Projects</label>
                  </div>
                </div>
               <div class="modal-footer justify-content-center">
              <button   class="btn btn-primary" >Add Data</button>
              <button type="reset" class="btn btn-secondary" onclick="clearForm();">Reset</button>
            </div>
              </form><!-- End floating Labels Form -->
            </div>
          
          </div>
        </div>
      </div><!-- End Add Vertically centered Modal-->

       <!-- Update centered Modal -->
      <div class="modal fade" id="upverticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><strong>Update Extension Data</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="upextform" method="post" style="font-size: .9em;">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="upextquarter" name="upextquarter" style="font-size: .9em;"  required>
                      
                    </select>
                    <label for="floatingSelect">Quarter</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="upextyear" name="upextyear"  required>
                      </select>
                      <label for="admyear">Year</label>
                    </div>
                </div>
                <h5 class="modal-title"><strong>Extension Services</strong></h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upext_proj" name="upext_proj" placeholder="Number of Extension Projects/Activities">
                    <label for="floatingName">Number of Extension Projects/Activities</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upext_client" name="upext_client" placeholder="Number of Clients Served">
                    <label for="floatingName">Number of Clients Served</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upext_faculty" name="upext_faculty" placeholder="Extension Related Activies attended by Faculty">
                    <label for="floatingName">Extension Related Activies attended by Faculty</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upact_gad" name="upact_gad" placeholder="GAD Related Projects">
                    <label for="floatingName">GAD Related Projects</label>
                  </div>
                </div>
               <div class="modal-footer justify-content-center">
              <button id="update-btn" name="submit" type="submit" class="btn btn-primary">Update Data</button>
            </div>
              </form>
            </div>
          
          </div>
        </div>
      </div>

      <!-- End Update centered Modal -->


 
  </main><!-- End #main -->
 
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
        include 'includes/scripts.php';
?>
<script>
    // Listen for the form to be submitted
  $(document).ready(function() {
        $('#extform').submit(function(event) {
       
            event.preventDefault(); // Prevent the form from submitting normally
            var form = $(this);
            var extdata = form.serialize();
            // Get data from the form
            var ext_proj = $('#ext_proj').val();
            var ext_client = $('#ext_client').val();
            var ext_faculty = $('#ext_faculty').val();
            var act_gad = $('#act_gad').val();
            var extyear = $('#extyear').val();
            var extquarter = $('#extquarter').val();
            var per;
            if(extquarter == 1){per = '1st Quarter';
            }else if(extquarter == 2){
              per = '2nd Quarter';
            }else if(extquarter == 3){
              per = '3rd Quarter';
            }else if(extquarter == 4){
              per = '4th Quarter';
            }
            var formData = 
                
                  '<table class="table " style="font-size: .9em; font-weight: bold;">'+
                    '<tbody>'+
                      '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Number of Extension Projects/Activities</strong></span></td>' +
                        '<td class="text-center">'+ ext_proj +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Number of Clients Served</strong></span></td>'+
                        '<td class="text-center">'+ ext_client +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Extension Related Activies attended by Faculty</strong></span></td>'+
                        '<td class="text-center">'+ ext_faculty+'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>GAD Related Projects</strong></span></td>'+
                        '<td class="text-center">'+ act_gad +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Period</strong></span></td>'+
                        '<td class="text-center">'+ per +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Year</strong></span></td>'+
                        '<td class="text-center">'+ extquarter +'</td>'+
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
                      data: extdata,
                      dataType: 'json',
                      success: function(response) {
                         if (response.success) {
                        
                            Swal.fire({
                              icon: 'success',
                              title: response.title,
                              timer: 1000,
                              showConfirmButton: true,
                              text: response.message
                          
                            }).then(function() {
                              window.location.href = 'extension_report.php';
                            });
                            
                          }else {
                              
                              Swal.fire({
                                  icon: 'error',
                                  title: response.title,
                                  text: response.message,
                                  
                              });
                              
                              
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                          console.log(errorThrown);
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
    $('#extyear').append($('<option>', {
      value: year,
      text: year
    }));
  }
});


 
/*update form JS*/
$(document).ready(function() {
        $('#upextform').submit(function(event) {
       
            event.preventDefault(); // Prevent the form from submitting normally
            var form = $(this);
            var upextdata = form.serialize();
            var btnValue = $(this).find('button[type="submit"]:focus').val();
            upextdata += '&buttonValue=' + btnValue;
            // Get data from the form
            var form = $(this);
            var extdata = form.serialize();
            // Get data from the form
            var upext_proj = $('#upext_proj').val();
            var upext_client = $('#upext_client').val();
            var upext_faculty = $('#upext_faculty').val();
            var upact_gad = $('#upact_gad').val();
            var upextyear = $('#upextyear').val();
            var upextquarter = $('#upextquarter').val();
            var per;
            if(upextquarter == 1){per = '1st Quarter';
            }else if(upextquarter == 2){
              per = '2nd Quarter';
            }else if(upextquarter == 3){
              per = '3rd Quarter';
            }else if(upextquarter == 4){
              per = '4th Quarter';
            }


            var formData = 
                
                  '<table class="table " style="font-size: .9em; font-weight: bold;">'+
                    '<tbody>'+
                      '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Number of Extension Projects/Activities</strong></span></td>' +
                        '<td class="text-center">'+ upext_proj +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Number of Clients Served</strong></span></td>'+
                        '<td class="text-center">'+ upext_client +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Extension Related Activies attended by Faculty</strong></span></td>'+
                        '<td class="text-center">'+ upext_faculty+'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>GAD Related Projects</strong></span></td>'+
                        '<td class="text-center">'+ upact_gad +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Period</strong></span></td>'+
                        '<td class="text-center">'+ per +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Year</strong></span></td>'+
                        '<td class="text-center">'+ upextquarter +'</td>'+
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
                      data: upextdata,
                      dataType: 'json',
                      success: function(response) {
                         if (response.success) {
                        
                            Swal.fire({
                              icon: 'success',
                              title: response.title,
                              timer: 1000,
                              showConfirmButton: true,
                              text: response.message
                          
                            }).then(function() {
                              window.location.href = 'extension_report.php';
                            });
                            
                          }else {
                              
                              Swal.fire({
                                  icon: 'error',
                                  title: response.title,
                                  text: response.message,
                                  
                              });
                              
                              
                          }
                        },
                        error: function(jqXHR, textStatus, errorThrown) {
                          console.log(errorThrown);
                            Swal.fire({
                                icon: 'error',
                                title: 'Data Update Failed',
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

 /* Formatting function for row details - modify as you need */
function format(d) {
    // `d` is the original data object for the row
    return (

        '<table class="table" cellpadding="5" cellspacing="0" border="0" style="padding-left:50px; color: gray;">' +
        '<tr class="table-primary">' +
        '<td>Number of Extension Projects/Activities:</td>' +
        '<td>' +
        d.ext_proj +
        '</td>' +
        '</tr>' +
        '<tr class="table-info">' +
        '<td >Number of Clients Served:</td>' +
        '<td>' +
        d.ext_client +
        '</td>' +
        '</tr>' +
        '<tr class="table-secondary">' +
        '<td>Extension Related Activies attended by Faculty:</td>' +
        '<td>' +
        d.ext_faculty +
        '</td>' +
        '</tr>' +
        '<tr class="table-warning">' +
        '<td>GAD Related Projects:</td>' +
        '<td>' +
        d.act_gad +
        '</td>' +
        '</tr>' +
        '</table>'


    );
}


$(document).ready(function () {
    var table = $('#example').DataTable({
        columns: [
            {
                className: 'dt-control',
                orderable: false,
                data: null,
                defaultContent: '',
            },
            { data: 'campus_name' },
            { data: 'name' },
            { data: 'year' },
            {
              data: null,
              orderable: false,
              searchable: false,
              render: function(data, type, row, meta) {
                return '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#upverticalycentered" data-ext-id="' +row.extension_id + '" style="width: 100px"><i class="bi bi-pencil-square me-1"></i>Update</button>';
              },
              createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('button').on('click', function() {
                  var uextId = $(this).data('ext-id');
                  $.ajax({
                    url: 'includes/ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { uextId: uextId },
                    success: function(data) {

                      $('#upext_proj').val(data[0].ext_proj);
                      $('#upext_client').val(data[0].ext_client);
                      $('#upext_faculty').val(data[0].ext_faculty);
                      $('#upact_gad').val(data[0].act_gad);
                      $('#upextquarter').empty();
                      $('#upextyear').empty();
                      $('#upextquarter').append($('<option>', {
                          value: data[0].period,
                          text: data[0].name
                      }));
                      $('#upextyear').append($('<option>', {
                          value: data[0].year,
                          text: data[0].year
                      }));
                      $('#update-btn').val(data[0].extension_id);
                    },
                    error: function(xhr, status, error) {
                      console.log('Error: ' + error);
                    }
                  });
                });
              }
            }

          
        ],
        order: [[1, 'asc']],
    });

    $.ajax({
        url: 'includes/datatables.php',
        dataType: 'json',
        data: {
            action: 'get_extdata'   
        },
        success: function (data) {
            table.rows.add(data.tableData).draw();
        },
        error: function (jqXHR, textStatus, errorThrown) {
            console.log('Error: ' + textStatus + ' - ' + errorThrown);
        }
    });
 
    // Add event listener for opening and closing details
$('#example tbody').on('click', 'td.dt-control', function () {
    var tr = $(this).closest('tr');
    var row = table.row(tr);

    if (row.child.isShown()) {
        // This row is already open - close it with animation
        row.child.hide('slow', function() {
            tr.removeClass('shown');
        });
    } else {
        // Open this row with animation
        row.child(format(row.data())).show('slow', function() {
            tr.addClass('shown');
        });
    }
});
});
 
</script>
 


<?php
        include 'includes/footer.php';
?>