<?php
include("datacnx.php");

    if(isset($_GET["id"])){
        $id = $_GET["id"];

        $deletsql = "DELETE FROM distributeur WHERE id = '$id'";

            if(mysqli_query($cnx, $deletsql)){
                echo " distributeur deleted successfully";
            }else{
                echo "distributeur does not deleted successfully :" . mysqli_connect_error($cnx);
            }

    }

        header("location:distributeurs.php");
        exit();




?>