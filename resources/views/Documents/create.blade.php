@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Создание нового документа</h2>
    </div>
    <form role="form" method="post" action="/CPanel/documents/create" enctype="multipart/form-data">
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
            <label for="doc_file">Файл: </label>
            <input type="file" class="form-control" id="doc_file" name="doc_file">
        </div>
        <div class="form-group">
            <label for="order_num">Порядок</label>
            <input type="number" class="form-control" id="order_num" placeholder="order_num" name="order_num">
        </div>
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios1" value="1" checked>
                    Включить документ
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="active" id="optionsRadios2" value="0">
                    Выключить документ
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection