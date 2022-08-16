<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

               $lrole="Administrator";
               include("shared/checkuserlogin.php");
               include("shared/conn.php");
             

  $qualificationid="";
  $qualificationname="";

  if($_SERVER['REQUEST_METHOD']=="POST")
  {  
    $flag=$_POST["hfFlag"];
    $qualificationid=$_POST["hfqualificationid"];
    $qualificationname=$_POST["hfqualificationname"];        
    if($flag=="a")
    {
      $rs=mysqli_query($con,"select max(qualificationid) from qualification")
          or die("Error: ".mysqli_error($con));
      $mqualificationid="";	
      if($row=mysqli_fetch_row($rs))
	      $mqualificationid=$row[0];
      if(!$mqualificationid)
        $qualificationid=10;
      else
        $qualificationid=$mqualificationid+1;

      $sql="insert into qualification values($qualificationid,'$qualificationname')";
    }
    else
    {
      $sql="update qualification set qualificationname='$qualificationname' where qualificationid=$qualificationid";
    } 
    mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
    header("Location: QualificationDetails");
  }
  else
  { 
    $flag=$_GET["flag"];
    if($flag=="d")
    {
	    if(isset($_GET["qualificationid"])) 
        $qualificationid=$_GET["qualificationid"];
    
      mysqli_query($con,"delete from qualification where qualificationid=$qualificationid") or die("Error: ".mysqli_error($con));
      header("Location: QualificationDetails");
    }
    else
    {
      if($flag=="e")
      {
        if(isset($_GET["qualificationid"]))
          $qualificationid=$_GET["qualificationid"];
     
        $rs=mysqli_query($con,"select * from qualification where qualificationid=$qualificationid")
            or die("Error: ".mysqli_error($con));
    
        if($row=mysqli_fetch_row($rs))
        {
          $qualificationname=$row[1];
        }
      }
      else
      {
        $qualificationname="";
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
              
                  <div class="card-title  p-2 text-center bg-info" >
                    <h3 class="text-white">Manage Qualification</h3>
                  </div>

                  <div class="card-body">
                    <form method="post">

                    <div class="form-group">
                      <label>Qualification Name</label>
                      <input type="text" id="hfqualificationname" name="hfqualificationname" required="required" placeholder="Please enter Qualification"
                       value="<?php echo $qualificationname ?>" class="form-control" />
                    </div>
                    <hr/>
                    <div class="text-right">
                      <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
                      <input type="hidden" id="hfqualificationid" name="hfqualificationid" value="<?php echo $qualificationid ?>" />
                      <button class="btn btn-outline-primary"><i style='font-size:20px' class='fa fa-save'></i> Submit</button>
                      <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('QualificationDetails')">
                        <i class="fa fa-times "></i> Cancel
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
