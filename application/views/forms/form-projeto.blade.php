<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">
                    Cadastro de Projetos
                    <i class="material-icons small right">assignment</i>
                </span>
                {!! form_open("dashboard/inserir-projeto") !!}
                <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="{{ $_SESSION['id-usuario'] }}">
                <!-- Lançar ID do projeto para edição - Revisão futura -->
                <div class="card-action">
                    <div class="row">
                        <span class="light">Informações sobre o Projeto</span>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l6 input-field">{{-- Nome do projeto --}}
                            <i class="material-icons prefix">assignment</i>
                            <input type="text" name="nome-projeto" id="nome-projeto" 
                                class="validate @if (form_error('nome-projeto')) {{ 'invalid' }} @endif"
                                value="{{ set_value('nome-projeto') }}">
                            <label for="nome-projeto">Nome do Projeto</label>
                            <span class="helper-text" data-error="{!! form_error('nome-projeto') !!}"></span>
                        </div>
                        <div class="col s12 m12 l6 input-field">{{-- Descrição do projeto --}}
                            <i class="material-icons prefix">account_balance</i>
                            <input type="text" name="patrocinador" id="patrocinador" 
                                class="validate @if (form_error('patrocinador')) {{ 'invalid' }} @endif"
                                value="{{ set_value('patrocinador') }}">
                            <label for="patrocinador">Patrocinador</label>
                            <span class="helper-text" data-error="{!! form_error('patrocinador') !!}"></span>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col s12 m12 l12 input-field">{{-- Atividades do Projeto --}}
                            <i class="material-icons prefix">school</i>
                            <label for="atividades">Descrição das Oficinas</label>
                            <textarea name="atividades" id="atividades" cols="30" rows="10" 
                                class="materialize-textarea validate @if (form_error('atividades')) {{ 'invalid' }} @endif"></textarea>
                            <span class="helper-text" data-error="{!! form_error('atividades') !!}"></span>    
                        </div>
                    </div>
                </div>
                <div class="card-action">{{-- Submit btn --}}
                    <div class="center">
                        <button type="submit" class="btn waves-effect waves-light green darken-4">
                            Salvar Projeto
                        </button>   
                    </div>
                </div>
                {!! form_close() !!}
            </div>
        </div>
    </div>
</div>