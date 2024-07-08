<?php
class Modelratingkecocokan extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function getratingkecocokan($id = FALSE)
    {
        if ($id === FALSE) {
            $query = $this->db->get('ratingkecocokan');
            return $query->result_array();
        }

        $query = $this->db->get_where('ratingkecocokan', array('idrating' => $id));
        return $query->row_array();
    }

    public function getpilihankriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result_array();
    }

    public function getpilihanalternatif()
    {
        $query = $this->db->get('alternatif');
        return $query->result_array();
    }

    public function simpanrekordratingkecocokan()
    {
        $idkriteria = $this->input->post('idkriteria');
        $idalternatife = $this->input->post('idalternatife');
        $nilairating = $this->input->post('nilairating');

        // Cek apakah kombinasi idkriteria dan idalternatife sudah ada
        $this->db->where('idkriteria', $idkriteria);
        $this->db->where('idalternatife', $idalternatife);
        $query = $this->db->get('ratingkecocokan');

        if ($query->num_rows() > 0) {
            return FALSE; // Kombinasi sudah ada
        }

        $data = array(
            'idkriteria' => $idkriteria,
            'idalternatife' => $idalternatife,
            'nilairating' => $nilairating
        );

        return $this->db->insert('ratingkecocokan', $data);
    }

    public function simpanhasilkoreksiratingkecocokan()
    {
        $idrating = $this->input->post('idrating');
        $data = array(
            'idkriteria' => $this->input->post('idkriteria'),
            'idalternatife' => $this->input->post('idalternatife'),
            'nilairating' => $this->input->post('nilairating')
        );

        $this->db->where('idrating', $idrating);
        return $this->db->update('ratingkecocokan', $data);
    }

    // Metode untuk mendapatkan total bobot preferensi
    public function getTotalBobotPreferensi()
    {
        $this->db->select_sum('bobotpreferensi');
        $query = $this->db->get('kriteria');
        return $query->row()->bobotpreferensi;
    }

    // Metode untuk menyimpan kriteria baru
    public function simpankriteria($data)
    {
        $totalBobot = $this->getTotalBobotPreferensi() + $data['bobotpreferensi'];

        if ($totalBobot > 100) {
            return false;
        }

        return $this->db->insert('kriteria', $data);
    }

    // Metode untuk memperbarui kriteria
    public function updatekriteria($id, $data)
    {
        $currentBobot = $this->db->get_where('kriteria', ['idkriteria' => $id])->row()->bobotpreferensi;
        $totalBobot = $this->getTotalBobotPreferensi() - $currentBobot + $data['bobotpreferensi'];

        if ($totalBobot > 1.0) {
            return false;
        }

        return $this->db->update('kriteria', $data, ['idkriteria' => $id]);
    }
}
?>
