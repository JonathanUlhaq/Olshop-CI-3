<?php

class Autentikasi extends CI_Controller
{
    public function index()
    {
        $this->load->view('Login/login');
    }

    public function register()
    {
        $this->load->view('Login/register');
    }

    public function back_login()
    {
        $this->load->view('Login/login');
    }

    public function process_register()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('passcom', 'Konfirmasi Password', 'required|matches[password]');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('Autentikasi/register');
        } else {
            $id = "US" . rand(1000, 10000);
            $data = [
                'username' => $this->input->post('username'),
                'nama' => $this->input->post('nama'),
                'password' => $this->input->post('password'),
                'id_user' => $id,
                'role' => 'User'

            ];

            if ($this->DataModel->registrasi($data) == true) {
                $this->session->set_flashdata('regis', 'Registrasi Berhasil');
                return redirect('Autentikasi/index');
            } else {
                $this->session->set_flashdata('errors', 'Username sudah terdaftar');
                return redirect('Autentikasi/register');
            }
        }
    }

    public function login_proccess()
    {
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
            return redirect('Autentikasi/index');
        } else {
            $data = [
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
            ];

            $role = $this->DataModel->role($data);
            if ($this->DataModel->login($data) == true) {
                if ($role['role'] == "Admin") {

                    $session_data = [
                        'username' => $this->input->post('username'),
                        'password' => $this->input->post('password'),
                        'id_user' => $role['id_user'],
                        'status' => 'login'
                    ];

                    $this->session->set_userdata($session_data);
                    redirect('Admin/table');
                }


                if ($role['role'] == "User") {
                    $session_data = [
                        'username' => $this->input->post('username'),
                        'nama' => $this->input->post('nama'),
                        'id_user' => $role['id_user'],
                        'status' => 'login'
                    ];

                    $this->session->set_userdata($session_data);
                    redirect('User/index');
                }
            } else {
                $this->session->set_flashdata('salah', 'Username atau password salah');
                redirect('Autentikasi/index');
            }
        }
    }

    public function logout()
    {
        session_destroy();
        $this->session->set_flashdata('logout', 'Berhasil Log Out');
        redirect('User/index');
    }
}
