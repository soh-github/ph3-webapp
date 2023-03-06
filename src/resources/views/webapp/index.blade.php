<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Fonts -->
  <link rel="preconnect" href="https://fonts.bunny.net">
  <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header class="text-gray-600 body-font bg-white h-16">
  <div class="container mx-auto flex flex-wrap px-5 flex-col md:flex-row items-center">
    <div class="flex title-font font-medium items-center text-blue-200 mb-4 md:mb-0 h-16">
      <img src="{{ asset('img/posseLogo.png') }}" alt="POSSE" class="h-3/5">
      <p class="ml-3 text-xl">4th week</p>
    </div>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <a class="mr-5 hover:text-gray-900">log in / log out</a>
    </nav>
    <button
      class="inline-flex items-center bg-gradient-to-r from-blue-500 to-sky-300 border-0 py-1 px-3 focus:outline-none hover:bg-gray-200 rounded-2xl text-white mt-4 md:mt-0">記録・投稿
    </button>
  </div>
</header>

<body class="bg-gray-100">
  <section class="text-gray-600 body-font w-11/12 m-auto">
    <div class="container px-3 py-16 mx-auto flex flex-wrap">
      <div class="flex flex-wrap md:-m-2 -m-1">
        <div class="grid grid-col-3 w-1/2">
          <div class="md:p-2 p-1 col-sapn-1 rounded">
            <div class="period">Today</div>
            <div class="time">{{ $today }}</div>
            <div class="hour">hour</div>
          </div>
          <div class="md:p-2 p-1 col-sapn-1 rounded">
            <div class="period">Month</div>
            <div class="time">{{ $month }}</div>
            <div class="hour">hour</div>
          </div>
          <div class="md:p-2 p-1 col-sapn-1 rounded">
            <div class="period">Total</div>
            <div class="time">{{ $total }}</div>
            <div class="hour">hour</div>
          </div>
          <div class="md:p-2 p-1 col-span-3 rounded">
            <img alt="gallery" class="w-full h-full object-cover object-center block"
              src="https://dummyimage.com/600x360">
          </div>
        </div>
        <div class="flex flex-wrap w-1/2">
          <div class="md:p-2 p-1 w-1/2 rounded">
            <img alt="gallery" class="w-full h-full object-cover object-center block"
              src="https://dummyimage.com/601x361">
          </div>
          <div class="md:p-2 p-1 w-1/2 rounded">
            <img alt="gallery" class="w-full object-cover h-full object-center block"
              src="https://dummyimage.com/502x302">
          </div>
        </div>
      </div>
    </div>
    <div class="flex justify-center">
      <button id="prevBtn" class="footerBtn"><</button>
      <div class="footerMonth"><?= date('Y');?>年<?= date('n');?>月</div>
      <button id="nextBtn" class="footerBtn">></button>
    </div>
    <div class="flex justify-center rounded-2xl bg-gradient-to-r from-blue-500 to-sky-300">
      <a href="#modal-01" class="postButton text-xl text-white sm:hidden" id="modal-trigger2">記録・投稿</a>
    </div>
  </section>
</body>

</html>