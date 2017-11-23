@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Изменение документа</h2>
    </div>
    @if($errors->any())
        <h4 class="green">{{$errors->first()}}</h4>
    @endif
    <form role="form" method="post" action="/CPanel/documents/{{ $document->id }}" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="title">Название</label>
            <input type="text" class="form-control" id="title" placeholder="Title" name="title" value="{{ $document->title }}">
        </div>
        <hr>
        <div class="form-group img-loader">
            <div class="img-container">
                Картинка:<br />
                @if ( !empty($document->img_path) )
                    <img class="img-preview" src="{{ $document->img_path }}">
                @endif
            </div>
            <div class="file-container">
                <label for="img_file">Загрузить новую картинку: </label>
                <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="img_file" name="img_file">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <p>Файл:
                <a href="{{ $document->file_path }}" download="{{ $document->file_name }}" class="document__link">
                    {{ $document->file_name }}
                </a>
            </p>
            <label for="doc_file">Загрузить новый документ: </label>
            <input type="file" class="form-control" id="doc_file" name="doc_file">
        </div>
        <hr>
        <div class="form-group">
            <label for="order_num">Порядок</label>
            <input type="number" class="form-control" id="order_num" placeholder="order_num" name="order_num" value={{ $document->order_num }}>
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" @if( $document->active == 1) checked @endif>
                    Включить сервис
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0" @if( $document->active == 0) checked @endif>
                    Выключить сервис
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success" name="submit" value="save">Сохранить</button>
        <button type="submit" class="btn btn-danger" name="submit" value="delete">Удалить</button>
    </form>
@endsection