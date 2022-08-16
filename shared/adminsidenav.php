<div id="layoutSidenav_nav">

<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion"> 		
    <div class="sb-sidenav-menu">
         <?php
         include_once("conn.php");
            if (session_status() == PHP_SESSION_NONE) 
              session_start();

              if(isset($_SESSION["rolename"]) && 
                isset($_SESSION["logstatus"]) && 
               $_SESSION["rolename"]=="Administrator")
                 {

              ?>
 
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Home</div>

                    <a class="nav-link" href="Administration">
                        <div class="sb-nav-link-icon">
                            <i class="fa fa-home"></i>
                        </div>
                        Dashboard
                    </a>


                    <div style="border-bottom: 1px solid" 
		                  class="ml-3 mr-3 mt-2 mb-2 text-dark">
                     </div>
                    
                    <div class="sb-sidenav-menu-heading pt-2">
                        <i class="fas fa-file"></i>
                        &nbsp;&nbsp;Master Files
                    </div>
        

                         <a class="nav-link" href="bannerDetails">
                             <div class="sb-nav-link-icon">
                             <i class="fa fa-address-card"></i>
                             </div>
                             Banner
                           </a> 


                           <a class="nav-link" href="galleryDetails">
                             <div class="sb-nav-link-icon">
                             <i class="fa fa-address-card"></i>
                             </div>
                             gallery
                           </a> 


                            <a class="nav-link" href="BranchDetails">  
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-users"></i>
                             </div>                       
                                    Branch Master
                            </a>  

                            <a class="nav-link" href="DesignationDetails">
                               <div class="sb-nav-link-icon">
                                   <i class="fa fa-users"></i>
                               </div>
                                 Designation
                             </a>

                             <a class="nav-link" href="QualificationDetails">
                               <div class="sb-nav-link-icon">
                                 <i class="fa fa-users"></i>
                                 </div>
                                      Qualification
                            </a>

		               		 <a class="nav-link" href="publisherDetails"> 
                            <div class="sb-nav-link-icon">
                                <i class="fa fa-user"></i>
                             </div>                                   
                                    Publisher Master
                            </a> 

		                 		 <a class="nav-link" href="bookdetails"> 
                            <div class="sb-nav-link-icon">
                             <i class="fa fa-book-open"></i>
                             </div>                  
                                    Add New Book
                            </a> 

                         
                         

                           <a class="nav-link" href="Branch_YearDetails">
                             <div class="sb-nav-link-icon">
                             <i class="fa fa-code-branch"></i>
                             </div>
                                Branch-Year
                           </a>


                          

                      
                           <div style="border-bottom: 1px solid" 
                            class="ml-3 mr-3 mt-2 mb-2 text-dark">
                           </div>

                              <a class="nav-link" href="contactDetails">
                                  <div class="sb-nav-link-icon">
                                    <i class="fa fa-address-card"></i>
                                   </div>
                                        Contact Us List
                                 </a>    
                        
                          

		                 		 <a class="nav-link" href="feedbackDetails">
                             <div class="sb-nav-link-icon">
                               <i class="fa fa-comments"></i>
                             </div>
                               feedback
                           </a> 
  				
						
                        <div style="border-bottom: 1px solid" 
                                class="ml-3 mr-3 mt-2 mb-2 text-dark">
                        </div>
                                
                        <a class="nav-link" href="signout">
                            <div class="sb-nav-link-icon">
                                    <i class="fa fa-power-off"></i>
                            </div>
                                SignOut
                        </a>

                </div>

           <?php
               }

               else if(isset($_SESSION["rolename"]) && 
               isset($_SESSION["logstatus"]) && 
               $_SESSION["rolename"]=="Faculty")
                  {
                    $username="guest";
                    $facname="";
                    $photo="";
                    $desig="";
                    $branch="";
                    $branchid="";

                    if(isset($_SESSION["username"]))
                    $username=$_SESSION["username"];

                    $rs=mysqli_query($con,"SELECT facultid,facultname,d.designationname,b.branchname,photo,fbranchid FROM faculties f ".
                    "inner JOIN designation d on f.fdesignationid=d.designationid INNER JOIN branches b on f.fbranchid=b.branchid ".
                    "WHERE fusername='$username'") or die("Error: ".mysqli_error($con));
                    if($row=mysqli_fetch_row($rs))
                    {
                       $facname=$row[1];
                       $desig=$row[2];
                       $branch=$row[3];
                       $photo=$row[4];
                       $branchid=$row[5];
                    }
                 
            ?>
                     
      <div class="nav">
          <div class="sb-sidenav-menu-heading text-center text-white text-capitalize">
              <img src="<?php echo $photo ?>" class="img rounded-circle mx-auto h-50 w-50 mb-3"/><br/>
              <?php echo $facname ?><br/>
              <?php echo "$branch - $desig" ?><br/>              
              <p class="mt-2" >
                 <?php
                    date_default_timezone_set("Asia/Calcutta");
                 ?>
               <u>Login Date-Time</u><br> <?php echo date('d-M-Y | h:i a')?>
              </p>
          </div>

          

      <div class="nav">

                <a class="nav-link" href="FacultyHome">
                    <div class="sb-nav-link-icon">
                         <i class=" fa fa-home"></i>
                    </div>
                         Dashboard
               </a>
 
              

            <div style="border-bottom: 1px solid" 
                 class="ml-3 mr-3 mt-2 mb-2 text-dark">
            </div>
                                
            <div class="sb-sidenav-menu-heading pt-2">
                   <i class="fas fa-file"></i>
                        &nbsp;&nbsp;Faculty Menus
            </div>

           <a class="nav-link" href="userprofile">   
                      <div class="sb-nav-link-icon">
                                <i class="fa fa-user"></i>
                             </div>                   
                     Manage Profile
           </a> 

           <a class="nav-link" href="ChangePassword">   
                      <div class="sb-nav-link-icon">
                      <i class="fas fa-key"></i>
                             </div>                   
                    Update Password
           </a> 

                      <a class="nav-link" href="facultyDetails">
                            <div class="sb-nav-link-icon">
                                    <i class="fa fa-address-card"></i>
                                </div>
                                      Manage faculty
                        </a> 
                                
            
                     
                        <a class="nav-link" href="publisherDetails"> 
                            <div class="sb-nav-link-icon">
                            <i class="fa fa-users"></i>
                             </div>                                   
                                    Publisher Details
                        </a> 

                        <div style="border-bottom: 1px solid" 
                                   class="ml-3 mr-3 mt-2 mb-2 text-dark">
                        </div>

                        <div class="sb-sidenav-menu-heading pt-2">
                        <i class="fas fa-file"></i>
                        &nbsp;&nbsp;Request Master 
                    </div>

                         <a class="nav-link" href="requestbDetails">
                             <div class="sb-nav-link-icon">
                                    <i class="fa fa-book-reader"></i>
                             </div>
                               Request Book
                         </a> 

                         <a class="nav-link" href="acceptbDetails">
                            <div class="sb-nav-link-icon">
                               <i class="fa fa-users"></i>
                             </div>
                                  Accepted List
                        </a>   

                       <a class="nav-link" href="rejectbdetails">
                             <div class="sb-nav-link-icon">
                                <i class="fa fa-users"></i>
                               </div>
                               Rejected List
                        </a>   
          <div style="border-bottom: 1px solid" 
                 class="ml-3 mr-3 mt-2 mb-2 text-dark">
          </div>
                                            
                                        
          <a class="nav-link" href="studentdetails">
                 <div class="sb-nav-link-icon">
                  <i class="fa fa-users"></i>
                </div>
                     Register Student
         </a>    

                                    
        <div style="border-bottom: 1px solid" 
             class="ml-3 mr-3 mt-2 mb-2 text-dark">
        </div>
                                            
       <a class="nav-link" href="signout">
           <div class="sb-nav-link-icon">
                     <i class="fa fa-power-off"></i>
           </div>
                        SignOut
       </a>

       </div>
 
       <?php
       
          }
          ?>
         
        </div>

    </nav>
</div>