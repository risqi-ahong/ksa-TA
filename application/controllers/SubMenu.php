<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubMenu extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Submenu_model', 'menu');

        $data["subMenu"] = $this->menu->getSubMenu();
        $data["menu"] = $this->db->get('user_menu')->result_array();
        
        $data["judul"] = 'Sub Menu Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('subMenu/index', $data);
        $this->load->view('templates/footer');
    }

    public function addSubMenu()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["menu"] = $this->db->get('user_menu')->result_array();

        $this->load->model('Submenu_model', 'menu');

        $data["subMenu"] = $this->menu->getSubMenu();

        $this->form_validation->set_rules('menu_id', 'menu', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Add New Sub Menu';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('subMenu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id'),
                'judul' => $this->input->post('judul'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('subMenu');
        }
    }

    public function editSubMenu($id)
    {

        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["subMenu"] = $this->db->get_where('user_sub_menu', ['id' => $id])->result_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('menu_id', 'menu_id', 'required');
        $this->form_validation->set_rules('judul', 'judul', 'required');
        $this->form_validation->set_rules('url', 'url', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');
        $this->form_validation->set_rules('is_active', 'is_active', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Edit Menu';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('subMenu/edit', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'menu_id' => $this->input->post('menu_id'),
                'judul' => $this->input->post('judul'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->update('user_sub_menu', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Sub Menu Success Update</div>');
            redirect('subMenu');
        }
    }

    public function DeleteSubMenu($id)
    {
        $this->db->delete('user_sub_menu', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete SubMenu success</div>');
        redirect('subMenu');
    }
}
