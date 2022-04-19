<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">
                    Lista de Alunos
                    <i class="material-icons small right">print</i>
                </span>
            </div>
            <div class="card-action">
                <?php $__currentLoopData = $lista; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $aluno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="row" style="margin-bottom: 0px">
                    <div class="col s12 m12 l9">
                        <?php echo '<p class="valign-wrapper">' . $aluno['nome_beneficiario'] . '</p>'; ?>

                    </div>
                    <div class="col s12 m12 l3 center">
                        <?php echo '<a href="' . base_url('dashboard/imprimir-beneficiario/') . $aluno['idbeneficiario'] . '" target="_blank" class="right btn waves-effect waves-light green darken-4">Imprimir</a>'; ?>

                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>