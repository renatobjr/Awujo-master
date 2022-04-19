<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="{{ base_url('resources/css/materialize.css') }}" media="screen,projection">
    <link rel="stylesheet" href="{{ base_url('resources/css/materialize.print.css') }}" media="print">
    <link rel="icon" type="image/png" sizes="96x96" href="{{ base_url('resources/ico/favicon-96x96.png') }}">
    <title>Impressão de cadastro</title>
</head>
<body class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="" class="img-responsive" height="100px">
            <img src="{{ base_url('resources/svg/logo.svg') }}" alt="" class="img-responsive right" height="100px">
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <h5 class="light">Ficha cadastral de Responsável</h5>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m12 l12">
            <h6 class="light">Informaçãoes Pessoais</h6>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l3">
            <p class="light"><b>Nome completo:</b> {{ $nome_responsavel }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>CPF: </b><span class="cpf">{{ $cpf }}</span></p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>NIS: </b><span class="nis">{{ $nis }}</span></p>
        </div>
    </div>
    <div class="row">
        <div class="col m2 l2">
            <p class="light"><b>Idade: </b>{{ $idade }} Anos</p>
        </div>
        <div class="col m3 l2">
            <p class="light"><b>Raça: </b>
                @php
                    switch ($raca) {
                        case 1:
                            echo 'Negra';
                            break;
                        case 2:
                            echo 'Branca';
                            break;
                        case 3:
                            echo 'Parda';
                            break;
                        case 4:
                            echo 'Indígena';
                            break;
                        case 5:
                            echo 'Outra não especificada';
                            break;
                    }
                @endphp
            </p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Escolaridade: </b>
                @php
                    switch ($escolaridade) {
                        case 1:
                            echo 'Sem Escolaridade';
                            break;
                        case 2:
                            echo 'Fundamental I';
                            break;
                        case 3:
                            echo 'Fundamental II';
                            break;
                        case 4:
                            echo 'Ensino Médio';
                            break;
                        case 5:
                            echo 'Superior Completo';
                            break;
                    }
                @endphp
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l3">
            <p class="light"><b>Telefone: </b>{{ $telefone_fixo }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Celular: </b>{{ $telefone_movel }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Pessoa para contato: </b>{{ $pessoa_contato }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l3">
            <p class="light"><b>Endereço: </b>{{ $rua }}</p>
        </div>
        <div class="col m3 l2">
            <p class="light"><b>Número: </b>{{ $numero }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Bairro: </b>{{ $bairro }}</p>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m12 l12">
            <h6 class="light">Composição Familiar</h6>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l3">
            <p class="light"><b>Crianças até 06 anos: </b>{{ $criancas_ate_06_anos }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Crianças de 07 até 17 anos: </b>{{ $criancas_entre_07_17_anos }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Adultos: </b>{{ $adultos }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Idosos: </b>{{ $idosos }}</p>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l3">
            <p class="light"><b>Pessoa com dificiência: </b>{{ ($pessoa_deficiencia == 0) ? 'Não' : 'Sim'  }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Tipo da Deficiência: </b>{{ $tipo_deficiencia  }}</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Nome da pessoa: </b>{{ $nome_deficiente  }}</p>
        </div>
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col s12 m12 l12">
            <h6 class="light">Informações Sócioeconômicas</h6>
        </div>
        <div class="row">
            <div class="col m3 l3">
                <p class="light"><b>Renda do responsável: </b>R$ {{ $renda_responsavel }}</p>
            </div>
            <div class="col m3 l3">
                <p class="light"><b>Renda Total dos adultos: </b>R$ {{ $renda_adultos }}</p>
            </div>
            <div class="col m3 l3">
                <p class="light"><b>Renda Total: </b>R$ {{ $renda_total }}</p>
            </div>
        </div>
        <span class="col m12 l12">Programas do Governo Federal</span>
        <div class="row">
            <div class="col m2 l2">
                <p class="light"><b>Nenhum programa: </b> {{ ($nenhum_programa == 0) ? 'Não' : 'Sim' }}</p>
            </div>
            <div class="col m2 l2">
                <p class="light"><b>Bolsa Família: </b> {{ ($bolsa_familia == 0) ? 'Não' : 'Sim' }}</p>
            </div>
            <div class="col m2 l2">
                <p class="light"><b>BPC: </b> {{ ($bpc == 0) ? 'Não' : 'Sim' }}</p>
            </div>
            <div class="col m2 l2">
                <p class="light"><b>Aposentadoria: </b> {{ ($aposentadoria == 0) ? 'Não' : 'Sim' }}</p>
            </div>
            <div class="col m2 l2">
                <p class="light"><b>Pensão: </b> {{ ($pensao == 0) ? 'Não' : 'Sim' }}</p>
            </div>
            <div class="col m2 l2">
                <p class="light"><b>Benefício Eventual: </b> {{ ($beneficio_eventual == 0) ? 'Não' : 'Sim' }}</p>
            </div>
        </div>
        <div class="divider"></div>
        <div class="row">
            <div class="col m12 l12">
                <p class="light">Cadastro realizado em {{ date('d/m/Y', strtotime($criado_em)) }} às
                    {{ date('H:i', strtotime($criado_em)) }} por {{ $nome_completo }}</p>
            </div>
        </div>
    </div>
    <script src="{{ base_url('resources/js/jquery-3.3.1.min.js') }}"></script>
    <script src="{{ base_url('resources/js/materialize.min.js') }}"></script>
    <script src="{{ base_url('resources/js/jquery.mask.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.nis').mask('0.000.000.000-0', { reverse: true});
        })
    </script>
    </body>
</html>