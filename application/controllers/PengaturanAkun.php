<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PengaturanAkun extends CI_Controller
{

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     * 		http://example.com/index.php/welcome
     *	- or -
     * 		http://example.com/index.php/welcome/index
     *	- or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    public function editprofil()
    {
        $this->form_validation->set_rules('nama_peserta','Nama');
        $this->db->update()('pendaftaran', $data);

        $this->load->view('dashboard/template/header');
        $this->load->view('user/editprofil');
        $this->load->view('dashboard/template/footer');
    }
}
