<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Atribut extends CI_Controller {
 public function __construct()
        {
                parent::__construct();
                $this->load->model('Modelatribut');
                $this->load->helper('url_helper');
        }
    public function index()
	{
        $data['itematribut'] = $this->Modelatribut->getatribut();
		$this->load->view('header');
        $this->load->view('atribut',$data);
        $this->load->view('footer');
	}
    public function simpanrekordbaru()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaatribut', 'Nama Atribut', 'required');

        if ($this->form_validation->run() === FALSE)
           {
               $this->load->view('header');
               $this->load->view('atribut');
               $this->load->view('footer');
            } else {
               $this->Modelatribut->simpankanrekordbarunya();
               redirect('atribut');
            }
    }
    public function hapus($id)
    {
       $iddihapus=$this->security->xss_clean($id);
       $this->db->where('idatribute', $iddihapus);
       $this->db->delete('atribut');
       redirect('atribut');
    }
    public function koreksi($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idatribute', 'Id atribut', 'required');
        $this->form_validation->set_rules('namaatribut', 'Nama atribut', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['itematribut'] = $this->Modelatribut->getatribut($id);
            $this->load->view('header');
            $this->load->view('koreksiatribut',$data);
            $this->load->view('footer');
        } else {
            $this->Modelatribut->simpanrekordkoreksinya();
            redirect('atribut');
        }
    }
	public function hapusall()
	{
		$this->db->truncate('atribut');
		redirect('Atribut');
	}
}
