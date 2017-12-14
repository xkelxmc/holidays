<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{ config('app.name', 'Laravel') }}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
  <div class="wrapper">
    <div class="header__main">
      <div class="container">
        <h2 class="header__title">Поиск организаторов праздников по всей России</h2>
        <form class="head" method="GET" action="{{route('search')}}">
          <div class="head__logo head__logo__main">
            <a href="#">
              <img src="/img/logo.png">
            </a>
          </div>

          <div class="head__sort name">
            <i class="fa fa-smile-o" aria-hidden="true"></i>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <select name="category">
              <option value="0">Все праздники</option>
              @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="head__search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input placeholder="Ключевые слова" name="search">
          </div>
          <div class="head__sort sity">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <select>
              <option>Москва</option>
            </select>
          </div>
          <div class="head__button">
            <button type="submit">Найти</button>
          </div>
        </form>
        <div class="slider_header">
          <img src="/img/ad/1.jpg">
        </div>
      </div>
    </div>


    @yield('content')

    @include('layouts.footer')
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
