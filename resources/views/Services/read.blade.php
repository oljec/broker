@extends('layouts.master')

@section('title')
    {{ $service['promo_title'] }} || "Импорт и Экспорт SV" сервис юр услуг
@endsection

@section('content')
    <div class="full-content">
        <div class="sidebar">
            <h3>
                Наши сервисы
            </h3>
            <ul class="services-menu">
                @for ($i=0; $i<count($services); $i++)
                    <li class="services-menu__item">
                        <a class="services-menu__link
                            @if ($services[$i]['id'] == $service->id)
                                services-menu__link_active
                            @endif
                            " href="/services/{{ $services[$i]['id'] }}">

                            {{ $services[$i]['promo_title'] }}
                        </a>
                    </li>
                @endfor
            </ul>
        </div>
        <div class="service-container">
            <h2 class="service-title">
                {{ $service->title }}
            </h2>
            @if ( !empty($service->img_path))
                <img class="service-container__img" src="{{ $service->img_path }}">
            @endif
            <div class="service-text">
                {!! $service->text !!}
            </div>
            <div class="service-container__button" id="service-container__button">Заказать</div>
            <div class="form-service">
                <div class="form-service__content">
                    <div class="form-service__container">
                        <h2 class="service-title">
                            Заказать сервис
                        </h2>
                        <form class="forms" method="post" action="/orders/create">
                            {{ csrf_field() }}
                            <div class="forms__row">
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Cервис *:</span>
                                    <select class="forms__select forms__select_low-right" name="service_id">
                                        @for ($i=0; $i<count($services); $i++)
                                            <option value="{{ $services[$i]['id'] }}"
                                                @if ($services[$i]['id'] == $service->id)
                                                    selected
                                                @endif
                                                >
                                                {{ $services[$i]['promo_title'] }}
                                            </option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Имя *:</span>
                                    <input class="forms__input forms__input_low-right" type="text" placeholder="Иван"
                                           maxlength="50" name="name" required>
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Фамилия:</span>
                                    <input class="forms__input forms__input_low-right" type="text" placeholder="Иванов"
                                           maxlength="50" name="surname">
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Организация:</span>
                                    <input class="forms__input forms__input_low-right" type="text" placeholder="Дом"
                                           maxlength="150" name="structure">
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Телефон *:</span>
                                    <input class="forms__input forms__input_low-right" type="text"
                                           placeholder="+38(099)1234567" name="phone"
                                           pattern="^((8|\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$" required>
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">eMail:</span>
                                    <input class="forms__input forms__input_low-right" type="email"
                                           placeholder="ivanov@gmail.com" maxlength="50" name="email">
                                </div>
                                <div class="forms__input-row">
                                    <span class="forms__input-span">Комментарий:</span>
                                    <textarea class="forms__text-area forms__text-area_low-right" rows=2
                                              placeholder="Комментарий" maxlength="500" name="comments"></textarea>
                                </div>
                                <div class="forms__info forms__info_black">* - обязательные поля</div>
                            </div>
                            <div class="forms__row">
                                <button class="forms__submit" type="submit">Заказать</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection