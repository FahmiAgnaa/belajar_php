<?php
	// uji jika tombol simpan diklik
	if(isset($_POST['bsimpan']))
	{
		//query simpan data
		$simpan = mysqli_query($koneksi, "INSERT INTO tmhs (nim, nama, alamat, jkel, telp)
			values (
					'$_POST[nim]',
					'$_POST[nama]',
					'$_POST[alamat]',
					'$_POST[jkel]',
					'$_POST[telp]'
					)");

		// uji jika simpan data berhasil
		if($simpan)
		{
			echo "<script> alert('Simpan Data Berhasil!');
				document.location='index.php' </script>";
		}
	}
	
	// uji jika berhasil hapus data
	if(isset($_GET['hal']))
	{
		//uji apakah mau hapus data
		if($_GET['hal']=='hapus')
		{
			//query hapus data
			$hapus = mysqli_query($koneksi, "DELETE FROM tmhs WHERE nim = '$_GET[nim]'");

			// uji jika berhasil hapus data
			if($hapus){
				echo "<script> alert('Hapus Data Berhasil!');
				document.location='index.php' </script>";
			}
		}
		elseif($_GET['hal']=='edit')
		{
			// jika mau edit, maka tampilkan data yang sudah ada
			// ubah data berdasarkan pencarian NIM
			$tampil = mysqli_query($koneksi, "SELECT * FROM tmhs WHERE nim = '$_GET[nim]'");
			$data = mysqli_fetch_array($tampil);

			if($data)
			{
				// jika data ada, maka tampilkan data
				$vnim		= $data['nim'];
				$vnama		= $data['nama'];
				$valamat	= $data['alamat'];
				$vjkel		= $data['jkel'];
				$vtelp		= $data['telp'];
			}

			// jika data tampil, maka tombol simpan berubah menjadi edit
			$namatombol		= 'bedit';
			$labeltombol	= 'ubah';
		}
	}
	else
	{
		// jika data tidak ditemukan, maka kembalikan label edit menjadi simpan
		$namatombol		= 'bsimpan';
		$labeltombol	= 'Simpan';
	}

	// uji jika tombol ubah diklik
	if(isset($_POST['bedit']))
	{
		// query ubah data
		$edit = mysqli_query($koneksi, "UPDATE tmhs SET
			nama = '$_POST[nama]',
			alamat = '$_POST[alamat]',
			jkel = '$_POST[jkel]',
			telp = '$_POST[telp]'
			WHERE nim = '$_Get[nim]'");

		// uji jika berhasil ubah data
		if($edit)
		{
			echo "<script> alert('Berhasil Ubah Data!');
				document.location='index.php' </script>";
		}
	}



?>

<!-- form mahasiswa -->
<div class="panel panel-primary">
	<div class="panel-heading">Form Data Mahasiswa</div>
		<div class="panel-body">
			<form method="post" action="">
				<div class="form-group">
					<label>NIM</label>
					<input type="text" name="nim" value="<?php echo @$vnim; ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Nama Mahasiswa</label>
					<input type="text" name="nama" value="<?php echo @$vnama; ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<input type="text" name="alamat" value="<?php echo @$valamat; ?>" class="form-control" />
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select name="jkel" class="form-control">
						<option></option>
						<option value="Pria" <?=(@$vjkel=='Pria')? 'selected' : ''; ?>>Laki-laki</option>
						<option value="Wanita" <?=(@$vjkel=='Wanita')? 'selected' : ''; ?>>Perempuan</option>
					</select>
				</div>
				<div class="form-group">
					<label>No. Telepon</label>
					<input type="text" name="telp" value="<?php echo @$vtelp; ?>" class="form-control" />
				</div>

				<button name="<?=$namatombol?>" class="btn btn-primary"><?=$labeltombol?></button>
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
					<th>NIM</th>
					<th>Nama Mahasiswa</th>
					<th>Alamat</th>
					<th>Jenis Kelamin</th>
					<th>No. Telepon</th>
					<th>Aksi</th>
				</tr>
				<?php
					$tampil = mysqli_query($koneksi, "select * from tmhs");
					$no = 1;
					while($data = mysqli_fetch_array($tampil))
					{
				?>
			<tr>
				<td><?=$no ?></td>
				<td><?=$data['nim'] ?></td>
				<td><?=$data['nama'] ?></td>
				<td><?=$data['alamat'] ?></td>
				<td><?=$data['jkel'] ?></td>
				<td><?=$data['telp'] ?></td>
				<td>
					<a href="?hal=edit&nim=<?=$data['nim']?>"
						class="btn btn-success">Edit </a>

					<a href="?hal=hapus&nim=<?=$data['nim']?>"
						onclick="return confirm('Hapus Data?')"
						class="btn btn-dager">Hapus </a>



					
				</td>
				<?php
					$no+=1;
				}
				?>

			</tr>
					
		</table>
	</div>
	</div>

</div><!--Akhir form mahasiswa-->
