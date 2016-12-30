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
		
		public function getCampoByID($id) {
			$query=$this->db->get_where('campi',array("id"=>$id));
			return $query->row();
		}
		
		public function deleteCampo($id) {
			$query=$this->db->delete('campi', array('id' => $id)); 
			return $this->db->affected_rows();
		}
		
		public function saveCampo($dati) {
			$query=$this->db->set('descrizione', $dati['descrizione'])
							->set('editabile', $dati['editabile'])
							->set('id_azioni', $dati['id_azione'])
							->set('date_create', 'NOW()', FALSE)
							->insert('campi');
			return $this->db->insert_id();
		}
		
		public function updateCampo($dati) {
			$query=$this->db->set('descrizione', $dati['descrizione'])
							->set('editabile', $dati['editabile'])
							->set('date_edit', 'NOW()', FALSE)
							->where('id', $dati['id_campo'])
							->update('campi');
			return $query;
		}
		
	}
	
?>
