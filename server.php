<?php

header('Cache-Control: no cache'); //no cache
session_cache_limiter('private_no_expire');
session_start();


$user_id = "";
$name = "";
$email = "";
$address = "";
$phone_number = "";
$errors = array();




$db = mysqli_connect('localhost', 'root', '', 'giveandtake');

if (isset($_POST['register'])) {
    // receive all input values from the form
    $user_id = mysqli_real_escape_string($db, $_POST['user_id']);
    $name = mysqli_real_escape_string($db, $_POST['name']);
    $email = mysqli_real_escape_string($db, $_POST['email']);
    $address = mysqli_real_escape_string($db, $_POST['address']);
    $phone_number = mysqli_real_escape_string($db, $_POST['phone_number']);
    $password_user1 = mysqli_real_escape_string($db, $_POST['$password_user1']);
    $password_user2 = mysqli_real_escape_string($db, $_POST['$password_user2']);

    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    if (empty($user_id)) {
        array_push($errors, "user_id is required");
    }
    if (empty($name)) {
        array_push($errors, "name is required");
    }

    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($address)) {
        array_push($errors, "address is required");
    }
    if (empty($phone_number)) {
        array_push($errors, "phone is required");
    }

    //
    if (empty($password_user1)) {
        array_push($errors, "Password is required");
    }


    if ($password_user1 != $password_user2) {
        array_push($errors, "The two passwords do not match");
    }





      if (count($errors) == 0) {
          $password = md5($password_user1);

        //   $sql = "INSERT INTO user (user_id, name, email,address,phone_number,password_user)
        //
       	// VALUES('$user', '$name', '$email', '$address',  '$phone_number', '$password')";

        $sql = "INSERT INTO `user`(`user_id`, `name`, `email`, `address`, `phone_number`, `password_user`)
         VALUES ('$user_id','$name','$email', '$address','$phone_number', '$password')";

        echo "in one";
          // mysqli_query($db, $sql);
          if (mysqli_query($db, $sql)) {
              echo "New record created successfully";
          } else {
              echo "Error: " . $sql . "<br>" . mysqli_error($db);
          }


          $_SESSION['email'] = $email;
          $_SESSION['user_id'] = $user_id;
          $_SESSION['user_email'] = $row['email'];

          $_SESSION['success'] = "You are now logged in";
          header('location: index.php');

          echo "in";


      }


  }


  if (isset($_POST['login'])) {

    $email = mysqli_real_escape_string($db, $_POST['email']);
    $password = mysqli_real_escape_string($db, $_POST['password']);


    if (empty($email)) {
        array_push($errors, "email is required");
    }
    if (empty($password)) {
        array_push($errors, "Password is required");
    }

    if (count($errors) == 0) {

        $password = md5($password); //encription password

        $query = "SELECT * from user where email='$email' and password_user='$password' ";
        $result = mysqli_query($db, $query);

        if (mysqli_num_rows($result) == 1) {


            $_SESSION['email'] = $email;
            $_SESSION['success'] = "You are now logged in";
            header('location: index.php');


        } else {


            array_push($errors, "username/password are wrong");


        }


    }


}


//logout er jonno
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['email']);
    header('location: login.php');


}


?>
