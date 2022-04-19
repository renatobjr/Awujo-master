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
        <h5 class="light">Lista de Telefone <?php echo e(strtoupper($programa)); ?></h5>
    </div>
</div>
<div class="divider"></div>
<div class="row">
    <div class="col s12 m12 l12">
        <table class="striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Telefone Fixo</th>
                    <th>Celular</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $beneficiarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $beneficiario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo '<tr><td>' . $beneficiario['nome_responsavel'] . '</td><td>' . $beneficiario['telefone_fixo'] . '</td>
                    <td>' . $beneficiario['telefone_movel'] . '</td></tr>'; ?>

                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
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