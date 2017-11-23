@extends('layouts.CPanel.master')

@section('content')
    <div class="row">
        <h2 class="text-center">Список всех вопросов</h2>
    </div>
    <div class="row">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Номер</th>
                    <th>Тема</th>
                    <th>Почта</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>
                <?php $count = 0; ?>
                @foreach($questions as $question)
                    <?php $count++; ?>
                    <tr>
                        <td>{{ $count }}</td>
                        <td>{{ $question->id }}</td>
                        <td>
                            <a href="/CPanel/questions/{{ $question->id }}">{{ $question->title }}</a>
                            @if ($question->state_new == 1)
                                <span class="label label-success">Новый</span>
                            @endif
                        </td>
                        <td>{{ $question->email }}</td>
                        <td>{{ $question->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row text-center">
        {!! $questions->render() !!}
    </div>
@endsection