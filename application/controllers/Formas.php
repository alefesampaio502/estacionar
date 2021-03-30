<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Formas extends CI_Controller {
     public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }

	}



	public function index(){

		$data =  array(

			'titulo' => ' Listagem de formas de pagamentos',
			'sub_titulo' => 'Listagem de todos usuários cadastrado',


			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'
				//'js/datatables.js'
			),


		'formas' => $this->core_model->get_all('formas_pagamentos'), // get all users
	);

	/*echo '<pre>';
	print_r($data['formas']);
	exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('formas/index');

		$this->load->view('layout/footer');
	}

	public function edit($forma_pagamento_id = NULL ){
      
      //verifica no banco se existe algum vendedor //
		if(!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){
			$this->session->set_flashdata('error','Formas de pagamenentos não encontrado');
			redirect('formas');
		}else{

			$this->form_validation->set_rules('forma_pagamento_nome','Formas de pagamenentos','trim|required|min_length[1]|max_length[30]|callback_checke_pagamento_nome');
			$this->form_validation->set_rules('forma_pagamento_ativa','Situação','trim');

           
           //Execulte a validação
			if($this->form_validation->run()){
				//exit('validado');

				$data = elements(
					array(
						'forma_pagamento_nome',
						'forma_pagamento_ativa',
						
					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);

				
					/*echo '<pre>';
					print_r($data['precificacoes']);
					exit();*/

				$this->core_model->update('formas_pagamentos', $data, array('forma_pagamento_id' => $forma_pagamento_id));
				redirect('formas');


			}else{

				$data =  array(

			'titulo' => ' Editar formas de pagamentos',
			'sub_titulo' => 'Listagem de todos usuários cadastrado',


			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
				'js/app.js'
			),

			'formas' => $this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id)),
		//'precificacoes' => $this->core_model->get_all('precificacoes'), // get all users
	);

/*	echo '<pre>';
	print_r($data['formas']);
	exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('formas/edit');
		$this->load->view('layout/footer');

			
		}

	}

}

	public function add(){
      
           //validação de formas de'pagamentos 
			$this->form_validation->set_rules('forma_pagamento_nome','Formas de pagamentos','trim|required|min_length[1]|max_length[30]|is_unique[formas_pagamentos.forma_pagamento_nome]');
			$this->form_validation->set_rules('forma_pagamento_ativa','Situação','trim');

           
           //Execulte a validação
			if($this->form_validation->run()){
				//exit('validado');

				$data = elements(
					array(
						'forma_pagamento_nome',
						'forma_pagamento_ativa',

					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);


				$this->core_model->insert('formas_pagamentos', $data);
				redirect('formas');


			}else{

				$data =  array(

			'titulo' => ' Cadastro de formas de pagamenentos',
			'sub_titulo' => 'Listagem de todos usuários cadastrado',

			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
				'js/app.js'
			),

	);

		$this->load->view('layout/header', $data);
		$this->load->view('formas/edit');
		$this->load->view('layout/footer');

			
		}


	}

	public function del($forma_pagamento_id = NULL){

if(!$forma_pagamento_id || !$this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id))){
		$this->session->set_flashdata('error','Forma de pagamentos não encontrado');
	redirect('formas');
		}else{
	$this->core_model->delete('formas_pagamentos', array('forma_pagamento_id' => $forma_pagamento_id));
	redirect('formas');

	}
}


	public function checke_pagamento_nome($forma_pagamento_nome){

		$forma_pagamento_id = $this->input->post('forma_pagamento_id');

		if($this->core_model->get_by_id('formas_pagamentos', array('forma_pagamento_nome' => $forma_pagamento_nome, 'forma_pagamento_id !=' => $forma_pagamento_id))){

			$this->form_validation->set_message('checke_pagamento_nome','Esse nome já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}


}