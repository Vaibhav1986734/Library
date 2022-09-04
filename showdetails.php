<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");
?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>student Details</title>

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

     <div class="container mt-3">

      <div class="row">

        <div class="col-md-12 text-center bg-info p-2" style="font-size: 25px;
                font-weight: bold; border-radius:50px; ">Student Details</div>     
         </div>
         

       <hr/>

     <div class="row table-responsive">
     <div class="col-md-6 mb-2">
                  <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search"  value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" 
                                        class="form-control" placeholder="Enter Enrollment/ Name" required="required">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

    </div>
   
       <div class="col-md-12">
            <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>S.No.</th>
                                    <th>Enrollment</th>
                                    <th>Name</th>
                                    <th>Branch</th>
                                    <th>Year</th>
                                    <th>Mobile</th>
                                    <th>Picture</th>
                                    <th>fee Resipt</th>
                                    <th>adhar Pic</th>
                                </tr>
                            </thead>
                            <tbody>

       <?php 

                 if(isset($_GET['search']))
                                    {
                   $filtervalues = $_GET['search'];
                   $query = "select sid,enrollNo,studnm,branchname,yearname,mobile,spic,rfee,adhar
                   from student g Inner Join branches b on g.branchid=b.branchid  Inner Join year y on g.yearid=y.yearid                   
                       WHERE CONCAT(enrollNo,studnm) LIKE '%$filtervalues%' ";
                
                       $query_run= mysqli_query($con, $query);
                              if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td><?= $items['sid']; ?></td>
                                                    <td><?= $items['enrollNo']; ?></td>
                                                    <td><?= $items['studnm']; ?></td>
                                                    <td><?= $items['branchname']; ?></td>
                                                    <td><?= $items['yearname']; ?></td>
                                                    <td><?= $items['mobile']; ?></td>
                                                    <td style='width: 50px;'><img src='<?= $items['spic']; ?>' class='img-fluid' ></td>
                                                    <td style='width: 50px;'><img src='<?= $items['rfee']; ?>' class='img-fluid'></td>
                                                    <td style='width: 50px;'><img src='<?= $items['adhar']; ?>' class='img-fluid'></td>
                                                   
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4" class="text-center text-danger">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                                </tbody>
                                </table>
     </div>
   </div>
      </div>
   
                                  
      
   </main>
          
         
      
        <?php
                  mysqli_close($con); 
                include_once("shared/adminpagebottom.php") 
                ?>
            </div>
        
      </body>
      </html>