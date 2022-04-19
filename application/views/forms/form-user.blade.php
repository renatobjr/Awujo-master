<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">Usuários do Sistema
                    <i class="material-icons small right">account_circle</i></span>
            </div>
            {!! form_open('dashboard/inserir-usuario') !!}
            <div class="card-action">
                <div class="row">
                    <div class="col s12 m12 l4 input-field">{{-- Nome do usuario --}}
                        <i class="material-icons prefix">account_circle</i>
                        <input type="text" name="nome-usuario" id="nome-usuario"
                               class="validate @if (form_error('nome-usuario')) {{ 'invalid' }} @endif"
                               value="{{ set_value('nome-usuario') }}">
                        <label for="nome-usuario">Nome completo</label>
                        <span class="helper-text" data-error="{!! form_error('nome-usuario') !!}"></span>
                    </div>
                    <div class="col s12 m12 l4 input-field">{{-- Email do usuario --}}
                        <i class="material-icons prefix">email</i>
                        <input type="email" name="email-usuario" id="email-usuario"
                               class="validate @if (form_error('email-usuario')) {{ 'invalid' }} @endif"
                               value="{{ set_value('email-usuario') }}">
                        <label for="email-usuario">E-mail</label>
                        <span class="helper-text" data-error="{!! form_error('email-usuario') !!}"></span>
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

            {!! form_close() !!}
        </div>
    </div>
</div>