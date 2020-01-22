<?php include('server.php');
?>


<!DOCTYPE html>

<html>
<head>
	<title>giveandtake</title>
	<link rel="stylesheet" type="text/css" href="style.css">

	<style>
	body {
					/* background-image: url("login.jpg"); */
					/* background-size: cover; */

	}

</style>

</head>
<body>

	 <div class="header">
	 	<h2>Register</h2>

	 </div>

      <!-- <form method="post" action="register.php"> -->
				  <form method="post" action="server.php">

        <?php   include('errors.php'); ?>



         <div class="input-group">
  	        <label>user_id</label>
  	         <input type="text" name="user_id" value="<?php echo $user_id ?>">
  	        </div>



         <div class="input-group">
  	     <label>name</label>
  	     <input type="text" name="name" value="<?php echo $name; ?>">
  	     </div>


  	     <div class="input-group">
  	     <label>email</label>
  	     <input type="text" name="email" value="<?php echo $email; ?>">
  	     </div>


         <div class="input-group">
  	     <label>address</label>
  	     <input type="text" name="address" value="<?php echo $address; ?>">
  	     </div>

         <div class="input-group">
  	     <label>phone_number</label>
  	     <input type="text" name="phone_number" value="<?php echo $phone_number; ?>">
  	     </div>










         <div class="input-group">
  	     <label>Password</label>
  	     <input type="password" name="$password_user1">
  	     </div>


          <div class="input-group">
  	     <label>Confirm Password</label>
  	     <input type="password" name="$password_user2">
  	     </div>

         <div class="input-group">
  	      <button type="submit" name="register" class="btn">register</button>
  	     </div>



        <p>

          Already a member? <a href="login.php">Sign In </a>

        </p>
      </form>>






</body>
</html>
