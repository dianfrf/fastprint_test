<?php 
    defined('BASEPATH') OR exit('No direct script access allowed');
    class M_fastprint extends CI_Model {
        public function ProdukAllGet() {
            return $this->db->select('id_produk,nama_produk,harga,nama_kategori,nama_status')
                            ->join('kategori b', 'a.kategori_id = b.id_kategori')
                            ->join('status c', 'a.status_id = c.id_status')
                            ->order_by('id_produk','DESC')->get('produk a');
        }
        public function ProdukAvailGet() {
            return $this->db->select('id_produk,nama_produk,harga,nama_kategori,nama_status')
                            ->join('kategori b', 'a.kategori_id = b.id_kategori')
                            ->join('status c', 'a.status_id = c.id_status')
                            ->order_by('id_produk','DESC')->where('status_id','1')
                            ->get('produk a');
        }
        public function ProdukUnavailGet() {
            return $this->db->select('id_produk,nama_produk,harga,nama_kategori,nama_status')
                            ->join('kategori b', 'a.kategori_id = b.id_kategori')
                            ->join('status c', 'a.status_id = c.id_status')
                            ->order_by('id_produk','DESC')->where('status_id','2')
                            ->get('produk a');
        }
        public function ProdukGetByID($id) {
            return $this->db->where('id_produk',$id)->get('produk')->row();
        }
        public function KategoriGet() {
            return $this->db->order_by('id_kategori','ASC')->get('kategori')->result();
        }
        public function StatusGet() {
            return $this->db->get('status')->result();
        }
        public function ProdukTambah($nama_produk,$kategori,$status,$harga) {
            $data = array(
                'nama_produk'       => $nama_produk,
                'kategori_id'       => $kategori,
                'status_id'         => $status,
                'harga'             => $harga
            );
            $this->db->insert('produk',$data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function ProdukUbah($id_produk,$nama_produk,$kategori,$status,$harga) {
            $data = array(
                'nama_produk'       => $nama_produk,
                'kategori_id'       => $kategori,
                'status_id'         => $status,
                'harga'             => $harga
            );
            $this->db->where('id_produk',$id_produk)->update('produk',$data);
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
        public function ProdukHapus($id) {
            $this->db->where('id_produk',$id)->delete('produk');
            if ($this->db->affected_rows() > 0) {
                return TRUE;
            } else {
                return FALSE;
            }
        }
    }
?>