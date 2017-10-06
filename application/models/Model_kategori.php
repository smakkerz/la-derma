<?php
class Model_kategori extends CI_Model{
    
    
    
    function tampilkan_data(){
        
        return $this->db->get('kategori_barang');
    }
    
  function tampilkan_data_paging($halaman,$batas)
  {
      return $this->db->query("select * from kategori_barang");
  }
    
    function post(){
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->insert('kategori_barang',$data);
    }
    
    
    function edit()
    {
        $data=array(
           'nama_kategori'=>  $this->input->post('kategori')
                    );
        $this->db->where('kategori_id',$this->input->post('id'));
        $this->db->update('kategori_barang',$data);
    }
    
    function get_one($id)
    {
        $param  =   array('kategori_id'=>$id);
        return $this->db->get_where('kategori_barang',$param);
    }
    
    
    function delete($id)
    {
        $this->db->where('kategori_id',$id);
        $this->db->delete('kategori_barang');
    }
}