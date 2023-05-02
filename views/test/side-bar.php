<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link href="../../Assets/cssFiles/index.css" type="text/css" rel="stylesheet">
    <link href="../../Assets/cssFiles/tailwind.css" rel="stylesheet">
  <style>
  </style>
</head>
<body>
<nav class="border-gray-200 bg-gray-800 z-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
        <span class="self-center text-2xl font-semibold  whitespace-nowrap dark:text-white">LocAuto</span>
        <div class="hidden w-full md:block md:w-auto" id="navbar-default">
            <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-800 dark:border-gray-700">
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500" aria-current="page">Home</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-800  rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-800 dark:hover:text-white md:dark:hover:bg-transparent">About</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-800 dark:hover:text-white md:dark:hover:bg-transparent">Services</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-800 dark:hover:text-white md:dark:hover:bg-transparent">Pricing</a>
                </li>
                <li>
                    <a href="#" class="block py-2 pl-3 pr-4 text-gray-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-800 dark:hover:text-white md:dark:hover:bg-transparent">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
  <button class="p-4 rounded-full bg-sky-500 text-3xl font-bold" onclick="change_side_bar_state()">Expand side_bar</button>
<div id="side-bar" class="hide-side-bar z-10"></div>
<div class="hs-dropdown relative inline-flex">
    <button id="hs-dropdown-default" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border font-medium bg-white text-gray-700 shadow-sm align-middle hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-blue-600 transition-all text-sm dark:bg-slate-900 dark:hover:bg-slate-800 dark:border-gray-700 dark:text-gray-400 dark:hover:text-white dark:focus:ring-offset-gray-800">
        Actions
        <svg class="hs-dropdown-open:rotate-180 w-2.5 h-2.5 text-gray-600" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M2 5L8.16086 10.6869C8.35239 10.8637 8.64761 10.8637 8.83914 10.6869L15 5" stroke="currentColor" stroke-width="2" stroke-linecap="round"/>
        </svg>
    </button>

    <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] hs-dropdown-open:opacity-100 opacity-0 w-72 hidden z-10 mt-2 min-w-[15rem] bg-white shadow-md rounded-lg p-2 dark:bg-gray-800 dark:border dark:border-gray-700 dark:divide-gray-700" aria-labelledby="hs-dropdown-default">
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
            Newsletter
        </a>
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
            Purchases
        </a>
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
            Downloads
        </a>
        <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-md text-sm text-gray-800 hover:bg-gray-100 focus:ring-2 focus:ring-blue-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-gray-300" href="#">
            Team Account
        </a>
    </div>
</div>
</body>
<script>
  const side_bar_div = document.getElementById("side-bar")
  const change_side_bar_state = () => {
    if(side_bar_div.getAttribute("class")==="show-side-bar"){
      side_bar_div.setAttribute("class","hide-side-bar");
    } else {
      side_bar_div.setAttribute("class","show-side-bar");
    }
  }
</script>
</html>