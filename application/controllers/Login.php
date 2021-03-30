<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Login extends CI_Controller {


	public function index()
	{

     $data = array(

		'titulo' => 'Login',

     );
/*
     echo '<pre>';
     print_r($data['usuarios']);
     exit();
*/

			$this->load->view('layout/header', $data);
			$this->load->view('login/index');
			
	   }

public function auth(){
               
		$identity = $this->security->xss_clean($this->input->post('email'));
	    	$password = $this->security->xss_clean($this->input->post('password'));
	    	$remember = FALSE; // remember the user
	    	
	    	 //'<pre>';
            //    print_r($this->input->post());
                //exit();

		   if($this->ion_auth->login($identity, $password, $remember)){

		   	$usuario = $this->core_model->get_by_id('users', array('email' => $identity));
		   	$this->session->set_flashdata('sucesso','Seja muito bem vindo(a) ' . $usuario->first_name);

		   		redirect('/');

		    }else{
		    	
	    	$this->session->set_flashdata('error','Usuário ou senha não encontrado.');

			redirect('login');
	   }

		
		
	}

	public function logout(){
		   $this->ion_auth->logout();
		   redirect('login');

	}
	
}