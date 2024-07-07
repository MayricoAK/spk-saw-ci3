<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Saw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelsaw');
		$this->load->model('Modelratingkecocokan');
        $this->load->helper('url_helper');
    }
	public function index()
	{
		$this->load->view('header');
		//hitungratingkecocokan dan tampilkan hasilnya
		$this->Modelsaw->hitungratingkecocokan();
		$data['itemratingkecocokan'] = $this->Modelratingkecocokan->getratingkecocokan();
        $data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
        $data['pilidatribut'] = $this->Modelratingkecocokan->getpilihanatribut();
		$data['normalisasi'] = $this->Modelsaw->get_normalisasi();

        $this->load->view('normalisasi', $data);
		$this->load->view('footer');
	}
	public function hasil()
	{
		$data['itemratingkecocokan'] = $this->Modelratingkecocokan->getratingkecocokan();
        $data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
        $data['pilidatribut'] = $this->Modelratingkecocokan->getpilihanatribut();
		$data['rangking']=$this->Modelsaw->lakukanperangkingan();
		
		$this->load->view('header');
		$this->load->view('hasil',$data);
		$this->load->view('footer');
	}
}