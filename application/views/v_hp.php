<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title></title>
		<!-- <style media="screen">
		@font-face {
		  src: url(../assets/font/tayo.ttf);
		  font-family: tayo;
		}
		@font-face {
			src: url(../assets/font/hiya.ttf);
			font-family: hiya;
		}
			td, th{
				color: #1C3341;
				font-family: tayo;
				font-size: 20px;
			}
			th{
				font-size: 23px;
			}

			h1{
				color: white;
				margin-top: 5px;
				margin-bottom: 25px;
				font-family: hiya;
				font-size: 45px;
				text-align: center;
			}

		</style> -->
	</head>
	<body>

		<h1>hp</h1>

		<?php if($this->session->flashdata('pesan')): ?>


			<div class="alert alert-warning"><?= $this->session->flashdata('pesan') ?></div>


		<?php endif?>



		<?php if($this->session->userdata('level')=="admin"){?>
		<a href="#tambah" class="btn btn-primary" data-toggle="modal" style="float: right;">Tambah</a>

		<?php }?>
		<table class="table table-hover table-stripped">

			<thead>

				<tr>

					<th>No</th><th>Kode HP</th><th> Nama HP</th><th>Kategori</th><th>Harga</th>
					<!-- <td>cover</td> -->
					<th>Stok</th><th></th><th></th>

				</tr>

			</thead>

			<tbody>


				<?php $no = 0; foreach($hp as $bk): $no++;?>







				<tr>

					<td><?=$no?></td><td><?=$bk->kode_hp?></td><td><?=$bk->nama_hp?></td><td><?=$bk->nama_kategori?></td><td><?=$bk->harga?></td>
					<!-- <td><img src="<?=base_url('assets/gambar/'.$bk->cover)?>" style="width:40px;"></td> -->
					<td><?=$bk->stok?></td>

					<td><?php if($this->session->userdata('level')=="admin"){?> <a href="#ubah" data-toggle="modal" onclick="edit(<?=$bk->kode_hp?>)"  class="btn btn-warning">Ubah</a><?php }else{ 		echo "anda kasir"; }?></td>

					<td><?php if($this->session->userdata('level')=="admin"){?><a href="<?=base_url('index.php/hp/hapus/'.$bk->kode_hp)?>" onclick="return confirm('apakah anda yakin untuk menghapus')" class="btn btn-danger">Hapus</a><?php }else{ echo "anda kasir"; }?></td>

				</tr>



			<?php endforeach?>


		</tbody>

		</table>




		<div class="modal fade" id="tambah" >
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">


					<div class="row">

					<div class="col-md-6">
						<div class="modal-title">Tambah HP</div>
					</div>
					<div class="col-md-6">
						<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
						</div>

						</div>

					</div>

					<div class="modal-body">


						<form action="<?=base_url('index.php/hp/tambah')?>" method="post" enctype="multipart/form-data">

							<table>
							<tr>
									<td>Kode Hp</td>
									<td><input type="text" name="kode_hp" style="margin-left: 20px;"></td>
								</tr>
								<tr>
									<td>Nama Hp</td>
									<td><input type="text" name="nama_hp" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>kategori</td>
									<td>


										<select name="kategori" style="margin-left: 20px; ">
											<?php foreach ($kategori as $kt): ?>

												<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
											<?php endforeach?>
										</select>
									</td>
								</tr>

								<tr>
									<td>harga</td>
									<td><input type="text" name="harga" style="margin-left: 20px;"></td>
								</tr>

								<!-- <tr>
									<td>foto cover</td>
									<td><input type="file" name="cover" style="margin-left: 20px;"></td>
								</tr> -->


								<tr>
									<td>stok</td>
									<td><input type="number" name="stok" style="margin-left: 20px;"></td>
								</tr>

							</table>


							<center><input type="submit" name="tambah" value="tambah" class="btn btn-warning" style="margin-top: 30px;"></center>

						</form>

					</div>
				</div>
			</div>

		</div>



		<div class="modal fade" id="ubah" >
			<div class="modal-dialog">

				<div class="modal-content">
					<div class="modal-header">

						<div class="row">

					<div class="col-md-6">
						<div class="modal-title">Ubah HP</div>
					</div>
					<div class="col-md-6">
						<button class="btn " data-dismiss = "modal" style="float: right; ">X</button>
						</div>

						</div>
					</div>

					<div class="modal-body">


						<form action="<?=base_url('index.php/Hp/update')?>" method="post" enctype="multipart/form-data">

							<table>

								<input type="hidden" name="kode_hp" required id="kode_hp" style="margin-left: 20px;">

								<tr>
									<td>nama hp</td>
									<td><input type="text" name="nama_hp"  required  id="nama_hp" style="margin-left: 20px;"></td>
								</tr>


								<tr>
									<td>kategori</td>
									<td>


										<select name="kategori" style="margin-left: 20px; " id="kategori" required >
											<?php foreach ($kategori as $kt): ?>

												<option value="<?= $kt->kode_kategori?>" ><?= $kt->nama_kategori?></option>
											<?php endforeach?>
										</select>
									</td>
								</tr>

								<tr>
									<td>harga</td>
									<td><input type="text" name="harga" required  id="harga" style="margin-left: 20px;"></td>
								</tr>

								<!-- <tr>
									<td>foto cover</td>
									<td><input type="file" name="cover"   id="cover" style="margin-left: 20px;"></td>
								</tr> -->
		<!--
								<tr>
									<td>penerbit</td>
									<td><input type="text" name="penerbit" required   id="penerbit" style="margin-left: 20px;"></td>
								</tr>

								<tr>
									<td>penulis</td>
									<td><input type="text" name="penulis" required  id="penulis" style="margin-left: 20px;"></td>
								</tr> -->

								<tr>
									<td>stok</td>
									<td><input type="number" name="stok" required  id="stok" style="margin-left: 20px;"></td>
								</tr>

							</table>


							<center><input type="submit" value="Ubah" name="update" required  class="btn btn-warning" style="margin-top: 30px;"></center>

						</form>

					</div>
				</div>
			</div>

		</div>




		<script >


			function edit(kode_hp){
				$.ajax({
					type:"post",
					url:"<?=base_url()?>index.php/Hp/tampil_ubah_hp/"+kode_hp,
					dataType:"json",


					success:function(data){
						$("#kode_hp").val(data.kode_hp);
						$("#nama_hp").val(data.nama_hp);
						$("#tahun").val(data.tahun);
						$("#kategori").val(data.kode_kategori);
						$("#harga").val(data.harga);
						$("#penerbit").val(data.penerbit);
						$("#penulis").val(data.penulis);
						$("#stok").val(data.stok);
					}
				});
			}

		</script>

	</body>
</html>
