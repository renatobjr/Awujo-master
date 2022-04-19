<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">
                    Cadastro de Benefiários de Projeto
                    <i class="material-icons small right">face</i>
                </span>
            </div>  
            {!! form_open("dashboard/inserir-beneficiario") !!}
            <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="{{ $_SESSION['id-usuario'] }}">
            <div class="card-action">{{-- Informações Pessoais --}}
                <div class="row">
                    <span class="light">Informações Pessoais</span>
                </div>
                <div class="row">
                    <div class="col s12 m12 l4 input-field">{{-- Nome completo --}}
                        <i class="material-icons prefix">face</i>
                        <input type="text" name="nome-beneficiario" id="nome-beneficiario" 
                            class="validate @if (form_error('nome-beneficiario')) {{ 'invalid' }} @endif">
                        <label for="nome-beneficiario">Nome Completo do Beneficiário</label>
                        <span class="helper-text" data-error="{!! form_error('nome-beneficiario') !!}"></span>
                    </div>
                    <div class="col s12 m12 l4 input-field">{{-- Seleção de responsavel --}}
                        <i class="material-icons prefix">supervised_user_circle</i>
                        <select name="responsavel" id="responsavel">
                            @foreach($responsaveis as $responsavel)
                                {!! '<option value="' . $responsavel['idresponsavel'] . '">' . $responsavel['nome_responsavel'] . '</option>'  !!}
                            @endforeach
                        </select>
                        <label for="responsavel">Responsável pelo Beneficiário</label>
                        <span class="helper-text" data-error="{!! form_error('responsavel') !!}"></span>    
                    </div>
                    <div class="col s12 m12 l4 input-field">{{-- Raça --}}
                        <i class="material-icons prefix">person</i>
                        <select name="raca" id="raca">
                            <option value="1">Negra</option>
                            <option value="2">Branca</option>
                            <option value="3">Parda</option>
                            <option value="4">Indígena</option>
                            <option value="5">Outra não especificada</option>
                        </select>
                        <label>Raça</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l2 input-field">{{-- aniversário --}}
                        <i class="material-icons prefix">calendar_today</i>
                        <input type="text" name="data-nascimento" id="data-nascimento"
                            class="datepicker validate @if (form_error('data-nascimento')) {{ 'invalid' }} @endif">
                        <label for="data-nascimento"><small>Data Nascimento</small></label>
                        <span class="helper-text" data-error="{!! form_error('data-nascimento') !!}"></span>
                    </div><div class="col s12 m12 l2 input-field">{{-- Idade --}}
                        <i class="material-icons prefix">calendar_today</i>
                        <input type="text" name="idade-beneficiario" id="idade-beneficiario"
                            class="validate @if (form_error('idade-beneficiario')) {{ 'invalid' }} @endif">
                        <label for="idade-beneficiario"><small>Idade em anos</small></label>
                        <span class="helper-text" data-error="{!! form_error('idade-beneficiario') !!}"></span>
                    </div>
                    <div class="col s12 m12 l2 input-field">{{-- CPF --}}
                        <i class="material-icons prefix">filter_3</i>
                        <input type="text" name="cpf-beneficiario" id="cpf-beneficiario"
                            class="cpf">
                        <label for="cpf-beneficiario">CPF</label>
                    </div>
                    <div class="col s12 m12 l3 input-field">{{-- NIS --}}
                        <i class="material-icons prefix">filter_3</i>
                        <input type="text" name="nis-beneficiario" id="nis-beneficiario"
                            class="nis">
                        <label for="nis-beneficiario">NIS</label>
                    </div>
                    <div class="col s12 m12 l3 input-field">{{-- Identidade --}}
                        <i class="material-icons prefix">filter_3</i>
                        <input type="text" name="identidade-beneficiario" id="identidade-beneficiario"
                            class="">
                        <label for="identidade-beneficiario">Identidade</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col s12 m12 l3 input-field">{{-- Escola --}}
                    <i class="material-icons prefix">school</i>
                        <input type="text" name="escola-beneficiario" id="escola-beneficiario"
                            class="validate @if (form_error('escola-beneficiario')) {{ 'invalid' }} @endif">
                        <label for="escola-beneficiario">Nome da Escola</label>
                        <span class="helper-text" data-error="{!! form_error('escola-beneficiario') !!}"></span>              
                    </div>
                    <div class="col s12 m12 l3 input-field">{{-- Escolaridade --}}
                        <i class="material-icons prefix">school</i>
                        <select name="escolaridade" id="escolaridade">
                            <option value="1">Sem Matrícula</option>
                            <option value="2">Fundamental I</option>
                            <option value="3">Fundamental II</option>
                            <option value="4">Ensino Médio</option>
                            <option value="5">Ensino Superior</option>
                        </select>
                        <label for="escolaridade">Escolaridade</label>
                    </div>
                    <div class="col s12 m12 l3 input-field">{{-- Projeto --}}
                    <i class="material-icons prefix">assignment</i>
                        <select name="projeto" id="projeto">
                        @foreach($projetos as $projeto)
                                {!! '<option value="' . $projeto['idprojeto'] . '">' . $projeto['nome_projeto'] . '</option>'  !!}
                        @endforeach
                        </select>
                        <label for="projeto">Projeto</label>
                        <span class="helper-text" data-error="{!! form_error('projeto') !!}"></span>              
                    </div>
                    <div class="col s12 m12 l3 input-field">{{-- turno --}}
                    <i class="material-icons prefix">event</i>
                        <select name="turno" id="turno">
                            <option value="1">Manhã</option>
                            <option value="2">Tarde</option>
                        </select>
                        <label for="turno">Turno do Projeto</label>
                        <span class="helper-text" data-error="{!! form_error('turno') !!}"></span>              
                    </div>
                </div>
            </div>
            <div class="card-action">{{-- Submit btn --}}
                <div class="center">
                    <button type="submit" class="btn waves-effect waves-light green darken-4">
                        Salvar
                    </button>
                </div>
            </div>
            {!! form_close() !!}
        </div>
    </div>
</div>