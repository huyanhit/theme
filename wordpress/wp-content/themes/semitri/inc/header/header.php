<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta; ?>
<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default <?php if (!$smof_data['menu_sticky']) {
	echo 'no-sticky';
} ?> <?php if ($smof_data['menu_sticky_tablets']) {
	echo 'sticky-tablets';
} ?> <?php if ($smof_data['menu_sticky_mobile']) {
	echo 'sticky-mobile';
} ?> <?php if (!empty($zo_meta->_zo_enable_header_menu)) {
	echo 'header-menu-custom';
} ?>">
	<div class="container">
		<div class="row align-items-center-stretch">
			
			<div id="zo-header-logo" class="col-xs-5 col-sm-5 col-md-2 col-lg-2">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
				<?php if(!empty($smof_data['text_logo'])){?><span> <?php echo $smof_data['text_logo'];?></span><?php }?>
			</div>
			
			<div id="zo-header-navigation" class="col-xs-5 col-sm-5 col-md-9 col-lg-9 zo-header-navigation">
				<!-- Header Top -->
				<?php if(isset($smof_data['enable_header_top']) && $smof_data['enable_header_top']){?>
					<div id="zo-header-top">
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php if(is_active_sidebar('sidebar-2')){ dynamic_sidebar('sidebar-2'); }?>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
								<?php if(is_active_sidebar('sidebar-3')){ dynamic_sidebar('sidebar-3'); }?>
							</div>
						</div>
					</div>
				<?php }?>
				<nav id="site-navigation" class="main-navigation">
					<?php

					$attr = array(
						'menu' => zo_menu_location(),
						'menu_class' => 'nav-menu menu-main-menu',
					);

					$menu_locations = get_nav_menu_locations();

					if (!empty($menu_locations['primary'])) {
						$attr['theme_location'] = 'primary';
					}

					/* enable mega menu. */
					if (class_exists('HeroMenuWalker')) {
						$attr['walker'] = new HeroMenuWalker();
					}

					/* main nav. */
					wp_nav_menu($attr); ?>
				</nav>
			</div>
			<div id="search" class="col-xs-2 col-sm-2 col-md-1 col-lg-1">
				<?php if (is_active_sidebar('sidebar-4')): ?>
					<div id="zo-header-right">
						<?php dynamic_sidebar('sidebar-4'); ?>
					</div>
				<?php endif; ?>
			</div>
			<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="fa fa-bars"></i></div>
		</div>
	</div>
	<!-- #site-navigation -->
</div>
<!--#zo-header-->