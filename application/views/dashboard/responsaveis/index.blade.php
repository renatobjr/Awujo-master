{{-- Extensão do template principal --}}
@extends('templates.app')

{{-- Conteúdo principal --}}
@section('conteudo-principal')
<div class="row">
  <div class="col s12">
    <div class="card white">
      <div class="card-content black-text">
        <span class="card-title light" style="display: flex; justify-content: space-between; align-items: center">
          Responsáveis Cadastrados
          <div>
            <a href="{{ base_url('dashboard/cadastrar-responsavel') }}" class="waves-effect waves-light btn green"
              data-tooltip="Novo responsável">
              <i class="material-icons left">add</i>Adicionar
            </a>
            <a href="{{ base_url('dashboard/imprimir-lista-responsaveis') }}" class="waves-effect waves-light btn blue"
              data-tooltip="Imprimir lista" target="_blank">
              <i class="material-icons left">print</i>Imprimir lista
            </a>
          </div>
        </span>

        <div class="card-action">
          @if (empty($responsaveis))
          <div class="row center" style="margin-top: 20px;">
            <i class="material-icons large grey-text text-lighten-2">info_outline</i>
            <p class="grey-text">
              Nenhum responsável encontrado. Utilize o botão "Adicionar responsável" acima para cadastrar um novo.
            </p>
          </div>
          @else
          <div class="responsive-table">
            <table class="highlight striped centered">
              <thead class="grey lighten-3">
                <tr>
                  <th>Nome</th>
                  <th>CPF</th>
                  <th>NIS</th>
                  <th>Telefone Fixo</th>
                  <th>Celular</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($responsaveis as $item)
                <tr>
                  <td>{{ $item->nome_responsavel }}</td>
                  <td><span class="cpf">{{ $item->cpf }}</span></td>
                  <td><span class="nis">{{ $item->nis }}</span></td>
                  <td>{{ $item->telefone_fixo }}</td>
                  <td>{{ $item->telefone_movel }}</td>
                  <td>
                    <div class="btn-group" style="display: flex; gap: 4px; justify-content: center;">
                      <a href="{{ base_url('dashboard/imprimir-responsavel/' . $item->idresponsavel) }}"
                        class="btn-small waves-effect blue lighten-1" target="_blank" title="Imprimir">
                        <i class="material-icons">print</i>
                      </a>
                      <a href="{{ base_url('dashboard/editar-responsavel/' . $item->idresponsavel) }}"
                        class="btn-small waves-effect amber darken-3" title="Editar">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="#modal-excluir-responsavel" class="modal-trigger btn-small waves-effect red darken-3"
                        data-id-responsavel="{{ $item->idresponsavel }}"
                        data-name-responsavel="{{ $item->nome_responsavel }}" title="Excluir">
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

<!-- Modal de exclusão -->
<div id="modal-excluir-responsavel" class="modal">
  <div class="modal-content">
    <h5 class="light">Exclusão</h5>
    <p>Deseja excluir o cadastro de <b><span id="nome-responsavel"></span></b> ?<br>
      Esta ação é irreversível e pode afetar os beneficiários vinculados a ele!</p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect waves-green btn-flat grey lighten-4">Não</a>
    <a id="btn-submit-excluir-responsavel"
      class="modal-close waves-effect waves-green btn-flat red darken-4 white-text">Sim</a>
  </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
  var modals = document.querySelectorAll('.modal');
  M.Modal.init(modals);

  // Preenche dinamicamente o nome no modal de exclusão
  const excluirBtns = document.querySelectorAll('[data-id-responsavel]');
  const nomeSpan = document.getElementById('nome-responsavel');
  const submitBtn = document.getElementById('btn-submit-excluir-responsavel');

  excluirBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const nome = btn.dataset.nameResponsavel;
      const id = btn.dataset.idResponsavel;
      nomeSpan.textContent = nome;
      submitBtn.setAttribute('href', `{{ base_url('dashboard/excluir-responsavel/') }}/${id}`);
    });
  });
});
</script>
@endsection