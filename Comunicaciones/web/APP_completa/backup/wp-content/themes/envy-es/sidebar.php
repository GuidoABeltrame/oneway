		<div class="sidebar">

			<ul>

				<li><div class="sidebar-title">Sidebar</div>
					<ul>

<?php if ( function_exists('dynamic_sidebar') && dynamic_sidebar(1) ) : else : ?>

						<?php wp_list_pages('title_li=<h2>' . __('Pages') . '</h2>'); ?>

						<li><h2><?php _e('Categorías'); ?></h2>
						<ul>
							<?php wp_list_cats('sort_column=name&optioncount=1&hierarchical=0'); ?>
						</ul>
						</li>

						<li><h2><?php _e('Archivos'); ?></h2>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
						</li>

						<?php get_links_list(); ?>

						<li><h2><?php _e('Meta'); ?></h2>
						<ul>
							<?php wp_register(); ?>
							<li><?php wp_loginout(); ?></li>
							<?php wp_meta(); ?>
						</ul>
						</li>

<?php endif ;?>

					</ul>
				</li>

			</ul>

		</div>