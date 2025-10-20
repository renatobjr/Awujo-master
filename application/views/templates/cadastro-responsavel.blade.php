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

  <style>
  body {
    background-color: #fff;
    font-size: 12px;
    line-height: 1.2;
  }

  h5 {
    margin: 10px 0;
  }

  h6 {
    margin: 8px 0;
    font-size: 14px;
    font-weight: 500;
  }

  p {
    margin: 2px 0;
  }

  table th,
  table td {
    font-size: 12px;
  }

  .logo-container img {
    height: 60px;
  }

  .divider {
    margin: 8px 0;
  }

  @media print {
    @page {
      size: A4 portrait;
      margin: 1cm;
    }

    body {
      -webkit-print-color-adjust: exact;
      color-adjust: exact;
      font-size: 11px;
    }

    .no-print {
      display: none !important;
    }

    img {
      max-height: 60px;
    }

    .row {
      margin-bottom: 4px;
    }

    .col p {
      font-size: 11px;
    }
  }
  </style>
</head>

<body class="container">
  <div class="row">
    <div class="col s6">
      <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="Logo 1" height="60">
    </div>
    <div class="col s6 right-align">
      <img src="{{ base_url('resources/svg/logo.svg') }}" alt="Logo 2" height="60">
    </div>
  </div>

  <h5 class="light center-align">Ficha cadastral de Responsável</h5>
  <div class="divider"></div>

  <h6 class="light">Informações Pessoais</h6>
  <div class="row">
    <div class="col s4">
      <p><b>Nome:</b> {{ $nome_responsavel }}</p>
    </div>
    <div class="col s4">
      <p><b>CPF:</b> <span class="cpf">{{ $cpf }}</span></p>
    </div>
    <div class="col s4">
      <p><b>NIS:</b> <span class="nis">{{ $nis }}</span></p>
    </div>
  </div>

  <div class="row">
    <div class="col s3">
      <p><b>Idade:</b> {{ $idade }} anos</p>
    </div>
    <div class="col s3">
      <p><b>Raça:</b>
        @php
        switch ($raca) {
        case 1: echo 'Negra'; break;
        case 2: echo 'Branca'; break;
        case 3: echo 'Parda'; break;
        case 4: echo 'Indígena'; break;
        case 5: echo 'Outra'; break;
        }
        @endphp
      </p>
    </div>
    <div class="col s6">
      <p><b>Escolaridade:</b>
        @php
        switch ($escolaridade) {
        case 1: echo 'Sem Escolaridade'; break;
        case 2: echo 'Fundamental I'; break;
        case 3: echo 'Fundamental II'; break;
        case 4: echo 'Ensino Médio'; break;
        case 5: echo 'Superior Completo'; break;
        }
        @endphp
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col s4">
      <p><b>Telefone:</b> {{ $telefone_fixo }}</p>
    </div>
    <div class="col s4">
      <p><b>Celular:</b> {{ $telefone_movel }}</p>
    </div>
    <div class="col s4">
      <p><b>Contato:</b> {{ $pessoa_contato }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col s6">
      <p><b>Endereço:</b> {{ $rua }}, nº {{ $numero }}</p>
    </div>
    <div class="col s6">
      <p><b>Bairro:</b> {{ $bairro }}</p>
    </div>
  </div>

  <div class="divider"></div>

  <h6 class="light">Composição Familiar</h6>
  <div class="row">
    <div class="col s3">
      <p><b>Até 6 anos:</b> {{ $criancas_ate_06_anos }}</p>
    </div>
    <div class="col s3">
      <p><b>07 a 17 anos:</b> {{ $criancas_entre_07_17_anos }}</p>
    </div>
    <div class="col s3">
      <p><b>Adultos:</b> {{ $adultos }}</p>
    </div>
    <div class="col s3">
      <p><b>Idosos:</b> {{ $idosos }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col s4">
      <p><b>Pessoa com deficiência:</b> {{ ($pessoa_deficiencia == 0) ? 'Não' : 'Sim' }}</p>
    </div>
    <div class="col s4">
      <p><b>Tipo:</b> {{ $tipo_deficiencia }}</p>
    </div>
    <div class="col s4">
      <p><b>Nome:</b> {{ $nome_deficiente }}</p>
    </div>
  </div>

  <div class="divider"></div>

  <h6 class="light">Informações Socioeconômicas</h6>
  <div class="row">
    <div class="col s4">
      <p><b>Renda responsável:</b> R$ {{ $renda_responsavel }}</p>
    </div>
    <div class="col s4">
      <p><b>Renda adultos:</b> R$ {{ $renda_adultos }}</p>
    </div>
    <div class="col s4">
      <p><b>Total:</b> R$ {{ $renda_total }}</p>
    </div>
  </div>

  <h6 class="light">Programas do Governo</h6>
  <div class="row">
    <div class="col s4">
      <p><b>Bolsa Família:</b> {{ ($bolsa_familia == 0) ? 'Não' : 'Sim' }}</p>
    </div>
    <div class="col s4">
      <p><b>BPC:</b> {{ ($bpc == 0) ? 'Não' : 'Sim' }}</p>
    </div>
    <div class="col s4">
      <p><b>Aposentadoria:</b> {{ ($aposentadoria == 0) ? 'Não' : 'Sim' }}</p>
    </div>
  </div>
  <div class="row">
    <div class="col s4">
      <p><b>Pensão:</b> {{ ($pensao == 0) ? 'Não' : 'Sim' }}</p>
    </div>
    <div class="col s4">
      <p><b>Benefício Eventual:</b> {{ ($beneficio_eventual == 0) ? 'Não' : 'Sim' }}</p>
    </div>
    <div class="col s4">
      <p><b>Nenhum Programa:</b> {{ ($nenhum_programa == 0) ? 'Não' : 'Sim' }}</p>
    </div>
  </div>

  <div class="divider"></div>

  <p><b>Cadastro realizado em:</b> {{ date('d/m/Y', strtotime($criado_em)) }} às
    {{ date('H:i', strtotime($criado_em)) }} por {{ $nome_completo }}</p>

  <div class="row no-print">
    <div class="col s12 center-align" style="margin-top: 20px;">
      <a href="javascript:window.print()" class="btn blue waves-effect">
        <i class="material-icons left">print</i> Imprimir
      </a>
    </div>
  </div>

  <script src="{{ base_url('resources/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ base_url('resources/js/materialize.min.js') }}"></script>
  <script src="{{ base_url('resources/js/jquery.mask.js') }}"></script>
  <script>
  $(document).ready(function() {
    $('.cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('.nis').mask('0.000.000.000-0', {
      reverse: true
    });
  });
  </script>
</body>

</html>