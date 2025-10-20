<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ base_url('resources/css/materialize.css') }}" media="screen,projection">
  <link rel="stylesheet" href="{{ base_url('resources/css/materialize.print.css') }}" media="print">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ base_url('resources/ico/favicon-96x96.png') }}">
  <title>Impressão de Matrícula</title>

  <style>
  body {
    background-color: #fff;
    font-size: 12px;
    line-height: 1.2;
  }

  h5 {
    margin: 10px 0;
    text-align: center;
    font-weight: 500;
  }

  h6 {
    margin: 8px 0;
    font-size: 14px;
    font-weight: 500;
  }

  p {
    margin: 2px 0;
  }

  .divider {
    margin: 8px 0;
  }

  .logos img {
    height: 60px;
  }

  @media print {
    @page {
      size: A4 portrait;
      margin: 1cm;
    }

    body {
      font-size: 11px;
      -webkit-print-color-adjust: exact;
      color-adjust: exact;
    }

    .no-print {
      display: none !important;
    }

    .row {
      margin-bottom: 4px !important;
    }

    p,
    h5,
    h6 {
      page-break-inside: avoid;
    }

    img {
      max-height: 60px;
    }
  }
  </style>
</head>

<body class="container">
  <div class="row logos">
    <div class="col s6">
      <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="Logo Awujo">
    </div>
    <div class="col s6 right-align">
      <img src="{{ base_url('resources/svg/logo.svg') }}" alt="Logo Prefeitura">
    </div>
  </div>

  <h5>Matrícula do Aluno</h5>
  <div class="divider"></div>

  <h6>Informações Pessoais</h6>
  <div class="row">
    <div class="col s6 m4 l4">
      <p><b>Nome do aluno:</b> {{ $beneficiario['nome_beneficiario'] }}</p>
    </div>
    <div class="col s6 m4 l4">
      <p><b>Responsável:</b> {{ $beneficiario['nome_responsavel'] }}</p>
    </div>
    <div class="col s6 m2 l2">
      <p><b>CPF:</b> <span class="cpf">{{ $beneficiario['cpf_beneficiario'] }}</span></p>
    </div>
    <div class="col s6 m2 l2">
      <p><b>NIS:</b> <span class="nis">{{ $beneficiario['nis_beneficiario'] }}</span></p>
    </div>
  </div>

  <div class="row">
    <div class="col s3">
      <p><b>Raça:</b>
        @php
        switch ($beneficiario['raca']) {
        case 1: echo 'Negra'; break;
        case 2: echo 'Branca'; break;
        case 3: echo 'Parda'; break;
        case 4: echo 'Indígena'; break;
        case 5: echo 'Outra'; break;
        }
        @endphp
      </p>
    </div>
    <div class="col s3">
      <p><b>Idade:</b> {{ $beneficiario['idade_beneficiario'] }} anos</p>
    </div>
    <div class="col s3">
      <p><b>Escolaridade:</b>
        @php
        switch ($beneficiario['escolaridade_beneficiario']) {
        case 1: echo 'Sem Escolaridade'; break;
        case 2: echo 'Fundamental I'; break;
        case 3: echo 'Fundamental II'; break;
        case 4: echo 'Ensino Médio'; break;
        case 5: echo 'Superior Completo'; break;
        }
        @endphp
      </p>
    </div>
    <div class="col s3">
      <p><b>Projeto:</b> {{ $beneficiario['nome_projeto'] }}</p>
    </div>
  </div>

  <div class="row">
    <div class="col s3">
      <p><b>Turno:</b>
        @php
        switch ($beneficiario['turno']) {
        case 1: echo 'Manhã'; break;
        case 2: echo 'Tarde'; break;
        }
        @endphp
      </p>
    </div>
    <div class="col s9">
      <p><b>Atividade:</b> {{ $beneficiario['atividades'] }}</p>
    </div>
  </div>

  <div class="divider"></div>
  <p><b>Cadastro realizado em:</b>
    {{ date('d/m/Y', strtotime($beneficiario['criado_em'])) }}
    às {{ date('H:i', strtotime($beneficiario['criado_em'])) }}
    por {{ $beneficiario['nome_completo'] }}
  </p>

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