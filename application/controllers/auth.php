<?php
/**
* 
*/
class Auth extends CI_Controller
{
	function __construct(){
			parent::__construct();
			$this->load->model('model_operator');
	}	
	function login()
	{
		if (isset($_POST['submit'])) 
		{
			//proses input login disini
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$hasil = $this->model_operator->login($username,$password);
			//echo $hasil;
			if ($hasil==1) {
				//update login disini
				$this->db->where('username',$username);
				$this->db->update('operator',array('last_login'=>date('Y-m-d')));

				$this->session->set_userdata(array('status_login'=>'OKE','username'=>$username));
				redirect('dashboard');
			}else{
				redirect('auth/login');
			}
		}
		else
		{
			//$this->load->view('form_login');
			chek_session_login();
			$this->template->load('template_login','form_login');	
		}
		
	}

	function logout(){
		//session_destroy();  //bawaan php
		$this->session->sess_destroy(); //bawaan CI
		redirect('auth/login');
	}
}