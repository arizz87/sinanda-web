<?php
//print_r($_SESSION);

	/**
		* Script:    DataTables server-side script for PHP 5.2+ and mysql 4.1+
		* Notes:     Based on a script by Allan Jardine that used the old PHP mysql_* functions.
		*            Rewritten to use the newer object oriented mysqli extension.
		* Copyright: 2010 - Allan Jardine (original script)
		*            2012 - Kari Söderholm, aka Haprog (updates)
		* License:   GPL v2 or BSD (3-point)
	*/
	
	/**
		* Array of database columns which should be read and sent back to DataTables. Use a space where
		* you want to insert a non-database field (for example a counter or static image)
	*/
	$aColumns = array( 'id_bidang', 'nama_bidang', 'nama_kabid','nip_kabid'); //Kolom Pada Tabel
	
	// Indexed column (used for fast and accurate table cardinality)
	$sIndexColumn = 'id_bidang';
		
	// DB table to use
	$sTable = 'tb_bidang'; // Nama Tabel
	//Koneksi Database
	require_once'../../koneksi.php';
	require_once'../../fungsi.php';
		
	// Input method (use $_GET, $_POST or $_REQUEST)
	$input =& $_POST;

	$gaSql['charset']  = 'utf8';
	
	/**
		* mysql connection
	*/
	if (mysqli_connect_error()) {
		die( 'Error connecting to mysql server (' . mysqli_connect_errno() .') '. mysqli_connect_error() );
	}
	
	if (!$db->set_charset($gaSql['charset'])) {
		die( 'Error loading character set "'.$gaSql['charset'].'": '.$db->error );
	}
	
	
	/**
		* Paging
	*/
	$sLimit = "";
	if ( isset( $input['iDisplayStart'] ) && $input['iDisplayLength'] != '-1' ) {
		$sLimit = " LIMIT ".intval( $input['iDisplayStart'] ).", ".intval( $input['iDisplayLength'] );
	}
	
	
	/**
		* Ordering
	*/
	$aOrderingRules = array();
	if ( isset( $input['iSortCol_0'] ) ) {
		$iSortingCols = intval( $input['iSortingCols'] );
		for ( $i=0 ; $i<$iSortingCols ; $i++ ) {
			if ( $input[ 'bSortable_'.intval($input['iSortCol_'.$i]) ] == 'true' ) {
				$aOrderingRules[] =
                "`".$aColumns[ intval( $input['iSortCol_'.$i] ) ]."` "
                .($input['sSortDir_'.$i]==='asc' ? 'asc' : 'asc');
			}
		}
	}
	
	if (!empty($aOrderingRules)) {
		$sOrder = " ORDER BY ".implode(", ", $aOrderingRules);
		} else {
		$sOrder = "";
	}
	
	
	/**
		* Filtering
		* NOTE this does not match the built-in DataTables filtering which does it
		* word by word on any field. It's possible to do here, but concerned about efficiency
		* on very large tables, and mysql's regex functionality is very limited
	*/
	$iColumnCount = count($aColumns);
	
	if ( isset($input['sSearch']) && $input['sSearch'] != "" ) {
		$aFilteringRules = array();
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' ) {
				$aFilteringRules[] = "`".$aColumns[$i]."` LIKE '%".$db->real_escape_string( $input['sSearch'] )."%'";
			}
		}
		if (!empty($aFilteringRules)) {
			$aFilteringRules = array('('.implode(" OR ", $aFilteringRules).')');
		}
	}
	
	// Individual column filtering
	for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
		if ( isset($input['bSearchable_'.$i]) && $input['bSearchable_'.$i] == 'true' && $input['sSearch_'.$i] != '' ) {
			$aFilteringRules[] = "`".$aColumns[$i]."` LIKE '%".$db->real_escape_string($input['sSearch_'.$i])."%'";
		}
	}

	$output1 = array(
    //"sEcho"                => intval($input['sEcho']),
    //"iTotalRecords"        => $iTotal,
    //"iTotalDisplayRecords" => $iFilteredTotal,
    "aaData1"               => array(),
	);
	
	// Looping Data
	
	//Cari Kode User
	//$order=mysqli_query($db, "SELECT *FROM tb_pengikut_sppd WHERE tahun='".$_POST['table2']."' and no_agenda='".$_POST['table']."' order by nomor");
	//$orderby=mysqli_fetch_array($order,MYSQLI_ASSOC);
	
	//$aksesskpd=str_replace(" OR )",")",$aksesskpd);
	if (!empty($aFilteringRules)) {
		$sWhere = " WHERE ".implode(" AND ", $aFilteringRules)." ";
		} else {
		$sWhere = " ";
	}
	
	/**
		* SQL queries
		* Get data to display
	*/
	$aQueryColumns = array();
	foreach ($aColumns as $col) {
		if ($col != ' ') {
			$aQueryColumns[] = $col;
		}
	}
	
	$sQuery = "
    SELECT SQL_CALC_FOUND_ROWS `".implode("`, `", $aQueryColumns)."`
    FROM `".$sTable."`".$sWhere.$sOrder.$sLimit;
	
	$rResult = $db->query( $sQuery ) or die($db->error);
	
	// Data set length after filtering
	$sQuery = "SELECT FOUND_ROWS()";
	$rResultFilterTotal = $db->query( $sQuery ) or die($db->error);
	list($iFilteredTotal) = $rResultFilterTotal->fetch_row();
	
	// Total data set length
	//$sQuery = "SELECT COUNT(`".$sIndexColumn."`) FROM `".$sTable."`".$sWhere;
	//$rResultTotal = $db->query( $sQuery ) or die($db->error);
	//list($iTotal) = $rResultTotal->fetch_row();
	
	
	/**
		* Output
	*/
	$output = array(
    "sEcho"                => intval($input['sEcho']),
    "iTotalRecords"        => $iTotal,
    "iTotalDisplayRecords" => $iFilteredTotal,
    "aaData"               => array(),
	);
	// Looping Data
	$no=0;
	while ( $aRow = $rResult->fetch_assoc() ) {
		$row = array(); 
		$no++;
		$btnaprove= '<a href="#" onClick="edit(\''.$aRow['id_bidang'].'\')"><button type="button" title="Edit Data" class="btn btn-info btn-xs"><i class="fa fa-edit"></i> Edit</button></a> 
		<a href="#" onClick="hapus	(\''.$aRow['id_bidang'].'\')"><button type="button" title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
	  		
		   //$btn.= '<a href="#" onClick="deleteUser(\''.$aRow['nourut'].'\')"><button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</button></a> ';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		 $btndetail='<a href="detail-realisasi-kinerja-bidang-'.$aRow['id_bidang'].'""><button type="button" title="Lihat Daftar" class="btn btn-primary btn-xs"><i class="fa fa-list"></i> Lihat Daftar</button></a>'; 		
		 
		 $hitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and tri1=1");
		 $jumlah_record1x=mysqli_num_rows($hitung1);

		 $phitung1=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=1");
		 $pjumlah_record1x=mysqli_num_rows($phitung1); 

		 $persentotaltri1x=($pjumlah_record1x/$jumlah_record1x)*100;
		 $persentotaltri1=round($persentotaltri1x,2);
	
		if ($jumlah_record1x==0){
		$datatri1='<span class="badge bg-danger" style="font-size:11px">0%</span>';	
		}else{
		if ($persentotaltri1 >=60){
		$datatri1='<span class="badge bg-success" style="font-size:11px">'.$persentotaltri1.'%</span>';
		}else{
		$datatri1='<span class="badge bg-danger" style="font-size:11px">'.$persentotaltri1.'%</span>';
		}
		}
		 
		 $hitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and tri2=1");
		 $jumlah_record2x=mysqli_num_rows($hitung2);
		 $phitung2=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=2");
		 $pjumlah_record2x=mysqli_num_rows($phitung2); 

		 $persentotaltri2x=($pjumlah_record2x/$jumlah_record2x)*100;
		 $persentotaltri2=round($persentotaltri2x,2);
	
		if ($jumlah_record2x==0){
		$datatri2='<span class="badge bg-danger" style="font-size:11px">0%</span>';	
		}else{
		if ($persentotaltri2 >=60){
		$datatri2='<span class="badge bg-success" style="font-size:11px">'.$persentotaltri2.'%</span>';
		}else{
		$datatri2='<span class="badge bg-danger" style="font-size:11px">'.$persentotaltri2.'%</span>';
		}
		}
		 $hitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and tri3=1");
		 $jumlah_record3x=mysqli_num_rows($hitung3);
		 $phitung3=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=3");
		 $pjumlah_record3x=mysqli_num_rows($phitung3); 

		 $persentotaltri3x=($pjumlah_record3x/$jumlah_record3x)*100;
		 $persentotaltri3=round($persentotaltri3x,2);
	
		if ($jumlah_record3x==0){
		$datatri3='<span class="badge bg-danger" style="font-size:11px">0%</span>';	
		}else{
		if ($persentotaltri3 >=60){
		$datatri3='<span class="badge bg-success" style="font-size:11px">'.$persentotaltri3.'%</span>';
		}else{
		$datatri3='<span class="badge bg-danger" style="font-size:11px">'.$persentotaltri3.'%</span>';
		}
		}
		 $hitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_ikk_bidang where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and tri4=1");
		 $jumlah_record4x=mysqli_num_rows($hitung4);
		 $phitung4=mysqli_query($GLOBALS["___mysqli_ston"], "select * from tb_nilai_ikk_tri1 where id_bidang='$aRow[id_bidang]' and tahun='$_SESSION[tahun]' and triwulan=4");
		 $pjumlah_record4x=mysqli_num_rows($phitung4); 

		 $persentotaltri4x=($pjumlah_record4x/$jumlah_record4x)*100;
		 $persentotaltri4=round($persentotaltri4x,2);
	
		if ($jumlah_record4x==0){
		$datatri4='<span class="badge bg-danger" style="font-size:11px">0%</span>';	
		}else{
		if ($persentotaltri42 >=60){
		$datatri4='<span class="badge bg-success" style="font-size:11px">'.$persentotaltri4.'%</span>';
		}else{
		$datatri4='<span class="badge bg-danger" style="font-size:11px">'.$persentotaltri4.'%</span>';
		}
		}
		//$aRow['nousul']
		$row = array('<center>'.$no,'<font style="font-size:14px;">'.$aRow['nama_bidang'],'<center>'.$datatri1,'<center>'.$datatri2,'<center>'.$datatri3,'<center>'.$datatri4, '<center>'.$btndetail);
		$output['aaData'][] = $row;
 }
//}
	echo json_encode( $output );


?>
