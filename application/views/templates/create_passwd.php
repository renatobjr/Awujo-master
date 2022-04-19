<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Awujo</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Roboto');
        body {
            font-family: "Roboto", sans-serif;
        }
    </style>
</head>
<body>
<p>Olá <b><?php echo $nome_usuario?></b>,</p>
<p>
    Você foi recentemente adicionado a plataforma colaborativa <b>Awujo</b>, para finalizar seu acesso cadastre sua senha
    <a href="<?php echo base_url() . 'registro?token=' . $token?>">aqui.</a>
</p>
<p>Estamos muito felizes em ter você como nosso colaborador!</p>
<p>Um grande abraço,</p>
<br>
<img src="http://awujo.cciao.org/resources/svg/awujo.logo.svg" alt="" height="100px">
</body>
</html>