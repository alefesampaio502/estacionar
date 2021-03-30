<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Precificacoes extends CI_Controller {
     public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }

	}



	public function index(){

		$data =  array(

			'titulo' => ' Listagem de precificacões',
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


		'precificacoes' => $this->core_model->get_all('precificacoes'), // get all users
	);
/*
	echo '<pre>';
	print_r($data['precificacoes']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('precificacoes/index');

		$this->load->view('layout/footer');
	}

public function add(){


				//$this->form_validation->set_rules('precificacao_categoria','','trim|required|min_length[1]|max_length[145]|callback_check_nome_marca');

			$this->form_validation->set_rules('precificacao_categoria','Categoria','trim|required|min_length[1]|max_length[50]|is_unique[precificacoes.precificacao_categoria]');
			$this->form_validation->set_rules('precificacao_valor_hora','Valor da hora','trim|required|max_length[50]');
			$this->form_validation->set_rules('precificacao_valor_mensalidade','valor da mensalidade','trim|required|max_length[20]');
			$this->form_validation->set_rules('precificacao_numero_vagas','Número de vagas','trim|required');
			$this->form_validation->set_rules('precificacao_ativa','Situação','trim');
			

			//Execulte a validação
			if($this->form_validation->run()){

				

				//exit('validado');

				$data = elements(
					array(
						'precificacao_categoria',
						'precificacao_valor_hora',
						'precificacao_valor_mensalidade',
						'precificacao_numero_vagas',
						'precificacao_ativa',
						
						


					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);

				
					/*echo '<pre>';
					print_r($data['precificacoes']);
					exit();*/

				$this->core_model->insert('precificacoes', $data);
				redirect('precificacoes');


			}else{

				$data =  array(

			'titulo' => ' Cadastro de precificacões',
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

			// não usamos em cadatros  somente em edição 
			//'precificacoes' => $this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id)),
		//'precificacoes' => $this->core_model->get_all('precificacoes'), // get all users
	);

	/*echo '<pre>';
	print_r($data['precificacoes']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('precificacoes/edit');
		$this->load->view('layout/footer');

			}
}





	public function edit($precificacao_id = NULL ){
      
      //verifica no banco se existe algum vendedor //
		if(!$precificacao_id || !$this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id))){
			$this->session->set_flashdata('error','Precificacões não encontrado');
			redirect('precificacoes');
		}else{

				//$this->form_validation->set_rules('precificacao_categoria','','trim|required|min_length[1]|max_length[145]|callback_check_nome_marca');

			$this->form_validation->set_rules('precificacao_categoria','Categoria','trim|required|min_length[1]|max_length[50]');
			$this->form_validation->set_rules('precificacao_valor_hora','Valor da hora','trim|required|max_length[50]');
			$this->form_validation->set_rules('precificacao_valor_mensalidade','valor da mensalidade','trim|required|max_length[20]');
			$this->form_validation->set_rules('precificacao_numero_vagas','Número de vagas','trim|required');
			$this->form_validation->set_rules('precificacao_ativa','Situação','trim');
			

			//Execulte a validação
			if($this->form_validation->run()){

				$precificacao_ativa = $this->input->post('precificacao_ativa');

					if($precificacao_ativa == 0){

						if($this->db->table_exists('estacionar')){
 if($this->core_model->get_by_id('estacionar', array('estacionar_precificacao_id' => $precificacao_id, 'estacionar_status' => 0))){

 	$this->session->set_flashdata('error','ATENÇÂO : Essa categoria estar sendo utilizada em <i class="fas fa-parking mr-2"></i>Estacionar!');

		    redirect('precificacoes');


 							}

						}


					}
				
		if($precificacao_ativa == 0){

		if($this->db->table_exists('mensalidades')){
 if($this->core_model->get_by_id('mensalidades', array('mensalidade_precificacao_id' => $precificacao_id, 'mensalidade_status' => 0))){

 	$this->session->set_flashdata('error','ATENÇÂO : Essa categoria estar sendo utilizada em <i class="fas fa-hand-holding-usd mr-2"></i>mensalidades !');

		    redirect('precificacoes');


 						}

						}


					}

				//exit('validado');

				$data = elements(
					array(
						'precificacao_categoria',
						'precificacao_valor_hora',
						'precificacao_valor_mensalidade',
						'precificacao_numero_vagas',
						'precificacao_ativa',
						
						


					), $this->input->post()

				);

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);

				
					/*echo '<pre>';
					print_r($data['precificacoes']);
					exit();*/

				$this->core_model->update('precificacoes', $data, array('precificacao_id' => $precificacao_id));
				redirect('precificacoes');


			}else{

				$data =  array(

			'titulo' => ' Listagem de precificacões',
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

			'precificacoes' => $this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id)),
		//'precificacoes' => $this->core_model->get_all('precificacoes'), // get all users
	);

/*	echo '<pre>';
	print_r($data['precificacoes']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('precificacoes/edit');
		$this->load->view('layout/footer');

			}

}

}

	public function del($precificacao_id = NULL){

				if(!$precificacao_id || !$this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id))){
			$this->session->set_flashdata('error','Precificacões não encontrado');
			redirect('precificacoes');
		}

        if($this->core_model->get_by_id('precificacoes', array('precificacao_id' => $precificacao_id, 'precificacao_ativa' => 1))){
		    $this->session->set_flashdata('error','ATENÇÂO : Não foi possível excluir essa categoria pois ela está na situação de ativa !');

		    redirect('precificacoes');
          }

	/*	echo '<pre>';
	print_r('Se não tiver habilitado some a categoria');
	exit();
*/
		$this->core_model->delete('precificacoes', array('precificacao_id' => $precificacao_id));
			redirect('precificacoes');

		
	}


}