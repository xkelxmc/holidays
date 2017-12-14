<div class="footer">
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="foot-nav">
          <h3>Категории</h3>
          @foreach(\App\Models\Category::get()  as $category)
            <a href="{{route('category',$category->slug)}}">{{$category->name}}</a>
          @endforeach
        </div>
      </div>
      <div class="col-sm-3">
        <div class="foot-nav">
          <h3>Заголовок</h3>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="foot-nav">
          <h3>Заголовок</h3>
        </div>
      </div>
      <div class="col-sm-3">
        <div class="foot-nav">
          <h3>Информация</h3>
          <a href="{{route('profile.index')}}">Личный кабинет</a>
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