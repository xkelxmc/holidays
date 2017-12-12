<label for="">Статус</label>
<select class="form-control" name="published">
  @if (isset($category->id))
    <option value="0" @if ($category->published == 0) selected="" @endif>На опубликованно</option>
    <option value="1" @if ($category->published == 1) selected="" @endif>Опубликованно</option>
  @else
    <option value="0">На опубликованно</option>
    <option value="1">Опубликованно</option>
  @endif
</select>

<label for="">Наименование</label>
<input type="text" class="form-control" name="name" placeholder="Заголовок категории" value="{{$category->name or ""}}" required>

<label for="">Slug</label>
<input type="text" class="form-control" name="slug" placeholder="Автоматическай генерация" value="{{$category->slug or ""}}" readonly="">

<label for="">Родительская категория</label>
<select name="parent_id" class="form-control">
  <option value="0">-- без родительской категории --</option>
  {{-- Categories imclude --}}
  @include('admin.categories.partials.categories', ['categories' => $categories])
</select>

<hr>

<input type="submit" class="btn btn-primary" value="Сохранить">