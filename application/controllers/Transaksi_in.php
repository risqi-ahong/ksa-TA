<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_in extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('BigWarehouse_model', 'in_item');
        $data['in_item'] = $this->in_item->WarehouseIn();
        $data["judul"] = 'Transaksi In';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi_in/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_in()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kd_barang'] = $this->db->get('tb_barang')->result_array();


        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');

        if ($this->form_validation->run() == false) {
            $data["judul"] = 'In Item';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi_in/add_in', $data);
            $this->load->view('templates/footer');
        } else {
            // ambil stok barang

            // proses tambah barang
            // $in = $this->input->post('qty');
            // $jumlah_stok = $in + $stok;

            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang.kemasan');
            $this->db->select('tb_barang.satuan');
            $this->db->where('id', $id_barang);
            $kemasan = $this->db->get('tb_barang')->row_array();
            $satuan = $this->db->get('tb_barang')->row_array();
            $barang_masuk = $this->input->post('qty');
            $data = [
                'id_barang' => $this->input->post('id_barang'),
                'kemasan' => $satuan['kemasan'],
                'satuan' => $satuan['satuan'],
                'qty' => $this->input->post('qty'),
                'detail' => $this->input->post('detail'),
                'date' => date(' d / m / y')
            ];

            $this->db->select('tb_barang.stok_barang');
            $this->db->where('id', $id_barang);
            $stok = $this->db->get('tb_barang')->row_array();
            $hasil = $this->input->post('qty') + $stok['stok_barang'];

            $this->db->insert('tb_barang_masuk', $data);
            $this->db->where('id', $id_barang);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang');

            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New In Item Added!</div>');
            redirect('transaksi_in');
        }
    }

    public function delete_in($id)
    {

        $this->db->select('tb_barang_masuk.qty');
        $this->db->where('id', $id);
        $qty = $this->db->get('tb_barang_masuk')->row_array();

        $this->db->select('tb_barang_masuk.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_masuk')->row_array();

        $this->db->select('tb_barang.stok_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $stok = $this->db->get('tb_barang')->row_array();
        $hasil = $stok['stok_barang'] - $qty['qty'];


        $this->db->where('id', $id_barang['id_barang']);
        $this->db->set('stok_barang', $hasil);
        $this->db->update('tb_barang');

        $this->db->delete('tb_barang_masuk', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete In Item Success</div>');
        redirect('transaksi_in');
    }

    public function edit_in($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok_in"] = $this->db->get_where('tb_barang_masuk', ['id' => $id])->result_array();

        $this->db->select('tb_barang_masuk.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_masuk')->row_array();

        $this->db->select('tb_barang.kode_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $data['kode'] = $this->db->get('tb_barang')->row_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Item In';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi_in/edit_in', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->select('tb_barang.kemasan');
            $this->db->select('tb_barang.satuan');
            $this->db->where('id', $id_barang['id_barang']);
            $kemasan = $this->db->get('tb_barang')->row_array();
            $satuan = $this->db->get('tb_barang')->row_array();

            $data = [
                'id_barang' => $this->input->post('id_barang'),
                'kemasan' => $kemasan['kemasan'],
                'satuan' => $satuan['satuan'],
                'qty' => $this->input->post('qty'),
                'detail' => $this->input->post('detail'),
                'date' => date(' d / m / y')
            ];


            $this->db->select('tb_barang.stok_barang');
            $this->db->where('id', $id_barang['id_barang']);
            $stok = $this->db->get('tb_barang')->row_array();

            $this->db->select('tb_barang_masuk.qty');
            $this->db->where('id', $id);
            $qty = $this->db->get('tb_barang_masuk')->row_array();

            $stok_update = $this->input->post('qty');

            $hasil = $stok['stok_barang'] - $qty['qty'] + $stok_update;

            $this->db->where('id', $id_barang['id_barang']);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang');

            $this->db->update('tb_barang_masuk', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">In Item Success Update</div>');
            redirect('transaksi_in');
        }
    }
}
