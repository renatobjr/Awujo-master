<div class="row">
    <div class="col s12 m12 l12">
        <div class="card white">
            <div class="card-content black-text">
                <span class="card-title light">
                    Lista de Alunos
                    <i class="material-icons small right">print</i>
                </span>
            </div>
            <div class="card-action">
                @foreach($lista as $aluno)
                <div class="row" style="margin-bottom: 0px">
                    <div class="col s12 m12 l9">
                        {!! '<p class="valign-wrapper">' . $aluno['nome_beneficiario'] . '</p>' !!}
                    </div>
                    <div class="col s12 m12 l3 center">
                        {!! '<a href="' . base_url('dashboard/imprimir-beneficiario/') . $aluno['idbeneficiario'] . '" target="_blank" class="right btn waves-effect waves-light green darken-4">Imprimir</a>' !!}
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>