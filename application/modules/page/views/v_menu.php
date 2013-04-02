		  <ul class="nav">
            <li><a href="<?php echo base_url();?>">Home</a></li>
            <?php 
				foreach($menulist->result() as $menu)
				{
					$lk=$menu->link;
					$link=base_url($lk);
					$act='';
					if($this->uri->segment(1)==$menu->link)
					{
						$act='active';
					}
					echo "<li><a href='$link' class='$act'>$menu->judul</a></li>";
				}
			?>
			<li><a href="<?php echo base_url("contact");?>">Contact</a></li>
		</ul>
          <ul class="nav secondary-nav">
                
                <li><a href="<?php echo base_url("daftar");?>">Register</a></li>
		  </ul>        
		 </div> 
      </div>
    </div>