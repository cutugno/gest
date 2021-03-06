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
			$azioni[$key]->date_create=($val->date_create!=NULL) ? convertDateTime($val->date_create,0) : "-";
			$azioni[$key]->date_edit=($val->date_edit!=NULL) ? convertDateTime($val->date_edit,0) : "-";
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
			redirect ('azioni/configura/'.$ins_id);
		}else{
			custom_log('Errore inserimento azione. Dati: '.json_encode($post));
			$this->session->set_flashdata('noinsazione',1);
			redirect ('azioni/nuova');	
		}
	}
	
	public function configura($id_azione) {
		if (!$id_azione) show_404();
		
		$this->output->enable_profiler(FALSE);
		
		// dettagli azione
		$azione=$this->azioni_model->getAzioneByID($id_azione);
		$azione->date_create=($azione->date_create!=NULL) ? convertDateTime($azione->date_create,0) : "-";
		$azione->date_edit=($azione->date_edit!=NULL) ? convertDateTime($azione->date_edit,0) : "-";		
		
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
				$campi[$key]->date_create=($val->date_create!=NULL) ? convertDateTime($val->date_create,0) : "-";
				$campi[$key]->date_edit=($val->date_edit!=NULL) ? convertDateTime($val->date_edit,0) : "-";
				$campi[$key]->nome=$val->cognome.", ".$val->nome;
				unset($campi[$key]->cognome);
				$campi[$key]->id_avvocato=$val->editabile;
				$campi[$key]->editabile=($val->editabile==0) ? 0 : 1 ;
				$campi[$key]->display_editabile=($val->editabile==0) ? "none" : "visible" ;
			}
		}
		
		$data['azione']=$azione;	
		$data['campi']=$campi;	
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('azioni/configura',$data);
		$this->load->view('common/scripts');
		$this->load->view('azioni/swal');
		$this->load->view('azioni/configura_scripts');
		$this->load->view('common/close');
	}
	
	public function record($id_azione) {
		if (!$id_azione) show_404();
		
		$this->output->enable_profiler(TRUE);
		
		// dettagli azione
		$azione=$this->azioni_model->getAzioneByID($id_azione);
				
		// elenco campi 
		$campi=$this->campi_model->getAzioneCampi($id_azione);
		
		// elenco record
		$record=$this->record_model->getAzioneRecord($id_azione);
		foreach ($record as $key=>$val) {
			$record[$key]->date_create=($val->date_create!=NULL) ? convertDateTime($val->date_create,0) : "-";
			$record[$key]->date_edit=($val->date_edit!=NULL) ? convertDateTime($val->date_edit,0) : "-";
			$record[$key]->avvocato=($val->id_avvocato!=NULL) ? $val->cognome.", ".$val->nome : "";
		}

		$data['azione']=$azione;
		$data['campi']=$campi;
		$data['record']=$record;
		
		$this->load->view('common/open');
		$this->load->view('common/navigation');
		$this->load->view('azioni/record',$data);
		$this->load->view('common/scripts');
		$this->load->view('azioni/swal');
		//$this->load->view('azioni/record_scripts');
		$this->load->view('common/close');
		
	}
	
	// ------------------- chiamate REST -------------------------------
	
	public function update_azione() {
		if (!$this->input->post()) exit();		
	
		if (($this->required_descr()) && ($this->duplicate_edited_descr())) {
			$post=$this->input->post();
			if (!isset($post['active'])) $post['active']=0;
			
			// update
			if ($this->azioni_model->updateAzione($post)) {
				custom_log('Azione modificata correttamente. Dati: '.json_encode($post));
				$azione=$this->azioni_model->getAzioneByID($post['id']);
				$azione->date_create=($azione->date_create!=NULL) ? convertDateTime($azione->date_create,0) : "-";
				$azione->date_edit=($azione->date_edit!=NULL) ? convertDateTime($azione->date_edit,0) : "-";	
				$azione->active=($azione->active==1) ? TRUE : FALSE;	
				$echo=array("type"=>"success","msg"=>"Azione aggiornata correttamente","azione"=>$azione);
			}else{
				custom_log('Errore aggiornamento azione. Dati: '.json_encode($post));	
				$echo=array("type"=>"error","msg"=>"Errore modifica azione");	
			}		
		}else{
			$echo=array("type"=>"warning","msg"=>$this->session->nodescr.$this->session->duplediteddescr);
			unset($_SESSION['nodescr'],$_SESSION['duplediteddescr']);
		}
		
		echo json_encode($echo);
	}
	
	public function delete_campo() {
		if (!$this->input->post()) exit();	
		$post=$this->input->post();
		
		if ($this->esiste_campo()) {
			if ($this->campi_model->deleteCampo($post['id_campo'])) {
				custom_log('Campo con id '.$post['id_campo'].' cancellato.');
				$echo=array("type"=>"success","msg"=>"Campo cancellato correttamente");				
			}else{
				custom_log('Errore cancellazione campo. Dati: '.json_encode($post));	
				$echo=array("type"=>"error","msg"=>"Errore cancellazione campo");	
			}
		}else{
			$echo=array("type"=>"warning","msg"=>$this->session->noesistecampo);
			unset($_SESSION['noesistecampo']);
		}
		
		echo json_encode($echo);			
	}
	
	public function update_campo() {
		if (!$this->input->post()) exit();	
		$post=$this->input->post();
		
		if ($this->esiste_campo()) {
			if (!$this->required_descr()) {
				$echo=array("type"=>"warning","msg"=>$this->session->nodescr);
				unset($_SESSION['nodescr']);
			}else{
				if ($post['id_avvocato']!=0) {
					if (!$this->esiste_avvocato()) {
						$echo=array("type"=>"warning","msg"=>$this->session->noesisteavvocato);
						unset($_SESSION['noesisteavvocato']);
					}										
				}
				$post['editabile']=$post['id_avvocato'];
				if ($this->campi_model->updateCampo($post)) {
					custom_log('Campo con id '.$post['id_campo'].' aggiornato. Dati: '.json_encode($post));
					$echo=array("type"=>"success","msg"=>"Campo aggiornato correttamente");	
				}else{
					custom_log('Errore aggiornamento campo. Dati: '.json_encode($post));	
					$echo=array("type"=>"error","msg"=>"Errore aggiornamento campo");	
				}
			}
		}else{
			$echo=array("type"=>"warning","msg"=>$this->session->noesistecampo);
			unset($_SESSION['noesistecampo']);
		}	
		
		echo json_encode($echo);	
	}
	
	public function save_campo() {
		if (!$this->input->post()) exit();	
		$post=$this->input->post();
		
		if ($this->esiste_azione()) {
			if (!$this->required_descr()) {
				$echo=array("type"=>"warning","msg"=>$this->session->nodescr);
				unset($_SESSION['nodescr']);
			}else{
				if ($post['id_avvocato']!=0) {
					if (!$this->esiste_avvocato()) {
						$echo=array("type"=>"warning","msg"=>$this->session->noesisteavvocato);
						unset($_SESSION['noesisteavvocato']);
					}										
				}
				$post['editabile']=$post['id_avvocato'];
				// controllo se azione ha già un campo con questa campo_descrizione
				if ($ins_id=$this->campi_model->saveCampo($post)) {
					custom_log('Campo inserito con id '.$ins_id.'. Dati: '.json_encode($post));
					$echo=array("type"=>"success","msg"=>"Campo inserito correttamente","insid"=>$ins_id);	
				}else{
					custom_log('Errore inserimento campo. Dati: '.json_encode($post));	
					$echo=array("type"=>"error","msg"=>"Errore inserimento campo");	
				}
			}
		}else{
			$echo=array("type"=>"warning","msg"=>$this->session->noesisteazione);
			unset($_SESSION['noesisteazione']);
		}	
		
		echo json_encode($echo);			
	}
	
	// ------------------- funzioni validazione ------------------------
	
	public function required_descr() {
		$post=$this->input->post();	
		
		if (trim($post['descrizione'])=="") {
			custom_log('Errore descrizione non inserita. Dati: '.json_encode($post));
			$this->session->set_flashdata('nodescr','Descrizione non inserita. ');
			return FALSE;
		}else{
			return TRUE;
		}
	}
	
	public function duplicate_descr() {
		$post=$this->input->post();
		if ($this->azioni_model->getAzioneByDescr($post['descrizione'])) {
			custom_log('Errore inserimento descrizione duplicata. Dati: '.json_encode($post));
			$this->session->set_flashdata('dupldescr','Descrizione esistente.');
			return FALSE;
		}else{
			return TRUE;
		}
	}
		
	public function duplicate_edited_descr() {
		$post=$this->input->post();
		if ($descr_simile=$this->azioni_model->getAzioneByDescr($post['descrizione'])) {
			if ($descr_simile->id != $post['id']) {
				custom_log('Errore aggiornamento descrizione duplicata. Dati: '.json_encode($post));
				$this->session->set_flashdata('duplediteddescr','Descrizione esistente. ');
				return FALSE;
			}
		}
		return TRUE;
	}
	
	public function esiste_campo() {
		$post=$this->input->post();
		if (!$this->campi_model->getCampoByID($post['id_campo'])) {
			custom_log('Errore campo inesistente. Dati: '.json_encode($post));
			$this->session->set_flashdata('noesistecampo','Campo inesistente. ');
			return FALSE;
		}
		return TRUE;
	}
	
	public function duplicate_campo() {
		
	}
	
	public function esiste_avvocato() {
		$post=$this->input->post();
		if (!$this->avvocati_model->getAvvocatoByID($post['id_avvocato'])) {
			custom_log('Errore avvocato inesistente. Dati: '.json_encode($post));
			$this->session->set_flashdata('noesisteavvocato','Avvocato inesistente. ');
			return FALSE;
		}
		return TRUE;
	}
	
	public function esiste_azione() {
		$post=$this->input->post();
		if (!$this->azioni_model->getAzioneByID($post['id_azione'])) {
			custom_log('Errore azione inesistente. Dati: '.json_encode($post));
			$this->session->set_flashdata('noesisteazione','Azione inesistente. ');
			return FALSE;
		}
		return TRUE;
	}
}
