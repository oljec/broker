@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Список всех сервисов</h2>
    </div>
    <div class="row"><a href="/CPanel/services/create">Создать новый сервис</a></div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Порядок</th>
                    <th>Активная</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($services as $service)
                    <?php $count++; ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="/CPanel/services/{{ $service->id }}">{{ $service->title }}</a></td>
                        <td class="text-center">{{ $service->order_num }}</td>
                        <td class="text-center">
                            <form method="post" action="/CPanel/services/change-state">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$service->id}}">
                                @if ( $service->active == 1 )
                                    <input type="hidden" name="active" value="0">
                                    <button type="submit" class="iconBtn">
                                        <span class="glyphicon glyphicon-ok green"></span>
                                    </button>
                                @else
                                    <input type="hidden" name="active" value="1">
                                    <button type="submit" class="iconBtn">
                                        <span class="glyphicon glyphicon-remove red"></span>
                                    </button>
                                @endif
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection