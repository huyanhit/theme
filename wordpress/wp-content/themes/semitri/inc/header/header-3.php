<?php
/**
 * @name : Default
 * @package : ZoTheme
 * @author : ZoTheme
 */
?>
<?php global $smof_data, $zo_meta; ?>

<!-- Header Top -->
<?php if(isset($smof_data['enable_header_top']) && $smof_data['enable_header_top']){?>
	<div id="zo-header-top" class="style-3">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php if(is_active_sidebar('sidebar-2')){ dynamic_sidebar('sidebar-2'); }?>
				</div>
				<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
					<?php if(is_active_sidebar('sidebar-3')){ dynamic_sidebar('sidebar-3'); }?>
				</div>
			</div>
		</div>
	</div>
<?php }?>

<!-- Header Navigation -->
<div id="zo-header" class="zo-main-header header-default style-3 <?php if (!$smof_data['menu_sticky']) {
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
			<div id="zo-header-logo" class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img alt="" src="<?php echo esc_url(zo_page_header_logo()); ?>"></a>
				<span><?php if(isset($smof_data['text_logo'])) echo $smof_data['text_logo'];?></span>
			</div>
			<div class="col-xs-12 col-sm-8 col-md-8 col-lg-8 zo-header-navigation">
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
				<?php if (is_active_sidebar('sidebar-4')): ?>
					<div id="zo-header-right">
						<?php dynamic_sidebar('sidebar-4'); ?>
					</div>
				<?php endif; ?>
			</div>
			<div id="zo-menu-mobile" class="collapse navbar-collapse"><i class="pe-7s-menu"></i></div>
		</div>
	</div>
	<!-- #site-navigation -->
</div>
<!--#zo-header-->