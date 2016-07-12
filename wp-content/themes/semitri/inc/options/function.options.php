<?php
global $zo_base;

/* get local fonts. */
$local_fonts = is_admin() ? $zo_base->getListLocalFontsName() : array() ;

/**
 * Home Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Main Options', 'semitri'),
    'icon' => 'el-icon-dashboard',
    'fields' => array(
        array(
            'id' => 'intro_product',
            'type' => 'intro_product',
        )
    )
);

/**
 * Header Options
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Header', 'semitri'),
    'icon' => 'el-icon-credit-card',
    'fields' => array(
        array(
            'id' => 'header_layout',
            'title' => __('Layouts', 'semitri'),
            'subtitle' => __('select a layout for header', 'semitri'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/header/h-default.png',
            )
        ),
		array(
            'title' => __('Select Logo', 'semitri'),
            'subtitle' => __('Select an image file for your logo.', 'semitri'),
            'id' => 'main_logo',
            'type' => 'media',
            'url' => true,
            'default' => array(
                'url'=>get_template_directory_uri().'/logo.png'
            )
        ),
        array(
            'id' => 'header_padding',
            'title' => __('Padding', 'semitri'),
            'subtitle' => __('Padding for header navigation.', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body #zo-header-logo a'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'subtitle' => __('Enable header top.', 'semitri'),
            'id' => 'enable_header_top',
            'type' => 'switch',
            'title' => __('Enable Header Top', 'semitri'),
            'default' => true,
        ),
    )
);

/* Header Sticky */
$this->sections[] = array(
    'title' => __('Header Sticky', 'semitri'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('enable sticky mode for menu.', 'semitri'),
            'id' => 'menu_sticky',
            'type' => 'switch',
            'title' => __('Sticky Header', 'semitri'),
            'default' => false,
        ),
		array(
            'id'       => 'sticky_logo_height',
            'type'     => 'dimensions',
            'units'    => array('px'),
            'title'    => __('Sticky Logo Height', 'semitri'),
            'width' => false,
        ),
        array(
            'id' => 'menu_sticky_header_padding',
            'title' => __('Sticky Header Padding', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body .header-fixed #zo-header-top a'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Tablets.', 'semitri'),
            'id' => 'menu_sticky_tablets',
            'type' => 'switch',
            'title' => __('Sticky Tablets', 'semitri'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable sticky mode for menu Mobile.', 'semitri'),
            'id' => 'menu_sticky_mobile',
            'type' => 'switch',
            'title' => __('Sticky Mobile', 'semitri'),
            'default' => false,
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/* Menu */
$this->sections[] = array(
    'title' => __('Menu', 'semitri'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => 'Menu position.',
            'id' => 'menu_position',
            'options' => array(
                '' => 'Initial',
                'left' => 'Menu Left',
                'right' => 'Menu Right',
                'center' => 'Menu Center',
            ),
            'type' => 'select',
            'title' => __('Menu Position', 'semitri'),
            'default' => 'right'
        ),
        array(
            'id' => 'menu_margin_first_level',
            'title' => __('Menu Margin - First Level', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('.zo-header-navigation .main-navigation .menu-main-menu > li:not(:last-child)',
                '.zo-header-navigation .main-navigation .menu-main-menu > ul > li:not(:last-child)'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_padding_first_level',
            'title' => __('Menu Padding - First Level', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('.zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '.zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'default' => array(
                'padding-top'     => '35px',
                'padding-right'   => '0',
                'padding-bottom'  => '35px',
                'padding-left'    => '35px',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - First Level', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '.zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Menu Font Size - Sub Level', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('.zo-header-navigation .main-navigation .menu-main-menu > li ul a',
                '.zo-header-navigation .main-navigation .menu-main-menu > ul > li ul a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'subtitle' => __('Enable mega menu.', 'semitri'),
            'id' => 'menu_mega',
            'type' => 'switch',
            'title' => __('Mega Menu', 'semitri'),
            'default' => true,
        ),
        array(
            'subtitle' => __('Enable menu first level uppercase.', 'semitri'),
            'id' => 'menu_first_level_uppercase',
            'type' => 'switch',
            'title' => __('Menu First Level Uppercase', 'semitri'),
            'default' => true,
        ),
        array(
            'id' => 'menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Menu Icon Font Size', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),
    )
);

/* Menu Sticky */
$this->sections[] = array(
    'title' => __('Menu Sticky', 'semitri'),
    'icon' => 'el-icon-tasks',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'stick_menu_fontsize_first_level',
            'type' => 'typography',
            'title' => __('Stick Menu Font Size - First Level', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li > a',
                '#zo-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > ul > li > a'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'sticky_menu_fontsize_sub_level',
            'type' => 'typography',
            'title' => __('Sticky Menu Font Size - Sub Level', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li ul li a',
                '#zo-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li a '),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
            )
        ),
        array(
            'id' => 'sticky_menu_icon_font_size',
            'type' => 'typography',
            'title' => __('Sticky Menu Icon Font Size', 'semitri'),
            'google' => false,
            'font-backup' => false,
            'all_styles' => false,
            'color' => false,
            'font-style' => false,
            'font-weight' => false,
            'font-family' => false,
            'line-height' => false,
            'text-align' => false,
            'output'  => array('#zo-header.zo-main-header.header-fixed .menu-main-menu > li > a i'),
            'units' => 'px',
            'default' => array(
                'font-size' => '14px',
            )
        ),

    )
);

/**
 * Page title settings
 *
 */
$page_title = array(
    array(
        'id' => 'page_title_layout',
        'title' => __('Layouts', 'semitri'),
        'subtitle' => __('select a layout for page title', 'semitri'),
        'default' => '1',
        'type' => 'image_select',
        'options' => array(
            '' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-0.png',
            '1' => get_template_directory_uri().'/inc/options/images/pagetitle/pt-s-1.png'
        )
    ),
    array(
        'id'       => 'page_title_background',
        'type'     => 'background',
        'title'    => __( 'Background', 'semitri' ),
        'subtitle' => __( 'page title background with image, color, etc.', 'semitri' ),
        'output'   => array('#zo-page-element-wrap'),
        'default'   => array(
            'background-image' => get_template_directory_uri() . '/inc/options/images/pagetitle/bg-page-title.jpg',
			'background-position' => 'center center',
        )
    ),
    array(
        'id' => 'page_title_margin',
        'title' => __('Margin', 'semitri'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'margin',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'margin-top'     => '0',
            'margin-right'   => '0',
            'margin-bottom'  => '80px',
            'margin-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_padding',
        'title' => __('Padding', 'semitri'),
        'type' => 'spacing',
        'units' => 'px',
        'mode' => 'padding',
        'output' => array('#zo-page-element-wrap'),
        'default' => array(
            'padding-top'     => '145px',
            'padding-right'   => '0',
            'padding-bottom'  => '120px',
            'padding-left'    => '0',
            'units'          => 'px',
        )
    ),
    array(
        'id' => 'page_title_parallax',
        'title' => __('Enable Header Parallax', 'semitri'),
        'type' => 'switch',
        'default' => false
    ),
    array(
        'id' => 'page_title_custom_post',
        'title' => __('Custom Background For Post Type', 'semitri'),
        'type' => 'switch',
        'default' => false
    ),
);

/**
 * add custom background for post type
 */
$post_types = zo_list_post_types();
foreach( $post_types as $type => $name) {
    $page_title[] = array(
        'id'       => 'page_title_custom_post_' . $type,
        'type'     => 'background',
        'title'    => sprintf( __( 'Background For %s' , 'semitri'), $name),
        'subtitle' => sprintf( __( 'Custom background image for post type %s', 'semitri' ), $name),
        'output'   => array('.single-'.$type.' #zo-page-element-wrap'),
        'background-color' => false,
        'background-repeat' => false,
        'background-size' => false,
        'background-attachment' => false,
        'background-position' => false,
        'default'   => array(
            'background-image'=> '',
        ),
        'required' => array( 'page_title_custom_post', '=', 1 )
    );
}

/**
 * Section settings
 */
$this->sections[] = array(
    'title' => __('Page Title & BC', 'semitri'),
    'icon' => 'el-icon-map-marker',
    'fields' => $page_title
);

/* Page Title */
$this->sections[] = array(
    'icon' => 'el-icon-podcast',
    'title' => __('Page Title', 'semitri'),
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'page_title_typography',
            'type' => 'typography',
            'title' => __('Typography', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#page-title-text h1'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'semitri'),
            'default' => array(
                'font-family' => 'Crimson Text',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-weight' => '400',
				'font-subsets' => 'latin',
                'font-size' => '36px',
                'line-height' => '27px'
            )
        ),
		array(
			'id' => 'sub_page_title',
			'title' => 'Sub Page Title',
			'type' => 'text',
		)
    )
);

/* Breadcrumb */
$this->sections[] = array(
    'icon' => 'el-icon-random',
    'title' => __('Breadcrumb', 'semitri'),
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('The text before the breadcrumb home.', 'semitri'),
            'id' => 'breacrumb_home_prefix',
            'type' => 'text',
            'title' => __('Breadcrumb Home Prefix', 'semitri'),
            'default' => 'Home'
        ),
        array(
            'id' => 'breacrumb_typography',
            'type' => 'typography',
            'title' => __('Typography', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('#breadcrumb-text'),
            'units' => 'px',
            'subtitle' => __('Typography option with title text.', 'semitri'),
            'default' => array(
                'font-weight' => '400',
                'text-align' => 'center',
                'font-size' => '12px',
                'line-height' => '12px',
				'color' => '#fff',
            )
        ),
    )
);

/**
 * Body
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Body', 'semitri'),
    'icon' => 'el-icon-website',
    'fields' => array(
        array(
            'subtitle' => __('Set layout boxed default(Wide).', 'semitri'),
            'id' => 'body_layout',
            'type' => 'switch',
            'title' => __('Boxed Layout', 'semitri'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Set layout default(Light).', 'semitri'),
            'id' => 'body_layout_dark',
            'type' => 'switch',
            'title' => __('Dark Layout', 'semitri'),
            'default' => false,
        ),
        array(
            'id'       => 'body_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'semitri' ),
            'subtitle' => __( 'body background with image, color, etc.', 'semitri' ),
            'output'   => array('body'),
        ),
        array(
            'id'       => 'body_boxed_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'semitri' ),
            'subtitle' => __( 'body background with image, color, etc.', 'semitri' ),
            'output'   => array('body.zo-boxed'),
			'default'  => array(
				'background-image' => get_template_directory_uri() . '/inc/options/images/body/bg_boxed.png',
				'background-attachment' => 'fixed'
			)
        ),
        array(
            'id' => 'body_margin',
            'title' => __('Margin', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('body'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            )
        ),
        array(
            'id' => 'body_padding',
            'title' => __('Padding', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('body'),
            'default' => array(
                'padding-top'     => '0',
                'padding-right'   => '0',
                'padding-bottom'  => '0',
                'padding-left'    => '0',
                'units'          => 'px',
            )
        ),
    )
);

/**
 * Page Loadding
 *
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Page Loadding', 'semitri'),
    'icon' => 'el-icon-compass',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable page loadding.', 'semitri'),
            'id' => 'enable_page_loadding',
            'type' => 'switch',
            'title' => __('Enable Page Loadding', 'semitri'),
            'default' => false,
        ),
        array(
            'subtitle' => __('Select Style Page Loadding.', 'semitri'),
            'id' => 'page_loadding_style',
            'type' => 'select',
            'options' => array(
                '1' => 'Style 1',
                '2' => 'Style 2'
            ),
            'title' => __('Page Loadding Style', 'semitri'),
            'default' => 'style-1',
            'required' => array( 0 => 'enable_page_loadding', 1 => '=', 2 => 1 )
        )
    )
);

/**
 * Footer
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Footer', 'semitri'),
    'icon' => 'el-icon-credit-card',
	'fields' => array(
		array(
            'id' => 'footer_layout',
            'title' => __('Layouts', 'semitri'),
            'subtitle' => __('select a layout for footer', 'semitri'),
            'default' => '',
            'type' => 'image_select',
            'options' => array(
                '' => get_template_directory_uri().'/inc/options/images/footer/f-default.png',
            )
        ),
	)
);

/* Footer top */
$this->sections[] = array(
    'title' => __('Footer Top', 'semitri'),
    'icon' => 'el-icon-fork',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer top.', 'semitri'),
            'id' => 'enable_footer_top',
            'type' => 'switch',
            'title' => __('Enable Footer Top', 'semitri'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'semitri' ),
            'subtitle' => __( 'footer background with image, color, etc.', 'semitri' ),
            'output'   => array('footer #zo-footer-top'),
            'default'   => array(
				'background-image' => get_template_directory_uri() . '/inc/options/images/footer/bg-footer.jpg',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_margin',
            'title' => __('Margin', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_padding',
            'title' => __('Padding', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-top'),
            'default' => array(
                'padding-top'     => '75px',
                'padding-right'   => '0',
                'padding-bottom'  => '120px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_top', 1 => '=', 2 => 1 )
        ),
    )
);

/* footer bottom */
$this->sections[] = array(
    'title' => __('Footer Bottom', 'semitri'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Enable footer bottom.', 'semitri'),
            'id' => 'enable_footer_bottom',
            'type' => 'switch',
            'title' => __('Enable Footer Bottom', 'semitri'),
            'default' => true,
        ),
        array(
            'id'       => 'footer_botton_background',
            'type'     => 'background',
            'title'    => __( 'Background', 'semitri' ),
            'subtitle' => __( 'background with image, color, etc.', 'semitri' ),
            'output'   => array('footer #zo-footer-bottom'),
            'default'   => array(
                'background-color'=>'#111'
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_margin',
            'title' => __('Margin', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'margin',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'margin-top'     => '0',
                'margin-right'   => '0',
                'margin-bottom'  => '0',
                'margin-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'id' => 'footer_bottom_padding',
            'title' => __('Padding', 'semitri'),
            'type' => 'spacing',
            'units' => 'px',
            'mode' => 'padding',
            'output' => array('footer #zo-footer-bottom'),
            'default' => array(
                'padding-top'     => '25px',
                'padding-right'   => '0',
                'padding-bottom'  => '25px',
                'padding-left'    => '0',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'enable_footer_bottom', 1 => '=', 2 => 1 )
        ),
        array(
            'subtitle' => __('enable button back to top.', 'semitri'),
            'id' => 'footer_botton_back_to_top',
            'type' => 'switch',
            'title' => __('Back To Top', 'semitri'),
            'default' => false,
        )
    )
);


/**
 * Styling
 *
 * css color.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Styling', 'semitri'),
    'icon' => 'el-icon-adjust',
    'fields' => array(
		array(
			'subtitle' => esc_html__('select presets color.', 'semitri'),
			'id' => 'presets_color',
			'type' => 'image_select',
			'title' => esc_html__('Presets Color', 'semitri'),
			'default' => '0',
			'options' => array(
				'0' => get_template_directory_uri().'/inc/options/images/presets/pr-c-1.jpg',
				'1' => get_template_directory_uri().'/inc/options/images/presets/pr-c-2.jpg',
				'2' => get_template_directory_uri().'/inc/options/images/presets/pr-c-3.jpg',
			)
		),
        array(
            'subtitle' => __('set color main color.', 'semitri'),
            'id' => 'primary_color',
            'type' => 'color',
            'title' => __('Primary Color', 'semitri'),
            'default' => '#ffc619'
        ),
		array(
            'id' => 'secondary_color',
            'type' => 'color',
            'title' => esc_html__('Secondary Color', 'brando'),
            'default' => '#fcd846'
        ),
        array(
            'subtitle' => __('set color for tags <a></a>.', 'semitri'),
            'id' => 'link_color',
            'type' => 'link_color',
            'title' => __('Link Color', 'semitri'),
            'output'  => array('a'),
            'default' => array(
				'regular'  => '#333333',
				'hover'    => '#ffc619',
				'active'    => '#ffc619',
			)
        ),
    )
);

/** Header Top Color **/
$this->sections[] = array(
    'title' => __('Header Top Color', 'semitri'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set background color header top.', 'semitri'),
            'id' => 'bg_header_top_color',
            'type' => 'background',
            'output'  => array('body #zo-header-top'),
            'title' => __('Background Color', 'semitri'),
            'default' => array(
				'background-color' => 'transparent',
			)
        ),
        array(
            'subtitle' => __('Set color header top.', 'semitri'),
            'id' => 'header_top_color',
            'type' => 'color',
            'output'  => array('body #zo-header-top'),
            'title' => __('Font Color', 'semitri'),
            'default' => ''
        )
    )
);

/** Header Main Color **/
$this->sections[] = array(
    'title' => __('Header Main Color', 'semitri'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for header background color.', 'semitri'),
            'id' => 'bg_header',
            'type' => 'color_rgba',
            'title' => __('Header Background Color', 'semitri'),
            'default'   => array(
                'alpha'     => 1,
				'color'		=> '#111111',
				'rgba'		=> 'rgba(255,255,255,1)'
            )
        )
    )
);

/** Sticky Header Color **/
$this->sections[] = array(
    'title' => __('Sticky Header', 'semitri'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('set color for sticky header.', 'semitri'),
            'id' => 'bg_sticky_header',
            'type' => 'color_rgba',
            'title' => __('Sticky Background Color', 'semitri'),
            'default'   => array(
                'alpha'     => 0
            ),
            'required' => array( 0 => 'menu_sticky', 1 => '=', 2 => 1 )
        )
    )
);

/** Menu Color **/
$this->sections[] = array(
    'title' => __('Menu Color', 'semitri'),
    'icon' => 'el-icon-minus',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Controls the text color of first level menu items.', 'semitri'),
            'id' => 'menu_color_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color - First Level', 'semitri'),
            'default' => '#ffffff'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'semitri'),
            'id' => 'menu_color_hover_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - First Level', 'semitri'),
            'default' => '#ffc619'
        ),
        array(
            'subtitle' => __('Controls the text hover color of first level menu items.', 'semitri'),
            'id' => 'menu_color_active_first_level',
            'type' => 'color',
            'title' => __('Menu Font Color Active - First Level', 'semitri'),
            'default' => '#ffc619'
        ),
        array(
            'subtitle' => __('Controls the text color of sub level menu items.', 'semitri'),
            'id' => 'menu_color_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color - Sub Level', 'semitri'),
            'default' => '#616161'
        ),
        array(
            'subtitle' => __('Controls the text hover color of sub level menu items.', 'semitri'),
            'id' => 'menu_color_hover_sub_level',
            'type' => 'color',
            'title' => __('Menu Font Color Hover - Sub Level', 'semitri'),
            'default' => '#fff'
        )
    )
);

/** Footer Top Color **/
$this->sections[] = array(
    'title' => __('Footer Top Color', 'semitri'),
    'icon' => 'el-icon-chevron-up',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'semitri'),
            'id' => 'footer_top_color',
            'type' => 'color',
            'output' => array('#zo-footer-top'),
            'title' => __('Footer Top Color', 'semitri'),
            'default' => '#616161'
        ),
        array(
            'subtitle' => __('Set title color footer top.', 'semitri'),
            'id' => 'footer_heading_color',
            'type' => 'color',
            'output' => array('#zo-footer-top h1,#zo-footer-top h2,#zo-footer-top h3,#zo-footer-top h4,#zo-footer-top h5,#zo-footer-top h6'),
            'title' => __('Footer Heading Color', 'semitri'),
            'default' => '#616161'
        ),
        array(
            'subtitle' => __('Set title link color footer top.', 'semitri'),
            'id' => 'footer_top_link_color',
            'type' => 'link_color',
            'output' => array('#zo-footer-top a'),
            'title' => __('Footer Link Color', 'semitri'),
            'default' => '#616161',
            'default' => array(
				'regular'  => '#616161',
				'hover'    => '#ffc619',
				'active'    => '#ffc619',
			)
        ),
    )
);

/** Footer Bottom Color **/
$this->sections[] = array(
    'title' => __('Footer Bottom Color', 'semitri'),
    'icon' => 'el-icon-chevron-down',
    'subsection' => true,
    'fields' => array(
        array(
            'subtitle' => __('Set color footer top.', 'semitri'),
            'id' => 'footer_bottom_color',
            'type' => 'color',
            'output' => array('#zo-footer-bottom'),
            'title' => __('Footer Bottom Color', 'semitri'),
            'default' => '#616161'
        )
    )
);

/**
 * Typography
 *
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Typography', 'semitri'),
    'icon' => 'el-icon-text-width',
    'fields' => array(
        array(
            'id' => 'font_body',
            'type' => 'typography',
            'title' => __('Body Font', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body'),
            'units' => 'px',
            'default' => array(
                'font-family' => 'Work Sans',
				'font-backup' => 'Arial, Helvetica, sans-serif',
                'font-weight' => '400',
                'font-size' => '15px',
                'line-height' => '32px',
                'color' => '#666',
            ),
            'subtitle' => __('Typography option with each property can be called individually.', 'semitri'),
        ),
        array(
            'id' => 'font_h1',
            'type' => 'typography',
            'title' => __('H1', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h1'),
            'units' => 'px',
            'default' => array(
                'font-size' => '50px',
                'line-height' => '50px'
            )
        ),
        array(
            'id' => 'font_h2',
            'type' => 'typography',
            'title' => __('H2', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h2'),
            'units' => 'px',
            'default' => array(
                'font-size' => '38px',
                'line-height' => '30px'
            )
        ),
        array(
            'id' => 'font_h3',
            'type' => 'typography',
            'title' => __('H3', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h3'),
            'units' => 'px',
            'default' => array(
                'font-size' => '22px',
                'line-height' => '28px'
            )
        ),
        array(
            'id' => 'font_h4',
            'type' => 'typography',
            'title' => __('H4', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h4'),
            'units' => 'px',
            'default' => array(
                'font-size' => '17px',
                'line-height' => '17px'
            )
        ),
        array(
            'id' => 'font_h5',
            'type' => 'typography',
            'title' => __('H5', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h5'),
            'units' => 'px',
            'default' => array(
                'font-size' => '12px',
                'line-height' => '12px'
            )
        ),
        array(
            'id' => 'font_h6',
            'type' => 'typography',
            'title' => __('H6', 'semitri'),
            'google' => true,
            'font-backup' => true,
            'all_styles' => true,
            'output'  => array('body h6'),
            'units' => 'px',
            'default' => array(
                'font-size' => '10px',
                'line-height' => '10px'
            )
        )
    )
);

/* extra font. */
$this->sections[] = array(
    'title' => __('Extra Fonts', 'semitri'),
    'icon' => 'el el-fontsize',
    'subsection' => true,
    'fields' => array(
        array(
            'id' => 'google-font-1',
            'type' => 'typography',
            'title' => __('Font 1', 'semitri'),
            'subtitle' => __('extend class "zo-extra-font1" to using this font', 'semitri'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
			'font-weight'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => 'Crimson Text'
            )
        ),
        array(
            'id' => 'google-font-selector-1',
            'type' => 'textarea',
            'title' => __('Selector of Body Font', 'semitri'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id, Note: no use characters: > * + & ^ @ ...), extend class ".zo-extra-font1" to using this font', 'semitri'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font1',
            'required' => array(
                0 => 'google-font-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id' => 'google-font-2',
            'type' => 'typography',
            'title' => __('Font 2', 'semitri'),
            'subtitle' => __('extend class "zo_extra_font2" to using this font', 'semitri'),
            'google' => true,
            'font-backup' => false,
            'font-style' => false,
            'color' => false,
            'text-align'=> false,
            'line-height'=>false,
            'font-size'=> false,
			'font-weight'=> false,
            'subsets'=> false,
            'default' => array(
                'font-family' => 'Montserrat'
            )
        ),
        array(
            'id' => 'google-font-selector-2',
            'type' => 'textarea',
            'title' => __('Selector of Body Font', 'semitri'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id, Note: no use characters: > * + & ^ @ ...), extend class ".zo-extra-font2" to using this font', 'semitri'),
            'validate' => 'no_html',
            'default' => '.zo-extra-font2',
            'required' => array(
                0 => 'google-font-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/* local fonts. */
$this->sections[] = array(
    'title' => __('Local Fonts', 'semitri'),
    'icon' => 'el-icon-bookmark',
    'subsection' => true,
    'fields' => array(
        array(
            'id'       => 'local-fonts-1',
            'type'     => 'select',
            'title'    => __( 'Fonts 1', 'semitri' ),
            'options'  => $local_fonts,
            'default'  => 'montserrat-light',
			
        ),
        array(
            'id' => 'local-fonts-selector-1',
            'type' => 'textarea',
            'title' => __('Selector 1', 'semitri'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'semitri'),
            'validate' => 'no_html',
            'default' => '.semetri-our-courses .template-zo_carousel--courses .zo-carousel-title,.semetri-fancy-courses .zo-fancybox-content,#zo-footer-top .wg-title',
            'required' => array(
                0 => 'local-fonts-1',
                1 => '!=',
                2 => ''
            )
        ),
        array(
            'id'       => 'local-fonts-2',
            'type'     => 'select',
            'title'    => __( 'Fonts 2', 'semitri' ),
            'options'  => $local_fonts,
            'default'  => 'Montserrat-UltraLight',
        ),
        array(
            'id' => 'local-fonts-selector-2',
            'type' => 'textarea',
            'title' => __('Selector 2', 'semitri'),
            'subtitle' => __('add html tags ID or class (body,a,.class,#id)', 'semitri'),
            'validate' => 'no_html',
            'default' => 'h1, h2, h3, h4, h5, h6, .fancy-style-1 .zo-fancybox-title, .post-teaser .zo-blog-title a, .template-zo_carousel--blog .zo-carousel-title',
            'required' => array(
                0 => 'local-fonts-2',
                1 => '!=',
                2 => ''
            )
        )
    )
);

/**
 * Custom CSS
 *
 * extra css for customer.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Custom CSS', 'semitri'),
    'icon' => 'el-icon-bulb',
    'fields' => array(
        array(
            'id' => 'custom_css',
            'type' => 'ace_editor',
            'title' => __('CSS Code', 'semitri'),
            'subtitle' => __('create your css code here.', 'semitri'),
            'mode' => 'css',
            'theme' => 'monokai',
        )
    )
);

/**
 * Animations
 *
 * Animations options for theme. libs css, js.
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Animations', 'semitri'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'subtitle' => __('Enable animation parallax for images...', 'semitri'),
            'id' => 'paralax',
            'type' => 'switch',
            'title' => __('Images Paralax', 'semitri'),
            'default' => true
        ),
    )
);

/**
 * Scroll
 *
 * Use Nicescroll for theme
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Nice scroll', 'semitri'),
    'icon' => 'el-icon-magic',
    'fields' => array(
        array(
            'title' => __('Nice Scroll', 'semitri'),
            'subtitle' => __('Enable Nicescroll for theme...', 'semitri'),
            'id' => 'nicescroll',
            'type' => 'switch',
            'default' => false
        ),
    )
);

/**
 * Optimal Core
 *
 * Optimal options for theme. optimal speed
 * @author ZoTheme
 */
$this->sections[] = array(
    'title' => __('Optimal Core', 'semitri'),
    'icon' => 'el-icon-idea',
    'fields' => array(
        array(
            'subtitle' => __('no minimize , generate css over time...', 'semitri'),
            'id' => 'dev_mode',
            'type' => 'switch',
            'title' => __('Dev Mode (not recommended)', 'semitri'),
            'default' => true
        )
    )
);
