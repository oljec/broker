@extends('layouts.CPanel.master')

@section('additional_resources')
    @include('layouts.CPanel.editor-links')
@endsection

@section('content')
    <div class="row">
        <h2 class="text-center">Создание новой новости</h2>
    </div>
    <form role="form" method="post" action="/CPanel/news/create" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title">
        </div>
        <div class="form-group">
            <label for="img_file">Картинка: </label>
            <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="img_file" name="img_file">
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" placeholder="text" name="text" rows="3"></textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="promo_text">Текст в списке новостей</label>
            <textarea class="form-control" id="promo_text" placeholder="promo_text" name="promo_text" rows="3"></textarea>
        </div>
        <div class="form-group">
            <label for="news_date">Дата</label>
            <input type="date" class="form-control" id="news_date" placeholder="news_date" name="news_date">
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" checked>
                    Включить новость
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0">
                    Выключить новость
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

    <script type="text/javascript">
        CKEDITOR.replace( 'text' );
    </script>
@endsection