<?php
 include_once("../shared/conn.php");
 $resp = new stdClass();  
 try
 {  
     if($_SERVER['REQUEST_METHOD'] == "GET")
         {
                 
            $bid=$_GET["bid"];   
            
            $rs=mysqli_query($con,"select yearid,yearname from year where branchid=$bid") or die("Error ".mysqli_error($con));
            $html="<option value='0' selected='selected'>Select</option>";
            while($row=mysqli_fetch_array($rs))       
            {
              $html .= "<option value='$row[0]'>$row[1]</option>";
            }     
            
            
            $resp->ResponseCode = 1;
            $resp->ResponseText= $html;
      

   
 
         }

}
    catch (Exception $ex) 
      {
        $resp->ResponseCode = 0;
        $resp->FailureText = $ex->getMessage();
       }  

    mysqli_close($con);
    header('Content-Type: application/json');
   
    echo json_encode($resp);
 
?>