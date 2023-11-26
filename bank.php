<?php
  include("datacnx.php");

    $sql = "CREATE TABLE IF NOT EXISTS bank (
        id INT(10) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
        nom VARCHAR(50) NOT NULL,
        logo VARCHAR(255) NOT NULL
        )";

        if ($cnx->query($sql) === TRUE){
          echo "bank table created successfully";
        }else{
          echo "bank table cdoes not created successfully";
        }

          if(isset($_POST['submit'])){
            $nom = isset($_POST['nom']) ? htmlspecialchars (strtolower(trim($_POST['nom']))) : '';
            $logo = isset($_POST['logo']) ? htmlspecialchars (strtolower(trim($_POST['logo']))) : '';
          

            if($nom && $logo){
              $insertsql "INSERT INTO bank(nom,logo) 
              VALUES ('$nom', '$logo')";
              mysqli_query($cnx, $insertsql);
              echo "insert valid";
            }else{
              echo "invalid insert";
            }
          }

?>









<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>

<?php
include("navbar.php");
?>


<div class="container ml-[260px]">
    <button id="cardbank" class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-700 text-gray-200  font-serif ">+ Add Bank</button>

<div class="relative ml-[40px] top-10">
    <table class="w-[900px] text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">ID</th>
                <th scope="col" class="px-6 py-3">NOM</th>
                <th scope="col" class="px-6 py-3">LOGO</th>
                <th scope="col" class="px-6 py-3"> ACTION </th>
            </tr>
        </tbody>
        <?php

            if(!$cnx){
              die("you are not connected:" . mysqli_connect_error());
            }

              $sql = "SELECT * FROM bank";

               $result = mysqli_query($cnx, $sql);
               if($result){
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>
                  <td> {$row['id']}</td>
                  <td> {$row['nom']}</td>
                  <td> {$row['logo']}</td>
                  <td>
                            <a href='{$row["id"]}' class='font-bold text-white h-8 rounded cursor-pointer px-3 bg-gray-700 shadow-md transition ease-out duration-500 border-gray-700 '>EDIT</a>
                            <a href='delet_distributeur.php?id={$row["id"]}' class='font-bold text-white h-8 rounded  cursor-pointer px-2 bg-red-700 shadow-md transition ease-out duration-500 border-red-700 '>DELET</a>
                  </td>
                  </tr>";
                }
                echo "</tbody></table>";
               }else{
                echo "Erreur lors de l'exécution de la requête : " . mysqli_error($cnx);
               }





        ?>
    
</div>

    <div class="flex flex-row gap-10 mx-auto fixed top-60 left-[700px]  z-10  justify-between p-10 items-center bg-black border border-gray-500 rounded-md max-w-screen-lg  transform scale-0  transition duration-700 ease-in-out" id="formbank">
        <form action="bank.php" method="POST" class="max-w-md mx-auto">
          <div class="flex justify-end">
          <a href="bank.php"><img class="h-[15px]" src="icons8-close-50.png" alt="" ></a>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="id" id="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">ID</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NOM</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="file" name="logo" id="logo" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="logo" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">LOGO</label>
          </div>
          <div class="flex justify-center">
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </div>
        </form>
      </div>

</div>



<script src="stylebank.js"></script>
</body>
</html>