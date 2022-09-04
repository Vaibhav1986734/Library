   <?php  
      if($_SERVER['REQUEST_METHOD']=="POST")
        { 
 
       if (session_status() == PHP_SESSION_NONE) 
              session_start();

       include_once("shared/conn.php");  

      $username="";
      $password="";

      if(isset($_POST["txtUsername"])) 
           $username=$_POST["txtUsername"];

    if(isset($_POST["txtPassword"])) 
           $password=$_POST["txtPassword"];

    $cnt=0;
    $role="guest";

    if($stmt=mysqli_prepare($con,"select count(*),rolename from users where username=? and password=?"))
     {
      mysqli_stmt_bind_param($stmt,"ss",$username,$password); 
      mysqli_stmt_execute($stmt);  
      if($stmt==false)throw new Exception(mysqli_error($con));          
      mysqli_stmt_bind_result($stmt,$cnt,$role);
      mysqli_stmt_fetch($stmt);   
      mysqli_stmt_close($stmt);  
      mysqli_close($con);   
    }   

    if($cnt==1)
    { 
     $_SESSION["logstatus"]="t";
     $_SESSION["username"]=$username; 
     $_SESSION["rolename"]=$role;        
     
     if($role=='Administrator')
        header("Location: Administration");      
     else if($role=='Faculty')
        header("Location:FacultyHome");
        else if($role=='H.O.D.')
        header("Location:hodHome");      
     else
        header("Location: home");      

    }
    else
    {      
      $_SESSION["message"]="Invalid Username or Password..!!";    	      
      header("Location: signin");      
    } 
   
  }
 
?>
           
<!DOCTYPE html>
    <html>
        <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          <title>GPL</title>
          <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
          <link rel="stylesheet" href="css/all.min.css" />

        </head>
        <body style="background:url(./images/a.jpg)">
        <div class="conatiner">
          <div class="row">
            <div class="col-md-5 mx-auto">
              <div class="card mt-5" >

                <div class="card-title bg-info p-2 text-center" 
                                      style="background-image: linear-gradient(#1c92d2 , #56CCF2 , #0082c8 )">
                  <h3 class="text-white">Member's Login</h3>
                </div>

                <form method="post">

                  <div class="card-body ">

                  <div class="row ">
                    <div class="col-4 m-0 p-0 ">
                      
                      <img src="./images/login.jfif" class="img-tumbnail "/>
                    </div>

                    <div class="col-8 ">

                      <div class="input-group mt-5 mb-3">
                        
                   <input type="text" id="txtUsername" name="txtUsername"
                                          class="form-control" value="<?php $username ?>"
                         required="required" placeholder=" Enter Username.." />

                       <div class="input-group-append">
                          <span style="cursor:pointer; width:46px;" class="input-group-text">
                               <i class="fa fa-user "></i>
                          </span>                             
                        </div>

                    </div>
                             
                      <div class="input-group mb-3">
                        <input type="password" id="txtPassword" name="txtPassword" class="form-control"
                             value="<?php $password ?>" 
                         placeholder="Enter your Password" required="required" />

                        <div class="input-group-append">
                          <span style="cursor:pointer" class="input-group-text" id="tgl1"            onclick="toggler('tgl1','txtPassword');">
                          <i class="fa fa-eye-slash"></i>
                          </span>                             
                        </div>
                      </div>

                    </div>
                  </div>
                  </div>
  
                  <div class="card-footer">
                   
                    <div class="text-right">
                      <button class="btn btn-outline-success">
                           <i class='fa fa-sign-in-alt'></i>
                                   Login
                     </button>

                       <button class="btn btn-outline-danger" type="button" 
              onclick="window.location.replace('home')">
               <i class="fa fa-times "> </i>
                  Cancel
         </button>
     
                    </div>
                  </div>

                </form>

              </div>
            </div>
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

     