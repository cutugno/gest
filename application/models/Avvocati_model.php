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
		
		public function getAvvocatoByID($id) {
			$query=$this->db->get_where('avvocati',array("id"=>$id));
			return $query->row();
		}
			
	}
	
?>
