<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Produksi_model', 'produksi');
        $data['po'] = $this->produksi->produksi();
        $data['formulasi'] = $this->db->get('tb_formulasi')->result_array();



        $data["judul"] = 'Data PO Production';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produksi/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Produksi_model', 'produksi');
        $data['po'] = $this->produksi->produksi();
        $data['formulasi'] = $this->db->get('tb_formulasi')->result_array();

        $this->form_validation->set_rules('name', 'name', 'required');
        $this->form_validation->set_rules('customer', 'customer', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New PO';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produksi/add', $data);
            $this->load->view('templates/footer');
        } else {
            $nama = $this->input->post('name');
            $db = $this->db->get_where('tb_formulasi', ['name' => $nama])->result_array();
            foreach ($db as $db) :
                $id = $db['id'];
            endforeach;
            $data = [
                'id_formulasi' => $id,
                'customer' => $this->input->post('customer'),
                'qty' => $this->input->post('qty'),
                'date' => date('d / m / y')
            ];
            $this->db->insert('tb_po_produksi', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Name Color Added!</div>');
            redirect('produksi');
        }
    }


    public function delete($id)
    {
        $this->db->delete('tb_po_produksi', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Purchase Order success</div>');
        redirect('produksi');
    }

    public function edit($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["po"] = $this->db->get_where('tb_po_produksi', ['id' => $id])->result_array();

        $this->db->select('tb_po_produksi.id_formulasi');
        $this->db->where('id', $id);
        $id_name = $this->db->get('tb_po_produksi')->row_array();

        $this->db->select('tb_formulasi.name');
        $this->db->where('id', $id_name['id_formulasi']);
        $data['name'] = $this->db->get('tb_formulasi')->row_array();

        $this->form_validation->set_rules('id_formulasi', 'id_formulasi', 'required');
        $this->form_validation->set_rules('customer', 'customer', 'required');
        $this->form_validation->set_rules('qty', 'qty', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit ';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('produksi/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'id_formulasi' => $this->input->post('id_formulasi'),
                'customer' => $this->input->post('customer'),
                'qty' => $this->input->post('qty'),
                'date' => date('d / m / y')
            ];

            $this->db->update('tb_po_produksi', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">PO Success Update</div>');
            redirect('produksi');
        }
    }

    public function detail($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["po"] = $this->db->get_where('tb_po_produksi', ['id' => $id])->result_array();

        $this->db->select('tb_po_produksi.id_formulasi');
        $this->db->where('id', $id);
        $id_name = $this->db->get('tb_po_produksi')->row_array();

        $this->db->select('tb_formulasi.name');
        $this->db->where('id', $id_name['id_formulasi']);
        $data['name'] = $this->db->get('tb_formulasi')->row_array();

        $this->db->select('tb_formulasi_isi.id');
        $this->db->where('id_name', $id_name['id_formulasi']);
        $data['id_isi'] = $this->db->get('tb_formulasi_isi')->row_array();

        foreach ($data['id_isi'] as $idi) :
            $data['isi'] = $this->db->get_where('tb_formulasi_isi', ['id' => $idi])->result_array();
        endforeach;

        foreach ($data['po'] as $po) :
            $jumlah = $po['qty'];
            foreach ($data['isi'] as $i) :
                $qty_a = $i['qty_a'];
                $qty_b = $i['qty_b'];
                $qty_c = $i['qty_c'];
                $qty_d = $i['qty_d'];
                $qty_e = $i['qty_e'];
                $qty_f = $i['qty_f'];
                $qty_g = $i['qty_g'];
            endforeach;
        endforeach;

        $data['total_a'] = $qty_a * $jumlah / 100;
        $data['total_b'] = $qty_b * $jumlah / 100;
        $data['total_c'] = $qty_c * $jumlah / 100;
        $data['total_d'] = $qty_d * $jumlah / 100;
        $data['total_e'] = $qty_e * $jumlah / 100;
        $data['total_f'] = $qty_f * $jumlah / 100;
        $data['total_g'] = $qty_g * $jumlah / 100;
        $data['total_spr'] = $data['total_a'] + $data['total_b'] + $data['total_c'] + $data['total_d'] + $data['total_e'] + $data['total_f'] + $data['total_g'];

        $data["judul"] = 'SURAT  PERINTAH PRODUKSI';
        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('produksi/spr', $data);
        $this->load->view('templates/footer');
    }

    public function print($id)
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["po"] = $this->db->get_where('tb_po_produksi', ['id' => $id])->result_array();

        $this->db->select('tb_po_produksi.id_formulasi');
        $this->db->where('id', $id);
        $id_name = $this->db->get('tb_po_produksi')->row_array();

        $this->db->select('tb_formulasi.name');
        $this->db->where('id', $id_name['id_formulasi']);
        $data['name'] = $this->db->get('tb_formulasi')->row_array();

        $this->db->select('tb_formulasi_isi.id');
        $this->db->where('id_name', $id_name['id_formulasi']);
        $data['id_isi'] = $this->db->get('tb_formulasi_isi')->row_array();

        foreach ($data['id_isi'] as $idi) :
            $data['isi'] = $this->db->get_where('tb_formulasi_isi', ['id' => $idi])->result_array();
        endforeach;

        foreach ($data['po'] as $po) :
            $jumlah = $po['qty'];
            foreach ($data['isi'] as $i) :
                $qty_a = $i['qty_a'];
                $qty_b = $i['qty_b'];
                $qty_c = $i['qty_c'];
                $qty_d = $i['qty_d'];
                $qty_e = $i['qty_e'];
                $qty_f = $i['qty_f'];
                $qty_g = $i['qty_g'];
            endforeach;
        endforeach;

        $data['total_a'] = $qty_a * $jumlah / 100;
        $data['total_b'] = $qty_b * $jumlah / 100;
        $data['total_c'] = $qty_c * $jumlah / 100;
        $data['total_d'] = $qty_d * $jumlah / 100;
        $data['total_e'] = $qty_e * $jumlah / 100;
        $data['total_f'] = $qty_f * $jumlah / 100;
        $data['total_g'] = $qty_g * $jumlah / 100;
        $data['total_spr'] = $data['total_a'] + $data['total_b'] + $data['total_c'] + $data['total_d'] + $data['total_e'] + $data['total_f'] + $data['total_g'];

        $data["judul"] = 'SURAT  PERINTAH PRODUKSI';
        $this->load->view('templates/header', $data);
        $this->load->view('produksi/print', $data);
        $this->load->view('templates/footer');
    }
}
