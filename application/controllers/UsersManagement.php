<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UsersManagement extends CI_Controller
{
    public function index()
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('Access_model', 'users');

        $data["user"] = $this->users->users();

        $data["judul"] = 'Users Management';

        $this->load->view('templates/header', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('usersManagement/index', $data);
        $this->load->view('templates/footer');
    }

    public function update($id)
    {
        $data["users"] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data["user"] = $this->db->get_where('users', ['id' => $id])->result_array();

        //id role
        $this->db->select('users.role_id');
        $this->db->where('id', $id);
        $role_id = $this->db->get('users')->row_array();
        $data["role"] = $role_id['role_id'];

        //role user
        $this->db->select('user_role.role_id');
        $this->db->where('id', $role_id['role_id']);
        $data["user_role"] = $this->db->get('user_role')->row_array();

        // $data['select']

        $data["role_id"] = $this->db->get_where('user_role')->result_array();

        $this->form_validation->set_rules('id', 'id', 'required');
        $this->form_validation->set_rules('username', 'username', 'required');
        $this->form_validation->set_rules('email', 'email', 'required');
        $this->form_validation->set_rules('role_id', 'role_id', 'required');

        if ($this->form_validation->run() == false) {

            $data["judul"] = 'Form Update Users';
            $this->load->view('templates/header', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('usersManagement/update', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('is_actived') === null) {
                $checkbox = 0;
            } else {
                $checkbox = 1;
            }
            $data = [
                'username' => $this->input->post('username'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
                'is_active' => $checkbox
            ];

            $this->db->update('users', $data, ['id' => $this->input->post('id')]);
            $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Users Success Update</div>');
            redirect('usersManagement/index');
        }
    }

    public function delete($id)
    {
        $this->db->delete('users', ['id' => $id]);
        $this->session->set_flashdata('massage', '<div class="alert alert-success" role="alert">Delete Users success</div>');
        redirect('usersManagement/index');
    }
}
