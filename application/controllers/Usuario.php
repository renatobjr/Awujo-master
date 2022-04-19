<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Usuario
 *
 * Controle de requisições sobre a entidade Usuario
 *
 * @package CI
 * @subpackage Usuario
 * @author Renato Bonfim Jr.
 * @copyright 2019-2029
 * @version 1.0
 */
class Usuario extends CI_Controller
{
    /**
     * __construct
     *
     * Construtor inicial da classe.
     *
     * @package Usuario
     * @subpackage __construct()
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }
    /**
     * Inserir
     *
     * Função para inserção de um novo usuario.
     *
     * @package Usuario
     * @subpackage Inserir
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function inserir()
    {
        // Verificando se é possível o acesso a pagina
        if ($this->access_control()) {
            $data['title'] = 'Usuários';
            // Critérios de validação
            $this->form_validation->set_rules('nome-usuario','Nome do Usuário','trim|required|xss_clean');
            $this->form_validation->set_rules('email-usuario','E-mail do Usuário','trim|required|xss_clean|valid_email');
            // Realizando a validação dos dados
            if ($this->form_validation->run() === FALSE) {
                // Encaminhamento para a visualização de erros
                $this->blade->view('dashboard.usuario',$data);
            } else {
                // Chamada para inserção no banco de dados
                $novo_usuario = $this->usuario_model->insert();
                // Enviando o email para cadastramento de senha
                $this->enviar_email('create_passwd',$novo_usuario->nome_completo,$novo_usuario->getEmail(),
                    $novo_usuario->getToken());
                // Mensagem de sucesso ao inserir
                $this->session->set_flashdata('success',$novo_usuario->nome_completo . ' inserido com sucesso.');
                // Redirecionando
                $this->blade->view('dashboard.index');
            }
        }
    }
    /**
     * Enviar_email
     *
     * Função para envio de E-mail para confirmação/modificação de senha de um novo usuário.
     *
     * @package Usuario
     * @subpackage Enviar_email
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $requisicao String Tipo de requisição de usuário
     * @param $nome_usuario String Nome do usuario cadastrado no banco de dados
     * @param $email_usuario String Email do usuario cadastrado no banco de dados
     * @param $token String Token do usuario cadastrado no banco de dados
     */
    public function enviar_email($requisicao, $nome_usuario, $email_usuario, $token)
    {
        // Configurações da biblioteca Email
        $config = array(
            'protocol'      => 'smtp',
            'smtp_host'     => 'ssl://smtp.googlemail.com',
            'smtp_port'     => '465',
            'smtp_user'     => 'awujo@cciao.org',
            'smtp_pass'     => 'gcmMTuvT2L',
            'mailtype'      => 'html',
            'charset'       => 'utf-8',
            'smtp_timeout'  => '10'
        );
        // Iniciando o processo de envio
        $this->email->initialize($config);
        $this->email->set_newline("\r\n");
        // Configurações de envio
        $this->email->from('awujo@cciao.org','Awujo');
        $this->email->to($email_usuario);
        // Definindo o uso do template para email
        if ($requisicao == 'create_passwd') {
            $this->email->subject('Confirmação de Cadastro: Awujo ' . $nome_usuario);
        } else {
            $this->email->subject('Redefinição de Senha: Awujo ' . $nome_usuario);
        }
        // Dados do usuário
        $data = array(
            'nome_usuario'  => $nome_usuario,
            'email_usuario' => $email_usuario,
            'token'         => $token
        );
        // Parametros da mensagem
        $mensagem = $this->load->view('templates/' . $requisicao, $data, TRUE);
        // Configurando mensagem
        $this->email->message($mensagem);
        // Enviando email
        $this->email->send();
    }
    /**
     * Verificar_token
     *
     * Função para verificação de acesso a página de registro de senha a partir do token.
     *
     * @package Usuario
     * @subpackage verificar_token
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function verificar_token()
    {
        // Capturando o token da URL e realizando a sua verificação no banco de dados
        $token = $_GET['token'];
        $validacao = $this->usuario_model->valid_token($token);
        // Redirecionamento a partir do resultado da verificação do token
        if ($validacao) {
            // Armazenamento do token do usuário
            $this->data['token'] = $token;
            // Encaminhamento para o registro
            $this->blade->view('forms.form-passwd',$this->data);
        } else {
            $this->blade->view('errors.erro-token');
        }
    }
    /**
     * Cadastrar_senha
     *
     * Função para cadastramento de senhas de acesso apos a verificação de um token.
     *
     * @package Usuario
     * @subpackage cadastrar_senha
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function cadastrar_senha()
    {
        if ($this->usuario_model->valid_token($this->input->post('token'))) {
            // Critérios para validação
            $this->form_validation->set_rules('passwd','Senha','trim|required|xss_clean|min_length[8]');
            $this->form_validation->set_rules('confirmar-passwd','Confirmação','trim|required|xss_clean|matches[passwd]');
            // Realizando a validação dos dados
            if ($this->form_validation->run() === FALSE) {
                // Reenvio do token do usuário
                $this->data['token'] = $this->input->post('token');
                // Encaminhando para a visualização de erros
                $this->blade->view('forms.form-passwd',$this->data);
            } else {
                // Chamada para o cadastramento da senha no banco de dados
                $verificar_update = $this->usuario_model->insert_passwd();
                if ($verificar_update === FALSE)
                    $this->session->set_flashdata('error','Não foi possível concluir sua solicitação.');
                else
                    $this->session->set_flashdata('success','Senha cadastrada com sucesso.');
                // Redirecionando o usuário para a tela de login
                redirect('home');
            }
        } else {
            $this->blade->view('errors.erro-token');
        }
    }
    /**
     * Login
     *
     * Função para realização de login seguro no site.
     *
     * @package Usuario
     * @subpackage login
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function login()
    {
        $data['title'] = 'Home';
        // Critérios para validação
        $this->form_validation->set_rules('email-usuario','E-mail','trim|xss_clean|required|valid_email');
        $this->form_validation->set_rules('passwd','Senha','trim|xss_clean|required');
        // Realizando a validação dos dados
        if ($this->form_validation->run() === FALSE) {
            // Encaminhando para a visualização de erros
            $this->blade->view('home',$data);
        } else {
            // Chamada para a realização do login
            $login = $this->usuario_model->login();
            // Verificação do processo e encaminhamentos
            if ($login) {
                // Atiualizando o campo de ultimo login
                $this->usuario_model->update_last_login($login['idusuario']);
                // Adquire os dados para compor o array inicial do usuário e seu cookie
                $data_usuario = array(
                    'id-usuario'    => $this->encryption->encrypt($login['idusuario']),
                    'nome-usuario'  => $login['nome_completo'],
                    'email-usuario' => $login['email'],
                    'nivel'         => $login['nivel'],
                    'is_logged'     => TRUE
                );
                // Criação da sessão do usuário a partir dos dados
                $this->session->set_userdata($data_usuario);
                // Configuração da mensagem de login
                $this->session->set_flashdata('success','Olá ' . $login['nome_completo'] . ' que bom ter vocẽ por aqui!');
                // Redireconando para a view
                redirect('dashboard',$data_usuario);
            } else {
                // Não correspondência entre o login/senha informado. É necessário mensagem de erro
                $this->session->set_flashdata('error','Email/Login inválidos. Verifique seus dados');
                // Redirecionamento para a tela de login
                redirect('home');
            }
        }
    }
    /**
     * Logout
     *
     * Função para realização de logout do site.
     *
     * @package Usuario
     * @subpackage logout
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function logout()
    {
        // Destruindo a sessão do usuario
        $this->session->sess_destroy();
        // Redirecionando
        redirect('home');
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
    /**
     * Recuperar_senha
     *
     * Função para envio de um novo email para recuperação de senha.
     *
     * @package Usuario
     * @subpackage recuperar_senha
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    /* @todo funcionalidade disponivel em um novo release inserir na pagina o link para recuperação da senha.
     *
     *
     * public function recuperar_senha()
    {
        $data['title'] = 'Recuperar senha';
        // Critérios para validação
        $this->form_validation->set_rules('email-usuario','Email','trim|required|valid_email');
        // Realizando a validação dos dados
        if ($this->form_validation->run() === FALSE) {
            // Encaminhado para visualização de erros
            $this->blade->view('recuperar-senha',$data);
        } else {
            $nova_senha = $this->usuario_model->passwd_recovery();
            // Definindo processo de encaminhamento
            if ($nova_senha) {
                // Enviando email para o usuario com um novo link de acesso
                $this->enviar_email('recovery_passwd',$nova_senha->nome_completo,$nova_senha->getEmail(),
                    $nova_senha->getToken());
                // Mensagem de sucesso ao gerar novo email
                $this->session->set_flashdata('success','E-mail enviado com sucesso');
            } else {
                // Mensagem de erro ao gerar novo email
                $this->session->set_flashdata('success','Não possível enviar seu e-mail.');
            }
            // Redirecionando para a tela de login
            redirect('home',$data);
        }
    }*/
}