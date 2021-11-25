<?php
include_once 'database/dbConn.php';
session_start();


 ?>

<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tshwane University of Technology</title>

       <link rel="stylesheet" href="css/bootstrap.min.css">

       <link rel="stylesheet" href="css/main.css">

       <link rel="stylesheet" href="css/responsive.css">

       <link rel="stylesheet" href="css/custom.css">

       <link rel="stylesheet" href="css/popper.min">
       <link rel="stylesheet" href="css/popper.min">
       <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <link rel="shortcut icon" href="image/fast1.ico" type="image/x-icon">
   <link rel="apple-touch-icon" href="image/fast.png">
   <style media="screen">
          body{
              background-color: white;
          }
   </style>
  </head>
  <body>



  <nav class="navbar navbar-expand-md navbar-light bg-light sticky-top">
        <div class="container-fluid" >
              <a class="navbar-brand" href="index.php"><img class=""  style="border-radius: 50px;" src="image/logo-r.png" alt=""></a>
              <p class="text-center">TUT<br>BUS BOOKING<br>SYSTEM</p>
              <button class="navbar-toggler"  type="button" data-toggle = "collapse" data-target="#navbarResponsive">

              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item  active">
                          <a href="index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>


                        </li>
                        <li class="nav-item">

                          <a href="register.php" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                        </li>
                        <li class="nav-item">

                          <a href="login.php" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
                        </li>
                    </ul>
              </div>
        </div>

  </nav>




<div id="slides" class="carousel slide" data-ride = "carousel" >
      <ul class="carousel-indicators">
            <li hidden data-target ="#slides" data-slide-to="0" class="active"></li>
            <li hidden data-target ="#slides" data-slide-to="1"></li>
            <li hidden data-target ="#slides" data-slide-to="2"></li>
            <li hidden data-target ="#slides" data-slide-to="3"></li>

      </ul>
      <div class="carousel-inner" >
          <div class="carousel-item active">
                <img src="image_covid19/dsc_5185.jpg"  style="border-radius: 50px;"alt="">

          </div>
          <div class="carousel-item ">
                <img src="image_covid19/2.jpg" style="border-radius: 50px;" alt="">
          </div>
          <div class="carousel-item">
                <img src="image_covid19/amogelang.jpg" style="border-radius: 50px;"alt="">
          </div>
          <div class="carousel-item">
                <img src="image_covid19/3.jpg" style="border-radius: 50px;" alt="">
          </div>
      </div>
</div>





<div class="container-fluid" >
  <div class="row jumbotron" style="background-color: black;border-radius: 40px 40px 0 0;font-size: 8px;">
    <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 col-xl-10" style="font-size: 8px;background-color: black; color: #878787;font-family: arial;">

        <h5 class="lead">What is COVID-19?</h5>
        <h6 class="lead">
Human Coronaviruses are common throughout the world. There are many different coronaviruses identified in animals but only a small number of these can cause disease in humans.</h6>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 col-xl-2" style="background-color: black;">
        <a href="https://sacoronavirus.co.za/"><button class="btn btn-secondary " style="border-radius: 50px;" type="button" name="button">Visit Covid19 Site</button></a>
    </div>
  </div>
</div>





<div class="container-fluid padding">
      <h6 class="text-center" style="color:rgb(1, 101, 49);">Latest News Updates</h6>
      <br>
  <div class="row text-center padding">
       <div class="col-xs-12 col-sm-6 col-md-4">
            <a class="navbar-brand" href="https://www.tut.ac.za/other/ict/mytutor/login-journey-for-student"><img style="border-radius: 50px;" src="image/D2L.png" alt=""></a>
            <h5>D2l Brightspace</h5>
            <p>Access Framework, Blackboard (Current Lms Phase-out), D2l Brightspace (New Lms Phase-in).</p>
       </div>
       <br>
       <br>
       <div class="col-xs-12 col-sm-6 col-md-4">
            <a class="navbar-brand" href="https://www.tut.ac.za/faculties/ict/notices/notice?NID=59"><img style="border-radius: 50px;" src="image/2022-ICT_applications.png" alt=""></a>
            <h5>ICT Applications - 2022</h5>
            <p>Open!
<br>
​​Hi Prospective ICT student
<br>If you are interested in studying at the Faculty of ICT.</p>
       </div>
       <br>
       <br>
       <div class=" col-sm-12 col-md-4">
            <a class="navbar-brand" href="https://www.tut.ac.za/study-at-tut/i-want-to-study/appli-info/application-form"><img  style="border-radius: 50px;" src="image/Apply-Now-2022_3-November.jpg" alt=""></a>
            <h5>2022 Online Application</h5>
            <p>Now Open Apply</p>
       </div>

  </div>
  <hr class="my-4">
</div>





<figure>
  <div class="fixed-wrap">
    <div id="fixed">

    </div>
  </div>
</figure>





<div class="container-fluid padding">
  <div class="row  text-center">
    <div class="col-12">
        <h4 style="color:rgb(1, 101, 49);">Developer</h4>
    </div>
    <hr>
    <div class="col-12" style="border-radius: 120px 20px 120px 20px;">
        <div class="card" >
            <div class="card-body">
              <h4 class="card-title">Simphiwe Mthanti</h4>
              <p class="card-text">Front end developer and Backend developer</p>
              <h4 class="card-title">Social Network</h4>


              <a href="#"><i class="fa fa-linkedin-square fa-2x" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-facebook-square fa-2x" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-whatsapp fa-2x" style="color:green" aria-hidden="true"></i></a>
              <a href="#"><i class="fa fa-youtube fa-2x" style="color:red" aria-hidden="true"></i></a>
            </div>
        </div>
    </div>
  </div>
</div>
<hr>
<h3 class="text-center">Corona Stats</h3>
 <div style="width: 100%; background-color: white; padding: 10px 0px 10px 0px; text-align: center; box-sizing: border-box;">
 <a style="display: flex; justify-content: center; flex-wrap: wrap; width:100%; text-decoration:none; text-align:center;" href="https://sacoronavirus.co.za/">
 <div class="main-corona-banner" style="display: inline-block; background-color: white; flex-grow: 2;">
 <img style="width: 294px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/main.png" alt="South African Government COVID-19 Portal" />
 </div>
 <div style="display: flex; flex-grow: 4; justify-content: center; flex-wrap: wrap;">
 <div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
   <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
     <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/tested.png" alt="South Africa COVID-19 Tested Numbers" />
   </div>
   <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
     <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/positive.png" alt="South Africa COVID-19 Positive Cases" />
   </div>
 </div>
 <div style="display: flex; flex-grow: 1; justify-content: space-around; flex-wrap: wrap;">
   <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
     <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/cured.png" alt="South Africa COVID-19 Recovered Numbers" />
   </div>
   <div class="corona-icon" style="display: inline-block; flex-grow: 0; background-color: white;">
     <img style="width: 179px !important;" src="https://embracecloud.s3.eu-west-2.amazonaws.com/deaths.png" alt="South Africa COVID-19 Death Numbers" />
   </div>
 </div>
 </div>
 </a>
 <div style="text-align: center; background-color: white;">
 <a style="font-family: arial; text-decoration: none; font-size: 11px; color: #878787;" href="https://embrace.co.za/sacoronavirus-link"></a>
 </div>
 </div>
<hr>
<footer style="background-color: black;font-size: 11px; color: #878787;font-family: arial;">
      <div class="container-fluid padding">
              <div class="row text-center">

                      <div class="col-md-4">

                          <img src="image/stay-safe-1.png" alt="">
                      </div>
                      <div class="col-md-4">

                          <p>COVID-19 Public Hotline: 0800 029 999</p>
                          <p>WhatsApp Support Line: 0600-123456</p>
                          <p>info@vaccinesupport.org.za</p>
                      </div>
                      <div class="col-md-4">
                          <a href="https://sacoronavirus.co.za/"><img src="image/logTUT.png" alt=""></a>


                      </div>



                      <div class="col-12">

                        <hr class="light">



                      </div>
              </div>
      </div>

      <div class="container-fluid padding">
                    <div class="row text-center">
                        <div class="col-md-4">
                              <h6>&copy;2021 TUT - ALL RIGHTS RESERVED</h6>
                        </div>


                        <div class="col-md-4">
                          <a href="#"><i class="fa fa-linkedin-square  fa-2x"  style="color:blue" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-whatsapp   fa-2x"  style="color:green" aria-hidden="true"></i></a>
                          <a href="#"><i class="fa fa-facebook-square  fa-2x" style="color:blue" aria-hidden="true"></i></a>

                          <a href="#"><i class="fa fa-youtube fa-2x" style="color:red" aria-hidden="true"></i></a>
                        </div>
                        <div class="col-md-4">


                            <button  style="color:black" class="btn btn-primary" data-toggle="modal"  data-target="#exampleModal">
                                  <i class="fa fa-user  fa-1.5x"  style="color:#878787" aria-hidden="true"> Coordinator Panel</i>
                            </button>
                        </div>
                    </div>
      </div>

</footer>






<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Bus coordinator Panel</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="coordinator/login.php" method="post">
                <div class="form-group">
                   <label for="exampleInputEmail1">Email address</label>
                   <input type="email" name="cemail"  class="form-control"  style="border-radius: 50px;"  placeholder="Enter email">
                </div>
                <div class="form-group">
                   <label for="exampleInputEmail1">Password</label>
                   <input type="password" name="cpassword"   class="form-control" style="border-radius: 50px;"  placeholder="Enter Password">
                </div>
                <div class="form-group">
                   <p></p>
                </div>
                <?php

                           if (isset($_SESSION['message'])): ?>
                           <div class="alert alert-<?=$_SESSION['msg_type']?>">

                             <?php
                                 echo $_SESSION['message'];
                                 unset($_SESSION['message']);
                             ?>
                         </div>
                       <?php endif ?>
                <div class="col-md-12 text-center ">
                   <button name="clogin" type="submit" style="border-radius: 50px;" class="btn btn-primary">Login</button>
                </div>

           </form>
      </div>

    </div>
  </div>
</div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
