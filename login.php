<?php
include_once 'database/dbConn.php';
session_start();


if (isset($_POST['login']))
{

        $email = $_POST['email'];
        $pwd = $_POST['password'];

        if (empty($email)&&empty($pwd))
        {
          $_SESSION['message'] = "Fill in all field";
          $_SESSION['msg_type'] = "danger";
         echo "<script>location.replace('login.php');</script>";
         exit();
        }
        else {



        if (!empty($email))
        {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                      if (!empty($pwd))
                      {
                              $sql = "SELECT* FROM student WHERE studEmail = '$email';";
                              $result = mysqli_query($conn,$sql);

                              $num = mysqli_num_rows($result);

                              if ($num == 1)
                              {

                                  $row = mysqli_fetch_assoc($result);
                                  if (password_verify ($pwd,$row['studPassword']))
                                  {

                                    $_SESSION['studEmail'] = $row['studEmail'];
                                    $_SESSION['studid'] = $row['studID'];
                                    $_SESSION['campus'] = $row['campusName'];

                                    echo "<script>location.replace('student/index.php');</script>";
                                    exit();
                                  }
                                  else
                                  {
                                    $_SESSION['message'] = "Password does not match";
                                    $_SESSION['msg_type'] = "danger";


                                   $_SESSION['em'] = $email;
                                   echo "<script>location.replace('login.php');</script>";
                                   exit();
                                  }

                              }
                              else
                              {
                                $_SESSION['message'] = "Student is not registered";
                                $_SESSION['msg_type'] = "danger";


                               $_SESSION['em'] = $email;
                               echo "<script>location.replace('login.php');</script>";
                               exit();
                              }
                      }
                      else
                      {
                        $_SESSION['message'] = "Password is empty";
                        $_SESSION['msg_type'] = "danger";


                       $_SESSION['em'] = $email;
                       echo "<script>location.replace('login.php');</script>";
                       exit();
                      }
                }
                else
                {
                  $_SESSION['message'] = "Email is invalid";
                  $_SESSION['msg_type'] = "danger";


                 $_SESSION['em'] = $email;
                 echo "<script>location.replace('login.php');</script>";
                 exit();
                }
        }
        else
        {
          $_SESSION['message'] = "Email field is empty";
          $_SESSION['msg_type'] = "danger";


         $_SESSION['em'] = $email;
         echo "<script>location.replace('login.php');</script>";
         exit();
        }

        }
}

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
                        <li class="nav-item ">
                          <a href="index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="nav-item">
                          <a href="register.php" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                        </li>
                        <li class="nav-item active">
                        <a href="login.php" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
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

<div class="container">
        <div class="row">
			<div class="col-md-5 mx-auto">
			<div id="first">
				<div class="myform form ">
          <br>
          <br>
          <br>
          <br>
					 <div class="logo mb-3">
						 <div class="col-md-12 text-center">
							<h3>Login</h3>
						 </div>
					</div>

                   <form action="" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Email address</label>
                              <input type="email" name="email"  class="form-control"  style="border-radius: 50px;"  placeholder="Enter email"
                                value="<?php

                                      if (!empty($_SESSION['em']))
                                      {
                                          echo $_SESSION['em'];
                                          unset($_SESSION['em']);
                                      }


                                ?>"
                              >
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password"   class="form-control" style="border-radius: 50px;"  placeholder="Enter Password">
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
                              <button name="login" type="submit" style="border-radius: 50px;" class="btn btn-primary">Login</button>
                           </div>
                            <a href="register.php">Dont have account?</a>
                      </form>
                      <br>
                      <br>
                      <br>
                      <br>
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
