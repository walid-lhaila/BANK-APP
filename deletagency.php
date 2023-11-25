<?php
include("datacnx.php");

    if(isset($_GET["id"])){
        $id =$_GET["id"];

            $deletsql = "DELETE FROM agency WHERE id = '$id'";
            if(mysqli_query($cnx, $deletsql)){
                echo "agency deleted successfully";
            }else{
                echo "agency does not deleted successfully :" . mysqli_connect_error($cnx);
            }
    }
    header("location:agency.php");
    exit();




?>