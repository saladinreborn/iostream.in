<div id="main-content">
          <div class="container">
	<section id="home">
  <div class="row">
    <!-- main content -->
	<h2>DATA MEMBER</h2>
	<br/>
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>NAMA</th>
			<th>EMAIL</th>
			<th>INSTANSI</th>
			<th>NO HP</th>
			<th>STATUS</th>
			<th>Tanggal Daftar</th>
			<th>ALAMAT</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no=1;
	$jum=0;
	foreach($dt->result() as $m){
		$status=$m->status_member=='m'?'Pelajar':'Umum';
		$tgl=tgl_indo($m->tanggal_daftar);
		echo "<tr>
			<td>$no</td>
			<td>$m->nama</td>
			<td>$m->email</td>
			<td>$m->instansi</td>
			<td>$m->no_hp</td>
			<td>$status</td>
			<td>$tgl</td>
			<td>$m->alamat</td>
			</tr>";	
		$no++;
		$jum++;
	}
	?>
	</tbody>
	</table>
	<a href="<?php echo base_url("webmaster/to_xls");?>"><button class="btn large primary">Cetak XLS</button></a>
	Total Peserta : <?php echo $jum;?>
  </div>
</section>
         </div>
</div>