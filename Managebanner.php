<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

$flag="";
$bannerid="";
$bannername="";
$photo="";

if($_SERVER['REQUEST_METHOD']=="GET")
{ 

$flag=$_REQUEST["flag"]; 
if($flag=="d")
{
    $bannerid=$_GET['BannerId'];
  mysqli_query($con,"DELETE FROM `banner` WHERE bannerid=$bannerid") or die("Error: ".mysqli_error($con));
 
 $photo="./images/slider/$bannerid.jpg";
if(file_exists($photo))
  unlink($photo);  
header("location: BannerDetails");

}
else
{
if($flag=="a")
{
  $rs=mysqli_query($con,"select max(bannerid) from banner") or die("Error: ".mysqli_error($con));

  $mbannerid="";

  if($row=mysqli_fetch_row($rs))
        $mbannerid=$row[0];

     if(!$mbannerid)
          $bannerid=100;
      else
         $bannerid=$mbannerid+1;
   
   $bannername="";
   $photo="images/No_img.png";
}

else if($flag=="e")
{
  $bannerid=$_REQUEST["BannerId"];
  $rs=mysqli_query($con,"select * from banner where bannerid=$bannerid")
      or die("Error: ".mysqli_error($con));
  if($row=mysqli_fetch_row($rs))
  {
  $bannername=$row[1];
  $photo=$row[2];	 
  }	 
}
}
}
else if($_SERVER['REQUEST_METHOD']=="POST")
{
  $bannerid=$_POST["hfbannerid"];
  $bannername=$_POST["txtbannername"];
  $photo=$_POST["photo"];
  $flag=$_POST["hfFlag"];
  
  if($_FILES['fd']['name'])
  $photo="./images/slider/$bannerid.jpg";
 
  $sql="";
    if($flag=="a") 
     $sql="insert into banner values($bannerid,'$bannername','$photo')"; 
   

   else if($flag=="e")
     $sql="update banner set bannername='$bannername',photo='$photo' where bannerid=$bannerid"; 

 mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));	
 mysqli_close($con);	 
  
if($_FILES['fd']['name']) 
      move_uploaded_file($_FILES['fd']['tmp_name'], $photo);

 header("location: BannerDetails.php");	 
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>
    <title> Manage banner</title>
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
<div class="row mt-3">
<div class="col-md-6 mx-auto">

<div class="card mt-3 mb-3">
<div class="card-title  p-2 text-center" style="background-image: linear-gradient(#0296b0,#6bc6eb,#00b5cd);">
<h3 class="text-white">Manage Banner</h3>
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label> Banner Name</label>
    <input type="text" id="txtbannername" placeholder="Enter your banner Name" name="txtbannername" required="required" value="<?php echo $bannername ?>" 
                    class="form-control" />
  </div>
  
        <div class="form-group">
          <label>Uploaded Banner Photo</label>
          <input type="file" name="fd" id="fd" class="form-control p-1" />
        </div>

      <div class="col-4 pt-4">
        <img src="<?php echo $photo ?>" id="photo" alt="Photo" class="img w-100 img-thumbnail"  />
      </div>

  <hr/>
  <div class="text-right">

  <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
  <input type="hidden" id="hfbannerid" name="hfbannerid" value="<?php echo $bannerid ?>" />
  <input type="hidden" id="photo" name="photo" value="<?php echo $photo ?>" />

   <button class="btn btn-outline-primary">
           <i style='font-size:20px' class='fa fa-save'></i> 
               Submit
    </button>

   <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('BannerDetails')">
     <i style='font-size:20px' class='fa fa-times'> </i>
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


  
  <script src="js/jquery.min.js"></script>
 <script>

  $(document).ready(function()
    {
        $("#fd").change(function () 
        {
            readURL(this,"photo");
        });
    });


      function readURL(input,img) 
           {
            if (input.files && input.files[0]) 
                 {
                     var reader = new FileReader();
                     reader.onload = function (e) 
                        {
                            $('#'+img).attr('src', e.target.result);
                        }
                   reader.readAsDataURL(input.files[0]);
                  }
           }

 </script>
    </body>
    </html>