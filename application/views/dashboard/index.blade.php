{{-- Extensão do template principal --}}
@extends('templates.app')
{{-- Conteudo principal --}}
@section('conteudo-principal')
    @if(empty($total_registros['total']))
    <div class="row">
        <div class="col s12 m12 l6 offset-l3" style="padding-top: 10vh">
            <p class="center"><i class="material-icons large">mood_bad</i></p>
            <h4 class="light center">Ainda não temos dados suficientes para te mostrar algumas informações. Realize a
                inserção dos dados para te mostrar como podemos te ajudar!</h4>
        </div>
    </div>
    @else
    <script>
        /* Charts */
        window.onload = function () {
            var ctx=document.getElementById('raca').getContext('2d');var grafRaca=new Chart(ctx,{type:'doughnut',responsive:!1,data:{labels:['Negra','Branco','Pardo','Indigena','Outros'],datasets:[{data:[{{$pie_raca['negro']}},{{$pie_raca['branco']}},{{$pie_raca['pardo']}},{{$pie_raca['indigena']}},{{$pie_raca['outros']}}],backgroundColor:['#311b92','#01579b','#0091ea','#4fc3f7','#e1f5fe'],borderWidth:0}],},options:{legend:{labels:{fontFamily:'Roboto',fontSize:12,boxWidth:20,padding:15}},animation:{duration:3000,easing:'linear'}}});
            var ctx = document.getElementById('escolaridade').getContext('2d');
            var grafRaca=new Chart(ctx,{type:'doughnut',data:{labels:['Analfabeto','Fund. I','Fund. II','Médio','Superior'],datasets:[{data:[{{$pie_escolaridade['analfabeto']}},{{$pie_escolaridade['fund_I']}},{{$pie_escolaridade['fund_II']}},{{$pie_escolaridade['medio']}},{{$pie_escolaridade['superior']}}],backgroundColor:['#311b92','#01579b','#0091ea','#4fc3f7','#e1f5fe'],borderWidth:0}],},options:{legend:{labels:{fontFamily:'Roboto',fontSize:11,boxWidth:20,padding:15}},animation:{duration:3000,easing:'linear'}}});
            var ctx = document.getElementById('idade_renda').getContext('2d');
            var grafIdadeRenda=new Chart(ctx,{type:'line',data:{labels:['Entre 18 e 29 Anos','Entre 30 e 39 Anos','Entre 40 e 59 Anos','Maiores de 60'],datasets:[{data:[{{number_format($line_idade_renda['renda_18_29'],2,'.','')}},{{number_format($line_idade_renda['renda_30_39'],2,'.','')}},{{number_format($line_idade_renda['renda_40_59'],2,'.','')}},{{number_format($line_idade_renda['renda_60'],2,'.','')}}],borderColor:'#311b92',backgroundColor:'#311b92',pointBackgroundColor:'#311b92',fill:!1,label:'Média de renda em função da idade',}]},options:{defaultFontFamily:"'Roboto'",animation:{duration:3000,easing:'linear'}}});
            var ctx=document.getElementById('raca_renda').getContext('2d');var grafRacaRenda=new Chart(ctx,{type:'horizontalBar',data:{labels:['Negra','Branca','Parda','Indígena','Outras'],datasets:[{data:[{{number_format($bar_raca_idade['renda_negros'],2,'.','')}},{{number_format($bar_raca_idade['renda_brancos'],2,'.','')}},{{number_format($bar_raca_idade['renda_pardos'],2,'.','')}},{{number_format($bar_raca_idade['renda_indigenas'],2,'.','')}},{{number_format($bar_raca_idade['renda_outros'],2,'.','')}}],backgroundColor:['#311b92','#01579b','#0091ea','#4fc3f7','#e1f5fe'],borderWidth:0,label:'Distribuição de renda em função da Raça'}]},options:{defaultFontFamily:"'Roboto'",animation:{duration:3000,easing:'linear'}}})};
    </script>{{-- Nova Implementação: busca responsavel --}}
    <div class="row" style="margin-top: 20px;margin-bottom: 0px;">
        <div class="input-field col s12 m12 l12">
            <i class="material-icons prefix">search</i>
            <input type="text" name="activesearch-input" id="activesearch-input" class="">
            <label for="activesearch-input">Buscar Responsável pela Família</label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 m12 l12">
            <ul id="resultado-pesquisa" class="collapsible hide"></ul>
        </div>
    </div>
    {{-- /nova implementação --}}
    <div class="row" style="margin-bottom: 70px;">
        <div class="col s12 m12 l6 xl3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons medium white-text">supervised_user_circle</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light hide-on-med-only">Responsáveis</h6>
                    <h6 class="light info-box-number hide-on-med-only">{{ $total_registros['total'] }} Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6 xl3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons medium white-text">child_care</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light"><small>Crianças até 06 anos</small></h6>
                    <h6 class="light info-box-number">{{ $total_registros['criancas_06'] }} Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6 xl3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons medium white-text">face</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light">Entre 07 e 17 anos</h6>
                    <h6 class="light info-box-number">{{ $total_registros['criancas_07_17'] }} Cadastradas</h6>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l6 xl3">
            <div class="info-box">
                <span class="blue darken-1 info-box-icon">
                    <i class="material-icons medium white-text">account_circle</i>
                </span>
                <div class="info-box-content light center-align">
                    <h6 class="light">Idosos</h6>
                    <h6 class="light info-box-number">{{ $total_registros['idosos'] }} Cadastradas</h6>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-margin">
        @if(empty($projetos[0]['idprojeto']))
            <div class="col s12 m12 l12">
                <div class="card horizontal white">
                    <div class="card-stacked">
                        <div class="card-content black-text">
                            <h5 class="light">Ainda não temos projetos cadastrados.</h5>
                        </div>
                        <div class="card-action">
                            <a href="{{ base_url('dashboard/cadastrar-projeto') }}" class="btn waves-effect waves-light green darken-4">Cadastrar Projeto</a>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row row-margin">{{-- Info-box --}}
        <div class="col s12 m12 l5">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="light">Pertencimento Racial
                        <i class="material-icons small right">pie_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="raca" height="221px"></canvas>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l7">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="light">Idade X Renda Total
                        <i class="material-icons small right">show_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="idade_renda" class="hide-on-med-and-down"></canvas>
                    <div class="collection hide-on-large-only">
                        <a href="#!" class="collection-item black-text"><span class="badge">R$ {{ number_format($line_idade_renda['renda_18_29'], 2, ',', '.') }}</span>Entre 18 e 29 Anos</a>
                        <a href="#!" class="collection-item black-text"><span class="badge">R$ {{ number_format($line_idade_renda['renda_30_39'], 2, ',', '.') }}</span>Entre 30 e 39 Anos</a>
                        <a href="#!" class="collection-item black-text"><span class="badge">R$ {{ number_format($line_idade_renda['renda_40_59'], 2, ',', '.') }}</span>Entre 40 e 59 Anos</a>
                        <a href="#!" class="collection-item black-text"><span class="badge">R$ {{ number_format($line_idade_renda['renda_60'], 2, ',', '.') }}</span>Maiores de 60</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row row-margin">{{-- Gráficos: line/bars --}}
        <div class="col s12 m12 l7 hide-on-med-and-down">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="light">Raça X Renda Total
                        <i class="material-icons small right">show_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="raca_renda"></canvas>
                </div>
            </div>
        </div>
        <div class="col s12 m12 l5">
            <div class="card white">
                <div class="card-content black-text">
                    <span class="light">Escolaridade
                         <i class="material-icons small right">pie_chart</i></span>
                </div>
                <div class="card-action">
                    <canvas id="escolaridade" height="221px"></canvas>
                </div>
            </div>
        </div>
    </div>
    @endif
@endsection