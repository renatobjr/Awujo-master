<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Responsavel
 *
 * Controle de requisições sobre a entidade Responsavel
 *
 * @package CI
 * @subpackage Responsavel
 * @author Renato Bonfim Jr.
 * @copyright 2019-2029
 * @version 1.0
 */
class Responsavel extends CI_Controller
{
    /**
     * __construct
     *
     * Construtor inicial da classe.
     *
     * @package Responsavel
     * @subpackage __construct()
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('responsavel_model');
    }
    /**
     * Inserir
     *
     * Função para inserção de um novo responsável.
     *
     * @package Responsavel
     * @subpackage Inserir
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
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
    /**
     * Atualizar_responsavel
     *
     * Função para atualizaro cadastro de um responsável a partir do #modal-editar.
     *
     * @package Responsavel
     * @subpackage atualizar_responsavel
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
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
            redirect('dashboard');
        }
    }
    /**
     * Excluir_responsavel
     *
     * Função para excluir o registro de um responsável a partir do Id.
     *
     * @package Responsavel
     * @subpackage buscar_responsavel_por_id
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $id integer id do responsavel para busca no banco de dados
     */
    public function excluir_responsavel($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Preparando para setar o registro do responsavel para 0
            $this->responsavel_model->delete($id);
            // Mensagem de sucesso ao excluir
            $this->session->set_flashdata('success','<span>Responsável excluído com sucesso.</span>');
            // Retorno do usuário para a dashboard
            redirect('dashboard');
        }
    }
    /**
     * Buscar_responsavel_por_id
     *
     * Função para impressão da ficha cadastral do responsável e atualização do modal a partir do método uri->segment.
     *
     * @package Responsavel
     * @subpackage buscar_responsavel_por_id
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $id integer id do responsavel para busca no banco de dados
     */
    public function buscar_responsavel_por_id($id)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando o registro do responsável
            $data = $this->responsavel_model->get_responsavel_by_id($id);
            if ($this->uri->segment(2) === 'imprimir-responsavel') {
                // Preparando modelo para impressão
                $this->blade->view('templates.imprimir',$data);
            } else {
                // Preparado página para edição de registro
                $data['title'] = $data['nome_responsavel'];
                $data['idresponsavel'] = $this->encryption->encrypt($data['idresponsavel']);
                $this->blade->view('dashboard.responsavel',$data);
            }
        }
    }

    /**
     * Buscar_responsavel_por_nome
     *
     * Função para buscar um ou mais cadastros a partir no nome ou parte do nome do responsavel
     *
     * @package Responsavel
     * @subpackage buscar_responsavel_por_nome
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $nome_responsavel string campo com o nome do responsável
     * @return string
     */
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
    /**
     * Criar_lista_telefones
     *
     * Função para criar lista de contatos.
     *
     * @package Responsavel
     * @subpackage criar_lista_telefones
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $programa tipo de lista como parametro para criação .
     */
    public function criar_lista_telefones($programa)
    {
        // Verificando acesso
        if ($this->access_control()) {
            // Buscando registros no banco de dados
            $data['beneficiarios'] = $this->responsavel_model->list_contacts($programa);
            // Enviando dados ao modelo
            $data['programa'] = $programa;
            // Redirecionando para a lista
            $this->blade->view('templates.lista',$data);
        }
    }
    /**
     * alpha_spaces
     *
     * Função para validação de campos alfabéticos.
     *
     * @package Responsavel
     * @subpackage alpha_spaces
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $string contêm somente caracteres alfabéticos
     * @return bool
     */
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
    /**
     * access_control
     *
     * Função para validação o acesso
     *
     * @package Responsavel
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