<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $data["judul"] = 'Halaman Login';
            $this->load->view('templates/Login_header', $data);
            $this->load->view('login/index');
            $this->load->view('templates/Login_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->db->get_where('users', ['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    if ($user['role_id'] == 1) {
                        redirect('dashboard');
                    } else {
                        redirect('dashboard');
                    }
                } else {
                    $this->session->set_flashdata(
                        'massage',
                        '<div class="alert alert-danger" role="alert">
                        password wrong!
                        </div>'
                    );
                    redirect('login');
                }
            } else {
                $this->session->set_flashdata(
                    'massage',
                    '<div class="alert alert-danger" role="alert">
                    your account has not actived!
                    </div>'
                );
                redirect('login');
            }
        } else {
            $this->session->set_flashdata(
                'massage',
                '<div class="alert alert-danger" role="alert">
                Your email is not registed! please registered your account!
                </div>'
            );
            redirect('login');
        }
    }

    public function registration()
    {
        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules(
            'email',
            'Email',
            'required|trim|valid_email|is_unique[users.email]',
            [
                'is_unique' => 'This email has already registered'
            ]
        );
        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'matches' => 'password dont match!',
                'min_length' => 'Password to short!'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');


        if ($this->form_validation->run() == false) {
            $data["judul"] = 'Halaman Registration';
            $this->load->view('templates/Login_header', $data);
            $this->load->view('login/registration');
            $this->load->view('templates/Login_footer');
        } else {
            $data = [
                'username' => htmlspecialchars($this->input->post('username', true)),
                'email' => htmlspecialchars($this->input->post('email', true)),
                'image' => 'default.jpg',
                'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
                'role_id' => 2,
                'is_active' => 1,
                'date_create' => time()
            ];

            $this->db->insert('users', $data);
            $this->session->set_flashdata(
                'massage',
                '<div class="alert alert-success" role="alert">
            Congratulation! Your Account has been created. please login
          </div>'
            );
            redirect('login');
        }
    }
}
