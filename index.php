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
<body class="bg-[url('./10-rdc-23.jpg')] bg-cover">

<div class="">
       <div class="flex absolute left-5 top-0"><img class="w-[200px]" src="logo2014-big-removebg-preview.png" alt=""></div>
       <h1 class=" absolute text-center text-5xl font-bold top-28 right-[600px]  text-black" >WELCOME BACK</h1>
  <div class="text-black italic mt-56">
   
        <h3 class="text-center text-3xl font-bold ">LEAVE MONEY THE PROBLEME TO US & JUST</h3>
        <h1 class="text-center text-7xl font-bold ">FOCUS ON YOUR BUSINESS</h1>
      <div class="text-center font-mono font-bold">
        <P>Lorem ipsum dolor sit amet consectetur adipisicing elit. Fuga, corrupti.</P>
        <p>Lorem ipsum dolor sit amet.</p>
      </div>
  </div>  
  <div class=" flex flex-col justify-center items-center mt-20"> 
        <form action="">
          <div>
              <label class="font-bold" for="username">Username/Email</label><br>
              <input class=" px-8 py-2 font-bold shadow-xl rounded-lg bg-blue-200 border-opacity-50 focus:border-blue-600" type="text" id="username" name="username">
          </div>
          <div class="">
              <label class="font-bold" for="password">Password</label><br>
              <input class="px-8 py-2 font-bold shadow-xl rounded-lg bg-blue-200 border-opacity-50 focus:border-blue-500" type="text" id="password" name="password">
          </div>
         <div class="flex flex-col justify-center items-center ml-10 mt-5">
           <a href="bank.php"><button class="font-bold  px-8 py-2 border-3 rounded shadow-inner-3xl shadow-md transition ease-in duration-300 border-red-300 bg-red-600 hover:bg-blue-600 font-serif mr-[50px]">LOGIN</button></a>
          </div>
        </form>
  </div> 
</div>

</body>
</html>