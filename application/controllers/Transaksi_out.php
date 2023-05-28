<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Transaksi_out extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('BigWarehouse_model', 'out_item');
        $data['out_item'] = $this->out_item->WarehouseOut();
        $data["judul"] = 'Transaksi Out';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('transaksi_out/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_out()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['kd_barang'] = $this->db->get('tb_barang')->result_array();

        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add Out Item';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi_out/add_out', $data);
            $this->load->view('templates/footer');
        } else {

            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang.kemasan');
            $this->db->select('tb_barang.satuan');
            $this->db->where('id', $id_barang);
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
            $this->db->where('id', $id_barang);
            $stok = $this->db->get('tb_barang')->row_array();
            $hasil = $stok['stok_barang'] - $this->input->post('qty');
            $this->db->insert('tb_barang_keluar', $data);
            $this->db->where('id', $id_barang);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang');

            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Out Item Added!</div>');
            redirect('transaksi_out');
        }
    }

    public function delete_out($id)
    {
        $this->db->select('tb_barang_keluar.qty');
        $this->db->where('id', $id);
        $qty = $this->db->get('tb_barang_keluar')->row_array();

        $this->db->select('tb_barang_keluar.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_keluar')->row_array();

        $this->db->select('tb_barang.stok_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $stok = $this->db->get('tb_barang')->row_array();
        $hasil = $qty['qty'] + $stok['stok_barang'];


        $this->db->where('id', $id_barang['id_barang']);
        $this->db->set('stok_barang', $hasil);
        $this->db->update('tb_barang');

        $this->db->delete('tb_barang_keluar', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Out Item Success</div>');
        redirect('transaksi_out');
    }

    public function edit_out($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok_out"] = $this->db->get_where('tb_barang_keluar', ['id' => $id])->result_array();

        $this->db->select('tb_barang_keluar.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_keluar')->row_array();

        $this->db->select('tb_barang.kode_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $data['kode'] = $this->db->get('tb_barang')->row_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Item Out';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('transaksi_out/edit_out', $data);
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

            $this->db->select('tb_barang_keluar.qty');
            $this->db->where('id', $id);
            $qty = $this->db->get('tb_barang_keluar')->row_array();

            $stok_update = $this->input->post('qty');

            $hasil = $stok['stok_barang'] + $qty['qty'] - $stok_update;

            $this->db->where('id', $id_barang['id_barang']);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang');

            $this->db->update('tb_barang_keluar', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Out Item Success Update</div>');
            redirect('transaksi_out');
        }
    }
}
