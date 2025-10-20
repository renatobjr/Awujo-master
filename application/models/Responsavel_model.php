<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Responsavel_model extends CI_Model
{
    private $responsavel_db = 'responsavel';
    public $idresponsavel;
    public $nome_responsavel;
    public $cpf;
    public $nis;
    public $idade;
    public $raca;
    public $escolaridade;
    public $telefone_fixo;
    public $telefone_movel;
    public $pessoa_contato;
    public $rua;
    public $numero;
    public $bairro;
    public $criancas_ate_06_anos;
    public $criancas_entre_07_17_anos;
    public $adultos;
    public $idosos;
    public $pessoa_deficiencia;
    public $tipo_deficiencia;
    public $nome_deficiente;
    public $renda_responsavel;
    public $renda_adultos;
    public $renda_total;
    public $nenhum_programa;
    public $bolsa_familia;
    public $bpc;
    public $aposentadoria;
    public $pensao;
    public $beneficio_eventual;
    public $criado_em;
    public $atualizado_em;
    public $responsavel_cadastro;
    public $status;

    public function insert()
    {
        $this->db->from($this->responsavel_db);
        $this->db->where('nome_responsavel', $this->input->post('nome-responsavel'));
        $verify = $this->db->get();
        if ($verify->num_rows() === 1) {
            return FALSE;
        } else {
            $novo_responsavel = new Responsavel_model();
            $novo_responsavel->nome_responsavel = ucwords($this->input->post('nome-responsavel'));
            $novo_responsavel->cpf = $this->sanitazy_doc_dots($this->input->post('cpf-responsavel'));
            $novo_responsavel->nis = $this->sanitazy_doc_dots($this->input->post('nis-responsavel'));
            $novo_responsavel->idade = $this->input->post('idade-responsavel');
            $novo_responsavel->raca = $this->input->post('raca-responsavel');
            $novo_responsavel->escolaridade = $this->input->post('escolaridade');
            $novo_responsavel->telefone_fixo = $this->input->post('telefone-fixo');
            $novo_responsavel->telefone_movel = $this->input->post('telefone-movel');
            $novo_responsavel->pessoa_contato = $this->input->post('pessoa-contato');
            $novo_responsavel->rua = $this->input->post('logradouro');
            $novo_responsavel->numero = $this->input->post('numero');
            $novo_responsavel->bairro = $this->input->post('bairro');
            $novo_responsavel->criancas_ate_06_anos = $this->input->post('criancas-ate-06');
            $novo_responsavel->criancas_entre_07_17_anos = $this->input->post('criancas-07-ate-17');
            $novo_responsavel->adultos = $this->input->post('adultos');
            $novo_responsavel->idosos = $this->input->post('idosos');
            $novo_responsavel->pessoa_deficiencia = $this->input->post('pessoa-com-deficiencia');
            $novo_responsavel->tipo_deficiencia = $this->input->post('tipo-deficiencia');
            $novo_responsavel->nome_deficiente = $this->input->post('nome-deficiente');
            $novo_responsavel->renda_responsavel = $this->sanitazy_renda($this->input->post('renda-responsavel'));
            $novo_responsavel->renda_adultos = $this->sanitazy_renda($this->input->post('renda-adultos'));
            $novo_responsavel->renda_total = $this->sanitazy_renda($this->input->post('renda-total'));
            $novo_responsavel->nenhum_programa = in_array(1, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->bolsa_familia = in_array(2, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->bpc = in_array(3, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->aposentadoria = in_array(4, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->pensao = in_array(5, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->beneficio_eventual = in_array(6, $this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->criado_em = date('Y-m-d H:i:s');
            $novo_responsavel->responsavel_cadastro = $this->encryption->decrypt($_SESSION['id-usuario']);
            $novo_responsavel->status = 1;
            $novo_responsavel->db->set($novo_responsavel)->insert($novo_responsavel->responsavel_db, $novo_responsavel);
            return $novo_responsavel->db->insert_id();
        }
    }

    public function update($idresponsavel)
    {
        $update_reg = array(
            'nome_responsavel' => $this->input->post('nome-responsavel'),
            'cpf' => $this->sanitazy_doc_dots($this->input->post('cpf-responsavel')),
            'nis' => $this->sanitazy_doc_dots($this->input->post('nis-responsavel')),
            'idade' => $this->input->post('idade-responsavel'),
            'raca' => $this->input->post('raca-responsavel'),
            'escolaridade' => $this->input->post('escolaridade'),
            'telefone_fixo' => $this->input->post('telefone-fixo'),
            'telefone_movel' => $this->input->post('telefone-movel'),
            'pessoa_contato' => $this->input->post('pessoa-contato'),
            'rua' => $this->input->post('logradouro'),
            'numero' => $this->input->post('numero'),
            'bairro' => $this->input->post('bairro'),
            'criancas_ate_06_anos' => $this->input->post('criancas-ate-06'),
            'criancas_entre_07_17_anos' => $this->input->post('criancas-07-ate-17'),
            'adultos' => $this->input->post('adultos'),
            'idosos' => $this->input->post('idosos'),
            'pessoa_deficiencia' => $this->input->post('pessoa-com-deficiencia'),
            'tipo_deficiencia' => $this->input->post('tipo-deficiencia'),
            'nome_deficiente' => $this->input->post('nome-deficiente'),
            'renda_responsavel' => $this->sanitazy_renda($this->input->post('renda-responsavel')),
            'renda_adultos' => $this->sanitazy_renda($this->input->post('renda-adultos')),
            'renda_total' => $this->sanitazy_renda($this->input->post('renda-total')),
            'nenhum_programa' => in_array(1, $this->input->post('programas-governo')) ? 1 : 0,
            'bolsa_familia' => in_array(2, $this->input->post('programas-governo')) ? 1 : 0,
            'bpc' => in_array(3, $this->input->post('programas-governo')) ? 1 : 0,
            'aposentadoria' => in_array(4, $this->input->post('programas-governo')) ? 1 : 0,
            'pensao' => in_array(5, $this->input->post('programas-governo')) ? 1 : 0,
            'beneficio_eventual' => in_array(6, $this->input->post('programas-governo')) ? 1 : 0,
            'atualizado_em' => date('Y-m-d H:i:s'),
            'responsavel_cadastro' => $this->encryption->decrypt($_SESSION['id-usuario'])
        );
        $this->db->where($idresponsavel);
        $this->db->set($update_reg)->update($this->responsavel_db);
    }

    public function get_responsaveis()
    {
        $this->db->select('idresponsavel, nome_responsavel, cpf, nis, idade, raca, escolaridade, telefone_fixo, 
        telefone_movel, pessoa_contato, rua, numero, bairro, criancas_ate_06_anos, criancas_entre_07_17_anos, adultos, 
        idosos, pessoa_deficiencia, tipo_deficiencia, nome_deficiente, renda_responsavel, renda_adultos, 
        renda_total, nenhum_programa, bolsa_familia, bpc, aposentadoria, pensao, beneficio_eventual, 
        criado_em,responsavel_cadastro, u.nome_completo');
        $this->db->from($this->responsavel_db);
        $this->db->join('usuario u', 'responsavel_cadastro = u.idusuario');
        $this->db->where('status', 1);
        $this->db->order_by('nome_responsavel', 'ASC');
        return $this->db->get()->result();
    }

    public function delete($id)
    {
        $this->db->set('status', 0);
        $this->db->where('idresponsavel', $id);
        $this->db->update($this->responsavel_db);
    }

    public function get_responsavel_by_id($id)
    {
        $this->db->select('idresponsavel, nome_responsavel, cpf, nis, idade, raca, escolaridade, telefone_fixo, 
        telefone_movel, pessoa_contato, rua, numero, bairro, criancas_ate_06_anos, criancas_entre_07_17_anos, adultos, 
        idosos, pessoa_deficiencia, tipo_deficiencia, nome_deficiente, renda_responsavel, renda_adultos, 
        renda_total, nenhum_programa, bolsa_familia, bpc, aposentadoria, pensao, beneficio_eventual, 
        criado_em,responsavel_cadastro, u.nome_completo');
        $this->db->from($this->responsavel_db);
        $this->db->join('usuario u', 'responsavel_cadastro = u.idusuario');
        $this->db->where(array('idresponsavel' => $id, 'status' => 1));
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_responsavel_by_name($nome_responsavel)
    {
        $this->db->like('nome_responsavel', urldecode($nome_responsavel));
        $this->db->where('status', 1);
        $this->db->order_by('nome_responsavel', 'ASC');
        $query = $this->db->get($this->responsavel_db);
        return $query->result_array();
    }

    public function get_all_data_responsavel()
    {
        $this->db->select('count(idresponsavel) as total, (SELECT sum(criancas_ate_06_anos) FROM responsavel) 
        as criancas_06, (SELECT sum(criancas_entre_07_17_anos) FROM responsavel) as criancas_07_17,(SELECT sum(adultos) 
        FROM responsavel) as adultos, (SELECT sum(idosos) FROM responsavel) as idosos, (SELECT count(idresponsavel) FROM
        responsavel WHERE nis != \'\' AND status = 1) as total_nis');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function list_contacts()
    {
        $this->db->select('nome_responsavel, telefone_fixo, telefone_movel');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $this->db->order_by('nome_responsavel', 'ASC');
        
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_name_responsavel()
    {
        $this->db->select('idresponsavel, nome_responsavel, telefone_fixo, telefone_movel');
        $this->db->where('status', 1);
        $this->db->from($this->responsavel_db);
        $this->db->order_by('nome_responsavel', 'ASC');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_pie_raca()
    {
        $this->db->select('count(idresponsavel) as total, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 1) 
        as negro, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 2) as branco, (SELECT count(idresponsavel) 
        FROM responsavel WHERE raca  = 3) as pardo, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 4) 
        as indigena, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 5) as outros');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_pie_escolaridade()
    {
        $this->db->select('count(idresponsavel) as total, (SELECT count(idresponsavel) FROM responsavel WHERE 
        escolaridade  = 1) as analfabeto, (SELECT count(idresponsavel) FROM responsavel WHERE escolaridade  = 2) as fund_I, 
        (SELECT count(idresponsavel) FROM responsavel WHERE escolaridade  = 3) as fund_II, (SELECT count(idresponsavel) 
        FROM responsavel WHERE escolaridade  = 4) as medio, (SELECT count(idresponsavel) FROM responsavel WHERE 
        escolaridade  = 5) as superior');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_line_idade_renda()
    {
        $this->db->select('AVG(renda_total) AS md_geral, (SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 
        18 AND 29) AS renda_18_29, (SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 30 AND 39) AS 
        renda_30_39,(SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 40 AND 59) AS renda_40_59,(SELECT 
        AVG(renda_total) FROM responsavel WHERE idade >= 60) AS renda_60');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function get_bars_renda_raca()
    {
        $this->db->select('AVG(renda_total) AS md_geral, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 1) AS 
        renda_negros, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 2) AS renda_brancos, (SELECT AVG(renda_total) 
        FROM responsavel WHERE raca = 3) AS renda_pardos, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 4) 
        AS renda_indigenas, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 5) AS renda_outros');
        $this->db->from($this->responsavel_db);
        $this->db->where('status', 1);
        $query = $this->db->get();
        return $query->row_array();
    }

    public function sanitazy_doc_dots($doc)
    {
        return str_replace('-', '', str_replace('.', '', $doc));
    }

    public function sanitazy_renda($renda)
    {
        return str_replace(',', '.', str_replace('.', '', $renda));
    }
}