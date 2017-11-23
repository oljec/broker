@extends('layouts.CPanel.master')

@section('content')
    <h2 class="text-center"><small>Вопрос №{{ $question->id }}:</small> {{ $question->title }}</h2>
    @if($errors->any())
        <h4 class="green">{{$errors->first()}}</h4>
    @endif
    <p><small>Имя:</small> {{ $question->name }}</p>
    @if (! empty($question->surname))
        <p><small>Фамилия:</small> {{ $question->surname }}</p>
    @endif
    @if (! empty($question->structure))
        <p><small>Организация:</small> {{ $question->structure }}</p>
    @endif
    @if (! empty($question->phone))
        <p><small>Телефон:</small> {{ $question->phone }}</p>
    @endif
    <p><small>Почта:</small> {{ $question->email }}</p>
    <p class="text-center"><strong>Сообщение:</strong></p>
    <div class="jumbotron">
        {{ $question->text }}
    </div>

    <form role="form" method="post" action="/CPanel/questions/{{ $question->id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="state_new" id="optionsRadios1" value="1" @if( $question->state_new == 1) checked @endif>
                    Новый
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="state_new" id="optionsRadios2" value="0" @if( $question->state_new == 0) checked @endif>
                    Прочитаный
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection