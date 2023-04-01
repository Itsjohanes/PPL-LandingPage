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

class Main extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
  }

  public function index()
  {
    $data['posting'] = $this->db->get('tb_posting')->result_array();
    $data['banyakPosting'] = $this->db->get('tb_posting')->num_rows();
    $data['ppl'] = $this->db->get_where('tb_anggota')->result_array();


    $this->load->view('index', $data);
  }
}


/* End of file Index.php */
/* Location: ./application/controllers/Index.php */