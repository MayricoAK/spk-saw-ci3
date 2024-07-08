<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Alternatif extends CI_Controller {
 public function __construct()
        {
            parent::__construct();
            $this->load->model('Modelalternatif');
            $this->load->helper('url_helper');
        }
    public function index()
	{
        $data['itemalternatif'] = $this->Modelalternatif->getalternatif();
		$this->load->view('header');
        $this->load->view('alternatif',$data);
        $this->load->view('footer');
	}
    public function simpanrekordbaru()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namaalternatif', 'Nama Alternatif', 'required');

        if ($this->form_validation->run() === FALSE)
           {
               $this->load->view('header');
               $this->load->view('alternatif');
               $this->load->view('footer');
            } else {
               $this->Modelalternatif->simpankanrekordbarunya();
               redirect('alternatif');
            }
    }
    public function hapus($id)
    {
       $iddihapus=$this->security->xss_clean($id);
       $this->db->where('idalternatife', $iddihapus);
       $this->db->delete('alternatif');
       redirect('alternatif');
    }
    public function koreksi($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idalternatife', 'Id alternatif', 'required');
        $this->form_validation->set_rules('namaalternatif', 'Nama alternatif', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $data['itemalternatif'] = $this->Modelalternatif->getalternatif($id);
            $this->load->view('header');
            $this->load->view('koreksialternatif',$data);
            $this->load->view('footer');
        } else {
            $this->Modelalternatif->simpanrekordkoreksinya();
            redirect('alternatif');
        }
    }
	public function hapusall()
	{
		$this->db->truncate('alternatif');
		redirect('Alternatif');
	}
}
