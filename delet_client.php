<?php
    include("datacnx.php");

        if (isset($_GET['id'])){
            $id = $_GET['id'];

            $deletsql = "DELETE FROM clients WHERE id = '$id'";

            if(mysqli_query($cnx, $deletsql)){
                echo "client deleted successfully";
            }else{
                echo "client does not delete successfully :" . mysqli_error($cnx);
            }
        }

        header("Location: client.php");
        exit();


?>