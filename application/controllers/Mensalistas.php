<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Mensalistas extends CI_Controller {
     public function __construct() {

		parent::__construct();

           if (!$this->ion_auth->logged_in()){
		    	$this->session->set_flashdata('info','Acesso não permitido!');
		      redirect('login');
		    }

	}



	public function index(){

		$data =  array(

			'titulo' => ' Listagem de Mensalistas',
			

			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
				'js/app.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'
				//'js/datatables.js'
			),


		'mensalistas' => $this->core_model->get_all('mensalistas'), // get all users
	);
/*
	echo '<pre>';
	print_r($data['mensalistas']);
	exit();
*/

		$this->load->view('layout/header', $data);
		$this->load->view('mensalistas/index');

		$this->load->view('layout/footer');
	}


			/*[mensalista_id] => 1
            [mensalista_data_cadastro] => 2020-03-13 19:00:02
            [mensalista_nome] => Lucio
            [mensalista_sobrenome] => Souza
            [mensalista_data_nascimento] => 2020-03-13
            [mensalista_cpf] => 359.731.420-19
            [mensalista_rg] => 334.44644-12
            [mensalista_email] => lucio@gmail.com
            [mensalista_telefone_fixo] => 
            [mensalista_telefone_movel] => (41) 9999-9999
            [mensalista_cep] => 80530-000
            [mensalista_endereco] => Rua de Curitiba
            [mensalista_numero_endereco] => 45
            [mensalista_bairro] => Centro
            [mensalista_cidade] => Curitiba
            [mensalista_estado] => PR
            [mensalista_complemento] => 
            [mensalista_ativo] => 1
            [mensalista_dia_vencimento] => 31
            [mensalista_obs] => 
            [mensalista_data_alteracao] => 2020-03-17 20:33:25
*/
public function edit($mensalista_id = NULL ){
	if(!$mensalista_id || !$this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id))){
		$this->session->set_flashdata('error', 'Mensalistas não foi encontrado');
		redirect('mensalistas');
	}else{

     
        /** @var type $mensalista_nome */
            if(!empty($mensalista_nome)){
	$this->form_validation->set_rules('mensalista_nome','nome','trim|required|min_length[1]|max_length[45]|callback_checke_mensalista_nome');
		}

	$this->form_validation->set_rules('mensalista_sobrenome','sobrenome','trim|required|min_length[1]|max_length[150]');
	$this->form_validation->set_rules('mensalista_cpf','CPF','trim|required|min_length[1]|max_length[30]|callback_checke_mensalista_cpf');
	$this->form_validation->set_rules('mensalista_rg','Rg','trim|required|min_length[1]|max_length[30]');
	$this->form_validation->set_rules('mensalista_email','Email','trim|required|min_length[1]|max_length[30]');
	$this->form_validation->set_rules('mensalista_telefone_fixo','Fone residencial','trim');
	$this->form_validation->set_rules('mensalista_telefone_movel','Celular','trim|required');
	$this->form_validation->set_rules('mensalista_cep','CEP','trim|required');
	$this->form_validation->set_rules('mensalista_endereco','Endereço','trim|required|max_length[155]');
	$this->form_validation->set_rules('mensalista_bairro','Bairro','trim|required');
	$this->form_validation->set_rules('mensalista_cidade','Cidade','trim|required');
	$this->form_validation->set_rules('mensalista_estado','UF','trim|required');
	$this->form_validation->set_rules('mensalista_complemento','','trim');
	$this->form_validation->set_rules('mensalista_ativo','Situação','trim|required');
	$this->form_validation->set_rules('mensalista_obs','obs','trim');
		
           
           //Execulte a validação
			if($this->form_validation->run()){

				//exit('validado');
			$mensalista_ativo = $this->input->post('mensalista_ativo');

					if($mensalista_ativo == 0){

						if($this->db->table_exists('mensalidades')){
 if($this->core_model->get_by_id('mensalidades', array('mensalidade_mensalista_id' => $mensalista_id, 'mensalidade_status' => 0))){

 	$this->session->set_flashdata('error','ATENÇÂO : existem  <i class="fas fa-hand-holding-usd mr-2"></i> mensalidadee em aberto para esse mensalista!');

		    redirect('mensalistas');


 							}

						}


					}

				$data = elements(
					array(
						'mensalista_nome',
						'mensalista_sobrenome',
						'mensalista_cpf',
						'mensalista_rg',
						'mensalista_email',
						'mensalista_telefone_fixo',
						'mensalista_telefone_movel',
						'mensalista_cep',
						'mensalista_endereco',
						'mensalista_bairro',
						'mensalista_cidade',
						'mensalista_estado',
						'mensalista_complemento',
						'mensalista_ativo',
						'mensalista_obs',
						
					), $this->input->post()

				);

                //Mudar UF para maisculas 
				$data['mensalista_estado'] = strtoupper($this->input->post('mensalista_estado'));

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);
                
					/*echo '<pre>';
					print_r($data);
					exit();
				*/
					

				$this->core_model->update('mensalistas', $data, array('mensalista_id' => $mensalista_id));
				redirect('mensalistas');


			}else{

				$data =  array(

			'titulo' => ' Editar mensalistas',
			
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

			'mensalistas' => $this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id)),
		//'precificacoes' => $this->core_model->get_all('precificacoes'), // get all users
	);
/*
	echo '<pre>';
	print_r($data['mensalistas']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('mensalistas/edit');
		$this->load->view('layout/footer');

			
		}

	}
}

    public function add(){
       
       
	$this->form_validation->set_rules('mensalista_nome','nome','trim|required|min_length[1]|max_length[45]|is_unique[mensalistas.mensalista_nome]');

	$this->form_validation->set_rules('mensalista_sobrenome','sobrenome','trim|required|min_length[1]|max_length[150]');
	$this->form_validation->set_rules('mensalista_cpf','CPF','trim|required|min_length[1]|max_length[30]|is_unique[mensalistas.mensalista_cpf]');
	$this->form_validation->set_rules('mensalista_rg','Rg','trim|required|min_length[1]|max_length[30]');
	$this->form_validation->set_rules('mensalista_email','Email','trim|required|min_length[1]|max_length[30]');
	$this->form_validation->set_rules('mensalista_telefone_fixo','Fone residencial','trim');
	$this->form_validation->set_rules('mensalista_telefone_movel','Celular','trim|required');
	$this->form_validation->set_rules('mensalista_cep','CEP','trim|required');
	$this->form_validation->set_rules('mensalista_endereco','Endereço','trim|required|max_length[155]');
	$this->form_validation->set_rules('mensalista_bairro','Bairro','trim|required');
	$this->form_validation->set_rules('mensalista_dia_vencimento','Dia de vencimentos','trim|integer|greater_than[0]|less_than[32]');
	
	$this->form_validation->set_rules('mensalista_numero_endereco','números','trim|required');
	$this->form_validation->set_rules('mensalista_cidade','Cidade','trim|required');
	$this->form_validation->set_rules('mensalista_estado','UF','trim|required');
	$this->form_validation->set_rules('mensalista_complemento','','trim');
	$this->form_validation->set_rules('mensalista_ativo','Situação','trim|required');
	$this->form_validation->set_rules('mensalista_obs','obs','trim|max_length[500]');
		
           
           //Execulte a validação
			if($this->form_validation->run()){
				//exit('validado');

		
				

				$data = elements(
					array(
						'mensalista_nome',
						'mensalista_sobrenome',
						'mensalista_cpf',
						'mensalista_rg',
						'mensalista_email',
						'mensalista_telefone_fixo',
						'mensalista_telefone_movel',
						'mensalista_cep',
						'mensalista_endereco',
						'mensalista_bairro',
						'mensalista_dia_vencimento',
						'mensalista_numero_endereco',
						'mensalista_cidade',
						'mensalista_estado',
						'mensalista_complemento',
						'mensalista_ativo',
						'mensalista_obs',
						
					), $this->input->post()

				);

				 //Mudar UF para maisculas 
				$data['mensalista_estado'] = strtoupper($this->input->post('mensalista_estado'));

				$data = $this->security->xss_clean($data);
				$data = html_escape($data);
                	

				$this->core_model->insert('mensalistas', $data);
				redirect('mensalistas');


			}else{

				$data =  array(

			'titulo' => ' Cadastrar mensalistas',
			
			'styles' => array(
				
				'plugins/datatables.net-bs4/css/dataTables.bootstrap4.min.css',

			),
			'scripts' => array(
				
				'plugins/datatables.net/js/jquery.dataTables.min.js',
				'plugins/datatables.net/js/estacionamento.js',
                                'js/app.js',
				'plugins/datatables.net-bs4/js/dataTables.bootstrap4.min.js',
				'plugins/datatables.net-responsive/js/dataTables.responsive.min.js',
				'plugins/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js'
				
			),

			
	);

/*	echo '<pre>';
	print_r($data['mensalistas']);
	exit();*/


		$this->load->view('layout/header', $data);
		$this->load->view('mensalistas/add');
		$this->load->view('layout/footer');

			
		}  
    
}


public function del($mensalista_id = NULL ){
	if(!$mensalista_id || !$this->core_model->get_by_id('mensalistas', array('mensalista_id' => $mensalista_id))){
		$this->session->set_flashdata('error', 'Mensalistas não foi encontrado');
		redirect('mensalistas');

		}else{

		$this->core_model->delete('mensalistas', array('mensalista_id' => $mensalista_id));
			redirect('mensalistas');

 }

}












 public function checke_mensalista_cpf($cpf) {

    	if ($this->input->post('mensalista_id')) {

    		$mensalista_id = $this->input->post('mensalista_id');

    		if ($this->core_model->get_by_id('mensalistas', array('mensalista_id !=' => $mensalista_id, 'mensalista_cpf' => $cpf))) {
    			$this->form_validation->set_message('checke_mensalista_cpf', 'Este CPF já existe');
    			return FALSE;
    		}
    	}

    	$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
        // Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
    	if (strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {

    		$this->form_validation->set_message('checke_mensalista_cpf', 'Por favor digite um CPF válido');
    		return FALSE;
    	} else {
            // Calcula os números para verificar se o CPF é verdadeiro
    		for ($t = 9; $t < 11; $t++) {
    			for ($d = 0, $c = 0; $c < $t; $c++) {
                    //$d += $cpf{$c} * (($t + 1) - $c); // Para PHP com versão < 7.4
                    $d += $cpf[$c] * (($t + 1) - $c); //Para PHP com versão < 7.4
                }
                $d = ((10 * $d) % 11) % 10;
                if ($cpf[$c] != $d) {
                	$this->form_validation->set_message('checke_mensalista_cpf', 'Por favor digite um CPF válido');
                	return FALSE;
                }
            }
            return TRUE;
        }
    }

    	public function checke_mensalista_nome($mensalista_nome){

		$mensalista_id = $this->input->post('mensalista_id');

		if($this->core_model->get_by_id('mensalistas', array('mensalista_nome' => $mensalista_nome, 'mensalista_id !=' => $mensalista_id))){

			$this->form_validation->set_message('checke_mensalista_nome','Esse nome já existe');

			return FALSE;

		}else{

			return TRUE;


		}

	}

}