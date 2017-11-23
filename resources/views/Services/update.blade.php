@extends('layouts.CPanel.master')

@section('additional_resources')
    @include('layouts.CPanel.editor-links')
@endsection

@section('content')
    <div class="row">
        <h2 class="text-center">Изменение сервиса</h2>
    </div>
    @if($errors->any())
        <h4 class="green">{{$errors->first()}}</h4>
    @endif
    <form role="form" method="post" action="/CPanel/services/{{ $service->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $service->title }}">
        </div>
        <hr>
        <div class="form-group img-loader">
            <div class="img-container">
                Картинка:<br />
                @if ( !empty($service->img_path) )
                    <img class="img-preview" src="{{ $service->img_path }}">
                @endif
            </div>
            <div class="file-container">
                <label for="img_file">Загрузить новую картинку: </label>
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="img_file" name="img_file">
            </div>
        </div>
        <div class="form-group">
            <label for="text">Текст</label>
            <textarea class="form-control" id="text" placeholder="text" name="text" rows="3">{{ $service->text }}</textarea>
        </div>
        <div class="form-group">
            <label for="promo_title">Название на главной</label>
            <input type="text" class="form-control" id="promo_title" placeholder="promo_title" name="promo_title" value="{{ $service->promo_title }}">
        </div>
        <hr>
        <div class="form-group img-loader">
            <div class="img-container">
                Картинка на главной:<br />
                @if ( !empty($service->promo_img_path) )
                    <img class="img-preview" src="{{ $service->promo_img_path }}">
                @endif
            </div>
            <div class="file-container">
                <label for="promo_img_file">Загрузить новую картинку: </label>
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="promo_img_file" name="promo_img_file">
            </div>
        </div>
        <div class="form-group">
            <label for="promo_descr">Описание на главной</label>
            <textarea class="form-control" id="promo_descr" placeholder="promo_descr" name="promo_descr" rows="3">{{ $service->promo_descr }}</textarea>
        </div>
        <hr>
        <div class="form-group">
            <label for="order_num">Порядок</label>
            <input type="number" class="form-control" id="order_num" placeholder="order_num" name="order_num" value={{ $service->order_num }}>
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" @if( $service->active == 1) checked @endif>
                    Включить сервис
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0" @if( $service->active == 0) checked @endif>
                    Выключить сервис
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