<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserAccessMenu extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        $data["user"] = $this->db->get_where('user_access_menu')->result_array();


        $this->db->select('user_access_menu.*');
        $this->db->select('user_role.role_id');
        $this->db->select('user_menu.menu');
        $this->db->from('user_role');
        $this->db->join('user_access_menu', 'user_access_menu.role_id = user_role.id');
        $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        $data["userRole"] = $this->db->get()->result_array();

        $data["judul"] = 'Users Access Menu';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('userAccessMenu/index', $data);
        $this->load->view('templates/footer');
    }

    public function add()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();


        $data["user"] = $this->db->get_where('user_access_menu')->result_array();
        $data["role"] = $this->db->get_where('user_role')->result_array();
        $data["menu"] = $this->db->get_where('user_menu')->result_array();

        // $this->db->select('user_access_menu.*');
        // $this->db->select('user_role.role_id');
        // $this->db->select('user_menu.menu');
        // $this->db->from('user_role');
        // $this->db->join('user_access_menu', 'user_access_menu.role_id = user_role.id');
        // $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        // $data["userRole"] = $this->db->get()->result_array();

        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('menu', 'menu', 'required');

        if ($this->form_validation->run() == false) {
            # code...
            $data["judul"] = 'Add Users Access Menu';

            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('userAccessMenu/add', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'role_id' => $this->input->post('role'),
                'menu_id' => $this->input->post('menu')
            ];
            $this->db->insert('user_access_menu', $data);
            $this->session->set_flashdata('massage', '<div class = "alert alert-success" role = "alert">New Access Menu Added!</div>');
            redirect('userAccessMenu');
        }
    }

    public function update($id)
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["role"] = $this->db->get_where('user_role')->result_array();
        $data["menu"] = $this->db->get_where('user_menu')->result_array();

        $this->db->select('user_access_menu.*');
        $this->db->where('id', $id);
        $data["role_id"] = $this->db->get('user_access_menu')->result_array();

        $this->db->select('user_role.role_id');
        foreach ($data["role_id"] as $rid)
            $this->db->where('id', $rid['role_id']);
        $data["selected"] = $this->db->get('user_role')->result_array();

        $this->db->select('user_menu.menu');
        foreach ($data["role_id"] as $rid)
            $this->db->where('id', $rid['menu_id']);
        $data["selected_menu"] = $this->db->get('user_menu')->result_array();

        $this->db->select('user_access_menu.*');
        $this->db->select('user_role.*');
        $this->db->select('user_menu.*');
        $this->db->from('user_role');
        $this->db->join('user_access_menu', 'user_access_menu.role_id = user_role.id');
        $this->db->join('user_menu', 'user_menu.id = user_access_menu.menu_id');
        $data['userMenu'] = $this->db->get()->result_array();



        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('role', 'role', 'required');
        $this->form_validation->set_rules('menu', 'menu', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Form Update Users';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('userAccessMenu/update', $data);
            $this->load->view('templates/footer');
        } else {

            $data = [
                'role_id' => $this->input->post('role'),
                'menu_id' => $this->input->post('menu'),
            ];

            $this->db->update('user_access_menu', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Users Success Update</div>');
            redirect('userAccessMenu');
        }
    }

    public function delete($id)
    {
        $this->db->delete('user_access_menu', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Access success</div>');
        redirect('userAccessMenu');
    }

    public function menuAccess()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["userAccessMenu"] = $this->db->get_where('user_access_menu')->result_array();

        $data["judul"] = 'Users Access Menu';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('userAccessMenu/menuAccess', $data);
        $this->load->view('templates/footer');
    }
}
