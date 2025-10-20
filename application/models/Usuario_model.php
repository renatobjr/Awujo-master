<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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

    public function setIdusuario($idusuario)
    {
        $this->idusuario = $idusuario;
    }

    public function getIdusuario()
    {
        return $this->idusuario;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getToken()
    {
        return $this->token;
    }

    public function setPasswd($passwd)
    {
        $this->passwd = $passwd;
    }

    public function getPasswd()
    {
        return $this->passwd;
    }

    public function insert()
    {
        $novo_usuario = new Usuario_model();
        $novo_usuario->setToken(sha1(uniqid(rand(), TRUE)));
        $novo_usuario->setEmail($this->input->post('email-usuario'));
        $novo_usuario->getEmail();
        $novo_usuario->nome_completo = $this->input->post('nome-usuario');
        $novo_usuario->nivel = $this->input->post('nivel');
        $novo_usuario->getToken();

        $data_insert = array(
            'email'         => $novo_usuario->email,
            'nome_completo' => $novo_usuario->nome_completo,
            'nivel'         => $novo_usuario->nivel,
            'token'         => $novo_usuario->token,
        );

        $query = $this->db->set($data_insert)->insert($novo_usuario->usuario_db);
        if ($query) return $novo_usuario;
    }

    public function valid_token($token)
    {
        $verifica_token = new Usuario_model();
        $query = $this->db->get_where($verifica_token->usuario_db, array('token' => $token));
        if ($query->num_rows() === 1)
            return TRUE;
        else
            return FALSE;
    }

    public function insert_passwd()
    {
        $this->setToken($this->input->post('token'));
        $this->setPasswd(md5($this->input->post('passwd')));

        $this->db->select('idusuario');
        $this->db->where('token', $this->getToken());
        $query = $this->db->get($this->usuario_db);

        if ($query->num_rows() === 1) {
            $this->setIdusuario($query->row('idusuario'));
            $this->setToken(sha1(uniqid(rand(), TRUE)));

            $data_usuario = array(
                'passwd' => $this->getPasswd(),
                'token'  => $this->getToken()
            );

            $this->db->update($this->usuario_db, $data_usuario, array('idusuario' => $this->getIdusuario()));
        } else {
            return FALSE;
        }
    }

    public function login()
    {
        $login = new Usuario_model();
        $login->email  = $this->input->post('email-usuario');
        $login->passwd = md5($this->input->post('passwd'));

        $this->db->where('email', $login->email);
        $this->db->where('passwd', $login->passwd);

        $query = $this->db->get($login->usuario_db);

        if ($query->num_rows() === 1)
            return $query->row_array();
        else
            return FALSE;
    }

    public function update_last_login($idusuario)
    {
        $this->db->set('ultimo_login', date('Y-m-d H:i:s'));
        $this->db->where('idusuario', $idusuario);
        $this->db->update($this->usuario_db);
    }
}
