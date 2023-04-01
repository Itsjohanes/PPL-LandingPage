<?php
defined('BASEPATH') or exit('No direct script access allowed');
// Don't forget include/define REST_Controller path

/**
 *
 * Controller Admin
 *
 * This controller for ...
 *
 * @package   CodeIgniter
 * @category  Controller CI
 * @author    Setiawan Jodi <jodisetiawan@fisip-untirta.ac.id>
 * @author    Raul Guerrero <r.g.c@me.com>
 * @link      https://github.com/setdjod/myci-extension/
 * @param     ...
 * @return    ...
 *
 */

class Admin extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $data['title'] = 'Home Admin';
      $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
      $data['jumlahAdmin'] = $this->db->get_where('tb_akun', ['aktif' => 1])->num_rows();
      $this->load->view('admin_header', $data);
      $this->load->view('admin_sidebar');
      $this->load->view('admin_topbar', $data);
      $this->load->view('admin_dashboard');
      $this->load->view('admin_footer');
    }
  }
  public function listAnggota()
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $data['title'] = 'List Anggota';
      $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
      $data['anggota'] = $this->db->get('tb_anggota')->result_array();
      $this->load->view('admin_header', $data);
      $this->load->view('admin_sidebar');
      $this->load->view('admin_topbar', $data);
      $this->load->view('admin_listanggota');
      $this->load->view('admin_footer');
    }
  }
  public function tambahAnggota()
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $foto = $_FILES['foto']['name'];
      $role = $this->input->post('role');
      $nama = $this->input->post('nama');
      $instagram = $this->input->post('instagram');
      $keterangan = $this->input->post('keterangan');
      if ($foto) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/gambar/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
          $foto = $this->upload->data('file_name');
          $this->db->set('foto', $foto);
          $this->db->set('role', $role);
          $this->db->set('nama', $nama);
          $this->db->set('instagram', $instagram);
          $this->db->set('keterangan', $keterangan);
          $this->db->insert('tb_anggota');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
          redirect('Admin/listAnggota');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal ditambahkan</div>');
          redirect('Admin/listAnggota');
        }
      }
    }
  }
  public function DeleteAnggota($id)
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $foto = $this->db->get_where('tb_anggota', ['id_anggota' => $id])->row_array();
      $gambar = $foto['foto'];
      unlink(FCPATH . 'assets/gambar/' . $gambar);

      $this->db->where('id_anggota', $id);
      $this->db->delete('tb_anggota');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
      redirect('Admin/listAnggota');
    }
  }
  public function posting()
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $data['title'] = 'Posting';
      $data['user'] = $this->db->get_where('tb_akun', ['email' => $this->session->userdata('email')])->row_array();
      $data['posting'] = $this->db->get('tb_posting')->result_array();
      $this->load->view('admin_header', $data);
      $this->load->view('admin_sidebar');
      $this->load->view('admin_topbar', $data);
      $this->load->view('admin_posting');
      $this->load->view('admin_footer');
    }
  }
  public function tambahPosting()
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $foto = $_FILES['foto']['name'];

      if ($foto) {
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = '2048';
        $config['upload_path'] = './assets/gambar/';
        $this->load->library('upload', $config);
        if ($this->upload->do_upload('foto')) {
          $foto = $this->upload->data('file_name');
          $this->db->set('gambar', $foto);
          $this->db->insert('tb_posting');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil ditambahkan</div>');
          redirect('Admin/posting');
        } else {
          $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tugas gagal ditambahkan</div>');
          redirect('Admin/posting');
        }
      }
    }
  }
  public function deletePosting($id)
  {
    if (!$this->session->userdata('email')) {
      redirect('Auth');
    } else {
      $foto = $this->db->get_where('tb_posting', ['id_posting' => $id])->row_array();
      $gambar = $foto['gambar'];
      unlink(FCPATH . 'assets/gambar/' . $gambar);

      $this->db->where('id_posting', $id);
      $this->db->delete('tb_posting');

      $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tugas berhasil dihapus</div>');
      redirect('Admin/posting');
    }
  }
}


/* End of file Admin.php */
/* Location: ./application/controllers/Admin.php */