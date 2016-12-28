<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
		$this->load->view('dashboard',$data);
		$this->load->view('common/scripts');
		$this->load->view('common/close');
	}
}
