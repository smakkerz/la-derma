<?php
class model_pemesanan extends ci_model
{
    
    function faktur()
        {
                $this->db->order_by('transaksi_id','DESC');
                $this->db->get_where('transaksi',array('tanggal_transaksi' => 'current_date' , ));
                $data = $this->db->get('transaksi')->result();
                foreach ($data as $row) {
                    $tx = explode('.', $row->transaksi_id);
                    $antri = $tx[1]+1;
                }
                $date = date('Y-m-d');
                $cekantri = $this->db->query("SELECT COUNT(*) as jml FROM transaksi WHERE tanggal_transaksi = '$date'")->result();
                foreach ($cekantri as $cek) {
                    if ($cek->jml == 0) {
                        $antri = $cek->jml+1;
                    }else{
                        $antri = $antri+1;
                    }
                }
                $d = date('d');
                $my = date('mY');
                $newfaktur = $d.".00".$antri.".".$my.".LD";
                return $newfaktur;
        }
    function simpan_barang()
    {
        $nama_barang    =  $this->input->post('barang');
        $qty            =  $this->input->post('qty');
        $idbarang       = $this->db->get_where('barang',array('barang_id'=>$nama_barang))->row_array();
        $data           = array('barang_id'=>$idbarang['barang_id'],
                                'qty'=>$qty,
                                'harga'=>$idbarang['harga'],
                                'status'=>'0');

        $this->db->insert('transaksi_detail',$data);
    }
    
    function tampilkan_detail_transaksi()
    {
        $query  ="SELECT td.t_detail_id,td.qty,td.harga,b.nama_barang
                FROM transaksi_detail as td,barang as b
                WHERE b.barang_id=td.barang_id and td.status='0'";
        return $this->db->query($query);
    }
    
    function hapusitem($id)
    {
        $this->db->where('t_detail_id',$id);
        $this->db->delete('transaksi_detail');
    }
    
    
    function selesai_belanja($data)
    {
        $this->db->insert('transaksi',$data);
        $users = $this->ion_auth->user()->row();
        $pasien = $this->input->post('pasien');
        $dokter = $this->input->post('dokter');
        $jenis = "Pemesanan";
        $tanggal=date('Y-m-d');
        $user=  $users->email;
        $data=array('pasien_email' => $pasien,'dokter_email' => $dokter,'operator_id'=>$user,'tanggal_transaksi'=>$tanggal,'jenis'=> $jenis);
        
        
        $last_id=  $this->db->query("select transaksi_id from transaksi order by transaksi_id desc")->row_array();
        
        $this->db->query("update transaksi_detail set transaksi_id='".$last_id['transaksi_id']."' where status='0'");
        $masuk = $this->db->query("SELECT SUM(harga) as total FROM transaksi_detail as total WHERE transaksi_id = '$last_id[transaksi_id]'")->row_array();
        $kas = array('transaksi'=>$jenis,'idtransaksi'=>$last_id['transaksi_id'],'IdPengguna'=>$user,'waktu'=>$tanggal,'masuk'=>$masuk['total'],'verifikasi'=>'0');
        $this->db->insert('arus_kas',$kas);
    }
    
    
    function laporan_default()
    {
        $query="SELECT t.tanggal_transaksi,o.first_name,o.last_name,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,users as o
                WHERE td.transaksi_id=t.transaksi_id and o.email=t.operator_id
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    
    function laporan_periode($tanggal1,$tanggal2)
    {
        $query="SELECT t.tanggal_transaksi,o.first_name,sum(td.harga*td.qty) as total
                FROM transaksi as t,transaksi_detail as td,users as o
                WHERE td.transaksi_id=t.transaksi_id and o.email=t.operator_id 
                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
                group by t.transaksi_id";
        return $this->db->query($query);
    }
    function tampil_pesanan()
    {
        $lama = 7; // lama data yang tersimpan di database dan akan otomatis terhapus setelah 5 hari
 
        // proses untuk melakukan penghapusan data
 
        $query = "DELETE FROM arus_kas WHERE transaksi = 'Pemesanan' AND DATEDIFF(CURDATE(), waktu) > $lama";
        $this->db->query($query);
        return $this->db->query("SELECT * FROM arus_kas JOIN transaksi ON transaksi.transaksi_id=arus_kas.idtransaksi WHERE arus_kas.transaksi = 'Pemesanan' ORDER BY arus_kas.verifikasi ASC")->result();
    }
    function lunas($id)
    {
        $this->db->query("UPDATE arus_kas SET verifikasi ='1' WHERE id ='$id'");
    }
    function batal($id)
    {
        $this->db->query("UPDATE arus_kas SET verifikasi ='0' WHERE id ='$id'");
    }
    
}