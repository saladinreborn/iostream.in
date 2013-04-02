<div id="main-content">
          <div class="container">
	<section id="home">
  <div class="row">
    <!-- main content -->
	 
	 <div id="main" class="span12 columns">
     <h2>Form Pendaftaran Android Geek Workshop</h2>
	 <br/>
<form class="form-horizontal" action="<?php echo base_url("member/daftar/proses")?>" method="post">
	
        <!-- full-name input-->
        <div class="control-group">
            <label class="control-label">Nama Lengkap</label>
            <div class="controls">
                <input id="full-name" name="nama" type="text" placeholder="Nama Lengkap"
                class="input-xlarge"><span style="color:red;"> *</span>
                <span style="color:red;"><p class="help-block"><?php echo form_error('nama') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">Jenis Kelamin</label>
            <div class="controls">
                <select name="jk">
				  <option value="l">Laki-Laki</option>
				  <option value="p">Perempuan</option>
				</select><span style="color:red;"> *</span>
				<span style="color:red;"><p class="help-block"><?php echo form_error('jk') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">Kategori Peserta</label>
            <div class="controls">
                 <input id="full-name" name="kategori" type="radio" value="m" > Pelajar / Mahasiswa
				 <input id="full-name" name="kategori" type="radio" value="u" > Umum <span style="color:red;"> *</span>
				 <span style="color:red;"><p class="help-block"><?php echo form_error('kategori') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">Nama Instansi / Universitas</label>
            <div class="controls">
                <input id="full-name" name="instansi" type="text" placeholder="Nama Instansi / Universitas"
                class="input-xlarge"><span style="color:red;"> *</span>
                <span style="color:red;"><p class="help-block"><?php echo form_error('instansi') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input id="full-name" name="email" type="text" placeholder="Email"
                class="input-xlarge"><span style="color:red;"> *</span>
                <span style="color:red;"><p class="help-block"><?php echo form_error('email') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">No. Handphone</label>
            <div class="controls">
                <input id="full-name" name="nope" type="text" placeholder="Phone Number"
                class="input-xlarge"><span style="color:red;"> *</span>
                <span style="color:red;"><p class="help-block"><?php echo form_error('nope') ?></span></p>
            </div>
        </div>
        <!-- postal-code input-->
        <div class="control-group">
            <label class="control-label">Alamat</label>
            <div class="controls">
                <textarea name="alamat" class="span5"></textarea>
            </div>
        </div>
		
	<div class="control-group">
    <div class="controls">
      <button type="submit" class="btn large primary">Sign Up</button>
	  <span style="color:red;"> *Wajib Diisi dengan Data yang Benar Untuk Proses Validasi</span>
    </div>
	
	</div>
</form>
	</div>
    <div id="sidebarclass" class="span4 columns">
        <h6>Office</h6>
        <p class="garis">Jalan Bimokurdo no 64G - Barat Kopma UIN Sunan Kalijaga Yogyakarta</p>
        <h6>Contact</h6>
        <p><table class='a'>
			<tr>
				<td>Email </td>
				<td>: <?php echo mailto("cs@iostream.in")?></td>
			</tr>
			<tr>
				<td>HP </td>
				<td>: 0856-4358-5494</td>
			</tr>
			<tr>	
				<td>Telp </td>
				<td>: 0274-835-3885</td>
			</tr>
			</table>
			</p>
    </div>
  </div>
</section>
         </div>
</div>