<?php
      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
             session_start();

      $lrole="Administrator";

      include("shared/checkuserlogin.php");
      //include("shared/conn.php");      

      
    

?>

<!DOCTYPE html>
  <html>

   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Request-accept  Details</title>

      <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />

      <style>

@media print
  {
    #btnPrint{
      display:none;
    }
  
 }

</style>

   </head>

   <body class="sb-nav-fixed">
   <?php include_once("shared/adminpagetop.php") ?>

   <div id="layoutSidenav">
     <?php include_once("shared/adminsidenav.php") ?>

     <div id="layoutSidenav_content">


      <main> 
      <div class="container">
         <div class="row mt-2">
            <div class="col-6">
               <h3>Received Book List</h3>
            </div>
            <div class="col-6 text-right">
            <button id="btnPrint" onclick='print();' class='btn btn-outline-success mt-3'>
                                      <i class='fa fa-print'>
                                        Print Report
                                      </i> 
                                 </button>
            </div>
         </div>
         <hr/>
         <div class="row table-responsive">
            <div class="col-md-12">
               <?php
                  $rs=mysqli_query($con,"select Reqid,enrollNo,studnm,branchname,yearname,mobile,bname,idCard 
                  from requestb g Inner Join branches b on g.branchid=b.branchid Inner Join year y on g.yearid=y.yearid
                  where status='A' order
                   by Reqid desc")
                   
                  or die("Error: ".mysqli_error($con));
                  $str="";
                  $Reqid=1;
                 
                  while($row=mysqli_fetch_array($rs))
                     {
                        $str.="<tr>
                                 <td>$Reqid .</td>
                                 <td>$row[1]</td>
                                 <td>$row[2]</td>
                                 <td>$row[3]</td>
                                 <td>$row[4]</td>
                                 <td>$row[5]</td>
                                 <td>$row[6]</td>
                                 <td class='text-center'><img src='$row[7]' width='120px' class='img img-thumbnail'/></td>
                                
                               </tr>";
                        
                              $Reqid++;
                     }
                     $tbl="";
                     if($str)
                     {
                        $tbl.="<table class='table table-bordered '>
                                    <tr class='bg-info text-white text-center'>
                                    <th>Sno.</th>
                                    <th>Enrolement No.</th>
                                    <th>Student Name</th>
                                    <th>Branch</th>
                                    <th>Year</th>
                                    <th>Mobile No.</th>
                                    <th>Book Name</th>
                                    <th>Library Card</th>
                                   
                               </tr>
                                    
                                    $str
                                    </table>";
                     }
                     if($tbl)
                        echo $tbl;
                     else
                        echo "No data found.." ;
               ?>
            </div>
         </div>
      </div>
      </main>
          
          <?php
            mysqli_close($con); 
            include_once("shared/adminpagebottom.php") 
          ?>
      </div>
  </div>

   </body>
</html>