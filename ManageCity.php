<?php
       header("Cache-Control: no-cache, must-revalidate");

       if (session_status() == PHP_SESSION_NONE) 
                session_start();
 
                $lrole="Administrator";

                include("shared/checkuserlogin.php");
              
                include("shared/conn.php");
              

   $sid="";
   $cid="";
   $cityname="";


   if($_SERVER['REQUEST_METHOD']=="POST")
    {  
   
        $flag=$_POST["hfFlag"];
        $cid=$_POST["hfCId"];
        $sid=$_POST["hfSId"];
        $cityname=$_POST["txtCityName"];
          
   
        if($flag=="a")
          {
             $rs=mysqli_query($con,"select max(cityid) from city") 
             or die("Error: ".mysqli_error($con));
	
	     $mcid="";
	     if($row=mysqli_fetch_row($rs))
	          $mcid=$row[0];


	     if(!$mcid)
	         $cid=1;
	     else
               $cid=$mcid+1;	 
   
	    $sql="insert into city values($cid,'$cityname',$sid)";
   
          }
        else
          {
              $sql="update city set CityName='$cityname' where cityid=$cid";
          } 

         mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));  
         header("Location: City?sid=$sid");
    }
  else
    { 
                 $flag=$_GET["flag"];

                 if($flag=="d")
                  {
                          if(isset($_GET["cid"])) 
                                 $cid=$_GET["cid"];

                           if(isset($_GET["sid"])) 
                                    $sid=$_GET["sid"];

                                mysqli_query($con,"delete from city where cityid=$cid") 
                                or die("Error: ".mysqli_error($con));
                               header("Location: City?sid=$sid");
                   }
                 else
                   {
                       if(isset($_GET["sid"]))
                             $sid=$_GET["sid"];

                       if($flag=="e")   
                          {
                           if(isset($_GET["cid"])) 
                                   $cid=$_GET["cid"];  
          
         $rs=mysqli_query($con,"select CityName from city where cityid=$cid ") 
        or die("Error: ".mysqli_error($con));

                                if($row=mysqli_fetch_row($rs))
                                  {        
                                    $cityname=$row[0];        
                                  }
                            }
                            else
                            {
                                 $cityname="";
                                 $cid="0";      
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
                   <div class="col-md-8 mx-auto">

                 <div class="card mt-5">

                    <div class="card-title bg-info p-2 text-center">
                         <h3 class="text-white">Manage city</h3>
                    </div>

                  <div class="card-body">

                 <form method="post">

                    <div class="form-group">

                         <label>City Name</label>
                          <input type="text" id="txtCityName"  name="txtCityName" required="required" placeholder="Enter City Name" 
                             value="<?php echo $cityname ?>" class="form-control" />
                    </div>
                 <hr/>

        <div class="text-right">  

            <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
            <input type="hidden" id="hfCId" name="hfCId" value="<?php echo $cid ?>" />
            <input type="hidden" id="hfSId" name="hfSId" value="<?php echo $sid ?>" />

            <button class="btn btn-outline-success"><i style='font-size:20px' class='fa fa-save'></i> Submit</button>

            <button class="btn btn-outline-danger" type="button" 
            onclick="window.location.replace('City?sid=<?php echo $sid ?>')">
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
