@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Настройка другой информации</h2>
    </div>
    <hr>
    <div class="row">
        <h3>Контакты</h3>
        <form role="form" method="post" action="/CPanel/services/create" enctype="multipart/form-data">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="title">Название</label>
                <input type="text" class="form-control" id="title" placeholder="Title" name="title">
            </div>
            <button type="submit" class="btn btn-primary">Создать</button>
        </form>
    </div>
@endsection