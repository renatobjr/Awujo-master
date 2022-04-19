<?php $__env->startSection('conteudo-principal'); ?>
    <div class="row">
        <div class="col s12 m12 l12">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="card-title light">Cadastro do Responsável pela família<i class="material-icons small right">supervised_user_circle</i></span>
                </div>
                <?php echo form_open('dashboard/inserir-responsavel'); ?>

                <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="<?php echo e($_SESSION['id-usuario']); ?>">
                <div class="card-action">
                    <div class="row">
                        <span class="light">Informações Pessoais</span>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l6 input-field">
                            <i class="material-icons prefix">account_circle</i>
                            <input type="text" name="nome-responsavel" id="nome-responsavel"
                                   class="validate <?php if(form_error('nome-responsavel')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('nome-responsavel')); ?>">
                            <label for="nome-responsavel">Nome completo</label>
                            <span class="helper-text" data-error="<?php echo form_error('nome-responsavel'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">filter_3</i>
                            <input type="text" name="cpf-responsavel" id="cpf-responsavel"
                                   class="cpf validate <?php if(form_error('cpf-responsavel')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('cpf-responsavel')); ?>">
                            <label for="cpf-responsavel" >CPF</label>
                            <span class="helper-text" data-error="<?php echo form_error('cpf-responsavel'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">filter_3</i>
                            <input type="text" name="nis-responsavel" id="nis-responsavel"
                                   class="nis validate <?php if(form_error('nis-responsavel')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('nis-responsavel')); ?>">
                            <label for="nis-responsavel">NIS</label>
                            <span class="helper-text" data-error="<?php echo form_error('nis-responsavel'); ?>"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l2 input-field">
                            <i class="material-icons prefix">calendar_today</i>
                            <input type="text" name="idade-responsavel" id="idade-responsavel"
                                   class="validate <?php if(form_error('idade-responsavel')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('idade-responsavel')); ?>">
                            <label for="idade-responsavel"><small>Idade em anos</small></label>
                            <span class="helper-text" data-error="<?php echo form_error('idade-responsavel'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">person</i>
                            <select name="raca-responsavel" id="raca-responsavel">
                                <option value="1">Negra</option>
                                <option value="2">Branca</option>
                                <option value="3">Parda</option>
                                <option value="4">Indígena</option>
                                <option value="5">Outra não especificada</option>
                            </select>
                            <label>Raça</label>
                        </div>
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">school</i>
                            <select name="escolaridade" id="escolaridade">
                                <option value="1">Sem Escolaridade</option>
                                <option value="2">Fundamental I</option>
                                <option value="3">Fundamental II</option>
                                <option value="4">Ensino Médio</option>
                                <option value="5">Ensino Superior</option>
                            </select>
                            <label>Escolaridade</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">add_location</i>
                            <input type="text" name="busca-cep" id="busca-cep"
                                   class="cep validate <?php if(form_error('busca-cep')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('busca-cep')); ?>">
                            <label for="busca-cep">CEP</label>
                            <span class="helper-text" data-error="<?php echo form_error('busca-cep'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">phone</i>
                            <input type="text" name="telefone" id="telefone"
                                   class="fone validate <?php if(form_error('telefone')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('telefone')); ?>">
                            <label for="telefone">Telefone</label>
                            <span class="helper-text" data-error="<?php echo form_error('telefone'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="pessoa-contato" id="pessoa-contato"
                                   value="<?php echo e(set_value('pessoa-contato')); ?>">
                            <label for="pessoa-contato">Pessoa para contato</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">home</i>
                            <input type="text" name="logradouro" id="logradouro"
                                   class="validate"
                                   value="<?php echo e(set_value('logradouro')); ?>"
                                   placeholder="">
                            <label for="logradouro">Endereço</label>
                        </div>
                        <div class="col s12 m12 l2 input-field">
                            <i class="material-icons prefix">filter_3</i>
                            <input type="text" name="numero" id="numero"
                                   class="validate <?php if(form_error('numero')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('numero')); ?>">
                            <label for="numero">Número</label>
                            <span class="helper-text" data-error="<?php echo form_error('numero'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">home</i>
                            <input type="text" name="bairro" id="bairro" class="validate"
                                   value="<?php echo e(set_value('bairro')); ?>"
                                   placeholder="">
                            <label for="bairro">Bairro</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row">
                        <span class="light">Composição Familiar</span>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">child_care</i>
                            <input type="text" name="criancas-ate-06" id="criancas-ate-06"
                                   class="validate <?php if(form_error('criancas-ate-06')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('criancas-ate-06')); ?>">
                            <label for="criancas-ate-06"><small>Crinças até 06 anos</small></label>
                            <span class="helper-text" data-error="<?php echo form_error('criancas-ate-06'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">face</i>
                            <input type="text" name="criancas-07-ate-17" id="criancas-07-ate-17"
                                   class="validate <?php if(form_error('criancas-07-ate-17')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('criancas-07-ate-17')); ?>">
                            <label for="criancas-07-ate-17"><small>Crianças entre 07 e 17 anos</small></label>
                            <span class="helper-text" data-error="<?php echo form_error('criancas-07-ate-17'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="adultos" id="adultos"
                                   class="validate <?php if(form_error('adultos')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('adultos')); ?>">
                            <label for="adultos">Adultos</label>
                            <span class="helper-text" data-error="<?php echo form_error('adultos'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="idosos" id="idosos"
                                   class="validate <?php if(form_error('idosos')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('idosos')); ?>">
                            <label for="idosos">Maiores que 60 anos</label>
                            <span class="helper-text" data-error="<?php echo form_error('idosos'); ?>"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l3">
                            <i class="material-icons">accessible</i>
                            <label>Pessoa com deficiência</label>
                            <p>
                                <label>
                                    <input type="radio" name="pessoa-com-deficiencia" id="deficiente-sim" value="1">
                                    <span>Sim</span>
                                </label>
                            </p>
                            <p>
                                <label>
                                    <input checked type="radio" name="pessoa-com-deficiencia" id="deficiente-nao" value="0">
                                    <span>Não</span>
                                </label>
                            </p>
                        </div>
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">healing</i>
                            <input type="text" name="tipo-deficiencia" id="tipo-deficiencia" class="validate"
                                   value="<?php echo e(set_value('tipo-deficiencia')); ?>">
                            <label for="tipo-deficiencia"><small>Informe a deficiência em caso positivo</small></label>
                        </div>
                        <div class="col s12 m12 l5 input-field">
                            <i class="material-icons prefix">person</i>
                            <input type="text" name="nome-deficiente" id="nome-deficiente" class="validate"
                                   value="<?php echo e(set_value('nome-deficiente')); ?>">
                            <label for="nome-deficiente">Nome completo</label>
                        </div>
                    </div>
                </div>
                <div class="card-action">
                    <div class="row">
                        <span class="light">Informações Sócioeconômicas</span>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">monetization_on</i>
                            <input type="text" name="renda-responsavel" id="renda-responsavel"
                                   class="real validate <?php if(form_error('renda-responsavel')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('renda-responsavel')); ?>"
                                   placeholder="Valor em R$">
                            <label for="renda-responsavel"><small>Renda do responsável</small></label>
                            <span class="helper-text" data-error="<?php echo form_error('renda-responsavel'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 input-field">
                            <i class="material-icons prefix">monetization_on</i>
                            <input type="text" name="renda-adultos" id="renda-adultos"
                                   class="real validate <?php if(form_error('renda-adultos')): ?> <?php echo e('invalid'); ?> <?php endif; ?>"
                                   value="<?php echo e(set_value('renda-adultos')); ?>"
                                   placeholder="Valor em R$">
                            <label for="renda-adultos">Renda total</label>
                            <span class="helper-text" data-error="<?php echo form_error('renda-adultos'); ?>"></span>
                        </div>
                        <div class="col s12 m12 l3 offset-l3 input-field">
                            <i class="material-icons prefix">monetization_on</i>
                            <input readonly type="text" name="renda-total" id="renda-total"
                                   class="real"
                                   value="<?php echo e(set_value('renda-total')); ?>"
                                   placeholder="Valor em R$">
                            <label for="renda-total">Renda total da Família</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l4 input-field">
                            <i class="material-icons prefix">account_balance</i>
                            <select name="programas-governo[]" size="6" id="programas-governo" multiple>
                                <option value="1">Nenhum</option>
                                <option value="2">Bolsa Família</option>
                                <option value="3">BPC</option>
                                <option value="4">Aposentadoria</option>
                                <option value="5">Pensão</option>
                                <option value="6">Benefício eventual</option>
                            </select>
                            <label for="programas-governo">Programas do Governo Federal</label>
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