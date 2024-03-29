<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Index
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Johannes Alexander Putra <johannesap@upi.edu>
 * @link      https://github.com/Itsjohanes
 * @param     ...
 * @return    ...
 *
 */

class Auth extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if ($this->session->userdata('email')) {
      redirect('Admin');
    } else {
      $data['title'] = 'Login';
      $this->load->view('auth_header', $data);
      $this->load->view('login');

      $this->load->view('auth_footer');
    }
  }


  public function login()
  {

    $email = $this->input->post('email');
    $password = $this->input->post('password');
    $user = $this->db->get_where('tb_akun', ['email' => $email])->row_array();
    if ($user) {
      //jika usernya aktif cek password
      if (password_verify($password, $user['password'])) {
        $data = [
          //role id 1 adalah admin
          'id' => $user['id_akun'],
          'email' => $user['email'],
          'nama' => $user['nama'],
          'aktif' => $user['aktif']
        ];
        if ($data['aktif'] == 0) {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
          Your account has not been activated!</div>');
          redirect('Auth');
        } else {
          $this->session->set_userdata($data);
          redirect('Admin');
        }
      } else {
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
                Wrong password!</div>');
        redirect('Auth');
      }
    } else {
      $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">
            Email is not registered!</div>');
      redirect('Auth');
    }
  }
  public function register()
  {
    $data['title'] = 'Register';
    $this->load->view('auth_header', $data);
    $this->load->view('register');
    $this->load->view('auth_footer');
  }
  public function registration()
  {
    //Register Data ke DB
    $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[tb_akun.email]', [
      'is_unique' => 'This email has already registered!'
    ]);
    $this->form_validation->set_rules('nama', 'Nama', 'required');

    $this->form_validation->set_rules('password1', 'Password', 'required|trim|min_length[3]|matches[password2]', [
      'matches' => 'Password dont match!',
      'min_length' => 'Password too short!'
    ]);
    $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

    if ($this->form_validation->run('registration') == false) {
      $data['title'] = 'Register';
      $this->load->view('auth_header', $data);
      $this->load->view('register');
      $this->load->view('auth_footer');
    } else {
      //data masuk ke db
      $data = [
        'email' => htmlspecialchars($this->input->post('email', true)),
        'nama' => htmlspecialchars($this->input->post('nama', true)),
        'password' => password_hash($this->input->post('password1'), PASSWORD_DEFAULT),
        'aktif' => 0,
      ];
      $this->db->insert('tb_akun', $data);
      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Congratulation! your account has been created. Please Login</div>');
      redirect('Auth');
    }
  }

  public function logout()
  {
    $this->session->unset_userdata('email');
    $this->session->unset_userdata('nama');
    $this->session->unset_userdata('aktif');
    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logged out!</div>');
    redirect('Auth');
  }
}


/* End of file Auth.php */
/* Location: ./application/controllers/Auth.php */