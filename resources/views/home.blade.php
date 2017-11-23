@extends('layouts.master')

@section('title')
    "Импорт и Экспорт SV" сервис юр услуг
@endsection

@section('content')
    <div class="intro">
        <div class="intro__mask">
            <div class="intro__container">
                <div class="intro__text intro__text_top">
                    Ваше желание -<br />
                    Мы путеводитель
                </div>
                <div class="intro__text intro__text_bottom">
                    Вы производите - &nbsp;&nbsp;&nbsp;<br />
                    мы способствуем<br />
                    продвижению
                </div>
            </div>
        </div>
    </div>
    <div class="news">
        @foreach($allNews as $news)
            <span class="news__data"
                data-link="/news/{{ $news->id }}"
                data-text="{{ $news->title }}">
            </span>
        @endforeach
        <div class="news__container">
            <a href="/news" target="_blank">
                <img class="news__img" src="/img/news_promo.png">
            </a>
            <div class="news__text">
                <a href="#" class="news__link" target="_blank" id="news__link"></a>
            </div>
        </div>
    </div>
    <div class="about-us">
        <div class="about-us__container">
            <h2 class="main-title">
                Import & Export Service SV
            </h2>
            <div class="about-us__text">
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_01.png">
                    </div>
                    <div class="about-item__title">Большой опыт</div>
                    <div class="about-item__text">
                        Многолетний опыт деятельности I&E операций в направлениях промышленного производства,
                        сельскохозяйственной деятельности, Мы постараемся помочь в организации бизнес  процесса
                        пошагово, дабы результат превышал желаемое Вами.
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_02.png">
                    </div>
                    <div class="about-item__title">Работа под ключ</div>
                    <div class="about-item__text">
                        Предоставляем клиенту любую юридическую консультацию, связанную с внешнеэкономической
                        деятельностью, по вопросам закупки/продажи товаров, заключение ВЕД договоров, а также вопросов
                        таможенного оформления в Украине до момента получении валютной выручки за Товар.
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_03.png">
                    </div>
                    <div class="about-item__title">Уникальная практика</div>
                    <div class="about-item__text">
                        Снижаем Ваши трудовые и финансовые  нагрузки уже с 1-го дня сотрудничества. Оптимизация сроков,
                        расходов и усилий на общение с нерезидентами, транспортниками, органами сертификации,
                        таможенными брокерами.
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_04.png">
                    </div>
                    <div class="about-item__title">Эффективность</div>
                    <div class="about-item__text">
                        Вам не нужно содержать в штате ряд специалистов направлений менеджера ВЭД, юридического,
                        логистики, финансов. В случаи необходимости Вам дополнительных трудовых ресурсов в пиковые
                        периоды поставок. Если, Ваш специалист выпадает на каком-то бизнес процессе, мы готовы заменить.
                        Или Вы молодая компания без опыта в ВЭД.
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_05.png">
                    </div>
                    <div class="about-item__title">Гарантия качества</div>
                    <div class="about-item__text">
                        Мы на страже защиты Ваших интересов. Решаем любые не стандартные ситуации импорт & экспортных
                        операциях, но важнее наша задача предусмотреть и избежать таких ситуаций. Мы освобождаем Ваше
                        время и усилия для других дел. Любим свое дело и получаем удовольствие, когда облегчаем Вам жизнь.
                    </div>
                </div>
                <div class="about-item">
                    <div class="about-item__img-container">
                        <img class="about-item__img" src="/img/intro_06.png">
                    </div>
                    <div class="about-item__title">Доступность</div>
                    <div class="about-item__text">
                        Вы самостоятельно выбираете стоимость и способ оплаты исходя из Ваших финансовых возможностей,
                        а также исходя из сложностей Вашей конкретной ситуации.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="services">
        <div class="services__header">
            <h2 class="main-title main-title_white">
                Наши сервисы
            </h2>
        </div>
        <div class="services__container">
            @for ($i=0; $i<count($services); $i++)
                <div class="services__item" data-servId="{{ $services[$i]['id'] }}">
                    <a href="/services/{{ $services[$i]['id'] }}">
                        <img class="services__item-img" src="{{ $services[$i]['promo_img_path'] }}">
                        <div class="services__item-title">
                            {{ $services[$i]['promo_title'] }}
                        </div>
                        <div class="curtain" data-servId="{{ $services[$i]['id'] }}">
                            <div class="curtain__text">
                                {{ $services[$i]['promo_descr'] }}
                            </div>
                        </div>
                    </a>
                </div>
            @endfor
        </div>
    </div>
    <div class="ask-question">
        <div class="ask-question__container">
            <div class="ask-question__content">
                <h2 class="main-title main-title_pink">
                    Задайте нам вопрос
                </h2>
                <div class="ask-question__text">
                    Мы готовы помочь Вам. Свяжитесь с нами, и мы найдем подходящее решение для Вас.
                </div>
                <div class="ask-question__button" id="ask-question__button">Связаться</div>
            </div>
            <img class="ask-question__img" src="img/ask-question_foto.png">
        </div>
        <div class="form-question">
            <div class="form-question__content">
                <div class="form-question__container">
                    <h2 class="main-title main-title_white">
                        Свяжитесь с нами
                    </h2>
                    <form class="forms forms_columns" method="post" action="/questions/create">
                        {{ csrf_field() }}
                        <div class="forms__row">
                            <div class="forms__column">
                                <input class="forms__input" type="text" placeholder="Имя *" name="name" maxlength="50" required>
                                <input class="forms__input" type="text" placeholder="Фамилия"  name="surname" maxlength="50">
                                <input class="forms__input" type="text" placeholder="Организация" name="structure" maxlength="150">
                                <input class="forms__input" type="text" placeholder="Телефон" name="phone" pattern="^((8|\+38)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{5,10}$">
                                <input class="forms__input" type="email" placeholder="Еmail *" name="email" maxlength="50" required>
                            </div>
                            <div class="forms__column">
                                <input class="forms__input" type="text" placeholder="Тема письма *" name="title" maxlength="150" required>
                                <textarea class="forms__text-area" rows=6 placeholder="Сообщение *" name="text" maxlength="500" required>
                                </textarea>
                                <div class="forms__info">* - обязательные поля</div>
                            </div>
                        </div>
                        <div class="forms__row">
                            <input class="forms__submit" type="submit" value="Отправить сообщение">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection