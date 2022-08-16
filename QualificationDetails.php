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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
    <title>Dashboard - Qualification Details</title>
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

              <div class="col-6 col-sm-7 col-md-8 " style="font-size: 25px;font-weight: bold;">Qualification Details</div>

              <div class="col-6 col-sm-5 col-md-4 text-right">
              <a href="ManageQualification?flag=a" class="btn text-white btn-sm" style="background-color: #27a16c">
	                 		 <i class='fa fa-plus-square' style='font-size:20px; padding: 4px'> 
                       Add New Qualification
                      </i>
</a>
              </div>

            </div>
            <hr/>
            <div class="row table-responsive">
              <div class="col md-12">
                <?php
                  $rs=mysqli_query($con,"select * from qualification order by qualificationid desc")
                      or die("Error: ".mysqli_error($con)); 
                  $str=""; 
                  $qualificationid=1;
                  while($row=mysqli_fetch_array($rs))
                  {
                    $str=$str."<tr>
                               <td>$qualificationid</td>
                               <td>$row[1]</td>
                               <td class='text-center'>
        			                  <a href='ManageQualification?flag=e&qualificationid=$row[0]' class='btn btn-outline-success'>	
                                  <i class='fa fa-edit'></i> Edit
                                </a>
      				                 </td>
                               <td class='text-center'>
                                <a href='ManageQualification?flag=d&qualificationid=$row[0]' class='btn btn-outline-danger' 
                                 onclick='return confirm(\"Do you want to Delete this  Record..?\")'>
                                 <i class='fa fa-trash'></i> Delete
                                </a>
                               </td>
                               </tr>";
                    $qualificationid++;
                  }
                  $tbl="";
                  if($str)
                  {
                    $tbl=$tbl."<table class='table table-bordered'>
                               <tr class='bg-info text-white'>
                                <th>Sno.</th>
                                <th>Qualification</th>
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