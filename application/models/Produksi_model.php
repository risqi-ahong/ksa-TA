<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produksi_model extends CI_Model
{
    public function produksi()
    {
        $queryPo = "SELECT `tb_po_produksi`.*, `tb_formulasi` . `name`
                                                FROM `tb_po_produksi` JOIN `tb_formulasi` 
                                                ON `tb_po_produksi` . `id_formulasi` = `tb_formulasi` . `id`
                                            ";
        return $this->db->query($queryPo)->result_array();
    }

    public function isi_formulasi()
    {
        $queryIsi = "SELECT `tb_formulasi_isi`.*, `tb_formulasi` . `name`
                                                FROM `tb_formulasi_isi` JOIN `tb_formulasi` 
                                                ON `tb_formulasi_isi` . `id_name` = `tb_formulasi` . `id`
                                            ";
        return $this->db->query($queryIsi)->result_array();
    }

    public function WarehouseOut()
    {
        $queryWarehouse = "SELECT `tb_barang_keluar`.*, `tb_barang` . `kode_barang`
                                                FROM `tb_barang_keluar` JOIN `tb_barang` 
                                                ON `tb_barang_keluar` . `id_barang` = `tb_barang` . `id`
                                            ";
        return $this->db->query($queryWarehouse)->result_array();
    }
}
