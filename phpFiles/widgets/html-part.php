<?php
function fileStart()
{
    echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
  <style>
  </style>
</head>
<body>';
}

function navBar()
{
    echo '<nav class="bg-gray-900 fixed w-full z-20 top-0 left-0 border-b border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4" >
    <a href="#" class="flex items-center">
        <div>
        <img width="55rem" class="w-5" src="../../Assets/images/logos/locauto_logo_b.svg">   
    </div>
        <span class="self-center text-2xl font-semibold whitespace-nowrap "><div class="py-0 my-0"><span class="py-0 my-0">Loc</span><br><span class="py-0 my-0">Auto</span></div></span>
    </a>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white">
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0" aria-current="page">Home</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0">Product</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">Pricing</a>
        </li>
        <li>
          <a href="#" class="block py-2 pl-3 pr-4 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 ">About</a>
        </li>
        
      </ul>
    </div>
  </div>
</nav>
<div class="mt-16"/>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">';
}

function fileEnd()
{
    echo '</body>
</html>';
}

function tableStart($arrayNames,$editButton=false)
{
    echo '
    <table class="w-full text-sm text-left text-gray-500 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 ">
        <tr>';
    foreach ($arrayNames as $name) {
        echo '<th scope="col" class="px-6 py-3">' . $name . "</th>";
    }
    if ($editButton){
        echo '
            <th scope="col" class="px-6 py-3">
                <span class="sr-only">Edit</span>
            </th>';
    }
    echo '</tr>
        </thead>
        <tbody>';
}

function tableEnd() {
    echo '</tbody>
    </table>
</div>';
}