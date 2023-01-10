<?php 
defined('BASEPATH') or exit('No direct script access allowed'); 
 
class M_barang extends CI_Model
{

    function input_data($data,$table){
        $this->db->insert($table,$data);
    }

    function get_data($where, $table)
    {
        return $this->db->get_where($table, $where);
    }

    function update_data($where,$data,$table)
    {
        $this->db->where($where);
        $this->db->update($table,$data);
    }

    function hapus_data($where,$table){
        $this->db->where($where);
        $this->db->delete($table);
    }

    // menu barang
    private $_table = 'barang';
 
    function get_all()
    {
        return $this->db->get($this->_table)->result();
    }

    function generatekodejamu()
    {
        $query = $this->db->query("SELECT MAX(kode_jamu) as kodejamu from barang");
        $hasil = $query->row();
        return $hasil->kodejamu;
    }

    function detailStok()
    {
        $q = $this->db->query("SELECT bm.kode_jamu as kode_jamu, b.nama_jamu as nama_jamu, b.kemasan as kemasan, bm.jumlah as stok, bm.expired as expired
        FROM barang_masuk bm INNER JOIN barang b ON bm.kode_jamu = b.kode_jamu ");
        return $q->result();
    }

    // menu barang_masuk
    function generatekodemasuk()
    {
        $query = $this->db->query("SELECT MAX(id_masuk) as kodemasuk from barang_masuk");
        $hasil = $query->row();
        return $hasil->kodemasuk;
    }
    
    function get_barang_masuk()
    {
        $q = $this->db->query("SELECT bm.id_masuk as id_masuk, bm.tanggal as tanggal_input, b.nama_jamu as nama_jamu, b.kemasan as kemasan, bm.jumlah as jumlah, b.harga as harga, bm.expired as expired
        FROM barang_masuk bm INNER JOIN barang b ON bm.kode_jamu = b.kode_jamu GROUP BY bm.id_masuk");
        return $q->result();
    }

    function get_data_barang()
    {
        $q = $this->db->query("SELECT bm.id_masuk as id_masuk, bm.kode_jamu as kode_jamu, bm.tanggal as tanggal, b.nama_jamu as nama_jamu, b.kemasan as kemasan, bm.jumlah as jumlah, b.harga as harga, bm.expired as expired
        FROM barang_masuk bm INNER JOIN barang b ON bm.kode_jamu = b.kode_jamu");
        return $q->result();
    }

    // menu barang keluar
    public function get($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    function generatekodekeluar()
    {
        $query = $this->db->query("SELECT MAX(id_keluar) as kodekeluar from barang_keluar");
        $hasil = $query->row();
        return $hasil->kodekeluar;
    }

    function get_barang_keluar()
    {
        $q = $this->db->query("SELECT bk.id_keluar as id_keluar, bk.tanggal as tanggal_keluar, b.nama_jamu as nama_jamu, b.kemasan as kemasan, bk.jumlah_beli as jumlah_beli
        FROM barang_keluar bk INNER JOIN barang b ON bk.kode_jamu = b.kode_jamu GROUP BY bk.id_keluar");
        return $q->result();
    }

    function getStok()
    {
        $q = $this->db->query("SELECT stok as stok from barang");
        $hasil = $q->row();
        return $hasil->stok;
    }

    // function getSumstok()
    // {
    //     $kode_jamu      = $this->input->post('namajamu');
    //     $q = $this->db->query("SELECT SUM(jumlah) as total_stok FROM barang_masuk where kode_jamu = '$kode_jamu'");
    //     return $q->result(); 
    // }

    // function getStok()
    // {
    //     $kode_jamu      = $this->input->post('namajamu');
    //     $q = $this->db->query("SELECT * FROM barang_masuk where kode_jamu = '$kode_jamu' AND jumlah > 0 ORDER by expired ASC");
    //     return $q->result(); 
    // }

    // menu laporan
    function get_laporan()
    {
        $q = $this->db->query("SELECT bk.tanggal as tgl_pembelian, b.nama_jamu as nama_jamu, b.kemasan as kemasan, bk.jumlah_beli as jml_beli, b.harga as harga, bk.jumlah_beli*b.harga as pendapatan FROM barang_keluar bk INNER JOIN barang b ON bk.kode_jamu=b.kode_jamu GROUP BY bk.id_keluar;");
        return $q->result(); 
    }

    function total_barang()
    {
        $q = $this->db->query("SELECT SUM(bk.jumlah_beli) as total_beli, SUM(bk.jumlah_beli*b.harga) as total_pendapatan FROM barang_keluar bk INNER JOIN barang b ON bk.kode_jamu=b.kode_jamu");
        return $q->result(); 
    }

    // dashboard
    public function totalJenis()
    {
        $q = $this->db->query("SELECT COUNT(kode_jamu) as total_jenis FROM barang");
        return $q->result();
    }

    public function totalStok()
    {
        $q = $this->db->query("SELECT SUM(stok) as total_stok FROM barang");
        return $q->result();
    }

    public function totalStokMasuk()
    {
        $q = $this->db->query("SELECT SUM(jumlah) as total_masuk FROM barang_masuk");
        return $q->result();
    }

    public function totalStokKeluar()
    {
        $q = $this->db->query("SELECT SUM(jumlah_beli) as total_keluar FROM barang_keluar");
        return $q->result();
    }

}