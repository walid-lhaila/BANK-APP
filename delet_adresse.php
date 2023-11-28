<?php
    include("datacnx.php");

        if(isset($_GET['id'])){
            $id = $_GET['id'];
            
            $deletsql = "DELETE FROM adresse WHERE id = '$id'";

                if(mysqli_query($cnx, $deletsql)){
                    echo "adresse deleted successfully";
                }else{
                    echo "adresse does not delete successfully";
                }
        }
        header("location: adresse.php");
        exit();



?> 