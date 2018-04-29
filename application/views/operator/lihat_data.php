<h3>Data Operator</h3>
<?php
echo anchor('operator/post','Tambahkan Data',array('class'=>'btn btn-primary btn-sm'))
?>
<hr>
<table class="table table-bordered">
	<tr>
		<th>No</th>
		<th>Nama Lengkap</th>
		<th>Username</th>
		<th>Terakhir Login</th>
		<th colspan="3">Operasi</th>
	</tr>
	<?php
	$no=1+$this->uri->segment(3);
	foreach ($record->result() as $r) {
		echo "<tr>
				<td width='10'>$no</td>
				<td>$r->nama_lengkap</td>
				<td>$r->username</td>
				<td>$r->last_login</td>
				<td width='20'>".anchor('operator/lihat/'.$r->operator_id,'Lihat')."</td>
				<td width='20'>".anchor('operator/edit/'.$r->operator_id,'Edit')."</td>
				<td width='20'>".anchor('operator/delete/'.$r->operator_id,'Delete')."</td>
				</tr>";
		$no++;
	}
	?>
</table>
<?php
echo $paging;

?>