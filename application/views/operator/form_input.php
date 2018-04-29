<h3>Tambah Data Operator</h3>
<?php
echo form_open('operator/post');
?>
<table class="table table-bordered">
	<tr>
		<td width="150">Nama Lengkap </td>
		<td><input type="text" name="nama" class="form-control" placeholder="!---Nama_Lengkap---!"></input></td>
	</tr>
	<tr>
		<td>Username </td>
		<td><input type="text" name="username" class="form-control" placeholder="!---username---!"></input></td>
	</tr>
	<tr>
		<td>Password </td>
		<td><input type="password" name="password" class="form-control" placeholder="!---Password---!"></input></td>
	</tr>
	<tr><td colspan="2"><button type="submit" class="btn btn-primary btn-sm" name="submit">Simpan</button>
	<?php echo anchor('operator','Kembali',array('class'=>'btn btn-primary btn-sm')); ?></td></td></tr>
</table>
</form>