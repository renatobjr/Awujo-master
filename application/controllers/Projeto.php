<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Projeto extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('projeto_model');
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