<?php
include_once '../database/dbConn.php';
session_start();


if (isset($_POST['clogin']))
{

        $email = $_POST['cemail'];
        $pwd = $_POST['cpassword'];


        if (!empty($email))
        {
                if (filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                      if (!empty($pwd))
                      {
                              $sql = "SELECT* FROM buscoordinator WHERE codEmail = '$email'";
                              $result = mysqli_query($conn,$sql);

                              $num = mysqli_num_rows($result);

                              if ($num == 1)
                              {

                                  $row = mysqli_fetch_assoc($result);
                                  if ($pwd == $row['codPassword'])
                                  {

                                    $_SESSION['cooEmail'] = $row['codEmail'];
                                    $_SESSION['cooid'] = $row['codID'];


                                    echo "<script>location.replace('index.php');</script>";
                                    exit();
                                  }
                                  else
                                  {
                                    $_SESSION['message'] = "Password does not match";
                                    $_SESSION['msg_type'] = "danger";
                                   echo "<script>location.replace('../index.php');</script>";
                                   exit();
                                  }

                              }
                              else
                              {
                                $_SESSION['message'] = "Coordinator is not registered";
                                $_SESSION['msg_type'] = "danger";



                               echo "<script>location.replace('../index.php');</script>";
                               exit();
                              }
                      }
                      else
                      {
                        $_SESSION['message'] = "Password is empty";
                        $_SESSION['msg_type'] = "danger";



                       echo "<script>location.replace('../index.php');</script>";
                       exit();
                      }
                }
                else
                {
                  $_SESSION['message'] = "Email is invalid";
                  $_SESSION['msg_type'] = "danger";



                 echo "<script>location.replace('../index.php');</script>";
                 exit();
                }
        }
        else
        {
          $_SESSION['message'] = "Email field is empty";
          $_SESSION['msg_type'] = "danger";


         echo "<script>location.replace('../index.php');</script>";
         exit();
        }

}

 ?>
