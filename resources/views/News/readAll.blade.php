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
                @foreach ($menuNews as $news)
                    <li class="services-menu__item">
                        <a class="services-menu__link" href="/news/{{ $news->id }}">
                            {{ $news->title }}
                        </a>
                    </li>
                @endforeach
            </ul>
            <hr>
            <ul class="services-menu">
                <li class="services-menu__item">
                    <a class="services-menu__link services-menu__link_active" href="/news">Все новости</a>
                </li>
            </ul>
        </div>
        <div class="allNews-container">
            <?php $count=0; ?>
            @foreach ($allNews as $news)
                <?php $count++; ?>
                <div class="allNews">
                    <h2 class="allNews-title">
                        <a class="allNews__link" href="/news/{{ $news->id }}">
                            {{ $news->title }}
                        </a>
                    </h2>
                    <div class="allNews__date">
                        {{ \Carbon\Carbon::parse($news->news_date)->format('d/m/Y') }}
                    </div>
                    @if ( !empty($news->img_path) )
                        <img class="allNews__img
                            <?php
                                if ($count % 2 == 0)
                                    echo " allNews__img_right";
                        ?>
                        " src="{{ $news->img_path }}">
                    @endif
                    <div class="allNews__text">
                        {!! $news->promo_text !!}
                    </div>
                    <div class="allNews__link-container
                        <?php
                            if ($count % 2 == 0)
                                echo " allNews__link-container_left";
                    ?>
                    ">
                        <a class="allNews__link_bottom" href="/news/{{ $news->id }}">Читать полностью</a>
                    </div>
                </div>
                <hr>
            @endforeach
            <div class="custom-pagination">
                {!! $allNews->render() !!}
            </div>
        </div>
    </div>
@endsection