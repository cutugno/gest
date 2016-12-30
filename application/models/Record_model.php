<?php

	class Record_model extends CI_Model {
		
		public function __construct () {
			$this->load->database();
		}
		
		public function getAzioneRecord($id_azione) {
			$query=$this->db->select('record.*,avvocati.id as id_avvocato,avvocati.nome,avvocati.cognome')
							->join('campi','record.id_campi=campi.id')
							->join('azioni','campi.id_azioni=azioni.id')
							->join('avvocati','record.id_editor=avvocati.id','LEFT')
							->where('azioni.id',$id_azione)
							->get('record');
			return $query->result();
		}
				
	}
	
?>
