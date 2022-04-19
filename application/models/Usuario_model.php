<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Usuario_model
 *
 * Modelo de requisições sobre a entidade Usuario
 *
 * @package CI
 * @subpackage Usuario_model
 * @author Renato Bonfim Jr.
 * @copyright 2019-2029
 * @version 1.0
 */
class Usuario_model extends CI_Model
{
    private $usuario_db = 'usuario';
    private $idusuario;
    private $email;
    public $nome_completo;
    private $passwd;
    public $nivel;
    public $ultimo_login;
    private $token;
    /**
     * @param mixed $idusuario
     */
    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }
    /**
     * @return mixed
     */
    public function getIdusuario()
    {
        return $this->idusuario;
    }
    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }
    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }
    /**
     * @param mixed $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }
    /**
     * @return mixed
     */
    public function getToken()
    {
        return $this->token;
    }
    /**
     * @param mixed $passwd
     */
    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }
    /**
     * @return mixed
     */
    public function getPasswd()
    {
        return $this->passwd;
    }
    /**
     * Insert
     *
     * Função para inserção de um registro no banco de dados. Assumir para os campos com valores boolenos as seguintes
     * chaves:
     *
     * 0 => Não
     * 1 => Sim
     *
     * @package Usuario_model
     * @subpackage insert
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function insert()
    {
        $novo_usuario = new Usuario_model();
        // Manipulando os atributos #privates
        $novo_usuario->setToken(sha1(uniqid(rand(),TRUE)));
        $novo_usuario->setEmail($this->input->post('email-usuario'));
        // Recebimento dos campos para inserção no banco de dados
        $novo_usuario->getEmail();
        $novo_usuario->nome_completo    = $this->input->post('nome-usuario');
        $novo_usuario->nivel            = $this->input->post('nivel');
        $novo_usuario->getToken();
        // Configurando a criação do objeto
        $data_insert = array(
            'email'         => $novo_usuario->email,
            'nome_completo' => $novo_usuario->nome_completo,
            'nivel'         => $novo_usuario->nivel,
            'token'         => $novo_usuario->token,
        );
        // Processo de inserção no banco de dados
        $query = $this->db->set($data_insert)->insert($novo_usuario->usuario_db);
        // Retornando os dado em caso postivo
        if ($query) return $novo_usuario;
    }
    /**
     * Valid_token
     *
     * Função para validação do token no banco de dados
     *
     * @package Usuario_model
     * @subpackage valid_token
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $token String token de validação gerado pelo metodo insert e gravado no banco de dados
     * @return boolean retorna TRUE para a validação do token ou FALSE
     */
    public function valid_token($token)
    {
        $verifica_token = new Usuario_model();
        // Executando a busca de algum registro que contenha o token
        $query = $this->db->get_where($verifica_token->usuario_db,array('token' => $token));
        // Retorno do resultado da busca
        if ($query->num_rows() === 1)
            return TRUE;
        else
            return FALSE;
    }
    /**
     * Insert_passwd
     *
     * Função para gravação da senha do usuário no banco de dados
     *
     * @package Usuario_model
     * @subpackage insert_passwd
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function insert_passwd()
    {
        // Acessando atributos #privates
        $this->setToken($this->input->post('token'));
        $this->setPasswd(md5($this->input->post('passwd')));
        // Selecionando a coluna e criterio de busca
        $this->db->select('idusuario');
        $this->db->where('token',$this->getToken());
        // Pesquisando no banco de dados
        $query = $this->db->get($this->usuario_db);
        // Verificando autenticidade do registro
        if ($query->num_rows() === 1) {
            // Recuperando o id do usuario e configurando um novo token
            $this->setIdusuario($query->row('idusuario'));
            $this->setToken(sha1(uniqid(rand(),TRUE)));
            // Configurando o array para atualização no banco de dados
            $data_usuario = array(
                'passwd'    => $this->getPasswd(),
                'token'     => $this->getToken()
            );
            // Executando a inserção no banco de dados
            $this->db->update($this->usuario_db,$data_usuario,array('idusuario' => $this->getIdusuario()));
        } else {
            return FALSE;
        }
    }
    /**
     * Login
     *
     * Função para validar o login de um usuario a partir do par email/senha
     *
     * @package Usuario_model
     * @subpackage login
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return bool $query array Vetor com os dados do usuário
     */
    public function login()
    {
        // Recepção dos dados para comparação com o banco de dados
        $login = new Usuario_model();
        $login->email   = $this->input->post('email-usuario');
        $login->passwd  = md5($this->input->post('passwd'));
        // Utilizando os dados para configurar os critérios de busca
        $this->db->where('email',$login->email);
        $this->db->where('passwd',$login->passwd);
        // Realizado a busca no banco de dados
        $query = $this->db->get($login->usuario_db);
        // Verificando o resultado da busca
        if ($query->num_rows() === 1)
            return $query->row_array();
        else
            return FALSE;
    }
    /**
     * Update_last_login
     *
     * Função para atualizar o campo de ultimo login do usuario
     *
     * @package Usuario_model
     * @subpackage update_last_login
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function update_last_login($idusuario)
    {
        // Atualização do horário de login
        $this->db->set('ultimo_login',date('Y-m-d H:i:s'));
        $this->db->where('idusuario',$idusuario);
        $this->db->update($this->usuario_db);
    }
}