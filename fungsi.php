<?php
// Mendapatkan IP pengunjung menggunakan getenv()
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan IP pengunjung menggunakan $_SERVER
function get_client_ip_2() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'IP tidak dikenali';
    return $ipaddress;
}
  
  
// Mendapatkan jenis web browser pengunjung
function get_client_browser() {
    $browser = '';
    if(strpos($_SERVER['HTTP_USER_AGENT'], 'Netscape'))
        $browser = 'Netscape';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Firefox'))
        $browser = 'Firefox';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Chrome'))
        $browser = 'Chrome';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'Opera'))
        $browser = 'Opera';
    else if (strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE'))
        $browser = 'Internet Explorer';
    else
        $browser = 'Other';
    return $browser;
}

	function penyebut($nilai) {
		$nilai = abs($nilai);
		$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
		$temp = "";
		if ($nilai < 12) {
			$temp = " ". $huruf[$nilai];
		} else if ($nilai <20) {
			$temp = penyebut($nilai - 10). " Belas";
		} else if ($nilai < 100) {
			$temp = penyebut($nilai/10)." Puluh". penyebut($nilai % 10);
		} else if ($nilai < 200) {
			$temp = " Seratus" . penyebut($nilai - 100);
		} else if ($nilai < 1000) {
			$temp = penyebut($nilai/100) . " Ratus" . penyebut($nilai % 100);
		} else if ($nilai < 2000) {
			$temp = " Seribu" . penyebut($nilai - 1000);
		} else if ($nilai < 1000000) {
			$temp = penyebut($nilai/1000) . " Ribu" . penyebut($nilai % 1000);
		} else if ($nilai < 1000000000) {
			$temp = penyebut($nilai/1000000) . " Juta" . penyebut($nilai % 1000000);
		} else if ($nilai < 1000000000000) {
			$temp = penyebut($nilai/1000000000) . " Milyar" . penyebut(fmod($nilai,1000000000));
		} else if ($nilai < 1000000000000000) {
			$temp = penyebut($nilai/1000000000000) . " Trilyun" . penyebut(fmod($nilai,1000000000000));
		}     
		return $temp;
	}
 
	function terbilang($nilai) {
		if($nilai<0) {
			$hasil = "minus ". trim(penyebut($nilai));
		} else {
			$hasil = trim(penyebut($nilai));
		}     		
		return $hasil;
	}
function rupiah($angka){
       $jadi="Rp."." ".number_format($angka,0,',','.');
       //$jadi=number_format($angka,0,',','.');
       return $jadi;
}

function rupiah2($angka){
       $jadi=number_format($angka,0,',','.');
       //$jadi=number_format($angka,0,',','.');
       return $jadi;
}

function bln_indonesia($bulan) {
$array_bulan=array("01"=>"Januari",
"02"=>"Feb",
"03"=>"Mar",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$bln_temp=explode("-",$bulan);
$bln=$bln_temp[1];
$thn=$bln_temp[0];
$nama_bulan=$array_bulan[$bln];
return $nama_bulan." ".$thn;
}

function tgl_indonesia($tanggal) {
$array_bulan=array("01"=>"Januari",
"02"=>"Februari",
"03"=>"Maret",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$tgl_temp=explode("-",$tanggal);
$tgl=$tgl_temp[2];
$bln=$tgl_temp[1];
$thn=$tgl_temp[0];
$nama_bulan=$array_bulan[$bln];
return $tgl." ".$nama_bulan." ".$thn;
}


function tgl_indonesia2($tanggal2) {
$array_bulan2=array("00"=>"00",
"01"=>"01",
"02"=>"02",
"03"=>"03",
"04"=>"04",
"05"=>"05",
"06"=>"06",
"07"=>"07",
"08"=>"08",
"09"=>"09",
"10"=>"10",
"11"=>"11",
"12"=>"12");
$tgl_temp2=explode("-",$tanggal2);
$tgl2=$tgl_temp2[2];
$bln2=$tgl_temp2[1];
$thn2=$tgl_temp2[0];
$nama_bulan2=$array_bulan2[$bln2];
return $tgl2."-".$nama_bulan2."-".$thn2;
}

function tgl_indonesia3($tanggal3) {
$array_bulan3=array("01"=>"Januari",
"02"=>"Februari",
"03"=>"Maret",
"04"=>"April",
"05"=>"Mei",
"06"=>"Juni",
"07"=>"Juli",
"08"=>"Agustus",
"09"=>"September",
"10"=>"Oktober",
"11"=>"Nopember",
"12"=>"Desember");
$tgl_temp3=explode("-",$tanggal3);//2021-09-08
$tgl3=$tgl_temp3[2];
$bln3=$tgl_temp3[1];
$thn3=$tgl_temp3[0];
$nama_bulan3=$array_bulan3[$thn3];
return $nama_bulan3;
}

function getbulan($bulann) {
switch ($bulann){
case Jan:
return "01";
break;	
case Feb:
return "02";
break;
case Mar:
return "03";
break;	
case Apr:
return "04";
break;	
case May:
return "05";
break;	
case Jun:
return "06";
break;	
case Jul:
return "07";
break;	
case Aug:
return "08";
break;	
case Sep:
return "09";
break;	
case Oct:
return "10";
break;	
case Nov:
return "11";
break;	
case Dec:
return "12";
break;		
}
}

function getbulan2($bulann2) {
switch ($bulann2){
case "01":
return "Jan";
break;	
case "02":
return "Feb";
break;
case "03":
return "Mar";
break;	
case "04":
return "Apr";
break;	
case "05":
return "May";
break;	
case "06":
return "Jun";
break;	
case "07":
return "Jul";
break;	
case "08":
return "Aug";
break;	
case "09":
return "Sep";
break;	
case "10":
return "Oct";
break;	
case "11":
return "Nov";
break;	
case "12":
return "Dec";
break;		
}
}

function cek_golongan($e_04) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KODE,NAMA,PANJANG from eps_tgolru where KODE='$e_04'"));
return $hasil_cek['PANJANG']." - ".$hasil_cek['NAMA'];
}

function cek_unor($instansi) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KD,NM from eps_tablok where KD='$instansi'"));
	//return $hasil_cek['NM'];
	if (substr($hasil_cek['NM'],0,4)=="UPTD") {//Guru SM Kepala SM
	return "Dinas Pendidikan Kabupaten Brebes";
	}elseif(substr($hasil_cek['NM'],0,9)=="KELURAHAN") {
	return "Kecamatan Brebes Kabupaten Brebes";
	}else{
	return $hasil_cek['NM'].' Kabupaten Brebes';
	}
}


function cek_instansi($dari) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KODE,NAMA from eps_tabpjb where KODE='$dari'"));
return $hasil_cek['NAMA'];
}

function cek_pt($kd_sekolah) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_sekolah,nm_sekolah from eps_tbsekolah where kd_sekolah='$kd_sekolah'"));
return $hasil_cek['nm_sekolah'];
}

function cek_pendidikan($kod) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KOD,KET from eps_tabdik where KOD='$kod'"));
return $hasil_cek['KET'];
}

function cek_fakultas($kd_fakultas) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kod,kd_fakultas from eps_ijinbelajar where kd_fakultas='$kd_fakultas'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select TKT,KOD,KET from eps_tabdik_all where KOD='$kd_fakultas' and TKT='$hasil_cek[kod]'"));
//$hasil_cek3=mysql_fetch_array(mysql_query("select KOD,KET from eps_tabdik where KOD='$hasil_cek2[jenjang]'"));
return $hasil_cek2['KET'];

//return $hasil_cek2['gelar'];
}

function cek_fakultas2($kd_fakultas) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kod,kd_fakultas from eps_ijingelar where kd_fakultas='$kd_fakultas'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select TKT,KOD,KET from eps_tabdik_all where KOD='$kd_fakultas' and TKT='$hasil_cek[kod]'"));
//$hasil_cek3=mysql_fetch_array(mysql_query("select KOD,KET from eps_tabdik where KOD='$hasil_cek2[jenjang]'"));
return $hasil_cek2['KET'];

//return $hasil_cek2['gelar'];
}

function cek_gelar($kd_fakultas) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas,kod from eps_ijinbelajar where kd_fakultas='$kd_fakultas'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas,fakultas,gelar,jenjang from eps_tbfakultas where jenjang='$hasil_cek[kod]' and fakultas='$hasil_cek[kd_fakultas]'"));
//$hasil_cek3=mysql_fetch_array(mysql_query("select KOD,KET from eps_tabdik where KOD='$hasil_cek2[jenjang]'"));
return $hasil_cek2['gelar'];
//return $hasil_cek2['gelar'];
}

function cek_gelar2($kd_fakultas) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas,kod from eps_ijingelar where kd_fakultas='$kd_fakultas'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas,fakultas,gelar,jenjang from eps_tbfakultas where jenjang='$hasil_cek[kod]' and fakultas='$hasil_cek[kd_fakultas]'"));
//$hasil_cek3=mysql_fetch_array(mysql_query("select KOD,KET from eps_tabdik where KOD='$hasil_cek2[jenjang]'"));
return $hasil_cek2['gelar'];
//return $hasil_cek2['gelar'];
}

function cek_jenjang($kd_fakultas) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas from eps_ijingelar where kd_fakultas='$kd_fakultas'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select kd_fakultas,fakultas,jenjang from eps_tbfakultas where kd_fakultas='$hasil_cek[kd_fakultas]'"));
$hasil_cek3=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KOD,KET from eps_tabdik where KOD='$hasil_cek2[jenjang]'"));
//return $hasil_cek2['fakultas'];
return $hasil_cek3['KET'];
}

function cek_nama($b_02) {
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select b_02,b_03a,b_03,b_03b,kdusul2 from eps_ijinbelajar where b_02='$b_02'"));
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select b_02,b_03a,b_03,b_03b,kdusul2 from eps_ijinbelajar where b_02='$b_02' and kdusul2='$hasil_cek2[kdusul2]'"));
//return $hasil_cek['PANJANG']." - ".$hasil_cek['NAMA'];
	if($hasil_cek['b_03a']<>"-" && $hasil_cek['b_03b']<>"-"){
		return $hasil_cek['b_03a']."."." ".$hasil_cek['b_03'].","." ".$hasil_cek['b_03b'];
	}elseif($hasil_cek['b_03a']<>"-" && $hasil_cek['b_03b']=="-"){
		return $hasil_cek['b_03a']."."." ".$hasil_cek['b_03'];
	}elseif($hasil_cek['b_03a']=="-" && $hasil_cek['b_03b']<>"-"){
		return $hasil_cek['b_03'].","." ".$hasil_cek['b_03b'];
	}elseif($hasil_cek['b_03a']=="-" && $hasil_cek['b_03b']=="-"){
		return $hasil_cek['b_03'];
	}
}
// FUNGSI DATE TIME CONVERT
function cek_nama2($b_02) {
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select b_02,b_03a,b_03,b_03b,kdusul from eps_ijingelar where b_02='$b_02'"));
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select b_02,b_03a,b_03,b_03b,kdusul from eps_ijingelar where b_02='$b_02' and kdusul='$hasil_cek2[kdusul]'"));
//return $hasil_cek['PANJANG']." - ".$hasil_cek['NAMA'];
	if($hasil_cek['b_03a']<>"-" && $hasil_cek['b_03b']<>"-"){
		return $hasil_cek['b_03a']."."." ".$hasil_cek['b_03'].","." ".$hasil_cek['b_03b'];
	}elseif($hasil_cek['b_03a']<>"-" && $hasil_cek['b_03b']=="-"){
		return $hasil_cek['b_03a']."."." ".$hasil_cek['b_03'];
	}elseif($hasil_cek['b_03a']=="-" && $hasil_cek['b_03b']<>"-"){
		return $hasil_cek['b_03'].","." ".$hasil_cek['b_03b'];
	}elseif($hasil_cek['b_03a']=="-" && $hasil_cek['b_03b']=="-"){
		return $hasil_cek['b_03'];
	}
}

function cek_sd($unor) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select unor,g_05b from eps_ijinbelajar where unor='$unor'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KOLOK, NALOK from eps_tablokb where KOLOK='$hasil_cek[unor]'"));
$hasil_cek3=substr($hasil_cek['unor'],0,2).'000000';
	$hasil_cek4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KD,NM from eps_tablok where KD='$hasil_cek3'"));
	$hasil_cek5=substr($hasil_cek4['NM'],16,50);
//return $hasil_cek['PANJANG']." - ".$hasil_cek['NAMA'];
	if(substr($hasil_cek['g_05b'],0,4)=="GURU"){
		return $hasil_cek['g_05b'].' '.$hasil_cek2['NALOK'].' '.$hasil_cek5;
	}else{
		return $hasil_cek['g_05b'];
	}
}

function cek_sd2($unor) {
$hasil_cek=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select unor,g_05b from eps_ijingelar where unor='$unor'"));
$hasil_cek2=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KOLOK, NALOK from eps_tablokb where KOLOK='$hasil_cek[unor]'"));
$hasil_cek3=substr($hasil_cek['unor'],0,2).'000000';
	$hasil_cek4=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select KD,NM from eps_tablok where KD='$hasil_cek3'"));
	$hasil_cek5=substr($hasil_cek4['NM'],16,50);
//return $hasil_cek['PANJANG']." - ".$hasil_cek['NAMA'];
	if(substr($hasil_cek['g_05b'],0,4)=="GURU"){
		return $hasil_cek['g_05b'].' '.$hasil_cek2['NALOK'].' '.$hasil_cek5;
	}else{
		return $hasil_cek['g_05b'];
	}
}

function jin_date_time_sql($date_time){
	$space = explode(' ',$date_time);
	if(count($space) == 2) {
		$exp = explode('/',$space[0]);
		if(count($exp) == 3) {
			$date_time = $exp[2].'-'.$exp[1].'-'.$exp[0] .' '. $space[1];
		}
	}
	return $date_time;
}
function jin_date_time_str($date_time){
	$space = explode(' ',$date_time);
	if(count($space) == 2) {
		$exp = explode('-',$space[0]);
		if(count($exp) == 3) {
			$date_time = $exp[2].'-'.$exp[1].'-'.$exp[0] .' '. $space[1];
		}
	}
	return $date_time;
}
?>
