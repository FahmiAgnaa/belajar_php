<!-- form mahasiswa -->
<div class="panel panel-primary">
	<div class="panel-heading">Form Data Mahasiswa</div>
		<div class="panel-body">
			<form method="post" action="">
				<div class="form-group">
					<label>NIM</label>
					<input type="text" name="nim" value="" class="form-control" />
				</div>
				<div class="form-group">
					<label>Nama Mahasiswa</label>
					<input type="text" name="nama" value="" class="form-control" />
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" value="" class="form-control" />
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jkel" class="form-control">
						<option></option>
						<option value="Pria">Laki-laki</option>
						<option value="Wanita">Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="telp" value="" class="form-control" />
				</div>

				<button name="" class="btn btn-primary">Simpan</button>
				<button class="btn btn-danger">Batal</button>
			</form>
		</div>
	</div>


	<div class="panel panel-primary">
		<div class="panel-heading">Data Mahasiswa</div>
		<div class="panel-body">
			<table class="table table-striped table-bordered table-hover">
				<tr class="info">
					<th>No.</th>
					<th>Nama Mahasiswa</th>
					<th>Aksi</th>
				</tr>
			<tr>
				<td>1</td>
				<td></td>
				<td>

				</td>
			</tr>
		</table>
	</div>

</div><!--Akhir form mahasiswa-->
