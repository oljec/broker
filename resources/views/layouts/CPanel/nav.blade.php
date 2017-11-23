<ul class="CPanel-menu">
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel">Главная</a></li>
    <li class="CPanel-menu__item">
        <a class="CPanel-menu__link" href="/CPanel/all-orders">
            Заказы
            @if (! empty($orderCount) && $orderCount > 0)
                <span class="badge badge-danger">{{ $orderCount }}</span>
            @endif
        </a>
    </li>
    <li class="CPanel-menu__item">
        <a class="CPanel-menu__link" href="/CPanel/all-questions">
            Вопросы
            @if (! empty($questionCount) && $questionCount > 0)
                <span class="badge badge-danger">{{ $questionCount }}</span>
            @endif
        </a>
    </li>
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel/all-news">Новости</a></li>
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel/all-services">Сервисы</a></li>
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel/all-documents">Документы</a></li>
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel/settings">Другая информация</a></li>
    <li class="CPanel-menu__item"><a class="CPanel-menu__link" href="/CPanel/logout">Выйти</a></li>
</ul>