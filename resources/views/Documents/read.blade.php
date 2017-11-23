@extends('layouts.master')

@section('title')
    Документы || "Импорт и Экспорт SV" сервис юр услуг
@endsection

@section('content')
    <div class="full-content">
        <div class="documents-container">
            <h2 class="documents-title">
                Наши документы
            </h2>
            @foreach ($documents as $document)
                <div class="document">
                    <div class="document__container">
                        <div class="document__title">
                            {{ $document->title }}
                        </div>
                        <img src="{{ $document->img_path }}" class="document__img" data-docId="{{ $document->id }}">
                        <a href="{{ $document->file_path }}" download="{{ $document->file_name }}" class="document__link">
                            скачать {{ $document->file_name }}
                        </a>
                        <div class="document__mask" data-docId="{{ $document->id }}">
                            <img src="{{ $document->img_path }}" class="document__full-img">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection