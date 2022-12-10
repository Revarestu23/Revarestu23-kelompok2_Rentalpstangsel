<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Member extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelC');
    }

    public function index()
    {
        $data['judul'] = 'Data Member';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['member'] = $this->ModelC->getMember()->result_array();
        $data['role'] = $this->ModelC->getRole()->result_array();
        $this->form_validation->set_rules('nama_member', 'Nama Member', 'required|min_length[3]', [
            'required' => 'Nama Member harus diisi',
            'min_length' => 'Nama Member terlalu pendek'
        ]);



        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('member/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'nama_member' => $this->input->post(
                    'nama_member',
                    true
                ),
                'id_member' => $this->input->post(
                    'id_member',
                    true
                ),

                'image' => $gambar
            ];
            $this->ModelC->simpanMember($data);
            redirect('member');
        }
    }

    public function hapusMember()
    {
        $where = ['id_member' => $this->uri->segment(3)];
        $this->ModelC->hapusMember($where);
        redirect('member');
    }
}
