<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="keywords" content="импорт експорт аутсорсинг консультация аккредитация таможенные платежи Украина
        логистика законодательство нетарифное регулирование сопровождение юридические внешнеторговый контракт Винница" />
        <meta name="description" content="Аутсорсинг I&E это полный пакет услуг по внешнеэкономической деятельности,
        поиске рынка сбыта с/х товаров, аккредитация поставщика и покупателя, организации логистики, страхования товара
        в Украине"/>
        <title>
            @yield('title')
        </title>
        <link rel="shortcut icon" href="/img/favicon.png" type="image/x-icon">

        <link rel="stylesheet" href="/css/fonts.css">
        <link rel="stylesheet" href="/css/reset.css">
        <link rel="stylesheet" href="/css/main.css">

    </head>
    <body class="body">
        @include('layouts.header')
        <div class="wrapper wrapper_grey">
            <div class="content">
                @yield('content')
            </div>
            @include('layouts.footer')
        </div>
        <script src="/libs/jquery-3.2.1.min.js"></script>
        <script src="/js/index.js"></script>
        <script src="/libs/printingText.js"></script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-107939928-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-107939928-1');
        </script>
    </body>
</html>