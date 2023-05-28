<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formula extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['formulasi'] = $this->db->get('tb_formulasi')->result_array();
        $data["judul"] = 'Data Formulasi';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('formula/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["formulasi"] = $this->db->get('tb_formulasi')->result_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('customer', 'customer', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New Formulasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('formula/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'customer' => $this->input->post('customer'),
                'date_create' => date('d / m / y')
            ];
            $this->db->insert('tb_formulasi', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Name Color Added!</div>');
            redirect('formula');
        }
    }

    public function add_isi($id)
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["formulasi"] = $this->db->get_where('tb_formulasi', ['id' => $id])->result_array();


        $this->form_validation->set_rules('item_a', 'item_a', 'required');
        $this->form_validation->set_rules('qty_a', 'qty_a', 'required');
        $this->form_validation->set_rules('item_b', 'item_b', 'required');
        $this->form_validation->set_rules('qty_b', 'qty_b', 'required');
        $this->form_validation->set_rules('item_c', 'item_c', 'required');
        $this->form_validation->set_rules('qty_c', 'qty_c', 'required');
        $this->form_validation->set_rules('item_d', 'item_d', 'required');
        $this->form_validation->set_rules('qty_d', 'qty_d', 'required');
        $this->form_validation->set_rules('item_e', 'item_e', 'required');
        $this->form_validation->set_rules('qty_e', 'qty_e', 'required');
        $this->form_validation->set_rules('item_f', 'item_f', 'required');
        $this->form_validation->set_rules('qty_f', 'qty_f', 'required');
        $this->form_validation->set_rules('item_g', 'item_g', 'required');
        $this->form_validation->set_rules('qty_g', 'qty_g', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add Formulasi';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('formula/add_isi', $data);
            $this->load->view('templates/footer');
        } else {
            $total = $this->input->post('qty_a') + $this->input->post('qty_b') + $this->input->post('qty_c') + $this->input->post('qty_d') + $this->input->post('qty_e') + $this->input->post('qty_f') + $this->input->post('qty_g');
            if ($total == 100) {

                $data = [
                    'id_name' => $id,
                    'item_a' => $this->input->post('item_a'),
                    'qty_a' => $this->input->post('qty_a'),
                    'item_b' => $this->input->post('item_b'),
                    'qty_b' => $this->input->post('qty_b'),
                    'item_c' => $this->input->post('item_c'),
                    'qty_c' => $this->input->post('qty_c'),
                    'item_d' => $this->input->post('item_d'),
                    'qty_d' => $this->input->post('qty_d'),
                    'item_e' => $this->input->post('item_e'),
                    'qty_e' => $this->input->post('qty_e'),
                    'item_f' => $this->input->post('item_f'),
                    'qty_f' => $this->input->post('qty_f'),
                    'item_g' => $this->input->post('item_g'),
                    'qty_g' => $this->input->post('qty_g'),
                    'total' => $total
                ];
                // var_dump($data);
                // die;
                $this->db->insert('tb_formulasi_isi', $data);
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Formulasi Added!</div>');
                redirect('formula');
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Total Formulasi Not 100! Please Check Formulasi</div>');
                redirect('formula');
            }
        }
    }

    public function delete($id)
    {
        $this->db->delete('tb_formulasi', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Stok success</div>');
        redirect('formula');
    }

    public function delete_isi($id)
    {
        $this->db->delete('tb_formulasi_isi', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Item Formulasi Success</div>');
        redirect('formula');
    }



    public function edit($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["formula"] = $this->db->get_where('tb_formulasi', ['id' => $id])->result_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('customer', 'customer', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('formula/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'name' => $this->input->post('name'),
                'customer' => $this->input->post('customer'),
                'date_create' => date('d / m / y')
            ];

            $this->db->update('tb_formulasi', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Formulasi Success Update</div>');
            redirect('formula');
        }
    }

    public function edit_isi($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["formula_isi"] = $this->db->get_where('tb_formulasi_isi', ['id' => $id])->result_array();

        $this->form_validation->set_rules('item_a', 'item_a', 'required');
        $this->form_validation->set_rules('qty_a', 'qty_a', 'required');
        $this->form_validation->set_rules('item_b', 'item_b', 'required');
        $this->form_validation->set_rules('qty_b', 'qty_b', 'required');
        $this->form_validation->set_rules('item_c', 'item_c', 'required');
        $this->form_validation->set_rules('qty_c', 'qty_c', 'required');
        $this->form_validation->set_rules('item_d', 'item_d', 'required');
        $this->form_validation->set_rules('qty_d', 'qty_d', 'required');
        $this->form_validation->set_rules('item_e', 'item_e', 'required');
        $this->form_validation->set_rules('qty_e', 'qty_e', 'required');
        $this->form_validation->set_rules('item_f', 'item_f', 'required');
        $this->form_validation->set_rules('qty_f', 'qty_f', 'required');
        $this->form_validation->set_rules('item_g', 'item_g', 'required');
        $this->form_validation->set_rules('qty_g', 'qty_g', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Item';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('formula/edit_isi', $data);
            $this->load->view('templates/footer');
        } else {
            $total = $this->input->post('qty_a') + $this->input->post('qty_b') + $this->input->post('qty_c') + $this->input->post('qty_d') + $this->input->post('qty_e') + $this->input->post('qty_f') + $this->input->post('qty_g');
            if ($total == 100) {
                $data = [
                    'id_name' => $this->input->post('id_name'),
                    'item_a' => $this->input->post('item_a'),
                    'qty_a' => $this->input->post('qty_a'),
                    'item_b' => $this->input->post('item_b'),
                    'qty_b' => $this->input->post('qty_b'),
                    'qty_c' => $this->input->post('qty_c'),
                    'item_d' => $this->input->post('item_d'),
                    'item_c' => $this->input->post('item_c'),
                    'qty_d' => $this->input->post('qty_d'),
                    'item_e' => $this->input->post('item_e'),
                    'qty_e' => $this->input->post('qty_e'),
                    'item_f' => $this->input->post('item_f'),
                    'qty_f' => $this->input->post('qty_f'),
                    'item_g' => $this->input->post('item_g'),
                    'qty_g' => $this->input->post('qty_g'),
                    'total' => $total
                ];

                $this->db->update('tb_formulasi_isi', $data, ['id' => $this->input->post('id')]);
                $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Formulasi Success Update</div>');
                redirect('formula');
            } else {
                $this->session->set_flashdata('massage', '<div class="alert alert-danger" role="alert">Total Formulasi not 100! Please check formulasi</div>');
                redirect('formula');
            }
        }
    }

    public function detail($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["formulasi_isi"] = $this->db->get_where('tb_formulasi_isi', ['id_name' => $id])->result_array();
        $data["formulasi"] = $this->db->get_where('tb_formulasi', ['id' => $id])->result_array();

        $data["judul"] = 'Detail Formulasi';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('formula/detail', $data);
        $this->load->view('templates/footer');
    }
}
