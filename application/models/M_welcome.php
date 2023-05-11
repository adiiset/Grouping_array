<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_welcome extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function get_data()
	{
		$sql = "SELECT tt.ID_ORDER_TOKO, tt.`ID_MEMBER`, tt.`TGL_PEMBELIAN`, mo.`NAMA_OUTLET`, mm.`NAMA`, pl.`NAMA_PRODUK`, td.`JUMLAH_ORDER_PCS`
		FROM `t_order_toko` tt 
		LEFT JOIN `t_order_toko_detail` td ON tt.`ID_ORDER_TOKO` = td.`ID_ORDER_TOKO`
		LEFT JOIN `m_outlet` mo ON tt.`ID_OUTLET` = mo.`ID_OUTLET`
		LEFT JOIN `m_member` mm ON td.`ID_MEMBER` = mm.`ID_MEMBER`
		LEFT JOIN `m_produk_list` pl ON td.`ID_PRODUK_LIST` = pl.`ID_PRODUK_LIST` WHERE tt.`DELETE_AT` IS NULL AND td.`JUMLAH_ORDER_PCS`>40";
		return $this->db->query($sql);
	}
}
