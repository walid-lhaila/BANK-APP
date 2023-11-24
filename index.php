<?php

include("datacnx.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="flex bg-gray-600 h-[100vh] items-center justify-center">

<div class="bg-[url('./10-rdc-23.jpg')] opacity-70 bg-cover flex justify-center items-center relative w-[80%] h-[80%]  shadow-2xl rounded-3xl">
       <div class="flex absolute left-5 top-0"><img class="w-[150px]" src="logo2014-big-removebg-preview.png" alt=""></div>
       <h1 class=" absolute text-center text-5xl font-bold top-28 text-black" >WELCOME BACK</h1>
  <div class="absolute text-black">
   
        <h3 class="text-center text-3xl font-bold ">LEAVE MONEY THE PROBLEME TO US & JUST</h3>
        <h1 class="text-center text-7xl font-bold font-serif">FOCUS ON YOUR BUSINESS</h1>
      <div class="text-center font-mono font-bold">
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, corrupti.</P>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
  </div class="ml-44">    
        <form action="">
            
            <label class="font-bold" for="username">Username/Email</label>
            <input class=" px-8 py-2 font-bold rounded-lg bg-blue-200 border-opacity-50 focus:border-blue-600" type="text" id="username" name="username">
            <label class="font-bold" for="password">Password</label>
            <input class="px-8 py-2 font-bold rounded-lg bg-blue-200 border-opacity-50 focus:border-blue-500" type="text" id="password" name="password">

            <a href="index.php"><button class=" mt-96 font-bold  px-8 py-2 border-3 shadow-md transition ease-in duration-500 border-red-300 bg-blue-600 hover:bg-red-600 font-serif mr-[50px]">LOGIN</button></a>
        </form>

</div>

</body>
</html>