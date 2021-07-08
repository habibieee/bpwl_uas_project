<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login_admin');
	}

	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
	}

	function aksi_login()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$where = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_login->cek_login("login", $where)->num_rows();
		if ($cek > 0) {
			echo "berhasil Login";
		} else {
			echo "Username dan password salah !";
		}
	}

	public function daftar()
	{
		$this->load->view('register_user');
	}

	public function aksi_daftar()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = array(
			'username' => $username,
			'password' => md5($password)
		);
		$cek = $this->m_login->insert_data("login", $data);
		if ($cek) {
			echo "USER Berhasil Tambah !";
		} else {
			echo "User Gagal Ditambahkan !";
		}
	}
}