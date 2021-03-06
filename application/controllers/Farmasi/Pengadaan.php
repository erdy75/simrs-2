<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Pengadaan extends CI_Controller
{   
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('default_setting');
        $this->load->model('penggunaModel');
        $this->load->model('barangModel');
        $this->load->model('masterTabelModel');
        $this->load->model('pengadaanBarangModel');
        $this->session->set_userdata('navbar_status', 'pengadaanfarmasi');
        if (!$this->penggunaModel->is_loggedin()){
            redirect('login');
        }
    }

    public function index()
    {   
        $_SESSION["tanggalAwal"]=null;
        $_SESSION["tanggalAkhir"]=null;
        $_SESSION["searchFarmasi"]=null;
        $this->page(1);
    }
    public function tambahPengadaanStok(){
        if( $this->input->post('batal') )
        {
            redirect('/farmasi/halamanutama', 'refresh');

        } else if( $this->input->post('simpan') ){
            $unit_id=3;
            $return = $this->pengadaanBarangModel->prosesPengadaanStok($unit_id);
            //var_dump($return);
            if($return==false){
                    $this->pesan("Tabel tidak boleh kosong", $return);
                    redirect('/farmasi/pengadaan', 'refresh');
                }else if($return=='berhasil'){
                    $this->pesan("Pengadaan barang berhasil", $return);
                    redirect('/farmasi/pengadaan', 'refresh');
                }else{
                    $this->pesan("Error server", $return);
                    redirect('/farmasi/pengadaan', 'refresh');
            }
        }
    }
    public function page($page)
    {   
        $unit_id = 3;
        $title['title']="Riwayat Barang Masuk";
        $limit = $_COOKIE["pageLimit"];
        $sort = $_COOKIE["pageSort"];

        if(!isset($page)){ $page = 1; }
        if(!isset($limit)){ 
            $limit = $this->default_setting->pagination('LIMIT'); 
        }
        if(!isset($sort)){ 
            $sort = $this->default_setting->pagination('SORT'); 
        }

        $data = $this->pengadaanBarangModel->riwayatPengadaanStok($unit_id, $sort,$page,$limit);
        $this->load->view('header',$title);
        $this->load->view('navbar');
        $this->load->view('/farmasi/pengadaanfarmasi', $data);
        $this->load->view('footer');
    }

    public function pesan($metode, $return) {
        $this->session->set_flashdata('metode', $metode);
        $this->session->set_flashdata('pesan', 'berhasil');
    }

    public function layanan() {
        $unit_id=3;
        $title['title']="Riwayat Barang Masuk";
        $data['daftarBarang'] = $this->barangModel->getAll($unit_id);
        $data['daftarJenisPenerimaan'] = $this->masterTabelModel->getData('jenis_penerimaan');
        $this->load->view('header',$title);
        $this->load->view('navbar');
        $this->load->view('/farmasi/barangmasuk', $data);
        $this->load->view('footer');
    }
}