<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MainController extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('sql_model','dbcrud');
	}

	//Função principal abre a listagem de doadores
	public function index(){
		$dados = array(
			'titulo' => 'Listagem de doadores',
			'registros' => $this->dbcrud->get_doadores(),
		);
		$this->load->view('head_page',$dados);
		$this->load->view('grid_doadores');
		$this->load->view('footer_page');
	}

	//Função que abre a visualização do cadastro do doador
	public function view($cpf){
		$cpf = $this->uri->segment(3);
		$dados = array(
			'titulo' => 'Listagem de doadores',
			'registro' => $this->dbcrud->get_doador($cpf),
		);

		$this->load->view('head_page',$dados);
		$this->load->view('view_page',$dados);
		$this->load->view('footer_page');
	}

	//Exclui registro do usuário
	public function deletaDoador($cpf){
		$this->dbcrud->delete_doador($cpf);

		$dados = array(
			'titulo' => 'Listagem de doadores',
			'registros' => $this->dbcrud->get_doadores(),
		);
		$this->load->view('head_page',$dados);
		$this->load->view('grid_doadores');
		$this->load->view('footer_page');
	}

	//Função que edita o registro do doador
	public function editaDoador($cpf){
		$this->load->helper('form');
		$this->load->library('form_validation');

		$this->form_validation->set_rules('nome','Nome','trim|required');
		$this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
		$this->form_validation->set_rules('tel1','Contato','trim|required');
		$this->form_validation->set_rules('tel2','Outro contato','trim');
		$this->form_validation->set_rules('dtnasc','Data de nascimento','trim|required');
		$this->form_validation->set_rules('cpf','CPF','trim|required');
		$this->form_validation->set_rules('doacao','Valor','trim|required');
		//$this->form_validation->set_rules('tipo_doacao','Intervalo de doação');
		//$this->form_validation->set_rules('forma_pagamento','Forma de pagamento');
		$this->form_validation->set_rules('cep','CEP','trim|required');
		$this->form_validation->set_rules('endereco','Endereço','trim|required');
		$this->form_validation->set_rules('numero','Número','trim|required');
		$this->form_validation->set_rules('complemento','Complemento','trim');
		$this->form_validation->set_rules('bairro','Bairro','trim|required');

		if($this->form_validation->run() == FALSE ){
			if(validation_errors()){
				$dados['errosform'] = "<div class='alert alert-danger' role='alert'>"
					.validation_errors()
				."</div>";
			}else{
				$dados['errosform'] = '';
			}
		}else{
			$dados['errosform'] = "<div class='alert alert-success' role='alert'>Cdastro concluído com sucesso</div>";

			$recupera_cad = $this->input->post();
			$this->dbcrud->update_doador($recupera_cad);
		}

		$dados['titulo'] = 'Editar registro';
		$dados['registro'] = $this->dbcrud->get_doador($cpf);

		$this->load->view('head_page',$dados);
		$this->load->view('edita_doador',$dados);
		$this->load->view('footer_page');
	}

	//Função para abrir página de inserir um novo doador
	public function novoDoador(){
		$this->load->helper('form');
		$this->load->library('form_validation');

		/* regras de validação para o fomulário*/
		$this->form_validation->set_rules('nome','Nome','trim|required');
		$this->form_validation->set_rules('email','E-mail','trim|required|valid_email');
		$this->form_validation->set_rules('tel1','Contato','trim|required');
		$this->form_validation->set_rules('tel2','Outro contato','trim');
		$this->form_validation->set_rules('dtnasc','Data de nascimento','trim|required');
		$this->form_validation->set_rules('cpf','CPF','trim|required');
		$this->form_validation->set_rules('doacao','Valor','trim|required');
		$this->form_validation->set_rules('tipo_doacao','Intervalo de doação');
		$this->form_validation->set_rules('forma_pagamento','Forma de pagamento');
		$this->form_validation->set_rules('cep','CEP','trim|required');
		$this->form_validation->set_rules('endereco','Endereço','trim|required');
		$this->form_validation->set_rules('numero','Número','trim|required');
		$this->form_validation->set_rules('complemento','Complemento','trim');
		$this->form_validation->set_rules('bairro','Bairro','trim|required');

		if($this->form_validation->run() == FALSE ){
			if(validation_errors()){
				$dados['errosform'] = "<div class='alert alert-danger' role='alert'>"
					.validation_errors()
				."</div>";
			}else{
				$dados['errosform'] = '';
			}
		}else{
			$dados['errosform'] = "<div class='alert alert-success' role='alert'>Cdastro concluído com sucesso</div>";

			$recupera_cad = $this->input->post();
			$this->dbcrud->insert_doador($recupera_cad);
		}

		$dados['titulo'] = 'Adicionar novo doador';
		$this->load->view('head_page',$dados);
		$this->load->view('novo_doador');
		$this->load->view('footer_page');
	}

}
