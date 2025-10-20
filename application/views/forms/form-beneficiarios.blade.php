<div class="row">
  <div class="col s12 m12 l12">
    <div class="card white">
      <div class="card-content black-text">
        <span class="card-title light">
          {!! isset($method) ? 'Cadastro de Beneficiários de Projetos' : 'Edição de Cadastro' !!}
          <i class="material-icons small right">face</i>
        </span>
      </div>

      @if(isset($method))
      {!! form_open("dashboard/inserir-beneficiario") !!}
      @else
      {!! form_open("dashboard/atualizar-beneficiario") !!}
      <input type="hidden" name="idbeneficiario" id="idbeneficiario"
        value="{{ isset($idbeneficiario) ? $idbeneficiario : '' }}">
      @endif
      <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="{{ $_SESSION['id-usuario'] }}">
      <div class="card-action">{{-- Informações Pessoais --}}
        <div class="row">
          <span class="light">Informações Pessoais</span>
        </div>

        <div class="row">
          {{-- Nome completo --}}
          <div class="col s12 m12 l4 input-field">
            <i class="material-icons prefix">face</i>
            <input type="text" name="nome-beneficiario" id="nome-beneficiario"
              class="validate @if (form_error('nome-beneficiario')) {{ 'invalid' }} @endif"
              value="{{ isset($beneficiario) ? $beneficiario['nome_beneficiario'] : set_value('nome-beneficiario') }}">
            <label for="nome-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['nome_beneficiario']) ? 'active' : '' }}">Nome
              Completo do Beneficiário</label>
            <span class="helper-text" data-error="{!! form_error('nome-beneficiario') !!}"></span>
          </div>

          {{-- Seleção de responsável --}}
          <div class="col s12 m12 l4 input-field">
            <i class="material-icons prefix">supervised_user_circle</i>
            <select name="responsavel" id="responsavel">
              <option value="">Selecione o responsável</option>
              @foreach($responsaveis as $responsavel)
              <option value="{{ $responsavel['idresponsavel'] }}" @if ( ! isset($method) &&
                ($beneficiario['responsavel']===$responsavel['idresponsavel']) ) {{ 'selected'  }} @endif>
                {{ @trim($responsavel['nome_responsavel']) }}
              </option>
              @endforeach
            </select>
            <label for="responsavel"
              class="{{ isset($beneficiario) && !empty($beneficiario['responsavel']) ? 'active' : '' }}">Responsável
              pelo Beneficiário</label>
            <span class="helper-text" data-error="{!! form_error('responsavel') !!}"></span>
          </div>

          {{-- Raça --}}
          <div class="col s12 m12 l4 input-field">
            <i class="material-icons prefix">person</i>
            <select name="raca" id="raca">
              <option value="">Selecione</option>
              <option value="1" @if ( ! isset($method) && ($beneficiario['raca']==='1' )) {{ 'selected' }} @endif>Negra
              </option>
              <option value="2" @if ( ! isset($method) && ($beneficiario['raca']==='2' )) {{ 'selected' }} @endif>Branca
              </option>
              <option value="3" @if ( ! isset($method) && ($beneficiario['raca']==='3' )) {{ 'selected' }} @endif>Parda
              </option>
              <option value="4" @if ( ! isset($method) && ($beneficiario['raca']==='4' )) {{ 'selected' }} @endif>
                Indígena</option>
              <option value="5" @if ( ! isset($method) && ($beneficiario['raca']==='5' )) {{ 'selected' }} @endif>Outra
                não especificada
            </select>
            <label for="raca"
              class="{{ isset($beneficiario) && !empty($beneficiario['raca']) ? 'active' : '' }}">Raça</label>
          </div>
        </div>

        <div class="row">
          {{-- Data nascimento --}}
          <div class="col s12 m12 l2 input-field">
            <i class="material-icons prefix">calendar_today</i>
            <input type="text" name="data-nascimento" id="data-nascimento"
              class="datepicker validate @if (form_error('data-nascimento')) {{ 'invalid' }} @endif"
              value="{{ isset($beneficiario) && !empty($beneficiario['data_nascimento']) ? date('d/m/Y', strtotime($beneficiario['data_nascimento'])) : set_value('data-nascimento') }}">
            <label for="data-nascimento"
              class="{{ isset($beneficiario) && !empty($beneficiario['data_nascimento']) ? 'active' : '' }}"><small>Data
                Nascimento</small></label>
            <span class="helper-text" data-error="{!! form_error('data-nascimento') !!}"></span>
          </div>

          {{-- Idade --}}
          <div class="col s12 m12 l2 input-field">
            <i class="material-icons prefix">calendar_today</i>
            <input type="text" name="idade-beneficiario" id="idade-beneficiario"
              class="validate @if (form_error('idade-beneficiario')) {{ 'invalid' }} @endif"
              value="{{ isset($beneficiario) ? $beneficiario['idade_beneficiario'] : set_value('idade-beneficiario') }}">
            <label for="idade-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['idade_beneficiario']) ? 'active' : '' }}"><small>Idade
                em anos</small></label>
            <span class="helper-text" data-error="{!! form_error('idade-beneficiario') !!}"></span>
          </div>

          {{-- CPF --}}
          <div class="col s12 m12 l2 input-field">
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="cpf-beneficiario" id="cpf-beneficiario" class="cpf"
              value="{{ isset($beneficiario) ? $beneficiario['cpf_beneficiario'] : set_value('cpf-beneficiario') }}">
            <label for="cpf-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['cpf_beneficiario']) ? 'active' : '' }}">CPF</label>
          </div>

          {{-- NIS --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="nis-beneficiario" id="nis-beneficiario" class="nis"
              value="{{ isset($beneficiario) ? $beneficiario['nis_beneficiario'] : set_value('nis-beneficiario') }}">
            <label for="nis-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['nis_beneficiario']) ? 'active' : '' }}">NIS</label>
          </div>

          {{-- Identidade --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="identidade-beneficiario" id="identidade-beneficiario"
              value="{{ isset($beneficiario) ? $beneficiario['identidade_beneficiario'] : set_value('identidade-beneficiario') }}">
            <label for="identidade-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['identidade_beneficiario']) ? 'active' : '' }}">Identidade</label>
          </div>
        </div>

        <div class="row">
          {{-- Escola --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">school</i>
            <input type="text" name="escola-beneficiario" id="escola-beneficiario"
              value="{{ isset($beneficiario) ? $beneficiario['escola_beneficiario'] : set_value('escola-beneficiario') }}">
            <label for="escola-beneficiario"
              class="{{ isset($beneficiario) && !empty($beneficiario['escola_beneficiario']) ? 'active' : '' }}">Nome da
              Escola</label>
          </div>

          {{-- Escolaridade --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">school</i>
            <select name="escolaridade" id="escolaridade">
              <option value="">Selecione</option>
              <option value="1" @if ( ! isset($method) && ($beneficiario['escolaridade_beneficiario']==='1' ))
                {{ 'selected' }} @endif>Sem
                Escolaridade</option>
              <option value="2" @if ( ! isset($method) && ($beneficiario['escolaridade_beneficiario']==='2' ))
                {{ 'selected' }} @endif>Fundamental I
              </option>
              <option value="3" @if ( ! isset($method) && ($beneficiario['escolaridade_beneficiario']==='3' ))
                {{ 'selected' }} @endif>Fundamental II
              </option>
              <option value="4" @if ( ! isset($method) && ($beneficiario['escolaridade_beneficiario']==='4' ))
                {{ 'selected' }} @endif>Ensino Médio
              </option>
              <option value="5" @if ( ! isset($method) && ($beneficiario['escolaridade_beneficiario']==='5' ))
                {{ 'selected' }} @endif>Ensino
                Superior</option>
            </select>
            <label for="escolaridade"
              class="{{ isset($beneficiario) && !empty($beneficiario['escolaridade_beneficiario']) ? 'active' : '' }}">Escolaridade</label>
          </div>

          {{-- Projeto --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">assignment</i>
            <select name="projeto" id="projeto">
              <option value="">Selecione o projeto</option>
              @foreach($projetos as $projeto)
              <option value="{{ $projeto['idprojeto'] }}" @if ( ! isset($method) &&
                ($beneficiario['projeto']===$projeto['idprojeto']) ) {{ 'selected'  }} @endif>
                {{ trim($projeto['nome_projeto']) }}
              </option>
              @endforeach
            </select>
            <label for="projeto"
              class="{{ isset($beneficiario) && !empty($beneficiario['projeto']) ? 'active' : '' }}">Projeto</label>
            <span class="helper-text" data-error="{!! form_error('projeto') !!}"></span>
          </div>

          {{-- Turno --}}
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">event</i>
            <select name="turno" id="turno">
              <option value="">Selecione</option>
              <option value="1" @if ( ! isset($method) && ($beneficiario['turno']==='1' )) {{ 'selected' }} @endif>
                Manhã</option>
              <option value="2" @if ( ! isset($method) && ($beneficiario['turno']==='2' )) {{ 'selected' }} @endif>
                Tarde</option>
            </select>
            <label for="turno"
              class="{{ isset($beneficiario) && !empty($beneficiario['turno']) ? 'active' : '' }}">Turno do
              Projeto</label>
            <span class="helper-text" data-error="{!! form_error('turno') !!}"></span>
          </div>
        </div>
      </div>

      <div class="card-action center">
        <button type="submit" class="btn waves-effect waves-light green darken-4">
          {!! isset($method) ? 'Salvar' : 'Atualizar' !!}
        </button>
      </div>

      {!! form_close() !!}
    </div>
  </div>
</div>

<script>
$(document).ready(function() {
  $('select').formSelect();
  $('.cpf').mask('000.000.000-00', {
    reverse: true
  });
  $('.nis').mask('0.000.000.000-0', {
    reverse: true
  });
  $('.datepicker').datepicker({
    format: 'dd/mm/yyyy',
    i18n: {
      today: 'Hoje',
      clear: 'Limpar',
      done: 'Ok',
      nextMonth: 'Próximo mês',
      previousMonth: 'Mês anterior',
      weekdaysAbbrev: ['D', 'S', 'T', 'Q', 'Q', 'S', 'S'],
      weekdaysShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'],
      weekdays: ['Domingo', 'Segunda-Feira', 'Terça-Feira', 'Quarta-Feira', 'Quinta-Feira', 'Sexta-Feira',
        'Sábado'
      ],
      monthsShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
      months: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
        'Outubro', 'Novembro', 'Dez'
      ]
    }
  });
});
</script>