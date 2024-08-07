<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengguna extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelpengguna');
        $this->load->model('Modelkriteria');
		$this->load->model('Modelalternatif');
        $this->load->helper('url_helper');
    }
    public function index()
    {
        $data['itempengguna'] = $this->Modelpengguna->getpengguna();

        $this->load->view('header');
        $this->load->view('register', $data);
        $this->load->view('footer');
        // redirect('Welcome/dashboard');
    }
    public function logout()
    {
        $_SESSION = array();

        session_destroy();

        redirect('welcome');
    }

    public function cekpengguna()
    {
        $data = $this->Modelpengguna->cekpengguna();
        if (empty($data)) {
            $dt['pesannya'] = "Anda gagal login !";
            $this->load->view('login', $dt);
        } else {
            $_SESSION['_userid'] = $data['idpengguna'];
            // Alihkan pengguna ke halaman dashboard setelah berhasil login
            redirect('welcome/dashboard');
        }
    }

    public function simpanrekordbaru()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idpengguna', 'Id Pengguna', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasipassword', 'Password Confirmation', 'required|matches[password]');

        if ($this->form_validation->run() === FALSE) {
            $data['itempengguna'] = $this->Modelpengguna->getpengguna();
            $this->load->view('header');
            $this->load->view('pengguna', $data);
            $this->load->view('footer');
        } else {
            $this->Modelpengguna->simpankanrekordbarunya();
            redirect('pengguna');
        }
    }
    public function hapus($id)
    {
        $iddihapus = html_escape($this->security->xss_clean($id));
        $this->db->where('idpengguna', $iddihapus);
        $this->db->delete('pengguna');
        redirect('pengguna');
    }
    public function koreksi($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
        $data['itempengguna'] = $this->Modelpengguna->getpengguna($id);

        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('konfirmasipassword', 'Password Confirmation', 'required|matches[password]');


        if ($this->form_validation->run() === FALSE) {

            $this->load->view('header');
            $this->load->view('koreksipengguna', $data);
            $this->load->view('footer');
        } else {
            $this->Modelpengguna->simpanrekordkoreksinya();
            redirect('pengguna');
        }
    }
}
