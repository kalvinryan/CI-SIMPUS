<?php

class Dashboard extends CI_Controller {

	public function index()
	{
		$data['title'] = 'SIMPUS';
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard/index');
		$this->load->view('templates/footer');
	}
	public function datapus()
	{
		$data['title'] = 'Data Puskesmas';
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard/datapus');
		$this->load->view('templates/footer');
	}
	public function poli()
	{
		$data['title'] = 'Poli Pelayanan';
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard/poli');
		$this->load->view('templates/footer');
	}
	public function kamar()
	{
		$data['title'] = 'Poli Pelayanan';
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard/kamar');
		$this->load->view('templates/footer');
	}
	public function jadwal()
	{
		$data['title'] = 'Poli Pelayanan';
		$this->load->view('templates/header',$data);
		$this->load->view('dashboard/jadwal');
		$this->load->view('templates/footer');
    }
}