<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

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

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
	}
	public function index()
	{
		$data['title'] = 'SIMPUS';
		$this->load->view('templates/header',$data);
		$this->load->view('auth/login');
		$this->load->view('templates/footer');
	}

	public function registration()
	{
		$this->form_validation->set_rules('name','Name','required|trim');
		$this->form_validation->set_rules('email','Email','required|trim|valid_email|is_unique[user.email]',[
			'is_unique' => 'This email has already registred!'
		]);
		$this->form_validation->set_rules('password1','Password','required|trim|min_length[6]|matches[password2]',[
			'matches' => 'Password dont match!',
			'min_length' => 'Password too short!'
		]);
		$this->form_validation->set_rules('password2','Password','required|trim|matches[password1]');
		if($this->form_validation->run() == false)
		{
			$data['title'] = 'SIMPUS';
			$this->load->view('templates/header',$data);
			$this->load->view('auth/registration');
			$this->load->view('templates/footer');
		}else{
			$data = [
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'image' => 'Default.jpg',
				'password' => password_hash($this->input->post('password1'),PASSWORD_DEFAULT),
				'role_id' => 2,
				'is_active' =>1,
				'date_created' => time()
			];

			$this->db->insert('user',$data);
			$this->session->set_flashdata('message','<div class="alert alert-success" role="alert">Congrulation your account has been created. Please login!!</div>');
			redirect('auth');
		}
		
	}

	
}
