 <?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
        session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

      $flag="";
      $facultid="";
      $fusername="";
      $fpassword="";
      $facultname="";
      $femail="";
      $fcontact="";
      $fbranchid="";
      $fdesignationid="";
      $fqualificationid="";
      $photo="";
      $conpassword="";

if($_SERVER['REQUEST_METHOD']=="GET")
{ 

$flag=$_REQUEST["flag"]; 
if($flag=="d")
{
    $facultid=$_GET['FacultId'];    
    $rs=mysqli_query($con,"select fusername from faculties where facultid=$facultid") or die("Error: ".mysqli_error($con)); 
    if($row=mysqli_fetch_row($rs))
         $fusername=$row[0];

    mysqli_query($con,"delete from faculties where facultid=$facultid") or die("Error: ".mysqli_error($con));  
    
    
    mysqli_query($con,"delete from users where username ='$fusername'") or die("Error: ".mysqli_error($con));
     

 $photo="images/faculty/$facultid.jpg";
if(file_exists($photo))
  unlink($photo);  
header("location: FacultyDetails");

}
else
{
if($flag=="a")
{
  $rs=mysqli_query($con,"select max(facultid) from faculties") or die("Error: ".mysqli_error($con));

  $mfacultyid="";

  if($row=mysqli_fetch_row($rs))
        $mfacultyid=$row[0];

     if(!$mfacultyid)
          $facultid=1;
      else
         $facultid=$mfacultyid+1;
   
         $fusername="";
         $fpassword="";
         $facultname="";
         $femail="";
         $fcontact="";
         $fbranchid="";
         $fdesignationid="";
         $fqualificationid="";
         $photo="./images/No_img.png";
}

else if($flag=="e")
{
  $facultid=$_REQUEST["FacultId"];
  $rs=mysqli_query($con,"select * from faculties where facultid=$facultid")
      or die("Error: ".mysqli_error($con));
  if($row=mysqli_fetch_row($rs))
  {
    $fusername=$row[1];
    $fpassword=$row[2];
    $facultname=$row[3];
    $femail=$row[4];
    $fcontact=$row[5];
    $fbranchid=$row[6];
    $fdesignationid=$row[7];
    $fqualificationid=$row[8];
    $photo=$row[9];	
  }	 
}
}
}
else if($_SERVER['REQUEST_METHOD']=="POST")
{
    $flag=$_POST["hfFlag"];
    $facultid=$_POST["hffacultid"];
    $fusername=$_POST["hffusername"];
    $fpassword=$_POST["txtfpassword"];
    $facultname=$_POST["hffacultname"];
    $femail=$_POST["hffemail"];
    $fcontact=$_POST["hffcontact"];
    $fbranchid=$_POST["ddlfbranchid"];
    $fdesignationid=$_POST["hffdesignationid"];
    $fqualificationid=$_POST["hffqualificationid"];
    $photo=$_POST["photo"];
  
  if($_FILES['fd']['name'])
  $photo="images/faculty/$facultid.jpg";
 
  $sql="";
    if($flag=="a") 
    {

     $sql="insert into users values('$fusername','$fpassword','Faculty')"; 
     mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));	

     $sql="insert into faculties values($facultid,'$fusername','$fpassword','$facultname','$femail',$fcontact,$fbranchid,$fdesignationid,$fqualificationid,'$photo')"; 
     mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));	
    }
   else if($flag=="e")
   {
     $sql="UPDATE  faculties  SET  facultid ='$facultid', fusername ='$fusername', fpassword ='$fpassword', facultname ='$facultname', femail ='$femail', fcontact ='$fcontact', fbranchid ='$fbranchid', fdesignationid ='$fdesignationid', fqualificationid ='$fqualificationid', photo ='$photo' WHERE facultid=$facultid"; 
     mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));
    }
 	
 mysqli_close($con);	 
  
if($_FILES['fd']['name']) 
      move_uploaded_file($_FILES['fd']['tmp_name'], $photo);

 header("location: FacultyDetails.php");	 
}


?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Manage Faculty</title>
<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
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
<div class="conatiner">
<div class="row">
<div class="col-md-6 mx-auto">
<div class="card mt-3 mb-3">
<div class="card-title  p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
<h3 class="text-white">Manage Faculty</h3>
</div>
<div class="card-body">
<form method="post" enctype="multipart/form-data">

                      Username <br/>
                      <div class="input-group mt-2 mb-2">
                      
                        <input type="text" id="hffusername" name="hffusername" class="form-control" value="<?php echo $fusername ?>"
                         required="required" placeholder=" Enter username.." />
                         <div class="input-group-append">
                          <span  class="input-group-text">
                          <i class="fa fa-user pl-1 pr-1"></i>
                          </span>                             
                        
                      </div>
                      </div>

                      Password<br/>
                      <div class="input-group mb-3 mt-2">
                     
                        <input type="password" id="txtPassword" name="txtfpassword" class="form-control" value="<?php echo $fpassword ?>" 
                         placeholder="Enter your Password" required="required" />

                        <div class="input-group-append">
                          <span style="cursor:pointer" class="input-group-text" id="tgl1" onclick="toggler('tgl1','txtPassword');">
                          <i class="fa fa-eye-slash"></i>
                          </span>                             
                        </div>
                      </div>

                      Confirm Password<br/>
                      <div class="input-group mb-3 mt-2">
                     
                        <input type="password" id="txtCPassword" name="txtCPassword" class="form-control"   value="<?php echo $fpassword ?>" 
                         placeholder="Enter Confirm Password" required="required" />

                        <div class="input-group-append">
                          <span style="cursor:pointer" class="input-group-text" id="tgl2" onclick="toggler('tgl2','txtCPassword');">
                          <i class="fa fa-eye-slash"></i>
                          </span>                             
                        </div>
                      </div>

                      <hr/>

<div class="form-group">
  <label>Faculty Name</label>
  <input type="text" id="hffacultname" name="hffacultname" required="required" placeholder="Enter your Name" value="<?php echo $facultname ?>" class="form-control" />
</div>

<div class="form-group">
  <label>E-Mail</label>
  <input type="email" id="hffemail" name="hffemail" required="required" placeholder="Enter your E-Mail" value="<?php echo $femail ?>" class="form-control" />
</div>

<div class="form-group">
  <label>Contact</label>
  <input type="number" id="hffcontact" name="hffcontact" required="required" placeholder="Enter your Contact No." value="<?php echo $fcontact ?>" class="form-control" />
</div>

Branch <br/>
              <div class="input-group mt-2 mb-2">
                <div class="input-group-append">
                                             
                        
                </div>
                <select id="ddlfbranchid" name="ddlfbranchid" class="form-control" >
                <option value="0" selected="selected">Select Branch</option>
                <?php
                  $rs=mysqli_query($con,"select branchid,branchname from branches") or die("Error ".mysqli_error($con));
                  while($row=mysqli_fetch_array($rs))
                  {
                    if($fbranchid==$row[0])
                      echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
                    else
                      echo "<option value='$row[0]'>$row[1]</option>";
                  }
                ?>
                </select>
              </div>

<div class="form-group">
  <label>Designation</label>
  <select id="hffdesignationid" name="hffdesignationid" class="form-control" >
  <option value="0" selected="selected">Select Designation</option>
  <?php
    $rs=mysqli_query($con,"select designationid,designationname from designation") or die("Error ".mysqli_error($con));
    while($row=mysqli_fetch_array($rs))
    {
      if($fdesignationid==$row[0])
        echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
      else
      echo "<option value='$row[0]'>$row[1]</option>";
    }
  ?>
  </select>
</div>

<div class="form-group">
  <label>Qualification</label>
  <select id="hffqualificationid" name="hffqualificationid" class="form-control" >
  <option value="0" selected="selected">Select Qualification</option>
  <?php
    $rs=mysqli_query($con,"select qualificationid,qualificationname from qualification") or die("Error ".mysqli_error($con));
    while($row=mysqli_fetch_array($rs))
    {
      if($fqualificationid==$row[0])
        echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
      else
      echo "<option value='$row[0]'>$row[1]</option>";
    }
  ?>
  </select>
</div>
 




  <div class="container-fluid p-0">
    <div class="row">
      <div class="col-md-10">
  
        <div class="form-group">
          <label>Photo</label>
          <input type="file" name="fd" id="fd" class="form-control p-1" />
        </div>

      </div>
      <div class="col-md-2 pt-4">
        <img src="<?php echo $photo ?>"  id="photo" alt="Photo" class="img w-100  img-thumbnail"  />
      </div>
    </div>
  </div>

  <hr/>
  <div class="text-right">

  <input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
  <input type="hidden" id="hffacultid" name="hffacultid" value="<?php echo $facultid ?>" />
  <input type="hidden" id="photo" name="photo" value="<?php echo $photo ?>" />

   <button class="btn btn-outline-primary" onclick="check();"><i style='font-size:20px' class='fa fa-save'> </i> Submit</button>
   <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('FacultyDetails')">
   <i style='font-size:20px' class='fa fa-times'> </i> Cancel</button>

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
  <script>
  var pwdtoggle = "hidepwd";

  function toggler(spn, pwd) 
  {
    spn = document.getElementById(spn);
    pwd = document.getElementById(pwd);

    if(pwdtoggle === "hidepwd") 
    {
      pwdtoggle = "showpwd";
      spn.innerHTML = "<i class='fas fa-eye'></i>";
      pwd.type = "text";
    } 
    else
    {
      pwdtoggle = "hidepwd";
      spn.innerHTML = "<i class='fas fa-eye-slash'></i>";
      pwd.type = "password";
    }
  }
  </script>

  <script>
    function check()
    {
    var pswd,cpswd;
    pswd=document.getElementById(txtPassword).value;
    cpswd=document.getElementById(txtPassword).value;
    if(pswd!=cpswd)
    {document.getElementById("cpswd").value="";
     document.getElementById("cpswd").focus();
    }
  }
  </script>
    </body>
    </html>