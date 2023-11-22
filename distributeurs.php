



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>


<?php
include("navbar.php");
?>
<div class="container ml-[260px]">
    <button class="font-bold mt-10 ml-10 px-5 py-1 border-3 shadow-md transition ease-in duration-500 border-blue-300 dark:bg-gray-700 text-gray-200  font-serif ">+ Add DISTRIBUTEURS</button>

<div class="relative ml-[40px] top-10">
    <table class="w-[1200px] text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    LONGITUDE
                </th>
                <th scope="col" class="px-6 py-3">
                    LATITUDE
                </th>
                <th scope="col" class="px-6 py-3">
                    ADRESSE
                </th>
                <th scope="col" class="px-6 py-3">
                    CODE POSTAL
                </th>
            </tr>
        </tbody>

    </table>
</div>

</div>



</body>
</html>
