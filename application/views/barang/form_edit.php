<h3>Update Data Barang</h3>
<?php
echo form_open('barang/update');
?>
<input type="hidden" name="id" value="<?php echo $record['barang_id'] ?>"></input>
<table class="table table-bordered">
	<tr>
		<td width="150">Nama Barang  </td>
		<td><input type="text" name="nama_barang" value="<?php echo $record['nama_barang'] ?>" class="form-control" placeholder="!---nama_barang---!"></input></td>
	</tr>

	<tr>
		<td>Kategori  </td>
		<td>
			<select name="kategori" class="form-control">
				<?php
				foreach ($kategori as $k) {
					echo "<option value='$k->kategori_id'";
					echo $record['kategori_id']==$k->kategori_id?'selected':'';
					echo ">$k->nama_kategori</option>";
				}
				?>
			</select>
		</td>
	</tr>

	<tr>
		<td>Harga  </td>
		<td><input type="text" name="harga" class="form-control" value="<?php echo $record['harga'] ?>" placeholder="!---harga---!"></input></td>
	</tr>

	<tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
	<?php echo anchor('barang','Kembali',array('class'=>'btn btn-primary btn-sm')); ?></td></tr>
</table>
</form>