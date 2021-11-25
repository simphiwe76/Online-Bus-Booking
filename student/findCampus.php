<?php
include_once '../database/dbConn.php';
session_start();

$studEmail =$_SESSION['studEmail'];
$studId =$_SESSION['studid'];
$studCamp =$_SESSION['campus'];



if (isset($_GET['id'])&&isset($_GET['type'])&&isset($_SESSION['studid'])&&isset($_SESSION['studEmail']))
{

            $type = $_GET['type'];


            if ($type == "cancel")
            {
                $id = $_GET['id'];

                $sql = "DELETE FROM tripbook WHERE tripID = '$id' AND studID = '$studId';";
                mysqli_query($conn,$sql);

                $_SESSION['message'] = "Trip Successfully Cancelled";
                $_SESSION['msg_type'] = "success";

                echo "<script>location.replace('mybooking.php');</script>";
                exit();
            }


}


?>
<!DOCTYPE html>
<html lang="en" >
  <head>
    <meta charset="utf-8">

   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tshwane University of Technology</title>

       <link rel="stylesheet" href="css/bootstrap.min.css">

       <link rel="stylesheet" href="css/main.css">

       <link rel="stylesheet" href="css/responsive.css">

       <link rel="stylesheet" href="css/custom.css">

       <link rel="stylesheet" href="css/popper.min">
       <link rel="stylesheet" href="css/popper.min">
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
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

              <p class="text-center">TUT<br>BUS BOOKING<br>SYSTEM</p>
              <button class="navbar-toggler"  type="button" data-toggle = "collapse" data-target="#navbarResponsive">

              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                          <a href="index.php" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item ">
                          <a href="booking.php" class="nav-link">Book Bus</a>
                        </li>
                        <li class="nav-item " >
                          <a href="mybooking.php" class="nav-link">My Bookings</a>
                        </li>
                        <li class="nav-item active" >
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
















<figure>
  <div class="fixed-wrap">
    <div id="fixed">

    </div>
  </div>
</figure>

<hr>


<section id="team" data-stellar-background-ratio="0.5">
  <div class="container">
  <div class="row ">
    <div class="col-lg-12 text-center rounded border light my-5">
      <h4>Find Bus Terminal Location</h4>
      <br>


</div>

<div class="col-lg-9">

  <?php



      if (isset($_GET['type'])&&isset($_GET['address'])&&$_GET['type'] == "map")
      {


        $address = $_GET['address'];


        if (!empty($address))
        {
          ?>

            <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo
            $address; ?>&output=embed" ></iframe>

          <?php
        }

      }
      else
      {
            echo "<h3 class='text-center'>No location was selected</h3>";
      }




  ?>



</div>

<div class="col-lg-3">
  <div class="border bg-light rounded p-4">
    <?php

      if (isset($_GET['type'])&&isset($_GET['address'])&&$_GET['type'] == "map")
      {
          echo "<h5 class='text-center'>Address to Campus</h5>";
          echo "<p class='text-center'>$address</p>";
      }
      else
      {
        echo "<p class='text-center'>No Address</p>";
      }

    ?>


  </div>

</div>
  </div>
</div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<hr>

<script>
$(document).ready(function(){
    $('.search').on('keyup',function(){
        var searchTerm = $(this).val().toLowerCase();
        $('#userTbl tbody tr').each(function(){
            var lineStr = $(this).text().toLowerCase();
            if(lineStr.indexOf(searchTerm) === -1){
                $(this).hide();
            }else{
                $(this).show();
            }
        });
    });
});
</script>

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
