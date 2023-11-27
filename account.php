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
        include("clientNavBar.php");
    ?>


<div class="relative ml-[300px] top-40">
    <table class="w-[1200px] text-center text-sm text-left rtl:text-right text-gray-200 dark:text-gray-200">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-200">
            <tr>
                <th scope="col" class="px-6 py-3">
                    ID
                </th>
                <th scope="col" class="px-6 py-3">
                    BALANCE
                </th>
                <th scope="col" class="px-6 py-3">
                    DEVISE
                </th>
                <th scope="col" class="px-6 py-3">
                    RIB
                </th>
            </tr>
        </thead>
        </table>
</div>
</body>
</html>