<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");


   $BranchId="";
        $BranchName="";

        if($_SERVER['REQUEST_METHOD']=="POST")
              {  
                     $flag=$_POST["hfFlag"];
                     $BranchId=$_POST["hfBranchId"];
                     $BranchName=$_POST["BranchName"];
          
   
       
                    if($flag=="a")
                       {
                         $rs=mysqli_query($con,"select max(BranchId) from branches")
                         or die("Error: ".mysqli_error($con));
	
	                 $msitid="";
	
                         if($row=mysqli_fetch_row($rs))
	                       $mBranchId=$row[0];

	                  if(!$mBranchId)
	                       $BranchId=10;
	                  else
	                       $BranchId=$mBranchId+1;

	  	 $sql="insert into branches values($BranchId,'$BranchName')";
	 
                       }
                    else
                      {
                       $sql="update branches set BranchName='$BranchName' where BranchId=$BranchId";
                      } 

             mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
             header("Location:  BranchDetails");

           }
        else
          { 
               $flag=$_GET["flag"];
               if($flag=="d")
                  {
	              if(isset($_GET["BranchId"])) 
                             $BranchId=$_GET["BranchId"];
    
                      mysqli_query($con,"delete from branches where BranchId=$BranchId")
                           or die("Error: ".mysqli_error($con));
                     header("Location: BranchDetails");
                  }
                 else
                  {
                     if($flag=="e")
                         {
                            if(isset($_GET["BranchId"]))
                                   $BranchId=$_GET["BranchId"];
     
                  $rs=mysqli_query($con,"select * from branches where BranchId=$BranchId")
                  or die("Error: ".mysqli_error($con));
    
                     if($row=mysqli_fetch_row($rs))
                              {
                                  $BranchName=$row[1];
                              }
                          }
                     else
                       {
                         $BranchName="";
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
                         <h3 class="text-white">Manage Branch</h3>
                    </div>

                  <div class="card-body">

                 <form method="post">

                   <div class="form-group">
         <label>Branch  Name</label>
          <input type="text" id="BranchName" name="BranchName" required="required" 
                 placeholder="Please enter branch" value="<?php echo $BranchName ?>"  
                           class="form-control" />
          
     </div>
                 <hr/>

         <div class="text-right">

       <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
       <input type="hidden" id="hfBranchId" name="hfBranchId" value="<?php echo $BranchId?>" />

       <button class="btn btn-outline-primary">
                <i style='font-size:20px' class='fa fa-save'> 
                       Submit
                </i>
         </button>

         <button class="btn btn-outline-danger" type="button" 
              onclick="window.location.replace('BranchDetails')">
              <i style='font-size:20px' class='fa fa-times'> 
                        Cancel
                  </i>
          </button>

    </div>

   
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
