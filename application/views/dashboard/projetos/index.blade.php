{{-- Extensão do template principal --}}
@extends('templates.app')

{{-- Conteúdo principal --}}
@section('conteudo-principal')
<div class="row">
  <div class="col s12">
    <div class="card white">
      <div class="card-content black-text">
        <span class="card-title light" style="display: flex; justify-content: space-between; align-items: center">
          Projetos Cadastrados
          <div>
            <a href="{{ base_url('dashboard/cadastrar-projeto') }}" class="waves-effect waves-light btn green"
              data-tooltip="Adicionar novo projeto">
              <i class="material-icons left">add</i>Adicionar
            </a>
          </div>
        </span>

        <div class="card-action">
          @if (empty($projetos))
          <div class="row center" style="margin-top: 20px;">
            <i class="material-icons large grey-text text-lighten-2">info_outline</i>
            <p class="grey-text">
              Nenhum projeto encontrado. Utilize o botão "Adicionar projeto" acima para cadastrar um novo.
            </p>
          </div>
          @else
          <div class="responsive-table">
            <table class="highlight striped centered">
              <thead class="grey lighten-3">
                <tr>
                  <th>Nome</th>
                  <th>Patrocinador</th>
                  <th>Total de Beneficiários</th>
                  <th>Ações</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($projetos as $projeto)
                <tr>
                  <td>{{ $projeto['nome_projeto'] }}</td>
                  <td>{{ $projeto['patrocinador'] ?? '-' }}</td>
                  <td>{{ $projeto['total_beneficiarios'] ?? 0 }}</td>
                  <td>
                    <div class="btn-group" style="display: flex; gap: 4px; justify-content: center;">
                      <a href="{{ base_url('dashboard/imprimir-alunos-projeto/' . $projeto['idprojeto']) }}"
                        class="btn-small waves-effect blue lighten-1" target="_blank" title="Imprimir">
                        <i class="material-icons">print</i>
                      </a>
                      <a href="{{ base_url('dashboard/editar-projeto/' . $projeto['idprojeto']) }}"
                        class="btn-small waves-effect amber darken-3" title="Editar">
                        <i class="material-icons">edit</i>
                      </a>
                      <a href="#modal-excluir-projeto" class="modal-trigger btn-small waves-effect red darken-3"
                        data-id-projeto="{{ $projeto['idprojeto'] }}" data-name-projeto="{{ $projeto['nome_projeto'] }}"
                        title="Excluir">
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

{{-- Modal de exclusão --}}
<div id="modal-excluir-projeto" class="modal">
  <div class="modal-content">
    <h5 class="light">Confirmação de Exclusão</h5>
    <p>
      Tem certeza que deseja excluir o projeto <b><span id="nome-projeto"></span></b>?<br>
      Esta ação é irreversível e pode afetar os beneficiários vinculados a ele!
    </p>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-close waves-effect btn-flat grey lighten-4">Cancelar</a>
    <a id="btn-submit-excluir-projeto" class="modal-close waves-effect btn-flat red darken-4 white-text">Sim,
      Excluir</a>
  </div>
</div>

{{-- Script para o modal --}}
<script>
document.addEventListener('DOMContentLoaded', function() {
  var modals = document.querySelectorAll('.modal');
  M.Modal.init(modals);

  // Preenche dinamicamente o nome no modal de exclusão
  const excluirBtns = document.querySelectorAll('[data-id-projeto]');
  const nomeSpan = document.getElementById('nome-projeto');
  const submitBtn = document.getElementById('btn-submit-excluir-projeto');

  excluirBtns.forEach(btn => {
    btn.addEventListener('click', () => {
      const nome = btn.dataset.nameProjeto;
      const id = btn.dataset.idProjeto;
      nomeSpan.textContent = nome;
      submitBtn.setAttribute('href', `{{ base_url('dashboard/excluir-projeto/') }}/${id}`);
    });
  });
});
</script>
@endsection