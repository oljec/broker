@extends('layouts.master')

@section('title')
    Новости || "Импорт и Экспорт SV" сервис юр услуг
@endsection

@section('content')
    <div class="full-content">
        <div class="sidebar">
            <h3>
                Последние новости
            </h3>
            <ul class="services-menu">
                @foreach ($allNews as $newsItem)
                    <li class="services-menu__item">
                        <a class="services-menu__link
                            @if ($newsItem->id == $news->id)
                                services-menu__link_active
                            @endif
                                " href="/news/{{ $newsItem->id }}">
                            {{ $newsItem->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr>
            <ul class="services-menu">
                <li class="services-menu__item">
                    <a class="services-menu__link" href="/news">Все новости</a>
                </li>
            </ul>
        </div>
        <div class="service-container">
            <h2 class="news-title">
                {{ $news->title }}
            </h2>
            <div class="allNews__date">
                {{ \Carbon\Carbon::parse($news->news_date)->format('d/m/Y') }}
            </div>
            @if ( !empty($news->img_path))
                <img class="service-container__img" src="{{ $news->img_path }}">
            @endif
            <div class="service-text">
                {!! $news->text !!}
            </div>
        </div>
    </div>
@endsection