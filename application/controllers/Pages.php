<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('beneficiario_model');
        $this->load->model('responsavel_model');
        $this->load->model('projeto_model');
    }
    
    public function views($page = 'home')
    {
        // Verificando se uma página existe
        if ( ! file_exists(APPPATH.'views/'.$page.'.blade.php'))
        {
            show_404();
        }
        $data['title'] = str_replace('-',' ', ucfirst($page));
        // Redirecionando
        $this->blade->view($page,$data);
    }
    
    public function dashboard()
    {
        // Verificando acesso
        if ($this->access_control() === TRUE) {
            // Título da página
            $data['title'] = 'Dashboard';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Verificando se existem registros
            if ( ! empty($data['total_registros'])) {
                // Dados para o grafico racial
                $data['pie_raca'] = $this->responsavel_model->get_pie_raca();
                // Dados para o grafico de distribuição escolar
                $data['pie_escolaridade'] = $this->responsavel_model->get_pie_escolaridade();
                // Dados para o gráfico de idade X renda
                $data['line_idade_renda'] = $this->responsavel_model->get_line_idade_renda();
                // dados para o gráfico de raca X idade
                $data['bar_raca_idade'] = $this->responsavel_model->get_bars_renda_raca();
            }
            $data['projetos'] = $this->projeto_model->get_projetos();
            // Redirecionando
            $this->blade->view('dashboard.index',$data);
        }
    }

    public function projetos()
    {
        // Verificando acesso
        if ($this->access_control() === TRUE) {
            $data['title'] = 'Projetos';
            $data['projetos'] = $this->projeto_model->get_projetos();
            // Redirecionando
            $this->blade->view('dashboard.projetos.index', $data);
        }
    }

    public function form_projeto()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Cadastrar Projetos';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            $data['method'] = $this->router->fetch_method();
            // Redirecionando
            $this->blade->view('dashboard.projetos.form-projetos',$data);
        }
    }

    public function responsaveis()
    {
        // Verificando acesso
        if ($this->access_control() === TRUE) {
            $data['title'] = 'Responsáveis';
            $data['responsaveis'] = $this->responsavel_model->get_responsaveis();
            // Redirecionando
            $this->blade->view('dashboard.responsaveis.index', $data);
        }
    }
    
    public function form_responsavel()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Cadastrar Responsável';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Resolvendo o nome do método para render do formulário
            $data['method'] = $this->router->fetch_method();
            // Redirecionando
            $this->blade->view('dashboard.responsaveis.form-responsavel',$data);
        }
    }
    
    public function form_usuario()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Cadastrar Usuários';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Redirecionando
            $this->blade->view('dashboard.usuario',$data);
        }
    }

     public function beneficiarios()
    {
        // Verificando acesso
        if ($this->access_control() === TRUE) {
            $data['title'] = 'Beneficiários';
            $data['beneficiarios'] = $this->beneficiario_model->get_beneficiarios();
            // Redirecionando
            $this->blade->view('dashboard.beneficiarios.index', $data);
        }
    }

    public function form_beneficiarios()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Cadastrar Beneficiários';
            $data['responsaveis'] = $this->responsavel_model->get_name_responsavel();
            // Buscando registros
            $data['projetos'] = $this->projeto_model->get_projetos();
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            $data['method'] = $this->router->fetch_method();
            // Redirecionando
            $this->blade->view('dashboard.beneficiarios.form-beneficiarios',$data);
        }
    }
    
    public function access_control()
    {
        if ($this->session->has_userdata('is_logged')) {
            return TRUE;
        } else {
            $this->session->set_flashdata('error','Realize o login para ter acesso a página.');
            redirect('home');
        }
    }
}