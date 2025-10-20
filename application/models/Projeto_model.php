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
    
    public function update($idprojeto)
    {
        $update_reg = array(
            'nome_projeto' => $this->input->post('nome-projeto'),
            'patrocinador' => $this->input->post('patrocinador'),
            'atividades' => $this->input->post('atividades'),
            'responsavel_cadastro' => $this->encryption->decrypt($_SESSION['id-usuario'])
        )
        ;
        $this->db->where($idprojeto);
        $this->db->set($update_reg)->update($this->projeto_db);
    }

    public function delete($idprojeto)
    {
        $this->db->where('idprojeto', $idprojeto);
        $this->db->set('status', 0)->update($this->projeto_db);


    }

    public function get_projetos()
    {
        $this->db->select('p.idprojeto, p.nome_projeto, p.patrocinador, COUNT(b.idbeneficiario) as total_beneficiarios');
        $this->db->from('projetos p');
        $this->db->join('beneficiarios b','b.projeto = p.idprojeto','left');
        $this->db->where('p.status', 1);
        $this->db->group_by('p.idprojeto');
        $query = $this->db->get();
        
        return $query->result_array();
    }

    public function get_projeto_by_id($idprojeto)
    {
        $this->db->where('idprojeto', $idprojeto);
        $query = $this->db->get($this->projeto_db);
        
        return $query->row_array();
    }
}