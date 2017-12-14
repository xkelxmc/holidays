@extends('layouts.theme')

@section('scripts')

  <script type="text/javascript">
    $(document).ready(function () {
        $('.btn-phone').click(function () {
            $('#hide-phone-user').show();
            $(this).hide();
        });
    });
  </script>
@endsection
@section('content')

  <section class="padding">
    <div class="container">


      <ul class="breadcrumb">
        <li><a href="/">Главная</a></li>
        <li><a href="{{route('category',$advert->category->slug)}}">{{$advert->category->name}}</a></li>
        <li class="active">{{$advert->title}}</li>
      </ul>


      <div class="full-content clearfix">
        <div class="left-side">

          <div class="box-full poster-img">
            <img src="/storage/{{$advert->image}}">
            <div class="owl-carousel slide-poster" style="display: none">
              <img src="img/1.jpg">
              <img src="img/1.jpg">
              <img src="img/1.jpg">
              <img src="img/1.jpg">
            </div>
          </div>

          <div class="box-full text-full">
            {!! $desc !!}
          </div>


        </div>

        <div class="right-side">
          <div class="box-full full-info">
            <span>{{$advert->price}} <small>₽</small></span>
            <h4>{{$advert->title}}</h4>
            <div id="hide-phone-user" style="display: none;">
              <span>{{$advert->user->phone}}</span>
              <h4>{{$advert->user->name}} {{$advert->user->lastname}} {{$advert->user->patronymic}}</h4>
            </div>
            <div class="clearfix">
              <button class="btn-phone">Показать номер</button>
              <button class="btn-send" style="display: none;">Написать организатору</button>
            </div>
          </div>
          <div class="box-full" style="display: none;">
            <a href="#" class="full__company">
              <div class="full__ava"  style="background-image: url(./img/header.jpeg);"></div>
              <div class="full__info">
                <span>{{$advert->user->name}} {{$advert->user->lastname}} {{$advert->user->patronymic}}</span>
                <div class="star" style="display: none;">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </a>
          </div>

        </div>
      </div>

      <div class="page-title text-left" style="display: none;">Похожие объявления</div>
      <div class="owl-carousel slide-other" style="display: none;">
        <a href="#" class="item-main"  style="background-image: url(./img/1.jpg)">
          <div>
            <h3>Название объявления </h3>
            <ul>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i> 8 Марта</li>
              <li>12 200 ₽</li>
            </ul>
          </div>
        </a>
        <a href="#" class="item-main"  style="background-image: url(./img/2.jpg)">
          <div>
            <h3>Название объявления </h3>
            <ul>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i> 8 Марта</li>
              <li>12 200 ₽</li>
            </ul>
          </div>
        </a>
        <a href="#" class="item-main"  style="background-image: url(./img/3.jpg)">
          <div>
            <h3>Название объявления </h3>
            <ul>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i> 8 Марта</li>
              <li>12 200 ₽</li>
            </ul>
          </div>
        </a>
        <a href="#" class="item-main"  style="background-image: url(./img/1.jpg)">
          <div>
            <h3>Название объявления </h3>
            <ul>
              <li><i class="fa fa-bullhorn" aria-hidden="true"></i> 8 Марта</li>
              <li>12 200 ₽</li>
            </ul>
          </div>
        </a>
      </div>





    </div>
  </section>

@endsection
