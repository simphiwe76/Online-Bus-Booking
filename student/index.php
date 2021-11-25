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
       <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
       <link rel="shortcut icon" href="image/fast1.ico" type="image/x-icon">
   <link rel="apple-touch-icon" href="image/fast.png">
   <style media="screen">
          body{
              background-color: white;
          }
          input{
            border-radius: 50px;
          }
          select{
                border-radius: 50px;
          }
          button{
                  border-radius: 50px;
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
                        <li class="nav-item active">
                          <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                          <a href="booking.php" class="nav-link">Book Bus</a>
                        </li>
                        <li class="nav-item">
                          <a href="mybooking.php" class="nav-link">My Bookings</a>
                        </li>
                        <li class="nav-item " >
                          <a href="findCampus.php" class="nav-link">Find bus location</a>
                        </li>
                        <li class="nav-item">
                          <a href="profile.php" class="nav-link">Profile</a>
                        </li>
                        <li class="nav-item">
                          <a href="logout.php" class="nav-link">Logout</a>
                        </li>
                    </ul>
              </div>
        </div>

  </nav>





<div id="slides" class="carousel slide" data-ride = "carousel" >
      <ul class="carousel-indicators">
            <li hidden data-target ="#slides" data-slide-to="0" class="active"></li>
            <li hidden data-target ="#slides" data-slide-to="1"></li>



      </ul>
      <div class="carousel-inner">
          <div class="carousel-item active">
                <img src="image_covid19/dsc_5185.jpg"  style="border-radius: 50px;"alt="">

          </div>
          <div class="carousel-item ">
                <img src="image_covid19/2.jpg" style="border-radius: 50px;" alt="">
          </div>


      </div>
</div>













<figure>
  <div class="fixed-wrap">
    <div id="fixed">

    </div>
  </div>
</figure>



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

      <div class="container copyright">
                    <div class="row">
                        <div class="col-md-6">
                              <h6>&copy;2021 TUT - ALL RIGHTS RESERVED</h6>

                        </div>
                        <div class="col-md-2">
                          <a href="#"><i class="fa fa-linkedin-square  fa-2x"  style="color:blue" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-whatsapp   fa-2x"  style="color:green" aria-hidden="true"></i></a>
                          <a href="#"><i class="fa fa-facebook-square  fa-2x" style="color:blue" aria-hidden="true"></i></a>

                          <a href="#"><i class="fa fa-youtube fa-2x" style="color:red" aria-hidden="true"></i></a>
                        </div>
                    </div>
      </div>

</footer>

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
