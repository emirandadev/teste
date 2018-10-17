<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon extends CI_Controller {

	 public function __construct() {

        parent::__construct();
        $this->load->helper('url');
        $this->load->model('Logon_model', 'model');
    }
	
	public function index()	{

		redirect('logon/listagem');
		//$this->load->view('login/listagem');
	}

	public function novo() {

		$this->load->view('login/logon');

	}

	public function cadastro() {

		unset($_POST['btnCadastrar']);

		$dados = $_POST;

		$resultado = $this->model->create_login($dados);

		if($resultado) {

			$this->create_flash_mensagem('success', "Login {$_POST['nome']}, cadastrado com sucesso!");

		} else {

			$this->create_flash_mensagem('danger', "Erro ao tentar cadastrar o Login {$_POST['nome']}!");
		}

		redirect('logon/listagem');
	}

	public function listagem() {

		$data['logon'] = $this->model->getLogon();
		
		$this->load->view('login/listagem', $data);	
	}

	public function edicao() {

		$param = explode("/", $_SERVER['REQUEST_URI']);

		$id = end($param);

		$data['logon'] = $this->model->getLogonOne($id);

		$this->load->view('login/logon_edicao', $data);
	
	}

	public function alterar() {

		unset($_POST['btnCadastrar']);

		$dados = $_POST;

		$dados = $this->model->update_login($dados);

		if($dados) {
			
			$this->create_flash_mensagem('success', "Login {$_POST['nome']}, atualizado com sucesso!");

		} else {
			
			$this->create_flash_mensagem('danger', "Erro ao tentar atualizar o Login {$_POST['nome']}!");				
		}

		redirect('logon/listagem');

	}

	public function create_flash_mensagem($class, $mensagem) {

		$data = array(
			'class' => $class,
			'msg' => $mensagem
		);

		$this->session->set_flashdata('mensagem', $data);

	}

	public function remove() {

		$id = $_POST['id'];

		// Removendo o Logon
		$result = '';
		$result = $this->model->remove_login($id);

		echo json_encode($result);

	}
}
