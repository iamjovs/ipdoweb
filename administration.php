<?php
    include 'includes/header.php';
    session_start();
   
    
?>

<title>Administration | Intitutional Planning and Development Office</title>

</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
    <main id="main" class="main">
    <div class="row">
      <div class="pagetitle ">
        <h1>Administration</h1>
      </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Overall Report</a></li>
          <li class="breadcrumb-item active">Administration</li>
          <li class="breadcrumb-item">
        </ol>
      </nav>
      </div>
    <section class="section dashboard">
      <div class="row">

       

            <ol class="breadcrumb">
                  <li>  
                    <div class="form-floating mb-1" style="margin: 1em 0 0 0;">
                            <select class="form-select" style="line-height: 1em; font-size: .5;" id="select_campus" aria-label="State" onchange="updateChart()">
                              
                              <?php
                                  while ($row = $camres->fetch_assoc()) {
                                    echo"<option value='".$row['campus_id']."'>".$row['campus_name']." Campus</option>";
                                  }
                              ?>
                            </select>
                            <label for="floatingSelect">Campus</label>
                            
                    </div>
                  </li>
                </ol>

            <!-- Reports -->
            <div class="col-12" >
              <div class="card" >
                <div class="card-body">
      
                


                  <!-- Line Chart -->
                  <div id="reportsChart"></div>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            

        

      

      </div>
      <div class="card overflow-auto">  
         
              <!-- Active Table -->
              <small>
              <table class="table table-borderless table-striped ">
                <thead>
                  <tr class="bg-warning  text-center">
                    <th scope="col">Performance Indicators</th>
                    <th scope="col">Borongan</th>
                    <th scope="col">Can-Avid</th>
                    <th scope="col">Guiuan</th>
                    <th scope="col">Maydolong</th>
                    <th scope="col">Salcedo</th>
                  </tr>
                  <tr style="background: #90EE90;">
                    <th scope="col" colspan="<?php $numrows = $cmpres -> num_rows; echo $numrows+2?>" class=""><em>Number of Personnel:</em></th> 
                  </tr>
                </thead>
                <tbody>
           
                  <tr>
             
                    <td><i class="bi bi-chevron-double-right"></i><span class="p-2">Teaching Personel(Plantilla)</span></td>
                    <td class="text-center"><?php echo $borcol['tp_plantilla']; ?></td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>

                    
                  </tr>
                  <tr>
            
                    <td><i class="bi bi-chevron-double-right "></i><span class="p-2">Teaching Personel(JO)</span></td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
              
                  </tr>
                  <tr>
                 
                    <td><i class="bi bi-chevron-double-right "></i><span class="p-2">Non-Teaching Personel(Plantilla)</span></td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    
                  </tr>
                  <tr>
             
                    <td><i class="bi bi-chevron-double-right "></i><span class="p-2">Job Order & Casual</span></td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center">322</td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
                    <td class="text-center"></td>
  
                  </tr>
                  <tr class="text-center fw-bold">
                 
                    <td><em>Total</em></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                
                  </tr>
                </tbody>
              </table>
              </small>
              <!-- End Tables without borders -->

      
          </div>
       

       
    </section>

  </main><!-- End #main -->
 
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<?php
        include 'includes/scripts.php';
?>
    
   <script>          
                    var chart;
                    function updateChart() {
                        var campusId = document.getElementById("select_campus").value;
                        var xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                          if (this.readyState == 4 && this.status == 200) {
                            var data = JSON.parse(this.responseText);
                            updateChartData(data);
                          }
                        };
                        xhttp.open("GET", "includes/ajax.php?campus_id=" + campusId, true);
                        xhttp.send();
                      }

                      function updateChartData(data) {
                        chart.updateSeries([
                          {
                            name: 'Teaching Personel(Plantilla)',
                            data: data.tp_plantilla
                          },
                          {
                            name: 'Teaching Personel(JO)',
                            data: data.tp_jo
                          },
                          {
                            name: 'Non-Teaching Personel(Plantilla)',
                            data: data.ntp_plantilla
                          },
                          {
                            name: 'Job Order & Casual',
                            data: data.jo_casual
                          }
                        ]);
                        chart.updateOptions({
                          xaxis: {
                            categories: data.quarter
                          }
                        });
                      }

                    document.addEventListener("DOMContentLoaded", () => {
                       chart = new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Teaching Personel(Plantilla)',
                          data: <?php echo json_encode($tp_plantilla); ?>
                        }, {
                          name: 'Teaching Personel(JO)',
                          data: <?php echo json_encode($tp_jo); ?>
                        }, {
                          name: 'Non-Teaching Personel(Plantilla)',
                          data: <?php echo json_encode($ntp_plantilla); ?>
                        }, {
                          name: 'Job Order & Casual',
                          data: <?php echo json_encode($jo_casual); ?>
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: true,
                            tools: {
                              customButton: {
                                icon: '<i class="fa fa-download"></i>',
                                title: 'Download CSV',
                                click: function(chart, options, e) {
                                  // Handle button click event
                                }
                              }
                            }
                          },
                        },
                        markers: {
                          size: 4
                        },
                        colors: ['#4154f1', '#2eca6a', '#ff771d','#ff4560'],
                        fill: {
                          type: "gradient",
                          gradient: {
                            shadeIntensity: 1,
                            opacityFrom: 0.3,
                            opacityTo: 0.4,
                            stops: [0, 90, 100]
                          }
                        },
                        dataLabels: {
                          enabled: false
                        },
                        stroke: {
                          curve: 'smooth',
                          width: 2
                        },
                        xaxis: {
                          type: 'month',
                          categories: <?php echo json_encode($quarter); ?>
                        },
                        tooltip: {
                          x: {
                            format: ''
                          },
                        },
                        padding: {
                            left: 1,
                            right: 1
                        }
                      });

                      chart.render();

                      
                    });


                  </script>

<?php
        include 'includes/footer.php';
?>