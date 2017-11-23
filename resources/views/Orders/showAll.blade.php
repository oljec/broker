@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Список всех заказов</h2>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Номер</th>
                    <th>Тема</th>
                    <th>ФИО</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($orders as $order)
                    <?php $count++; ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $order->id }}</td>
                        <td>
                            <a href="/CPanel/orders/{{ $order->id }}">{{ $order->service->title }}</a>
                            @if ($order->state_new == 1)
                                <span class="label label-success">Новый</span>
                            @endif
                        </td>
                        <td>{{ $order->surname }} {{ $order->name }}</td>
                        <td>{{ $order->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        {!! $orders->render() !!}
    </div>
@endsection