<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logon_model extends CI_Model {

	public function __construct() {

        parent::__construct();
    
    }

	public function getLogon() {

		$this->db->order_by('nome', 'asc');

		$logon = $this->db->get('login')->result();
		
		return $logon;
		
	}

	public function getLogonOne($id) {

		$this->db->where('id', $id);
		$logon = $this->db->get('login')->result();

		return $logon;
	}

	public function create_login($logon) {
		
        $data = [
        	'nome' => $logon['nome'],
        	'senha' => md5($logon['senha']),
        	'email' => $logon['email']
        ];

        $this->db->insert('login', $data);

        return $this->db->affected_rows();

	}

	public function update_login($logon) {

		$id = $logon['id'];
		
		$dados = array_filter([
			'nome' => strtoupper($logon['nome']), 
			'email' => strtoupper($logon['email']), 
			'senha' => $logon['senha'] 
		]);
		
		$this->db->where('id', $id);
		$this->db->update('login',$dados);

		//echo $this->db->last_query();

		return $this->db->affected_rows();
	
	}

	public function remove_login($id) {

		$this->db->where('id', $id);
		$this->db->delete('login');

		return $this->db->affected_rows();
	}
}

?>