<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class MY_Controller extends CI_Controller {

	public function __construct() {

		parent::__construct();

		$logado = $this->session->userdate("usuario_logado");
		if($logado !=1){

			redirect(base_url('login'));
		}

  }
}