<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Projeto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projeto_model');
        $this->load->model('beneficiario_model');
    }

    public function inserir()
    {
        // Verificando se é possivel o acesso a página
        if($this->access_control()) {
            $data['title'] = 'Projetos';
            $this->form_validation->set_rules('nome-projeto','Nome do Projeto','trim|required|xss_clean');
            $this->form_validation->set_rules('patrocinador','Patrocinador do Projeto','trim|required|xss_clean');
            $this->form_validation->set_rules('atividades','Atividades do Projeto','trim|required|xss_clean');
            if ($this->form_validation->run() === FALSE) {
                $this->blade->view('dashboard.projetos',$data);
            } else {
                $id_projeto = $this->projeto_model->insert();
                if ( ! $id_projeto) {
                    $this->session->set_flashdata('error','<span>' . $this->input->post('nome-projeto') .
                    ' já possui cadastro. Favor verificar os dados de inclusão!</span>');        
                } else {
                    $this->session->set_flashdata('success','<span>Projeto ' . $this->input->post('nome-projeto') .
                    ' cadastrado com Sucesso. Você já pode inserir Beneficiários!</span>');
                }
            }
            redirect('dashboard');
        }
    }

    public function atualizar_projeto() 
    {
        if ($this->access_control()) {
            $this->projeto_model->update(array('idprojeto' => $this->encryption->decrypt($this->input->post('idprojeto'))));
            $this->session->set_flashdata('success','<span>' . $this->input->post('nome-projeto') .
                ' alterado com sucesso</span><a href="');
            // Retorno do usuário para a dashboard
            redirect('dashboard/projetos');
        }    
    }

    public function excluir_projeto($id) {
        if ($this->access_control()) {
            $this->projeto_model->delete($id);
            $this->session->set_flashdata('success','<span>Projeto excluído com sucesso.</span>');
            // Retorno do usuário para a dashboard
            redirect('dashboard/projetos');
        }
    }
    
    public function buscar_projeto_por_id($id) {
        if ($this->access_control()) {
            $data = $this->projeto_model->get_projeto_by_id($id);
            $data['title'] = 'Projetos';
            $data['idprojeto'] = $this->encryption->encrypt($data['idprojeto']);
            $this->blade->view('dashboard.projetos.form-projetos',$data);
        }
    }

    public function imprimir_alunos_projeto($id) 
    {
        if ($this->access_control()) {
            $data['title'] = 'Imprimir Lista de Alunos';
            $data['projeto'] = $this->projeto_model->get_projeto_by_id($id);
            $data['beneficiarios'] = $this->beneficiario_model->get_beneficiarios_by_projeto($id);
            
            $this->blade->view('templates.lista-alunos',$data);
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