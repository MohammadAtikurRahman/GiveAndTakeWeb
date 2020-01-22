<?php include('server.php');
?>


<!DOCTYPE html>

<html>
<head>
    <title>giveandtake</title>
    <link rel="stylesheet" type="text/css" href="style.css">


    <style>
    body {
            background-image: url("login.jpg");
            background-size: cover;

    }

</style>
</head>
<body>

<div class="header">
    <h2>Login</h2>

</div>


<form method="post" action="login.php">

    <?php

    include('errors.php'); ?>


    <div class="input-group">
        <label>Email</label>
        <input type="text" name="email">
    </div>


    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>


    <div class="input-group">
        <button type="submit" name="login" class="btn">Login</button>
    </div>


    <p>

     not yet a member?<a href="register.php" style="color:#ef0505">Sign UP </a>

    </p>


</form>



</body>
</html>
