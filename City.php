
<?php
     header("Cache-Control: no-cache, must-revalidate");

     if (session_status() == PHP_SESSION_NONE) 
             session_start();

          $lrole="Administrator";

      include("shared/checkuserlogin.php");
      include("shared/conn.php");

$sid="0";
$data="";

if(isset($_GET["sid"]))
{
    $sid=$_GET["sid"];
    if($sid !="0")
    {
        $tablerows="";

        $rs=mysqli_query($con,"select * from city where stateid=$sid") or die("Error: ".mysqli_error($con));

        $sno=1;
        while($row=mysqli_fetch_array($rs))
        {
            $tablerows.="<tr>
                         <td>$sno</td>
                         <td>$row[1]</td>
                         <td class='text-center'>
                            <a class='btn btn-outline-success ' href='ManageCity?flag=e&sid=$sid&cid=$row[0]'><i class='fa fa-edit'></i> Edit</a>
                         </td>
                         <td class='text-center'>
                            <a class='btn btn-outline-danger ' href='ManageCity?flag=d&sid=$sid&cid=$row[0]' onclick='return confirm(\"Do you want to Delete this record..?\");'> <i class='fa fa-trash'> </i> 
                            Delete
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
                        <th>City</th>
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
    $data="<h5 class='text-danger'>Plz select state from the List..!!</h5>";
}
else
$data="<h5 class='text-danger'>Plz select state from the List..!!</h5>";

?>

<!DOCTYPE html>
  <html>

  <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, 
       shrink-to-fit=no" charset="utf-8" />
       <title>Dashboard - City Details</title>
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
        <div class="col-md-12">
            <h3>State wise City Details</h3>
        </div>
    </div>

    <div class="row">

        <div class="col-md-5 text-left">
                <div class="form-group">
                    <lable>State</lable>
                    <select name="ddlStates" id="ddlStates" class="form-control" required onchange="window.location.replace('City?sid='+this.value)">
                    <option value="0">Select State </option>
                    <?php
                      $rs=mysqli_query($con,"select stateid,StateName from states") or die("Error: ".mysqli_error($con));
                      while($row=mysqli_fetch_array($rs))
                      {
                          if($sid==$row[0])
                          echo "<option value='$row[0]' selected='selected'>$row[1]</option>";
                          
                          else
                          echo "<option value='$row[0]'>$row[1]</option>";
                      }
                    ?>
                    </select>
                </div>
        </div>
   
        <div class="col-md-7 text-right pt-4">
            <a href="ManageCity?flag=a&sid=<?php echo $sid ?>" onclick="return AddCity();" class="btn btn-info text-white" style="vertical-align:middle; font-weight:bold">
<i class='fa fa-plus-square' style='font-size:20px; padding: 4px'></i>
            Add New City
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
                include_once("shared/adminpagebottom.php");                 
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
