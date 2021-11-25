<?php
include_once 'database/dbConn.php';
session_start();

  if (isset($_POST['register']))
  {
          $name  = mysqli_real_escape_string($conn,ucwords($_POST['name']));
          $surname  = mysqli_real_escape_string($conn,ucwords($_POST['surname']));
          $studNo  = mysqli_real_escape_string($conn,$_POST['studNo']);
          $email = mysqli_real_escape_string($conn,$_POST['email']);
          $aEmail = mysqli_real_escape_string($conn,$_POST['aEmail']);
          $gender = mysqli_real_escape_string($conn,$_POST['gender']);
          $campus  = mysqli_real_escape_string($conn,$_POST['cmpus']);
          $faculty = mysqli_real_escape_string($conn,$_POST['faculty']);
          $password = mysqli_real_escape_string($conn,$_POST['password']);
          $cPassword = mysqli_real_escape_string($conn,$_POST['cPassword']);




          if (empty($name)&&empty($surname)&&empty($studNo)&&empty($email)&&empty($gender)&&empty($campus)&&empty($faculty)&&empty($password)&&empty($cPassword))
          {
            $_SESSION['message'] = "Fill in all fields";
            $_SESSION['msg_type'] = "danger";

           echo "<script>location.replace('register.php');</script>";
           exit();
          }
          else
          {



          if (!empty($name))
          {
                if (preg_match("/^[a-zA-Z\s]+$/",$name))
                {
                        if (!empty($surname))
                        {
                                if (preg_match("/^[a-zA-Z]+$/",$surname))
                                {
                                      if (!empty($studNo))
                                      {
                                            if (preg_match("/^[0-9]+$/",$studNo))
                                            {
                                                    if (substr($studNo,0,1) == "2")
                                                    {
                                                            $year = "20".substr($studNo,1,2);

                                                            $y = date("Y") ;

                                                            if (strlen($studNo) == 9)
                                                            {
                                                                      if ($year <= $y)
                                                                      {
                                                                              if (!empty($gender))
                                                                              {
                                                                                          if (!empty($campus))
                                                                                          {
                                                                                                    if (!empty($faculty))
                                                                                                    {

                                                                                                            if (empty($aEmail))
                                                                                                            {
                                                                                                                $found = true;
                                                                                                            }
                                                                                                            elseif (!empty($aEmail)&&filter_var($aEmail, FILTER_VALIDATE_EMAIL))
                                                                                                            {
                                                                                                                $found = true;
                                                                                                            }

                                                                                                            if ($found)
                                                                                                            {
                                                                                                              if (!empty($password)&&!empty($cPassword))
                                                                                                              {
                                                                                                                if ($password == $cPassword)
                                                                                                                  {
                                                                                                                            $sql = "SELECT* FROM student WHERE studNo = '$studNo'";
                                                                                                                            $result = mysqli_query($conn,$sql);
                                                                                                                            $num = mysqli_num_rows($result);

                                                                                                                            if ($num>0)
                                                                                                                            {
                                                                                                                              $_SESSION['message'] = "Student Number Already have account";
                                                                                                                              $_SESSION['msg_type'] = "danger";

                                                                                                                             $_SESSION['n'] = $name;
                                                                                                                             $_SESSION['sur'] = $surname;
                                                                                                                             $_SESSION['studnum'] = $studNo;
                                                                                                                             $_SESSION['em'] = $email;
                                                                                                                             $_SESSION['gender'] = $gender;
                                                                                                                             $_SESSION['camp'] =   $campus;
                                                                                                                             $_SESSION['fal'] = $faculty;

                                                                                                                             echo "<script>location.replace('register.php');</script>";
                                                                                                                             exit();
                                                                                                                            }
                                                                                                                            else
                                                                                                                            {

                                                                                                                                    $newPwd = password_hash($cPassword, PASSWORD_DEFAULT);

                                                                                                                                    if (!empty($aEmail))
                                                                                                                                    {
                                                                                                                                      $sql = "INSERT INTO student(studName, studSurname, studNo, studEmail, studGender, studPassword, campusName, facultyName,studAltE)
                                                                                                                                              VALUES('$name', '$surname', '$studNo', '$email', '$gender', '$newPwd', '$campus', '$faculty','$aEmail')";
                                                                                                                                    }
                                                                                                                                    else
                                                                                                                                    {
                                                                                                                                      $n = "no email";
                                                                                                                                      $sql = "INSERT INTO student(studName, studSurname, studNo, studEmail, studGender, studPassword, campusName, facultyName,studAltE)
                                                                                                                                              VALUES('$name', '$surname', '$studNo', '$email', '$gender', '$newPwd', '$campus', '$faculty','$n')";
                                                                                                                                    }


                                                                                                                                    mysqli_query($conn,$sql);


                                                                                                                                    //Email



                                                                                                                                          // Recipient
                                                                                                                                          $to = 'simphiwemthanti76@gmail.com';

                                                                                                                                          // Sender
                                                                                                                                          $from = "216599390@tut4life.ac.za";
                                                                                                                                          $fromName = 'TUT Bus Booking';

                                                                                                                                          // Email subject
                                                                                                                                          $subject = 'This Confirm That You have Successfully Book';

                                                                                                                                          // Attachment file
                                                                                                                                          $file = "image/logo-r.png";

                                                                                                                                          // Email body content
                                                                                                                                          $htmlContent = '
                                                                                                                                              <h4>PHP Email with Attachment by CodexWorld</h4>
                                                                                                                                              <p>This Confirm that student no $studNo has Successfully make Booking</p>
                                                                                                                                          ';

                                                                                                                                          // Header for sender info
                                                                                                                                          $headers = "From: $fromName"." <".$from.">";

                                                                                                                                          // Boundary
                                                                                                                                          $semi_rand = md5(time());
                                                                                                                                          $mime_boundary = "==Multipart_Boundary_x{$semi_rand}x";

                                                                                                                                          // Headers for attachment
                                                                                                                                          $headers .= "\nMIME-Version: 1.0\n" . "Content-Type: multipart/mixed;\n" . " boundary=\"{$mime_boundary}\"";

                                                                                                                                          // Multipart boundary
                                                                                                                                          $message = "--{$mime_boundary}\n" . "Content-Type: text/html; charset=\"UTF-8\"\n" .
                                                                                                                                          "Content-Transfer-Encoding: 7bit\n\n" . $htmlContent . "\n\n";

                                                                                                                                          // Preparing attachment
                                                                                                                                          if(!empty($file) > 0){
                                                                                                                                              if(is_file($file)){
                                                                                                                                                  $message .= "--{$mime_boundary}\n";
                                                                                                                                                  $fp =    @fopen($file,"rb");
                                                                                                                                                  $data =  @fread($fp,filesize($file));

                                                                                                                                                  @fclose($fp);
                                                                                                                                                  $data = chunk_split(base64_encode($data));
                                                                                                                                                  $message .= "Content-Type: application/octet-stream; name=\"".basename($file)."\"\n" .
                                                                                                                                                  "Content-Description: ".basename($file)."\n" .
                                                                                                                                                  "Content-Disposition: attachment;\n" . " filename=\"".basename($file)."\"; size=".filesize($file).";\n" .
                                                                                                                                                  "Content-Transfer-Encoding: base64\n\n" . $data . "\n\n";
                                                                                                                                              }
                                                                                                                                          }
                                                                                                                                          $message .= "--{$mime_boundary}--";
                                                                                                                                          $returnpath = "-f" . $from;

                                                                                                                                          // Send email
                                                                                                                                          $mail = @mail($to, $subject, $message, $headers, $returnpath);



                                                                                                                                    echo '<script>alert("Student Successfully registered")</script>';
                                                                                                                                    echo "<script>location.replace('login.php');</script>";


                                                                                                                            }

                                                                                                                  }
                                                                                                                  else
                                                                                                                  {
                                                                                                                    $_SESSION['message'] = "Password does not match";
                                                                                                                    $_SESSION['msg_type'] = "danger";

                                                                                                                   $_SESSION['n'] = $name;
                                                                                                                   $_SESSION['sur'] = $surname;
                                                                                                                   $_SESSION['studnum'] = $studNo;
                                                                                                                   $_SESSION['em'] = $email;
                                                                                                                   $_SESSION['gender'] = $gender;
                                                                                                                   $_SESSION['camp'] =   $campus;
                                                                                                                   $_SESSION['fal'] = $faculty;

                                                                                                                   echo "<script>location.replace('register.php');</script>";
                                                                                                                   exit();
                                                                                                                  }
                                                                                                              }
                                                                                                              else
                                                                                                              {
                                                                                                                $_SESSION['message'] = "Password is empty";
                                                                                                                $_SESSION['msg_type'] = "danger";

                                                                                                               $_SESSION['n'] = $name;
                                                                                                               $_SESSION['sur'] = $surname;
                                                                                                               $_SESSION['studnum'] = $studNo;
                                                                                                               $_SESSION['em'] = $email;
                                                                                                               $_SESSION['gender'] = $gender;
                                                                                                               $_SESSION['camp'] =   $campus;
                                                                                                               $_SESSION['fal'] = $faculty;

                                                                                                               echo "<script>location.replace('register.php');</script>";
                                                                                                               exit();
                                                                                                              }
                                                                                                            }
                                                                                                            else
                                                                                                            {
                                                                                                              $_SESSION['message'] = "Email Altenative not valid";
                                                                                                              $_SESSION['msg_type'] = "danger";

                                                                                                             $_SESSION['n'] = $name;
                                                                                                             $_SESSION['sur'] = $surname;
                                                                                                             $_SESSION['studnum'] = $studNo;
                                                                                                             $_SESSION['em'] = $email;
                                                                                                             $_SESSION['gender'] = $gender;
                                                                                                             $_SESSION['camp'] =   $campus;
                                                                                                             $_SESSION['fal'] = $faculty;

                                                                                                             echo "<script>location.replace('register.php');</script>";
                                                                                                             exit();
                                                                                                            }





                                                                                                    }
                                                                                                    else
                                                                                                    {
                                                                                                      $_SESSION['message'] = "Select Faculty";
                                                                                                      $_SESSION['msg_type'] = "danger";

                                                                                                     $_SESSION['n'] = $name;
                                                                                                     $_SESSION['sur'] = $surname;
                                                                                                     $_SESSION['studnum'] = $studNo;
                                                                                                     $_SESSION['em'] = $email;
                                                                                                     $_SESSION['gender'] = $gender;
                                                                                                     $_SESSION['camp'] =   $campus;
                                                                                                     $_SESSION['fal'] = $faculty;

                                                                                                     echo "<script>location.replace('register.php');</script>";
                                                                                                     exit();
                                                                                                    }
                                                                                          }
                                                                                          else
                                                                                          {
                                                                                            $_SESSION['message'] = "Select Campus";
                                                                                            $_SESSION['msg_type'] = "danger";

                                                                                           $_SESSION['n'] = $name;
                                                                                           $_SESSION['sur'] = $surname;
                                                                                           $_SESSION['studnum'] = $studNo;
                                                                                           $_SESSION['em'] = $email;
                                                                                           $_SESSION['gender'] = $gender;
                                                                                           $_SESSION['camp'] =   $campus;
                                                                                           $_SESSION['fal'] = $faculty;

                                                                                           echo "<script>location.replace('register.php');</script>";
                                                                                           exit();
                                                                                          }
                                                                              }
                                                                              else
                                                                              {
                                                                                $_SESSION['message'] = "Select Gender";
                                                                                $_SESSION['msg_type'] = "danger";

                                                                               $_SESSION['n'] = $name;
                                                                               $_SESSION['sur'] = $surname;
                                                                               $_SESSION['studnum'] = $studNo;
                                                                               $_SESSION['em'] = $email;
                                                                               $_SESSION['gender'] = $gender;
                                                                               $_SESSION['camp'] =   $campus;
                                                                               $_SESSION['fal'] = $faculty;

                                                                               echo "<script>location.replace('register.php');</script>";
                                                                               exit();
                                                                              }
                                                                      }
                                                                      else
                                                                      {
                                                                        $_SESSION['message'] = "Student number  must less 2022 ";
                                                                        $_SESSION['msg_type'] = "danger";

                                                                       $_SESSION['n'] = $name;
                                                                       $_SESSION['sur'] = $surname;
                                                                       $_SESSION['studnum'] = $studNo;
                                                                       $_SESSION['em'] = $email;
                                                                       $_SESSION['gender'] = $gender;
                                                                       $_SESSION['camp'] =   $campus;
                                                                       $_SESSION['fal'] = $faculty;

                                                                       echo "<script>location.replace('register.php');</script>";
                                                                       exit();
                                                                      }
                                                            }
                                                            else
                                                            {
                                                              $_SESSION['message'] = "Student number  must 9 numbers only(216599390)";
                                                              $_SESSION['msg_type'] = "danger";

                                                             $_SESSION['n'] = $name;
                                                             $_SESSION['sur'] = $surname;
                                                             $_SESSION['studnum'] = $studNo;
                                                             $_SESSION['em'] = $email;
                                                             $_SESSION['gender'] = $gender;
                                                             $_SESSION['camp'] =   $campus;
                                                             $_SESSION['fal'] = $faculty;

                                                             echo "<script>location.replace('register.php');</script>";
                                                             exit();
                                                            }



                                                    }
                                                    else
                                                    {
                                                      $_SESSION['message'] = "Student number must begin with 2";
                                                      $_SESSION['msg_type'] = "danger";

                                                     $_SESSION['n'] = $name;
                                                     $_SESSION['sur'] = $surname;
                                                     $_SESSION['studnum'] = $studNo;
                                                     $_SESSION['em'] = $email;
                                                     $_SESSION['gender'] = $gender;
                                                     $_SESSION['camp'] =   $campus;
                                                     $_SESSION['fal'] = $faculty;

                                                     echo "<script>location.replace('register.php');</script>";
                                                     exit();
                                                    }

                                            }
                                            else
                                            {
                                              $_SESSION['message'] = "Student number field must be numbers only";
                                              $_SESSION['msg_type'] = "danger";

                                             $_SESSION['n'] = $name;
                                             $_SESSION['sur'] = $surname;
                                             $_SESSION['studnum'] = $studNo;
                                             $_SESSION['em'] = $email;
                                             $_SESSION['gender'] = $gender;
                                             $_SESSION['camp'] =   $campus;
                                             $_SESSION['fal'] = $faculty;

                                             echo "<script>location.replace('register.php');</script>";
                                             exit();
                                            }
                                      }
                                      else
                                      {
                                        $_SESSION['message'] = "Student number field is empty";
                                        $_SESSION['msg_type'] = "danger";

                                       $_SESSION['n'] = $name;
                                       $_SESSION['sur'] = $surname;
                                       $_SESSION['studnum'] = $studNo;
                                       $_SESSION['em'] = $email;
                                       $_SESSION['gender'] = $gender;
                                       $_SESSION['camp'] =   $campus;
                                       $_SESSION['fal'] = $faculty;

                                       echo "<script>location.replace('register.php');</script>";
                                       exit();
                                      }
                                }
                                else
                                {
                                    $_SESSION['message'] = "Surname field must be characters";
                                    $_SESSION['msg_type'] = "danger";

                                   $_SESSION['n'] = $name;
                                   $_SESSION['sur'] = $surname;
                                   $_SESSION['studnum'] = $studNo;
                                   $_SESSION['em'] = $email;
                                   $_SESSION['gender'] = $gender;
                                   $_SESSION['camp'] =   $campus;
                                   $_SESSION['fal'] = $faculty;

                                   echo "<script>location.replace('register.php');</script>";
                                   exit();
                                }
                        }
                        else
                        {
                          $_SESSION['message'] = "Surname field is empty";
                          $_SESSION['msg_type'] = "danger";

                           $_SESSION['n'] = $name;
                           $_SESSION['sur'] = $surname;
                           $_SESSION['studnum'] = $studNo;
                           $_SESSION['em'] = $email;
                           $_SESSION['gender'] = $gender;
                           $_SESSION['camp'] =   $campus;
                           $_SESSION['fal'] = $faculty;

                           echo "<script>location.replace('register.php');</script>";
                           exit();
                        }
                }
                else
                {
                      $_SESSION['message'] = "Name field must be characters";
                      $_SESSION['msg_type'] = "danger";

                       $_SESSION['n'] = $name;
                       $_SESSION['sur'] = $surname;
                       $_SESSION['studnum'] = $studNo;
                       $_SESSION['em'] = $email;
                       $_SESSION['gender'] = $gender;
                       $_SESSION['camp'] =   $campus;
                       $_SESSION['fal'] = $faculty;

                 echo "<script>location.replace('register.php');</script>";
                 exit();
                }
          }
          else
          {
            $_SESSION['message'] = "Name field is empty";
            $_SESSION['msg_type'] = "danger";

           $_SESSION['n'] = $name;
           $_SESSION['sur'] = $surname;
           $_SESSION['studnum'] = $studNo;
           $_SESSION['em'] = $email;
           $_SESSION['gender'] = $gender;
           $_SESSION['camp'] =   $campus;
           $_SESSION['fal'] = $faculty;

           echo "<script>location.replace('register.php');</script>";
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
              <button class="navbar-toggler" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"  type="button" data-toggle = "collapse" data-target="#navbarResponsive">

              <span class="navbar-toggler-icon"></span>

              </button>
              <div class="collapse navbar-collapse " id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item ">
                        <a href="index.php" class="nav-link"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
                        </li>
                        <li class="nav-item active">
                            <a href="register.php" class="nav-link"><i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
                        </li>
                        <li class="nav-item">
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
							<h3>Create Account</h3>
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
					</div>

                   <form action="register.php" method="post">
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Name*</label>
                              <input type="text" name="name" style="border-radius: 50px;"  class="form-control"   placeholder="Name"

                                    value="<?php

                                    if (!empty($_SESSION['n']))
                                    {
                                        echo $_SESSION['n'];
                                        unset($_SESSION['n']);
                                    }



                              ?>"

                              >
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Surname*</label>
                              <input type="text" name="surname" style="border-radius: 50px;"  class="form-control"   placeholder="Surname"

                              value="<?php

                              if (!empty($_SESSION['sur']))
                              {
                                  echo $_SESSION['sur'];
                                  unset($_SESSION['sur']);
                              }



                              ?>"


                              >
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Number*</label>
                              <input type="text"  id ="studnum" onchange="validate()" name="studNo" style="border-radius: 50px;" class="form-control"  placeholder="Student Number"

                              value="<?php

                              if (!empty($_SESSION['studnum']))
                              {
                                  echo $_SESSION['studnum'];
                                  unset($_SESSION['studnum']);
                              }



                              ?>"


                              >
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Student Email*</label>
                              <input type="email" id="e"  name="email" style="border-radius: 50px;" class="form-control"   placeholder="Student Email"

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
                              <label for="exampleInputEmail1">Student Altenative Email</label>
                              <input type="email"   name="aEmail" style="border-radius: 50px;" class="form-control"   placeholder="Altenative Email"

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
                              <label for="exampleInputEmail1">Student Gender*</label>
                                <select class="form-control select"  data-mdb-filter="true" style="border-radius: 50px;"  name="gender">
                                    <option  value=""></option>
                                    <option value="Female">Female</option>
                                    <option value="Male">Male</option>
                                </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Campus Name*</label>
                                <select class="form-control select"  data-mdb-filter="true" style="border-radius: 50px;"  name="cmpus">
                                    <option  value=""></option>
                                    <option value="Arcadia Campus">Arcadia Campus</option>
                                    <option value="Pretoria Campus">Pretoria Campus</option>
                                    <option value="Soshanguve North Campus">Soshanguve North Campus</option>
                                    <option value="Soshanguve South Campus">Soshanguve South Campus</option>
                                </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Faculty Name*</label>

                                <select class="form-control"   style="border-radius: 50px;"  name="faculty">
                                    <option  value=""></option>
                                    <option value="Faculty of Arts and Design">Faculty of Arts and Design</option>
                                    <option value="Faculty of Science">Faculty of Science</option>
                                    <option value="Faculty of Engineering and the Built Environment">Faculty of Engineering and the Built Environment</option>
                                    <option value="Faculty of Information and Communication Technology">Faculty of Information and Communication Technology</option>
                                    <option value="Faculty of Humanities">Faculty of Humanities</option>
                                    <option value="Faculty of Economics and Finance">Faculty of Economics and Finance</option>
                                    <option value="Faculty of Management Sciences">Faculty of Management Sciences</option>
                                </select>
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Password</label>
                              <input type="password" name="password" style="border-radius: 50px;"   class="form-control"  placeholder="Password" >
                           </div>
                           <div class="form-group">
                              <label for="exampleInputEmail1">Corfirm Passsword</label>
                              <input type="password" name="cPassword"  style="border-radius: 50px;"  class="form-control"  placeholder="Corfirm Passsword" >
                           </div>
                           <div class="form-group">
                              <p></p>
                           </div>

                           <div class="col-md-12 text-center ">
                              <button name="register" onclick="email()" type="submit" style="border-radius: 50px;" class="btn btn-info">Register</button>
                           </div>

                           <a href="login.php">Already have account?</a>

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

      <script type="text/javascript">
                  function validate() {

                          var stud = document.getElementById('studnum').value;
                          if (stud != "")
                          {
                                document.getElementById('e').value = stud+"@tut4life.ac.za";
                          }
                          else
                          {
                            document.getElementById('e').value = "";
                          }



                  }
      </script>


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
