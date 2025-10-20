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
  <title>Lista de Alunos - Impressão</title>

  <style>
  /* Configuração para modo paisagem */
  @page {
    size: A4 landscape;
    margin: 1cm;
  }

  @media print {
    #printButton {
      display: none;
    }

    body {
      -webkit-print-color-adjust: exact !important;
    }
  }

  table th,
  table td {
    font-size: 12px;
  }

  .header-info {
    font-size: 13px;
  }

  .logo {
    height: 80px;
  }

  .divider {
    margin: 10px 0;
  }
  </style>
</head>

<body class="container">
  <div class="row valign-wrapper" style="margin-top: 10px;">
    <div class="col s6">
      <img src="{{ base_url('resources/svg/awujo.logo.svg') }}" alt="Logo Awujó" class="logo">
    </div>
    <div class="col s6 right-align">
      <img src="{{ base_url('resources/svg/logo.svg') }}" alt="Logo Projeto" class="logo">
    </div>
  </div>

  <div class="divider"></div>

  <div class="row">
    <div class="col s12">
      <h5 class="light">Lista de Alunos</h5>
      <p class="header-info">
        <b>Projeto:</b> {{ $projeto['nome_projeto'] }} <br>
        <b>Patrocinador:</b> {{ $projeto['patrocinador'] }} <br>
        <b>Data da Impressão:</b> {{ date('d/m/Y H:i') }}
      </p>
    </div>
  </div>

  <div class="divider"></div>

  <div class="row">
    <div class="col s12">
      <table class="striped responsive-table">
        <thead>
          <tr>
            <th>Nome do Aluno</th>
            <th>Responsável</th>
            <th>CPF</th>
            <th>NIS</th>
            <th>Idade</th>
            <th>Raça</th>
            <th>Escolaridade</th>
            <th>Turno</th>
            <th>Atividade</th>
          </tr>
        </thead>
        <tbody>
          @foreach($beneficiarios as $aluno)
          {!! '<tr>
            <td>' . $aluno['nome_beneficiario'] . '</td>
            <td>' . $aluno['nome_responsavel'] . '</td>
            <td class="cpf">' . $aluno['cpf_beneficiario'] . '</td>
            <td class="nis">' . $aluno['nis_beneficiario'] . '</td>
            <td>' . $aluno['idade_beneficiario'] . '</td>
            <td>' . (
              $aluno['raca'] == 1 ? 'Negra' :
              ($aluno['raca'] == 2 ? 'Branca' :
              ($aluno['raca'] == 3 ? 'Parda' :
              ($aluno['raca'] == 4 ? 'Indígena' : 'Outra')))
              ) . '</td>
            <td>' . (
              $aluno['escolaridade_beneficiario'] == 1 ? 'Sem Escolaridade' :
              ($aluno['escolaridade_beneficiario'] == 2 ? 'Fundamental I' :
              ($aluno['escolaridade_beneficiario'] == 3 ? 'Fundamental II' :
              ($aluno['escolaridade_beneficiario'] == 4 ? 'Ensino Médio' :
              ($aluno['escolaridade_beneficiario'] == 5 ? 'Superior Completo' : 'Não informado'))))
              ) . '</td>
            <td>' . ($aluno['turno'] == 1 ? 'Manhã' : ($aluno['turno'] == 2 ? 'Tarde' : '')) . '</td>
            <td>' . $aluno['atividades'] . '</td>
          </tr>' !!}
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  <div class="row center" style="margin-top: 20px;">
    <button id="printButton" class="btn waves-effect waves-light blue darken-2" onclick="window.print()">
      <i class="material-icons left">print</i> Imprimir
    </button>
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