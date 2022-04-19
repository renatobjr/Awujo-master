<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Pages
 *
 * Controle de requisição de páginas estáticas
 *
 * @package CI
 * @subpackage Pages
 * @author Renato Bonfim Jr.
 * @copyright 2019-2029
 * @version 1.0
 */
class Pages extends CI_Controller
{
    /**
     * __construct
     *
     * Construtor inicial da classe.
     *
     * @package Pages
     * @subpackage __construct()
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('responsavel_model');
        $this->load->model('projeto_model');
    }
    /**
     * Views
     *
     * Função para retorno de uma página exibindo o erro 404 caso ela não exista no servidor.
     *
     * @package Pages
     * @subpackage Views
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param string $page nome do arquivo para busca
     */
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
    /**
     * Dashboard
     *
     * Função para retorno d Dashboad para acesso a usuário logados no sistema.
     *
     * @package Pages
     * @subpackage dashboard
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function dashboard()
    {
        // Verificando acesso
        if ($this->access_control() === TRUE) {
            // Título da página
            $data['title'] = 'Dashboard';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
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
    /**
     * Form Pages
     *
     * Função para retorno da pagina com o formulário para inserção/edição de responsáveis
     *
     * @package Pages
     * @subpackage Form Responsável
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
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
            $this->blade->view('dashboard.responsavel',$data);
        }
    }
    /**
     * Form Usuario
     *
     * Função para retorno da pagina com o formulário para inserção/edição de usuários
     *
     * @package Pages
     * @subpackage Form Usuario
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function form_usuario()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Usuários';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Redirecionando
            $this->blade->view('dashboard.usuario',$data);
        }
    }
    /**
     * Form Projetos
     *
     * Função para retorno da pagina com o formulário para inserção/edição de projetos
     *
     * @package Pages
     * @subpackage Form Projetos
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function form_projeto()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Projetos';
            // Buscando registros
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Redirecionando
            $this->blade->view('dashboard.projetos',$data);
        }
    }

    public function form_beneficiarios()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Beneficiários';
            $data['responsaveis'] = $this->responsavel_model->get_name_responsavel();
            // Buscando registros
            $data['projetos'] = $this->projeto_model->get_projetos();
            $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
            // Redirecionando
            $this->blade->view('dashboard.beneficiarios',$data);
        }
    }
    /**
     * access_control
     *
     * Função para validação o acesso
     *
     * @package Pages
     * @subpackage access_control
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return void
     */
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
