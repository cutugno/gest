<?php

	class Campi_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getAzioneCampi($id_azione) {
			$query=$this->db->select('campi.*,avvocati.nome,avvocati.cognome')
							->join('avvocati','campi.editabile=avvocati.id','left')
							->where('id_azioni',$id_azione)
							->get('campi');
			return $query->result(); 
		}
		
	}
	
?>
