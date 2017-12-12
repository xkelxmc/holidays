<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>{{$title}}</title>

  <!-- Styles -->
  <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div id="app">
  <div class="wrapper">
    <div class="header__main">
      <div class="container">
        <h2 class="header__title">Поиск организаторов праздников по всей России</h2>
        <div class="head">
          <div class="head__logo head__logo__main">
            <a href="#">
              <img src="img/Logo.png">
            </a>
          </div>

          <div class="head__sort name">
            <i class="fa fa-smile-o" aria-hidden="true"></i>
            <i class="fa fa-caret-down" aria-hidden="true"></i>
            <select>
              <option>Все праздники</option>
              <option>Новый год</option>
              <option>День рождения</option>
            </select>
          </div>
          <div class="head__search">
            <i class="fa fa-search" aria-hidden="true"></i>
            <input placeholder="Ключевые слова">
          </div>
          <div class="head__sort sity">
            <i class="fa fa-location-arrow" aria-hidden="true"></i>
            <select>
              <option>Москва</option>
            </select>
          </div>
          <div class="head__button">
            <button>Найти</button>
          </div>
        </div>
        <div class="slider_header">
          <img src="/img/ad/1.jpg">
        </div>
      </div>
    </div>


    <section class="main-padding">
      <div class="container">
        <div class="header-catalog clearfix">
          <div class="catalog-title">
            @component('pages.components.breadcrumb')
              @slot('title') Список категорий @endslot
              @slot('parent') Главная @endslot
              @slot('active') {{$page->title}} @endslot
            @endcomponent
            <h2>{{$page->title}}</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-12 col-md-12 col-lg-12">
            {!! $page->content !!}
          </div>
        </div>
      </div>
    </section>

    <div class="footer">
      <div class="container">
        <div class="row">
          <div class="col-sm-3">
            <div class="foot-nav">
              <h3>Заголовок</h3>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="foot-nav">
              <h3>Заголовок</h3>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="foot-nav">
              <h3>Заголовок</h3>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="foot-nav">
              <h3>Информация</h3>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
              <a href="#">Длинный текст</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer_text">
      <div class="container">
        <div class="copy">Компания © 2017</div>
        <div class="social">
          <a href="#"><i class="fa fa-vk" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
          <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
