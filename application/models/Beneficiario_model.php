<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Beneficiario_model extends CI_Model {

    private $beneficiario_db = 'beneficiarios';
    public $idbeneficiario;
    public $nome_beneficiario;
    public $responsavel;
    public $raca;
    public $data_nascimento;
    public $idade_beneficiario;
    public $cpf_beneficiario;
    public $nis_beneficiario;
    public $identidade_beneficiario;
    public $escola_beneficiario;
    public $escolaridade_beneficiario;
    public $projeto;
    public $turno;
    public $criado_em;
    public $responsavel_cadastro;

    public function insert()
    {
        $this->db->from($this->beneficiario_db);
        $this->db->where('nome_beneficiario',$this->input->post('nome_beneficiario'));
        $verify = $this->db->get();
        if ($verify->num_rows() === 1) {
            return FALSE;
        } else {
            $novo_beneficiario = new Beneficiario_model();

            $novo_beneficiario->nome_beneficiario           = $this->input->post('nome-beneficiario');
            $novo_beneficiario->responsavel                 = $this->input->post('responsavel');
            $novo_beneficiario->raca                        = $this->input->post('raca');
            $novo_beneficiario->data_nascimento             = date('Y-m-d',strtotime(str_replace('-','/',$this->input->post('data-nascimento'))));
            $novo_beneficiario->idade_beneficiario          = $this->input->post('idade-beneficiario');
            $novo_beneficiario->cpf_beneficiario            = $this->sanitazy_doc_dots($this->input->post('cpf-beneficiario'));
            $novo_beneficiario->nis_beneficiario            = $this->sanitazy_doc_dots($this->input->post('nis-beneficiario'));
            $novo_beneficiario->identidade_beneficiario     = $this->input->post('identidade-beneficiario');
            $novo_beneficiario->escola_beneficiario         = $this->input->post('escola-beneficiario');
            $novo_beneficiario->escolaridade_beneficiario   = $this->input->post('escolaridade');
            $novo_beneficiario->projeto                     = $this->input->post('projeto');
            $novo_beneficiario->turno                       = $this->input->post('turno');
            $novo_beneficiario->criado_em                   = date('Y-m-d H:i:s');
            $novo_beneficiario->responsavel_cadastro        = $this->encryption->decrypt($_SESSION['id-usuario']);
            
            $novo_beneficiario->db->set($novo_beneficiario)->insert($novo_beneficiario->beneficiario_db);
            return $novo_beneficiario->db->insert_id();
        }
    }

    public function update($id)
    {
        $update_reg = array(
            'nome_beneficiario' => $this->input->post('nome-beneficiario'),
            'responsavel' => $this->input->post('responsavel'),
            'raca' => $this->input->post('raca'),
            'data_nascimento' => date('Y-m-d',strtotime(str_replace('-','/',$this->input->post('data-nascimento')))),
            'idade_beneficiario' => $this->input->post('idade-beneficiario'),
            'cpf_beneficiario' => $this->sanitazy_doc_dots($this->input->post('cpf-beneficiario')),
            'nis_beneficiario' => $this->sanitazy_doc_dots($this->input->post('nis-beneficiario')),
            'identidade_beneficiario' => $this->input->post('identidade-beneficiario'),
            'escola_beneficiario' => $this->input->post('escola-beneficiario'),
            'escolaridade_beneficiario' => $this->input->post('escolaridade'),
            'projeto' => $this->input->post('projeto'),
            'turno' => $this->input->post('turno'),
        );

        $this->db->where('idbeneficiario', $id);
        $this->db->set($update_reg)->update($this->beneficiario_db);
    }

    public function delete($id)
    {
        $this->db->where('idbeneficiario', $id);
        $this->db->delete($this->beneficiario_db);
    }

    public function delete_by_responsavel($id)
    {
        $this->db->where('responsavel', $id);
        $this->db->delete($this->beneficiario_db);
    }

    public function get_beneficiarios()
    {
        $sql = 'select idbeneficiario, nome_beneficiario, nome_responsavel, b.raca, data_nascimento, idade_beneficiario,
        cpf_beneficiario, nis_beneficiario, identidade_beneficiario, escolaridade_beneficiario, nome_projeto,  
        turno, b.criado_em, nome_completo, atividades from beneficiarios b, usuario u, responsavel r, projetos p where b.responsavel = r.idresponsavel and 
        b.projeto = p.idprojeto and b.responsavel_cadastro = u.idusuario';
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function get_beneficiario_by_id($id)
    {
        $this->db->from($this->beneficiario_db);
        $this->db->where('idbeneficiario', $id);
        $query = $this->db->get();
        
        return $query->row_array();
    }

    public function get_beneficiario_by_id_for_print($id)
    {
        $sql = 'select idbeneficiario, nome_beneficiario, nome_responsavel, b.raca, data_nascimento, idade_beneficiario,
        cpf_beneficiario, nis_beneficiario, identidade_beneficiario, escolaridade_beneficiario, nome_projeto,  
        turno, b.criado_em, nome_completo, atividades from beneficiarios b, usuario u, responsavel r, projetos p where b.responsavel = r.idresponsavel and 
        b.projeto = p.idprojeto and b.responsavel_cadastro = u.idusuario and idbeneficiario = ' . $id;
        $query = $this->db->query($sql);
        return $query->row_array();
    }

    public function lista_beneficiarios()
    {
        $this->db->select('idbeneficiario,nome_beneficiario');
        $this->db->from($this->beneficiario_db);
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_beneficiarios_by_projeto($idprojeto)
    {
        $sql = 'select idbeneficiario, nome_beneficiario, nome_responsavel, b.raca, data_nascimento, idade_beneficiario,
        cpf_beneficiario, nis_beneficiario, identidade_beneficiario, escolaridade_beneficiario, nome_projeto,  
        turno, b.criado_em, nome_completo, atividades from beneficiarios b, usuario u, responsavel r, projetos p where b.responsavel = r.idresponsavel and 
        b.projeto = p.idprojeto and b.responsavel_cadastro = u.idusuario and b.projeto = ' . $idprojeto;
        $query = $this->db->query($sql);
        return $query->result_array();
    }

    public function sanitazy_doc_dots($doc)
    {
        return str_replace('-','', str_replace('.','',$doc));
    }
    
    public function sanitazy_renda($renda)
    {
        return str_replace(',','.',str_replace('.','',$renda));
    }
}