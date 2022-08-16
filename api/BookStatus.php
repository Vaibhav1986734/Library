<?php
 include_once("../shared/conn.php");
 $resp = new stdClass();  
 try
 {  
     if($_SERVER['REQUEST_METHOD'] == "POST")
         {

            $data = file_get_contents("php://input");
            $obj = json_decode($data); 
                 
            $rid=$obj->ReqId; 
            $status=$obj->Status;
          
            mysqli_query($con,"update requestb set status='$status' where Reqid=$rid");
            
            
            $resp->ResponseCode = 1;
            $msg="Request Approved Successfully for Request Id:--$rid..!!";
            if($status=='R')$msg="Request Rejected for Request Id:--$rid..!!";
            $resp->ResponseText= $msg;   

   
 
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