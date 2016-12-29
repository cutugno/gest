<?php

	class Avvocati_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getAvvocati() {
			$query=$this->db->order_by('cognome','ASC')
							->order_by('nome','ASC')
							->get('avvocati');
			return $query->result();
		}
			
	}
	
?>
