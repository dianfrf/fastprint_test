<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class FastPrintCont extends CI_Controller {
        public function __construct()
        {
            parent::__construct();
            $this->load->model('M_fastprint');
        }     

        public function index()
        {
            $data['status'] = $this->M_fastprint->StatusGet();
            $data['kategori'] = $this->M_fastprint->KategoriGet();
            $data['produkall'] = $this->M_fastprint->ProdukAllGet();
            $data['produkavail'] = $this->M_fastprint->ProdukAvailGet();
            $data['produkunavail'] = $this->M_fastprint->ProdukUnavailGet();
            $this->load->view('v_produk', $data);
        }
        public function produk_tambah() {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', array('required' => 'Nama produk harus diisi'));
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required', array('required' => 'Kategori harus diisi'));
            $this->form_validation->set_rules('status_id', 'Status', 'trim|required', array('required' => 'Status harus diisi'));
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', array('required' => 'Harga harus diisi', 'numeric' => 'Harga harus menggunakan angka saja'));
            if ($this->form_validation->run() == TRUE) {
                $nama_produk    = preg_replace("/[^a-zA-Z0-9.,<>_?!:|%+=*()&\/\- ]+/", "", $this->input->post('nama_produk'));
                $kategori       = $this->input->post('kategori_id');
                $status         = $this->input->post('status_id');
                $harga          = preg_replace("/[^0-9]+/", "", $this->input->post('harga'));

                if ($this->M_fastprint->ProdukTambah($nama_produk,$kategori,$status,$harga)) {
                    $this->session->set_flashdata('msgi', 'Produk berhasil ditambah');
                } else {
                    $this->session->set_flashdata('msg', 'Produk gagal ditambah');
                } 
            } else {
                $this->session->set_flashdata('msg', ''.validation_errors().'');
            }
            redirect('/');
        }
        public function produk_get_id($id) {
            $data = $this->M_fastprint->ProdukGetByID($id);
            echo (json_encode($data));
        }
        public function produk_ubah() {
            $this->form_validation->set_rules('nama_produk', 'Nama Produk', 'trim|required', array('required' => 'Nama produk harus diisi'));
            $this->form_validation->set_rules('kategori_id', 'Kategori', 'trim|required', array('required' => 'Kategori harus diisi'));
            $this->form_validation->set_rules('status_id', 'Status', 'trim|required', array('required' => 'Status harus diisi'));
            $this->form_validation->set_rules('harga', 'Harga', 'trim|required|numeric', array('required' => 'Harga harus diisi', 'numeric' => 'Harga harus menggunakan angka saja'));
            if ($this->form_validation->run() == TRUE) {
                $id_produk      = $this->input->post('id_produk');
                $nama_produk    = preg_replace("/[^a-zA-Z0-9.,<>_?!:|%+=*()&\/\- ]+/", "", $this->input->post('nama_produk'));
                $kategori       = $this->input->post('kategori_id');
                $status         = $this->input->post('status_id');
                $harga          = preg_replace("/[^0-9]+/", "", $this->input->post('harga'));

                if ($this->M_fastprint->ProdukUbah($id_produk,$nama_produk,$kategori,$status,$harga)) {
                    $this->session->set_flashdata('msgi', 'Produk dengan ID '.$id_produk.' berhasil diubah');
                } else {
                    $this->session->set_flashdata('msg', 'Produk dengan ID '.$id_produk.' gagal diubah');
                } 
            } else {
                $this->session->set_flashdata('msg', ''.validation_errors().'');
            }
            redirect('/');
        }
        public function produk_hapus($id) {
            if ($this->M_fastprint->ProdukHapus($id)) {
                $this->session->set_flashdata('msgi', 'Produk dengan ID '.$id.' berhasil dihapus');
            } else {
                $this->session->set_flashdata('msg', 'Produk dengan ID '.$id.' gagal dihapus');
            }
            redirect('/');
        }
    }
?>