<?php get_header('404'); ?>
	<div id="main">
		<div id="primary" class="site-content">
			<div id="content" role="main" class="container">
				<article id="post-0" class="entry-error404 no-results not-found">
					<header class="entry-header">
	                    <h1 class="title"><?php esc_html_e('No Pages Were Found For Your Search!', 'semitri'); ?></h1>
						<img src="<?php print get_template_directory_uri(); ?>/assets/images/direction.png" alt="<?php _e('404 Page Not Found', 'semitri'); ?>" />
	             	</header>
					<div class="entry-content">
	                    <p class="description"><?php esc_html_e('
						A shadowy flight into the dangerous world of a man who does not exist. 
						They call him Flipper Flipper faster than lightning. 
						No one you see is smarter than he.
						And we\'ll do it our way yes our way', 'semitri'); ?>
						<span>
						<?php
							esc_html_e('Make all our dreams come true','semitri');
						?>
						</span>
						<?php						
						esc_html_e('for me and you. 
						Till the one day when the lady met this fellow and they knew it was much more than a hunch.', 'semitri'); ?></p>
					</div><!-- .entry-content -->
	                <footer class="entry-footer">
	                    <?php get_search_form(); ?>
	                </footer>
				</article><!-- #post-0 -->
			</div><!-- #content -->
		</div><!-- #primary -->
	</div><!-- #main -->
<?php get_footer('404'); ?>