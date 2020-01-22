<?php include('server.php');
  // session_start();

  if(empty($_SESSION['email'])){

           header('location:login.php');

  }


?>

<?php
  if($_SESSION['email'] == ''){
    echo "<script>window.alert('please Sign up')</script>";
    echo "<script>window.location.assign('./login.php');</script>";
  }
?>

<?php

if(isset($_POST["submit10"]))
{
    header('location:timeline.php');
}




?>
<!DOCTYPE html>

<html>
<head>
    <title>giveandtake</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style media="screen">
      a{
        text-decoration: none;
      }
    </style>
</head>
<body>




<div class="header" style="width:40%;">
    <h2>Profile</h2>
</div>
<div class="content" style="width:40%;">
    <?php if (isset($_SESSION['success'])): ?>

        <div class="error success">
            <h3>
                <?php

                echo $_SESSION['success'];
                unset($_SESSION['success']);
                ?>
            </h3>
        </div>
    <?php endif ?>
    <br>
     <img src="https://cdn.iconscout.com/icon/free/png-256/avatar-372-456324.png" width="100px" height="100px" style="margin-left:3%">
     <br>

    <p>Name: <strong><?php echo $_SESSION['email']; ?></strong></p>


    <!-- user name ja liksi seitar kaj korsi ami -->


    <?php


    if (isset($_SESSION["email"])):


        $email = $_SESSION["email"];


        $query = "SELECT user_id,name,email,address,phone_number,password_user from user where email = '$email' ";

        $result = mysqli_query($db, $query);

        $resultcheck = mysqli_num_rows($result);


        if ($resultcheck > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "User Id: ";
                echo $row['user_id'] . "<br>";

                echo "Name: ";
                echo $row['name'] . "<br>";

                echo "Email: ";
                echo $row['email'] . "<br>";

                echo "Address: ";
                echo $row['address'] . "<br>";

                echo "Phone: ";
                echo $row['phone_number'] . "<br>";

                $_SESSION['user_email'] = $row['email'];

                $_SESSION['user_id'] = $row['user_id'];


            }






        }

        ?>








       <form method="post" action ="./itemInsert.php" style="border:none;"margin-left:3%";padding:0px;">







           GIVE<input type="text" name="productDetails" value="" required><br>
           WANT<input type="text" name="excProduct" value="" required><br>
           CONTACT<input type="text" name="contactDetails" value="" required><br>
           PLACE<input type="text" name="placeDetails" value="" required><br>
           <!-- Email<input type="text" name="placeDetails" value="" required><br> -->










              <br>
             <button type="submit" name="button">Post</button>



       </form>


                    <input type="input" name="search" id="search" placeholder="Search by loaction" value="">
                   <button type="submit" name="button" id="searchbtn">Search</button>
                   <br>
                   <br>


       <!-- <form method="post"  action ="./itemInsert.php"  style="border:none;margin:0px;padding:0px;">
       <input type="submit" name="submit10" value="View">
       </form> -->


           <table style="width:100%;">
            <thead>
                <tr>
                    <th>Owner</th>
                    <th>Give</th>
                    <th>Take</th>
                    <th>PLACE</th>
                    <th>contactDetails</th>
                    <th>mail</th>
                </tr>
            </thead>
            <tbody id="tablebody">
                <?php
                try{
                    // $conn=new PDO("mysql:host=localhost;dbname=giveandtake",'root','');
                    //
                    // $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }
                catch(PDOException $ex){
                    echo "<script>window.alert('db connection errror')</script>";
                }

                // $sqlquery="Select * from advertiesment";
                try{
                    // $object=$conn->query($sqlquery);
                    // $table=$object->fetchAll();
                    //
                    // foreach($table as $row){
                        ?>
                            <tr>
                                <!-- <td><?php echo $row[2] ?></td>
                                <td><?php echo $row[3] ?></td>
                                <td><?php echo $row[5] ?></td>
                                <td><?php echo $row[6] ?></td>
                                <td><?php echo $row[7] ?></td> -->
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        <?php
                    // }

                }
                catch(PDOException $e){
                    echo "<script>window.alert('query errror')</script>";
                }
                ?>
            </tbody>
        </table>

        <script>
            var searchdata=document.getElementById('search');

            var searchbtn=document.getElementById('searchbtn');
            searchbtn.addEventListener('click',ajaxfn);

            function ajaxfn(){
              console.log(searchdata.value);
                var ajaxreq=new XMLHttpRequest();
                ajaxreq.open('GET','search.php?search='+searchdata.value);

                ajaxreq.onreadystatechange=function (){

                    if(this.readyState===XMLHttpRequest.DONE && this.status==200){
                        var tablebody=document.getElementById('tablebody');
                        tablebody.innerHTML=ajaxreq.responseText;
                    }
                };

                ajaxreq.send();

            }
        </script>
        <a href="http://localhost/giveandtake/viewPost.php">View All The Post</a>
        <br>
        <a href="http://localhost/giveandtake/viewMyPost.php">View my post</a>

        <style>
            .button {
                background-color: #4CAF50;
                border: none;
                color: white;
                padding: 15px 32px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                cursor: pointer;
            }
        </style>



        <p><a href="./logout.php"  style="color: red;">logout</a></p>

    <?php endif ?>


</div>


<?php include 'footer.php';
?>



</body>
</html>
