<?php
    include("shared/conn.php");

    $flag="";
    $Reqid="";
    $enrollNo="";
    $studnm="";
    $branchid="";
    $yearid="";
    $mobile="";
    $bname="";
    $idCard="./images/noimage.jpg";
    $status="N";

    if($_SERVER['REQUEST_METHOD']=="POST")
    {         
      $rs=mysqli_query($con,"select max(Reqid) from  requestb") or
       die("Error :".mysqli_error($con));
      $mReqid=0;
      if($row=mysqli_fetch_row($rs))
          $mReqid=$row[0];
      if(!$mReqid)
          $Reqid=1;
      else
          $Reqid=$mReqid+1;
        $enrollNo=$_POST["txtenrollNo"];
        $studnm=$_POST["txtstudnm"];
        $branchid=$_POST["ddlbranchid"];
        $yearid=$_POST["ddlyearid"];
        $mobile=$_POST["txtmobile"];
        $bname=$_POST["textbname"];
        $idCard=$_POST["idCard"];
        $flag=$_POST["hfflag"];
        $status;
        

        if($_FILES['fd2']['name'])          
          $idCard="images/idCard/$Reqid.jpg";
        

        $sql="insert into  requestb values($Reqid,'$enrollNo','$studnm',$branchid,$yearid,$mobile,'$bname','$idCard','$status')";
                  
        mysqli_query($con,$sql) or die("Error :".mysqli_error($con));
        mysqli_close($con);
 
        if($_FILES['fd2']['name'])        
            move_uploaded_file($_FILES['fd2']['tmp_name'], $idCard);

        echo "<script>alert('requestb Successfully Posted. Your requestb Id is: $Reqid');location='home'</script>";

        
    } 
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Requestb</title>
  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/site.css">
</head>

<body>

<header>

<?php 
  include("shared/pagetop.php");
?>
<hr>


<div class="conatiner">
    <div class="row">
           
   
    <div class="col-md-10 m-auto">
    
    <h1 style="font-family:Algerian; color:blue; text-align:center;">
           <img src="./images/book.png">   
                 Request-Book
           <img src="./images/book.png">   
    </h1> 
    
    <hr>
    A book request letter is written by an individual or group that wishes to borrow a particular publication. It could be sent to the school authority,
    librarian, editor, or author. In some instances, it could be sent to a financial institution to request a checkbook.
Generally, this letter should maintain a formal tone. It should also be written in professional and polite language. In this article, we review how to
 compose an effective request letter for when you need a book from a particular source.


    </div>

</div>

<div class="row">


      <div class="col-md-6 mx-auto">
        <div class="card mt-5">

          <div class="card-title bg-primary p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
            <h3 class="text-white" >Request-Book</h3>
          </div>

          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

              <div class="form-group">
                <label>Enrollment No</label>
                <input type="text" id="txtenrollNo" name="txtenrollNo" required="required" placeholder="Enter your Enrollment No."  class="form-control" />
              </div>

              <div class="form-group">
                <label>Student's Name</label>
                <input type="text" id="txtstudnm" name="txtstudnm" required="required" placeholder="Enter Student's Name"  class="form-control" />
              </div>

              <div class="form-group">
                <label>Branch</label>
                <select id="ddlbranchid" name="ddlbranchid" class="form-control" >
                <option value="0" selected="selected">Select Branch</option>
                <?php
                  $rs=mysqli_query($con,"select branchid,branchname from branches") or die("Error ".mysqli_error($con));
                  while($row=mysqli_fetch_array($rs))
                  {
                    if($BranchId==$row[0])
                      echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
                    else
                      echo "<option value='$row[0]'>$row[1]</option>";
                  }
                ?>
                </select>
              </div>

              <div class="form-group">
                <label>Year</label>
                <select id="ddlyearid" name="ddlyearid" class="form-control" >
                <option value="0" selected="selected">Select Year</option>
                
                </select>
              </div>

              <div class="form-group">
                <label>Mobile No.</label>
                <input type="number" id="txtmobile" name="txtmobile" required="required" placeholder="Enter Mobile Number."
                  class="form-control" />
              </div>

              <div class="form-group">
                <label>Book Name</label>
                <input type="textarea" id="textbname" name="textbname" required="required"
                 placeholder="Enter Your Book Name"  class="form-control" />
              </div>

    <div class="container-fluid p-0">

        <div class="row">

           <div class="col-md-10">
              <div class="form-group">
                <label> Library Card</label>
                <input required type="file" name="fd2" id="fd2" class="form-control p-1"/>
              </div>
           </div>

              <div class="col-md-2">
                  <img id="imgIdCard" src="<?php echo $idCard ?>" alt="Photo" 
                  style="max-width: 80px" class="img img-fluid img-thumbnail"/>
              </div>

        </div>

    </div>

              <div class="text-right">
          
                <input type="hidden" id="idCard" name="idCard" value="<?php  echo $idCard ?>" />      
                
                <input type="hidden" id="hfflag" name="hfflag" value="<?php  echo $hfflag ?>" />      

                <button class="btn btn-outline-primary">
                <i style='font-size:20px' class='fa fa-save'> 
                       Submit
                </i>
            </button>

            <button class="btn btn-outline-danger" type="button" 
                 onclick="window.location.replace('home')">
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
    <br/>
<?php 
  include("shared/pagebottom.php");
?>
  </div>
  <?php 
    mysqli_close($con);
  ?>

 <script src="js/jquery.min.js"></script>

 <script>

  $(document).ready(function()
        {

            $("#fd2").change(function () 
               {
                readURL(this,"imgIdCard");
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