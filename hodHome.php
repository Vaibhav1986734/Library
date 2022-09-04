 <?php
      header("Cache-Control: no-cache, must-revalidate");

         if (session_status() == PHP_SESSION_NONE) 
                 session_start();

                 $lrole="H.O.D.";

        include("shared/checkuserlogin.php");
        
?>

<!DOCTYPE html>
<head>
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title> Library HOD </title>

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
                        Welcome to GPL  Library H.O.D. Dashboard
                    </h3>

                    <h5>  Here are some tips to help you get started</h5>
                    <hr>

<!------------Start the code of card----------------->

    <div class="container-fluid">
      <div class="row">

         <div class="col-md-3">
            <div class="card bg-info" style="box-shadow:3px 3px 3px gray; border-radius:20px;">

        <?php

            $rs=mysqli_query($con,"select max(bno) from book")
              or die("Error: ".mysqli_error($con));

             $mbno="";

             if($row=mysqli_fetch_row($rs))
             $mbno=$row[0];

            ?>
            
                <div class="card-body">
                         <h4>Total Book</h4>
                         <h4>
                         <i class="fas fa-book mr-3 text-light" style=" vertical-align:middle"></i>
                         <?php echo $mbno ?>
                        </h4>
                </div>
            </div>
         </div>

            <div class="col-md-3 ">
                <div class="card bg-warning" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">

           <?php

            $rs=mysqli_query($con,"select max(sid) from student;")
              or die("Error: ".mysqli_error($con));

             $msid="";

             if($row=mysqli_fetch_row($rs))
             $msid=$row[0];

            ?>

                        <h4>Total Student</h4>
                        <h4>
                         <i class="fas fa-users mr-3 text-light" style=" vertical-align:middle"></i>
                         <?php echo $msid ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="card bg-success" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">
                    <?php

                       $rs=mysqli_query($con," select max(Reqid) from requestb where status='N'")
                         or die("Error: ".mysqli_error($con));

                          $mReqid="";

                           if($row=mysqli_fetch_row($rs))
                          $mReqid=$row[0];

                    ?>

                        <h4>Total Request</h4>
                        <h4>   
                         <i class="fas fa-paste mr-3 text-light" style=" vertical-align:middle ;"></i>
                         <?php echo $mReqid ?></h4>
                    </div>
                </div>
            </div>

            <div class="col-md-3 ">
                <div class="card bg-danger" style="box-shadow:3px 3px 3px gray; border-radius:20px;">
                    <div class="card-body">

                    <?php

                      $rs=mysqli_query($con," select max(Reqid) from requestb where status='A'")
                      or die("Error: ".mysqli_error($con));

                      $mReqid="";

                      if($row=mysqli_fetch_row($rs))
                     $mReqid=$row[0];

                  ?>                   
                        <h4>Accept Request</h4>
                        <h4>
                         <i class="fas fa-award mr-3 text-light" style=" vertical-align:middle"></i>
                         <?php echo $mReqid ?></h4>
                     </div>
                </div>
            </div>
         
      </div>
  </div>

  
<!------------ End the code of card ----------------->


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
      <th scope="col">Book Name</th>
      <th scope="col">Author</th>
      <th scope="col">Publication </th>
    </tr>
  </thead>
  <tbody>
    
  <?php
  {
  $rs=mysqli_query($con,"SELECT `facultid`, `fusername`, `fpassword`, `facultname`, `femail`, `fcontact`, `fbranchid`, `fdesignationid`,
   `fqualificationid`, `photo` FROM `faculties` f ".
  " INNER JOIN branches b on f.fbranchid=b.branchid ".
  "WHERE fusername='$username'") or die("Error: ".mysqli_error($con));
  if($row=mysqli_fetch_row($rs))
      { 
        $facultid=$row[1];
        $facname=$row[2];
        $fpassword=$row[3];
        $desig=$row[4];
        $branch=$row[5];
        $photo=$row[6];
        $fbranchid=$row[7];
        $femail=$row[8];
        $fcontact=$row[9];
      }
    }

  $bno="";
  $bname="";
  $pcation="";
       $rs="SELECT bno, bname, author, pcation, branchid FROM book WHERE  branchid ='$branchid'";
         $query_run = mysqli_query ($con,$rs);
          
           if(mysqli_num_rows($query_run) > 0)
           {
            while($row=mysqli_fetch_array($query_run))
            {
               ?>
<tr>
      <th><?php echo $row['bno']; ?></th>
      <th><?php echo $row['bname']; ?></th>
      <th><?php echo $row['author']; ?></th>
      <th><?php echo $row['pcation']; ?></th>
</tr>
                <?php 
               
            }
           }
           
          
         else
            echo(" result not found ");
    ?>
   
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

</body>
</html>