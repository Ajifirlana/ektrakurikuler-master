<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>
<div class="left">
	<img src="<?php echo base_url()?>assets/img/images.jpeg" alt="Logo SMAN 1 Tempuran" width="100" height="100">
</div>
<div align="center">
							<h3>Laporan Pendaftar Ekstrakurikuler </h3>
							<p>MTsN 2 Palangka Raya</p>
						</div>

<table border="1" width="100%">

<thead>

<tr>
<th>Nama Siswa</th>

 <th>NIS</th>

 <th>Kelas</th>

 <th>Jenis Kelamin</th>

 <th>Tanggal Daftar</th>

 <th>Ekstrakurikuler</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($user as $user) { ?>

<tr>
<td><?php echo $user->nama_siswa ?></td>
 <td><?php echo $user->nis ?></td>

 <td><?php echo $user->kelas ?></td>
<td><?php echo $user->Jenis_kelamin ?></td>

<td><?php echo $user->tanggal_daftar ?></td>

<td><?php echo $user->nama_ekskul ?></td>

 </tr>

<?php $i++; } ?>

</tbody>

</table>