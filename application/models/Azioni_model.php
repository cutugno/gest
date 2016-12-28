<?php

	class Azioni_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function createAzione($dati) {
			$query=$this->db->set('descr', $dati['c_descr'])
							->set('date_create', 'NOW()', FALSE)
							->insert('azioni');
			return $this->db->insert_id();
		}
		
		public function getAzioneByDescr($descr) {
			$query=$this->db->get_where('azioni',array("descr"=>$descr));
			return $query->row();
		}
		
		public function getAzioni() {
			$query=$this->db->get('azioni');
			return $query->result();
		}
		
	}
	
?>
