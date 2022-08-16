<?php
    include("shared/conn.php");

    $flag="";
    $cid="";
    $name="";
    $mail="";
    $mno="";
    $address="";
    $photo="./images/noimage.jpg";
    $mess="";

    if($_SERVER['REQUEST_METHOD']=="POST")
    {         
      $rs=mysqli_query($con,"select max(cid) from contact") or   die("Error :".mysqli_error($con));
      $mcid=0;
      if($row=mysqli_fetch_row($rs))
          $mcid=$row[0];
      if(!$mcid)
          $cid=1;
      else
          $cid=$mcid+1;

         
          $name=$_POST["name"];
          $mail=$_POST["mail"];
          $mno=$_POST["mnumber"];
          $address=$_POST["address"];
          $photo=$_POST["photo"]; 
          $mess=$_POST["mess"]; 
          $flag=$_POST["hfFlag"];
       

        if($_FILES['fd']['name'])        
          $photo="images/contactpic/$cid.jpg";          
        
          
        $sql="INSERT INTO `contact` VALUES ('$cid','$name','$mail','$mno','$address','$photo','$mess')";
                  
        mysqli_query($con,$sql) or die("Error :".mysqli_error($con));
        mysqli_close($con);
 
        if($_FILES['fd']['name'])        
            move_uploaded_file($_FILES['fd']['tmp_name'], $photo);
           
        
        echo "<script> alert('Contact Details Successfully Posted. Your contact Id is: $cid'); location='home'</script>";

        
    } 
    
?>
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>contact</title>
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
          Contact-us
           <img src="./images/book.png">   
    </h1> 
    
    <hr>
    This Contact Us page does two things well: it asks for only the information that is necessary (email address) and it displays a video that explains exactly how
     contacting the IMPACT team works.
     This is a helpful experience for the user especially if they are expecting a quick response.A well-crafted Contact Us page will enhance user experience and cultivate a strong relationship with your leads. Although no two businesses are the same, and every buyer persona requires different things,
      there are multiple elements in the following examples you can pull from and include (or not include) in your contact page.

    </div>

</div>

<div class="row">


      <div class="col-md-6 mx-auto">
        <div class="card mt-5">

          <div class="card-title bg-primary p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
            <h3 class="text-white" > Contact-Us</h3>
          </div>

          <div class="card-body">
            <form method="post" enctype="multipart/form-data">

             

            <div class="input-group  mb-3">
                             <div class="input-group-append">
                                   <span style="cursor:pointer; width:46px;" class="input-group-text">
                                          <i class="fa fa-user "></i>
                                   </span> 
                               </div>
                                  <input type="text" id="name" name="name"class="form-control" value="<?php $name ?>"
                                     required="required" placeholder=" Enter Name..." />
                           </div>
                        
               
                         <div class="input-group  mb-3"> 
                            <div class="input-group-append">
                              <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                               </span> 
                            </div>
                               <input type="mail" id="mail" name="mail"class="form-control" value="<?php $mail ?>"
                                     required="required" placeholder=" Enter E-mail.." />
                         </div>

                         <div class="input-group  mb-3">
                           <div class="input-group-append">
                                <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-phone"></i>
                                </span>   
                               </div>
                               <input type="number" id="mnumber" name="mnumber" class="form-control"
                                     value="<?php $mno ?>"
                                     required="required" placeholder=" Enter Number.." />
                         </div>

                         <div class="input-group  mb-3"> 
                         <div class="input-group-append">
                               <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-home"></i>
                               </span>                             
                             </div>
                            <input type="text" id="address" name="address"class="form-control" value="<?php $address ?>"
                                     required="required" placeholder=" Enter address.." />
                           
                         </div>


    <div class="container-fluid p-0">

        <div class="row">

           <div class="col-md-10">
              <div class="form-group">
               <label>Photo</label>
                <input required type="file" name="fd" id="fd" class="form-control p-1"/>
              </div>
            </div>

               <div class="col-md-2">
                    <img id="contactpic" src="<?php echo $photo ?>" 
                    alt="Photo" style="max-width: 80px" class="img img-flcid img-thumbnail"/>
               </div>

         </div>


         
         <div class="form-group">
                 <textarea class="form-control" id="mess" name="mess" rows="5" placeholder=" Enter your message.."
                        required="required"
                       value="<?php $mess ?>">
                 </textarea>
              </div>
      
    </div>

              <div class="text-right">
          
              <input type="hidden" id="hfFlag"  name="hfFlag" value="<?php echo $flag ?>">
                <input type="hidden" id="photo" name="photo" value="<?php echo $photo ?>" />      

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
           $("#fd").change(function () 
              {
                readURL(this,"contactpic");
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