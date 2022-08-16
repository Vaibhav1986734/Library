<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

$flag="";
$sid="";
$enrollNo="";
$studnm="";
$branchid="";
$yearid="";
$mobile="";
$spic="./images/noimage.jpg";
$rfee="./images/noimage.jpg";
$adhar="./images/noimage.jpg";

if($_SERVER['REQUEST_METHOD']=="GET")
{
  $flag=$_REQUEST["flag"];
  if($flag=="d")
  {
    $sid=$_GET['sid'];

    mysqli_query($con,"delete from student where sid=$sid") or die("Error:".mysqli_error($con));

    $rfee="images/feepic/$sid.jpg";
    if(file_exists($rfee))
      unlink($rfee);

    
    $adhar="images/adhar/$sid.jpg";
    if(file_exists($adhar))
    unlink($adhar);
    
    $spic="images/student/$sid.jpg";
    if(file_exists($spic))
      unlink($spic);

    header("location:studentdetails");
  }
  else{
    if($flag=="a")

    {
     $rs= mysqli_query($con,"select max(sid) from student") or die("Error:".mysqli_error($con));
     $sid="";

     if($row=mysqli_fetch_row($rs))
     $msid=$row[0];

     if(!$msid)
     $sid=100;
     else
     $sid=$msid+1;
      

$enrollNo="";
$studnm="";
$branchid="";
$yearid="";
$mobile="";
$spic="./images/noimage.jpg";
$rfee="./images/noimage.jpg";
$adhar="./images/noimage.jpg";
   
    }
    else if($flag=="e")
    {
      $sid=$_REQUEST["sid"];
     $rs=mysqli_query($con,"select * from student where sid=$sid")
             or die("Error:".mysqli_error($con));

      if($row=mysqli_fetch_row($rs))
      {
        
        $enrollNo=$row[1];
        $studnm=$row[2];
        $branchid=$row[3];
        $yearid=$row[4];
        $mobile=$row[5];
        $spic=$row[6];
        $rfee=$row[7]; 
        $adhar=$row[8]; 
        
      }
    }
    
  }
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
        $sid=$_POST["hfsid"];
        $enrollNo=$_POST["txtenrollNo"];
        $studnm=$_POST["txtstudnm"];
        $branchid=$_POST["ddlbranchid"];
        $yearid=$_POST["ddlyearid"];
        $mobile=$_POST["txtmobile"];
        $spic=$_POST["hfspic"]; 
        $rfee=$_POST["hfrfee"]; 
        $adhar=$_POST["hfadhar"]; 
        $flag=$_POST["hfFlag"];

        if($_FILES['fd1'] ['name'])
          $rfee="./images/feepic/$sid.jpg";
       
        
        if($_FILES['fd2']['name'])          
          $adhar="./images/adharpic/$sid.jpg";

          if($_FILES['fd3']['name'])          
          $spic="./images/student/$sid.jpg";
        


        $sql="";

        if($flag=="a")
        $sql="INSERT INTO `student` VALUES ('$sid','$enrollNo','$studnm','$branchid','$yearid','$mobile','$spic','$rfee','$adhar')";

        else if($flag=="e")
        $sql="UPDATE `student` SET `sid`='$sid',`enrollNo`='$enrollNo',`studnm`='$studnm',`branchid`='$branchid',`yearid`='$yearid',`mobile`='$mobile',
           `spic`='$spic',`rfee`='$rfee',`adhar`='$adhar' WHERE  sid=$sid";
        
        mysqli_query($con,$sql) or die("Error:".mysqli_error($con));
        mysqli_close($con);

        if($_FILES['fd1']['name'])
        move_uploaded_file($_FILES['fd1']['tmp_name'],$rfee);

          if($_FILES['fd2']['name'])
        move_uploaded_file($_FILES['fd2']['tmp_name'],$adhar);

        if($_FILES['fd3']['name'])
        move_uploaded_file($_FILES['fd3']['tmp_name'],$spic);

        header("location:studentdetails.php");
      }

      ?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title> Student Entry form</title>

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
   <div class="card-title p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
           <h3 class="text-white">Add New Student</h3>
   </div>

  <div class="card-body">

                          

  <form method="post" enctype="multipart/form-data">


                  <div class="input-group  mb-3">
                            <div class="input-group-append">
                                 <span style="cursor:pointer; width:46px;" class="input-group-text">
                                 <i class="fa fa-list-ol"></i>
                                 </span>   
                            </div>
                                <input type="text" id="txtenrollNo" name="txtenrollNo" required="required" 
                                placeholder="Enter your Enrollment No." value="<?php echo $enrollNo ?>"  class="form-control" />
                 </div>



                   <div class="input-group  mb-3">
                             <div class="input-group-append">
                                 <span style="cursor:pointer; width:46px;" class="input-group-text">
                                 <i class="fa fa-user"></i>
                                 </span>   
                            </div>
                           <input type="text" id="txtstudnm" name="txtstudnm" required="required" placeholder="Enter Student's Name" 
                           value="<?php echo $studnm ?>"  class="form-control" />      
                    </div>

             
       
              
               <div class="input-group  mb-3">
                            <div class="input-group-append">
                                 <span style="cursor:pointer; width:46px;" class="input-group-text">
                                <i class="fa fa-code-branch"></i>
                                 </span>   
                            </div>
                     <select id="ddlbranchid" name="ddlbranchid" class="form-control">
                             <option value="0" selected="selected" >Select Branch</option>
                          <?php
                             $rs=mysqli_query($con,"select branchid,branchname from branches") or die("Error ".mysqli_error($con));
                             while($row=mysqli_fetch_array($rs))
                             {
                               if($branchid==$row[0])
                                 echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
                               else
                                 echo "<option value='$row[0]'>$row[1]</option>";
                             }
                           ?>
                        </select>
                 </div>




              <div class="input-group  mb-3">
                            <div class="input-group-append">
                                 <span style="cursor:pointer; width:46px;" class="input-group-text">
                                 <i class="fa fa-calendar"></i>
                                 </span>   
                            </div>   
                <select id="ddlyearid" name="ddlyearid" class="form-control" >
                <option value="0" selected="selected">Select Year</option>
                <?php
                  $rs=mysqli_query($con,"select yearid,yearname,branchid from year") or die("Error ".mysqli_error($con));
                  while($row=mysqli_fetch_array($rs))
                  {
                    if($branchid==$row[2])
                      echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
                  }
                ?>
                
                </select>
              </div>


              <div class="input-group  mb-3">
                           <div class="input-group-append">
                                 <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-phone"></i>
                                 </span>   
                            </div>
                  <input type="number" id="txtmobile" name="txtmobile" required="required" placeholder="Enter Mobile Number."
                  value="<?php echo $mobile ?>" class="form-control" />
                </div>
             
                <div class="row">
        <div class="col-md-9">
        
            <div class="form-group">
              <label>Student Photo</label>
                  <input type="file" id="fd3" name="fd3" class="form-control" />
             </div>
        </div>

        <div class="col-md-3">
          <img src="<?php echo $spic ?>" id="hfspic" alt="spic" style="max-width: 80px"
           class="img img-fluid img-thumbnail" />
        </div>

     

<div class="row">
        <div class="col-md-9">
        
            <div class="form-group">
              <label>Student fee Recipt</label>
                  <input type="file" id="fd1" name="fd1" class="form-control" />
             </div>
        </div>

        <div class="col-md-3">
          <img src="<?php echo $rfee ?>" id="hfrfee" alt="rfee" style="max-width: 80px"
           class="img img-fluid img-thumbnail" />
        </div>

        <div class="col-md-9">
             <div class="form-group">
                         <label>Student Aadhar Photo</label>
                             <input type="file" id="fd2" name="fd2" class="form-control" />
              </div>
        </div>

          <div class="col-md-3">
          <img id="hfadhar" src="<?php echo $adhar?>" alt="adhar" style="max-width: 80px"
           class="img img-fluid img-thumbnail" />
        </div>
        
       </div>

<hr/>

<div class="text-right">

<input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
<input type="hidden" id="hfsid" name="hfsid" value="<?php echo $sid ?>" />
<input type="hidden" id="hfspic" name="hfspic" value="<?php echo $spic ?>" />
<input type="hidden" id="hfrfee" name="hfrfee" value="<?php echo $rfee ?>" />
<input type="hidden" id="hfadhar" name="hfadhar" value="<?php echo $adhar ?>" />


            <button class="btn btn-outline-primary">
                <i style='font-size:20px' class='fa fa-save'> 
                       Submit
                </i>
            </button>

            <button class="btn btn-outline-danger" type="button" 
                 onclick="window.location.replace('studentdetails')">
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




 <script>

  $(document).ready(function()
        {
           $("#fd1").change(function () 
              {
                readURL(this,"hfrfee");
              });

            $("#fd2").change(function () 
               {
                readURL(this,"hfadhar");
               });

               $("#fd3").change(function () 
               {
                readURL(this,"hfspic");
               });


    $("#ddlbranchid").change(function()
       {
        var id=$(this).val();
        $.ajax({
                    type: "GET", 
                    url: "api/GetYear?bid="+id,	
                    dataType: "json",
                    success: function (response) {           
                        if(response.ResponseCode===1)
                        {
                          $("#ddlyearid").html(response.ResponseText);
                        }                     
                    },                    
                    error: function (error) {
                        alert(JSON.stringify(error));
                    }
                 });
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