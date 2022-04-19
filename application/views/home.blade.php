<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ base_url('resources/css/materialize.css') }}" media="screen,projection">
    <title>{{ $title }}</title>
</head>
<body class="container">
    <div class="preloader-background">
        <div class="preloader-wrapper big active">
            <div class="spinner-layer spinner-indigo">
                <div class="circle-clipper left">
                    <div class="circle"></div>
                </div>
                <div class="gap-patch">
                    <div class="circle"></div>
                </div>
                <div class="circle-clipper right">
                    <div class="circle"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="padding-top: 8vh">
        <div class="col s12 m12 l4 offset-l4">
            <div class="row">
                <div class="col s12 m12 l12 center">
                    <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="" class="responsive-img" style="height: 30vh">
                </div>
            </div>
            <div class="row">
                {!! form_open('login','class="col s12 m12 l12 id="login"') !!}
                <div class="row">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">email</i>
                        <input type="text" name="email-usuario" id="email-usuario"
                               class="validate @if (form_error('email-usuario')) {{ 'invalid' }} @endif"
                               value="{{ set_value('email-usuario') }}">
                        <label for="email-usuario">Email</label>
                        <span class="helper-text" data-error="{!! form_error('email-usuario') !!}"></span>
                    </div>
                </div>
                <div class="row center">
                    <div class="input-field col s12 m12 l12">
                        <i class="material-icons prefix">lock</i>
                        <input type="password" name="passwd" id="passwd"
                               class="validate @if (form_error('passwd')) {{ 'invalid' }} @endif"
                               value="{{ set_value('passwd') }}">
                        <label for="passwd">Senha</label>
                        <span class="helper-text" data-error="{!! form_error('passwd') !!}"></span>
                    </div>
                </div>
                <div class="row center">
                    <button type="submit" id="login" class="btn waves-effect waves-light green darken-3">Login</button>
                </div>
                {!! form_close() !!}
            </div>
        </div>
    </div>
<script src="{{ base_url('resources/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ base_url('resources/js/materialize.js') }}"></script>
<script>
    document.addEventListener("DOMContentLoaded", function(){
        $('.preloader-background').delay(1700).fadeOut('slow');

        $('.preloader-wrapper')
            .delay(1700)
            .fadeOut();
    });
    @if(isset($_SESSION['success']))
        var mensagem = '{{ $_SESSION['success'] }}';
        M.toast({html: mensagem,displayLength: 4000,classes:'green darken-4'});
    @endif
    @if(isset($_SESSION['error']))
        var mensagem = '{{ $_SESSION['error'] }}';
        M.toast({html: mensagem,displayLength: 4000,classes:'red'});
    @endif
</script>
</body>
</html>
