<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <title>CPanel</title>

        <link href="/libs/bootstrap.min.css" rel="stylesheet">
        <link href="/css/reset.css" rel="stylesheet">
        <link href="/css/dashboard.css" rel="stylesheet">

        <script src="/libs/ckeditor/ckeditor.js"></script>
    </head>
    <body>
        <div class="login__container col-sm-8">
            <div class="row">
                <div class="col-sm-11 text-center">
                    <h2>Вход в админ панель</h2>
                    @if($errors->any())
                        <h4 class="red">{{$errors->first()}}</h4>
                    @endif
                    <form method="post" action="/CPanel/login">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="name">Логин:</label>
                            <input type="text" class="form-control" id="name" placeholder="Логин" name="name">
                        </div>
                        <div class="form-group">
                            <label for="password">Пароль:</label>
                            <input type="password" class="form-control" id="password" placeholder="Пароль" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary">Войти</button>
                    </form>
                </div>
            </div>
        </div>
        <script src="/libs/jquery-3.2.1.min.js"></script>
        <script src="/libs/bootstrap.min.js"></script>
    </body>
</html>