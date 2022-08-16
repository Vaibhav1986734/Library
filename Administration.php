  <?php
      header("Cache-Control: no-cache, must-revalidate");

         if (session_status() == PHP_SESSION_NONE) 
                 session_start();

         $lrole="Administrator";
        include("shared/checkuserlogin.php");
?>

<!DOCTYPE html>

<head>
   <meta name="viewport" content="width=device-width, initial-scale=1,
      shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - Library Admin</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/admincss.css" />

</head>

<body  class="sb-nav-fixed">

    <?php include_once("shared/adminpagetop.php") ?>

    <div id="layoutSidenav">
        <?php include_once("shared/adminsidenav.php") ?>


     <div id="layoutSidenav_content">

         <main>                

            <div style="text-align:center; border-radius:3px;">

                    <h3 class="text-danger font-weight-bold" style="padding-top:20px;
			text-shadow: 1px 1px 1px black;">
                        Welcome to Library Administration
                    </h3>

                <div class="text-dark" style="font-size: 18px;
                  font-weight:bold;">
                     Here are some tips to help you get started
                </div>

                  <img src="./images/adminpic.jpg" 
                       style="width: 330px;" 
                       class="img-fluid img-thumbnail mt-4" />


                    <br/><br/>
          </div>





       </main>
            
            <?php include_once("shared/adminpagebottom.php") ?>
   </div>
 </div>    

    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="js/jquery.toaster.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/adminscripts.js"></script>

</body>

</html>