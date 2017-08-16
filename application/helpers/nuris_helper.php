<?php
function cmb_dinamis($name,$table,$field,$pk,$selected){
    $ci = get_instance();
    $cmb = "<select name='$name' class='form-control'>";
    $data = $ci->db->get($table)->result();
    foreach ($data as $d){
        $cmb .="<option value='".$d->$pk."'";
        $cmb .= $selected==$d->$pk?" selected='selected'":'';
        $cmb .=">".  strtoupper($d->$field)."</option>";
    }
    $cmb .="</select>";
    return $cmb;  
}
function uang($nominal, $pecah=0){
    return "Rp. ".number_format($nominal, $pecah, ',','.');
}

function format_tanggal($tanggal){

 $tanggal_terbentuk="";

 $tanggal=explode(" ",$tanggal);

 $set1=explode("-",$tanggal[0]);

 $tanggal_terbentuk.=" ".$set1[2]." ";
 switch ($set1[1]) {
    case '01':
        $tanggal_terbentuk.="Januari";
        break;

    case '02':
        $tanggal_terbentuk.="Februari";
        break;

    case '03':
        $tanggal_terbentuk.="Maret";
        break;

    case '04':
        $tanggal_terbentuk.="April";
        break;

    case '05':
        $tanggal_terbentuk.="Mei";
        break;

    case '06':
        $tanggal_terbentuk.="Juni";
        break;

    case '07':
        $tanggal_terbentuk.="Juli";
        break;

    case '08':
        $tanggal_terbentuk.="Agustus";
        break;

    case '09':
        $tanggal_terbentuk.="September";
        break;

    case '10':
        $tanggal_terbentuk.="Oktobar";
        break;

    case '11':
        $tanggal_terbentuk.="November";
        break;

    case '12':
        $tanggal_terbentuk.="Desember";
        break;



 }
 $tanggal_terbentuk.=" ".$set1[0];

return $tanggal_terbentuk;
}
