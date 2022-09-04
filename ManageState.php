<?php

header("Cache-Control: no-cache, must-revalidate");

if (session_status() == PHP_SESSION_NONE) 
         session_start();

include("shared/checkuserlogin.php");

include("shared/conn.php");

        $stateid="";
        $statename="";

        if($_SERVER['REQUEST_METHOD']=="POST")
              {  
                     $flag=$_POST["hfFlag"];
                     $stateid=$_POST["hfstateid"];
                     $statename=$_POST["txtstatename"];
           
   
                    if($flag=="a")
                       {
                         $rs=mysqli_query($con,"select max(stateid) from states")
                         or die("Error: ".mysqli_error($con));
	
	                 $msitid="";
	
                         if($row=mysqli_fetch_row($rs))
	                       $mstateid=$row[0];

	                  if(!$mstateid)
	                       $stateid=10;
	                  else
	                       $stateid=$mstateid+1;

	  	 $sql="insert into states values($stateid,'$statename')";
	 
                       }
                    else
                      {
                       $sql="update states set statename='$statename' where stateid=$stateid";
                      } 

             mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
             header("Location: StateDetails");

           }
        else
          { 
               $flag=$_GET["flag"];
               if($flag=="d")
                  {
	              if(isset($_GET["stateid"])) 
                             $stateid=$_GET["stateid"];
    
                      mysqli_query($con,"delete from states where stateid=$stateid") or
                     die("Error: ".mysqli_error($con));
                     header("Location: StateDetails");
                  }
                 else
                  {
                     if($flag=="e")
                         {
                            if(isset($_GET["stateid"]))
                                   $stateid=$_GET["stateid"];
     
                  $rs=mysqli_query($con,"select * from states where stateid=$stateid")
                  or die("Error: ".mysqli_error($con));
    
                 if($row=mysqli_fetch_row($rs))
                           {
                                  $statename=$row[1];
                           }
                        }
                     else
                       {
                         $statename="";
                        }
      }
}

?>
<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title>Dashboard - Manage States</title>
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
           <div class="card-title bg-info p-2 text-center">
                   <h3 class="text-white">Manage State</h3>
           </div>

          <div class="card-body">

          <form method="post">

      <div class="form-group">
         <label>State Name</label>
          <input type="text" id="txtstatename" name="txtstatename" required="required" 
                 placeholder="Please enter State" value="<?php echo $statename ?>" class="form-control" />
     </div>
   
    <hr/>

   <div class="text-right">

       <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
       <input type="hidden" id="hfstateid" name="hfstateid" value="<?php echo $stateid ?>" />

         <button class="btn btn-outline-info"><i style='font-size:20px' class='fa fa-save'></i> Submit</button>
         <button class="btn btn-outline-danger" type="button" 
              onclick="window.location.replace('StateDetails')">
<i style='font-size:20px' class='fa fa-times'></i>
                        Cancel
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