<div id="main-content">
          <div class="container">
	<section id="home">
  <div class="row">
    <!-- main content -->
	<h3>Edit Page <?php echo $dt->judul;?></h3>
	<form class="form-horizontal" action="<?php echo base_url("webmaster/editpage/proses")?>" method="post">
        <!-- full-name input-->
        <div class="control-group">
            <label class="control-label">Judul Page</label>
            <div class="controls">
				<input id="full-name" name="id" value="<?php echo $dt->id_page;?>" type="hidden" >
                <input id="full-name" name="judul" value="<?php echo $dt->judul;?>" type="text" placeholder="Full name"
                class="input-xlarge">
                <span style="color:red;"><p class="help-block"><?php echo form_error('judul') ?></span></p>
            </div>
        </div>
		<div class="control-group">
            <label class="control-label">Isi Page</label>
            <div class="controls">
                <textarea class="ckeditor" cols="80" id="editor1" rows="10" name="isi"><?php echo $dt->isi;?></textarea>
                <span style="color:red;"><p class="help-block"><?php echo form_error('isi') ?></span></p>
            </div>
        </div>
	<div class="control-group">
    <div class="controls">
      <button type="submit" class="btn large primary">Update</button>
    </div>
	</div>
</form>
  </div>
</section>
         </div>
</div>