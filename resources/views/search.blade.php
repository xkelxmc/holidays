@extends('layouts.theme')

@section('content')
  <section class="padding">
    <div class="container">
      <div class="header-catalog clearfix">
        <div class="catalog-title">
          <ul class="breadcrumb">
            <li><a href="/">Главная</a></li>
            <li class="active">{{$category->name}}</li>
          </ul>
          <h2>{{$category->name}}</h2>
        </div>
        <div class="catalog-filter">
          <div class="catalog-filter__sorting">
            <i class="fa fa-sliders" aria-hidden="true"></i>
            <select>
              <option>Дешевле</option>
              <option>Дороже</option>
            </select>
          </div>
        </div>
      </div>



      @if(count($adverts))
        @foreach($adverts as $advert)
          <div class="item">
            <a href="{{route('advert', $advert->slug)}}" class="item_img" style="background-image: url(/storage/{{$advert->image}})">
            </a>
            <div class="item_text">
              <a href="{{route('advert', $advert->slug)}}"><h3>{{$advert->title}}</h3><span>{{$advert->price}} ₽</span></a>

              <p>
                {{$advert->description_short}}
              </p>
            </div>
          </div>
        @endforeach
      @else
        <h3>Объявлений не найдено</h3>
      @endif


    </div>
  </section>

@endsection
