@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Список всех документов</h2>
    </div>
    <div class="row">
        <a href="/CPanel/documents/create">Создать новый документ</a>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Название</th>
                    <th>Порядок</th>
                    <th>Активный</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($documents as $document)
                    <?php $count++; ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="/CPanel/documents/{{ $document->id }}">{{ $document->title }}</a></td>
                        <td class="text-center">{{ $document->order_num }}</td>
                        <td class="text-center">
                            <form method="post" action="/CPanel/documents/change-state">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$document->id}}">
                                @if ( $document->active == 1 )
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