{{-- Extensão do template principal --}}
@extends('templates.app')

{{-- Conteúdo principal --}}
@section('conteudo-principal')
<div class="row">
  <div class="col s12">
    <div class="card white">
      <div class="card-content black-text">
        <span class="card-title light" style="display: flex; justify-content: space-between; align-items: center">
          Beneficiários Cadastrados
          <div>
            <a href="{{ base_url('dashboard/cadastrar-beneficiarios') }}" class="waves-effect waves-light btn green"
              data-tooltip="Novo beneficiário">
              <i class="material-icons left">add</i>Adicionar
            </a>
            <a href="{{ base_url('dashboard/imprimir-lista-beneficiarios') }}" class="waves-effect waves-light btn blue"
              data-tooltip="Imprimir lista" target="_blank">
              <i class="material-icons left">print</i>Imprimir lista
            </a>
          </div>
        </span>

        <div class="card-action">
          @if (empty($beneficiarios))
          <div class="row center" style="margin-top: 20px;">
            <i class="material-icons large grey-text text-lighten-2">info_outline</i>
            <p class="grey-text">
              Nenhum beneficiário encontrado. Utilize o botão "Adicionar beneficiário" acima para cadastrar um novo.
            </p>
          </div>
          @else
          <div class="responsive-table">
            <table class="highlight striped centered">
              <thead class="grey lighten-3">
                <tr>
                  <th>Nome</th>
                  <th>Responsável</th>
                  <th>CPF</th>
                  <th>NIS</th>
                  <th>Projeto</th>
                  <th>Turno</th>
                  <th>Idade</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($beneficiarios as $item)
                <tr>
                  <td>{{ $item['nome_beneficiario'] }}</td>
                  <td>{{ $item['nome_responsavel'] }}</td>
                  <td><span class="cpf">{{ $item['cpf_beneficiario'] }}</span></td>
                  <td><span class="nis">{{ $item['nis_beneficiario'] }}</span></td>
                  <td>{{ $item['nome_projeto'] }}</td>
                  <td>
                    @php
                    switch ($item['turno']) {
                    case 1: echo 'Manhã'; break;
                    case 2: echo 'Tarde'; break;
                    }
                    @endphp
                  </td>
                  <td>{{ $item['idade_beneficiario'] }}</td>
                  <td>
                    <div class="btn-group" style="display: flex; gap: 4px; justify-content: center;">
                      <a href="{{ base_url('dashboard/imprimir-beneficiario/' . $item['idbeneficiario']) }}"
                        class="btn-small waves-effect blue lighten-1" target="_blank" title="Imprimir">
                        <i class="material-icons">print</i>
                      </a>
                      <a href="{{ base_url('dashboard/editar-beneficiario/' . $item['idbeneficiario']) }}"
                        class="btn-small waves-effect amber darken-3" title="Editar">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="#modal-excluir-beneficiario" class="modal-trigger btn-small waves-effect red darken-3"
                        data-id-beneficiario="{{ $item['idbeneficiario'] }}"
                        data-name-beneficiario="{{ $item['nome_beneficiario'] }}" title="Excluir">
                        <i class="material-icons">delete</i>
                      </a>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
</div>

{{-- Modal de exclusão de beneficiário --}}
<div id="modal-excluir-beneficiario" class="modal">
  <div class="modal-content">
    <h5 class="light">Exclusão</h5>
    <p>Deseja excluir o beneficiário <b><span id="nome-beneficiario"></span></b> ?</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat grey lighten-4">Não</a>
    <a id="btn-submit-excluir-beneficiario"
      class="modal-close waves-effect waves-green btn-flat red darken-4 white-text">Sim</a>
  </div>
</div>

<script>
$(document).ready(function() {
  $('.cpf').mask('000.000.000-00', {
    reverse: true
  });
  $('.nis').mask('0.000.000.000-0', {
    reverse: true
  });

  $('#modal-excluir-beneficiario').modal({
    onOpenStart: function(modal, trigger) {

      const nome = $(trigger).data('name-beneficiario');
      const id = $(trigger).data('id-beneficiario');

      $('#nome-beneficiario').text(nome);
      $('#btn-submit-excluir-beneficiario').attr('href',
        `{{ base_url('dashboard/excluir-beneficiario/') }}/${id}`
      );
    }
  });

  var modals = document.querySelectorAll('.modal');
  M.Modal.init(modals);
});
</script>
@endsection