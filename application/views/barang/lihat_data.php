<h3>Data Barang</h3>
<?php
echo anchor('barang/post','Tambahkan Data',array('class'=>'btn btn-primary btn-sm'))
?>
<hr>
<table class="table table-bordered">
	<tr><th>No</th><th>Nama Barang</th><th>Kategori Barang</th><th>Harga</th><th colspan="3">Operasi</th></tr>

	<?php
		$no=1+$this->uri->segment(3);
		foreach ($record->result() as $r) {
			echo "<tr>
				<td width='10'>$no</td>
				<td>$r->nama_barang</td>
				<td>$r->nama_kategori</td>
				<td>$r->harga</td>
				<td width='20'>".anchor('barang/view/'.$r->barang_id,'View')."</td>
				<td width='20'>".anchor('barang/update/'.$r->barang_id,'Update')."</td>
				<td width='20'>".anchor('barang/delete/'.$r->barang_id,'Delete')."</td>
			</tr>";
			$no++;
		}
	?>
</table>

<?php
echo $paging;
?>