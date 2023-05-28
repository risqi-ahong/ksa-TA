<?php
defined('BASEPATH') or exit('No direct script access allowed');

class BigWarehouse extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['stok'] = $this->db->get('tb_barang')->result_array();
        $data["judul"] = 'Data Warehouse';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('bigWarehouse/index', $data);
        $this->load->view('templates/footer');
    }

    public function addBarang()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok"] = $this->db->get('tb_barang')->result_array();

        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');
        $this->form_validation->set_rules('pack', 'pack', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New Stok';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bigWarehouse/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'stok_barang' => $this->input->post('stok_barang'),
                'kemasan' => $this->input->post('pack'),
                'satuan' => $this->input->post('unit')
            ];
            $this->db->insert('tb_barang', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Stok Added!</div>');
            redirect('bigWarehouse');
        }
    }

    public function deleteBarang($id)
    {
        $this->db->delete('tb_barang', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Stok success</div>');
        redirect('bigWarehouse');
    }

    public function editBarang($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok"] = $this->db->get_where('tb_barang', ['id' => $id])->result_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('kode_barang', 'kode_barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('pack', 'pack', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Stok';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('bigWarehouse/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'kode_barang' => $this->input->post('kode_barang'),
                'nama_barang' => $this->input->post('nama_barang'),
                'kemasan' => $this->input->post('pack'),
                'satuan' => $this->input->post('unit'),
                'stok_barang' => $this->input->post('stok_barang')
            ];

            $this->db->update('tb_barang', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Stok Success Update</div>');
            redirect('bigWarehouse');
        }
    }
}
