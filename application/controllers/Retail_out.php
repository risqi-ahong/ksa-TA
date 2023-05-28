<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Retail_out extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('RetailWarehouse_model', 'out_item');
        $data['out_item'] = $this->out_item->Retail_out();
        $data["judul"] = 'Transaksi Retail Out';
        
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('retail_out/index', $data);
        $this->load->view('templates/footer');
    }

    public function add_out()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $data['kd_barang'] = $this->db->get('tb_barang_gk')->result_array();

        $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');
        $this->form_validation->set_rules('detail', 'detail', 'required');

        if ($this->form_validation->run() == false) {
            $data["judul"] = 'Out Item';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('retail_in/add_in', $data);
            $this->load->view('templates/footer');
        } else {
            // ambil stok barang

            // proses tambah barang
            // $in = $this->input->post('qty');
            // $jumlah_stok = $in + $stok;

            $barang_masuk = $this->input->post('qty');
            $data = [
                'id_barang' => $this->input->post('id_barang'),
                'satuan' => $this->input->post('satuan'),
                'qty' => $this->input->post('qty'),
                'detail' => $this->input->post('detail'),
                'date' => date(' d / m / y')
            ];

            $id_barang = $this->input->post('id_barang');
            $this->db->select('tb_barang_gk.stok_barang');
            $this->db->where('id', $id_barang);
            $stok = $this->db->get('tb_barang_gk')->row_array();
            $hasil = $stok['stok_barang'] - $this->input->post('qty');

            $this->db->insert('tb_barang_keluar_gk', $data);
            $this->db->where('id', $id_barang);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang_gk');

            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Out Item Added!</div>');
            redirect('retail_out');
        }
    }

    public function delete_out($id)
    {

        $this->db->select('tb_barang_keluar_gk.qty');
        $this->db->where('id', $id);
        $qty = $this->db->get('tb_barang_keluar_gk')->row_array();

        $this->db->select('tb_barang_keluar_gk.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_keluar_gk')->row_array();

        $this->db->select('tb_barang_gk.stok_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $stok = $this->db->get('tb_barang_gk')->row_array();
        $hasil = $stok['stok_barang'] + $qty['qty'];


        $this->db->where('id', $id_barang['id_barang']);
        $this->db->set('stok_barang', $hasil);
        $this->db->update('tb_barang_gk');

        $this->db->delete('tb_barang_keluar_gk', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Out Item Success</div>');
        redirect('retail_out');
    }

    public function edit_out($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok_in"] = $this->db->get_where('tb_barang_keluar_gk', ['id' => $id])->result_array();
        $data['kd_barang'] = $this->db->get('tb_barang_gk')->result_array();
        
        $this->db->select('tb_barang_keluar_gk.id_barang');
        $this->db->where('id', $id);
        $id_barang = $this->db->get('tb_barang_keluar_gk')->row_array();

        $this->db->select('tb_barang_gk.kode_barang');
        $this->db->where('id', $id_barang['id_barang']);
        $data['kode'] = $this->db->get('tb_barang_gk')->row_array();
        
        $this->form_validation->set_rules('id', 'id', 'required');
        // $this->form_validation->set_rules('id_barang', 'id_barang', 'required');
        $this->form_validation->set_rules('satuan', 'satuan', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Item In';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('retail_out/edit_out', $data);
            $this->load->view('templates/footer');
        } else {
            $id_barang = $this->input->post('id_barang');
            
            $data = [
                'id_barang' => $id_barang,
                'satuan' => $this->input->post('satuan'),
                'qty' => $this->input->post('qty'),
                'detail' => $this->input->post('detail'),
                'date' => date(' d / m / y')
            ];
            $this->db->select('tb_barang_gk.stok_barang');
            $this->db->where('id', $id_barang);
            $stok = $this->db->get('tb_barang_gk')->row_array();
            
            $this->db->select('tb_barang_keluar_gk.qty');
            $this->db->where('id', $id);
            $qty = $this->db->get('tb_barang_keluar_gk')->row_array();
            
            $stok_update = $this->input->post('qty');
            
            $hasil = $stok['stok_barang'] + $qty['qty'] - $stok_update;
            
            $this->db->where('id', $id_barang);
            $this->db->set('stok_barang', $hasil);
            $this->db->update('tb_barang_gk');
            $this->db->update('tb_barang_keluar_gk', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Out Item Success Update</div>');
            redirect('retail_out');
        
        }
    }
}
