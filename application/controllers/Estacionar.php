<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Estacionar extends CI_Controller {
     public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }
                    
                    $this->load->model('estacionar_model');

	}



	public function index(){

		$data =  array(

			'titulo' => ' Tickets de estacionamento',
			

			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
				'js/app.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js',
				//'js/datatables.js'
			),


		'estacinados' => $this->estacionar_model->get_all(), 
	);

	/*		echo '<pre>';
			print_r($data['estacinados']);
			exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('estacionar/index');
		$this->load->view('layout/footer');
	}

public function edit($estacionar_id = NULL){
	//verifica no banco se existe algum vendedor //
		if(!$estacionar_id || !$this->core_model->get_by_id('estacionar', array('estacionar_id' => $estacionar_id))){
			$this->session->set_flashdata('error','Tickets não encontrado');
			redirect('estacionar');
		}else{



         $estacionar_tempo_decorrido = str_replace('.', '', $this->input->post('estacionar_tempo_decorrido'));
			
			//Quando tempo for maior que 15 min, torna obrigatório selecionar pagamento!
          if($estacionar_tempo_decorrido > '015'){
              $this->form_validation->set_rules('estacionar_forma_pagamento_id', 'Forma de pagamento', 'required');
          }
			
			 		 if($this->form_validation->run()) {

			 		$data = elements(
					array(
						'estacionar_valor_devido',
						'estacionar_forma_pagamento_id',
						'estacionar_tempo_decorrido',
					), $this->input->post()

				);
               
        if($estacionar_tempo_decorrido <= '015'){

        	$data['estacionar_forma_pagamento_id'] = 9; //forma de pagamento gratis
        }
            $data['estacionar_data_saida'] = date('Y-m-d H:i:s');
            $data['estacionar_status'] = 1; // Encerrando tickes de estacionamento

               $data = $this->security->xss_clean($data);
				$data = html_escape($data);

				$this->core_model->update('estacionar', $data, array('estacionar_id' => $estacionar_id));
				redirect('estacionar');

                  ///depois vamos criar método imprimir

							# code...
			 		/*echo '<pre>';
					print_r($this->input->post());
					exit();*/

						}else{
							//Erro de validação
			$data =  array(
			'titulo' => ' Encerrando Tickets',
				'text_modal' => ' Tem certeza que deseja encerrar esse Tickets?',
			
				'scripts' => array(
				'plugins/mask/jquery.mask.min.js',
				'plugins/mask/custom.js',
				'plugins/select2/dist/js/select2.min.js',
				'plugins/select2/dist/js/select2.min.js',
				'js/estacionar/custom.js',
				
			),

	'estacionado' => $this->core_model->get_by_id('estacionar', array('estacionar_id' => $estacionar_id)), 
	'precificacoes' => $this->core_model->get_all('precificacoes', array('precificacao_ativa' => 1)), 
	'formas_pagamentos' => $this->core_model->get_all('formas_pagamentos', array('forma_pagamento_ativa' => 1)), 
	);

	/*		echo '<pre>';
			print_r($data['estacinados']);
			exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('estacionar/edit');
		$this->load->view('layout/footer');

			} 			
		}
	}


/*	public function edit($estacionar_id = NULL){

		//verifica no banco se existe algum vendedor //
		if(!$estacionar_id || !$this->core_model->get_by_id('estacionar', array('estacionar_id' => $estacionar_id))){
			$this->session->set_flashdata('error','Tickets não encontrado');
			redirect('estacionar');
		}else{
			$this->load->view('layout/header', $data);
		$this->load->view('estacionar/edit');
		$this->load->view('layout/footer');



	}
}*/
}