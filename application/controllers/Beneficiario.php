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

    public function excluir_beneficiario($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            $this->beneficiario_model->delete($id);
            // Mensagem de sucesso ao excluir
            $this->session->set_flashdata('success','<span>Beneficiário excluído com sucesso.</span>');
            // Retorno do usuário para a dashboard
            redirect('dashboard/beneficiarios');
        }
    }

    public function buscar_beneficiario_por_id($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            if ($this->uri->segment(2) === 'imprimir-beneficiario') {
                $data['beneficiario'] = $this->beneficiario_model->get_beneficiario_by_id_for_print($id);
                // Preparando modelo para impressão
                $this->blade->view('templates.ficha-matricula',$data);
            } else {
                $data['beneficiario'] = $this->beneficiario_model->get_beneficiario_by_id($id);
                // Preparado página para edição de registro
                $data['title'] = $data['beneficiario']['nome_beneficiario'];
                $data['idbeneficiario'] = $this->encryption->encrypt($data['beneficiario']['idbeneficiario']);
                $data['responsaveis'] = $this->responsavel_model->get_name_responsavel();
                // Buscando registros
                $data['projetos'] = $this->projeto_model->get_projetos();
                $this->blade->view('dashboard.beneficiarios.form-beneficiarios',$data);
            }
        }
    }
     
    public function atualizar_beneficiario()
    {
        if ($this->access_control()) {
            $id = $this->encryption->decrypt($this->input->post('idbeneficiario'));

            $this->beneficiario_model->update($id);
            $this->session->set_flashdata('success','<span>' . $this->input->post('nome-beneficiario') .
                ' alterado com sucesso</span><a href="' . base_url('dashboard/imprimir-beneficiario/' .
                    $this->encryption->decrypt($this->input->post('idbeneficiario'))) . '" target="_blank" class="btn-flat toast-action white-text">imprimir</a>');
            // Retorno do usuário para a dashboard
            redirect('dashboard/beneficiarios');
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