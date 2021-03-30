<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Mensalidades extends CI_Controller {
     public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }
                    
                    $this->load->model('mensalidades_model');

	}



	public function index(){

		$data =  array(

			'titulo' => ' Listagem de mensalidades',
			

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


		'mensalidades' => $this->mensalidades_model->get_all(), 
	);

	/*echo '<pre>';
	print_r($data['mensalidades']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('mensalidades/index');

		$this->load->view('layout/footer');
	}


public function add(){

	$this->form_validation->set_rules('mensalidade_mensalista_id','Mensalista','required');
	$this->form_validation->set_rules('mensalidade_precificacao_id','Categoria','required');
	$this->form_validation->set_rules('mensalidade_data_vencimento','Data de vencimento','required|callback_check_existe_mensalidade|callback_check_data_valida|callback_check_data_com_dia_vencimento');
			
		   
	if ($this->form_validation->run()){

					    		/*[mensalidade_mensalista_id] => 
							    [mensalidade_mensalista_dia_vencimento] => 
							    [mensalidade_precificacao_id] => 1 360.00
							    [mensalidade_valor_mensalidade] => 360.00
							    [mensalidade_data_vencimento] => 
							    [mensalidade_status] => 0
							    [mensalidade_mensalista_hidden_id] => 
							    [mensalidade_precificacao_hidden_id] => 1*/




/*

			echo '<pre>';
			print_r($this->input->post());
			exit();*/
			
	$data = elements(
		array(
			//'mensalidade_mensalista_id',
			'mensalidade_precificacao_id',
			'mensalidade_valor_mensalidade',
			'mensalidade_mensalista_dia_vencimento',
			'mensalidade_data_vencimento',
			'mensalidade_status',

		), $this->input->post()

	);


		$data['mensalidade_mensalista_id'] = strtoupper($this->input->post('mensalidade_mensalista_hidden_id'));
		$data['mensalidade_precificacao_id'] = strtoupper($this->input->post('mensalidade_precificacao_hidden_id'));
			

				        if ($data['mensalidade_status'] == 1) {
				        	$data['mensalidade_data_pagamento'] = date('Y-m-d H:i:s');
				        	
				        }

			
						$data = $this->security->xss_clean($data);
						$data = html_escape($data);
						$this->core_model->insert('mensalidades', $data);
						redirect('mensalidades');
						}else{

						$data =  array(

						'titulo' => ' Cadastro de  mensalidades',
						'texto_modal' => 'Os texto estão corretos? </br></br> Depois de salva só será possível altera a "Categoria" e a "Situação"',
						
						'styles' => array(
							
							'plugins/select2/dist/css/select2.min.css',

						),
						'scripts' => array(
							
							'plugins/mask/jquery.mask.min.js',
							'plugins/mask/custom.js',
							'plugins/select2/dist/js/select2.min.js',
							'js/men/mensalidades.js',
							'js/app.js'
						),

        'precificacoes' => $this->core_model->get_all('precificacoes', array('precificacao_ativa' => 1)), // get all users
        'mensalistas' => $this->core_model->get_all('mensalistas', array('mensalista_ativo' => 1)), // get all users
		
	);
/*
	echo '<pre>';
	print_r($data['mensalistas']);
	exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('mensalidades/edit');
		$this->load->view('layout/footer');
		
	}
}


public function edit($mensalidade_id = NULL ){
		if(!$mensalidade_id || !$this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id))){
			$this->session->set_flashdata('error', 'Mensalidades não foi encontrado');
				redirect('mensalidades');
			}else{

			$this->form_validation->set_rules('mensalidade_precificacao_id', 'Categoria', 'required');

		if ($this->form_validation->run()){
			
			$data = elements(
					array(
						'mensalidade_precificacao_id',
						'mensalidade_valor_mensalidade',
						'mensalidade_mensalista_dia_vencimento',
						'mensalidade_status',
					), $this->input->post()

				);


		$data['mensalidade_mensalista_id'] = strtoupper($this->input->post('mensalidade_mensalista_hidden_id'));
		$data['mensalidade_precificacao_id'] = strtoupper($this->input->post('mensalidade_precificacao_hidden_id'));
			

				        if ($data['mensalidade_status'] == 1) {
				        	$data['mensalidade_data_pagamento'] = date('Y-m-d H:i:s');
				        	
				        }

			
			//$data = $this->security->xss_clean($data);
				$data = html_escape($data);

		        $this->core_model->update('mensalidades', $data, array('mensalidade_id' => $mensalidade_id));
				redirect('mensalidades');
				}else{

			$data =  array(

			'titulo' => ' Editar mensalidades',
			'texto_modal' => 'Os texto estão corretos? </br></br> Depois de salva só será possível altera a "Categoria" e a "Situação"',
			
			'styles' => array(
				
				'plugins/select2/dist/css/select2.min.css',

			),
			'scripts' => array(
				
				'plugins/mask/jquery.mask.min.js',
				'plugins/mask/custom.js',
				'plugins/select2/dist/js/select2.min.js',
				'js/men/mensalidades.js',
				'js/app.js'
			),

        'precificacoes' => $this->core_model->get_all('precificacoes', array('precificacao_ativa' => 1)), // get all users
        'mensalistas' => $this->core_model->get_all('mensalistas', array('mensalista_ativo' => 1)), // get all users
		'mensalidade' => $this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id)),
		//'mensalidades' => $this->core_model->get_all(), // get all users
	);
/*
	echo '<pre>';
	print_r($data['mensalistas']);
	exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('mensalidades/edit');
		$this->load->view('layout/footer');

			
		}
				
		}

	}

//Exlusão 
	public function del($mensalidade_id = NULL){

				if(!$mensalidade_id || !$this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id))){
			$this->session->set_flashdata('error','Mensalidades não encontrado');
			redirect('mensalidades');
		}

        if($this->core_model->get_by_id('mensalidades', array('mensalidade_id' => $mensalidade_id, 'mensalidade_status' => 0))){
		    $this->session->set_flashdata('error','ATENÇÂO : Não foi possível excluir essa mensalidade  pois ela está na situação de Em aberto !');

		    redirect('mensalidades');
          }

	/*	echo '<pre>';
	print_r('Se não tiver habilitado some a categoria');
	exit();
*/
		$this->core_model->delete('mensalidades', array('mensalidade_id' => $mensalidade_id));
			redirect('mensalidades');

		
	}














	public function check_data_com_dia_vencimento($mensalidade_data_vencimento) {

        if ($mensalidade_data_vencimento) {

            $mensalidade_data_vencimento = explode('-', $mensalidade_data_vencimento);

            $mensalidade_mensalista_dia_vencimento = $this->input->post('mensalidade_mensalista_dia_vencimento');

            if ($mensalidade_data_vencimento[2] != $mensalidade_mensalista_dia_vencimento) {
                $this->form_validation->set_message('check_data_com_dia_vencimento', 'Esse campo deve conter o mesmo dia que o "Melhor dia de vencimento"');
                return FALSE;
            } else {
                return true;
            }
        } else {
            $this->form_validation->set_message('check_data_com_dia_vencimento', 'Campo obrigatório');
            return FALSE;
        }
    }

    public function check_existe_mensalidade($mensalidade_data_vencimento) {

        /* Recupera o post */
        $mensalidade_mensalista_id = $this->input->post('mensalidade_mensalista_hidden_id');

        /* Verifica no banco se há mensalidade já cadastrada para o mensalista e coma data passsados no post */
        $mensalidade_user = $this->core_model->get_by_id('mensalidades', array('mensalidade_mensalista_id' => $mensalidade_mensalista_id, 'mensalidade_data_vencimento' => $mensalidade_data_vencimento));

        if ($mensalidade_user) {

            /* Faz o explode da $mensalidade_data_vencimento do post */
            $mensalidade_data_vencimento_post = explode('-', $mensalidade_data_vencimento);


            /* Faz o explode da $mensalidade_data_vencimento vinda do banco */
            $mensalidade_data_vencimento_user = explode('-', $mensalidade_user->mensalidade_data_vencimento);



            if ($mensalidade_data_vencimento_post[0] == $mensalidade_data_vencimento_user[0] && $mensalidade_data_vencimento_post[1] == $mensalidade_data_vencimento_user[1]) {
                $this->form_validation->set_message('check_existe_mensalidade', 'Para o mensalista informado, já existe uma mensalidade para essa data');
                return FALSE;
            } else {
                return TRUE;
            }
        } else {
            return TRUE;
        }
    }

    public function check_data_valida($mensalidade_data_vencimento) {

        $data_atual = strtotime(date('Y-m-d'));

        $mensalidade_data_vencimento = strtotime($mensalidade_data_vencimento);

        /* Se a data de vencimento for menor que a data atual */
        if ($data_atual > $mensalidade_data_vencimento) {
            $this->form_validation->set_message('check_data_valida', 'A data de vencimento deve ser corrente ou futura');
            return FALSE;
        } else {
            return TRUE;
        }
    }
}
        
        
