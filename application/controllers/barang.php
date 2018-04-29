<?php
/**
* 
*/
class Barang extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('model_barang');
		chek_session();
	}
	
	function index()
	{
		//bawaan CI di pagination class
		$this->load->library('pagination');

		$config['base_url'] = base_url().'index.php/barang/index/';
		$config['total_rows'] = $this->model_barang->tampil_data()->num_rows();
		$config['per_page'] = 3;
		$this->pagination->initialize($config);
		$data['paging'] = $this->pagination->create_links();

		$halaman = $this->uri->segment(3);
		$halaman = $halaman==''?0:$halaman;
		$data['record']= $this->model_barang->tampilkan_data_paging($halaman,$config['per_page']);
		//$data['record']= $this->model_barang->tampil_data()->result();
		//$this->load->view('barang/lihat_data',$data);
		$this->template->load('template','barang/lihat_data',$data);
	}

	function post()
	{
		if(isset($_POST['submit'])){
			//proses barang
			$nama	= $this->input->post('nama_barang');
			$kategori	= $this->input->post('kategori');
			$harga	= $this->input->post('harga');
			$data 	= array('nama_barang'=>$nama,'kategori_id'=>$kategori,'harga'=>$harga);
			//print_r($data); //mengetes apakah datanya masuk ke database
			//die;
			$this->model_barang->post($data);
			redirect('barang');
		}
		else{
			$this->load->model('model_kategori');
			$data['kategori']=	$this->model_kategori->tampilkan_data()->result();
			//$this->load->view('barang/form_input',$data);
			$this->template->load('template','barang/form_input',$data);
		}
	}

	function view()
	{
		if(isset($_POST['submit'])){
			//proses barang
			$id 	= $this->input->post('id');
			$nama	= $this->input->post('nama_barang');
			$kategori	= $this->input->post('kategori');
			$harga	= $this->input->post('harga');
			//$data 	= array('nama_barang'=>$nama,'kategori_id'=>$kategori,'harga'=>$harga);
			//print_r($data); //mengetes apakah datanya masuk ke database
			die;
			$this->model_barang->update($data,$id);
			redirect('barang');
		}
		else{
			$id= $this->uri->segment(3);
			$this->load->model('model_kategori');
			$data['kategori']=	$this->model_kategori->tampilkan_data()->result();
			$data['record'] = $this->model_barang->get_one($id)->row_array();
			//$this->load->view('barang/form_lihat',$data);
			$this->template->load('template','barang/form_lihat',$data);
		}
	}

	function update()
	{
		if(isset($_POST['submit'])){
			//proses barang
			$id 	= $this->input->post('id');
			$nama	= $this->input->post('nama_barang');
			$kategori	= $this->input->post('kategori');
			$harga	= $this->input->post('harga');
			$data 	= array('nama_barang'=>$nama,'kategori_id'=>$kategori,'harga'=>$harga);
			//print_r($data); //mengetes apakah datanya masuk ke database
			//die;
			$this->model_barang->update($data,$id);
			redirect('barang');
		}
		else{
			$id= $this->uri->segment(3);
			$this->load->model('model_kategori');
			$data['kategori']=	$this->model_kategori->tampilkan_data()->result();
			$data['record'] = $this->model_barang->get_one($id)->row_array();
			//$this->load->view('barang/form_edit',$data);
			$this->template->load('template','barang/form_edit',$data);
		}
	}

	function delete()
	{
		$id= $this->uri->segment(3);
		$this->model_barang->delete($id);
		redirect('barang');
	}
}