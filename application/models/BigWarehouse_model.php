<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bigWarehouse_model extends CI_Model
{
    public function WarehouseIn()
    {
        $queryWarehouse = "SELECT `tb_barang_masuk`.*, `tb_barang` . `kode_barang`
                                                FROM `tb_barang_masuk` JOIN `tb_barang` 
                                                ON `tb_barang_masuk` . `id_barang` = `tb_barang` . `id`
                                            ";
        return $this->db->query($queryWarehouse)->result_array();
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
