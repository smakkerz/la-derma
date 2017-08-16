<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Informasi
{
    protected $CI;

    public function __construct(){

        $this->CI=& get_instance();

    }


    public function web(){
        $data=$this->CI->db->query("SELECT * FROM informasi");

        if($data->num_rows()==1){
            $hasil= $data->row_array();
            $hasil['name']= $hasil['nama_klinik'];
            $hasil['fav']=$hasil['favicon'];
            $hasil['logo']= $hasil['logo'];
            $hasil['ijin']=$hasil['ijin_klinik'];


            return $hasil; 

        } 
    }

}