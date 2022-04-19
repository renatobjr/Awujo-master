<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(base_url('resources/css/materialize.css')); ?>" media="screen,projection">
    <link rel="stylesheet" href="<?php echo e(base_url('resources/css/materialize.print.css')); ?>" media="print">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo e(base_url('resources/ico/favicon-96x96.png')); ?>">
    <title>Impressão de cadastro</title>
</head>
<body class="container">
    <div class="row">
        <div class="col s12 m12 l12">
            <img src="<?php echo e(base_url('resources/svg/awujo.logo.svg')); ?>" alt="" class="img-responsive" height="100px">
            <img src="<?php echo e(base_url('resources/svg/logo.svg')); ?>" alt="" class="img-responsive right" height="100px">
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <h5 class="light">Matricula do Aluno</h5>
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
            <p class="light"><b>Nome completo:</b> <?php echo e($matricula['nome_beneficiario']); ?></p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Nome do Responsável: </b><span class=""><?php echo e($matricula['nome_responsavel']); ?></span></p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>CPF: </b><span class="cpf"><?php echo e($matricula['cpf_beneficiario']); ?></span></p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>NIS: </b><span class="nis"><?php echo e($matricula['nis_beneficiario']); ?></span></p>
        </div>
    </div>
    <div class="row">
        <div class="col m3 l2">
            <p class="light"><b>Raça: </b>
                <?php 
                    switch ($matricula['raca']) {
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
                 ?>
            </p>
        </div>
        <div class="col m2 l2">
            <p class="light"><b>Idade: </b><?php echo e($matricula['idade_beneficiario']); ?> Anos</p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Escolaridade: </b>
                <?php 
                    switch ($matricula['escolaridade_beneficiario']) {
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
                 ?>
            </p>
        </div>
        <div class="col m3 l3">
            <p class="light"><b>Projeto: </b><?php echo e($matricula['nome_projeto']); ?></p>
        </div>
        <div class="col m3 l2">
            <p class="light"><b>Turno: </b>
                <?php 
                    switch($matricula['turno']) {
                        case 1:
                            echo 'Manhã';
                            break;
                        case 2:
                            echo 'Tarde';
                            break;
                    }
                 ?>
            </p>
        </div>
    </div>
    <div class="row">
         <div class="col m12 l12">
             <p class="light"><b>Atividade: </b><?php echo e($matricula['atividades']); ?></p>       
         </div>           
    </div>
    <div class="divider"></div>
    <div class="row">
        <div class="col m12 l12">
            <p class="light">Cadastro realizado em <?php echo e(date('d/m/Y', strtotime($matricula['criado_em']))); ?> às
                <?php echo e(date('H:i', strtotime($matricula['criado_em']))); ?> por <?php echo e($matricula['nome_completo']); ?></p>
        </div>
    </div>
    <script src="<?php echo e(base_url('resources/js/jquery-3.3.1.min.js')); ?>"></script>
    <script src="<?php echo e(base_url('resources/js/materialize.min.js')); ?>"></script>
    <script src="<?php echo e(base_url('resources/js/jquery.mask.js')); ?>"></script>
    <script>
        $(document).ready(function () {
            $('.cpf').mask('000.000.000-00', {reverse: true});
            $('.nis').mask('0.000.000.000-0', { reverse: true});
        })
    </script>
    </body>
</html>