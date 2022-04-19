<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Responsavel_model
 *
 * Modelo de requisições sobre a entidade Resposavel
 *
 * @package CI
 * @subpackage Responsavel_model
 * @author Renato Bonfim Jr.
 * @copyright 2019-2029
 * @version 1.0
 */
class Responsavel_model extends CI_Model
{
    /**
     * @var string
     */
    private $responsavel_db = 'responsavel';
    /**
     * @var string
     */
    public $idresponsavel;
    /**
     * @var string
     */
    public $nome_responsavel;
    /**
     * @var string
     */
    public $cpf;
    /**
     * @var string
     */
    public $nis;
    /**
     * @var string
     */
    public $idade;
    /**
     * @var string
     */
    public $raca;
    /**
     * @var string
     */
    public $escolaridade;
    /**
     * @var string
     */
    public $telefone_fixo;
    /**
     * @var string
     */
    public $telefone_movel;
    /**
     * @var string
     */
    public $pessoa_contato;
    /**
     * @var string
     */
    public $rua;
    /**
     * @var string
     */
    public $numero;
    /**
     * @var string
     */
    public $bairro;
    /**
     * @var string
     */
    public $criancas_ate_06_anos;
    /**
     * @var string
     */
    public $criancas_entre_07_17_anos;
    /**
     * @var string
     */
    public $adultos;
    /**
     * @var string
     */
    public $idosos;
    /**
     * @var string
     */
    public $pessoa_deficiencia;
    /**
     * @var string
     */
    public $tipo_deficiencia;
    /**
     * @var string
     */
    public $nome_deficiente;
    /**
     * @var string
     */
    public $renda_responsavel;
    /**
     * @var string
     */
    public $renda_adultos;
    /**
     * @var string
     */
    public $renda_total;
    /**
     * @var string
     */
    public $nenhum_programa;
    /**
     * @var string
     */
    public $bolsa_familia;
    /**
     * @var string
     */
    public $bpc;
    /**
     * @var string
     */
    public $aposentadoria;
    /**
     * @var string
     */
    public $pensao;
    /**
     * @var string
     */
    public $beneficio_eventual;
    /**
     * @var string
     */
    public $criado_em;
    /**
     * @var string
     */
    public $atualizado_em;
    /**
     * @var string
     */
    public $responsavel_cadastro;
    /**
     * @var string
     */
    public $status;
    /**
     * Insert
     *
     * Função para inserção de um registro no banco de dados. Assumir para os campos com valores boolenos as seguintes
     * chaves:
     *
     * 0 => Não
     * 1 => Sim
     *
     * @package Responsavel_model
     * @subpackage insert
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     */
    public function insert()
    {
        // Verificando a existência de cadastro
        $this->db->from($this->responsavel_db);
        $this->db->where('nome_responsavel',$this->input->post('nome-responsavel'));
        $verify = $this->db->get();
        if ($verify->num_rows() === 1) {
            return FALSE;
        } else {
            $novo_responsavel = new Responsavel_model();
            // Recebimento dos campos para inserção no banco de dados
            $novo_responsavel->nome_responsavel             = ucwords($this->input->post('nome-responsavel'));
            $novo_responsavel->cpf                          = $this->sanitazy_doc_dots($this->input->post('cpf-responsavel'));
            $novo_responsavel->nis                          = $this->sanitazy_doc_dots($this->input->post('nis-responsavel'));
            $novo_responsavel->idade                        = $this->input->post('idade-responsavel');
            $novo_responsavel->raca                         = $this->input->post('raca-responsavel');
            $novo_responsavel->escolaridade                 = $this->input->post('escolaridade');
            $novo_responsavel->telefone_fixo                = $this->input->post('telefone-fixo');
            $novo_responsavel->telefone_movel               = $this->input->post('telefone-movel');
            $novo_responsavel->pessoa_contato               = $this->input->post('pessoa-contato');
            $novo_responsavel->rua                          = $this->input->post('logradouro');
            $novo_responsavel->numero                       = $this->input->post('numero');
            $novo_responsavel->bairro                       = $this->input->post('bairro');
            $novo_responsavel->criancas_ate_06_anos         = $this->input->post('criancas-ate-06');
            $novo_responsavel->criancas_entre_07_17_anos    = $this->input->post('criancas-07-ate-17');
            $novo_responsavel->adultos                      = $this->input->post('adultos');
            $novo_responsavel->idosos                       = $this->input->post('idosos');
            $novo_responsavel->pessoa_deficiencia           = $this->input->post('pessoa-com-deficiencia');
            $novo_responsavel->tipo_deficiencia             = $this->input->post('tipo-deficiencia');
            $novo_responsavel->nome_deficiente              = $this->input->post('nome-deficiente');
            $novo_responsavel->renda_responsavel            = $this->sanitazy_renda($this->input->post('renda-responsavel'));
            $novo_responsavel->renda_adultos                = $this->sanitazy_renda($this->input->post('renda-adultos'));
            $novo_responsavel->renda_total                  = $this->sanitazy_renda($this->input->post('renda-total'));
            $novo_responsavel->nenhum_programa              = in_array(1,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->bolsa_familia                = in_array(2,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->bpc                          = in_array(3,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->aposentadoria                = in_array(4,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->pensao                       = in_array(5,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->beneficio_eventual           = in_array(6,$this->input->post('programas-governo')) ? 1 : 0;
            $novo_responsavel->criado_em                    = date('Y-m-d H:i:s');
            $novo_responsavel->responsavel_cadastro         = $this->encryption->decrypt($_SESSION['id-usuario']);
            $novo_responsavel->status                       = 1;
            // Processo de inserção no banco de dados
            $novo_responsavel->db->set($novo_responsavel)->insert($novo_responsavel->responsavel_db,$novo_responsavel);
            return $novo_responsavel->db->insert_id();
        }
    }
    /**
     * Update
     *
     * Função para atualização de um registro no banco de dados. Assumir para os campos com valores boolenos as seguintes
     * chaves:
     *
     * 0 => Não
     * 1 => Sim
     *
     * @package Responsavel_model
     * @subpackage update
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $idresponsavel array Id do responsável para atualização no banco de dados
     */
    public function update($idresponsavel)
    {
        // Recebendo os dados via Array
        $update_reg = array(
            'nome_responsavel'          => $this->input->post('nome-responsavel'),
            'cpf'                       => $this->sanitazy_doc_dots($this->input->post('cpf-responsavel')),
            'nis'                       => $this->sanitazy_doc_dots($this->input->post('nis-responsavel')),
            'idade'                     => $this->input->post('idade-responsavel'),
            'raca'                      => $this->input->post('raca-responsavel'),
            'escolaridade'              => $this->input->post('escolaridade'),
            'telefone_fixo'             => $this->input->post('telefone-fixo'),
            'telefone_movel'            => $this->input->post('telefone-movel'),
            'pessoa_contato'            => $this->input->post('pessoa-contato'),
            'rua'                       => $this->input->post('logradouro'),
            'numero'                    => $this->input->post('numero'),
            'bairro'                    => $this->input->post('bairro'),
            'criancas_ate_06_anos'      => $this->input->post('criancas-ate-06'),
            'criancas_entre_07_17_anos' => $this->input->post('criancas-07-ate-17'),
            'adultos'                   => $this->input->post('adultos'),
            'idosos'                    => $this->input->post('idosos'),
            'pessoa_deficiencia'        => $this->input->post('pessoa-com-deficiencia'),
            'tipo_deficiencia'          => $this->input->post('tipo-deficiencia'),
            'nome_deficiente'           => $this->input->post('nome-deficiente'),
            'renda_responsavel'         => $this->sanitazy_renda($this->input->post('renda-responsavel')),
            'renda_adultos'             => $this->sanitazy_renda($this->input->post('renda-adultos')),
            'renda_total'               => $this->sanitazy_renda($this->input->post('renda-total')),
            'nenhum_programa'           => in_array(1,$this->input->post('programas-governo')) ? 1 : 0,
            'bolsa_familia'             => in_array(2,$this->input->post('programas-governo')) ? 1 : 0,
            'bpc'                       => in_array(3,$this->input->post('programas-governo')) ? 1 : 0,
            'aposentadoria'             => in_array(4,$this->input->post('programas-governo')) ? 1 : 0,
            'pensao'                    => in_array(5,$this->input->post('programas-governo')) ? 1 : 0,
            'beneficio_eventual'        => in_array(6,$this->input->post('programas-governo')) ? 1 : 0,
            'atualizado_em'             => date('Y-m-d H:i:s'),
            'responsavel_cadastro'      => $this->encryption->decrypt($_SESSION['id-usuario'])
        );
        // Definindo o critério para busca do responsavel
        $this->db->where($idresponsavel);
        // Atulizando registro no Banco de Dados
        $this->db->set($update_reg)->update($this->responsavel_db);
    }
    /**
     * Delete
     *
     * Função para mudar para 0 o status do responsavel a partir do seu Id
     *
     * @package Responsavel_model
     * @subpackage delete
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $id integer Id do responsavel
     */
    public function delete($id)
    {
        // Configurando o campo de alteração do registro do responsavel
        $this->db->set('status',0);
        // Configurando a cluasula de busca
        $this->db->where('idresponsavel',$id);
        // Executando a atualização do registro
        $this->db->update($this->responsavel_db);
    }
    /**
     * Get_responsavel_by_id
     *
     * Função para pesquisar o cadastro de um responsável especifico a partir do seu Id
     *
     * @package Responsavel_model
     * @subpackage get_responsavel_by_id
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $id integer Id do responsavel
     * @return array Array de informações para render do cadastro do usuário
     */
    public function get_responsavel_by_id($id)
    {
        // Selecionado os campos para consulta
        $this->db->select('idresponsavel, nome_responsavel, cpf, nis, idade, raca, escolaridade, telefone_fixo, 
        telefone_movel, pessoa_contato, rua, numero, bairro, criancas_ate_06_anos, criancas_entre_07_17_anos, adultos, 
        idosos, pessoa_deficiencia, tipo_deficiencia, nome_deficiente, renda_responsavel, renda_adultos, 
        renda_total, nenhum_programa, bolsa_familia, bpc, aposentadoria, pensao, beneficio_eventual, 
        criado_em,responsavel_cadastro, u.nome_completo');
        // Selecionando tabela, configundo Join e Where
        $this->db->from($this->responsavel_db);
        $this->db->join('usuario u','responsavel_cadastro = u.idusuario');
        $this->db->where(array('idresponsavel' => $id,'status' => 1));
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * Get_responsavel_by_name
     *
     * Função para pesquisar o cadastro de um ou mais responsáveis a partir do nome
     *
     * @package Responsavel_model
     * @subpackage get_responsavel_by_name
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $nome_responsavel string nome ou parte do nome do responsável
     * @return array Array de informações para render do cadastro do usuário
     */
    public function get_responsavel_by_name($nome_responsavel)
    {
        // Configurando o argumento de pesquisa
        $this->db->like('nome_responsavel',urldecode($nome_responsavel));
        $this->db->where('status',1);
        // COnfigurando a ordenação dos resultados
        $this->db->order_by('nome_responsavel','ASC');
        // Realizando a busca no banco de dados
        $query = $this->db->get($this->responsavel_db);
        // Retorno da busca para o controller responsavel
        return $query->result_array();
    }
    /**
     * Get_all_data_responsavel
     *
     * Função para retornar o total de quantitativos alvos do registro de todos os responsáveis
     *
     * @package Responsavel_model
     * @subpackage get_all_data_responsavel
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com o total dos dados da tabela responsavel
     */
    public function get_all_data_responsavel()
    {
        // Selecioando os campos para consulta
        $this->db->select('count(idresponsavel) as total, (SELECT sum(criancas_ate_06_anos) FROM responsavel) 
        as criancas_06, (SELECT sum(criancas_entre_07_17_anos) FROM responsavel) as criancas_07_17,(SELECT sum(adultos) 
        FROM responsavel) as adultos, (SELECT sum(idosos) FROM responsavel) as idosos, (SELECT count(idresponsavel) FROM
        responsavel WHERE nis != \'\' AND status = 1) as total_nis');
        // Selecionando tabela
        $this->db->from($this->responsavel_db);
        // Parametro para usuarios ativos
        $this->db->where('status',1);
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * List_constacts
     *
     * Função para retornar os beneficiários a partir de listagem e tipo de programa
     *
     * @package Responsavel_model
     * @subpackage list_contacts
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param $programa seleção do tipo de programa
     * @return array Array de informações com o nome e o telefone dos responsaveis
     */
    public function list_contacts($programa)
    {
        // Selecionando campos para query
        $this->db->select('nome_responsavel, telefone_fixo, telefone_movel');
        // Definindo a tabela para consulta
        $this->db->from($this->responsavel_db);
        // Definindo critério
        if ($programa === 'sesc') {
            $this->db->where(array('nis !=' => '','status' => 1));
        } else {
            $this->db->where('status',1);
        }
        // Ordenando a listagem
        $this->db->order_by('nome_responsavel','ASC');
        // Realizado consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->result_array();
    }
    /**
     * Get_name_responsavel
     *
     * Função para retornar o nome de todos os responsaveis
     *
     * @package Responsavel_model
     * @subpackage get_name_responsavel
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com o nome e o id dos responsaveis
     */
    public function get_name_responsavel() {
        // Selecinando campos para query
        $this->db->select('idresponsavel, nome_responsavel, telefone_fixo, telefone_movel');
        // Definindo o criterio de busca
        $this->db->where('status',1);
        // Definindo a tabela para consulta
        $this->db->from($this->responsavel_db);
        // Ordenando a listagem
        $this->db->order_by('nome_responsavel','ASC');
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->result_array();
    }
    /**
     * Get_pie_raca
     *
     * Função para retornar os dados para render do gráfico racial
     *
     * @package Responsavel_model
     * @subpackage get_pie_raca
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com os dados de distribuição racial
     */
    public function get_pie_raca()
    {
        // Selecionando os campos para consulta
        $this->db->select('count(idresponsavel) as total, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 1) 
        as negro, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 2) as branco, (SELECT count(idresponsavel) 
        FROM responsavel WHERE raca  = 3) as pardo, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 4) 
        as indigena, (SELECT count(idresponsavel) FROM responsavel WHERE raca  = 5) as outros');
        // Selecionando tabela
        $this->db->from($this->responsavel_db);
        // Parametro para usuarios ativos
        $this->db->where('status',1);
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * Get_pie_escolaridade
     *
     * Função para retornar os dados para render do gráfico de escolaridade
     *
     * @package Responsavel_model
     * @subpackage get_pie_escolaridade
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com os dados de distribuição escolar
     */
    public function get_pie_escolaridade()
    {
        // Selecionando os campos para consulta
        $this->db->select('count(idresponsavel) as total, (SELECT count(idresponsavel) FROM responsavel WHERE 
        escolaridade  = 1) as analfabeto, (SELECT count(idresponsavel) FROM responsavel WHERE escolaridade  = 2) as fund_I, 
        (SELECT count(idresponsavel) FROM responsavel WHERE escolaridade  = 3) as fund_II, (SELECT count(idresponsavel) 
        FROM responsavel WHERE escolaridade  = 4) as medio, (SELECT count(idresponsavel) FROM responsavel WHERE 
        escolaridade  = 5) as superior');
        // Selecionando tabela
        $this->db->from($this->responsavel_db);
        // Parametro para usuarios ativos
        $this->db->where('status',1);
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * Get_line_idade_renda
     *
     * Função para retornar os dados para render do grafico idade X renda
     *
     * @package Responsavel_model
     * @subpackage get_line_idade_renda
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com os dados de distribuição de renda por idade
     */
    public function get_line_idade_renda()
    {
        // Selecionando os campos para consulta
        $this->db->select('AVG(renda_total) AS md_geral, (SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 
        18 AND 29) AS renda_18_29, (SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 30 AND 39) AS 
        renda_30_39,(SELECT AVG(renda_total) FROM responsavel WHERE idade BETWEEN 40 AND 59) AS renda_40_59,(SELECT 
        AVG(renda_total) FROM responsavel WHERE idade >= 60) AS renda_60');
        // Selecionando tabela
        $this->db->from($this->responsavel_db);
        // Parametro para usuarios ativos
        $this->db->where('status',1);
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * Get_get_bars_renda_raca
     *
     * Função para retornar os dados para render do grafico renda X raca
     *
     * @package Responsavel_model
     * @subpackage get_bars_renda_raca
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @return array Array de informações com os dados de distribuição de renda por raca
     */
    public function get_bars_renda_raca()
    {
        // Selecionando os campos para consulta
        $this->db->select('AVG(renda_total) AS md_geral, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 1) AS 
        renda_negros, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 2) AS renda_brancos, (SELECT AVG(renda_total) 
        FROM responsavel WHERE raca = 3) AS renda_pardos, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 4) 
        AS renda_indigenas, (SELECT AVG(renda_total) FROM responsavel WHERE raca = 5) AS renda_outros');
        // Selecionando tabela
        $this->db->from($this->responsavel_db);
        // Parametro para usuarios ativos
        $this->db->where('status',1);
        // Realizando consulta
        $query = $this->db->get();
        // Retorno dos dados
        return $query->row_array();
    }
    /**
     * Sanitazy_doc_dots
     *
     * Função para retornar strings que possuem pontos e traços em documentos
     *
     * @package Responsavel_model
     * @subpackage sanitazy_doc_dots
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param string $doc Numero de documento para sanitizar
     * @return string Numero de documento sanitizado
     */
    public function sanitazy_doc_dots($doc)
    {
        return str_replace('-','', str_replace('.','',$doc));
    }
    /**
     * sanitazy_renda
     *
     * Função para retornar numeros em formato ideal para o Banco de dados
     *
     * @package Responsavel_model
     * @subpackage sanitazy_renda
     * @author Renato Bonfim Jr.
     * @copyright 2019-2029
     * @version 1.0
     * @param integer $renda Valor em formato numerico para sanitização
     * @return integer Valor em formato ideal para o banco de dados
     */
    public function sanitazy_renda($renda)
    {
        return str_replace(',','.',str_replace('.','',$renda));
    }
}