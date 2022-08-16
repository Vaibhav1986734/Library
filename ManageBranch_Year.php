<?php
       header("Cache-Control: no-cache, must-revalidate");

       if (session_status() == PHP_SESSION_NONE) 
                session_start();
 
       include("shared/checkuserlogin.php");
 
       include("shared/conn.php");

   $branchid="";
   $yearid="";
   $yearname="";


   if($_SERVER['REQUEST_METHOD']=="POST")
    {  
   
        $flag=$_POST["hfFlag"];
        $yearid=$_POST["hfyearid"];
        $branchid=$_POST["hfbranchid"];
        $yearname=$_POST["txtyearname"];
          
   
        if($flag=="a")
          {
             $rs=mysqli_query($con,"select max(yearid) from year") 
             or die("Error: ".mysqli_error($con));
	
	     $myearid="";
	     if($row=mysqli_fetch_row($rs))
	          $myearid=$row[0];

	     if(!$myearid)
	        $yearid=1;

	     else
          $yearid=$myearid+1;	 
   
	    $sql="insert into year values($yearid,'$yearname',$branchid)";
   
          }
        else
          {
              $sql="update year set yearname='$yearname' where yearid=$yearid";
          } 

         mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
         header("Location: Branch_YearDetails?branchid=$branchid");
    }
  else
    { 
                 $flag=$_GET["flag"];

                 if($flag=="d")
                  {
                          if(isset($_GET["yearid"])) 
                                 $yearid=$_GET["yearid"];

                           if(isset($_GET["branchid"])) 
                                    $branchid=$_GET["branchid"];

                                mysqli_query($con,"delete from year where yearid=$yearid") 
                                or die("Error: ".mysqli_error($con));
                               header("Location: Branch_YearDetails?branchid=$branchid");
                   }
                 else
                   {
                       if(isset($_GET["branchid"]))
                             $branchid=$_GET["branchid"];

                       if($flag=="e")   
                          {
                           if(isset($_GET["yearid"])) 
                                   $yearid=$_GET["yearid"];  
          
         $rs=mysqli_query($con,"select yearname from year where yearid=$yearid ") 
        or die("Error: ".mysqli_error($con));

                                if($row=mysqli_fetch_row($rs))
                                  {        
                                    $yearname=$row[0];        
                                  }
                            }
                            else
                            {
                                 $yearname="";
                                 $yearid="0";      
                             } 
                       }
     }

   ?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title>Dashboard - Manage Years</title>

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
                   <div class="col-md-8 mx-auto">

                 <div class="card mt-5">

                    <div class="card-title p-2 text-center" style="background-image: linear-gradient(#2a9ed4,#2491d1)">
                         <h3 class="text-white">Manage Years</h3>
                    </div>

                  <div class="card-body">

                 <form method="post">

                    <div class="form-group">

                         <label>Year</label>
                          <input type="text" id="txtyearname"  name="txtyearname" required="required" placeholder="Enter Year Name" 
                             value="<?php echo $yearname ?>" class="form-control" />
                    </div>
                 <hr/>

        <div class="text-right">  

            <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
            <input type="hidden" id="hfyearid" name="hfyearid" value="<?php echo $yearid ?>" />
            <input type="hidden" id="hfbranchid" name="hfbranchid" value="<?php echo $branchid ?>" />

            <button class="btn btn-outline-primary">
              <i style='font-size:20px' class='fa fa-save'></i>
               Submit
              </button>


            <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('Branch_YearDetails?branchid=<?php echo $branchid ?>')">
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
