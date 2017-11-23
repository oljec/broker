@extends('layouts.CPanel.master')

@section('content')
    <h2 class="text-center"><small>Заказ №{{ $order->id }}:</small> {{ $order->service->title }}</h2>
    @if($errors->any())
        <h4 class="green">{{$errors->first()}}</h4>
    @endif
    <p><small>Имя:</small> {{ $order->name }}</p>
    @if (! empty($order->surname))
        <p><small>Фамилия:</small> {{ $order->surname }}</p>
    @endif
    @if (! empty($order->structure))
        <p><small>Организация:</small> {{ $order->structure }}</p>
    @endif
    @if (! empty($order->phone))
        <p><small>Телефон:</small> {{ $order->phone }}</p>
    @endif
    @if (! empty($order->email))
        <p><small>Почта:</small> {{ $order->email }}</p>
    @endif
    <p class="text-center"><strong>Комментарий:</strong></p>
    <div class="jumbotron">
        {{ $order->comments }}
    </div>

    <form role="form" method="post" action="/CPanel/orders/{{ $order->id }}">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="radio">
                <label>
                    <input type="radio" name="state_new" id="optionsRadios1" value="1" @if( $order->state_new == 1) checked @endif>
                    Новый
                </label>
            </div>
            <div class="radio">
                <label>
                    <input type="radio" name="state_new" id="optionsRadios2" value="0" @if( $order->state_new == 0) checked @endif>
                    Прочитаный
                </label>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection