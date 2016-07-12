<footer>
	<?php if (zo_get_data_theme_options('enable_footer_top') =='1'): ?>
	<div id="zo-footer-top">
		<div class="container">
			<div class="row">
				<?php if (is_active_sidebar('sidebar-5')) : ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer-first"><?php dynamic_sidebar('sidebar-5'); ?></div>
				<?php endif; ?>
				<?php if (is_active_sidebar('sidebar-6')) : ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer-second"><?php dynamic_sidebar('sidebar-6'); ?></div>
				<?php endif; ?>
				<?php if (is_active_sidebar('sidebar-7')) : ?>
					<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 footer-third"><?php dynamic_sidebar('sidebar-7'); ?></div>
				<?php endif; ?>
			</div>
		</div>
	</div>
	<?php endif;?>
	<?php if (zo_get_data_theme_options('enable_footer_bottom') =='1'): ?>
	<div id="zo-footer-bottom">
		 <div class="container">
			 <div class="row">
				 <?php if (is_active_sidebar('sidebar-9')) : ?>
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-first"><?php dynamic_sidebar('sidebar-9'); ?></div>
				 <?php endif; ?>
				 <?php if (is_active_sidebar('sidebar-10')) : ?>
					 <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 bottom-second"><?php dynamic_sidebar('sidebar-10'); ?></div>
				 <?php endif; ?>
			 </div>
		 </div>
	</div>
	<?php endif;?>
</footer><!-- #site-footer -->
