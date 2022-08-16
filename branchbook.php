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
  
    $id="";
    if($_SERVER['REQUEST_METHOD']=="GET")
    {
        $id=$_GET["id"];
    }

?>

<hr>
  
  <div class="container mb-3">
    <div class="row">

      <div class="col-md-12 m-auto">

          <h1 style="font-family:Algerian; color:blue; text-align:center;">
                 <img src="./images/book.png">   
                  Books
                 <img src="./images/book.png">   
        </h1> <hr>
      </div>
   </div>



   <div class="row m-1">

    <?php
       $rs="select * from book  where branchid ='$id'";
         $query_run = mysqli_query ($con,$rs);
          
           if(mysqli_num_rows($query_run) > 0)
           {
            while($row=mysqli_fetch_array($query_run))
            {
               ?>

               

               <div class="col-md-3 mt-3">
                <div class="card  text-center h-70 p-2">
                 <div class="card-body  text-center m-0 p-0">
                 <img src="<?php echo $row['photo']; ?>"  alt="img-1"  class=" img-fluid  img-thumbnail">
                  </div>
                 <b><?php echo $row['bname'] ;  ?> [<?php echo $row['author']; ?>]  </b>
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