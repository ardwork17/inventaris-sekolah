<?php

class M_barang extends CI_Model
{
    // function tampil_data()
    // {
    //     return $this->db->get('data_barang');
    // }

    public function tambah_data($data, $table)
    {
        $this->db->insert($table, $data);
    }

    public function hapus($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function edit_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }
    public function tambah_data_pinjam($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_data_pinjam($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    public function update_data_pinjam($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_pinjam($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }
}
