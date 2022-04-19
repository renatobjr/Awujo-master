<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Beneficiario extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projeto_model');
        $this->load->model('responsavel_model');
        $this->load->model('beneficiario_model');
    }

    public function inserir()
    {
        if($this->access_control()) {
            $data['title'] = 'Beneficários';
            $this->form_validation->set_rules('nome-beneficiario','Nome do Beneficiário','trim|required|xss_clean');
            $this->form_validation->set_rules('responsavel','Responsável pelo Beneficiário','trim|required|xss_clean');
            $this->form_validation->set_rules('data-nascimento','Data de Nascimento','trim|required|xss_clean');
            $this->form_validation->set_rules('idade-beneficiario','Idade','trim|required|xss_clean');
            $this->form_validation->set_rules('escola-beneficiario','Escola','trim|required|xss_clean');
            $this->form_validation->set_rules('escolaridade','Série','trim|required|xss_clean');
            $this->form_validation->set_rules('projeto','Projeto','trim|required|xss_clean');
            $this->form_validation->set_rules('turno','Turno','trim|required|xss_clean');
            if($this->form_validation->run() === FALSE) {
                // Retorno das informações para o render da página
                $data['responsaveis'] = $this->responsavel_model->get_name_responsavel();
                $data['projetos'] = $this->projeto_model->get_projetos();
                $data['total_registros'] = $this->responsavel_model->get_all_data_responsavel();
                $this->blade->view('dashboard.beneficiarios',$data);
            } else {
                $id_beneficiario = $this->beneficiario_model->insert();
                if ( ! $id_beneficiario) {
                    // Mensagem de erro ao salvar
                    $this->session->set_flashdata('error','<span>' . $this->input->post('nome-beneficiario') .
                        ' já possui cadastro. Favor verificar os dados de inclusão!</span>');
                } else {
                    // Mensagem de sucesso ao salvar
                    $this->session->set_flashdata('success','<span>' . $this->input->post('nome-beneficiario') .
                        ' inserido com sucesso</span><a href="' . base_url('dashboard/imprimir-beneficiario/' . $id_beneficiario) .
                        '" target="_blank" class="btn-flat toast-action white-text">imprimir</a>');
                }
                redirect('dashboard');
            }
        }
    }

    public function buscar_beneficiario_por_id($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['matricula'] = $this->beneficiario_model->get_beneficiario_by_id($id);
            $this->blade->view('templates.matricula',$data);
        }
    }

    public function lista_beneficiarios()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Imprimir Matricula';
            $data['lista'] = $this->beneficiario_model->lista_beneficiarios();
            $this->blade->view('dashboard.lista-alunos',$data);
        }
    }

    /**
     * access_control
     *
     * Função para validação o acesso
     *
     * @package Usuario
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