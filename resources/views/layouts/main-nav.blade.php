<ul class="main-nav">
    <li class="main-nav__item" data-tab="Services">
        <a class="main-nav__link" data-tab="Services" href="/services/{{ $services[0]['id'] }}">Сервисы</a>
        <div class="drop-menu" data-tab="Services">
            <div class="drop-menu__container">
                <img class="drop-menu__img" src="/img/menu-services.jpg">
                <div class="drop-menu__content">
                    <h3>Наши сервисы</h3>
                    <div class="drop-menu__text">
                        Мы предоставляем полный спектр юридических услуг связанных с внешнеэкономической деятельностью,
                        вопросам таможенного оформления, хозяйственного, наследственного, трудового, а также земельного законодательства.
                        Способствуем и предоставим всю необходимую информацию для успешного развития Вашего бизнеса.
                    </div>
                </div>
                <ul class="drop-menu__list">
                    @if ( count($services) > 5 )
                        <?php $maxService = 5; ?>
                    @else
                        <?php $maxService = count($services); ?>
                    @endif
                    @for ($i=0; $i<$maxService; $i++)
                        <li class="drop-menu__list-item">
                            <a class="drop-menu__list-link" href="/services/{{ $services[$i]['id'] }}">{{ $services[$i]['promo_title'] }}</a>
                        </li>
                    @endfor
                    @if ( count($services) > 0)
                        <li class="drop-menu__list-item drop-menu__list-item_last"><a class="drop-menu__list-link" href="/services/{{ $services[0]['id'] }}">Полный список сервисов</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </li>
    <li class="main-nav__item" data-tab="Documents">
        <a class="main-nav__link" data-tab="Documents" href="/documents">Документы</a>
        <div class="drop-menu" data-tab="Documents">
            <div class="drop-menu__container">
                <img class="drop-menu__img" src="/img/menu-documents.jpg">
                <div class="drop-menu__content drop-menu__content_wide">
                    <h3>Наши документы</h3>
                    <div class="drop-menu__text drop-menu__text_wide">
                        <p class="drop-menu__text-line">
                            «Прозрачность» и «Доступность» - залог плодотворного партнёрского отношения.
                        </p>
                        <p class="drop-menu__text-line drop-menu__text-line_bottom">
                            <a class="drop-menu__text-link" href="/documents">Все документы</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </li>
    <li class="main-nav__item" data-tab="Contacts">
        <span class="main-nav__link" data-tab="Contacts" href="#">
            Контакты
        </span>
        <div class="drop-menu" data-tab="Contacts">
            <div class="drop-menu__container">
                <img class="drop-menu__img" src="/img/menu-contacts.jpg">
                <div class="drop-menu__content drop-menu__content_wide">
                    <h3>Наши контакты</h3>
                    <div class="drop-menu__text drop-menu__text_wide">
                        <p class="drop-menu__text-line drop-menu__text-line_contacts">
                            <span class="icon icon__phone icon_green"></span> +38(096)89-11-891
                        </p>
                        <p class="drop-menu__text-line drop-menu__text-line_contacts">
                            <span class="icon icon__phone icon_green"></span> +38(050)71-21-970
                        </p>
                        <p class="drop-menu__text-line drop-menu__text-line_contacts">
                            <span class="icon icon__skype icon_sky-blue"></span> svlyashko
                        </p>
                        <p class="drop-menu__text-line drop-menu__text-line_contacts">
                            <span class="icon icon__mail"></span> svlyashko@ukr.net
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </li>
</ul>