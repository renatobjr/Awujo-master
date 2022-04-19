<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">
                    Cadastro de Projetos
                    <i class="material-icons small right">assignment</i>
                </span>
                <?php echo form_open("dashboard/inserir-projeto"); ?>

                <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="<?php echo e($_SESSION['id-usuario']); ?>">
                <!-- Lançar ID do projeto para edição - Revisão futura -->
                <div class="card-action">
                    <div class="row">
                        <span class="light">Informações sobre o Projeto</span>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l6 input-field">
                            <i class="material-icons prefix">assignment</i>
                            <input type="text" name="nome-projeto" id="nome-projeto" 
                                class="validate <?php if(form_error('nome-projeto')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                value="<?php echo e(set_value('nome-projeto')); ?>">
                            <label for="nome-projeto">Nome do Projeto</label>
                            <span class="helper-text" data-error="<?php echo form_error('nome-projeto'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l6 input-field">
                            <i class="material-icons prefix">account_balance</i>
                            <input type="text" name="patrocinador" id="patrocinador" 
                                class="validate <?php if(form_error('patrocinador')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                value="<?php echo e(set_value('patrocinador')); ?>">
                            <label for="patrocinador">Patrocinador</label>
                            <span class="helper-text" data-error="<?php echo form_error('patrocinador'); ?>"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 input-field">
                            <i class="material-icons prefix">school</i>
                            <label for="atividades">Descrição das Oficinas</label>
                            <textarea name="atividades" id="atividades" cols="30" rows="10" 
                                class="materialize-textarea validate <?php if(form_error('atividades')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"></textarea>
                            <span class="helper-text" data-error="<?php echo form_error('atividades'); ?>"></span>    
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-light green darken-4">
                            Salvar Projeto
                        </button>   
                    </div>
                </div>
                <?php echo form_close(); ?>

            </div>
        </div>
    </div>
</div>