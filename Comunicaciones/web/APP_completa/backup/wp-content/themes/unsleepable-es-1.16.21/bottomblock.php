<?php { 
$k2about = get_option('k2aboutblurp');
 ?>
<hr />
<div id="glass-bottomblock">

	<div class="bottomblockleft">
		<h2>Art&iacute;culos recientes</h2>
		
			<div class="sb-latest"><ul>
				<?php wp_get_archives('type=postbypost&limit=11'); ?>

			
		</ul></div>
		<!-- <br style="clear: both;" /> -->
	</div>
    <?php if ((function_exists('blc_latest_comments'))) { ?>
	<div class="bottomblockmiddle">	
		<h2>&Uacute;ltimos comentarios</h2>
		

    <div class="sb-comments"><ul>
       
            <?php blc_latest_comments('5','3','false'); ?>
        </ul>
   
    </div>

	</div><?php } ?>

	<div class="bottomblockright">
		<h2>Acerca de</h2>
		<div class="ft-about">
					<p><?php echo stripslashes($k2about); ?></p>

			</div>
		</div>
	</div>
</div>
<?php } ?>