@extends('layouts.CPanel.master')

@section('additional_resources')
    @include('layouts.CPanel.editor-links')
@endsection

@section('content')
    <div class="row">
        <h2 class="text-center">Создание нового сервиса</h2>
    </div>
    <form role="form" method="post" action="/CPanel/services/create" enctype="multipart/form-data">
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
            <label for="promo_title">Название на главной</label>
            <input type="text" class="form-control" id="promo_title" placeholder="promo_title" name="promo_title">
        </div>
        <div class="form-group">
            <label for="promo_img_file">Картинка на главной: </label>
            <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="promo_img_file" name="promo_img_file">
        </div>
        <div class="form-group">
            <label for="promo_descr">Описание на главной</label>
            <textarea class="form-control" id="promo_descr" placeholder="promo_descr" name="promo_descr" rows="3"></textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="order_num">Порядок</label>
            <input type="number" class="form-control" id="order_num" placeholder="order_num" name="order_num">
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" checked>
                    Включить сервис
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0">
                    Выключить сервис
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Создать</button>
    </form>

    <script type="text/javascript">
        CKEDITOR.replace( 'text' );
    </script>
@endsection