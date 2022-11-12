<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Troliin_model extends CI_Model
{
    public function import_data($datatroliin)
    {
        $jumlah = count($datatroliin);
        if ($jumlah > 0) {
            $this->db->replace('db_troliin', $datatroliin);
        }
    }

    public function getDataTroliin($tanggalawal = null, $tanggalakhir = null)
    {
        $tanggalawalbaru = strtotime($tanggalawal);
        $tanggalakhirbaru = strtotime($tanggalakhir);
        if ($tanggalawal && $tanggalakhir) {
            $this->db->where('date_created >=', $tanggalawalbaru);
            $this->db->where('date_created <=', $tanggalakhirbaru);
        }
        return $this->db->get('db_troliin')->result_array();
    }
    public function getTroliinById($id)
    {
        return $this->db->get_where('troliin', ['id' => $id])->row_array();
    }
    public function hapusDataTroliin($id)
    {
        // $this->db->where('id', $id);
        $this->db->delete('db_troliin',['id'=>$id]);    
    }

}