<?php
   session_start();
   // $_SESSION['user'] = (isset($_GET['user']) === true) ? (int)$_GET['user'] : 0;


  $db = mysqli_connect('localhost', 'root', '', 'giveandtake');
  if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
  }
     $query = "SELECT * FROM `advertiesment` ORDER BY `advertiesment`.`ad_time` DESC"    ;


     $result = mysqli_query($db, $query);
     while ($row = mysqli_fetch_assoc($result)) {

?>




<!DOCTYPE html>
<html>

<head>
  <style>
     /* Set the size of the div element that contains the map */
    #map {
      height: 300px;  /* The height is 400 pixels */
      width: 100%;  /* The width is the width of the web page */
     }
  </style>
  <style>
  p{padding:0;margin:0;}
  body{padding:0;margin:0;}
  </style>





  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
    integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
    crossorigin="anonymous"
  />
  <title>Timeline</title>















</head>
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
      <p> Place ::<?php  echo $row['exchangePlace'] ?></p><br>
      <!-- <p> Place ::<?php  echo $row['email'] ?></p><br> -->
      <!-- <button>Message<?php  ?></button> -->







    <!-- <a href="http://localhost/giveandtake/index.html">Send Message</a> -->




    <form name="contactform" method="post" action="send_form_email.php">
<table width="450px">
<tr>
 <td valign="top">
  <label for="first_name">First Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="first_name" maxlength="50" size="30" required >
 </td>
</tr>
<tr>
 <td valign="top"">
  <label for="last_name">Last Name *</label>
 </td>
 <td valign="top">
  <input  type="text" name="last_name" maxlength="50" size="30" required>
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="email">Email Address *</label>
 </td>
 <td valign="top">
  <input  type="text" name="email" maxlength="80" size="30" value="<?php echo $row['mail'] ?>" required>
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="telephone">Telephone Number</label>
 </td>
 <td valign="top">
  <input  type="text" name="telephone" maxlength="30" size="30" required>
 </td>
</tr>
<tr>
 <td valign="top">
  <label for="comments">Message *</label>
 </td>
 <td valign="top">
  <textarea  name="comments" maxlength="1000" cols="25" rows="6"></textarea>
 </td>
</tr>
<tr>
 <td colspan="2" style="text-align:center">
  <input type="submit" value="Send The mail">
 </td>
</tr>
</table>
</form>

    <p><a href="./logout.php"  style="color: red;">logout</a></p>


    <br>
    </div>
    <button class="w3-button w3-block w3-dark-grey">Contact Number :<?php echo $row['contact_no']  ?></button>





    <br>
  </div>
</div>







<div class="container">
    <div class="form-group">
        <!-- <input type="text" name="localtion" class="form-control" id="localtion" placeholder="Please give the location you want to search"/> -->


        <!-- <p> Place ::<?php  echo $row['exchangePlace'] ?></p><br> -->
        <!-- <button onclick="getMap()" class="btn btn-outline-secondary mt-2 float-right">Search</button> -->




    </div>
</div>
<div class="mapouter">
  <div class="gmap_canvas">
    <iframe
      width="600"
      height="500"
      id="gmap_canvas"
      src="https://maps.google.com/maps?q=<?php echo $row['exchangePlace'] ?>&output=embed"
      frameborder="0"
      scrolling="no"
      marginheight="0"
      marginwidth="0"
    ></iframe
    >Google Maps Generator by
    <a href="https://www.embedgooglemap.net">embedgooglemap.net</a>
  </div>
  <style>
    .mapouter {
      position: relative;
      text-align: right;
      height: 500px;
      width: 900px;
    }
    .gmap_canvas {
      overflow: hidden;
      background: none !important;
      height: 500px;
      width: 1250px;
    }
  </style>
</div>
<script src="./map.js"></script>
<script type="text/javascript">
      // let frameID = document.querySelector('#gmap_canvas');
      // var dest = <?php echo $_SESSION['dest'] ?>
      // let newSrc = `https://maps.google.com/maps?q=${uttora}&output=embed`;
      // if(newSrc.length == 0){
      //     console.log('please Insert a location');
      // }else{
      //     frameID.src = newSrc;
      // }
      // console.log(dest);
</script>




       <input  type="text" placeholder="Comment here "name="" value="Comment">
       <button type="submit" name="button">Comment</button>








</body>
</html>






































<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

<script>

</script>

<?php } ?>
