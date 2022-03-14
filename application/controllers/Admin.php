<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->library('form_validation');
    }


    // master
	public function index()
	{
        $this->load->view('layout/header');
        $this->load->view('admin/MasterProduk');
    }


   public function kategori(){
        $this->load->view('layout/header');
        $this->load->view('admin/MasterKategori');
   }


   public function user(){
        $this->load->view('layout/header');
        $this->load->view('admin/MasterUser');
   }

   public function pelanggan(){
        $this->load->view('layout/header');
        $this->load->view('admin/MasterPelanggan');
   }


   public function suplier(){
        $this->load->view('layout/header');
        $this->load->view('admin/MasterSuplier');
   }




   // laporan

    public function penjualan(){
        $this->load->view('layout/header');
        $this->load->view('admin/LaporanPenjualan');
   }

    public function penjualan_perproduk(){
        $this->load->view('layout/header');
        $this->load->view('admin/LaporanPenjualanPerProduk');
   }

   public function pembelian(){
        $this->load->view('layout/header');
        $this->load->view('admin/LaporanPembelian');
   }

   public function pembelian_perproduk(){
        $this->load->view('layout/header');
        $this->load->view('admin/LaporanPembelianPerProduk');
   }
}