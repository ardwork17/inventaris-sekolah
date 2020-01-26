<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->db->get('data_barang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function profile()
    {
        $data['title'] = 'Profile';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/profile', $data);
        $this->load->view('templates/footer');
    }

    public function barang()
    {
        $data['title'] = 'Data Barang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->db->get('data_barang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/barang', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {

        $data['title'] = 'Tambah Data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_aksi()
    {
        $nama_barang  = $this->input->post('nama_barang');
        $jumlah_barang  = $this->input->post('jumlah_barang');
        $kondisi  = $this->input->post('kondisi');
        $harga  = $this->input->post('harga');
        $keterangan  = $this->input->post('keterangan');

        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'kondisi' => $kondisi,
            'harga' => $harga,
            'keterangan' => $keterangan,
            'pembelian' => time()
        );

        $this->m_barang->tambah_data($data, 'data_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Tambah Data</div>');
        redirect('admin/barang');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->m_barang->hapus($where, 'data_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
        Berhasil Hapus Data</div>');
        redirect('admin/barang');
    }

    public function edit($id)
    {

        $where = array('id' => $id);
        $data['admin'] = $this->m_barang->edit_data($where, 'data_barang')->result();

        $data['title'] = 'Edit data';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data()
    {
        $id = $this->input->post('id');
        $nama_barang = $this->input->post('nama_barang');
        $jumlah_barang = $this->input->post('jumlah_barang');
        $kondisi = $this->input->post('kondisi');
        $harga = $this->input->post('harga');
        $keterangan = $this->input->post('keterangan');

        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'kondisi' => $kondisi,
            'harga' => $harga,
            'keterangan' => $keterangan
        );

        $where = array(
            'id' => $id
        );

        $this->m_barang->update_data($where, $data, 'data_barang');
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in" role="alert">
        Berhasil Update Data</div>');
        redirect('admin/barang');
    }

    public function peminjaman()
    {
        $data['title'] = 'Peminjaman Barang';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['admin'] = $this->db->get('data_pinjam')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/peminjaman', $data);
        $this->load->view('templates/footer');
    }

    public function pinjam()
    {
        $data['title'] = 'Barang Yang Dipinjam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/pinjam', $data);
        $this->load->view('templates/footer');
    }

    public function tambah_pinjam()
    {
        $nama_barang  = $this->input->post('nama_barang');
        $jumlah_barang  = $this->input->post('jumlah_barang');
        $status  = $this->input->post('status');
        $keterangan  = $this->input->post('keterangan');

        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'waktu' => time(),
            'status' => $status,
            'keterangan' => $keterangan
        );

        $this->m_barang->tambah_data_pinjam($data, 'data_pinjam');
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
        Berhasil Tambah Data</div>');
        redirect('admin/peminjaman');
    }
    public function edit_pinjam($id)
    {

        $where = array('id' => $id);
        $data['admin'] = $this->m_barang->edit_data_pinjam($where, 'data_pinjam')->result();

        $data['title'] = 'Edit Data Pinjam';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/edit_pinjam', $data);
        $this->load->view('templates/footer');
    }

    public function edit_data_pinjam()
    {
        $id = $this->input->post('id');
        $nama_barang  = $this->input->post('nama_barang');
        $jumlah_barang  = $this->input->post('jumlah_barang');
        $status  = $this->input->post('status');
        $keterangan  = $this->input->post('keterangan');

        $data = array(
            'nama_barang' => $nama_barang,
            'jumlah_barang' => $jumlah_barang,
            'waktu' => time(),
            'status' => $status,
            'keterangan' => $keterangan
        );

        $where = array(
            'id' => $id
        );

        $this->m_barang->update_data_pinjam($where, $data, 'data_pinjam');
        $this->session->set_flashdata('message', '<div class="alert alert-success fade-in" role="alert">
        Berhasil Update Data</div>');
        redirect('admin/peminjaman');
    }

    public function laporan()
    {
        $data['title'] = 'Laporan';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        // $data['admin'] = $this->db->get('data_barang')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('admin/laporan', $data);
        $this->load->view('templates/footer');
    }
}
