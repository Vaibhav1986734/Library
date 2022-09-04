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
       <title>Dashboard - Student Details</title>

       <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
      
<style>


</style>

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
         font-weight: bold;">Student Details</div>

          <div class="col-md-3 text:right">
              <a href="Managestudent?flag=a" class="btn btn-outline-success btn-sm ">
              <i class='fa fa-plus-square' style='font-size:22px'> 
                     Add New Student
               </i>
              </a>
          </div>

         </div>

       <hr/>
      
       
     <div class="row">
                        <div class="col-md-6">
                              <form action="" method="GET">
                                    <div class="input-group mb-1">
                                        <input type="text" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" 
                                        placeholder="Enter Enrollment/ Name" required="required" style="border-radius:50px 0 0 50px;">
                                        <button type="submit" class="btn btn-info" style="border-radius:  0  50px 50px 0;">Search</button>
                                    </div>
                                </form>
                        </div>

      
       <div class="col-md-12 mt-2">

<?php

$rs=mysqli_query($con,"select sid,enrollNo,studnm,branchname,yearname,mobile,spic,rfee,adhar
from student g Inner Join branches b on g.branchid=b.branchid Inner Join year y on g.yearid=y.yearid  order by sid desc")
            or die("Error: ".mysqli_error($con));

       $str="";
 
      $sid=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str.
			"<tr>
                               <td class='text-center'>$sid</td>
                               <td class='text-center'>$row[1]</td>
			                         <td class='text-center'>$row[2]</td>
			                         <td class='text-center'>$row[3]</td>
			                         <td class='text-center'>$row[4]</td>
			                         <td class='text-center'>$row[5]</td>
                                  <td class='text-center'>
                               <img src='$row[6]' width='80px' class='img-thumbnail'/>
                          </td>
                               <td class='text-center'>
                               <img src='$row[7]' width='80px' class='img-thumbnail'/>
                          </td>
                               <td class='text-center'>
                                      <img src='$row[8]' width='80px' class='img-thumbnail'/>
                                 </td>
                             
           <td class='text-center'>
        			   <a href='./studentdetails?sid=$row[0]' data-toggle='modal' data-target='#myModal' class='btn btn-outline-primary'>
                 <i class='fa fa-print'>   view  </i> 
                 </a>
      	</td>               
                                                       
               
                                
              <td class='text-center'>
        			   <a href='Managestudent?flag=e&sid=$row[0]'  class='  btn btn-outline-success '>
                 <i class='fa fa-edit '>
                  Edit
                  </i> 
                 </a>
      				</td>

                               <td class='text-center'>
                                     <a href='Managestudent?flag=d&sid=$row[0]' class='  btn btn-outline-danger'
                                          onclick='return confirm(\"Do you want to Delete this Record..?\")'>
                                          <i class='fa fa-trash'> 
                                                Delete
                                            </i> 
                                    </a>
                               </td>


                         </tr>";

                        $sid++;
             }
            
 $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered'>
             <tr class='bg-info text-white'>
               <th class='text-center'>Sno.</th>
               <th class='text-center'>Enrollment No</th>
               <th class='text-center'>Student Name</th>
               <th class='text-center'>Branch</th>
               <th class='text-center'>Year</th>
               <th class='text-center'>Mobile No.</th>
               <th class='text-center'>Student pic</th>
               <th class='text-center'>Fee Recipt</th>
               <th class='text-center'>Aadhar Photo</th>
               <th colspan='3' class='w-25 text-center' > Action</th>
            </tr>
                     $str
           </table>";
        }

       if($tbl)
               echo $tbl;
        else
             echo "No Date Found...!!";
      
    ?>

    
 <!-- Modal -->
 <div class="modal fade " id="myModal" role="dialog" >
    <div class="modal-dialog">
     
      <!-- Modal content-->
      <div class="row">
      <a class="ml-auto" data-dismiss="modal"><i class="fa fa-window-close text-danger"></i></a>
       <div class="card  border-primary" 
        style="border-radius: 25px; font-weight: 500; background-repeat: no-repeat;background-size: cover; background-image: url('./images/bg.jpg'); background-size:100% 100%;">
      
       <div class="card-body">      
          <?php
if($_SERVER['REQUEST_METHOD']=="GET")
{

              $sid=$_GET["sid"];

                 $rs=mysqli_query($con,"SELECT sid,enrollNo,studnm,branchname,yearname,mobile,spic,rfee,adhar
              from student g Inner Join branches b on g.branchid=b.branchid Inner Join year y on g.yearid=y.yearid where sid=$sid;")
            or die("Error: ".mysqli_error($con));

                   if($row=mysqli_fetch_row($rs))
                   {
                      $enrollNo=$row[1];
                       $studnm=$row[2];
                       $branchid=$row[3];
                       $yearid=$row[4];
                       $mobile=$row[5];
                       $spic=$row[6];
                       $rfee=$row[7]; 
                       $adhar=$row[8];
                 }
          }
    ?>

              <div class="col-md-12  text-dark text-center">
                <b><h4  style="font-weight: 700; ">Government Polytechnic Lucknow </h4></b>
             </div>
            <h5 class="text-dark text-center" style="font-weight: 600;">Library- Card </h5>
               <p class="text-center">Session:-2022-23</p>
               
    <div class="row">
       <div class="col-md-4">
            <img src="<?php echo  $spic ?>" alt="spic" class="img-thumbnail ">
      </div>

      <div class="col-md-8">
             Enrollment No.:-<?php echo $enrollNo ?><br>
             Name :-<?php echo $studnm ?> <br>
             Branch:-<?php echo  $branchid ?><br>
             Year:-<?php echo  $yearid ?><br>
             Mobile No.:-<?php echo $mobile ?><br>
      </div>
     
         
        </div>
      
      </div>
      
    </div>
       </div>
     </div>
  
 
</main>
         </div>
         </div>
         
     <?php  include_once("shared/adminpagebottom.php") ?>
         <?php
            mysqli_close($con); 
          ?>

      </body>
      </html>