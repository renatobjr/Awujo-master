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
  <title>Lista de Beneficiários</title>

  <style>
  body {
    background-color: #fff;
  }

  h5 {
    margin-top: 20px;
  }

  table th,
  table td {
    font-size: 13px;
  }

  .logo-container img {
    height: 80px;
  }

  /* Configuração de impressão */
  @media print {
    @page {
      size: A4 landscape;
      /* <-- Aqui está o modo paisagem */
      margin: 1cm;
    }

    body {
      -webkit-print-color-adjust: exact;
      color-adjust: exact;
    }

    .no-print {
      display: none !important;
    }
  }
  </style>
</head>

<body class="container">

  <div class="row logo-container">
    <div class="col s12">
      <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="Logo AWUJO" class="left">
      <img src="{{ base_url('resources/svg/logo.svg') }}" alt="Logo Prefeitura" class="right">
    </div>
  </div>

  <div class="row">
    <div class="col s12 center-align">
      <h5 class="light">Lista de Responsáveis</h5>
      <p class="grey-text">Relação de responsáveis cadastrados</p>
    </div>
  </div>

  <div class="divider"></div>

  <div class="row">
    <div class="col s12">
      <table class="striped highlight responsive-table">
        <thead>
          <tr>
            <th>Nome Completo</th>
            <th>CPF</th>
            <th>NIS</th>
            <th>Telefone Fixo</th>
            <th>Celular</th>
            <th>Crianças</th>
            <th>Adultos</th>
            <th>Idosos</th>
          </tr>
        </thead>
        <tbody>
          @foreach($responsaveis as $responsavel)
          <tr>
            <td>{{ $responsavel->nome_responsavel }}</td>
            <td class="cpf">{{ $responsavel->cpf }}</td>
            <td class="nis">{{ $responsavel->nis }}</td>
            <td>{{ $responsavel->telefone_fixo }}</td>
            <td>{{ $responsavel->telefone_movel }}</td>
            <td>{{ $responsavel->criancas_ate_06_anos + $responsavel->criancas_entre_07_17_anos }}</td>
            <td>{{ $responsavel->adultos }}</td>
            <td>{{ $responsavel->idosos }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="row no-print">
    <div class="col s12 center-align" style="margin-top: 30px;">
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