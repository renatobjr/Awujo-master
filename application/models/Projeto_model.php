<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Projeto_model extends CI_Model {
    private $projeto_db = 'projetos';
    public $idprojeto;
    public $nome_projeto;
    public $patrocinador;
    public $atividades;
    public $criado_em;
    public $responsavel_cadastro;

    public function insert()
    {
        // Verificando a existência de cadastro
        $this->db->from($this->projeto_db);
        $this->db->where('nome_projeto',$this->input->post('nome-projeto'));
        $verify = $this->db->get();
        if ($verify->num_rows() === 1) {
            return FALSE;
        } else {
            $novo_projeto = new Projeto_model();
            // Recebimento dos campos para a inserção no banco de dados
            $novo_projeto->nome_projeto         = ucwords($this->input->post('nome-projeto'));
            $novo_projeto->patrocinador         = ucwords($this->input->post('patrocinador'));
            $novo_projeto->atividades           = ucwords($this->input->post('atividades'));
            $novo_projeto->criado_em            = date('Y-m-d H:i:s');
            $novo_projeto->responsavel_cadastro = $this->encryption->decrypt($_SESSION['id-usuario']);
            // Processo de inserção no banco de dados
            $novo_projeto->db->set($novo_projeto)->insert($novo_projeto->projeto_db,$novo_projeto);
            return $novo_projeto->db->insert_id();
        }
    }
    public function get_projetos()
    {
        // Definindo atributos
        $this->db->select('idprojeto, nome_projeto, atividades');
        $this->db->from($this->projeto_db);
        $query = $this->db->get();
        // Resultado da Pesquisa
        return $query->result_array();
    }
}