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
	$aColumns = array( 'id_ikk', 'id_data', 'id_data','tri1','tri2','tri3','tri4','posting','tahun'); //Kolom Pada Tabel
	
	// Indexed column (used for fast and accurate table cardinality)
	$sIndexColumn = 'id_ikk';
		
	// DB table to use
	$sTable = 'tb_ikk_bidang'; // Nama Tabel
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
		$sWhere = " WHERE ".implode(" AND ", $aFilteringRules)." and tahun='$_SESSION[tahun]' and id_bidang='$_POST[id]'";
		} else {
		$sWhere = " where tahun='$_SESSION[tahun]' and id_bidang='$_POST[id]'";
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
		$btnaprove= '<a href="#" onClick="aktif(\''.$aRow['id_ikk'].'\')"><button type="button" title="Aktifkan Triwulan" class="btn btn-primary btn-xs"><i class="fa fa-check-square"></i> Triwulan</button></a> 
		<a href="#" onClick="hapus	(\''.$aRow['id_ikk'].'\')"><button type="button" title="Hapus Data" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</button></a>';
	  		
		   //$btn.= '<a href="#" onClick="deleteUser(\''.$aRow['nourut'].'\')"><button type="button" class="btn btn-danger btn-xs"><i class="glyphicon glyphicon-trash"></i> Hapus</button></a> ';
		for ( $i=0 ; $i<$iColumnCount ; $i++ ) {
			$row[] = $aRow[ $aColumns[$i] ];
		}
		
		if ($aRow['status']==0){
		$status="<button type='button' class='btn btn-danger btn-xs'><i class='fa fa-times-circle'></i> Tidak Aktif</button>";	
		}else{
		$status="<button type='button' class='btn btn-primary btn-xs'><i class='fa fa-check-circle'></i> Aktif</button>";		
		}
		
		$rs1 = mysqli_query($GLOBALS["___mysqli_ston"],"select * from tb_outcome where id_outcome='$aRow[id_data]'");
		$cari1 = mysqli_fetch_array($rs1);  
		
		if ($aRow['tri1']==0){
		$tri1="<center><font style=color:red><i class='fa fa-times-circle' title='Tidak Aktif'></i></font>";	
		}else{
		$tri1="<center><font style=color:green><i class='fa fa-check-circle' title='Aktif'></i></font>";		
		}
		if ($aRow['tri2']==0){
		$tri2="<center><font style=color:red><i class='fa fa-times-circle' title='Tidak Aktif'></i></font>";	
		}else{
		$tri2="<center><font style=color:green><i class='fa fa-check-circle' title='Aktif'></i></font>";		
		}
		if ($aRow['tri3']==0){
		$tri3="<center><font style=color:red><i class='fa fa-times-circle' title='Tidak Aktif'></i></font>";	
		}else{
		$tri3="<center><font style=color:green><i class='fa fa-check-circle' title='Aktif'></i></font>";		
		}
		if ($aRow['tri4']==0){
		$tri4="<center><font style=color:red><i class='fa fa-times-circle' title='Tidak Aktif'></i></font>";	
		}else{
		$tri4="<center><font style=color:green><i class='fa fa-check-circle' title='Aktif'></i></font>";		
		}
		//$aRow['nousul']
		$row = array('<center>'.$no,'<font style="font-size:14px;">'.$cari1['uraian_outcome'], $tri1, $tri2, $tri3, $tri4, '<center>'.$btnaprove);
		$output['aaData'][] = $row;
 }
//}
	echo json_encode( $output );


?>
