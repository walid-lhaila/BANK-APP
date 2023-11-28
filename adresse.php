<?php
    include("datacnx.php");

        $sql = "CREATE TABLE IF NOT EXISTS adresse(
            id INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
            ville VARCHAR(255) NOT NULL,
            quartier VARCHAR(255) NOT NULL,
            rue VARCHAR(255) NOT NULL,
            codepostal INT(255) NOT NULL,
            email VARCHAR(255) NOT NULL,
            telephone INT(15) NOT NULL,
            agency_id INT(10) UNSIGNED NOT NULL,
            client_id INT(10) UNSIGNED NOT NULL,
            FOREIGN KEY (agency_id) REFERENCES agency(id),
            FOREIGN KEY (client_id) REFERENCES clients(id)
            ON DELETE CASCADE
            ON UPDATE CASCADE
        )";

                if($cnx->query($sql) === TRUE){
                    // echo "table adresse created successfully";
                }else{
                    echo "table adresse not created successfully";
                }

                    if(isset($_POST["submit"])){
                        $ville = isset($_POST["ville"]) ? htmlspecialchars($_POST["ville"]) : '';
                        $quartier = isset($_POST["quartier"]) ? htmlspecialchars($_POST["quartier"]) : '';
                        $rue = isset($_POST["rue"]) ? htmlspecialchars($_POST["rue"]) : '';
                        $codepostal = isset($_POST["codepostal"]) ? htmlspecialchars($_POST["codepostal"]) : '';
                        $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : '';
                        $telephone = isset($_POST["telephone"]) ? htmlspecialchars($_POST["telephone"]) : '';
                        $agency_id = isset($_POST ["agency_id"]) ? htmlspecialchars($_POST["agency_id"]) : '';
                        $client_id = isset($_POST["clinet_id"]) ? htmlspecialchars($_POST["client_id"]) : '';

                                if($ville && $quartier && $rue && $codepostal && $email && $telephone && $agency_id && $client_id){
                                    $insertsql = "INSERT INTO adresse (ville,quartier,rue,codepostal,email,telephone,agency_id,clinet_id) 
                                    VALUES ('$ville','$quartier','$rue','$codepostal','$email','$telephone','$agency_id','$client_id')";
                                        mysqli_query($cnx, $insertsql);
                                        echo "insert valid mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm";
                                }else{
                                    echo "insert invalid veuillez saisir tous les champs";
                                }
                    }



?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="overflow-x-hidden">
    <?php
        include("navbar.php");
    ?>


<div class="container ml-[260px]">
    <button id="cardadresse" class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-700 text-gray-200  font-serif ">+ Add ADRESSE</button>

        <div class="relative ml-[40px] top-10">
            <table class="w-[1200px] text-center text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">VILLE</th>
                        <th scope="col" class="px-6 py-3">QUARTIER</th>
                        <th scope="col" class="px-6 py-3"> RUE </th>
                        <th scope="col" class="px-6 py-3"> CODE POSTAL </th>
                        <th scope="col" class="px-6 py-3"> EMAIL</th>
                        <th scope="col" class="px-6 py-3"> TELEPHONE </th>
                        <th scope="col" class="px-6 py-3"> AGENCY ID </th>
                        <th scope="col" class="px-6 py-3"> CLIENT ID </th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
        </div>



        
        
        <div class="flex flex-row gap-10 mx-auto fixed top-50 left-[680px]  z-10  justify-between p-10 items-center bg-black border border-gray-500 rounded-md max-w-screen-lg  transform scale-0  transition duration-700 ease-in-out" id="formadresse">
            <form action="adresse.php" method="POST" class="w-96 mx-auto">
              <div class="flex justify-end">
              <a href="adresse.php"><img class="h-[15px]" src="icons8-close-50.png" alt="" ></a>
              </div>
              
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="ville" id="ville" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="ville" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">VILLE</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="quartier" id="quartier" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="quartier" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">QUARTIER</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="rue" id="rue" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="rue" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">RUE</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="codepostal" id="codepostal" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="codepostal" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CODE POSTALE</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="email" name="email" id="email" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">EMAIL</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="telephone" id="telephone" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="telephone" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">TELEPHONE</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="agency_id" id="agency_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="agency_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">AGENCY_ID</label>
              </div>
              <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="client_id" id="client_id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required />
                <label for="client_id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">CLIENT_ID</label>
              </div>
              
              <div class="flex justify-center">
                <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
              </div>
            </form>
          </div>









</div>





<script src="styleadresse.js"></script>
</body>
</html>