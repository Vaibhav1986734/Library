<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");
?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>Dashboard - Brabch Details</title>

       <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />

   </head>

  <body class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>

        <div id="layoutSidenav_content">

            <main>

     <div class="container mt-3">

      <div class="row">

        <div class="col-md-9" style="font-size: 25px;
         font-weight: bold;">Branch Details</div>

          <div class="col-md-3 text:right">
           <a href="Managebranch?flag=a" class="btn btn-success text-white btn-sm">
	                 		 <i class='fa fa-plus-square' style='font-size:22px'> 
                       Add New Branch
                      </i>
           </a>
          </div>
          



         </div>
         

       <hr/>

     <div class="row table-responsive">
       <div class="col md-12">

  <?php

       $rs=mysqli_query($con,"select * from branches order by BranchId desc")
       or die("Error: ".mysqli_error($con));
 
      $str="";
 
      $BranchId=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str."<tr>
                               <td>$BranchId</td>
                               <td>$row[1]</td>

                               

                                <td class='text-center'>

                        <a href='ManageBranch?flag=e&BranchId=$row[0]'
                                class='btn btn-outline-success'>
                              <i class='fa fa-edit'>
                                   Edit
                              </i>
                         </a>

                         <td class='text-center'>
                         <a href='ManageBranch?flag=d&BranchId=$row[0]' class='btn btn-outline-danger deleteuser'                    
                               onclick='return confirm(\"Do you want to Delete this  Record..?\")'>
                          <i class='fa fa-trash'> 
                               Delete
                          </i>
                       </a>

                        </td>

      				

                             
                         </tr>";

                        $BranchId++;
             }

 
     $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered'>
             <tr class='bg-info text-white'>
               <th>Sno.</th>
               <th>Branch</th>
               <th colspan='2' class='w-25'>&nbsp;</th>
            </tr>
                     $str
           </table>";
        }

       if($tbl)
               echo $tbl;
        else
             echo "No Date Found...!!";
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