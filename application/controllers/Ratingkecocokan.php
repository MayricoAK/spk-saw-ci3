<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Ratingkecocokan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelratingkecocokan');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['itemratingkecocokan'] = $this->Modelratingkecocokan->getratingkecocokan();
        $data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
        $data['pilidalternatif'] = $this->Modelratingkecocokan->getpilihanalternatif();
        $this->load->view('header');
        $this->load->view('ratingkecocokan', $data);
        $this->load->view('footer');
    }

    public function simpankriteria()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namakriteria', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobotpreferensi', 'Bobot Preferensi', 'required|numeric|greater_than[0]|less_than_equal_to[1]');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header');
            $this->load->view('kriteria');
            $this->load->view('footer');
        } else {
            $data = array(
                'namakriteria' => $this->input->post('namakriteria'),
                'bobotpreferensi' => $this->input->post('bobotpreferensi'),
                'jeniskriteria' => $this->input->post('jeniskriteria')
            );

            if ($this->Modelratingkecocokan->simpankriteria($data)) {
                $this->session->set_flashdata('success', 'Kriteria berhasil disimpan');
            } else {
                $this->session->set_flashdata('error', 'Total bobot preferensi melebihi 1.0');
            }
            redirect('ratingkecocokan');
        }
    }

    public function updatekriteria($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namakriteria', 'Nama Kriteria', 'required');
        $this->form_validation->set_rules('bobotpreferensi', 'Bobot Preferensi', 'required|numeric|greater_than[0]|less_than_equal_to[1]');

        if ($this->form_validation->run() === FALSE) {
            $data['itemkriteria'] = $this->Modelratingkecocokan->getkriteria($id);
            $this->load->view('header');
            $this->load->view('editkriteria', $data);
            $this->load->view('footer');
        } else {
            $data = array(
                'namakriteria' => $this->input->post('namakriteria'),
                'bobotpreferensi' => $this->input->post('bobotpreferensi'),
                'jeniskriteria' => $this->input->post('jeniskriteria')
            );

            if ($this->Modelratingkecocokan->updatekriteria($id, $data)) {
                $this->session->set_flashdata('success', 'Kriteria berhasil diperbarui');
            } else {
                $this->session->set_flashdata('error', 'Total bobot preferensi melebihi 1.0');
            }
            redirect('ratingkecocokan');
        }
    }

    public function hapusratingkecocokan($id)
    {
        $iddihapus = html_escape($this->security->xss_clean($id));
        $this->db->where('idrating', $iddihapus);
        $this->db->delete('ratingkecocokan');
        redirect('ratingkecocokan');
    }
    
    public function koreksiratingkecocokan($id)
{
    $this->load->helper('form');
    $this->load->library('form_validation');

    $this->form_validation->set_rules('idkriteria', 'Id Kriteria', 'required');
    $this->form_validation->set_rules('idalternatife', 'Id Alternatif', 'required');
    $this->form_validation->set_rules('nilairating', 'Nilai Rating', 'required|numeric');

    if ($this->form_validation->run() === FALSE) {
        $idrating = html_escape($this->security->xss_clean($id));
        $data['itemratingkecocokan'] = $this->Modelratingkecocokan->getratingkecocokan($idrating);
        $data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
        $data['pilidalternatif'] = $this->Modelratingkecocokan->getpilihanalternatif();
        $this->load->view('header');
        $this->load->view('koreksiratingkecocokan', $data);
        $this->load->view('footer');
    } else {
        $idkriteria = $this->input->post('idkriteria');
        $idalternatife = $this->input->post('idalternatife');
        $nilairating = $this->input->post('nilairating');
        $namakriteria = $this->Modelratingkecocokan->getnamakriteria($idkriteria);

        $this->Modelratingkecocokan->simpanhasilkoreksiratingkecocokan($id, $idkriteria, $idalternatife, $nilairating);
        redirect('Ratingkecocokan');
    }
}
    
    public function buatratingkecocokanbaru()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');
    
        $this->form_validation->set_rules('idkriteria', 'Id Kriteria', 'required');
        $this->form_validation->set_rules('idalternatife', 'Id Alternatif', 'required');
        $this->form_validation->set_rules('nilairating', 'Nilai Rating', 'required');
    
        if ($this->form_validation->run() === FALSE) {
            $data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
            $data['pilidalternatif'] = $this->Modelratingkecocokan->getpilihanalternatif();
            $this->load->view('header');
            $this->load->view('buatratingkecocokanbaru', $data);
            $this->load->view('footer');
        } else {
            $idkriteria = $this->input->post('idkriteria');
            $nilairating = $this->input->post('nilairating');
    
            // Cek jika kriteria adalah hafalan Al-Qur'an
            if ($idkriteria == 'kriteria_hafalan_alquran') {  // ganti 'kriteria_hafalan_alquran' dengan id kriteria hafalan Al-Qur'an sebenarnya
                $nilairating = $nilairating / 30;
            }
    
            $this->Modelratingkecocokan->simpanrekordratingkecocokan($idkriteria, $nilairating);
            redirect('ratingkecocokan');
        }
    }    

    public function hapusall()
    {
        $this->db->truncate('ratingkecocokan');
        redirect('ratingkecocokan');
    }
}
?>
