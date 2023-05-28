<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RetailWarehouse extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['stok'] = $this->db->get('tb_barang_gk')->result_array();
        
        $data["judul"] = 'Data Retaile Warehouse';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('retailWarehouse/index', $data);
        $this->load->view('templates/footer');
    }

    public function addBarang()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['kd_barang'] = $this->db->get('tb_barang')->result_array();


        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New Stok';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('retailWarehouse/add', $data);
            $this->load->view('templates/footer');
        } else {
            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang.kode_barang');
            $this->db->select('tb_barang.kemasan');
            $this->db->where('id',$id_barang);
            $kode_barang = $this->db->get('tb_barang')->row_array();
            $this->db->where('id',$id_barang);
            $kemasan = $this->db->get('tb_barang')->row_array();
            $permintaan = $this->input->post('stok_barang');
            $stok_gk = $kemasan['kemasan'] * $permintaan * 1000;

            $data = [
                'kode_barang' => $kode_barang['kode_barang'],
                'nama_barang' => $this->input->post('nama_barang'),
                'satuan' => $this->input->post('unit'),
                'stok_barang' => $this->input->post('stok_barang')
            ];

            $this->db->insert('tb_barang_gk', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Stok Added!</div>');
            redirect('retailWarehouse');
        }
    }

    public function deleteBarang($id)
    {
        $this->db->delete('tb_barang_gk', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Stok success</div>');
        redirect('retailWarehouse');
    }

    public function editBarang($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok"] = $this->db->get_where('tb_barang_gk', ['id' => $id])->result_array();
        $data['kd_barang'] = $this->db->get('tb_barang')->result_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('nama_barang', 'nama_barang', 'required');
        $this->form_validation->set_rules('unit', 'unit', 'required');
        $this->form_validation->set_rules('stok_barang', 'stok_barang', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Stok';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('retailWarehouse/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang.kode_barang');
            $this->db->where('id',$id_barang);
            $kode = $this->db->get('tb_barang')->row_array();

            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang_gk.kode_barang');
            $this->db->where('id',$id_barang);
            $kode_not = $this->db->get('tb_barang_gk')->row_array();

            if ($kode['kode_barang'] === null) {
                $data = [
                    'kode_barang' => $kode_not['kode_barang'],
                    'nama_barang' => $this->input->post('nama_barang'),
                    'satuan' => $this->input->post('unit'),
                    'stok_barang' => $this->input->post('stok_barang')
                ];
            $this->db->update('tb_barang_gk', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Stok Success Update</div>');
            redirect('retailWarehouse');
                
            } else {   
                $data = [
                    'kode_barang' => $kode['kode_barang'],
                    'nama_barang' => $this->input->post('nama_barang'),
                    'satuan' => $this->input->post('unit'),
                    'stok_barang' => $this->input->post('stok_barang')
                ];
                
                $this->db->update('tb_barang_gk', $data, ['id' => $this->input->post('id')]);
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Stok Success Update</div>');
                redirect('retailWarehouse');
            }
        }
    }
}
