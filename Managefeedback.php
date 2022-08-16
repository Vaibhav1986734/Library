<?php
    include("shared/conn.php");

    $flag="";
    $uid="";
    $uname="";
    $mail="";
    $sub="";
    $umno="";
    $mess="";

    if($_SERVER['REQUEST_METHOD']=="POST")
    {         
      $rs=mysqli_query($con,"select max(uid) from  feedback") or
       die("Error :".mysqli_error($con));
      $muid=0;
      if($row=mysqli_fetch_row($rs))
          $muid=$row[0];
      if(!$muid)
          $uid=1;
      else
          $uid=$muid+1;

        $uname=$_POST["uname"];
        $mail=$_POST["mail"];
        $sub=$_POST["subject"];
        $umno=$_POST["mnumber"];
        $mess=$_POST["mess"];
        $flag=$_POST["hfFlag"];

        $sql="INSERT INTO `feedback` VALUES ('$uid','$uname','$mail','$sub','$umno','$mess')";
                  
        mysqli_query($con,$sql) or die("Error :".mysqli_error($con));
        mysqli_close($con);

        echo "<script>
                    alert('feedback Successfully Posted . Your feedback Id is: $uid');location='home'
               </script>";

        
    } 

    ?>
    
    <!DOCTYPE html>
   <html>
      <head>
               <title>Government Polytechnic Lucknow Library</title>
               <link rel="stylesheet" href="css/bootstrap.min.css" />
               <link rel="stylesheet" href="css/all.min.css" />
               <link rel="stylesheet" href="css/site.css">
       </head>
<body >
<!----------------------call tha pagetop.php---------------------------------->
 <?php
   include("shared/pagetop.php");
?>
<!---------------------- end tha pagetop.php---------------------------------->
<hr>
  
  <div class="conatiner">
    <div class="row">

    <div class="col-md-10 m-auto">
    

    <h1 style="font-family:Algerian; color:blue; text-align:center;">
           <img src="./images/book.png">   
                 Feedback
           <img src="./images/book.png">   
    </h1>  

     <hr>

              Sometimes you look at a website design and just know that it does not work. You can not really tell how you imagined it in your head,
               but you know for sure that the website look that your designer shows to you is not it. In fact, it’s really far from what you wanted it to be.
               But how can you explain it to your web designer?
              Giving good feedback for a website is one of the most challenging tasks out there. Its almost impossible not to be subjective.  

     </div>

</div>

<div class="row">

      <div class="col-md-6 m-auto ">
        <div class="card mt-5 mb-5">

          <div class="card-title  p-2 text-center" style="background:linear-gradient(#00bbf0,#45eba5);">
            <h3 class="text-white">Feedback</h3>
          </div>

          <div class="card-body">
            <form method="post" enctype="multipart/form-data">
           
            <div class="row">

            <div class="col-md-6">
                    <img src="./images/feedback.png">
            </div>

                <div class="col-md-6">
                  
                         <div class="input-group mt-5 mb-3">
                            <input type="text" id="uname" name="uname"class="form-control" value="<?php $uname ?>"
                                     required="required" placeholder=" Enter Username.." />
                             <div class="input-group-append">
                               <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-user "></i>
                               </span>                             
                             </div>
                         </div>
               
                         <div class="input-group  mb-3"> 
                            <input type="mail" id="mail" name="mail"class="form-control" value="<?php $mail ?>"
                                     required="required" placeholder=" Enter E-mail.." />
                             <div class="input-group-append">
                               <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-envelope"></i>
                               </span>                             
                             </div>
                         </div>
            
                         <div class="input-group  mb-3"> 
                            <input type="text" id="subject" name="subject"class="form-control" value="<?php $sub ?>"
                                     required="required" placeholder=" Enter Subject.." />
                             <div class="input-group-append">
                               <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-tasks"></i>
                               </span>                             
                             </div>
                         </div>
              

                         <div class="input-group  mb-3"> 
                            <input type="number" id="mnumber" name="mnumber" class="form-control"
                                     value="<?php $umno ?>"
                                     required="required" placeholder=" Enter mess Number.." />
                             <div class="input-group-append">
                               <span style="cursor:pointer; width:46px;" class="input-group-text">
                                    <i class="fa fa-phone"></i>
                               </span>                             
                             </div>
                         </div>
              </div>

           </div>

               <div class="form-group">
                 <textarea class="form-control" id="mess" name="mess" rows="5" placeholder=" Enter your message.."
                        required="required"
                       value="<?php $mess ?>">
                 </textarea>
              </div>


         <div class="text-right">
           <input type="hidden" id="hfFlag"  name="hfFlag" value="<?php echo $flag ?>">

              <button class="btn btn-outline-primary "  onclick="window.location.replace('./')">
                <i style="font-size:20px;" class="fa fa-save"> 
                       Submit
                </i>
             </button>

            <button class="btn btn-outline-danger  " 
                 onclick="window.location.replace('home')">
                 <i style='font-size:20px' class='fa fa-times'> 
                        Cancel
                  </i>
            </button>


            </div>
         </div>
     </div>
   </div>
</div>

<!----------------------call tha pagebottom.php---------------------------------->

<?php include("shared/pagebottom.php") ?>

<!---------------------- end tha pagebottom.php---------------------------------->

  </body>
</html>