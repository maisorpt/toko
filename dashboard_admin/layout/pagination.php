<ul class="pagination justify-content-center ">
    <li class="page-item <?php if($halaman > 1) "" ; "disabled"  ?> shadow-sm">
      <a class="page-link"<?php if($halaman > 1) { echo "href='?halaman=$previous'"; } ?>>Previous</a>
    </li>
    <?php 
				for($x=1;$x<=$total_halaman;$x++){
					?> 
          
	<li class="page-item shadow"><a class="page-link " href="?halaman=<?php echo $x; ?>"><?php echo $x; ?></a></li>
					<?php
				}
				?>	
  	<li class="page-item shadow">
					<a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?halaman=$next'"; } ?>>Next</a>
    </li>
  </ul>