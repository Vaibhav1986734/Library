 <?php
      header("Cache-Control: no-cache, must-revalidate");

         if (session_status() == PHP_SESSION_NONE) 
                 session_start();

                 $lrole="Faculty";

        include("shared/checkuserlogin.php");
        
?>

<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title> Library Faculty </title>

    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/all.min.css" rel="stylesheet">
    <link href="css/admincss.css" rel="stylesheet"/>
    <link href="css/style.css" rel="stylesheet">
    <link href="./images/login1.jpg" rel="shortcut icon" type="image/png">
    
    <style>
            a{
                color:black;
                font-weight: 500;
                font-family: calibri;
            }
        </style>

</head>

<body class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>

     <div id="layoutSidenav_content">

         <main>                

            <div style="text-align:center; border-radius:3px;">

                    <h3 class="text-danger font-weight-bold" style="padding-top:20px; text-shadow: 1px 1px 1px black;">
                        Welcome to BSSITM Library Faculty Dashboard
                    </h3>

                    <h5>  Here are some tips to help you get started</h5>
                    <hr>

<!------------Start the code of card----------------->

    <div class="container-fluid">
      <div class="row">

         <div class="col-md-3">
            <div class="card bg-info" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                <div class="card-body">
                         <h4>Total Book</h4>
                         <h4>
                         <i class="fas fa-book mr-3 text-light" style=" vertical-align:middle"></i>56000</h4>
                    <hr color="white">
                    <a href="#">View Details ...</a>
                </div>
            </div>
         </div>

            <div class="col-md-3 ">
                <div class="card bg-warning" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">
                        <h4>Total Student</h4>
                        <h4>
                         <i class="fas fa-users mr-3 text-light" style=" vertical-align:middle"></i>3000</h4>
                        <hr color="white">
                      <a href="#">View Details ...</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="card bg-success" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">
                        <h4>Total Request</h4>
                        <h4>
                         <i class="fas fa-paste mr-3 text-light" style=" vertical-align:middle ;"></i>257</h4>
                        <hr color="white">
                        <a href="#">View Details ...</a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="card bg-danger" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">
                        <h4>Accept Request</h4>
                        <h4>
                         <i class="fas fa-award mr-3 text-light" style=" vertical-align:middle"></i>5400</h4>
                        <hr color="white">
                        <a href="#">View Details ...</a>
                    </div>
                </div>
            </div>
         
      </div>
  </div>

  
<!------------ End the code of card ----------------->

 <!------------ start the code of grafh  ----------------->


<div class="container">
     <div class="row mt-4">

           <div class="col-md-6">
                 <canvas id="bar-chart" height="250"></canvas>
           </div>

           <div class="col-md-6 m-auto">
                  <canvas id="doughnut-chart"></canvas>
           </div>

      </div>
</div>
               <!------------ End the code of grafh  ----------------->


               
<!------------- Start the code of table ------------------------------>

<div class="container-fluid">
     <div class="row">
         <div class="col-md-8 mt-4">
        
<table class="table table-bordered">
  <thead>
      <tr class="bg-info">
         <b> <th colspan="4">
             Book Details
          </th></b>
        </tr>
    <tr>
      <th scope="col">S.N.</th>
      <th scope="col"> Related Branch Name</th>
      <th scope="col">Quantity</th>
      <th scope="col">Total Prise</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Cs/IT</td>
      <td>5680</td>
      <td>519500</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Civil</td>
      <td>456</td>
      <td>4370</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Mechanical</td>
      <td>765</td>
      <td>78500</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>P.M.T.</td>
      <td>435</td>
      <td>6750</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Library</td>
      <td>2350</td>
      <td>9850</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Chemical</td>
      <td>4035</td>
      <td>60750</td>
    </tr>
  </tbody>
</table>
        
         </div>

          <div class="col-md-4 mt-4">
          <div class="month">
  <ul>
    <li class="prev">&#10094;</li>
    <li class="next">&#10095;</li>
    <li>june<br><span style="font-size:18px">2022</span></li>
  </ul>
</div>

<ul class="weekdays">
  <li>Mo</li>
  <li>Tu</li>
  <li>We</li>
  <li>Th</li>
  <li>Fr</li>
  <li>Sa</li>
  <li>Su</li>
</ul>

<ul class="days">
  <li>1</li>
  <li><span class="active">2</span></li>
  <li>3</li>
  <li>4</li>
  <li>5</li>
  <li>6</li>
  <li>7</li>
  <li>8</li>
  <li>9</li>
  <li>10</li>
  <li>11</li>
  <li>12</li>
  <li>13</li>
  <li>14</li>
  <li>15</li>
  <li>16</li>
  <li>17</li>
  <li>18</li>
  <li>19</li>
  <li>20</li>
  <li>21</li>
  <li>22</li>
  <li>23</li>
  <li>24</li>
  <li>25</li>
  <li>26</li>
  <li>27</li>
  <li>28</li>
  <li>29</li>
  <li>30</li>
</ul>
          </div>

    </div>
</div>

<!-------------End the code of table------------------------------>

       </main>
            
            <?php include_once("shared/adminpagebottom.php") ?>
   </div>
 </div>    


    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.toaster.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminscripts.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://d19m59y37dris4.cloudfront.net/admin-premium/2-0/vendor/chart.js/Chart.min.js"></script>

    <script>
 new Chart(document.getElementById("doughnut-chart"), {
    type: 'doughnut',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,5267,734,784,433]
        }
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});


new Chart(document.getElementById("bar-chart"), {
    type: 'bar',
    data: {
      labels: ["Africa", "Asia", "Europe", "Latin America", "North America"],
      datasets: [
        {
          label: "Population (millions)",
          backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850"],
          data: [2478,4267,6734,5784,3833]
        }
      ]
    },
    options: {
      legend: { display: false },
      title: {
        display: true,
        text: 'Predicted world population (millions) in 2050'
      }
    }
});
      </script>

</body>
</html>