<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Console extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        $this->load->model('ModelC');
    }

    public function index()
    {
        $data['judul'] = 'Data Console';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['console'] = $this->ModelC->getConsole()->result_array();
        $data['kategori'] = $this->ModelC->getKategori()->result_array();
        $this->form_validation->set_rules('nama_console', 'Nama Console', 'required|min_length[3]', [
            'required' => 'Nama Console harus diisi',
            'min_length' => 'Nama Console terlalu pendek'
        ]);
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            [
                'required' => 'Kategori Console harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required|numeric',
            [
                'required' => 'Stok Console harus diisi',
                'numeric' => 'Yang anda masukan bukan angka'
            ]
        );

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        //$config['max_width'] = '1024';
        //$config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('console/index', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                $gambar = $image['file_name'];
            } else {
                $gambar = '';
            }
            $data = [
                'nama_console' => $this->input->post(
                    'nama_console',
                    true
                ),
                'id_kategori' => $this->input->post(
                    'id_kategori',
                    true
                ),

                'stok' => $this->input->post('stok', true),

                'dipinjam' => 0,
                'dibooking' => 0,
                'image' => $gambar
            ];
            $this->ModelC->simpanConsole($data);
            redirect('console');
        }
    }
    public function ubahConsole()
    {
        $data['judul'] = 'Ubah Data Console';
        $data['user'] = $this->ModelUser->cekData(['email' => $this->session->userdata('email')])->row_array();
        $data['console'] = $this->ModelC->consoleWhere(['id' => $this->uri->segment(3)])->result_array();
        $kategori = $this->ModelC->joinKategoriConsole(['console.id' => $this->uri->segment(3)])->result_array();
        foreach ($kategori as $k) {
            $data['id'] = $k['id_kategori'];
            $data['k'] = $k['nama_kategori'];
        }
        $data['kategori'] = $this->ModelC->getKategori()->result_array();
        $this->form_validation->set_rules('nama_console', 'Nama Console', 'required|min_length[3]', [
            'required' => 'Nama Console harus diisi',
            'min_length' => 'Nama Console terlalu pendek'
        ]);
        $this->form_validation->set_rules(
            'id_kategori',
            'Kategori',
            'required',
            [
                'required' => 'Kategori Console harus diisi',
            ]
        );

        $this->form_validation->set_rules(
            'stok',
            'Stok',
            'required|numeric',
            [
                'required' => 'Stok Console harus diisi',
                'numeric' => 'Yang anda masukan bukan angka'
            ]
        );

        $config['upload_path'] = './assets/img/upload/';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '3000';
        //$config['max_width'] = '1024';
        //$config['max_height'] = '1000';
        $config['file_name'] = 'img' . time();

        $this->load->library('upload', $config);
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('console/ubah_console', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->upload->do_upload('image')) {
                $image = $this->upload->data();
                unlink('assets/img/upload/' . $this->input->post('old_pict', TRUE));
                $gambar = $image['file_name'];
            } else {
                $gambar = $this->input->post('old_pict', TRUE);
            }
            $data = [
                'nama_console' => $this->input->post(
                    'nama_console',
                    true
                ),
                'id_kategori' => $this->input->post(
                    'id_kategori',
                    true
                ),
                'stok' => $this->input->post('stok', true),
                'image' => $gambar
            ];
            $this->ModelC->updateConsole($data, ['id' => $this->uri->segment(3)]);
            redirect('console');
        }
    }
    public function hapusConsole()
    {
        $where = ['id' => $this->uri->segment(3)];
        $this->ModelC->hapusConsole($where);
        redirect('console');
    }
}
