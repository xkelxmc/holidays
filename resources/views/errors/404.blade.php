@extends('layouts.theme')

@section('content')
  <div class="container error-requers">
    <div class="content">
      <div class="title">404</div>
      <div class="quote">Страница не найдена</div>
      <div class="explanation">
        <br>
        <small>
            <?php
            $default_error_message = "Вернуться на <a href='".url('')."'>главную</a>.";
            ?>
          {!! isset($exception)? ($exception->getMessage()?$exception->getMessage():$default_error_message): $default_error_message !!}
        </small>
      </div>
    </div>
  </div>

@endsection
