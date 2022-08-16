<?php

      header("Cache-Control: no-cache, must-revalidate");

      if (session_status() == PHP_SESSION_NONE) 
               session_start();

      include("shared/checkuserlogin.php");

      include("shared/conn.php");

$flag="";
$bno="";
$bname="";
$author="";
$pcation="";
$branchid="";
$price="";
$qtity="";
$photo="./images/noimage.jpg";
$qrcode="./images/noimage.jpg";

if($_SERVER['REQUEST_METHOD']=="GET")
{
  $flag=$_REQUEST["flag"];
  if($flag=="d")
  {
    $bno=$_GET['bno'];

    mysqli_query($con,"delete from book where bno=$bno") or die("Error:".mysqli_error($con));

    $photo="images/newbook/$bno.jpg";
    if(file_exists($photo))
      unlink($photo);

    
    $qrcode="images/qrcode/$bno.jpg";
    if(file_exists($qrcode))
    unlink($qrcode);

    header("location:bookdetails");
  }
  else{
    if($flag=="a")

    {
     $rs= mysqli_query($con,"select max(bno) from book") or die("Error:".mysqli_error($con));
     $bno="";

     if($row=mysqli_fetch_row($rs))
     $mbno=$row[0];

     if(!$mbno)
     $bno=100;
     else
     $bno=$mbno+1;

     $bname="";
     $author="";
     $pcation="";
     $branchid="";
     $price="";
     $qtity="";
     $photo="images/noimage.jpg";
     $qrcode="images/noimage.jpg";
    }
    else if($flag=="e")
    {
      $bno=$_REQUEST["bno"];
     $rs=mysqli_query($con,"select * from book where bno=$bno")
             or die("Error:".mysqli_error($con));

      if($row=mysqli_fetch_row($rs))
      {
        $bname=$row[1];
        $author=$row[2];
        $pcation=$row[3];
        $branchid=$row[4];
        $price=$row[5];
        $qtity=$row[6];
        $photo=$row[7]; 
        $qrcode=$row[8]; 
        
      }
    }
    
  }
}
else if($_SERVER['REQUEST_METHOD']=='POST')
{
        $bno=$_POST["hfbno"];
        $bname=$_POST["txtbname"];
        $author=$_POST["author"];
        $pcation=$_POST["pcation"];
        $price=$_POST["price"];
        $qtity=$_POST["qtity"];
        $branchid=$_POST["ddlbranch"];
        $photo=$_POST["hfphoto"]; 
        $qrcode=$_POST["hfqrcode"]; 
        $flag=$_POST["hfFlag"];

        if($_FILES['fd1'] ['name'])
          $photo="images/newbook/$bno.jpg";
       
        
        if($_FILES['fd2']['name'])          
          $qrcode="images/qrcode/$bno.jpg";
        


        $sql="";

        if($flag=="a")
        $sql="insert into book values($bno,'$bname','$author','$pcation','$branchid',$price,$qtity,'$photo','$qrcode')";

        else if($flag=="e")
        $sql="UPDATE `book` SET `bno`='$bno',`bname`='$bname',`author`='$author',`pcation`='$pcation',
        `branchid`='$branchid',`price`='$price',`qtity`='$qtity',`photo`='$photo' ,`qrcode`='$qrcode' WHERE bno=$bno";
        
        mysqli_query($con,$sql) or die("Error:".mysqli_error($con));
        mysqli_close($con);

        if($_FILES['fd1']['name'])
        move_uploaded_file($_FILES['fd1']['tmp_name'],$photo);

          if($_FILES['fd2']['name'])
        move_uploaded_file($_FILES['fd2']['tmp_name'],$qrcode);

        header("location:bookdetails.php");
      }

      ?>


<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, 
     shrink-to-fit=no" charset="utf-8"/>

    <title> book Type</title>

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


<div class="card mt-5">
   <div class="card-title bg-primary p-2 text-center">
           <h3 class="text-white">Add New Book</h3>
   </div>

  <div class="card-body">

                          

  <form method="post" enctype="multipart/form-data">

<div class="form-group">
 <label>Book Name</label>
  <input type="text" id="txtbname" name="txtbname" required="required" 
         placeholder="Please enter Book name" value="<?php echo $bname ?>" class="form-control" />
    </div>
       
    
       
    
<div class="form-group">
 <label>Author Name</label>
  <input type="text" id="author" name="author" required="required" 
         placeholder="Please enter Author name" value="<?php echo $author ?>" class="form-control" />
    </div>
    
       
    <div class="form-group">
         <label>Publication</label>
        <input type="text" id="pcation" name="pcation" required="required" value="<?php echo $pcation ?>"
         placeholder="Enter book Publication" class="form-control" />
        </div>

                      <div class="form-group">
                          <label>Branch</label>
                          <select id="ddlbranch" name="ddlbranch" class="form-control">
                          <option value="0" selected="selected">Select Branch</option>
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

        <div class="form-group">
         <label>Price</label>
         <input type="number" id="price" name="price" required="required" 
         placeholder="Enter Your price" value="<?php echo $price ?>" class="form-control" />
        </div>

        <div class="form-group">
         <label>Quantity</label>
         <input type="number" id="qtity" name="qtity" required="required" 
         placeholder="Enter Your Quantity" value="<?php echo $qtity ?>" class="form-control" />
        </div>
     

<div class="row">
        <div class="col-md-9">
        
            <div class="form-group">
              <label>Book cover Photo</label>
                  <input type="file" id="fd1" name="fd1" class="form-control" />
             </div>
        </div>

        <div class="col-md-3">
          <img src="<?php echo $photo ?>" id="hfphoto" alt="photo" style="max-width: 80px"
           class="img img-fluid img-thumbnail" />
        </div>

        <div class="col-md-9">
             <div class="form-group">
                         <label>Book qrcode Photo</label>
                             <input type="file" id="fd2" name="fd2" class="form-control" />
              </div>
        </div>

          <div class="col-md-3">
          <img id="hfqrcode" src="<?php echo $qrcode?>" alt="qrcode" style="max-width: 80px"
           class="img img-fluid img-thumbnail" />
        </div>
        
       </div>

<hr/>

<div class="text-right">

<input type="hidden" id="hfFlag" name="hfFlag" value="<?php echo $flag ?>" />
<input type="hidden" id="hfbno" name="hfbno" value="<?php echo $bno ?>" />
<input type="hidden" id="hfphoto" name="hfphoto" value="<?php echo $photo ?>" />
<input type="hidden" id="hfqrcode" name="hfqrcode" value="<?php echo $qrcode ?>" />


            <button class="btn btn-outline-primary">
                <i style='font-size:20px' class='fa fa-save'> 
                       Submit
                </i>
            </button>

            <button class="btn btn-outline-danger" type="button" 
                 onclick="window.location.replace('bookdetails')">
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


<script src="js/jquery.min.js"></script>

 <script>

  $(document).ready(function()
        {
           $("#fd1").change(function () 
              {
                readURL(this,"hfphoto");
              });

            $("#fd2").change(function () 
               {
                readURL(this,"hfqrcode");
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