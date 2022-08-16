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
       <title>Dashboard - Book Details</title>

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
         font-weight: bold;">Book Details</div>

          <div class="col-md-3 text:right">
              <a href="Managebook?flag=a" class="btn btn-success btn-sm ">
              <i class='fa fa-plus-square' style='font-size:22px'> 
                     Add New Book
               </i>
              </a>
          </div>

         </div>

       <hr/>

     <div class="row table-responsive">
       <div class="col-md-12">

<?php

       $rs=mysqli_query($con,"select bno,bname,author,pcation,branchname,price,qtity, price*qtity,photo,qrcode
       from book bo INNER JOIN branches br on bo.branchid=br.branchid  order by bno desc")
                   or die("Error: ".mysqli_error($con));


       $str="";
 
      $bno=1;

       while($row=mysqli_fetch_array($rs))
          {
                $str=$str.
			"<tr>
                               <td class='text-center'>$bno</td>
                               <td class='text-center'>$row[1]</td>
			                         <td class='text-center'>$row[2]</td>
			                         <td class='text-center'>$row[3]</td>
			                         <td class='text-center'>$row[4]</td>
			                         <td class='text-center'>$row[5]</td>
			                         <td class='text-center'>$row[6]</td>
			                         <td class='text-center'>$row[7]</td>
			                         <td class='text-center'>
                                                              <img src='$row[8]' width='80px' class='img-thumbnail'/>
                                                        </td>
                                                        <td class='text-center'>
                                                              <img src='$row[9]' width='80px' class='img img-thumbnail'/>
                                                         </td>

                                
              <td class='text-center'>

        			   <a href='Managebook?flag=e&bno=$row[0]'  class='btn btn-outline-success '>
                 <i class='fa fa-edit '>
                  Edit
                  </i> 
                 </a>
      				</td>

                               <td class='text-center'>

                                   <a href='Managebook?flag=d&bno=$row[0]' class='btn btn-outline-danger'
                                          onclick='return confirm(\"Do you want to Delete this Record..?\")'>
                                          <i class='fa fa-trash'> 
                                                Delete
                                            </i> 
                                    </a>
                               </td>


                         </tr>";

                        $bno++;
             }

 $tbl="";

      if($str)
       {
          $tbl=$tbl."<table class='table table-bordered'>
             <tr class='bg-info text-white'>
               <th class='text-center'>Sno.</th>
               <th class='text-center'> Book Name</th>
               <th class='text-center'>Author</th>
               <th class='text-center'>Publication</th>
               <th class='text-center'>Branch</th>
               <th class='text-center'>price</th>
               <th class='text-center'>Quantity</th>
               <th class='text-center'>Total Amount</th>
               <th class='text-center'> Book Cover Photo</th>
               <th class='text-center'> Book Qrcode Photo</th>
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