<?php

include("datacnx.php");
    if(isset($_GET['id'])){
        $id = $_GET["id"];

        $deletsql = "DELETE FROM account WHERE id = '$id'";
            if(mysqli_query($cnx, $deletsql)){
                echo "account deleted successfully";
            }else{
                echo "account does not deleted successfully :" . mysqli_connection_error($cnx);
            }

    }
            header("Location:accountClient.php");
            exit();


?>