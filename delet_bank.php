<?php
    include("datacnx.php");

        if(isset($_GET["id"])){
            $id = $_GET["id"];
      
            $deletsql = "DELETE FROM bank WHERE id ='$id'" ;
            if(mysqli_query($cnx, $deletsql)){
                echo "bank deleted successfully";
            }else{
                 
                echo "bank does not deleted successfully";
            }
      
        
        }
        header("location: bank.php");
        exit();



?>