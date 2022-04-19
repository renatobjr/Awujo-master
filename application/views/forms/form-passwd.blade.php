<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ base_url('resources/css/materialize.css') }}" media="screen,projection">
    <title>Finalizar Cadastro</title>
</head>
<body class="container">
<div class="row" style="padding-top: 2vh ">
    <div class="col s12 m12 l4 offset-l4">
        <div class="row">
            <div class="col s12 m12 l12 center">
                <img src="{{ base_url('resources/svg/awujo.logo.simple.svg') }}" alt="" class="responsive-img" style="height: 10vh">
                <h4 class="light">Olá, seja bem vindo!</h4>
                <h5 class="light">
                    Vamos finalizar o seu cadastro e garantir o seu acesso a plataforma colaborativa Awujo,
                    para isso basta você escolher uma senha.
                </h5>
            </div>
        </div>
        <div class="row">
            {!! form_open('cadastrar-senha','class="col s12 m12 l12 id="cadastrar-senha"') !!}
            <input type="hidden" name="token" value="{{ $token }}">
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="passwd" id="passwd"
                           class="validate @if (form_error('senha-usuariio')) {{ 'invalid' }} @endif"
                           value="{{ set_value('passwd') }}">
                    <label for="passwd">Senha</label>
                    <span class="helper-text" data-error="{!! form_error('passwd') !!}"></span>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12 m12 l12">
                    <i class="material-icons prefix">lock</i>
                    <input type="password" name="confirmar-passwd" id="confirmar-passwd"
                           class="validate @if (form_error('confirmar-passwd')) {{ 'invalid' }} @endif"
                           value="{{ set_value('confirmar-passwd') }}">
                    <label for="confirmar-passwd">Redigite a senha</label>
                    <span class="helper-text" data-error="{!! form_error('confirmar-passwd') !!}"></span>
                </div>
            </div>
            <div class="row center">
                <button type="submit" id="cadastrar-senha" class="btn waves-effect waves-light green darken-3">Salvar</button>
            </div>
            {!! form_close() !!}
        </div>
    </div>
</div>

<script src="{{ base_url('resources/js/jquery-3.3.1.min.js') }}"></script>
<script src="{{ base_url('resources/js/materialize.min.js') }}"></script>
</body>
</html>
