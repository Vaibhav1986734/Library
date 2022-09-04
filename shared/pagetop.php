<?php
  if (session_status() == PHP_SESSION_NONE) 
    session_start();
    include("shared/conn.php");
?>


<!DOCTYPE html>
   <html>
      <head>
               <title>Government Polytechnic Lucknow Library</title>
               <link rel="stylesheet" href="css/bootstrap.min.css" />
               <link rel="stylesheet" href="css/all.min.css" />
               <link rel="stylesheet" href="css/site.css">
               <link rel="stylesheet" href="css/animate.min.css">
      
       <style>
           .btna{
                  display: inline-block;
                  border:.2rem solid var(--blue);
                  color:var(--blue);
                  cursor: pointer;
                  border-radius: 50px;
                  position: relative;
                  overflow: hidden;
                  z-index: 0;
                }
                
                .btna::before{
                  content: '';
                  position: absolute;
                  top:0; right: 0;
                  width:0%;
                  height:100%;
                  background:var(--blue);
                  transition: .3s linear;
                  z-index: -1;
                }
                
                .btna:hover::before{
                  width:100%;
                  left: 0;
                }
                
                .btna:hover{
                  color:#fff;
                }
                
                /******Start of code of icon *******/
                .icon-bar 
                        {
                          position: fixed;
                           top: 60%;
                           left:-40px;
                           z-index: 999;
                           transition: 1s;
                           -webkit-transform: translateY(-50%);
                           -ms-transform: translateY(-50%);
                           transform: translateY(-50%); 
                        }
                
                    .icon-bar:hover
                       {
                            left:1px;
                            transform: 1s; 
                             transition: transform 
                          
                       }
                
                   .icon-bar a 
                      {
                
                         display: block;
                         text-align: center;
                         padding: 16px;
                         transition: all 0.3s ease;
                         color: white;
                         font-size: 20px;
                      }
                
                   .icon-bar a:hover 
                     {
                         background-color: rgb(214, 60, 60);
                     }
                
                   .facebook 
                    {
                      background-color:#0a7e8c;
                       color:white ;
                    }
                
                .facebook :hover
                {
                           transform: scale(1.5); 
                           transition: transform 0.5s;
                }
                
                  .twitter 
                   {
                    background-color:#0a7e8c;
                       color:white ;
                   }
                
                .twitter  :hover
                {
                             transform: scale(1.5); 
                           transition: transform 0.5s;
                }
                
                  .google 
                   {
                     background-color:#0a7e8c;
                       color:white ;
                   }
                
                .google :hover
                {
                             transform: scale(1.5); 
                           transition: transform 0.5s;
                }
                
                  .mail 
                   {
                     background-color:#0a7e8c;
                       color:white ;
                   }
                .mail   :hover
                {
                             transform: scale(1.5); 
                           transition: transform 0.5s;
                }
                
                 .youtube 
                  {
                background-color:#0a7e8c;
                       color:white ;
                  }
                 .youtube :hover
                {
                             transform: scale(1.5); 
                           transition: transform 0.5s;
                }
                
                /******end of code of icon *******/


</style>  
</head> 
                           
<body>

<!----- Start the code of header ------------->
    <header>

 <!----- Start the code of Container ------------->
       <div class="container-fluid">

  <!----- Start the code of Row ------------->
          <div class="row mt-3 ">   

          <div class="col-md-1">
             <img src="images/logo.jpg" class="img-responsive"/>
          </div>

          <div class="col-md-7">
            <a class="navbar navbar-brand ml-5" style="text-shadow:2px 2px 10px #68cbf2;">
                 
                G<span class="d-md-inline-block d-none">overnment</span> 
                P<span class="d-md-inline-block d-none">olytechnic</span> 
                L<span class="d-md-inline-block d-none">ucknow</span>
                 Library
           </a>
         </div>


          <div class="col-lg-4 d-none d-md-block">
           <a href="https://swachhbharatmission.gov.in/sbmcms/index.htm"   target="_blank"> <img  src="images/logo-1.png" class="p-0 img-responsive"/></a>
          </div>

     </div>
    <!---- End the code of Row ------------->

     <!------- Start the code of nav ------------->
   
<div class="row ">
     <!------- Start the code of nav ------------->
       <div class="col-md-12 p-0 m-0"  style="font-size: 16px; background-color:#0a7e8c;">
        <nav class="navbar navbar-expand-md navbar-light" > 

           <button class="navbar-toggler" data-toggle="collapse" data-target="#Cnb">
                      <span class="navbar-toggler-icon"></span>
           </button>


              <div class="collapse navbar-collapse" id="Cnb">

                <ul class="navbar-nav " style="font-weight: bold;">

                 
                  <a href="Home" class="nav-item nav-link text-white">Home</a>
                

                  <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle text-white"  id="navbardrop" data-toggle="dropdown">
                       Branch wish Book
                     </a>

 <!------- Start the code of dropdown-menu ------------->

            <div class="dropdown-menu">
               <?php 
                $rs=mysqli_query($con,"SELECT branchid, branchname FROM branches order by branchid asc") or die("Error: ".mysqli_error($con));
                $list="";
                while($row=mysqli_fetch_array($rs))
                {
                  $list.="<a class='dropdown-item' href='branchbook?id=$row[0]'>$row[1]</a>";
                }
                if($list)
                  echo ($list);
               ?>
             </div>
<!------- End the code of dropdown-menu ------------->
                  </li>
                  

                  <a href="ManageRequestb" class="nav-item nav-link text-white ">Request-Book</a>
                    
                  <li class="nav-item dropdown">

                    <a href="#" class="nav-link dropdown-toggle text-white" href="#" 
                       id="navbardrop" data-toggle="dropdown">
                          e-Book
                    </a>

                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="https://epapertoday.in/" target="_blank">
                             E-Newspapers
                       </a>
                      <a class="dropdown-item" href="https://manybooks.net/" target="_blank">
                           story Book
                      </a>
                      <a class="dropdown-item" target="_blank"
                              href="https://www.goodreads.com/list/show/12301.BEST_BOOKS_FOR_LAW_STUDENTS" >
                            Law Book
                      </a>
                      <a class="dropdown-item"href="https://www.goodreads.com/list/show/11.Best_Crime_Mystery_Books" 
                                       target="_blank">
                           Mystery Books
                       </a>
                      </div>

                  </li>

                
                
                    <a class="nav-item nav-link text-white" href="gallery">Gallery</a>
                  
                    <a class="nav-item nav-link text-white" href="Managefeedback">Feedback</a>
                    <a class="nav-item nav-link text-white" href="Managecontact">Contact</a>
                

                </ul></div>
               
              <form class="form-inline ml-auto ">

                <div class="search-container pr-2">
                  <form action="/action_page.php">
                    <input type="text" placeholder="Search.. " name="search">
                  </form>
                </div>
                
              <div class="nav-item ">
                 <a href="signin" class="btna btn-sm text-white" >
                     <i class="fa fa-sign-in-alt " aria-hidden="true"></i>&nbsp;SignIn
                 </a>            
              </div>
                
              
          
              </form>

         </nav>
        
<!--------End the code of Nav ---------------->

</div>
<!----- End the code ofrow ------------->

 </div>
 <!----- End the code of Container ------------->
</div>

</header>
<!----- End the code of header ------------->