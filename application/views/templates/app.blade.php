<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ base_url('resources/css/materialize.css') }}" media="screen,projection">
  <link rel="icon" type="image/png" sizes="96x96" href="{{ base_url('resources/ico/favicon-96x96.png') }}">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

  <title>{{ $title }}</title>
</head>

<body class="grey lighten-5" style="overflow-x: hidden">

  <!-- Preloader -->
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

  <!-- Navbar -->
  <header style="z-index: 1000; padding: 0; margin: -20px">
    <nav class=" grey lighten-3">
      <div class="nav-wrapper container">
        <a href="{{ base_url('dashboard') }}" class="brand-logo">
          <img src="{{ base_url('resources/svg/awujo.logo.simple.svg') }}" alt="Logo" class="responsive-img"
            style="height: 4vh">
        </a>
        <a href="#" data-target="mobile-menu" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
        <ul class="right hide-on-med-and-down">
          <!-- A classe 'is_active_link' deve ser ajustada para a nova função ou ter sua lógica revisada -->
          <li class="<?= is_active_link('dashboard', 'exact') ?>">
            <a href="{{ base_url('dashboard') }}" class="black-text">Dashboard</a>
          </li>
          <li class="<?= is_active_link('dashboard/projetos', 'segment') ?>">
            <a href="{{ base_url('dashboard/projetos') }}" class="black-text">Projetos</a>
          </li>
          <li class="<?= is_active_link('dashboard/responsaveis', 'segment') ?>">
            <a href="{{ base_url('dashboard/responsaveis') }}" class="black-text">Responsáveis</a>
          </li>
          <li class="<?= is_active_link('dashboard/beneficiarios', 'segment') ?>">
            <a href="{{ base_url('dashboard/beneficiarios') }}" class="black-text">Beneficiários</a>
          </li>
          <li><a class="black-text light">Olá {{ $_SESSION['nome-usuario'] }}</a></li>
          <li><a href="{{ base_url('logout') }}"><i class="material-icons black-text">logout</i></a></li>
        </ul>
      </div>
    </nav>

    <!-- Fixed Action Button -->
    <div class="fixed-action-btn">
      <a href="#" class="btn-floating btn-large indigo darken-4"><i class="material-icons">apps</i></a>
      <ul>
        @if($_SESSION['nome-usuario'] === 'Suporte')
        <li><a href="{{ base_url('dashboard/cadastrar-usuario') }}" class="btn-floating red darken-4 tooltipped"
            data-position="left" data-tooltip="Cadastrar usuario">
            <i class="material-icons">account_circle</i></a></li>
        @endif
        <li><a href="{{ base_url('dashboard/imprimir-lista') }}" class="btn-floating purple darken-4 tooltipped"
            data-position="left" data-tooltip="Lista de contatos" target="_blank">
            <i class="material-icons">phone</i></a></li>
        <li><a href="{{ base_url('dashboard/cadastrar-beneficiarios') }}"
            class="btn-floating yellow darken-4 tooltipped" data-position="left" data-tooltip="Cadastrar beneficiarios">
            <i class="material-icons">face</i></a></li>
        <li><a href="{{ base_url('dashboard/cadastrar-responsavel') }}" class="btn-floating green darken-4 tooltipped"
            data-position="left" data-tooltip="Cadastrar responsavel">
            <i class="material-icons">supervised_user_circle</i></a></li>
        <li><a href="{{ base_url('dashboard/cadastrar-projeto') }}" class="btn-floating blue darken-4 tooltipped"
            data-position="left" data-tooltip="Cadastrar projeto">
            <i class="material-icons">assignment</i></a></li>
        <li><a href="{{ base_url('dashboard') }}" class="btn-floating indigo darken-4 tooltipped" data-position="left"
            data-tooltip="Dashboard">
            <i class="material-icons">home</i></a></li>
      </ul>
    </div>
  </header>

  <!-- Main Content -->
  <main class="container" style="margin-top: 10vh">
    @yield('conteudo-principal')
  </main>

  <!-- Scripts -->
  <script src="{{ base_url('resources/js/jquery-3.3.1.min.js') }}"></script>
  <script src="{{ base_url('resources/js/materialize.js') }}"></script>
  <script src="{{ base_url('resources/js/jquery.mask.js') }}"></script>
  <script>
  $(document).ready(function() {
    // Inicializações do Materialize
    $('.sidenav').sidenav();
    $('.fixed-action-btn').floatingActionButton({
      hoverEnabled: false,
    });
    $('.modal').modal();
    $('select').formSelect();
    $('.collapsible').collapsible();
    $('.datepicker').datepicker({
      format: 'dd/mm/yyyy',
      i18n: {
        today: 'Hoje',
        clear: 'Limpar',
        done: 'Ok',
        nextMonth: 'Próximo mês',
        previousMonth: 'Mês anterior',
        weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
        weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
        weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira',
          'Sábado'
        ],
        monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
        months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
          'Outubro', 'Novembro', 'Dez'
        ]
      }
    });
    $('.tooltipped').tooltip();

    // Máscaras
    $('.cpf').mask('000.000.000-00', {
      reverse: true
    });
    $('.nis').mask('0.000.000.000-0', {
      reverse: true
    });
    $('.fone').mask('(00) 0000-0000');
    $('.movel').mask('(00) 00000-0000');
    $('.real').mask('000.000.000.000.000,00', {
      reverse: true
    });

    // Toasts
    @if(isset($_SESSION['success']))
    M.toast({
      html: '<?php echo $_SESSION['success'] ?>',
      displayLength: 4000,
      classes: 'green darken-4'
    });
    @unset($_SESSION['success']);
    @endif
    @if(isset($_SESSION['error']))
    M.toast({
      html: '<?php echo $_SESSION['error'] ?>',
      displayLength: 4000,
      classes: 'red darken-4'
    });
    @unset($_SESSION['error']);
    @endif

    // Preloader
    $('.preloader-background').delay(1700).fadeOut('slow');
    $('.preloader-wrapper').delay(1700).fadeOut();

    $('#renda-adultos').focusout(function() {
      var renda_responsavel = parseFloat($('#renda-responsavel').cleanVal());
      var renda_adultos = parseFloat($('#renda-adultos').cleanVal());
      $('#renda-total').val($('#renda-total').masked(renda_responsavel + renda_adultos))
    });
    $('#busca-cep').focusout(function() {
      $.ajax({
        url: 'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode',
        dataType: 'json',
        success: function(response) {
          $('#logradouro').val(response.logradouro);
          $('#bairro').val(response.bairro)
        }
      })
    });

    // Busca dinâmica
    $('#activesearch-input').on('input', function() {
      var criterio_busca = $(this).val();
      if (criterio_busca.length === 0) {
        $('#resultado-pesquisa').html('').addClass('hide');
        return;
      }
      $.ajax({
        url: '{{ base_url("dashboard/buscar-responsavel/") }}' + criterio_busca,
        type: 'GET',
        dataType: 'JSON',
        success: function(data) {
          var html = '';
          $('#resultado-pesquisa').html('');
          if ($.isEmptyObject(data)) {
            $('input#activesearch-input').addClass('invalid');
            M.toast({
              html: 'Não foi possível encontrar o registro',
              displayLength: 2000,
              classes: 'red darken-4'
            });
            $('#resultado-pesquisa').addClass('hide');
          } else {
            $('input#activesearch-input').removeClass('invalid');
            $('#resultado-pesquisa').removeClass('hide');
            data.forEach(function(item) {
              html += `
              <li>
                  <div class="collapsible-header">
                      <i class="material-icons">supervised_user_circle</i>
                      <span>${item.nome_responsavel}</span>
                      <span class="collapsible-secondary-header">
                          <a href="{{base_url('dashboard/imprimir-responsavel/')}}${item.idresponsavel}" 
                            class="btn btn-small waves-effect waves-light blue lighten-1 hide-on-med-and-down" target="_blank">
                            <i class="material-icons center" style="margin-right:0">print</i>
                          </a>
                          <a href="{{ base_url('dashboard/editar-responsavel/') }}${item.idresponsavel}" 
                            class="modal-trigger btn btn-small waves-effect waves-light amber darken-3">
                            <i class="material-icons center" style="margin-right:0">edit</i>
                          </a>
                          <a href="#modal-excluir" 
                            class="modal-trigger btn btn-small waves-effect waves-light red darken-3 hide-on-med-and-down"
                            data-id="${item.idresponsavel}" data-name="${item.nome_responsavel}">
                            <i class="material-icons center" style="margin-right:0">cancel</i>
                          </a>
                      </span>
                  </div>
                  <div class="collapsible-body">
                      <div class="row">
                          <div class="col s12 m6 l3">
                              <div class="chip grey lighten-1">
                                  <i class="material-icons white-text">child_care</i>
                                  <span class="white-text">${item.criancas_ate_06_anos}</span>
                              </div>
                              <div class="chip grey lighten-1">
                                  <i class="material-icons white-text">face</i>
                                  <span class="white-text">${item.criancas_entre_07_17_anos}</span>
                              </div>
                              <div class="chip grey lighten-1">
                                  <i class="material-icons white-text">person</i>
                                  <span class="white-text">${item.idosos}</span>
                              </div>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col s12 m6 l3" style="margin-top:-1vh">
                              <span class="light"><b>Telefone Fixo: </b>${item.telefone_fixo}</span>
                          </div>
                          <div class="col s12 m12 l3" style="margin-top:-1vh">
                              <span class="light"><b>Celular: </b>${item.telefone_movel}</span>
                          </div>
                          <div class="col s12 m6 l2" style="margin-top:-1vh">
                              <span class="light"><b>NIS: </b><span class="nis">${item.nis}</span></span>
                          </div>
                          <div class="col s12 m6 l2" style="margin-top:-1vh">
                              <span class="light"><b>CPF: </b><span class="cpf">${item.cpf}</span></span>
                          </div>
                      </div>

                      <div class="row">
                          <div class="col s12 m12 l5">
                              <span class="light">
                                  <b>Endereço: </b>${item.rua}, nº ${item.numero}, ${item.bairro}
                              </span>
                          </div>
                          <div class="col s12 m12 l3">
                              <span class="light">
                                  <b>Renda Responsável: </b>R$ <span class="real">${item.renda_responsavel}</span>
                              </span>
                          </div>
                          <div class="col s12 m12 l3">
                              <span class="light">
                                  <b>Renda Total da Família: </b>R$ <span class="real">${item.renda_total}</span>
                              </span>
                          </div>
                      </div>
                  </div>
              </li>`;
            });
            $('#resultado-pesquisa').html(html);
          }
        }
      });
    });

    // Modal de exclusão
    $('#modal-excluir-responsavel').modal({
      onOpenStart: function(modal, trigger) {
        $(modal).find('span#nome-responsavel').text($(trigger).data('name-responsavel'));
        $(modal).find('a#btn-submit-excluir-responsavel').attr('href',
          '{{ base_url("dashboard/excluir-responsavel/") }}' + $(
            trigger).data('id-responsavel'));
      }
    });

    $('#modal-excluir-projeto').modal({
      onOpenStart: function(modal, trigger) {
        $(modal).find('span#nome-projeto').text($(trigger).data('name-projeto'));
        $(modal).find('a#btn-submit-excluir-projeto').attr('href',
          '{{ base_url("dashboard/excluir-projeto/") }}' + $(
            trigger).data('id-projeto'));
      }
    });

    $('#modal-excluir-beneficiario').modal({
      onOpenStart: function(modal, trigger) {
        $(modal).find('span#nome-beneficiario').text($(trigger).data('name-beneficiario'));
        $(modal).find('a#btn-submit-excluir-beneficiario').attr('href',
          '{{ base_url("dashboard/excluir-beneficiario/") }}' + $(
            trigger).data('id-beneficiario'));
      }
    });

    // Reaplica máscaras após AJAX
    $(document).ajaxComplete(function() {
      M.updateTextFields();
      $('.real').mask('000.000.000.000.000,00', {
        reverse: true
      });
      $('.cpf').mask('000.000.000-00', {
        reverse: true
      });
      $('.nis').mask('0.000.000.000-0', {
        reverse: true
      });
    });
  });
  </script>

</body>

</html>