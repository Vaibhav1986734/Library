 <?php
   include("shared/conn.php");
?>

<!DOCTYPE html>
   <html>
      <head>
               <title>Government Polytechnic Lucknow Library</title>
               <link rel="stylesheet" href="css/bootstrap.min.css" />
               <link rel="stylesheet" href="css/all.min.css" />
               <link rel="stylesheet" href="css/site.css">
               <link rel="stylesheet" href="css/font-awesome.min.css">
               <link rel="stylesheet" href="css/animate.min.css">
       </head>
<body>

 <?php
   include("shared/pagetop.php");
?>


<!---------------------- Open  the code of banner ----------------------------------------->

<!---------------------- Open  the code of banner ----------------------------------------->

<div class="container-fluid">
  <div class="row ">
    <div class="col-md-9 p-0">
       <!-- Start the Code of  Carousel-->

    <!--Start the Code of Carousel -->
    <div class="carousel slide h-100" data-ride="carousel" id="myCarousel" >

<!-- Start the Code of The slideshow -->
                    
 <div class="carousel-inner">
                      
 <?php
      $rs=mysqli_query($con,"select * from banner order by bannerid asc") or die("Error: ".mysqli_error($con));
      $bnr="";
      $count=0;
      while($row=mysqli_fetch_array($rs))
      {
        if($count==0)
        {
          $bnr.="<div class='carousel-item active'>";
        }
        else
        {
          $bnr.="<div class='carousel-item'>";
        }
        $bnr.="<img class='img-fluid' src='$row[2]' alt='$row[1]'/>
        </div>";
        $count=$count+1;
      }
      if($bnr)
        echo $bnr;
      ?>
                    
</div>
                  

<!-- End the Code of The slideshow -->

                    
<!-- Start the Code of Indicators -->
                    
<ul class="carousel-indicators">
      <?php 
        $rs=mysqli_query($con,"select * from banner order by bannerid asc") or die("Error: ".mysqli_error($con));
          $str="";
          $count=0;
          while($row=mysqli_fetch_array($rs))
          {
            if($count==0)
            {
              $str.="<li data-target='#myCarousel' data-slide-to='$count' class='active'></li>";
            }
            else
            {
              $str.="<li data-target='#myCarousel' data-slide-to='$count' ></li>";
            }
            $count=$count+1;
          } 
          if($str)
            echo $str;
      ?>
</ul>


<!-- End the Code of Indicators -->

<!-- Start the Code of Left and right controls -->
                    
<a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
       <span class="carousel-control-prev-icon"></span>
</a>


<a class="carousel-control-next" href="#myCarousel" data-slide="next">
       <span class="carousel-control-next-icon"></span>
</a>

<!-- End the Code of Left and right controls -->                   
    </div>
    </div>
 
<!---------------------- Close  the code of banner ----------------------------------------->
  


 <!----- Start the code  of col-3 ( Marquee Code )------------->
 <div class="col-md-3  ">

<div id="cardMarquee" class="card" >

   <div class="card-title text-center text-capitalize" style="background:linear-gradient(rgb(0, 213, 255),rgb(0, 110, 255));">
      <h2 class="text-light" >News &nbsp; <i class="fas fa-bullhorn"></i> </h2> 
   </div>           
        
  <div class="card-body">

   <marquee id="newsMarquee" style="font-weight:bold" scrollamount="3" 
    direction="up" behaviour="slide"  onmouseover="stop();" onmouseout="start();" >
  
    <img src="./images/1.gif">
     <a href="http://www.upefa.com/upefaweb/" target="_blank"> Uttar Pradesh Education</a>
     <hr/>

   <img src="./images/1.gif">
        <a href="https://www.nationallibrary.gov.in/"  target="_blank"> National Library website </a> 
    <hr/>

   <img src="./images/1.gif">
    <a href="https://www.education.gov.in/sites/upload_files/mhrd/files/NEP_final_HINDI_0.pdf" target="_blank">
                National Education Policy 2021</a> 
   <hr/>

   <img src="./images/1.gif">
       <a href="https://www.education.gov.in/azadi/" target="_blank"> आज़ादी का अमृत महोत्सव  </a>
</marquee>

</div>
</div>
</div>

<!----- End the code  of col-3 ( Marquee Code ) ------>

</div>
<!---- end the code of row --->

</div>
<!----- End the code of Container-fluid of Carousel and Marquee  ------------->


        
     <section>

<!---------------------- Open the code of container  ----------------------------------------->
             <div class="container mt-3 " style="margin:010; padding:0;">

                <h1 style="text-align:center;"> About Us </h1>

                <!---------------------- Open the code of row  ----------------------------------------->
                 <div class="row mt-1">
                  
                <!---------------------- Open the code of col-6  ----------------------------------------->
                     <div class="col-md-6 pt-md-0 text-justify animate__animated  animate__backInLeft  ">

                        Nalanda University envisions its Library to be the central fulcrum of its master plan, both in terms of its design and bearing. 
                        The Library aims to become an apex resource center with the state-of-the-art resource (print and digital) and services. It will be
                         a constant companion in the academic journey of the entire community of the University and contribute to the quest for creating new bodies 
                         of knowledge. The University library is committed to excellence in services and supporting intellectual inquiry, research and lifelong learning 
                         needs of the University community. Its vision is to provide seamless access to information through innovative services that drive intellectual
                          exchange and foster interdisciplinary cross-campus research. It is also committed to building an intellectual center ensuring access to
                           quality resources in a variety of easily accessible formats for the overall growth of students and teachers. Nalanda University Library is
                            fully automated by KOHA integrated library management software.
                      </div>
   <!--------------------- close the code of col-6  ----------------------------------------->

                <!---------------------- Open the code of col-6  ----------------------------------------->
                           <div class="col-md-6  animate__animated animate__backInRight">
                               <img src="./images/pic.jpeg" class="img-thumbnail ">
                           </div>            
               <!--------------------- close the code of col-6  ----------------------------------------->
                           
                     </div>
      <!---------------------- close the code of row  ----------------------------------------->
              
                    </div>
<!---------------------- close the code of container  ----------------------------------------->
        
</section>

<!-------------- end the code of text  ------------------------->


<!---------------------- Open the code of time table ----------------------------------------->
<section>
  <div class="container animate__zoomIn ">
    <div class="row mt-4">

    <div class="col-md-3 animate__animated animate__zoomIn">
      <div class="card h-100 mt-2" style="box-shadow: 2px 2px 8px #c4c4c4">

           <div class="card-title text-center text-white" 
                         style="background:linear-gradient(rgb(0, 213, 255),rgb(0, 110, 255))">
              <h3> Time Table &nbsp; 
                    <i class="fas fa-calendar"></i>
              </h3> 

           </div>

            <div class="card-body  mb-0 ">

           <marquee style="font-weight:bold" scrollamount="3" direction="up" behaviour="slide"  
                            onmouseover="stop();" onmouseout="start();" >

                    <h6>Monday  <i class="fa fa-angle-double-right"></i> I.T.,Electrical</h6><hr>
                    <h6>Tuesday <i class="fa fa-angle-double-right"></i> Electronic,Civil</h6><hr>
                    <h6>Wednesday <i class="fa fa-angle-double-right"></i> P.M.T.,M.Auto</h6><hr>
                    <h6>Thursday <i class="fa fa-angle-double-right"></i> CS,PGDC</h6><hr>
                    <h6>Friday <i class="fa fa-angle-double-right"></i> Mechanical</h6>

          </marquee>
             </div>

          </div>
       </div>
<!----------------------  end the code of time table ----------------------------------------->

<!----------------------code of Card  ----------------------------------------->

<!---------------------- start the code card-1  ----------------------------------------->
<div class="col-md-3 mt-1">

	<!--------------------- Create a card ------------------------>
	<div class="card h-100  mt-2 animate__animated animate__zoomIn" style="box-shadow: 2px 2px 8px #c4c4c4">
    <br>
     <img src="./images/card/minister.jpg" alt="img-1" width="100" class="img-fluid m-auto rounded-circle mb-3 img-thumbnail">

		<div class="card-body text-center">
			  <h5>SHRI ASHISH PATEL</h5>
               <span class="text-muted" style="font-family:calibri;">
                  MINISTER, TECHNICAL EDUCATION DEPARTMENT, LUCKNOW, U.P.
               </span>
			
 <ul class="list-inline mt-3 ">
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f" style="color: #3b5998;"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter" style="color:#00acee"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram" style="color:#e95950"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin" style="color:#0077b5"></i></a></li>
   </ul>
			
	</div>
  
      </div>
   </div>


<!---------------------- End code of  the card-1  ----------------------------------------->


<!---------------------- start the code card-2  ----------------------------------------->

<div class="col-md-3 mt-1">
	<div class="card h-100 mt-2 animate__animated animate__zoomIn"  style="box-shadow: 2px 2px 8px #c4c4c4">
    <br>
         
            <img src="./images/card/ias.jpg" alt="img-2" width="100" class="img-fluid m-auto rounded-circle mb-3 img-thumbnail">
	
		<div class="card-body text-center">
			  <h5> SHRI ALOK KUMAR </h5>
               <span class="text-muted" style="font-family:calibri;">
                          SECRETARY, TECHNICAL EDUCATION DEPARTMENT, <br>U.P.
               </span>
			
 <ul class="list-inline mt-3">
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f" style="color: #3b5998;"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter" style="color:#00acee"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram" style="color:#e95950"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin" style="color:#0077b5"></i></a></li>
   </ul>
			
	</div>
      </div>
   </div>


<!---------------------- End code of  the card-2  ----------------------------------------->


<!---------------------- start the code card-3 ----------------------------------------->

<div class="col-md-3 mt-1 animate__animated animate__zoomIn">
	<!--------------------- Create a card ------------------------>
	<div class="card h-100 mt-2"style="box-shadow: 2px 2px 8px #c4c4c4">
    <br>
         
            <img src="./images/card/pri.jpg" alt="img-3" width="100" class="img-fluid m-auto rounded-circle mb-3 img-thumbnail">
	
		<div class="card-body text-center">
			  <h5>Mr. Rakesh Verma</h5>
               <span class="text-muted" style="font-family:calibri;">
                          PRINCIPAL, GOVERNMENT POLYTECHNIC LUCKNOW,<br> U.P.
               </span>
			
 <ul class="list-inline mt-3">
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-facebook-f" style="color: #3b5998;"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-twitter" style="color:#00acee"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-instagram" style="color:#e95950"></i></a></li>
      <li class="list-inline-item"><a href="#" class="social-link"><i class="fab fa-linkedin" style="color:#0077b5"></i></a></li>
   </ul>
			
	</div>
      </div>
   </div>

<!---------------------- End code of  the card-3 ----------------------------------------->

    </div>
  </div>
</section>

<!------------end the code of card------------------------------->



        <!------------ start the code of gallary ------------------------------->

<!------------------------------ End the code of image carosal -------------------------------------->
<section id="gallery">
    <div class="container-fluid mt-5 animate__zoomIn">
        <div class="row">

            <div class="col-6">
                <h3 class="mb-3">Our Gallary </h3>
            </div>

            <div class="col-6 text-right">
                <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                    <i class="fa fa-arrow-left"></i>
                </a>

                <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                    <i class="fa fa-arrow-right"></i>
                </a>
            </div>

            <div class="col-12">
                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row">

                                <div class="col-3 mb-3animate__animated animate__zoomIn">
                                    <div class="card">
                                        <img class="img-fluid"  src="images/carosal/1.jpeg" >
                                    </div>
                                </div>

                                 <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid"  src="images/carosal/2.jpeg">
                                    </div>
                                </div>

                                <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid"  src="images/carosal/3.jpeg">
                                    </div>
                                </div>
                                
                                 <div class="col-3 mb-3">
                                    <div class="card">
                                        <img class="img-fluid"  src="images/carosal/5.jpeg">
                                    </div>
                                </div>
 

                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">

                                <div class="col-3 mb-3">
                                    <div class="card">
			                          		  <img class="img-fluid"  src="images/carosal/5.jpeg">
                                    </div>
                                </div>

                               <div class="col-3 mb-3">
                                    <div class="card">
				                             	  <img class="img-fluid"  src="images/carosal/6.jpeg">
                                    </div>
                                </div>

                               <div class="col-3 mb-3">
                                    <div class="card">
					                             <img class="img-fluid"  src="images/carosal/7.jpeg">
                                    </div>
                                </div>

                                  <div class="col-3 mb-3">
                                    <div class="card">
				                             	  <img class="img-fluid"  src="images/carosal/8.jpeg">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row">

                               <div class="col-3 mb-3">
                                    <div class="card">
					                               <img class="img-fluid"  src="images/carosal/9.jpeg">
                                    </div>
                                </div>
                              <div class="col-3 mb-3">
                                    <div class="card">
					                              <img class="img-fluid"  src="images/carosal/1.jpeg">
                                    </div>
                                </div>
                                <div class="col-3 mb-3">
                                    <div class="card">
					                               <img class="img-fluid"  src="images/carosal/2.jpeg">
                                    </div>
                                </div>

                                   <div class="col-3 mb-3">
                                    <div class="card">
				                            	  <img class="img-fluid"  src="images/carosal/3.jpeg">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!----- End the code of image carosal ------------->




<!----- start the code of contact us ------------->
<section >
    <div class="container mt-3 animate__zoomIn">
        <h1> Contact-Us</h1><hr>
        <div class="row">
            

             <div class="col-md-6">
                      

                 <div class="box">
                     <h1> Our Address &nbsp;<i class="fa fa-home"></i></h1>
                          <p>Polytechnic Chauraha,<br>
                          Indira Nagar,Faizabad Road,Uttar Pradesh </p> 
                 </div>

                 <div class="box">
                      <h1>E-mail &nbsp;<i class="fa fa-fax"></i></h1>
                          Goverpl011@gmail.com<br>
                          Goverpt111@gmail.com
                 </div>
            </div>


         <div class="col-md-6 m-auto text-center">
              <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d7117.878886346024!2d80.997168!3d26.873665!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4c6cf7c6e9b5a217!2sGovernment%20Polytechnic%20Lucknow!5e0!3m2!1sen!2sus!4v1651071063623!5m2!1sen!2sus"
             width="470" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
   </iframe>
    </div>
</div>
</section>
             
<!---------------------- end  the  code of contact us -------------------------->




<div class="container-fluid mt-3 animate__zoomIn" >
<!----- start the code of Container ------------->

<!--------Start the Code of Carousel and Marquee Row ---------------->
<div class="row">


  <!--------Start the Code of Carousel Col 9---------------->
              <div class="col-md-12 m-auto p-0">
  
  <!--------Start the Code of Carousel ---------------->
        <div class="carousel slide" data-ride="carousel" id="myCarousel1" >
              
      
       <!-- Start the Code of  slideshow -->
              
       <div class="carousel-inner ">

<div class="carousel-item active ">
<div class="card  " style=" background-image:url(./images/image1.webp);  background-size:100% 100%;">
                     <div class="card-body text-white m-5 " style="text-align:center; border-radius:15px; "> 
                            <img src="./images/feedback/1.jpeg"alt="pic-1" width="100" class="img-fluid  rounded-circle mb-3 img-thumbnail shadow-sm">
                       <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                                        live the blind texts. "</p>
                              <h5>Er. Anand Shekhar Singh</h5>
                               </div>
                 </div>
        </div>

        <div class="carousel-item">
          <div class="card " style=" background-image:url(./images/image1.webp);  background-size:100% 100%;">
                     <div class="card-body text-white m-5 " style="text-align:center; border-radius:15px; "> 
                           <img src="./images/feedback/2.jpeg" alt="pic-1" width="100" class="img-fluid  rounded-circle mb-3 img-thumbnail shadow-sm" >
                             <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                                        live the blind texts. "</p>
                              <h5> Mr. Sandeep Kumar Singh</h5>
                               </div>
                 </div>
         </div> 

         

        <div class="carousel-item">
        <div class="card " style=" background-image:url(./images/image1.webp);  background-size:100% 100%;">
                       <div class="card-body text-white m-5 " style="text-align:center; border-radius:15px; "> 
                          <img src="./images/feedback/3.jpeg" alt="pic-1" width="100" class="img-fluid  rounded-circle mb-3 img-thumbnail shadow-sm">
                                 
                                 <p>"Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there
                                        live the blind texts. "</p>
                              <h5>Vaibhav Mishra </h5>
                               </div>
                 </div>
        </div>

<!-- End the Code of  slideshow -->    

  
  
   <!-- Start the Code of Left and right controls -->
        
         <a class="carousel-control-prev" href="#myCarousel1" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
         </a>
                  
         <a class="carousel-control-next" href="#myCarousel1" data-slide="next">
             <span class="carousel-control-next-icon"></span>
         </a>
  
    <!-- End the Code of Left and right controls -->
        
 
            </div>
  <!-- End the Code of  carousel Div -->
  
      </div>  
  <!-------End the Code of Carousel Col 9 ---------------->
  
  </div> 

  </div>

</div>


<!---------------------- add  the  Php file -------------------------->

<?php include("shared/pagebottom.php") ?>

<!----------------------end  the  Php file -------------------------->

<script>
     $('#threeblock').waypoint(function() 
               {
                    $('#threeblock').addClass('animate__zoomIn');
               }, 
                { 
                   offset: '100%' 
                }
             ); 
        
        $(document).ready(function(){
      $("#newsMarquee").height($("#myCarousel").height()-125);
      $(window).resize(function(){         
           $("#newsMarquee").height($("#myCarousel").height()-125);
   });
  });
  </script>
    <script lang="ja" src="js/jquery.min.js"></script>
    <script lang="ja" src="js/bootstrap.min.js"> </script>


    </body>
    </html>
