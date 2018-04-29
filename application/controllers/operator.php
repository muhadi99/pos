<?php
/**
* 
*/
class Operator extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_operator');
		chek_session();
	}
	
	function index()
	{
		$this->load->library('pagination');

		$config['base_url'] = base_url().'index.php/operator/index/';
		$config['total_rows'] = $this->model_operator->tampildata()->num_rows();
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman==''?0:$halaman;
		$data['record']= $this->model_operator->tampilkan_data_paging($halaman,$config['per_page']);
		//$this->load->view('operator/lihat_data',$data);
		$this->template->load('template','operator/lihat_data',$data);

	}

	function post()
	{
		if(isset($_POST['submit'])){
			//proses data operator
			//$this->model_kategori->post();
			$nama = $this->input->post('nama',true);
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			$data = array('nama_lengkap'=>$nama,'username'=>$username,'password'=>md5($password));
			$this->db->insert('operator',$data);
			redirect('operator');
		}
		else{
			//$this->load->view('operator/form_input');
			$this->template->load('template','operator/form_input');

		}
	}

	function edit()
	{
		if(isset($_POST['submit'])){
			//proses update data operator
			$id = $this->input->post('id',true);	
			$nama = $this->input->post('nama',true);
			$username = $this->input->post('username',true);
			$password = $this->input->post('password',true);
			if (empty($password)) {
				$data = array('nama_lengkap'=>$nama,'username'=>$username);
			}
			else{
				$data = array('nama_lengkap'=>$nama,'username'=>$username,'password'=>md5($password));
			}
			$this->db->where('operator_id',$id);
			$this->db->update('operator',$data);
			redirect('operator');
		}
		else{
			$id= $this->uri->segment(3);
			$data['record']= $this->model_operator->get_one($id)->row_array();
			//$this->load->view('operator/form_edit',$data);
			$this->template->load('template','operator/form_edit',$data);

		}
	}

	function delete()
	{
		$id = $this->uri->segment(3);
		$this->db->where('operator_id',$id);
		$this->db->delete('operator');
		redirect('operator');
	}
}