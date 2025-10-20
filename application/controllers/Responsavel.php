<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsavel extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('responsavel_model');
        $this->load->model('beneficiario_model');
    }
    
    public function inserir()
    {
        // Verificando acesso
        if ($this->access_control()) {
            $data['title'] = 'Responsável';
            // Critérios de validação
            $this->form_validation->set_rules('nome-responsavel','Nome do Responsavel','trim|required|callback_alpha_spaces');
            $this->form_validation->set_rules('cpf-responsavel','CPF','trim|required|exact_length[14]');
            $this->form_validation->set_rules('nis-responsavel','NIS','trim|exact_length[15]');
            $this->form_validation->set_rules('idade-responsavel','Idade','trim|required|exact_length[2]');
            $this->form_validation->set_rules('raca-responsavel','Raça','required');
            $this->form_validation->set_rules('escolaridade','Escolaridade','required');
            $this->form_validation->set_rules('numero','Número','trim|required');
            $this->form_validation->set_rules('criancas-ate-06','Crianças ate 06 anos','trim|required|numeric');
            $this->form_validation->set_rules('criancas-07-ate-17','Crianças entre 07 e 17 anos','trim|required|numeric');
            $this->form_validation->set_rules('adultos','Adultos','trim|required|numeric');
            $this->form_validation->set_rules('idosos','Idosos','trim|required|numeric');
            $this->form_validation->set_rules('pessoa-com-deficiencia','Pessoa com deficiência','required');
            $this->form_validation->set_rules('renda-responsavel','Renda do Responsavel','trim|required');
            $this->form_validation->set_rules('renda-adultos','Renda total dos Adultos','trim|required');
            // Realizando a validação dos dados
            if ($this->form_validation->run() === FALSE) {
                // Resolvendo o nome do método para render do formulário
                $data['method'] = $this->router->fetch_method();
                // Encaminihamento para visualização de erros
                $this->blade->view('dashboard.responsavel',$data);
            } else {
                // Chamada para inserção no banco de dados
                $id_responsavel = $this->responsavel_model->insert();
                if ( ! $id_responsavel) {
                    // Mensagem de sucesso ao salvar
                    $this->session->set_flashdata('error','<span>' . $this->input->post('nome-responsavel') .
                        ' já possui cadastro. Favor verificar os dados de inclusão!</span>');
                } else {
                    // Mensagem de sucesso ao salvar
                    $this->session->set_flashdata('success','<span>' . $this->input->post('nome-responsavel') .
                        ' inserido com sucesso</span><a href="' . base_url('dashboard/imprimir-responsavel/' . $id_responsavel) .
                        '" target="_blank" class="btn-flat toast-action white-text">imprimir</a>');
                }
                // Redirecionamento
                redirect('dashboard');
            }
        }
    }
    
    public function atualizar_responsavel()
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Preparando para atualizar o registro do usuário a partir do Id recebido via POST
            $this->responsavel_model->update(array('idresponsavel' => $this->encryption->decrypt($this->input->post('idresponsavel'))));
            // Mensagem de sucesso ao editar
            $this->session->set_flashdata('success','<span>' . $this->input->post('nome-responsavel') .
                ' alterado com sucesso</span><a href="' . base_url('dashboard/imprimir-responsavel/' .
                    $this->encryption->decrypt($this->input->post('idresponsavel'))) . '" target="_blank" class="btn-flat toast-action white-text">imprimir</a>');
            // Retorno do usuário para a dashboard
            redirect('dashboard/responsaveis');
        }
    }
    
    public function excluir_responsavel($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Preparando para setar o registro do responsavel para 0
            $this->responsavel_model->delete($id);
            $this->beneficiario_model->delete_by_responsavel($id);
            // Mensagem de sucesso ao excluir
            $this->session->set_flashdata('success','<span>Responsável excluído com sucesso.</span>');
            // Retorno do usuário para a dashboard
            redirect('dashboard/responsaveis');
        }
    }
    
    public function buscar_responsavel_por_id($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando o registro do responsável
            $data = $this->responsavel_model->get_responsavel_by_id($id);
            if ($this->uri->segment(2) === 'imprimir-responsavel') {
                // Preparando modelo para impressão
                $this->blade->view('templates.cadastro-responsavel',$data);
            } else {
                // Preparado página para edição de registro
                $data['title'] = $data['nome_responsavel'];
                $data['idresponsavel'] = $this->encryption->encrypt($data['idresponsavel']);
                $this->blade->view('dashboard.responsaveis.form-responsavel',$data);
            }
        }
    }

    
    public function buscar_responsavel_por_nome($nome_responsavel)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando um cadastro a partir do nome do responsável
            $data = $this->responsavel_model->get_responsavel_by_name($nome_responsavel);
            // Retorno do JSON com os itens da pesquisa
            echo json_encode($data);
        }
    }
    
    public function criar_lista_telefones($programa)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando registros no banco de dados
            $data['beneficiarios'] = $this->responsavel_model->list_contacts();
            // Redirecionando para a lista
            $this->blade->view('templates.lista-contatos-responsaveis',$data);
        }
    }

    public function criar_lista_responsaveis()
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando registros no banco de dados
            $data['responsaveis'] = $this->responsavel_model->get_responsaveis();
            // Redirecionando para a lista
            $this->blade->view('templates.lista-responsaveis',$data);
        }
    }
    
    public function alpha_spaces($string)
    {
        // Testando a partir da String de entrada
        if ( ! preg_match('/^[a-zA-Zà-úÀ-Ú\s]+$/', $string)){
            $this->form_validation->set_message('alpha_spaces', 'O campo %s deve conter somente letras.');
            return FALSE;
        } else {
            return TRUE;
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