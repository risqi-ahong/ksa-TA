<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
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

        $data["menu"] = $this->db->get('user_menu')->result_array();

        $data["judul"] = 'Menu Management';

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }

    public function addMenu()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["menu"] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New Menu';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }

    public function delete($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Menu success</div>');
        redirect('menu');
    }

    public function edit($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["menu"] = $this->db->get_where('user_menu', ['id' => $id])->result_array();


        $this->form_validation->set_rules('id', 'Id', 'required');
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Menu';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('menu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->update('user_menu', ['menu' => $this->input->post('menu')], ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Menu Success Update</div>');
            redirect('menu');
        }
    }
}
