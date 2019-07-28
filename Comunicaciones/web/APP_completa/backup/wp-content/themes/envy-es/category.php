<?php get_header(); ?>

		<div class="main">

			<?php if(have_posts()) : ?><?php while(have_posts()) : the_post(); ?>

			<div class="post" id="post-<?php the_ID(); ?>">

				<div class="post-date"><?php the_time('F jS, Y') ?></div>

				<h2><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>

				<div class="entry">

					<div class="postmetadata">
						<ul>
							<li class="author">by <?php the_author_link(); ?></li>
							<li class="comment-number"><?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?></li>
						</ul>
					</div>

					<div class="clear"></div>

					<?php the_excerpt(); ?>

<script src="http://feeds.feedburner.com/~s/Wpdesigner?i=<?php the_permalink() ?>" type="text/javascript" charset="utf-8"></script>

	 				<p class="filedunder">Filed under: <?php the_category(', ') ?> &#124; <?php comments_popup_link('No Comments', '1 Comment', '% Comments'); ?> <?php edit_post_link('Edit', '', ''); ?></p>

					<!-- <?php trackback_rdf(); ?> -->
				</div>
			</div>			

			<?php endwhile; ?>

			<div class="previous-next">

				<ul>
					<li><?php next_posts_link('<span class="previous">Previous</span>') ?></li>
					<li><?php previous_posts_link('<span class="next">Next</span>') ?></li>
				</ul>
				
			</div>

			<?php else : ?>

			<div class="post">
				<div class="post-date">Not Found</div>
				<h2>You've reached the end.</h2>
				<div class="entry">
					<p>There's nothing here for you. Go back!</p>
				</div>
			</div>

			<?php endif; ?>

		</div>

<?php get_sidebar(); ?>

<?php get_footer(); ?>