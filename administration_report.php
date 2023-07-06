<?php
    include 'includes/header.php';
    session_start();
?>

<title>Aministration Report | Intitutional Planning and Development Office</title>

</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
   <main id="main" class="main">
    <div class="row">
      <div class="pagetitle "><nav>
        <h1> <strong> Administration</strong></h1>
      <nav>
        <ol class="breadcrumb">   
          <li class="breadcrumb-item active">Admnistration Report</li> 
        </ol>
        <div class="card-body"> 
          <button type="button" class="btn btn-success" data-bs-toggle="modal" onclick="clearForm()" data-bs-target="#verticalycentered"><i class="bi bi-plus-circle me-1"></i>Add Data</button>
         </div>
      </nav>
    </div><!-- End Page Title -->

                  <table id="example" class="display table "  style="width:100%; font-weight: bold; padding-top: 1em;">
                    <thead>
                        <tr class="table-success">
                            <th></th>
                            <th><h5><span class="badge bg-success" style=" padding-left: 8em; padding-right: 8em;">CAMPUS</span></h5></th>
                            <th><h5><span class="badge bg-success" style=" padding-left: 8em; padding-right: 8em;">PERIOD</span></h5></th>
                            <th><h5><span class="badge bg-success" style=" padding-left: 8em; padding-right: 8em;">YEAR</span></h5></th>
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
              <h5 class="modal-title"><strong>Add Administration Data</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="admform" method="post" style="font-size: .9em;">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="admquarter" name="admquarter" style="font-size: .9em;" required>
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
                      <select class="form-select" id="admyear" name="admyear" required>
                        <option disabled selected value=""></option>
                        
                      </select>
                      <label for="admyear">Year</label>
                    </div>
                </div>
                <h5 class="modal-title"><strong>Number of Personnel</strong></h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="tp_pl" name="tp_pl" placeholder="Teaching Personel (Plantilla)">
                    <label for="floatingName">Teaching Personel (Plantilla)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="tp_jo" name="tp_jo" placeholder="Teaching Personel (JO)">
                    <label for="floatingName">Teaching Personel (JO)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="ntp_pl" name="ntp_pl" placeholder="Non-Teaching Personel (Plantilla)">
                    <label for="floatingName">Non-Teaching Personel (Plantilla)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="cjo" name="cjo" placeholder="Job Order & Casual">
                    <label for="floatingName">Job Order & Casual</label>
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
      </div><!-- End AddVertically centered Modal-->

      <!-- Update centered Modal -->
      <div class="modal fade" id="upverticalycentered" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-md">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><strong>Update Administration Data</strong></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="row g-3" id="upadmform" method="post" style="font-size: .9em;">
                <div class="col-md-6">
                  <div class="form-floating mb-3">
                    <select class="form-select" id="upadmquarter" name="upadmquarter" style="font-size: .9em;"  required>
                      
                    </select>
                    <label for="floatingSelect">Quarter</label>
                  </div>
                </div>
                <div class="col-md-6">
                    <div class="form-floating mb-3">
                      <select class="form-select" id="upadmyear" name="upadmyear"  required>
                        
                        
                      </select>
                      <label for="admyear">Year</label>
                    </div>
                </div>
                <h5 class="modal-title"><strong>Number of Personnel</strong></h5>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="uptp_pl" name="uptp_pl" placeholder="Teaching Personel (Plantilla)">
                    <label for="floatingName">Teaching Personel (Plantilla)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="uptp_jo" name="uptp_jo" placeholder="Teaching Personel (JO)">
                    <label for="floatingName">Teaching Personel (JO)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upntp_pl" name="upntp_pl" placeholder="Non-Teaching Personel (Plantilla)">
                    <label for="floatingName">Non-Teaching Personel (Plantilla)</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="number" class="form-control" id="upcjo" name="upcjo" placeholder="Job Order & Casual">
                    <label for="floatingName">Job Order & Casual</label>
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

      </div>

 
          <!-- End confirm Vertically centered Modal-->
  </main><!-- End #main -->
 
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
        include 'includes/scripts.php';
?>
<script>
    // Listen for the form to be submitted
  $(document).ready(function() {
        $('#admform').submit(function(event) {
       
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
            var per;
            if(admquarter == 1){per = '1st Quarter';
            }else if(admquarter == 2){
              per = '2nd Quarter';
            }else if(admquarter == 3){
              per = '3rd Quarter';
            }else if(admquarter == 4){
              per = '4th Quarter';
            }
            var formData = 
                
                  '<table class="table " style="font-size: .9em; font-weight: bold;">'+
                    '<tbody>'+
                      '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Teaching Personel (Plantilla):</strong></span></td>' +
                        '<td class="text-center">'+ tp_pl +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Teaching Personel(JO)</strong></span></td>'+
                        '<td class="text-center">'+ tp_jo +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Non-Teaching Personel(Plantilla)</strong></span></td>'+
                        '<td class="text-center">'+ ntp_pl +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Job Order & Casual</strong></span></td>'+
                        '<td class="text-center">'+ cjo +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Period</strong></span></td>'+
                        '<td class="text-center">'+ per +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
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
                              title: response.title,
                              timer: 1000,
                              showConfirmButton: true,
                              text: response.message
                          
                            }).then(function() {
                              window.location.href = 'administration_report.php';
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
    $('#admyear').append($('<option>', {
      value: year,
      text: year
    }));
  }
});


 
/*update form JS*/
$(document).ready(function() {
        $('#upadmform').submit(function(event) {
       
            event.preventDefault(); // Prevent the form from submitting normally
            var form = $(this);
            var upadmdata = form.serialize();
            var btnValue = $(this).find('button[type="submit"]:focus').val();
            upadmdata += '&buttonValue=' + btnValue;
            // Get data from the form
            var uptp_pl = $('#uptp_pl').val();
            var uptp_jo = $('#uptp_jo').val();
            var upntp_pl = $('#upntp_pl').val();
            var upcjo = $('#upcjo').val();
            var upadmyear = $('#upadmyear').val();
            var upadmquarter = $('#upadmquarter').val();
            var per;
            if(upadmquarter == 1){per = '1st Quarter';
            }else if(upadmquarter == 2){
              per = '2nd Quarter';
            }else if(upadmquarter == 3){
              per = '3rd Quarter';
            }else if(upadmquarter == 4){
              per = '4th Quarter';
            }

            var formData = 
                
                  '<table class="table " style="font-size: .9em; font-weight: bold;">'+
                    '<tbody>'+
                      '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Teaching Personel (Plantilla):</strong></span></td>' +
                        '<td class="text-center">'+ uptp_pl +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Teaching Personel(JO)</strong></span></td>'+
                        '<td class="text-center">'+ uptp_jo +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Non-Teaching Personel(Plantilla)</strong></span></td>'+
                        '<td class="text-center">'+ upntp_pl +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Job Order & Casual</strong></span></td>'+
                        '<td class="text-center">'+ upcjo +'</td>'+
                      '</tr>'+
                       '<tr class="table-primary">' +
                        '<td><span class="p-2"><strong>Period</strong></span></td>'+
                        '<td class="text-center">'+ per +'</td>'+
                      '</tr>'+
                      '<tr class="table-secondary">' +
                        '<td><span class="p-2"><strong>Year</strong></span></td>'+
                        '<td class="text-center">'+ upadmyear +'</td>'+
                      '</tr>'+
                    '</tbody>'+
                  '</table>'

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
                      data: upadmdata,
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
                              window.location.href = 'administration_report.php';
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
        '<td>Teaching Personel (Plantilla):</td>' +
        '<td>' +
        '<strong>'+d.tp_plantilla +'</strong>'+
        '</td>' +
        '</tr>' +
        '<tr class="table-info">' +
        '<td >Teaching Personel (JO):</td>' +
        '<td>' +
        '<strong>'+d.tp_jo +'</strong>'+
        '</td>' +
        '</tr>' +
        '<tr class="table-secondary">' +
        '<td>Non-Teaching Personel (Plantilla):</td>' +
        '<td>' +
        '<strong>'+d.nontp_plantilla +'</strong>'+
        '</td>' +
        '</tr>' +
        '<tr class="table-warning">' +
        '<td>Casual and Job Order:</td>' +
        '<td>' +
        '<strong>'+d.jo_casual +'</strong>'+
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
                return '<button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#upverticalycentered" data-admin-id="' +row.admin_id + '" style="width: 100px"><i class="bi bi-pencil-square me-1"></i>Update</button>';
              },
              createdCell: function(cell, cellData, rowData, rowIndex, colIndex) {
                $(cell).find('button').on('click', function() {
                  var uadminId = $(this).data('admin-id');
                  $.ajax({
                    url: 'includes/ajax.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { uadminId: uadminId },
                    success: function(data) {

                      $('#uptp_pl').val(data[0].tp_plantilla);
                      $('#upntp_pl').val(data[0].nontp_plantilla);
                      $('#uptp_jo').val(data[0].tp_jo);
                      $('#upcjo').val(data[0].jo_casual);
                      $('#upadmquarter').empty();
                      $('#upadmyear').empty();
                      $('#upadmquarter').append($('<option>', {
                          value: data[0].period,
                          text: data[0].name
                      }));
                      $('#upadmyear').append($('<option>', {
                          value: data[0].year,
                          text: data[0].year
                      }));
                      $('#update-btn').val(data[0].admin_id);
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
            action: 'get_admdata'   
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