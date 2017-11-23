@extends('layouts.CPanel.master')

@section('additional_resources')
    @include('layouts.CPanel.editor-links')
@endsection

@section('content')
    <div class="row">
        <h2 class="text-center">Изменение новости</h2>
    </div>
    @if($errors->any())
        <h4 class="green">{{$errors->first()}}</h4>
    @endif
    <form role="form" method="post" action="/CPanel/news/{{ $news->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $news->title }}">
        </div>
        <hr>
        <div class="form-group img-loader">
            <div class="img-container">
                Картинка:<br />
                @if ( !empty($news->img_path) )
                    <img class="img-preview" src="{{ $news->img_path }}">
                @endif
            </div>
            <div class="file-container">
                <label for="img_file">Загрузить новую картинку: </label>
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="img_file" name="img_file">
            </div>
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" placeholder="text" name="text" rows="3">{{ $news->text }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="promo_text">Текст в списке новостей</label>
            <textarea class="form-control" id="promo_text" placeholder="promo_text" name="promo_text" rows="3">
                {{ $news->promo_text }}
            </textarea>
        </div>
        <div class="form-group">
            <label for="news_date">Дата</label>
            <input type="date" class="form-control" id="news_date" placeholder="news_date" name="news_date"
                   value="{{ $news->news_date }}">
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" @if( $news->active == 1) checked @endif>
                    Включить новость
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0" @if( $news->active == 0) checked @endif>
                    Выключить новость
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="save">Сохранить</button>
        <button type="submit" class="btn btn-danger" name="submit" value="delete">Удалить</button>
    </form>
    <script type="text/javascript">
        CKEDITOR.replace( 'text' );
    </script>
@endsection