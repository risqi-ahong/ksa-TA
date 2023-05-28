<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Users extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            redirect('login');
        }
    }

    public function index()
    {   
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['stok'] = $this->db->get('tb_barang')->result_array();
        $data["judul"] = 'Data Warehouse';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('dashboard/index', $data);
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
