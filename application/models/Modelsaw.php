<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Modelsaw extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    public function hitungratingkecocokan()
{
    // Mengambil semua data kriteria
    $kriteriaQuery = $this->db->get('kriteria');
    $kriterias = $kriteriaQuery->result_array();

    foreach ($kriterias as $kriteria) {
        $idkriteria = $kriteria['idkriteria'];
        $jeniskriteria = $kriteria['jeniskriteria'];

        // Mengambil semua data rating kecocokan untuk kriteria tertentu
        $this->db->where('idkriteria', $idkriteria);
        $ratingQuery = $this->db->get('ratingkecocokan');
        $ratings = $ratingQuery->result_array();

        // Menghitung nilai normalisasi
        if ($jeniskriteria == 1) {
            // Cost criteria: normalisasi menggunakan nilai minimum
            $minValue = min(array_column($ratings, 'nilairating'));

            foreach ($ratings as $rating) {
                $nilaiNormalisasi = $minValue / $rating['nilairating'];

                // Update nilai normalisasi pada tabel ratingkecocokan
                $this->db->where('idrating', $rating['idrating']);
                $this->db->update('ratingkecocokan', ['nilainormalisasi' => $nilaiNormalisasi]);
            }
        } else {
            // Benefit criteria: normalisasi menggunakan nilai maksimum
            $maxValue = max(array_column($ratings, 'nilairating'));

            foreach ($ratings as $rating) {
                $nilaiNormalisasi = $rating['nilairating'] / $maxValue;

                // Update nilai normalisasi pada tabel ratingkecocokan
                $this->db->where('idrating', $rating['idrating']);
                $this->db->update('ratingkecocokan', ['nilainormalisasi' => $nilaiNormalisasi]);
            }
        }
    }
}


    // Metode untuk mengambil data normalisasi
    public function get_normalisasi()
    {
        $query = $this->db->get('ratingkecocokan');
        return $query->result_array();
    }

    // Metode untuk melakukan perangkingan
    public function lakukanperangkingan()
    {
        // Ambil data normalisasi dan bobot preferensi
        $this->db->select('kriteria.idkriteria, kriteria.bobotpreferensi, ratingkecocokan.idatribute, ratingkecocokan.nilainormalisasi');
        $this->db->from('kriteria');
        $this->db->join('ratingkecocokan', 'kriteria.idkriteria = ratingkecocokan.idkriteria');
        $query = $this->db->get();
        $result = $query->result_array();

        // Hitung nilai akhir
        $nilaiAkhir = array();
        foreach ($result as $row) {
            $idatribute = $row['idatribute'];
            $nilaiNormalisasi = $row['nilainormalisasi'];
            $bobotPreferensi = $row['bobotpreferensi'];

            if (!isset($nilaiAkhir[$idatribute])) {
                $nilaiAkhir[$idatribute] = 0;
            }

            $nilaiAkhir[$idatribute] += $nilaiNormalisasi * $bobotPreferensi;
        }

        // Ambil nama atribut
        $this->db->select('idatribute, namaatribut');
        $query = $this->db->get('atribut');
        $atributs = $query->result_array();
        $namaAtribut = array_column($atributs, 'namaatribut', 'idatribute');

        // Siapkan data rangking
        $rangking = array();
        foreach ($nilaiAkhir as $idatribute => $nilai) {
            $rangking[] = array(
                'idatribute' => $idatribute,
                'namaatribut' => $namaAtribut[$idatribute],
                'nilaiakhir' => $nilai
            );
        }

        // Urutkan rangking
        usort($rangking, function ($a, $b) {
            return $b['nilaiakhir'] <=> $a['nilaiakhir'];
        });

        return $rangking;
    }
}
?>
