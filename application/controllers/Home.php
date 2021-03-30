<?php
defined('BASEPATH') OR exit('Acesso não e permitido');

class Home extends CI_Controller {

	public function index(){
     
     $data = array(

     	'titulo' => 'Home'
     );


	$this->load->view('layout/header', $data);
		$this->load->view('home/index');
		$this->load->view('layout/footer');

	}
// var_dump($data);

/*	echo "string";'<pre>';
		print_r($data);
exit();
*/


}
