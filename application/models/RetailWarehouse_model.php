<?php
defined('BASEPATH') or exit('No direct script access allowed');

class retailWarehouse_model extends CI_Model
{
    public function Retail_In()
    {
        $queryWarehouse = "SELECT `tb_barang_masuk_gk`.*, `tb_barang_gk` . `kode_barang`
                                                FROM `tb_barang_masuk_gk` JOIN `tb_barang_gk` 
                                                ON `tb_barang_masuk_gk` . `id_barang` = `tb_barang_gk` . `id`
                                            ";
        return $this->db->query($queryWarehouse)->result_array();
    }

    public function Retail_out()
    {
        $queryWarehouse = "SELECT `tb_barang_keluar_gk`.*, `tb_barang_gk` . `kode_barang`
                                                FROM `tb_barang_keluar_gk` JOIN `tb_barang_gk` 
                                                ON `tb_barang_keluar_gk` . `id_barang` = `tb_barang_gk` . `id`
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
