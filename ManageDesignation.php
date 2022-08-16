<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

               $lrole="Administrator";

               include("shared/checkuserlogin.php");
             
               include("shared/conn.php");
             

  $designationid="";
  $designationname="";

  if($_SERVER['REQUEST_METHOD']=="POST")
  {  
    $flag=$_POST["hfFlag"];
    $designationid=$_POST["hfdesignationid"];
    $designationname=$_POST["hfdesignationname"];        
    if($flag=="a")
    {
      $rs=mysqli_query($con,"select max(designationid) from designation")
          or die("Error: ".mysqli_error($con));
      $mdesignationid="";	
      if($row=mysqli_fetch_row($rs))
	      $mdesignationid=$row[0];
      if(!$mdesignationid)
        $designationid=10;
      else
        $designationid=$mdesignationid+1;

      $sql="insert into designation values($designationid,'$designationname')";
    }
    else
    {
      $sql="update designation set designationname='$designationname' where designationid=$designationid";
    } 
    mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
    header("Location: DesignationDetails");
  }
  else
  { 
    $flag=$_GET["flag"];
    if($flag=="d")
    {
	    if(isset($_GET["designationid"])) 
        $designationid=$_GET["designationid"];
    
      mysqli_query($con,"delete from designation where designationid=$designationid") or die("Error: ".mysqli_error($con));
      header("Location: DesignationDetails");
    }
    else
    {
      if($flag=="e")
      {
        if(isset($_GET["designationid"]))
          $designationid=$_GET["designationid"];
     
        $rs=mysqli_query($con,"select * from designation where designationid=$designationid")
            or die("Error: ".mysqli_error($con));
    
        if($row=mysqli_fetch_row($rs))
        {
          $designationname=$row[1];
        }
      }
      else
      {
        $designationname="";
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

<body class="sbnavfixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>

        <div id="layoutSidenav_content">
            <main>  

            <div class="conatiner">
             <div class="row">
              <div class="col-md-6 mx-auto">
                <div class="card mt-5">
              
                  <div class="card-title  p-2 text-center" style="background-image: linear-gradient(#2a9ed4,#2491d1)">
                    <h3 class="text-white">Manage Designation</h3>
                  </div>

                  <div class="card-body">
                    <form method="post">

                    <div class="form-group">
                      <label>Designation Name</label>
                      <input type="text" id="hfdesignationname" name="hfdesignationname" required="required" placeholder="Please enter Designation"
                       value="<?php echo $designationname ?>" class="form-control" />
                    </div>
                    <hr/>
                    <div class="text-right">
                         <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
                         <input type="hidden" id="hfdesignationid" name="hfdesignationid" value="<?php echo $designationid ?>" />
                         <button class="btn btn-outline-primary"><i style='font-size:20px' class='fa fa-save'></i> 
                              Submit
                         </button>

                         <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('DesignationDetails')">
                                 <i class="fa fa-times "></i>
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