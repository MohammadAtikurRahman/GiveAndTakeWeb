<?php
  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'giveandtake');
  // echo "atik";
  $user_id = $_SESSION['user_id'];
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);



  }










     // $query = "SELECT * FROM `advertiesment` where user_id= '$user_id'";
      $query=  "SELECT * FROM `advertiesment` where user_id= '$user_id'";





     $result = mysqli_query($db, $query);








     while ($row = mysqli_fetch_assoc($result)) {


     //   if (isset($_POST["submit2"])) {

     //      echo "entering the if else";
     //      $queryDelete = "delete from advertiesment where user_id = '$user_id' ";                        // delete er kaj korsi designation er kaj eita
     //      mysqli_query($db, $queryDelete);

     // }



?>
<!DOCTYPE html>
<html>
<title>W3.CSS</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<body>

<div class="w3-container">
  <div class="w3-card-4" style="width:100%">
    <header class="w3-container" >
      <h3><?php echo $row['user_id'] ?></h3>
    </header>
    <div class="w3-container">
      <p>Time: <?php echo $row['ad_time'] ?></p>
      <hr>
      <img src="profile-clipart-7.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
      <p> I want To exchange ::<?php  echo $row['ad_givePost'] ?></p>
      <p> I want In exchange ::<?php  echo $row['ad_takePost'] ?></p><br>
    </div>
    <button class="w3-button w3-block w3-dark-grey">Contact Number :<?php echo $row['contact_no']  ?></button>

   <!-- <input type="input" name="Search" placeholder="Search by loaction" value=""> -->
    <a href="http://localhost/giveandtake/delete.php?id=<?php echo $row['ad_id']  ?>">Delete</a>
     <!-- <button type="submit" name="submit2">Edit</button> -->
   <br>
   <br>


    <br>
  </div>
</div>
</body>
</html>







<?php } ?>
