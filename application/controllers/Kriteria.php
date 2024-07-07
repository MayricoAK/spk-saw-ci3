<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelkriteria');
        $this->load->helper('url_helper');
    }

    public function index()
    {
        $data['itemkriteria'] = $this->Modelkriteria->getkriteria();
        $this->load->view('header');
        $this->load->view('kriteria', $data);
        $this->load->view('footer');
    }

    public function simpanrekordbaru()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('namakriteria', 'Nama Kriteria', 'required');

        if ($this->form_validation->run() === FALSE) {
            $this->load->view('header');
            $this->load->view('kriteria');
            $this->load->view('footer');
        } else {
            $this->Modelkriteria->simpankanrekordbarunya();
            redirect('kriteria');
        }
    }

    public function hapus($id)
    {
        $iddihapus = $this->security->xss_clean($id);
        $this->db->where('idkriteria', $iddihapus);
        $this->db->delete('kriteria');
        redirect('kriteria');
    }

    public function koreksi($id)
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $this->form_validation->set_rules('idkriteria', 'Id Kriteria', 'required');
        $this->form_validation->set_rules('namakriteria', 'Nama Kriteria', 'required');

        if ($this->form_validation->run() === FALSE) {
            $data['itemkriteria'] = $this->Modelkriteria->getkriteria($id);
            $this->load->view('header');
            $this->load->view('koreksikriteria', $data);
            $this->load->view('footer');
        } else {
            $this->Modelkriteria->simpanrekordkoreksinya();
            redirect('kriteria');
        }
    }

	public function bobot()
	{
		$this->load->helper('form');
		$this->load->library('form_validation');
	
		// Check if form is submitted
		if ($this->input->post()) {
			$idkriteria = $this->input->post('idkriteria');
			$jeniskriteria = $this->input->post('jeniskriteria');
			$bobotharapan = $this->input->post('bobotharapan');
	
			// Hitung total bobot
			$totalBobot = array_sum($bobotharapan);
	
			if ($totalBobot > 100) {
				$this->session->set_flashdata('error', 'Total bobot preferensi tidak dapat melebihi 100');
			} else {
				foreach ($idkriteria as $index => $id) {
					$data = array(
						'jeniskriteria' => $jeniskriteria[$index],
						'bobotpreferensi' => $bobotharapan[$index]
					);
					$this->Modelkriteria->simpanbobotkriteria($id, $data);
				}
				$this->session->set_flashdata('success', 'Bobot kriteria berhasil disimpan');
			}
		}
	
		// Load view bobotkriteria.php
		$data['itemkriteria'] = $this->Modelkriteria->getkriteria();
		$this->load->view('header');
		$this->load->view('bobotkriteria', $data);
		$this->load->view('footer');
	}

    public function hapusall()
    {
        $this->db->truncate('kriteria');
        redirect('kriteria');
    }
}

?>
