@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Список всех новостей</h2>
    </div>
    <div class="row"><a href="/CPanel/news/create">Создать новую новость</a></div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>#</th>
                <th>Название</th>
                <th>Дата</th>
                <th>Активная</th>
            </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($allNews as $news)
                    <?php $count++; ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td><a href="/CPanel/news/{{ $news->id }}">{{ $news->title }}</a></td>
                        <td class="text-center">{{ $news->news_date }}</td>
                        <td class="text-center">
                            <form method="post" action="/CPanel/news/change-state">
                                {{ csrf_field() }}
                                <input type="hidden" name="id" value="{{$news->id}}">
                                @if ( $news->active == 1 )
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
    <div class="row text-center">
        {!! $allNews->render() !!}
    </div>
@endsection