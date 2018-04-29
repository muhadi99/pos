<h3>Edit Data Kategori</h3>
<?php
echo form_open('kategori/edit');
?>
<input type="hidden" value="<?php echo $record['kategori_id'] ?>" name="id" ></input>
<table class="table table-bordered">
	<tr>
		<td width="150">Nama Kategori  </td>
		<td><div class="col-sm-8"><input type="text" name="kategori" placeholder="!---kategori---!" class="form-control"  value="<?php echo $record['nama_kategori'];?>"></input></div></td>
	</tr>
	<tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
	<?php echo anchor('kategori','Kembali',array('class'=>'btn btn-primary btn-sm')); ?></td></tr>
</table>
</form>