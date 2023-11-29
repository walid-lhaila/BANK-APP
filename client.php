<?php
        include("datacnx.php");


  //create table

          $sql = "CREATE TABLE IF NOT EXISTS clients(
            id INT(20) UNSIGNED AUTO_INCREMENT NOT NULL PRIMARY KEY,
            nom VARCHAR(30) NOT NULL,
            prenom VARCHAR(30) NOT NULL,
            naissance VARCHAR(30) NOT NULL,
            nationalite VARCHAR(30) NOT NULL,
            genre VARCHAR(30) NOT NULL,
            phone VARCHAR(30) NOT NULL,
            username VARCHAR(30) NOT NULL,
            pass VARCHAR(30) NULL,
            agency_id INT(30) UNSIGNED NOT NULL,

            FOREIGN KEY (agency_id) REFERENCES agency(id)
            ON DELETE CASCADE 
            ON UPDATE CASCADE
            )";

            if ($cnx->query($sql) === TRUE) {
              // echo "Table created successfully";
            } else {
              echo "Error creating table: " . $cnx->error;
            }






            //insert

            if (isset($_POST["submit"])) {
              $nom = isset($_POST['nom']) ? htmlspecialchars(strtolower(trim($_POST['nom']))) : '';
              $prenom = isset($_POST['prenom']) ? htmlspecialchars(strtolower(trim($_POST['prenom']))) : '';
              $naissance = isset($_POST['naissance']) ? htmlspecialchars(strtolower(trim($_POST['naissance']))) : '';
              $nationalite = isset($_POST['nationalite']) ? htmlspecialchars(strtolower(trim($_POST['nationalite']))) : '';
              $genre = isset($_POST['genre']) ? htmlspecialchars(strtolower(trim($_POST['genre']))) : '';
              $phone = isset($_POST['phone']) ? htmlspecialchars(strtolower(trim($_POST['phone']))) : '';
              $username = isset($_POST['username']) ? htmlspecialchars(strtolower(trim($_POST['username']))) : '';
              $pass = isset(($_POST['pass'])) ? htmlspecialchars(strtolower(trim($_POST['pass']))) : '';
              $agency_id = isset(($_POST['agency_id'])) ? htmlspecialchars(strtolower(trim($_POST['agency_id']))) : '';
          
              if ($nom && $prenom && $naissance && $nationalite && $genre && $phone && $username && $pass) {
                  $insertsql = "INSERT INTO clients(nom,prenom,naissance,nationalite,genre,phone,username,pass,agency_id)
                                VALUES('$nom','$prenom','$naissance','$nationalite','$genre','$phone','$username','$pass','$agency_id')";
                  mysqli_query($cnx, $insertsql);
                  echo "Valid";
              } else {
                  echo "Veuillez saisir tous les champs";
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
  <body class="overflow-x-hidden relative">
  <?php
    include("navbar.php");
  ?>
<div class="container ml-[260px]">
     
      <button id="card" class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-700 text-gray-200  font-serif ">+ Add Client</button>
      
      <div class="relative ml-[40px] top-10">
        <table class="w-[1200px] text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
          <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
            <tr>
              <th scope="col" class="px-6 py-3"> ID </th>
              <th scope="col" class="px-6 py-3"> NOM </th>
              <th scope="col" class="px-6 py-3"> PRENOME </th>
              <th scope="col" class="px-6 py-3"> DATE-NAISSANCE </th>
              <th scope="col" class="px-6 py-3"> NATIONALITE </th>
              <th scope="col" class="px-6 py-3"> GENRE </th>
              <th scope="col" class="px-6 py-3"> PHONE </th>
              <th scope="col" class="px-6 py-3"> USERNAME </th>
              <th scope="col" class="px-6 py-3"> PASSWORD </th>
              <th scope="col" class="px-6 py-3"> AGENCY ID </th>
              <th scope="col" class="px-6 py-3"> ACTION </th>
            </tr>
            </thead>
            <tbody class="text-black text-center">
      <?php

          if(!$cnx){
            die("connection is not connected : " .mysqli_connection_error());
          }
              $sql = "SELECT * FROM clients";
              $result = mysqli_query($cnx, $sql);

              if($result) {
                while($row = mysqli_fetch_array($result)){
                  echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['nom']}</td>
                                <td>{$row['prenom']}</td>
                                <td>{$row['naissance']}</td>
                                <td>{$row['nationalite']}</td>
                                <td>{$row['genre']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['username']}</td>
                                <td>{$row['pass']}</td>
                                <td>{$row['agency_id']}</td>
                                <td>
                                    <a href='{$row["id"]}' class='font-bold text-white h-8 rounded cursor-pointer px-3 bg-gray-700 shadow-md transition ease-out duration-500 border-gray-700 '>EDIT</a>
                                    <a href='delet_client.php?id={$row["id"]}' class='font-bold text-white h-8 rounded  cursor-pointer px-2 bg-red-700 shadow-md transition ease-out duration-500 border-red-700 '>DELET</a>
                                </td>

                        </tr>";
                  
                  
                }
                echo "</tbody></table>";
                    } else {
                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($cnx);
                    }
              
        ?>
        </table>
      </div>
      <div class="flex flex-row gap-10 mx-auto fixed top-44 left-[600px]  z-10  justify-between p-10 items-center bg-black border border-gray-500 rounded-md max-w-screen-lg  transform scale-0  transition duration-700 ease-in-out" id="formclient">
        <form action="client.php" method="POST" class="max-w-md mx-auto">
          <div class="flex justify-end">
          <a href="client.php"><img class="h-[20px]" src="icons8-close-50.png" alt="" ></a>
          </div>
          
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="nom" id="nom" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="nom" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NOM</label>
          </div>
          <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="prenom" id="prenome" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
            <label for="prenome" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PRENOME</label>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
              <input type="date" name="naissance" id="naissance" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="naissance" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">DATE NAISSANCE</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="nationalite" id="nationalite" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="nationalite" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">NATIONALITE</label>
            </div>
          </div>
          <div class="grid md:grid-cols-2 md:gap-6">
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="genre" id="genre" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="genre" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">GENRE</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="phone" id="phone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="phone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TELEPHONE</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="username" id="username" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="username" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">USERNAME</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="pass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">PASSWORD</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <input type="text" name="agency_id" id="agency_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
              <label for="agency_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">AGENCY ID</label>
            </div>
            <div class="relative z-0 w-full mb-5 group">
              <select name="" id="">
                <option value=""></option>
              </select>
            </div>
          </div>
          <div class="flex justify-center">
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
          </div>
        </form>
      </div>
    
    


      <script src="style.js"></script>
  </body>
</html>




