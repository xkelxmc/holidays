@extends('layouts.theme_main')

@section('content')
  <section class="main-padding">
    <div class="container">
      <div class="page-title">Лучшие предложения</div>
      <div class="row">
  @if(count($adverts))
    @foreach($adverts as $advert)
            <div class="col-sm-4">
              <a href="{{route('obyav', $advert->slug)}}" class="item-main"  style="background-image: url(/storage/{{$advert->image}})">
                <div>
                  <h3>{{$advert->title}}</h3>
                  <ul>
                    <li><i class="fa fa-bullhorn" aria-hidden="true"></i> {{getDateCustom($advert->created_at)}}</li>
                    <li>{{$advert->price}} ₽</li>
                  </ul>
                </div>
              </a>
            </div>
    @endforeach
  @else
    <div class="col-sm-12">
      <h3>Объявлений не найдено</h3>
    </div>
  @endif


      </div>
    </div>
  </section>

@endsection
