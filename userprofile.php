<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");

      $username="guest";
      $facname="";
      $photo="";
      $desig="";
      $branch="";
      $branchid="";
      $femail="";
      $fcontact="";

      if(isset($_SESSION["rolename"]) && isset($_SESSION["logstatus"]) && $_SESSION["rolename"]=="Faculty")
      {
      if(isset($_SESSION["username"]))
      $username=$_SESSION["username"];
      }

      $rs=mysqli_query($con,"SELECT facultid,facultname,designationname,branchname, photo,fbranchid,femail,fcontact FROM faculties f 
      inner JOIN designation d on f.fdesignationid=d.designationid INNER JOIN branches b on f.fbranchid=b.branchid 
      WHERE fusername='$username'") or die("Error: ".mysqli_error($con));
      if($row=mysqli_fetch_row($rs))
      {
         $facname=$row[1];
         $desig=$row[2];
         $branch=$row[3];
         $photo=$row[4];
         $branchid=$row[5];
         $femail=$row[6];
         $fcontact=$row[7];
      }
?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>BSSITM Library</title>

       <link rel="stylesheet" href="css/all.min.css" />
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <link rel="stylesheet" href="css/admincss.css" />
               <link href="./images/login1.jpg" rel="shortcut icon" type="image/png">

               <style>
        


        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
        
        
        .counts
          {
            padding: 30px 0px;
          }
        
        .counts .counters span
          {
            font-size: 48px;
            display: block;
            color: #2c778f;
            font-weight: 600;
          }
        
        .counts .counters p
          {
            padding: 0;
            margin: 0 0 20px 0;
            font-family: "Railway",sans-sarif;
            font-size: 15px;
            font-weight: 900;
            color: #37423b;
          }
        
        
                </style>
        
        </head>
        <body class="sb-nav-fixed">
            <?php include_once("shared/adminpagetop.php") ?>
        
            <div id="layoutSidenav">
                <?php include_once("shared/adminsidenav.php") ?>
        
                <div id="layoutSidenav_content">
        
        
                    <main>
         
   <b><div class="text-dark bg-light text-center p-2" style="font-size:50px; border-radius:0 50px 0 50px;">Faculty Profile</div></b>
                
        
                    <form method="post">
                                              
                    <div class="container emp-profile">
                    <div class="row">
                            <div class="col-md-4">
                                <div class="profile-img">
                                    <img src="<?php echo $photo ?>" alt="avatar"  class="img-thumbnail mb-2 " style="width: 60%; border-radius:20%; height: 15%">
                                </div>
                            </div>
                            <div class="col-md-8 mt-5">
                            <div class="profile-head">
                                       <h2><?php echo $facname ?> </h2>
                                       <b><p class="text-primary mb-2"><?php echo "$branch - $desig" ?></b> <br>
                                            <p class="proile-rating">RANKINGS : <span>9/10</span></p>

                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">About</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Timeline</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="profile-work">
                                    <p>WORK LINK</p>
                                    <a href="">Website Link</a><br/>
                                    <a href="">Bootsnipp Profile</a><br/>
                                    <a href="">Bootply Profile</a>
                                    <p>SKILLS</p>
                                    <a href="">Web Designer</a><br/>
                                    <a href="">Web Developer</a><br/>
                                    <a href="">WordPress</a><br/>
                                    <a href="">WooCommerce</a><br/>
                                    <a href="">PHP, .Net</a><br/>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="tab-content profile-tab" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>User Id</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <p class="text-primary mb-0"><?php echo $facname ?></p>
                                                    </div>
                                                </div>
                                              
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Email</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <p class="text-primary mb-0"><?php echo $femail ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Phone</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                       <p class="text-primary mb-0"><?php echo $fcontact ?></p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Profession</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p> H.O.D. / Web Developer and Designer</p>
                                                    </div>
                                                </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Experience</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert***</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Collage Time</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>6 hr/day</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Total Subject</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>20</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Level</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>Expert***</p>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label>Availability</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>6 months</p>
                                                    </div>
                                                </div>
                                       
                                    </div>
                                </div>
                                
        
                                
        
        <!-- Start the code of counter -->
        
        
            <!-------Start the code of Section--------------->
            <section class="counts bg-dark text-white mt-3" id="counts"style="border-radius:60px 0 60px 0"; >
        
        <!-------Start the code of Container --------------->
          <div class="container-fluid m-0 p-0">
        
        <!-------Start the code of Row--------------->
            <div class="row counters">
        
              <div class="col-md-3  text-center">
                <span data-toggle="counter-up">50</span>
            <b>Total Course</b>
              </div>
        
              <div class="col-md-3  text-center">
                <span data-toggle="counter-up">540</span>
            <b>    Total Teacher</b>
              </div>
        
              <div class="col-md-3  text-center">
                <span data-toggle="counter-up">25</span>
            <b>Total Branch</b>
              </div>
        
        
                  <div class="col-md-3  text-center">
                    <span data-toggle="counter-up">07</span>
                <b>    Total Language</b>
                  </div>
        
                </div>
        <!-------End the code of Row--------------->
              </div>
        
        <!-------End the code of Container--------------->
        </section>
        
        <!-------End the code of Section--------------->
        
        <!-- End the code of counter -->
        
        
        
                            </div>
                        </div>
                    </form>           
                </div>
        
               
</main>

<?php
mysqli_close($con); 
include_once("shared/adminpagebottom.php") 
?>

     </div>
    </div>
        
      </body>
      </html>