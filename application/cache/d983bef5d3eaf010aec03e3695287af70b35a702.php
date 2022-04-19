<?php $__env->startSection('conteudo-principal'); ?>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Usuários do Sistema
                        <i class="material-icons small right">account_circle</i></span>
                </div>
                <?php echo form_open('dashboard/inserir-usuario'); ?>

                <div class="card-action">
                    <div class="row">
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" name="nome-usuario" id="nome-usuario"
                                   class="validate <?php if(form_error('nome-usuario')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('nome-usuario')); ?>">
                            <label for="nome-usuario">Nome completo</label>
                            <span class="helper-text" data-error="<?php echo form_error('nome-usuario'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">email</i>
                            <input type="email" name="email-usuario" id="email-usuario"
                                   class="validate <?php if(form_error('email-usuario')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('email-usuario')); ?>">
                            <label for="email-usuario">E-mail</label>
                            <span class="helper-text" data-error="<?php echo form_error('email-usuario'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">assignment_ind</i>
                            <select name="nivel" id="nivel">
                                <option value="1">Dirigente</option>
                                <option value="2">Controle Social</option>
                                <option value="3">Coordenador</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-light green darken-4">Salvar</button>
                    </div>
                </div>

                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('templates.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>