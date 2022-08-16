<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

$flag="";
$pid="";
$pdetails="";
$gphoto="";

if($_SERVER['REQUEST_METHOD']=="GET")
{ 

$flag=$_REQUEST["flag"]; 
if($flag=="d")
{
    $pid=$_GET['pid'];
  mysqli_query($con,"DELETE FROM gallery WHERE pid=$pid") or die("Error: ".mysqli_error($con));
 
 $gphoto="./images/gallery/$pid.jpg";
if(file_exists($gphoto))
  unlink($gphoto);  
header("location: galleryDetails");

}
else
{
if($flag=="a")
{
  $rs=mysqli_query($con,"select max(pid) from gallery") or die("Error: ".mysqli_error($con));

  $mpid="";

  if($row=mysqli_fetch_row($rs))
        $mpid=$row[0];

     if(!$mpid)
          $pid=1;
      else
         $pid=$mpid+1;
   
   $pdetails="";
   $gphoto="images/noimage.jpg";
}

else if($flag=="e")
{
  $pid=$_REQUEST["pid"];
  $rs=mysqli_query($con,"select * from gallery where pid=$pid")
      or die("Error: ".mysqli_error($con));
  if($row=mysqli_fetch_row($rs))
  {
  $pdetails=$row[1];
  $gphoto=$row[2];	 
  }	 
}
}
}
else if($_SERVER['REQUEST_METHOD']=="POST")
{
  $pid=$_POST["hfpid"];
  $pdetails=$_POST["txtpdetails"];
  $gphoto=$_POST["photo"];
  $flag=$_POST["hfFlag"];
  
  if($_FILES['fd']['name'])
  $gphoto="./images/gallery/$pid.jpg";
 
  $sql="";
    if($flag=="a") 
     $sql="insert into gallery values($pid,'$pdetails','$gphoto')"; 
   

   else if($flag=="e")
     $sql="UPDATE gallery SET pid='$pid',pdetails='$pdetails',gphoto='$gphoto' WHERE  pid=$pid";

 mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));	
 mysqli_close($con);	 
  
if($_FILES['fd']['name']) 
      move_uploaded_file($_FILES['fd']['tmp_name'], $gphoto);

 header("location: galleryDetails.php");	 
}


?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>
    <title> Manage gallery</title>
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
              
            <div class="container">

<div class="row mt-3">
<div class="col-md-6 mx-auto">

<div class="card mt-3 mb-3">
<div class="card-title  p-2 text-center" style="background-image: linear-gradient(#0296b0,#6bc6eb,#00b5cd);">
<h3 class="text-white">Manage gallery</h3>
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">

  <div class="form-group">
    <label> Photo Details </Details></label>
    <input type="text" id="txtpdetails" placeholder="Enter your Photo details" name="txtpdetails" required="required" value="<?php echo $pdetails ?>" 
                    class="form-control" />
  </div>
  
        <div class="form-group">
          <label>Uploaded gallery Photo</label>
          <input type="file" name="fd" id="fd" class="form-control p-1" />
        </div>

      <div class="col-4 pt-4">
        <img src="<?php echo $gphoto ?>" id="photo" alt="Photo" class="img w-100 img-thumbnail"  />
      </div>

  <hr/>
  <div class="text-right">

  <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
  <input type="hidden" id="hfpid" name="hfpid" value="<?php echo $pid ?>" />
  <input type="hidden" id="photo" name="photo" value="<?php echo $gphoto ?>" />

   <button class="btn btn-outline-primary">
           <i style='font-size:20px' class='fa fa-save'></i> 
               Submit
    </button>

   <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('galleryDetails')">
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