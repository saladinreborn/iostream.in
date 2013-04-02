<div id="main-content">
          <div class="container">
	<section id="home">
  <div class="row">
    <!-- main content -->
	<h2>Manage Page</h2>
	<br/>
	<table class="table table-bordered table-hover">
	<thead>
		<tr>
			<th>#</th>
			<th>Judul Menu</th>
			<th>Isi</th>
			<th>Terakhir Update</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
	<?php
	$no=1;	
	foreach($dt->result() as $m){
		$isi = htmlspecialchars(substr($m->isi,0,100));
		$link=base_url("webmaster/editpage/$m->link");
		$status=$m->status=='1'?'Aktif':'Tidak Aktif';
		$tgl=tgl_indo($m->tanggal);
		echo "<tr>
			<td>$no</td>
			<td>$m->judul</td>
			<td>$isi</td>
			<td>$tgl</td>
			<td>$status</td>
			<td><a href=$link>Edit</a></td>
			</tr>";	
	$no++;
	}
	?>
	</tbody>
	</table>
  </div>
</section>
         </div>
</div>