<?php
    include 'includes/header.php';
    session_start();
    
?>
 
<title>Dashboard | Intitutional Planning and Development Office</title>

</head>

<body>

<?php
    include 'includes/navbar.php';
    include 'includes/sidebar.php';
?>
   <main id="main" class="main">
    <div class="row">
      <div class="pagetitle ">
        <h1>Dashboard</h1>
      </div>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.php">Overall Report</a></li>
          <li class="breadcrumb-item active">Administration</li>
          <li class="breadcrumb-item">
        </ol>
      </nav>
      </div>
      
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-7">
          <div class="row">

            

            <!-- Reports -->
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Administration <span>/Today</span></h5>

                  <!-- Line Chart -->
                  <div id="reportsChart"></div>

                  <script>
                    document.addEventListener("DOMContentLoaded", () => {
                      new ApexCharts(document.querySelector("#reportsChart"), {
                        series: [{
                          name: 'Teaching Personel(Plantilla)',
                          data: [31, 40, 28, 51, 42, 82, 56],
                        }, {
                          name: 'Teaching Personel(JO)',
                          data: [11, 32, 45, 32, 34, 52, 41]
                        }, {
                          name: 'Non-Teaching Personel(Plantilla)',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }, {
                          name: 'Job Order & Casual',
                          data: [15, 11, 32, 18, 9, 24, 11]
                        }],
                        chart: {
                          height: 350,
                          type: 'area',
                          toolbar: {
                            show: true
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
                          type: 'datetime',
                          categories: ["2018-09-19T00:00:00.000Z", "2018-09-19T01:30:00.000Z", "2018-09-19T02:30:00.000Z", "2018-09-19T03:30:00.000Z", "2018-09-19T04:30:00.000Z", "2018-09-19T05:30:00.000Z", "2018-09-19T06:30:00.000Z"]
                        },
                        tooltip: {
                          x: {
                            format: 'dd/MM/yy HH:mm'
                          },
                        }
                      }).render();
                    });
                  </script>
                  <!-- End Line Chart -->

                </div>

              </div>
            </div><!-- End Reports -->

            

          </div>
        </div><!-- End Left side columns -->

        <!-- Right side columns -->
        <div class="col-lg-5">

          <!-- Pie Percentage Traffic -->
         
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Personnel Percentage</h5>

              <!-- Pie Chart -->
              <div id="pieChart"></div>

             <table>
    <tbody>
        <tr>
            <th></th>
            <th>A</th>
            <th>B</th>
            <th>C</th>
        </tr>
        <tr>
            <th>1</th>
            <td><span id="A1" contenteditable>#####</span></td>
            <td><span id="B1" contenteditable></span></td>
            <td><span id="C1" contenteditable></span></td>
        </tr>
        <tr>
            <th>2</th>
            <td><span id="A2" contenteditable></span></td>
            <td><span id="B2" contenteditable></span></td>
            <td><span id="C2" contenteditable></span></td>
        </tr>
    </tbody>
</table>

            </div>
 
        </div><!-- End Pie Percentage Traffic -->

        

        </div><!-- End Right side columns -->

      </div>
      <div class="card">  
         
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
                    <th scope="col">Total</th>
                  </tr>
                  <tr style="background: #90EE90;">
                    <th scope="col" class=""><em>Number of Personnel:</em></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
           
                  <tr>
             
                    <td><i class="bi bi-chevron-double-right"></i><span class="p-2">Teaching Personel(Plantilla)</span></td>
                    <td class="text-center">322</td>
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
                    <td class="text-center">322</td>
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


<?php
        include 'includes/footer.php';
?>