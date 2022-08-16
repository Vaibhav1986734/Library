<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
       session_start();
 
     include("shared/checkuserlogin.php");
     $lrole="Faculty";
     include("shared/conn.php");
    
     if(isset($_SESSION["rolename"]) && isset($_SESSION["logstatus"]) && $_SESSION["rolename"]=="Faculty")
     {
               if(isset($_SESSION["username"]))
                     $username=$_SESSION["username"];
     }
     $rs=mysqli_query($con,"select password from users where username='$username'") or die("Error: ".mysqli_error($con));
     $row=mysqli_fetch_array($rs);
     $pass=$row[0];
     $oldpass="";
      
      $newpass="";
      $confpass="";

      if($_SERVER['REQUEST_METHOD']=="POST")
      {    
        if(isset($_POST["txtoldpass"]) && isset($_POST["txtnewpass"]) && isset($_POST["txtconfpass"])) 
        {
          $oldpass=$_POST["txtoldpass"];
          $newpass=$_POST["txtnewpass"];
          $confpass=$_POST["txtconfpass"];

        }
        if($oldpass==$pass)
        {
          if($newpass==$confpass)
          {
            $sql="UPDATE `users` SET `username`='$username',`password`='$newpass',`rolename`='$lrole' WHERE username='$username'"; 
        
            mysqli_query($con,$sql) or die("Error: ".mysqli_error($con));	
            mysqli_close($con);	 
     
            echo "<script>alert('Password Change Successfully');location='ChangePassword'</script>";
       
          }
          else
          {
            echo '<script>alert("New password and Confirm Password does not match ")</script>';
          }
        }
        else
        echo '<script>alert("Old Password is Incorrect")</script>';
        
      }
      
?>

<!DOCTYPE html>
  <html>

  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
    <title>Dashboard - Change Password</title>
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
            <div class="col-md-7 mx-auto">
              <div class="card mt-3">

                <div class="card-title bg-info p-2 text-center" style="background-image: linear-gradient(#1c92d2 , #56CCF2 , #0082c8 )">
                  <h3 class="text-white">Update Password</h3>
                </div>

                <form method="post">

                  <div class="card-body ">

                  UserName<br/>
                    <div class="input-group mb-3 mt-2">
                     
                      <input type="text" disabled id="txtusername" name="txusername" class="form-control" value="<?php echo $username ?>" 
                         placeholder="Enter your Username" required="required" />

                        <div class="input-group-append">
                          <span  class="input-group-text">
                            <i class="fa fa-user pt-1 pb-1"></i>
                          </span>                                 
                        </div>
                    </div>
                    
                    Old Password<br/>
                    <div class="input-group mb-3 mt-2">
                     
                      <input type="password" id="txtoldpass" name="txtoldpass" class="form-control"  
                         placeholder="Enter your old Password" required="required" />

                      <div class="input-group-append">
                        <span style="cursor:pointer" class="input-group-text" id="tgl1" onclick="toggler('tgl1','txtoldpass');">
                        <i class="fa fa-eye-slash"></i>
                        </span>                             
                      </div>
                    </div>
                      
                    New Password<br/>
                    <div class="input-group mb-3 mt-2">
                     
                      <input type="password"  class="form-control" id="txtnewpass" name="txtnewpass"
                         placeholder="Enter New Password" required="required" />

                      <div class="input-group-append">
                        <span style="cursor:pointer" class="input-group-text" id="tgl2" onclick="toggler('tgl2','txtnewpass');">
                        <i class="fa fa-eye-slash"></i>
                        </span>                             
                      </div>
                    </div>

                    Confirm New Password<br/>
                    <div class="input-group mb-3 mt-2">
                     
                      <input type="password"  class="form-control" id="txtconfpass" name="txtconfpass"
                        placeholder="Confirm your New Password" required="required" />

                      <div class="input-group-append">
                        <span style="cursor:pointer" class="input-group-text" id="tgl3" onclick="toggler('tgl3','txtconfpass');">
                        <i class="fa fa-eye-slash"></i>
                        </span>                             
                      </div>
                    </div>

                  </div>
  
                  <div class="card-footer">
                    <div class="text-right">

                      <button class="btn btn-outline-dark"><i class="fas fa-key" aria-hidden="true"> </i> Change Password</button>
                      <button class="btn btn-outline-danger" type="button" onclick="window.location.replace('FacultyHome')">
                      <i class="fa fa-times "> </i> Cancel</button>
                    </div>
                  </div>

                </form>

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
        
  </body>
</html>