@extends('profile.layout')

@section('content')

  <div class="jumbotron">
    <h1>Подать объявление</h1>
    <p class="lead">Разместите свое объявление</p>
    <p><a class="btn btn-lg btn-success" href="{{url('profile/obyav/create')}}" role="button">Создать объявление</a></p>
  </div>

@endsection
