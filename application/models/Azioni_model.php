<?php

	class Azioni_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function createAzione($dati) {
			$query=$this->db->set('descrizione', $dati['descrizione'])
							->set('date_create', 'NOW()', FALSE)
							->insert('azioni');
			return $this->db->insert_id();
		}
		
		public function getAzioneByDescr($descr) {
			$query=$this->db->get_where('azioni',array("descrizione"=>$descr));
			return $query->row();
		}
		
		public function getAzioneByID($id) {
			$query=$this->db->get_where('azioni',array("id"=>$id));
			return $query->row();
		}
		
		public function getAzioni() {
			$subquery=$this->db->select('count(*)')
							   ->where('id_azioni=azioni.id')
							   ->get_compiled_select('campi');
			$query=$this->db->select('azioni.*')
							->select('('.$subquery.') as campi')
							->order_by('descrizione','ASC')
							->get('azioni');
			return $query->result();
		}
		
	}
	
?>
