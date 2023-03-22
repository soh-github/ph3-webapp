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
  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/3ded641fb3.js" crossorigin="anonymous"></script>
  <!-- flatpickr -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/themes/material_blue.css">
  <script src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- Scripts -->
  @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<header class="text-gray-600 body-font bg-white h-16">
  <div class="container mx-auto flex flex-wrap px-5 items-center">
    <div class="flex title-font font-medium items-center text-blue-200 mb-4 md:mb-0 h-16">
      <img src="{{ asset('img/posseLogo.png') }}" alt="POSSE" class="h-3/5">
      <p class="ml-3 text-xl">4th week</p>
    </div>
    <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
      <form method="POST" action="{{ route('logout') }}">
        @csrf
        <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();">
            {{ __('Log Out') }}
        </x-dropdown-link>
      </form>
      <!-- <a class="mr-5 hover:text-gray-900">log in / log out</a> -->
    </nav>
    <button
      class="inline-flex items-center bg-gradient-to-r from-blue-500 to-sky-300 border-0 py-1 px-3 focus:outline-none rounded-2xl text-white mt-4 md:mt-0">記録・投稿
    </button>
  </div>
</header>

<body class="bg-gray-100">
  <section class="text-gray-600 body-font w-11/12 m-auto">
    <div class="container px-3 py-16 mx-auto">
      <!-- <div class="flex flex-wrap -m-1"> -->
      <div class="-m-1 flex flex-col sm:flex-row">
        <!-- 左 -->
        <!-- <div class="grid grid-col-3 w-1/2"> -->
        <div class="grid grid-col-3 w-full sm:w-1/2">
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
            <div class="graph" id="time-graph"></div>
          </div>
        </div>
        <!-- 右 -->
        <!-- <div class="flex flex-wrap w-1/2"> -->
        <div class="flex flex-wrap sm:w-1/2 w-full">
          <div class="md:p-2 p-1 w-1/2 rounded">
            <div class="contentTitle">学習言語</div>
              <div class="chart w-11/12 h-28 bg-red-400" id="lang-chart"></div>
              <ul class="legends w-full flex flex-wrap">
                @foreach ($lang_legends as $legend)
                <div class="flex items-center">
                  <!-- <div class="mx-2 w-4 h-4 rounded-lg" style="background: {{$legend->color}};"></div> -->
                  <li class="mx-1">{{ $legend->language }}</li>
                </div>
                @endforeach
              </ul>
            </div>
          <div class="md:p-2 p-1 w-1/2 rounded">
            <div class="contentTitle">学習コンテンツ</div>
              <div class="chart w-11/12 h-28 bg-red-400" id="contents-chart"></div>
              <ul class="legends w-full flex flex-wrap">
                @foreach ($content_legends as $legend)
                <li class="mx-1">{{ $legend->content }}</li>
                @endforeach
              </ul>
            </div>
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
  <script>
    //index.jsへのデータ受け渡し
    var contents_data = @json($contents_data);
    var languages_data = @json($languages_data);
    var bar_data = @json($bar_data);
  </script>
  <script type="module" src="{{ asset('/js/index.js') }}"></script>
</body>

</html>