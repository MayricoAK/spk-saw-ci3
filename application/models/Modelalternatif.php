<?php
class Modelalternatif extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }
        public function getalternatif($idalternatife = FALSE)
        {
        if ($idalternatife === FALSE)
        {
                $this->db->order_by('idalternatife','desc');
                $query = $this->db->get('alternatif');
                return $query->result_array();
        }
        $query = $this->db->get_where('alternatif', array('idalternatife' => $idalternatife));
        return $query->row_array();
        }
        
        public function simpankanrekordbarunya()
        {
            $this->load->helper('url');
            $data = array(
               'namaalternatif' => html_escape($this->security->xss_clean($this->input->post('namaalternatif')))
            );
            return $this->db->insert('alternatif', $data);
        }

        public function simpanrekordkoreksinya()
        {
            $this->load->helper('url');
            $id=htmlentities($this->security->xss_clean($this->input->post('idalternatife')));
            $data = array(
               'namaalternatif' => html_escape($this->security->xss_clean($this->input->post('namaalternatif')))
            );
            $this->db->where('idalternatife', $id);
            return $this->db->update('alternatif', $data);
        }

        public function updateNilaiPreferensi($idalternatife, $nilaipreferensi)
        {
            $this->db->where('idalternatife', $idalternatife);
            $this->db->update('alternatif', array('nilaipreferensi' => $nilaipreferensi));
        }

}
