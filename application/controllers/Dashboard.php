<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["stok"] = $this->db->get('tb_barang')->num_rows();
        $data["po"] = $this->db->get('tb_po_produksi')->num_rows();
        $data["jumlah_users"] = $this->db->get('users')->num_rows();
        $data["formulasi"] = $this->db->get('tb_formulasi')->num_rows();
        $data["transaksi_masuk"] = $this->db->get('tb_barang_masuk')->num_rows();
        $data["transaksi_keluar"] = $this->db->get('tb_barang_keluar')->num_rows();
        $data["judul"] = 'Dashboard';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);

        if ($data['users']['role_id'] == 1) {
            $this->load->view('dashboard/index', $data);
        } else {
            if ($data['users']['role_id'] == 2) {
                $this->load->view('dashboard/index_gudang', $data);
            } else {
                if ($data['users']['role_id'] == 3) {
                    $this->load->view('dashboard/index_rnd', $data);
                }
            }
        }


        $this->load->view('templates/footer');
    }

    public function signout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');

        $this->session->set_flashdata(
            'massage',
            '<div class="alert alert-success" role="alert">
            You have been sign out!
      </div>'
        );
        redirect('login');
    }
}
