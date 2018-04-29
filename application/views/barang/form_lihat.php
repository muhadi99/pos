<h3>Lihat Data Barang</h3>
<?php
echo form_open('barang/view');
?>
<input type="hidden" name="id" value="<?php echo $record['barang_id'] ?>"></input>
<table class="table table-bordered">
	<tr>
		<td>Nama Barang  </td>
		<td><?php echo $record['nama_barang'] ?></td>
	</tr>

	<tr>
		<td>Kategori  </td>
<!-- 	<td><?php echo $nama_k['nama_kategori']==$nama_k->nama_kategori?'selected':'' ?></td> !-->
				<td>
			<select name="kategori">
				<?php
				foreach ($kategori as $k) {
					echo "<option value='$k->kategori_id'";
					echo $record['kategori_id']==$k->kategori_id?'selected':'';
					echo ">$k->nama_kategori</option>";
				}
				?>
			</select>
		</td></tr>

	<tr>
		<td>Harga  </td>
		<td><?php echo $record['harga'] ?></td>
	</tr>
	<tr><td colspan="2"><?php echo anchor('barang','Kembali',array('class'=>'btn btn-primary btn-sm')); ?></td></tr>

</table>
</form>