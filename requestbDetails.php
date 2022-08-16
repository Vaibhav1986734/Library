<?php
      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
             session_start();

      $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");      

      if($_REQUEST["flag"]=="d")
      {
          $Reqid=$_GET['Reqid'];
          mysqli_query($con,"DELETE FROM `requestb` WHERE  Reqid=$Reqid") or die("Error: ".mysqli_error($con));
      

      $idCard="images/idCard/$id.jpg";
 
      if(file_exists($idCard))unlink($idCard);  

      header("location: requestbDetails.php");
      }

    

?>

<!DOCTYPE html>
  <html>

   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - Grievance Details</title>

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
      <div class="container">
         <div class="row">
            <div class="col-12">
               <h3>Request Book</h3>
            </div>
         </div>
         <hr/>
         <div class="row table-responsive">
            <div class="col-md-12">
               <?php
                  $rs=mysqli_query($con,"select Reqid,enrollNo,studnm,branchname,yearname,mobile,bname,idCard 
                  from requestb g Inner Join branches b on g.branchid=b.branchid Inner Join year y on g.yearid=y.yearid
                  where status='N' order
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
                                               
                                  
                                 <td class='text-center'>
                                  
                                  
                                  <button onclick='setStatus(\"Do you want to Accept Book Request..?\",\"A\",$row[0]);' class='btn btn-outline-success'>
                                      <i class='fa fa-check'>
                                        Accept
                                      </i> 
                                 </button>
                                 </td>
                                 <td>
                                 <button onclick='setStatus(\"Do you want to Reject Book Request..?\",\"R\",$row[0]);' class='btn btn-outline-danger'>
                                 <i class='fa fa-times'> 
                                 Unaccept
                              </i> 
                                 </button>
                                 
                               </td>
             
                                           


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
                                    <th colspan='2' class='w-25 text-center'> Action</th>
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
  <script>
    function setStatus(msg,status,reqid)
    {
      //alert("Req Id: "+reqid +" Status: "+status);
      
      if(confirm(msg))
      {       
         
         $.ajax({
        type: "POST",
        url: "api/BookStatus.php",
        data: JSON.stringify({"ReqId":reqid,"Status":status}),
        contentType: "application/json; charset=utf-8",
        dataType: "json",
        success: function (response) {
           if(response.ResponseCode===1)
           {
            alert(response.ResponseText);
            location.reload();
           }
        },
        error: function (error) {
            alert(JSON.stringify(error));
        }
    });

      }
    }
  </script>
   </body>
</html>