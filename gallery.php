   <!DOCTYPE html>
   <html>
      <head>
               <title>Government Polytechnic Lucknow Library</title>
               <link rel="stylesheet" href="css/bootstrap.min.css" />
               <link rel="stylesheet" href="css/all.min.css" />
               <link rel="stylesheet" href="css/site.css">
               <style>
.card
{

      border:1px solid gray;
      box-shadow:0px 0px 10px gray;
      font-family:'calibri';
}
                </style>
       </head>
<body >
<!----------------------call tha pagetop.php---------------------------------->
 <?php
   include("shared/pagetop.php");
   include("shared/conn.php");
?>

<hr>
  
  <div class="container mb-3">
    <div class="row">

      <div class="col-md-12 m-auto">

          <h1 style="font-family:Algerian; color:blue; text-align:center;">
                 <img src="./images/book.png">   
                     Our Gallery
                 <img src="./images/book.png">   
        </h1> <hr>
      </div>
   </div>



    <div class="row m-1">

    <?php

$pid="";

       $rs="select * from gallery";
         $query_run = mysqli_query ($con,$rs);
           $check_photo = mysqli_num_rows($query_run) > 0;
          
           if($check_photo)
           {
            while($row=mysqli_fetch_array($query_run))
            {
               ?>

               <div class="col-md-3 mt-3">
                <div class="card p-2">
                 <div class="card-body m-0 p-0">
                 <img src="<?php echo $row['gphoto']; ?>"  alt="img-1"  class="img-fluid  img-thumbnail">
                  </div>
                 <b><?php echo $row['pdetails']; ?>  </b>
               </div>
          </div>
                <?php 
               
            }
           }
           
          
         else
            echo(" result not found ");
    ?>
      
      

    </div>      
  </div>
                
                         
  <?php
   include("shared/pagebottom.php");
   ?>     
    

  </body>
</html>