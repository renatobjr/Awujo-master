<?php if( ! isset($_SESSION['is_logged'])): ?>
    <?php echo e($_SESSION['error'] = 'Realize o login para ter acesso a página.'); ?>

    <?php echo e(redirect('home')); ?>

<?php endif; ?>
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
        <a href="<?php echo e(base_url('dashboard')); ?>" class="btn-floating btn-large indigo darken-4"><i class="material-icons">apps</i></a>
        <ul>
            <?php if($_SESSION['nivel'] === 0): ?>
            <li><a href="<?php echo e(base_url('dashboard/cadastrar-usuario')); ?>" class="btn-floating red darken-4">
                    <i class="material-icons">account_circle</i></a></li>
            <?php endif; ?>
            <li><a href="<?php echo e(base_url('dashboard/cadastrar-responsavel')); ?>" class="btn-floating green darken-4">
                    <i class="material-icons">supervised_user_circle</i></a></li>
        </ul>
    </div>
</header>
<aside>
    <ul id="slide-out" class="sidenav sidenav-fixed indigo darken-4">
        <li><a href="<?php echo e(base_url('dashboard')); ?>"><i class="material-icons white-text small valign-wrapper">home</i></a></li>
    </ul>
    <nav class="hide-on-large-only grey lighten-5">
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons black-text">menu</i></a>
        <a href="<?php echo e(base_url('dashboard')); ?>" id="logo-container" class="brand-logo">
            <img src="<?php echo e(base_url('resources/svg/awujo.logo.simple.svg')); ?>" alt="" class="responsive-img"
                 style="height: 5vh;">
        </a>
    </nav>
</aside>

<main class="container">
    <?php echo $__env->yieldContent('conteudo-principal'); ?>
</main>

<script src="<?php echo e(base_url('resources/js/jquery-3.3.1.min.js')); ?>"></script>
<script src="<?php echo e(base_url('resources/js/materialize.min.js')); ?>"></script>
<script src="<?php echo e(base_url('resources/js/jquery.mask.js')); ?>"></script>
<script>
    $(document).ready(function () {
        $('.fixed-action-btn').floatingActionButton();
        $('.sidenav').sidenav();
        $('select').formSelect();
        $('.cpf').mask('000.000.000-00', {reverse: true});
        $('.nis').mask('0.000.000.000-0', { reverse: true});
        $('.fone').mask('(00) 00000-0000');
        $('.real').mask('000.000.000.000.000,00', {reverse: true});
    });
    <?php if(isset($_SESSION['success'])): ?>
    var mensagem = '<?php echo $_SESSION['success'] ?>';
    M.toast({html: mensagem,displayLength: 4000,classes:'green darken-4'});
    <?php endif; ?>
    $('#renda-adultos').focusout(function (){
        var renda_responsavel = parseFloat(document.getElementById('renda-responsavel').value);
        var renda_adultos = parseFloat(document.getElementById('renda-adultos').value);
        document.getElementById('renda-total').value = renda_responsavel + renda_adultos;

    });
    $('#busca-cep').focusout(function () {
        $.ajax({
            url:        'https://viacep.com.br/ws/' + $(this).val() + '/json/unicode',
            dataType:   'json',
            success: function (response) {
                $('#logradouro').val(response.logradouro);
                $('#bairro').val(response.bairro)
            }
        })
    });
    document.addEventListener("DOMContentLoaded", function(){
        $('.preloader-background').delay(1700).fadeOut('slow');

        $('.preloader-wrapper')
            .delay(1700)
            .fadeOut();
    });
</script>
</body>
</html>