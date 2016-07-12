<?php
/**
 * Meta options
 *
 * @author ZoTheme
 * @since 1.0.0
 */
class ZOMetaOptions
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'add_meta_boxes'));
		add_action('admin_enqueue_scripts', array($this, 'admin_script_loader'));
	}
	/* add script */
	function admin_script_loader()
	{
		global $pagenow;
		if (is_admin() && ($pagenow == 'post-new.php' || $pagenow == 'post.php')) {
			wp_enqueue_style('metabox', get_template_directory_uri() . '/inc/options/css/metabox.css');

			wp_enqueue_script('easytabs', get_template_directory_uri() . '/inc/options/js/jquery.easytabs.min.js');
			wp_enqueue_script('metabox', get_template_directory_uri() . '/inc/options/js/metabox.js');
		}
	}
	/* add meta boxs */
	public function add_meta_boxes()
	{
		$this->add_meta_box('template_page_options', __('Setting', 'semitri'), 'page');
		$this->add_meta_box('testimonial_options', __('Testimonial about', 'semitri'), 'testimonial');
		$this->add_meta_box('pricing_options', __('Pricing Option', 'semitri'), 'pricing');
		$this->add_meta_box('product_options', __('Product Settings', 'semitri'), 'product');
		$this->add_meta_box('team_options', __('Team About', 'semitri'), 'team');
		$this->add_meta_box('portfolio_options', __('Portfolio About', 'semitri'), 'portfolio');
		$this->add_meta_box('courses_options', __('Courses Icon', 'semitri'), 'courses');
	}

	public function add_meta_box($id, $label, $post_type, $context = 'advanced', $priority = 'default')
	{
		add_meta_box('_zo_' . $id, $label, array($this, $id), $post_type, $context, $priority);
	}
	/* --------------------- PAGE ---------------------- */
	function template_page_options() {
		?>
		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-general"><i class="fa fa-server"></i><?php _e('General', 'semitri'); ?></a></li>
				<li class="tab"><a href="#tabs-header"><i class="fa fa-diamond"></i><?php _e('Header', 'semitri'); ?></a></li>
				<li class="tab"><a href="#tabs-page-title"><i class="fa fa-connectdevelop"></i><?php _e('Page Title', 'semitri'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-general">
					<?php
					zo_options(array(
						'id' => 'full_width',
						'label' => __('Full Width','semitri'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
					));
					zo_options(array(
						'id' => 'page_boxed',
						'label' => __('Page Boxed Layout','semitri'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
						'follow' => array('1'=>array('#div_page_boxed_bg'))
					));
					?>
						<div id="div_page_boxed_bg">
							<?php 
								zo_options(array(
									'id' => 'page_boxed_bg',
									'label' => __('Background for Boxed','semitri'),
									'type' => 'image'
								));
							?>
						</div>
					<?php
					zo_options(array(
						'id' => 'page_dark',
						'label' => __('Page Dark Layout','semitri'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
					));
					?>
				</div>
				<div id="tabs-header">
					<?php
					/* header. */
					zo_options(array(
						'id' => 'header',
						'label' => __('Header','semitri'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
						'follow' => array('1'=>array('#page_header_enable'))
					));
					?>  <div id="page_header_enable"><?php
						zo_options(array(
							'id' => 'header_layout',
							'label' => __('Layout','semitri'),
							'type' => 'imegesselect',
							'options' => array(
								'' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
								'2' => get_template_directory_uri().'/inc/options/images/header/header-2.png',
								'3' => get_template_directory_uri().'/inc/options/images/header/header-3.png',
								'4' => get_template_directory_uri().'/inc/options/images/header/header-4.png',
								'5' => get_template_directory_uri().'/inc/options/images/header/header-5.png',
								'6' => get_template_directory_uri().'/inc/options/images/header/header-6.png',
							)
						));
						zo_options(array(
							'id' => 'header_logo',
							'label' => __('Logo','semitri'),
							'type' => 'image'
						));
						/*
						 * Custom main menu color
						 */
						zo_options(array(
							'id' => 'enable_header_menu',
							'label' => __('Custom Header Menu Color','semitri'),
							'type' => 'switch',
							'options' => array('on'=>'1','off'=>''),
							'follow' => array('1'=>array('#page_header_menu_enable'))
						));
						?> <div id="page_header_menu_enable"><?php
							zo_options(array(
								'id' => 'header_menu_color',
								'label' => __('Menu Color - First Level','semitri'),
								'type' => 'color',
								'default' => ''
							));
							zo_options(array(
								'id' => 'header_menu_color_hover',
								'label' => __('Menu Hover - First Level','semitri'),
								'type' => 'color',
								'default' => ''
							));
							zo_options(array(
								'id' => 'header_menu_color_active',
								'label' => __('Menu Active - First Level','semitri'),
								'type' => 'color',
								'default' => ''
							));
							?> </div>
						<?php
						$menus = array();
						$menus[''] = 'Default';
						$obj_menus = wp_get_nav_menus();
						foreach ($obj_menus as $obj_menu){
							$menus[$obj_menu->term_id] = $obj_menu->name;
						}
						$navs = get_registered_nav_menus();
						foreach ($navs as $key => $mav){
							zo_options(array(
								'id' => $key,
								'label' => $mav,
								'type' => 'select',
								'options' => $menus
							));
						}
						?>
					</div>
				</div>
				<div id="tabs-page-title">
					<?php
					/* page title. */
					zo_options(array(
						'id' => 'page_title',
						'label' => __('Page Title','semitri'),
						'type' => 'switch',
						'options' => array('on'=>'1','off'=>''),
						'follow' => array('1'=>array('#page_title_enable'))
					));
					?>  <div id="page_title_enable"><?php
						zo_options(array(
							'id' => 'page_title_text',
							'label' => __('Title','semitri'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_sub_text',
							'label' => __('Sub Title','semitri'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_padding',
							'label' => __('Page Title Padding','semitri'),
							'type' => 'text',
						));
						zo_options(array(
							'id' => 'page_title_background',
							'label' => __('Page Title Background','semitri'),
							'type' => 'image',
						));
						zo_options(array(
							'id' => 'page_title_type',
							'label' => __('Layout','semitri'),
							'type' => 'imegesselect',
                            'default' => '1',
							'options' => array(
								'1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png',
								'' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
							)
						));
						?>
					</div>
				</div>
			</div>
		</div>
	<?php
	}
	/* --------------------- RATING TESTIMONIAL ---------------------- */
	function testimonial_options(){
		?>
		<div class="testimonial-rating">
			<?php
			zo_options(array(
				'id' => 'testimonial_position',
				'label' => __('Client Position','semitri'),
				'type' => 'text',
			));
			?>
		</div>
        <div class="testimonial-country">
			<?php
			zo_options(array(
				'id' => 'testimonial_country',
				'label' => __('Client Country','semitri'),
				'type' => 'text',
			));
			?>
		</div>
	<?php
	}
	/* --------------------- PRICING ---------------------- */

	function pricing_options() {
		?>
		<div class="pricing-option-wrap">
			<table class="wp-list-table widefat fixed">
				<tr>
					<td>
						<?php
						zo_options(array(
							'id' => 'price',
							'label' => __('Price','semitri'),
							'type' => 'text',
						));

						zo_options(array(
							'id' => 'value',
							'label' => __('Value','semitri'),
							'type' => 'select',
							'options' => array(
								'Month' => 'Month',
								'Year' => 'Year'
							)
						));

						zo_options(array(
							'id' => 'icon',
							'label' => __('Icon','semitri'),
							'type' => 'image',
							'default' => ''
						));

						?>
					</td>
					<td>
						<?php
						zo_options(array(
							'id' => 'is_feature',
							'label' => __('Is feature','semitri'),
							'type' => 'switch',
							'options' => array('on'=>'1','off'=>''),
						));

						zo_options(array(
							'id' => 'button_url',
							'label' => __('Button Url','semitri'),
							'type' => 'text',
						));

						zo_options(array(
							'id' => 'button_text',
							'label' => __('Button Text','semitri'),
							'type' => 'text',
						));
						?>
					</td>
				</tr>
			</table>
		</div>
	<?php
	}
	/* --------------------- PRICING ---------------------- */

	/*-----------------------TEAM-------------------------*/
	function team_options() {
		?>

		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-position"><i class="fa fa-server"></i><?php _e('Position', 'semitri'); ?></a></li>
				<li class="tab"><a href="#tabs-social"><i class="fa fa-server"></i><?php _e('Social', 'semitri'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-position">
					<?php
					zo_options(array(
						'id' => 'team_position',
						'label' => __('Position', 'semitri'),
						'type' => 'text',
						'placeholder' => '',
					));
					?>
				</div>

				<div id="tabs-social">
					<?php
					zo_options(array(
						'id' 			=> 'team_facebook',
						'label' 		=> __('Facebook', 'semitri'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Facebok',
					));

					zo_options(array(
						'id' 			=> 'team_twitter',
						'label' 		=> __('Twitter', 'semitri'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Twitter',
					));

					zo_options(array(
						'id' 			=> 'team_google',
						'label' 		=> __('Google', 'semitri'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input link Google',
					));

					zo_options(array(
						'id' 			=> 'team_in',
						'label' 		=> __('Linked in', 'semitri'),
						'type' 			=> 'text',
						'value' 		=> '',
						'placeholder'	=> 'Input Linked In',
					));
					?>
				</div>
			</div>
		</div>
	<?php
	}
	/*-----------------------Portfolio-------------------------*/
	function portfolio_options() {
		?>
		<div class="tab-container clearfix">
			<ul class='etabs clearfix'>
				<li class="tab"><a href="#tabs-about"><i class="fa fa-server"></i><?php _e('About', 'semitri'); ?></a></li>
				<li class="tab"><a href="#tabs-layout"><i class="fa fa-server"></i><?php _e('Layout', 'semitri'); ?></a></li>
			</ul>
			<div class='panel-container'>
				<div id="tabs-about">
					<?php
					zo_options(array(
						'id' => 'portfolio_client',
						'label' => __('Client', 'semitri'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_date',
						'label' => __('Date', 'semitri'),
						'type' => 'date',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_skills',
						'label' => __('Skills', 'semitri'),
						'type' => 'text',
						'placeholder' => '',
					));
					zo_options(array(
						'id' => 'portfolio_url',
						'label' => __('URL', 'semitri'),
						'type' => 'text',
						'value' => '#',
					));
					zo_options(array(
						'id' => 'portfolio_images',
						'label' => __('Gallery', 'semitri'),
						'type' => 'images',
					));
					?>
				</div>
				<div id="tabs-layout">
					<?php
					zo_options(array(
						'id' => 'portfolio_layout',
						'label' => __('Layout', 'semitri'),
						'type' => 'select',
						'options' => array(
							'' => 'Default',
							'gallery' => 'Gallery'
						)
					));
					?>
				</div>
			</div>
		</div>


	<?php
	}
	/*-----------------------courses-------------------------*/
	
	function courses_options() {
	?>
		<div class='panel-container'>
			<?php
				zo_options(array(
					'id' => 'courses_images',
					'label' => __('Icon', 'semitri'),
					'type' => 'images',
				));
			?>
		</div>
	<?php
	}
	
	/*-----------------------PRODUCT-------------------------*/
	function product_options() {
		?>
		<div class="tab-container clearfix">
		<ul class='etabs clearfix'>
			<li class="tab"><a href="#tabs-feature"><i class="fa fa-server"></i><?php _e(' Features', 'semitri'); ?></a></li>
			<li class="tab"><a href="#tabs-app"><i class="fa fa-server"></i><?php _e(' App Store', 'semitri'); ?></a></li>
		</ul>
		<div class='panel-container'>
			<div id="tabs-feature">
				<?php
				zo_options(array(
					'id' 	=> 'overall_dimensions',
					'label' => __('Overall Dimensions', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'build_volume',
					'label' => __('Build Volume', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'print_speed',
					'label' => __('Print Speed', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'maximum_resolution',
					'label' => __('Maximum Resolution', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'print_from_sd_card',
					'label' => __('Print from SD Card', 'semitri'),
					'type' 	=> 'select',
					'options' => array(
						'yes' 			=> 'Yes',
						'no' 			=> 'No'
					)
				));
				zo_options(array(
					'id' 	=> 'print_material',
					'label' => __('Print Material', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'noise_level',
					'label' => __('Noise Level', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'recommended_software',
					'label' => __('Recommended Software', 'semitri'),
					'type' 	=> 'text'
				));
				?>
			</div>
			<div id="tabs-app">
				<?php
				zo_options(array(
					'id' 	=> 'app_store',
					'label' => __('Link App Store', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'google_play',
					'label' => __('Link Google Play', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'windows_phone_store',
					'label' => __('Link Window Phone Store', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'windows_store',
					'label' => __('Link Windows Store', 'semitri'),
					'type' 	=> 'text'
				));
				zo_options(array(
					'id' 	=> 'documents_links',
					'label' => __('Link User Manual', 'semitri'),
					'type' 	=> 'text'
				));
				?>
			</div>
		</div>
		<div>
<?php
	}
}

new ZOMetaOptions();
