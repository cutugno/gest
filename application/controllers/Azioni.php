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
		$this->output->enable_profiler(FALSE);
		
		$azioni=$this->azioni_model->getAzioni();
		foreach ($azioni as $key=>$val) {
			$azioni[$key]->date_create=($val->date_create!=NULL) ? convertDateTime($val->date_create) : "-";
			$azioni[$key]->date_edit=($val->date_edit!=NULL) ? convertDateTime($val->date_edit) : "-";
		}		
		$data['azioni']=$azioni;
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('azioni/index',$data);
		$this->load->view('common/scripts');		
		$this->load->view('azioni/index_scripts');
		$this->load->view('common/close');
	}
	
	public function nuova()	{
		$this->output->enable_profiler(FALSE);
		
		$this->load->library('form_validation');
				
		// validazione form nuova azione
		if ($this->input->post('form_name')=="createazione") {
			$this->form_validation->set_rules('c_descr', 'Descrizione', 'callback_required_descr|callback_duplicate_descr');
			if ($this->form_validation->run() !== FALSE) {
				$this->session->set_flashdata('postdata',$this->input->post());
				redirect('azioni/create');
			}
		}
		
		// validazione form importa azione
		if ($this->input->post('form_name')=="importaazione") {
			$this->form_validation->set_rules('i_descr', 'Descrizione', 'callback_required_descr|callback_duplicate_descr');
			// regole validazione file i_csv
			if ($this->form_validation->run() !== FALSE) {
				$this->session->set_flashdata('postdata',$this->input->post());
				redirect('azioni/import');
			}
		}
		
		$this->session->set_flashdata('errornuovaazione',$this->session->nodescr.$this->session->dupldescr);
		unset($_SESSION['nodescr'],$_SESSION['dupldescr']);
			
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('azioni/nuova');
		$this->load->view('common/scripts');
		$this->load->view('azioni/swal');		
		$this->load->view('common/close');
	}
	
	public function create() {
		if (!$this->session->postdata) redirect(base_url());
		$post=$this->session->postdata;
		
		if ($ins_id=$this->azioni_model->createAzione($post)) {
			custom_log('Azione inserita con id '.$ins_id.'. Dati: '.json_encode($post));
			$this->session->set_flashdata('insazione',1);
			redirect ('azioni/campi/'.$ins_id);
		}else{
			custom_log('Errore inserimento azione. Dati: '.json_encode($post));
			$this->session->set_flashdata('noinsazione',1);
			redirect ('azioni/nuova');	
		}
	}
	
	public function campi($id_azione) {
		if (!$id_azione) show_404();
		
		// dettagli azione
		$azione=$this->azioni_model->getAzioneByID($id_azione);
		$azione->date_create=($azione->date_create!=NULL) ? convertDateTime($azione->date_create) : "-";
		$azione->date_edit=($azione->date_edit!=NULL) ? convertDateTime($azione->date_edit) : "-";		
		
		// elenco campi 
		$campi=$this->campi_model->getAzioneCampi($id_azione);
		
		// select avvocati
		$avvocati=$this->avvocati_model->getAvvocati();
		$data['selectavvocati']=array();
		if ($avvocati) {
			foreach ($avvocati as $val){
				$data['selectavvocati'][$val->id]=$val->cognome.", ".$val->nome;
			}
		}

		if ($campi) {
			foreach ($campi as $key=>$val) {
				$campi[$key]->date_create=($val->date_create!=NULL) ? convertDateTime($val->date_create) : "-";
				$campi[$key]->date_edit=($val->date_edit!=NULL) ? convertDateTime($val->date_edit) : "-";
				$campi[$key]->nome=$val->cognome.", ".$val->nome;
				unset($campi[$key]->cognome);
				$campi[$key]->id_editor=$val->editabile;
				$campi[$key]->editabile=($val->editabile==0) ? 0 : 1 ;
				$campi[$key]->display_editabile=($val->editabile==0) ? "none" : "visible" ;
			}
		}
		
		$data['azione']=$azione;	
		$data['campi']=$campi;	
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('azioni/campi',$data);
		$this->load->view('common/scripts');
		$this->load->view('azioni/swal');
		$this->load->view('azioni/campi_scripts');
		$this->load->view('common/close');
	}
	
	// ------------------- chiamate REST -------------------------------
	
	public function update() {
		if (!$this->input->post()) exit();		
		
		if (!$this->required_descr()) echo "no descr";
	}
	
	// ------------------- funzioni validazione ------------------------
	
	public function required_descr() {
		$post=$this->input->post();
		if (trim($post['descrizione'])=="") {
			custom_log('Errore inserimento azione, descrizione non inserita. Dati: '.json_encode($post));
			$this->session->set_flashdata('nodescr','Descrizione non inserita. ');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function duplicate_descr() {
		$post=$this->input->post();
		if ($this->azioni_model->getAzioneByDescr($post['descrizione'])) {
			custom_log('Errore inserimento azione, descrizione duplicata. Dati: '.json_encode($post));
			$this->session->set_flashdata('dupldescr','Descrizione duplicata.');
			return FALSE;
		}else{
			return TRUE;
		}
	}
}
