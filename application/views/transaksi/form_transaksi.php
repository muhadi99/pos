<h3>Form Transaksi</h3>

<?php
echo form_open('transaksi');
?>
<table class="table table-bordered">
	<tr class="success"><th>Form</th></tr>
	<tr>
		<td>
			<div class="col-sm-5">
				<input list="barang" name="barang" placeholder="Masukkan Nama Barang" class="form-control"></input>
			</div>
			<div class="col-sm-1">
				<input type="text" name="qty" placeholder="QTY" class="form-control"></input>
			</div>
		</td>
	</tr>
	<tr>
		<td><button type="submit" name="submit" class="btn btn-primary btn-sm">Simpan</button>
		<?php echo anchor('transaksi/selesai','Selesai',array('class'=>'btn btn-primary btn-sm')) ?></td>
	</tr>
</table>
</form>
<hr>

<!-- coba -->
<?php
echo form_open('transaksi');
?>
<table class="table table-bordered">
	<tr class="success"><th>Form</th></tr>
	<tr>
		<td>
			<div class="col-sm-5">
				<input name="bayar" placeholder="Masukkan Pembayaran" class="form-control"></input>
			</div>
		</td>
	</tr>
	<tr>
		<td><button type="submit" name="bayar" class="btn btn-primary btn-sm">Bayar</button>
		<!-- <?php echo anchor('transaksi/selesai','Selesai',array('class'=>'btn btn-primary btn-sm')) ?></td> -->
	</tr>
</table>
</form>
<hr>
<!-- coba -->

<table class="table table-bordered">
	<tr class="success"><th colspan="6">Detail Transaksi</th></tr>
	<tr><th>NO</th><th>Nama Barang</th><th>QTY</th><th>Harga</th><th>Subtotal</th><th>Cancel</th></tr>
	<?php
	$no = 1;
	$total= 0;
	foreach ($detail->result() as $d) {
		echo "<tr>
				<td width='10'>$no</td>
				<td>$d->nama_barang</td>
				<td width='120'>$d->qty</td>
				<td width='120'>$d->harga</td>
				<td width='120'>".$d->qty * $d->harga."</td>
				<td>".anchor('transaksi/hapusitem/'.$d->t_detail_id,'Delete')."</td>
			</tr>";
	$total=$total+($d->qty * $d->harga);
	$no++;
		}
	 ?>
	<tr><td colspan="4"><p align="center"><b>TOTAL</b></p></td><th>Rp. <?php echo $total; ?></th><th></th></tr>
	<tr><td colspan="4"><p align="center"><b>TOTAL PEMBAYARAN</b></p></td><th></th><th></th></tr>
	<tr><td colspan="4"><p align="center"><b>HASIL TRANSAKSI</b></p></td><th></th><th></th></tr>

</table>

<datalist id="barang">
	<?php
		foreach ($barang->result() as $b) {
			echo "<option value='$b->nama_barang'></option>";
		}
	 ?>
</datalist>