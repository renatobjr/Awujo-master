<!doctype html>
<html lang="pt-br">
<head>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="<?php echo e(base_url('resources/css/materialize.css')); ?>" media="screen,projection">
        <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(base_url('resources/ico/favicon-96x96.png')); ?>">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.min.js"></script>

        <title><?php echo e($title); ?></title>
    </head>
</head>
<body class="grey lighten-5">
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
<header>
    <div class="hide-on-med-and-down">
        <nav class="grey lighten-5">
            <div class="nav-wrapper">
                <a href="<?php echo e(base_url('dashboard')); ?>" id="logo-container" class="brand-logo">
                    <img src="<?php echo e(base_url('resources/svg/awujo.logo.simple.svg')); ?>" alt="" class="responsive-img"
                         style="height: 5vh; padding-left: 4vh">
                </a>
                <ul>
                    <li class="right"><a href="<?php echo e(base_url('logout')); ?>"><i class="material-icons black-text">
                                logout</i></a></li>
                    <li class="right"><a class="black-text light" href="#">Olá <?php echo e($_SESSION['nome-usuario']); ?></a></li>
                </ul>
            </div>
        </nav>
    </div>
    <div class="fixed-action-btn">
        <a href="#" class="btn-floating btn-large indigo darken-4"><i class="material-icons">apps</i></a>
        <ul>
            <?php if($_SESSION['nome-usuario'] === 'Suporte'): ?>
            <li><a href="<?php echo e(base_url('dashboard/cadastrar-usuario')); ?>" class="btn-floating red darken-4">
                    <i class="material-icons">account_circle</i></a></li>
            <?php endif; ?>

            <li><a href="<?php echo e(base_url('dashboard/cadastrar-beneficiarios')); ?>" class="btn-floating yellow darken-4">
                    <i class="material-icons">face</i></a></li>
        
            <li><a href="<?php echo e(base_url('dashboard/cadastrar-responsavel')); ?>" class="btn-floating green darken-4">
                    <i class="material-icons">supervised_user_circle</i></a></li>

            <li><a href="<?php echo e(base_url('dashboard/cadastrar-projeto')); ?>" class="btn-floating blue darken-4">
                    <i class="material-icons">assignment</i></a></li>

            <li><a href="<?php echo e(base_url('dashboard')); ?>" class="btn-floating indigo darken-4">
                    <i class="material-icons">home</i></a></li>
        </ul>
    </div>
</header>

<aside>
    <ul id="slide-out" class="sidenav sidenav-fixed indigo darken-4">
        <li><a href="<?php echo e(base_url('dashboard')); ?>"><i class="material-icons white-text small valign-wrapper">home</i></a></li>
        <div class="sidenav-menu-padding">
            <li><a href="#" class="dropdown-trigger" data-target="menu-alimentos">
                    <i class="material-icons white-text small valign-wrapper">local_grocery_store</i></a></li>
            <li><a href="#" class="dropdown-trigger" data-target="menu-projetos">
                    <i class="material-icons white-text small valign-wrapper">print</i></a></li>
        </div>
    </ul>
    <nav class="hide-on-large-only grey lighten-5">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
        <a href="<?php echo e(base_url('dashboard')); ?>" id="logo-container" class="brand-logo">
            <img src="<?php echo e(base_url('resources/svg/awujo.logo.simple.svg')); ?>" alt="" class="responsive-img"
                 style="height: 5vh;">
        </a>
        <ul>
            <li class="right"><a href="<?php echo e(base_url('logout')); ?>"><i class="material-icons black-text">
                        logout</i></a></li>
        </ul>
    </nav>
</aside>
<ul id="menu-projetos" class="dropdown-content">
    <li><a href="#">Lista de Alunos</a></li>    
    <li><a href="<?php echo e(base_url('dashboard/lista-alunos')); ?>"><span class="light">Lista de Matrículas</span></a></li>
</ul>
<ul id="menu-alimentos" class="dropdown-content">
    <li><a href="#">SESC <span class="right"><?php echo e($total_registros['total_nis']); ?> Pessoas</span></a></li>
    <li><a href="<?php echo e(base_url('dashboard/imprimir-lista/sesc')); ?>" target="_blank"><span class="light">Lista de Contatos</span></a></li>
    <li class="divider"></li>
    <li><a href="#">PMJP <span class="right"><?php echo e($total_registros['total']); ?> Pessoas</span></a></li>
    <li><a href="<?php echo e(base_url('dashboard/imprimir-lista/pmjp')); ?>" target="_blank"><span class="light">Lista de Contatos</span></a></li>
</ul>
<main class="container">
    <?php echo $__env->yieldContent('conteudo-principal'); ?>
</main>

<script src="<?php echo e(base_url('resources/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(base_url('resources/js/materialize.js')); ?>"></script>
<script src="<?php echo e(base_url('resources/js/jquery.mask.js')); ?>"></script>
<script>

    <?php if(isset($_SESSION['success'])): ?>
        var mensagem = '<?php echo $_SESSION['success'] ?>';
        M.toast({html: mensagem,displayLength: 4000,classes:'green darken-4'});
    <?php endif; ?>
    <?php if(isset($_SESSION['error'])): ?>
        var mensagem = '<?php echo $_SESSION['error'] ?>';
        M.toast({html: mensagem,displayLength: 4000,classes:'red darken-4'});
    <?php endif; ?>
    $(document).ready(function(){$(".datepicker").datepicker({format: 'dd/mm/yyyy',i18n:{today: 'Hoje',
    clear: 'Limpar',done: 'Ok',nextMonth: 'Próximo mês',previousMonth: 'Mês anterior',weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira', 'Sábado'],monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro']}});$(".dropdown-trigger").dropdown({alignment:'top',coverTrigger:false,constrainWidth:false,});$('.fixed-action-btn').floatingActionButton();$('.sidenav').sidenav();$('.collapsible').collapsible();$('select').formSelect();$('.cpf').mask('000.000.000-00',{reverse:!0});$('.nis').mask('0.000.000.000-0',{reverse:!0});$('.fone').mask('(00) 0000-0000');$('.movel').mask('(00) 00000-0000');$('.real').mask('000.000.000.000.000,00',{reverse:!0})});
    $('#renda-adultos').focusout(function(){var renda_responsavel=parseFloat($('#renda-responsavel').cleanVal());var renda_adultos=parseFloat($('#renda-adultos').cleanVal());$('#renda-total').val($('#renda-total').masked(renda_responsavel+renda_adultos))})
    $('#busca-cep').focusout(function(){$.ajax({url:'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode',dataType:'json',success:function(response){$('#logradouro').val(response.logradouro);$('#bairro').val(response.bairro)}})});
    document.addEventListener("DOMContentLoaded",function(){$('.preloader-background').delay(1700).fadeOut('slow');$('.preloader-wrapper').delay(1700).fadeOut();$('#activesearch-input').on('input',function(){var criterio_busca=$(this).val();if(criterio_busca.length===0){document.getElementById('resultado-pesquisa').innerHTML='';$('#resultado-pesquisa').addClass('hide')}else{$.ajax({url:'<?php echo e(base_url('dashboard/buscar-responsavel/')); ?>'+criterio_busca,type:'GET',dataType:'JSON',success:function(data){var array_resp='';$('input#activesearch-input').removeClass('invalid');$('#resultado-pesquisa').html('');if(jQuery.isEmptyObject(data)){$('input#activesearch-input').addClass('invalid');M.toast({html:'Não foi possível encontrar o registro',displayLength:2000,classes:'red darken-4'});$('#resultado-pesquisa').addClass('hide');}else{$('div.input#activesearch-input').html('');$('#resultado-pesquisa').removeClass('hide');for(var i=0;i<data.length;i++){array_resp+='<li> <div class="collapsible-header">'+'<i class="material-icons">supervised_user_circle</i> <span>'+data[i].nome_responsavel+'</span>'+'<span class="collapsible-secondary-header">'+'<a href="<?php echo e(base_url("dashboard/imprimir-responsavel/")); ?>'+data[i].idresponsavel+'" '+'class="btn btn-small waves-effect waves-light blue lighten-1 hide-on-med-and-down" target="_blank">'+'<i class="material-icons center" style="margin-right: 0">print</i></a>'+'<a href="<?php echo e(base_url("dashboard/editar-responsavel/")); ?>'+data[i].idresponsavel+'" '+'class="modal-trigger btn btn-small waves-effect waves-light amber darken-3">'+'<i class="material-icons center" style="margin-right: 0">edit</i></a>'+'<a href="#modal-excluir" class="modal-trigger btn btn-small waves-effect waves-light '+'red darken-3 hide-on-med-and-down" data-id="'+data[i].idresponsavel+'" data-name="'+data[i].nome_responsavel+'">'+'<i class="material-icons center" style="margin-right: 0">cancel</i></a></span>'+'</div><div class="collapsible-body"><div class="row"><div class="col s12 m6 l3">'+'<div class="chip grey lighten-1"> <i class="material-icons white-text">child_care</i>'+'<span class="white-text">'+data[i].criancas_ate_06_anos+'</span>'+'</div><div class="chip grey lighten-1"> <i class="material-icons white-text">face</i>'+'<span class="white-text">'+data[i].criancas_entre_07_17_anos+'</span>'+'</div><div class="chip grey lighten-1"> <i class="material-icons white-text">person</i>'+'<span class="white-text">'+data[i].idosos+'</span></div></div></div><div class="row">'+'<div class="col s12 m6 l3" style="margin-top: -1vh"><span class="light">'+'<b>Telefone Fixo: </b>'+data[i].telefone_fixo+'</span></div>'+'<div class="col s12 m12 l3" style="margin-top: -1vh"><span class="light">'+'<b>Celular: </b>'+data[i].telefone_movel+'</span></div><div class="col s12 m6 l2" style="margin-top: -1vh">'+'<span class="light"><b>NIS: </b><span class="nis">'+data[i].nis+'</span></span>'+'</div><div class="col s12 m6 l2" style="margin-top: -1vh">'+'<span class="light"><b>CPF: </b><span class="cpf">'+data[i].cpf+'</span></span>'+'</div></div><div class="row"> <div class="col s12 m12 l5">'+'<span class="light"><b>Endereço: </b><span>'+data[i].rua+', nº. '+data[i].numero+', '+data[i].bairro+'</span>'+'</span> </div><div class="col s12 m12 l3"><span class="light">'+'<b>Renda Responsável: </b>R$ <span class="real">'+data[i].renda_responsavel+'</span>'+'</span></div><div class="col s12 m12 l3"> <span class="light">'+'<b>Renda Total da Família: </b>R$ <span class="real">'+data[i].renda_total+'</span></span>'+'</div></div></div></li>'}
document.getElementById('resultado-pesquisa').innerHTML=array_resp}}})}});$('#modal-excluir').modal({onOpenStart:function(modal,trigger){console.log($(trigger).data('id'));$(modal).find('span[id="nome-responsavel"]').html($(trigger).data('name'));$(modal).find('a[id="btn-submit"]').attr('href','<?php echo e(base_url('dashboard/excluir-responsavel/')); ?>'+$(trigger).data('id'))}})});
    $(document).ajaxComplete(function(){M.updateTextFields();$('.real').mask('000.000.000.000.000,00',{reverse:!0});$('.cpf').mask('000.000.000-00',{reverse:!0});$('.nis').mask('0.000.000.000-0',{reverse:!0})});
</script>

<div id="modal-excluir" class="modal">
    <div class="modal-content">
        <h5 class="light">Exclusão</h5>
        <p>Deseja excluir o cadastro de <b><span id="nome-responsavel"></span></b> ?</p>
    </div>
    <div class="modal-footer">
        <a href="#!" class="modal-close waves-effect waves-green btn-flat grey lighten-4">Não</a>
        <a id="btn-submit" class="modal-close waves-effect waves-green btn-flat red darken-4 white-text">Sim</a>
    </div>
</div>
</body>
</html>
