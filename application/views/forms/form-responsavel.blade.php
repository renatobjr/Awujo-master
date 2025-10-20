<div class="row">
  <div class="col s12 m12 l12">
    <div class="card white">
      <div class="card-content black-text">
        <span class="card-title light">
          {!! isset($method) ? 'Cadastro do Responsável pela Família' : 'Edição de Cadastro' !!}
          <i class="material-icons small right">supervised_user_circle</i>
        </span>
      </div>
      @if(isset($method))
      {!! form_open("dashboard/inserir-responsavel") !!}
      @else
      {!! form_open("dashboard/atualizar-responsavel") !!}
      {!! '<input type="hidden" name="idresponsavel" id="idresponsavel" value="' . $idresponsavel . '">' !!}
      @endif
      <input type="hidden" name="responsavel-cadastro" id="responsavel-cadastro" value="{{ $_SESSION['id-usuario'] }}">
      <div class="card-action">{{-- Informações pessoais --}}
        <div class="row">
          <span class="light">Informações Pessoais</span>
        </div>
        <div class="row">
          <div class="col s12 m12 l6 input-field">{{-- Nome completo --}}
            <i class="material-icons prefix">account_circle</i>
            <input type="text" name="nome-responsavel" id="nome-responsavel"
              class="validate @if (form_error('nome-responsavel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('nome-responsavel') : $nome_responsavel !!}">
            <label for="nome-responsavel">Nome completo</label>
            <span class="helper-text" data-error="{!! form_error('nome-responsavel') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">{{-- CPF --}}
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="cpf-responsavel" id="cpf-responsavel"
              class="cpf validate @if (form_error('cpf-responsavel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('cpf-responsavel') : $cpf !!}">
            <label for="cpf-responsavel">CPF</label>
            <span class="helper-text" data-error="{!! form_error('cpf-responsavel') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">{{-- NIS --}}
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="nis-responsavel" id="nis-responsavel"
              class="nis validate @if (form_error('nis-responsavel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('nis-responsavel') : $nis !!}">
            <label for="nis-responsavel">NIS</label>
            <span class="helper-text" data-error="{!! form_error('nis-responsavel') !!}"></span>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l2 input-field">{{-- Idade --}}
            <i class="material-icons prefix">calendar_today</i>
            <input type="text" name="idade-responsavel" id="idade-responsavel"
              class="validate @if (form_error('idade-responsavel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('idade-responsavel') : $idade !!}">
            <label for="idade-responsavel"><small>Idade em anos</small></label>
            <span class="helper-text" data-error="{!! form_error('idade-responsavel') !!}"></span>
          </div>
          <div class="col s12 m12 l5 input-field">{{-- Raça --}}
            <i class="material-icons prefix">person</i>
            <select name="raca-responsavel" id="raca-responsavel">
              <option value="1" @if ( ! isset($method) && ($raca==='1' )) {{ 'selected' }} @endif>Negra</option>
              <option value="2" @if ( ! isset($method) && ($raca==='2' )) {{ 'selected' }} @endif>Branca</option>
              <option value="3" @if ( ! isset($method) && ($raca==='3' )) {{ 'selected' }} @endif>Parda</option>
              <option value="4" @if ( ! isset($method) && ($raca==='4' )) {{ 'selected' }} @endif>Indígena</option>
              <option value="5" @if ( ! isset($method) && ($raca==='5' )) {{ 'selected' }} @endif>Outra não especificada
              </option>
            </select>
            <label>Raça</label>
          </div>
          <div class="col s12 m12 l5 input-field">{{-- Escolaridade --}}
            <i class="material-icons prefix">school</i>
            <select name="escolaridade" id="escolaridade">
              <option value="1" @if ( ! isset($method) && ($escolaridade==='1' )) {{ 'selected' }} @endif>Sem
                Escolaridade</option>
              <option value="2" @if ( ! isset($method) && ($escolaridade==='2' )) {{ 'selected' }} @endif>Fundamental I
              </option>
              <option value="3" @if ( ! isset($method) && ($escolaridade==='3' )) {{ 'selected' }} @endif>Fundamental II
              </option>
              <option value="4" @if ( ! isset($method) && ($escolaridade==='4' )) {{ 'selected' }} @endif>Ensino Médio
              </option>
              <option value="5" @if ( ! isset($method) && ($escolaridade==='5' )) {{ 'selected' }} @endif>Ensino
                Superior</option>
            </select>
            <label>Escolaridade</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l2 input-field">{{-- Busca cep --}}
            <i class="material-icons prefix">add_location</i>
            <input type="text" name="busca-cep" id="busca-cep"
              class="cep validate @if (form_error('busca-cep')) {{ 'invalid' }} @endif"
              value="{{ set_value('busca-cep') }}">
            <label for="busca-cep">CEP</label>
            <span class="helper-text" data-error="{!! form_error('busca-cep') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">{{-- Telefone --}}
            <i class="material-icons prefix">phone</i>
            <input type="text" name="telefone-fixo" id="telefone-fixo"
              class="fone validate @if (form_error('telefone-fixo')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('telefone-fixo') : $telefone_fixo !!}">
            <label for="telefone-fixo">Telefone Fixo</label>
            <span class="helper-text" data-error="{!! form_error('telefone-fixo') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">{{-- Telefone --}}
            <i class="material-icons prefix">smartphone</i>
            <input type="text" name="telefone-movel" id="telefone-movel"
              class="movel validate @if (form_error('telefone-movel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('telefone-movel') : $telefone_movel !!}">
            <label for="telefone-movel">Celular</label>
            <span class="helper-text" data-error="{!! form_error('telefone-movel') !!}"></span>
          </div>
          <div class="col s12 m12 l4 input-field">{{-- Pessoa para contato --}}
            <i class="material-icons prefix">person</i>
            <input type="text" name="pessoa-contato" id="pessoa-contato"
              value="{!! isset($method) ? set_value('pessoa-contato') : $pessoa_contato !!}">
            <label for="pessoa-contato">Pessoa para contato</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l5 input-field">{{-- Logradouro --}}
            <i class="material-icons prefix">home</i>
            <input type="text" name="logradouro" id="logradouro" class="validate"
              value="{!! isset($method) ? set_value('logradouro') : $rua !!}" placeholder="">
            <label for="logradouro">Endereço</label>
          </div>
          <div class="col s12 m12 l2 input-field">{{-- Numero --}}
            <i class="material-icons prefix">filter_3</i>
            <input type="text" name="numero" id="numero"
              class="validate @if (form_error('numero')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('numero') : $numero !!}">
            <label for="numero">Número</label>
            <span class="helper-text" data-error="{!! form_error('numero') !!}"></span>
          </div>
          <div class="col s12 m12 l5 input-field">{{-- Bairro --}}
            <i class="material-icons prefix">home</i>
            <input type="text" name="bairro" id="bairro" class="validate"
              value="{!! isset($method) ? set_value('bairro') : $idade !!}" placeholder="">
            <label for="bairro">Bairro</label>
          </div>
        </div>
      </div>
      <div class="card-action">{{-- Composição familiar --}}
        <div class="row">
          <span class="light">Composição Familiar</span>
        </div>
        <div class="row">
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">child_care</i>
            <input type="text" name="criancas-ate-06" id="criancas-ate-06"
              class="validate @if (form_error('criancas-ate-06')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('criancas-ate-06') : $criancas_ate_06_anos !!}">
            <label for="criancas-ate-06"><small>Crinças até 06 anos</small></label>
            <span class="helper-text" data-error="{!! form_error('criancas-ate-06') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">face</i>
            <input type="text" name="criancas-07-ate-17" id="criancas-07-ate-17"
              class="validate @if (form_error('criancas-07-ate-17')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('criancas-07-ate-17') : $criancas_entre_07_17_anos !!}">
            <label for="criancas-07-ate-17"><small>Crianças entre 07 e 17 anos</small></label>
            <span class="helper-text" data-error="{!! form_error('criancas-07-ate-17') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">person</i>
            <input type="text" name="adultos" id="adultos"
              class="validate @if (form_error('adultos')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('adultos') : $adultos !!}">
            <label for="adultos">Adultos</label>
            <span class="helper-text" data-error="{!! form_error('adultos') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">person</i>
            <input type="text" name="idosos" id="idosos"
              class="validate @if (form_error('idosos')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('idosos') : $idosos !!}">
            <label for="idosos">Maiores que 60 anos</label>
            <span class="helper-text" data-error="{!! form_error('idosos') !!}"></span>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l3">
            <i class="material-icons">accessible</i>
            <label>Pessoa com deficiência</label>
            <p>
              <label>
                <input type="radio" name="pessoa-com-deficiencia" id="deficiente-sim" value="1" @if ( ! isset($method)
                  && ($pessoa_deficiencia==='1' )) {{ 'checked' }} @endif>
                <span>Sim</span>
              </label>
            </p>
            <p>
              <label>
                <input type="radio" name="pessoa-com-deficiencia" id="deficiente-nao" value="0" @if ( ! isset($method)
                  && ($pessoa_deficiencia==='0' )) {{ 'checked' }} @endif>
                <span>Não</span>
              </label>
            </p>
          </div>
          <div class="col s12 m12 l4 input-field">
            <i class="material-icons prefix">healing</i>
            <input type="text" name="tipo-deficiencia" id="tipo-deficiencia" class="validate"
              value="{!! isset($method) ? set_value('tipo-deficiencia') : $tipo_deficiencia !!}">
            <label for="tipo-deficiencia"><small>Informe a deficiência em caso positivo</small></label>
          </div>
          <div class="col s12 m12 l5 input-field">
            <i class="material-icons prefix">person</i>
            <input type="text" name="nome-deficiente" id="nome-deficiente" class="validate"
              value="{!! isset($method) ? set_value('nome-deficiente') : $nome_deficiente !!}">
            <label for="nome-deficiente">Nome completo</label>
          </div>
        </div>
      </div>
      <div class="card-action">{{-- Informações sócioeconômicas --}}
        <div class="row">
          <span class="light">Informações Sócioeconômicas</span>
        </div>
        <div class="row">
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">monetization_on</i>
            <input type="text" name="renda-responsavel" id="renda-responsavel"
              class="real validate @if (form_error('renda-responsavel')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('renda-responsavel') : $renda_responsavel !!}"
              placeholder="Valor em R$">
            <label for="renda-responsavel"><small>Renda do responsável</small></label>
            <span class="helper-text" data-error="{!! form_error('renda-responsavel') !!}"></span>
          </div>
          <div class="col s12 m12 l3 input-field">
            <i class="material-icons prefix">monetization_on</i>
            <input type="text" name="renda-adultos" id="renda-adultos"
              class="real validate @if (form_error('renda-adultos')) {{ 'invalid' }} @endif"
              value="{!! isset($method) ? set_value('renda-adultos') : $renda_adultos !!}" placeholder="Valor em R$">
            <label for="renda-adultos">Renda total</label>
            <span class="helper-text" data-error="{!! form_error('renda-adultos') !!}"></span>
          </div>
          <div class="col s12 m12 l3 offset-l3 input-field">
            <i class="material-icons prefix">monetization_on</i>
            <input readonly type="text" name="renda-total" id="renda-total" class="real"
              value="{!! isset($method) ? set_value('renda-total') : $renda_total !!}" placeholder="Valor em R$">
            <label for="renda-total">Renda total da Família</label>
          </div>
        </div>
        <div class="row">
          <div class="col s12 m12 l4 input-field">
            <i class="material-icons prefix">account_balance</i>
            <select name="programas-governo[]" size="6" id="programas-governo" multiple>
              <option value="1" @if ( ! isset($method) && ($nenhum_programa==='1' )) {{ 'selected' }} @endif>Nenhum
              </option>
              <option value="2" @if ( ! isset($method) && ($bolsa_familia==='1' )) {{ 'selected' }} @endif>Bolsa Família
              </option>
              <option value="3" @if ( ! isset($method) && ($bpc==='1' )) {{ 'selected' }} @endif>BPC</option>
              <option value="4" @if ( ! isset($method) && ($aposentadoria==='1' )) {{ 'selected' }} @endif>Aposentadoria
              </option>
              <option value="5" @if ( ! isset($method) && ($pensao==='1' )) {{ 'selected' }} @endif>Pensão</option>
              <option value="6" @if ( ! isset($method) && ($beneficio_eventual==='1' )) {{ 'selected' }} @endif>
                Benefício eventual</option>
            </select>
            <label for="programas-governo">Programas do Governo Federal</label>
          </div>
        </div>
      </div>
      <div class="card-action">{{-- Submit btn or refresh btn --}}
        <div class="center">
          <button type="submit" class="btn waves-effect waves-light green darken-4">
            {!! isset($method) ? 'Salvar' : 'Atualizar' !!}
          </button>
        </div>
      </div>
      {!! form_close() !!}
    </div>
  </div>
</div>