	<?php
	require_once'../../koneksi.php';
	require_once'../../fungsi.php';
	?>
	<style>
	.scroll{
		display:block;
		border:1px solid #D3D3D3;
		padding:5px;
		margin-top:5px;
		width:100%;
		height:420px;
		overflow:scroll;
	}
	.auto{
 	display:block;
		border:1px solid #DCDCDC;
		padding:5px;
		margin-top:5px;
		width:100%;
		height:550px;
		overflow:auto;
	}
	
	</style>
	<hr> 
	<div class=scroll>
	<table id="example2x" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                            <thead>
                                               <tr style="font-size:12px"> 
													<th width='90%'><center>Uraian Indikator IKK</center></th> 
													<th style="width:20px;"><center><input type="checkbox" onchange="checkAll(this)"></center></th>
                                                </tr>
                                            </thead>
	<?php
										$no=0;
										$cektabel=mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tb_outcome where tahun='".$_GET['tahun']."'");
											  while($cekdis=mysqli_fetch_array($cektabel)){  
										$no++;	  
										$btn='<input type=checkbox name="kode[]" id="kode" value='.$cekdis['id_outcome'].'>';	 
												?>
												
												<tr style="font-size:12px"> 
												<td><?php echo $cekdis['uraian_outcome'] ?><input type=hidden name="uraiansalin[]" value="<?php echo $cekdis['uraian_outcome'] ?>"</td> 
												<td align=center><?php echo $btn ?></td>
												</tr>
											<?php } ?>
											<tbody>
                                            </tbody>
											</table>
											</div>