<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");

$branchid="0";
$data="";

if(isset($_GET["branchid"]))
{
    $branchid=$_GET["branchid"];
    if($branchid !="0")
    {
        $tablerows="";

        $rs=mysqli_query($con,"select * from year where branchid=$branchid") or die("Error: ".mysqli_error($con));

        $sno=1;
        while($row=mysqli_fetch_array($rs))
        {
            $tablerows.="<tr>
                         <td>$sno</td>
                         <td>$row[1]</td>
                         <td class='text-center'>
                            <a class='btn btn-outline-success btn-sm' href='ManageBranch_Year?flag=e&branchid=$branchid&yearid=$row[0]'>
                           <i class='fa fa-edit'>
                                   Edit
                             </i>
                            
                         </td>


                         <td class='text-center'>
                            <a class='btn btn-outline-danger btn-sm' href='ManageBranch_Year?flag=d&branchid=$branchid&yearid=$row[0]'
                             onclick='return confirm(\"Do you want to Delete this record..?\");'>
                             <i class='fa fa-trash '> 
                               Delete
                             </i>
                            </a>
                         </td>
                         </tr>";

                         $sno++;
        }
        if($tablerows)
        {
            $tablerows="<table class='table table-bordered'>
                        <tr class='bg-info text-white'>
                        <th>Sno.</th>
                        <th>Year</th>
                        <th class='text-center w-25' colspan='2'>Action</th>
                        </tr>
                        $tablerows
                        </table>";
                        $data=$tablerows;
        }
        else
        $data="<h5 class='text-danger'>No row exits..!!</h5>";
    }
    else
    $data="<h5 class='text-danger'>Plz select Branch from the List..!!</h5>";
}
else
$data="<h5 class='text-danger'>Plz select Branch from the List..!!</h5>";

?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" charset="utf-8" />
      <title>Dashboard - Branch Details</title>
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

<div class="container mt-5">

    <div class="row">
        <div class="col-6 col-sm-6 col-md-7 ">
            <h3>Branch wise Year Details</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-6 col-sm-6 col-md-7 text-left">
                <div class="form-group">
                    <lable>Branch</lable>
                    <select name="ddlStates" id="ddlStates" class="form-control" required onchange="window.location.replace('Branch_YearDetails?branchid='+this.value)">
                    <option value="0">Select Branch </option>
                    <?php
                      $rs=mysqli_query($con,"select branchid,branchname from branches") or die("Error: ".mysqli_error($con));
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
        </div>
   
        <div class="col-6 col-sm-6 col-md-5 text-right pt-4">
            <a href="ManageBranch_Year?flag=a&branchid=<?php echo $branchid ?>" onclick="return AddCity();"
             class="btn btn-outline-info ">
             <i class='fa fa-plus-square' style='font-size:20px; padding: 4px'></i>
              <b>  Add New Year</b>
            </a>
        </div>

    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="table-responsive">
                <?php echo $data ?>
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
<script lang="ja">
    function AddCity()
    {
        var sid=document.getElementById("ddlStates").value;
        if(sid=="0")
        {
            alert("Plz Select State from the List..!!");
        }
    }
</script>
</body>
</html>