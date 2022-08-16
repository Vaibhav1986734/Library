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
       <title>Dashboard - Faculty Details</title>

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
         font-weight: bold;">faculty Details</div>

          <div class="col-md-3 text:right">
           <a href="managefaculty?flag=a" class="btn btn-success text-white">Add New faculty</a>
          </div>

         </div>

       <hr/>

     <div class="row table-responsive">
       <div class="col-md-12">

<?php

       $rs=mysqli_query($con,"select empno,fname,dob,designationId,BranchId,mno,email,
       address,pincode,adnumber,photo,sign from facultie order by empno desc")
        or die("Error: ".mysqli_error($con));

       $str="";
 
      $empno=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str.
			"<tr>
          <td class='text-center'>$empno</td>
          <td class='text-center'>$row[1]</td>
			    <td class='text-center'>$row[2]</td>
			    <td class='text-center'>$row[3]</td>
			    <td class='text-center'>$row[4]</td>
			    <td class='text-center'>$row[5]</td>
			    <td class='text-center'>$row[6]</td>
			    <td class='text-center'>$row[7]</td>
			    <td class='text-center'>$row[8]</td>
			    <td class='text-center'>$row[9]</td>
			  
			   
			  
         

			    <td class='text-center'>
              <img src='$row[8]' width='80px' class='img-thumbnail'/>
          </td>
          
			    <td class='text-center'>
              <img src='$row[9]' width='80px' class='img-thumbnail'/>
          </td>

                                <td class='text-center'>

        			   <a href='managefaculty?flag=e&empno=$row[0]'  class='btn btn-outline-success'>Edit</a>
      				</td>

                               <td class='text-center'>
                                    <a href='managefaculty?flag=d&empno=$row[0]' class='btn btn-outline-danger' 
                                        onclick='return confirm(\"Do you want to Delete this Record..?\")'> Delete </a>
                              </td>

       </tr>";

                        $empno++;
             }

 $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered'>
             <tr class='bg-info text-white'>
               <th class='text-center'>Sno.</th>
               <th class='text-center'>Faculty Name</th>              
               <th class='text-center'>Dob</th>
               <th class='text-center'>Designation</th>
               <th class='text-center'>Branch</th>
               <th class='text-center'>Mobile Number</th>
               <th class='text-center'>Email</th>
               <th class='text-center'>Address</th>
               <th class='text-center'>Pincode</th>
               <th class='text-center'>Adhar Number</th>              
               <th class='text-center'>Photo</th>
               <th class='text-center'>Signature</th>
               <th colspan='2' class='w-25 text-center'> Action</th>
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
 