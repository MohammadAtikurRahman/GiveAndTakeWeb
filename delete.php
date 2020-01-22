    
<?php
    session_start();
    $conn = mysqli_connect('localhost', 'root', '', 'giveandtake');
    
    $id = isset($_GET["id"]) ? $_GET["id"] : false;
    if ($id === false) {
        exit("missing input");
    }
    $sql = "DELETE FROM `advertiesment` WHERE ad_id = '$id'";
    if ($conn->query($sql) === TRUE ) {
        echo "<script>window.alert('The Appoinment is deleted')</script>";
        echo "<script>window.location.assign('./index.php')</script>";
    } else {
        echo "<script>window.alert('OOPS')</script>";
        echo "<script>window.location.assign('./viewMyPost.php')</script>";
    }
    $conn->close();

?>  