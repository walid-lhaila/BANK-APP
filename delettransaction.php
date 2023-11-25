<?php
    include("datacnx.php");

        if(isset($_GET["id"])){
            $id = $_GET["id"];
        
        $deletsql = "DELETE FROM transactions WHERE id = '$id'";
           if(mysqli_query($cnx, $deletsql)){
            echo "transactions deleted successfully";
           }else{
            echo "transactions does not deleted successfully :" .mysqli_error($cnx);
           }

        }
           header("location:transactionClient.php");
           exit();



?>