<?php $__env->startSection('conteudo-principal'); ?>
    <?php if(empty($total_registros['total'])): ?>
    <div class="row">
        <div class="col s12 m12 l6 offset-l3" style="padding-top: 10vh">
            <p class="center"><i class="material-icons large">mood_bad</i></p>
            <h4 class="light center">Ainda não temos dados suficientes para te mostrar algumas informações. Realize a
                inserção dos dados para te mostrar como podemos te ajudar!</h4>
        </div>
    </div>
    <?php else: ?>
    <script>
        /* Charts */
        window.onload = function () {
            var ctx = document.getElementById('raca').getContext('2d');
            var grafRaca = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        'Negra','Branco','Pardo','Indigena','Outros'
                    ],
                    datasets: [{
                        data: [<?php echo e($pie_raca['negro']); ?>,<?php echo e($pie_raca['branco']); ?>,<?php echo e($pie_raca['pardo']); ?>,
                            <?php echo e($pie_raca['indigena']); ?>,<?php echo e($pie_raca['outros']); ?>],
                        backgroundColor: [
                            '#311b92',
                            '#01579b',
                            '#0091ea',
                            '#4fc3f7',
                            '#e1f5fe'
                        ],
                        borderWidth: 0
                    }],

                },
                options: {
                    cutoutPercentage: 30,
                    defaultFontFamily: 'Roboto',
                    animation: {
                        duration: 3000,
                        easing: 'linear'
                    }
                }
            });
            var ctx = document.getElementById('escolaridade').getContext('2d');
            var grafRaca = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: [
                        'Analfabeto','Fund. I','Fund. II','Médio','Superior'
                    ],
                    datasets: [{
                        data: [<?php echo e($pie_escolaridade['analfabeto']); ?>,<?php echo e($pie_escolaridade['fund_I']); ?>,
                            <?php echo e($pie_escolaridade['fund_II']); ?>,<?php echo e($pie_escolaridade['medio']); ?>,<?php echo e($pie_escolaridade['superior']); ?>],
                        backgroundColor: [
                            '#311b92',
                            '#01579b',
                            '#0091ea',
                            '#4fc3f7',
                            '#e1f5fe'
                        ],
                        borderWidth: 0
                    }],

                },
                options: {
                    cutoutPercentage: 30,
                    defaultFontFamily: 'Roboto',
                    animation: {
                        duration: 3000,
                        easing: 'linear'
                    }
                }
            });
            var ctx = document.getElementById('idade_renda').getContext('2d');
            var grafIdadeRenda = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        'Entre 18 e 29 Anos','Entre 30 e 39 Anos','Entre 40 e 59 Anos','Maiores de 60'
                    ],
                    datasets: [{
                        data: [<?php echo e($line_idade_renda['renda_18_29']); ?>,<?php echo e($line_idade_renda['renda_30_39']); ?>,
                            <?php echo e($line_idade_renda['renda_40_59']); ?>,<?php echo e($line_idade_renda['renda_60']); ?>],
                        borderColor: '#311b92',
                        backgroundColor: '#311b92',
                        pointBackgroundColor: '#311b92',
                        fill: false,
                        label: 'Média de renda em função da idade',
                    }]
                },
                options: {
                    defaultFontFamily: "'Roboto'",
                    animation: {
                        duration: 3000,
                        easing: 'linear'
                    }
                }
            });
            var ctx = document.getElementById('raca_renda').getContext('2d');
            var grafRacaRenda = new Chart(ctx,{
                type: 'horizontalBar',
                data: {
                    labels: [
                        'Negra','Branca','Parda','Indígena','Outras'
                    ],
                    datasets: [{
                        data: [<?php echo e($bar_raca_idade['renda_negros']); ?>,<?php echo e($bar_raca_idade['renda_brancos']); ?>,
                            <?php echo e($bar_raca_idade['renda_pardos']); ?>,<?php echo e($bar_raca_idade['renda_indigenas']); ?> ,
                            <?php echo e($bar_raca_idade['renda_outros']); ?>],
                        backgroundColor: [
                            '#311b92',
                            '#01579b',
                            '#0091ea',
                            '#4fc3f7',
                            '#e1f5fe'
                        ],
                        borderWidth: 0,
                        label: 'Distribuição de renda em função da Raça'
                    }]
                },
                options: {
                    defaultFontFamily: "'Roboto'",
                    animation: {
                        duration: 3000,
                        easing: 'linear'
                    }
                }
            });
        };
    </script>
    <div class="row" style="margin-top: 30px">
        <div class="col s12 m12 l3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons large white-text">supervised_user_circle</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light">Responsáveis</h6>
                    <h6 class="light info-box-number"><?php echo e($total_registros['total']); ?> Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons large white-text">child_care</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light"><small>Crianças até 06 anos</small></h6>
                    <h6 class="light info-box-number"><?php echo e($total_registros['criancas_06']); ?> Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons large white-text">face</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light">Entre 07 e 17 anos</h6>
                    <h6 class="light info-box-number"><?php echo e($total_registros['criancas_07_17']); ?> Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons large white-text">account_circle</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light">Idosos</h6>
                    <h6 class="light info-box-number"><?php echo e($total_registros['idosos']); ?> Cadastradas</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l6">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Pertencimento Racial
                        <i class="material-icons small right">pie_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="raca"></canvas>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Escolaridade
                         <i class="material-icons small right">pie_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="escolaridade"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l7">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Idade X Renda Total
                        <i class="material-icons small right">show_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="idade_renda"></canvas>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l5">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Idade X Renda Total
                        <i class="material-icons small right">show_chart</i></span>
                </div>

                <div class="card-action">
                    <canvas id="raca_renda"></canvas>
                </div>
            </div>
        </div>
    </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>