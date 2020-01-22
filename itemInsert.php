<?php

  session_start();
  $db = mysqli_connect('localhost', 'root', '', 'giveandtake');
  // echo "atik";
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }

  $productDetails = $_POST['productDetails'];
  $contactDetails = $_POST['contactDetails'];
  $placeDetails = $_POST['placeDetails'];
  $excProduct = $_POST['excProduct'];
  $user_id = $_SESSION['user_id'];
  $advId = rand(0, 99999999);
  $time = date('y-m-d H:i:s');
  $mail = $_SESSION['user_email'];
  // $mail1=$_SESSION['user_email1'];
  // echo $time;

   $sql = "INSERT INTO `advertiesment`(`user_id`, `ad_id`, `ad_givePost`, `ad_takePost`, `ad_time`, `exchangePlace`, `contact_no`, `mail`)
   VALUES ('$user_id', '$advId', '$productDetails', '$excProduct', '$time', '$placeDetails', '$contactDetails', '$mail' )";


   if (mysqli_query($db, $sql)) {

   } else {
     echo "Error: " . $sql . "<br>" . mysqli_error($db);
   }
   $query = "SELECT * FROM `advertiesment` ORDER BY ad_time DESC ";
   $result = mysqli_query($db, $query);
   while ($row = mysqli_fetch_assoc($result)) {
      ?>
    <!DOCTYPE html>
    <html>
    <title>W3.CSS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <style media="screen">
      /* .w3-container{
        margin-left:20px;
      } */
    </style>
    <body>

    <div class="w3-container">
      <div class="w3-card-4" style="width:100%">
        <header class="w3-container w3-light-grey">
          <h3><?php echo $row['user_id'] ?></h3>
        </header>
        <div class="w3-container">
          <p>Time: <?php echo $row['ad_time'] ?></p>
          <hr>
          <img src="profile-clipart-7.png" alt="Avatar" class="w3-left w3-circle w3-margin-right" style="width:60px">
          <p> I want To exchange ::<?php  echo $row['ad_givePost'] ?></p>
          <p> I want In exchange ::<?php  echo $row['ad_takePost'] ?></p><br>

          <p> Place::<?php  echo $row['exchangePlace'] ?></p><br>

        </div>
        <button class="w3-button w3-block w3-dark-grey">Contact Number :<?php echo $row['contact_no']  ?></button>
        <br>
      </div>
    </div>
    </body>
    </html>
<?php } ?>
