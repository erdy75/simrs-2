<?php if (! defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class InfoStok extends CI_Controller
{   
    private $unit_id = 4;
    function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->model('default_setting');
        $this->load->model('penggunaModel');
        $this->load->model('stokModel');
        $this->session->set_userdata('navbar_status', 'infostokinventaris');
        if (!$this->penggunaModel->is_loggedin()){
            redirect('login');
        }
    }

    public function index()
    {   
        $this->page(1);
    }

    public function page($page)
    {   
        $title['title']="Info Stok";
        $limit = $_COOKIE["pageLimit"];
        $sort = $_COOKIE["pageSort"];

        if(!isset($page)){ $page = 1; }
        if(!isset($limit)){ 
            $limit = $this->default_setting->pagination('LIMIT'); 
        }
        if(!isset($sort)){ 
            $sort = $this->default_setting->pagination('SORT'); 
        }

        $data = $this->stokModel->infoStok($this->unit_id, $sort,$page,$limit);
        $this->load->view('header',$title);
        $this->load->view('navbar');
        $this->load->view('/inventaris/stokinventaris', $data);
        $this->load->view('footer');
    }

    public function pesan($metode, $return) {
        $this->session->set_flashdata('metode', $metode);
        $this->session->set_flashdata('pesan', 'berhasil');
    }
    public function printStok() {
        $unit_id=4;
        $title['title']="Cetak Stok Hari Ini";
        $data = $this->stokModel->printInfoStok($unit_id);
        $this->load->view('header',$title);
        $this->load->view('/inventaris/printstokhariini', $data);
    }
}