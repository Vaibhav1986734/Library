<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

 $pno="";
        $pname="";

        if($_SERVER['REQUEST_METHOD']=="POST")
              {  
                     $flag=$_POST["hfFlag"];
                     $pno=$_POST["hfpno"];
                     $pname=$_POST["txtpname"];
           
   
                    if($flag=="a")
                       {
                         $rs=mysqli_query($con,"select max(pno) from publisher")
                         or die("Error: ".mysqli_error($con));
	
	                 $msitid="";
	
                         if($row=mysqli_fetch_row($rs))
	                       $mpno=$row[0];

	                  if(!$mpno)
	                       $pno=100;
	                  else
	                       $pno=$mpno+1;

	  	 $sql="insert into publisher values($pno,'$pname')";
	 
                       }
                    else
                      {
                       $sql="update publisher set pname='$pname' where pno=$pno";
                      } 

             mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
             header("Location:publisherDetails");

           }
        else
          { 
               $flag=$_GET["flag"];
               if($flag=="d")
                  {
	              if(isset($_GET["pno"])) 
                             $pno=$_GET["pno"];
    
                      mysqli_query($con,"delete from publisher where pno=$pno") or
                     die("Error: ".mysqli_error($con));
                     header("Location:publisherDetails");
                  }
                 else
                  {
                     if($flag=="e")
                         {
                            if(isset($_GET["pno"]))
                                   $pno=$_GET["pno"];
     
                  $rs=mysqli_query($con,"select * from publisher where pno=$pno")
                  or die("Error: ".mysqli_error($con));
    
                 if($row=mysqli_fetch_row($rs))
                           {
                                  $pname=$row[1];
                           }
                        }
                     else
                       {
                         $pname="";
                        }
      }
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title>Dashboard - Manage Leave Type</title>

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
                   <div class="col-md-6 mx-auto">

                 <div class="card mt-5">

                   <div class="card-title bg-primary p-2 text-center">
                   <h3 class="text-white">Manage publisher</h3>
           </div>

                  <div class="card-body">

                 <form method="post">

                  <div class="form-group">
         <label>Publisher Name</label>
          <input type="text" id="txtpname" name="txtpname" required="required" 
                 placeholder="Please enter Publisher" value="<?php echo $pname ?>" 
                                             class="form-control" />
     </div>

                 <hr/>

        <div class="text-right">  

             <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
       <input type="hidden" id="hfpno" name="hfpno" value="<?php echo $pno ?>" />

       <button class="btn btn-outline-success">
                 <i style='font-size:20px' class='fa fa-save'> 
                       Submit
                </i>
          </button>

         <button class="btn btn-outline-danger" type="button" 
              onclick="window.location.replace('publisherdetails')">
              <i style='font-size:20px' class='fa fa-times'> 
                        Cancel
                  </i>
         </button>

    </div>

   </form>

  </div>
 </div>

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
