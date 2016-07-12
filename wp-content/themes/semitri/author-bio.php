<!--BEGIN .author-bio-->
<div class="author-bio">
	<div class="author-img pull-left">
		<?php echo get_avatar( get_the_author_meta('email'), '90' ); ?>
	</div>
	<div class="author-info">
		<h3 class="author-title"><?php the_author_link(); ?></h3>
		<p class="author-description"><?php the_author_meta('description'); ?></p>
		<div class="social-share pull-right">
			<ul class="social-list square">
				<?php 
					$facebook = get_the_author_meta( 'facebook' );
					if ( $facebook && $facebook != '' ) {
						echo '<li class="facebook"><a href="' . esc_url($facebook) . '"><i class="fa fa-facebook"></i></a></li>';
					}
					$twitter = get_the_author_meta( 'twitter' );
					if ( $twitter && $twitter != '' ) {
						echo '<li class="twitter"><a href="' . esc_url($twitter) . '"><i class="fa fa-twitter"></i></a></li>';
					}
					$google = get_the_author_meta( 'google' );
					if ( $google && $google != '' ) {
						echo '<li class="google"><a href="' . esc_url($google) . '"><i class="fa fa-google-plus"></i></a></li>';
					}
					$pinterest = get_the_author_meta( 'pinterest' );
					if ( $pinterest && $pinterest != '' ) {
						echo '<li class="pinterest"><a href="' . esc_url($pinterest) . '"><i class="fa fa-pinterest-p"></i></a></li>';
					}
				?>
			</ul>
		</div>
	</div>
<!--END .author-bio-->
</div>