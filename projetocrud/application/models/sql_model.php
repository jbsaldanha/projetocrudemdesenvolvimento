<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sql_model extends CI_Model{

	function __construct(){
		parent::__construct();
		date_default_timezone_set('America/Sao_Paulo');
	}

	public function convertData($data){
		return date("Y-m-d",strtotime($data));
	}

	public function get_doadores(){

		$select = 'select nome
			,cpf
			,email
			,year(now())- substring(dtnasc,1,4) as idade
		from tb_doador';

		$query = $this->db->query($select);

		return $query->result();
	}

	public function get_doador($cpf){
		$select = 'select
			d.nome nome
			,d.cpf cpf
			,d.email email
			,d.dtnasc dtnasc
			,e.endereco endereco
			,e.numero numero
			,e.complemento complemento
			,e.bairro bairro
			,e.cep cep
			,d.doacao
			,d.forma_pagamento
			,d.tipo_doacao
			,d.tel1 tel1
			,d.tel2 tel2
			,e.id
			from tb_doador d
			join tb_endereco e
			on d.endereco = e.id
			where d.cpf = "'.$cpf.'"';

		$query = $this->db->query($select);

		return $query->result();
	}

	public function insert_doador($cadastro){

		$insert1 = array(
			'endereco' => $cadastro['endereco']
			,'complemento' => $cadastro['complemento']
			,'numero' => $cadastro['numero']
			,'bairro' => $cadastro['bairro']
			,'cep' => $cadastro['cep']
		);
		$this->db->insert('tb_endereco',$insert1);

		$this->db->select('id');
		$select = $this->db->get_where('tb_endereco',$insert1,1);
		$enderecoid = $select->result()[0]->id;

		$insert2 = array(
			'cpf'=>$cadastro['cpf']
			,'nome'=>$cadastro['nome']
			,'email'=>$cadastro['email']
			,'dtnasc'=>$this->convertData($cadastro['dtnasc'])
			,'tel1'=>$cadastro['tel1']
			,'tel2'=>$cadastro['tel2']
			,'endereco'=>$enderecoid
			,'doacao'=>$cadastro['doacao']
			,'forma_pagamento'=>$cadastro['forma_pagamento']
			,'tipo_doacao'=>$cadastro['tipo_doacao']
			,'dtcadastro'=>date('Y-m-d H:i:s')
		);

		$this->db->insert('tb_doador',$insert2);
	}

	public function update_doador($cadastro){
		$this->db->select('endereco');
		$select = $this->db->get_where('tb_doador', array('cpf'=>$cadastro['cpf']) );
		$enderecoid = $select->result()[0]->endereco;

		$update1 = array(
			'endereco' => $cadastro['endereco']
			,'complemento' => $cadastro['complemento']
			,'numero' => $cadastro['numero']
			,'bairro' => $cadastro['bairro']
			,'cep' => $cadastro['cep']
		);

		$this->db->where($enderecoid);
		$this->db->update('tb_endereco',$update1);

		$update2 = array(
			'nome'=>$cadastro['nome']
			,'email'=>$cadastro['email']
			,'dtnasc'=>$this->convertData($cadastro['dtnasc'])
			,'tel1'=>$cadastro['tel1']
			,'tel2'=>$cadastro['tel2']
			//,'endereco'=>$enderecoid
			,'doacao'=>$cadastro['doacao']
			//,'forma_pagamento'=>$cadastro['forma_pagamento']
			//,'tipo_doacao'=>$cadastro['tipo_doacao']
			,'dtcadastro'=>date('Y-m-d H:i:s')
		);

		$this->db->where($cadastro['cpf']);
		$this->db->update('tb_doador',$update2);
	}

	public function delete_doador($cadastro){
		$this->db->select('endereco');
		$select = $this->db->get_where('tb_doador', array('cpf'=>$cadastro) );
		$enderecoid = $select->result()[0]->endereco;

		$this->db->delete('tb_endereco',array('id'=>$enderecoid));
		$this->db->delete('tb_doador',array('cpf'=>$cadastro));
	}

}