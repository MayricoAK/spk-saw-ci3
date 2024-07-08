<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Saw extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Modelsaw');
		$this->load->model('Modelalternatif');
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
        $data['pilidalternatif'] = $this->Modelratingkecocokan->getpilihanalternatif();
		$data['normalisasi'] = $this->Modelsaw->get_normalisasi();

        $this->load->view('normalisasi', $data);
		$this->load->view('footer');
	}

	public function hasil()
	{
		$data['itemratingkecocokan'] = $this->Modelratingkecocokan->getratingkecocokan();
		$data['pilidkriteria'] = $this->Modelratingkecocokan->getpilihankriteria();
		$data['pilidalternatif'] = $this->Modelratingkecocokan->getpilihanalternatif();
		$data['rangking'] = $this->Modelsaw->lakukanperangkingan();

		// Tambahkan fungsi untuk menyimpan nilai akhir dari return lakukanperangkingan
		foreach ($data['rangking'] as $item) {
			$this->Modelalternatif->updateNilaiPreferensi($item['idalternatife'], $item['nilaiakhir']);
		}

		$this->load->view('header');
		$this->load->view('hasil', $data);
		$this->load->view('footer');
	}

}