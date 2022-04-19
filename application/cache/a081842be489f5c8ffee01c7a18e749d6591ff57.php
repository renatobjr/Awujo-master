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
        <title><?php echo e($title); ?></title>
    </head>
</head>
<body class="grey lighten-5">
<aside>
    <ul id="sidenav" class="side-nav fixed">
        <li>
            <div class="user-view center">
                <a href="<?php echo e(base_url('dashboard')); ?>" id="logo-container" class="brand-logo">
                    <img src="<?php echo e(base_url('resources/svg/awujo.logo.round.svg')); ?>" alt="" class="responsive-img"
                         style="height: 10vh"></a>
                <a href="#!name" class="center"><span class="name black-text" style="font-weight: 400">Olá Renato Bonfim Jr.</span></a>
                <a href="#!email" class="center"><span class="email black-text" style="font-weight: 300">renato.bonfim.jr@cciao.org</span></a>
            </div>
        <li><div class="divider"></div></li>
        </li>
    </ul>
</aside>
<main>
    <nav class="navbar-fixed blue-grey darken-3">
        <div class="nav wrapper">
            <a href="<?php echo e(base_url('dashboard')); ?>" id="logo-container" class="brand-logo center">
                <img src="<?php echo e(base_url('resources/svg/awujo.logo.simple.svg')); ?>" alt="" class="responsive-img"
                     style="height: 5vh;margin-top: 2vh">
            </a>
            <a href="#" data-activates="menu-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
            <ul class="hide-on-med-and-down">
                <li class="right"><a href="<?php echo e(base_url('logout')); ?>"><i class="material-icons right">logout</i>Sair</a></li>
            </ul>
        </div>
    </nav>
    <ul id="menu-mobile" class="side-nav">
        <li class="light"><a href="">Olá, Renato Bonfim Jr.</a></li>
        <li class="light"><a href="<?php echo e(base_url('logout')); ?>"><i class="material-icons">logout</i>Sair</a></li>
    </ul>
    <div class="fixed-action-btn">
        <a href="" class="btn-floating btn-large blue darken-4"><i class="material-icons">apps</i></a>
        <ul>
            <li><a href="<?php echo e(base_url('dashboard/inserir-responsavel')); ?>" class="btn-floating grey darken-4"><i class="material-icons">supervised_user_circle</i></a></li>
        </ul>
    </div>