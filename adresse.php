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
                        $client_id = isset($_POST["client_id"]) ? htmlspecialchars($_POST["client_id"]) : '';

                                if($ville && $quartier && $rue && $codepostal && $email && $telephone && $agency_id && $client_id){
                                    $insertsql = "INSERT INTO adresse (ville,quartier,rue,codepostal,email,telephone,agency_id,client_id) 
                                    VALUES ('$ville','$quartier','$rue','$codepostal','$email','$telephone','$agency_id','$client_id')";
                                        mysqli_query($cnx, $insertsql);
                                        // echo "insert valid mmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmmm";
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
    <link rel="stylesheet" href="style.css">
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
                <thead class="text-xs text-center text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
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
                        <th scope="col" class="px-6 py-3">ACTION</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                        if(!$cnx){
                            die("you are not allowed connecting :" . mysqli_connect_error());
                        }
                            $sql = "SELECT * FROM adresse";

                                $result = mysqli_query($cnx, $sql);

                                    if($result){
                                        while($row = mysqli_fetch_array($result)){
                                            echo "<tr>
                                            <td> {$row['id']}</td>
                                            <td> {$row['ville']}</td>
                                            <td> {$row['quartier']}</td>
                                            <td> {$row['rue']}</td>
                                            <td> {$row['codepostal']}</td>
                                            <td> {$row['email']}</td>
                                            <td> {$row['telephone']}</td>
                                            <td> {$row['agency_id']}</td>
                                            <td> {$row['client_id']}</td>
                                            <td class='flex gap-[8px] justify-center'>
                                    
                                           
                                                <a href='{$row["id"]}'>
                                                    <svg class='w-6 h-6 text-gray-700 dark:text-gray hover:text-blue-600' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='currentColor' viewBox='0 0 20 18'>
                                                        <path d='M12.687 14.408a3.01 3.01 0 0 1-1.533.821l-3.566.713a3 3 0 0 1-3.53-3.53l.713-3.566a3.01 3.01 0 0 1 .821-1.533L10.905 2H2.167A2.169 2.169 0 0 0 0 4.167v11.666A2.169 2.169 0 0 0 2.167 18h11.666A2.169 2.169 0 0 0 16 15.833V11.1l-3.313 3.308Zm5.53-9.065.546-.546a2.518 2.518 0 0 0 0-3.56 2.576 2.576 0 0 0-3.559 0l-.547.547 3.56 3.56Z'/>
                                                        <path d='M13.243 3.2 7.359 9.081a.5.5 0 0 0-.136.256L6.51 12.9a.5.5 0 0 0 .59.59l3.566-.713a.5.5 0 0 0 .255-.136L16.8 6.757 13.243 3.2Z'/>
                                                      </svg>
                                                </a>
                                            
                                                <a href='{$row["id"]}'>
                                                    <svg class='w-6 h-6 text-gray-800 dark:text-gray hover:text-red-600' aria-hidden='true' xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 18 20'>
                                                    <path stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z'/>
                                                </svg></a>
                                                       
                                            </td>
                                        </tr>";        
                                        }
                                        echo "</tbody></table>";
                                    }else{
                                        echo "Erreur lors de l'exécution de la requête : " . mysqli_error($cnx);
                                    }



                    ?>
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