<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Azioni extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	 
	public function index()	{
		
		$azioni=$this->azioni_model->getAzioni();
		foreach ($azioni as $key=>$val) {
			if ($val->date_create!=NULL) $azioni[$key]->date_create=convertDateTime($val->date_create);
			if ($val->date_edit!=NULL) $azioni[$key]->date_edit=convertDateTime($val->date_edit);
		}		
		$data['azioni']=$azioni;
		
		$this->load->view('common/open');
		$this->load->view('azioni',$data);
		$this->load->view('common/scripts');
		$this->load->view('azioni_scripts');
		$this->load->view('common/close');
	}
	
	public function create() {
		if (!$this->input->post()) redirect(base_url());
		$this->load->library('form_validation');
		$this->form_validation->set_rules('c_descr', 'Descrizione', 'callback_required_descr|callback_duplicate_descr');
		
		if ($this->form_validation->run() !== FALSE) {
			$post=$this->input->post();
			// controllo descrizione duplicata
			if ($ins_id=$this->azioni_model->createAzione($post)) custom_log('Azione inserita con id '.$ins_id.'. Dati: '.json_encode($post));
		}
		
		redirect (base_url());
	}
	
	// ------------------- funzioni validazione ------------------------
	
	public function required_descr() {
		$post=$this->input->post();
		if (trim($post['c_descr'])=="") {
			//$this->form_validation->set_message('required_azione', 'Campo {field} obbligatorio.');
			custom_log('Errore inserimento azione, descrizione non inserita. Dati: '.json_encode($post));
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function duplicate_descr() {
		$post=$this->input->post();
		if ($this->azioni_model->getAzioneByDescr($post['c_descr'])) {
			//$this->form_validation->set_message('duplicate_descr', '{field} \''.$post['name'].'\' duplicato');
			custom_log('Errore inserimento azione, descrizione duplicata. Dati: '.json_encode($post));
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
