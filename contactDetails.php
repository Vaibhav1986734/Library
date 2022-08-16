<?php
      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
             session_start();

      $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");      

      if($_REQUEST["flag"]=="d")
      {
          $cid=$_GET['cid'];
          mysqli_query($con,"delete from contact where cid=$cid") or die("Error: ".mysqli_error($con));
       

      header("location: contactDetails.php");
      }
?>

<!DOCTYPE html>
  <html>

   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - contact Details</title>

      <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
   </head>

   <body class="sb-nav-fixed" >
   <?php include_once("shared/adminpagetop.php") ?>

   <div id="layoutSidenav">
     <?php include_once("shared/adminsidenav.php") ?>

     <div id="layoutSidenav_content">


      <main> 
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h3>Contact Details</h3>
            </div>
         </div>
         <hr/>
         <div class="row table-responsive">
            <div class="col-md-12">
               <?php
                  $rs=mysqli_query($con,"SELECT `cid`, `name`, `mail`, `mno`, `address`, `photo`, `mess` FROM `contact`  order by cid desc")
                   
                  or die("Error: ".mysqli_error($con));
                  $str="";
                  $cid=1;

                  while($row=mysqli_fetch_array($rs))
                     {
                        $str.="<tr>
                                 <td>$cid .</td>
                                 <td>$row[1]</td>
                                 <td>$row[2]</td>
                                 <td>$row[3]</td>
                                 <td>$row[4]</td>
                                 <td class='text-center'>
                                 <img src='$row[5]' width='80px' class='img-thumbnail'/>
                           </td>

                           
                           <td>$row[6]</td>


                                 <td class='text-center'>
             
                                 <a href='contactDetails?flag=d&cid=$row[0]' class='btn btn-outline-danger'
                                        onclick='return confirm(\"Do you want to Delete this Record..?\")'>
                                        <i class='fa fa-times'> 
                                            Delete
                                          </i> 
                                  </a>
                             </td>


                </tr>";
         
               $cid++;
      }
      $tbl="";
      if($str)
      {
         $tbl.="<table class='table table-bordered '>
                     <tr class='bg-info text-white text-center'>
                     <th>Sno.</th>
                     <th>Name</th>
                     <th>E-mail</th>
                     <th>Mobile No.</th>
                     <th>Address</th>
                     <th>Photo</th>
                     <th>Message</th>
                     <th class='text-center'> Action</th>
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