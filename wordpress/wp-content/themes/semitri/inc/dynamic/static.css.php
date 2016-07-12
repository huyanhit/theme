<?php
/**
 * Auto create .css file from Theme Options
 * @author ZoTheme
 * @version 1.0.0
 */
 
class ZoTheme_StaticCss
{

    public $scss;

    function __construct()
    {
        global $smof_data;

        /* scss */
        $this->scss = new scssc();

        /* set paths scss */
        $this->scss->setImportPaths(get_template_directory() . '/assets/scss/');

        /* generate css over time */
        if (isset($smof_data['dev_mode']) && $smof_data['dev_mode']) {
            $this->generate_file();
        } else {
            /* save option generate css */
            add_action("redux/options/smof_data/saved", array(
                $this,
                'generate_file'
            ));
        }
    }

    /**
     * generate css file.
     *
     * @since 1.0.0
     */
    public function generate_file()
    {
        global $smof_data;
        if (! empty($smof_data)) {
            require_once(ABSPATH . 'wp-admin/includes/file.php');
            WP_Filesystem();
            global $wp_filesystem;

            /* write options to scss file */
            
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/scss/options.scss', $this->css_render(), 0644 ) ) {
				_e( 'Error saving file!', 'semitri' );
			}

            /* minimize CSS styles */
            if (!$smof_data['dev_mode']) {
                $this->scss->setFormatter('scss_formatter_compressed');
            }

            /* compile scss to css */
            $css = $this->scss_render();

            $file = "static.css";

            if(!empty($smof_data['presets_color']) && $smof_data['presets_color']){
                $file = "presets-".$smof_data['presets_color'].".css";
            }

            /* write static.css file */
			if ( ! $wp_filesystem->put_contents( get_template_directory() . '/assets/css/' . $file, $css, 0644) ) {
				_e( 'Error saving file!', 'semitri' );
			}
        }
    }

    /**
     * scss compile
     *
     * @since 1.0.0
     * @return string
     */
    public function scss_render(){
        /* compile scss to css */
        return $this->scss->compile('@import "master.scss"');
    }

    /**
     * main css
     *
     * @since 1.0.0
     * @return string
     */
    public function css_render()
    {
        global $smof_data, $zo_base;
        ob_start();
        /* Local Fonts */
		$zo_base->setTypographyLocal($smof_data['local-fonts-1'], $smof_data['local-fonts-selector-1']);
        $zo_base->setTypographyLocal($smof_data['local-fonts-2'], $smof_data['local-fonts-selector-2']);
		/* Extra Fonts */
		$zo_base->setGoogleFont($smof_data['google-font-1'], wp_filter_nohtml_kses($smof_data['google-font-selector-1']));
		$zo_base->setGoogleFont($smof_data['google-font-2'], wp_filter_nohtml_kses($smof_data['google-font-selector-2']));
		
		$zo_base->setGoogleFont($smof_data['google-font-1'], '.zo_extra_font1');
	    $zo_base->setGoogleFont($smof_data['google-font-2'], '.zo_extra_font2');
		
		zo_setvariablescss($smof_data['primary_color'],'$primary_color','#fcc403');
		zo_setvariablescss($smof_data['secondary_color'],'$secondary_color','#fcd846');
		
		zo_setvariablescss($smof_data['link_color']['regular'],'$link_color','#333333');
		zo_setvariablescss($smof_data['link_color']['hover'],'$link_color_hover','#fcc403');
        /* ==========================================================================
           Start Header
        ========================================================================== */

        /* Header Main */
        if(!empty($smof_data['bg_header']['rgba'])) {
            echo "#zo-header { background-color:".esc_attr($smof_data['bg_header']['rgba'])."; }";
        }
        /* End Header Main */

        /* Sticky Header */
        if(!empty($smof_data['bg_sticky_header']['rgba'])){
            echo "#zo-header.zo-main-header.header-fixed { background-color:".esc_attr($smof_data['bg_sticky_header']['rgba'])."; }";
        }
        if(!empty($smof_data['sticky_logo_height']['height'])){
            echo "#zo-header.header-fixed #zo-header-logo a img {  max-height: ".esc_attr($smof_data['sticky_logo_height']['height']).";  }";
        }
        /* End Sticky Header */
		
        /* Main Menu */
        echo '@media(min-width: 992px) {';
			if( !empty($smof_data['menu_position']) && $smof_data['menu_position'] == 'right' ) {
				echo ".zo-header-navigation, 
				.zo-header-navigation .main-navigation .menu-main-menu,
				.zo-header-navigation .main-navigation div.nav-menu > ul {
					justify-content: flex-end;
				}";
			}else if( !empty($smof_data['menu_position']) && $smof_data['menu_position'] == 'center' ){
				echo ".zo-header-navigation, 
				.zo-header-navigation .main-navigation .menu-main-menu,
				.zo-header-navigation .main-navigation div.nav-menu > ul {
					text-align: center;
					justify-content: center;
				}";
			}
			if($smof_data['menu_color_first_level']){
				echo ".zo-header-navigation .main-navigation .menu-main-menu > li > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu ul > li > a,
				.zo-header-navigation .main-navigation .menu-main-menu ul > li > .zo-menu-toggle {
					color:".esc_attr($smof_data['menu_color_first_level']).";
				}";
			}
			if($smof_data['menu_color_hover_first_level']){
				echo ".zo-header-navigation .main-navigation .menu-main-menu > li:hover > a,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li:hover > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li:hover > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li:hover > .zo-menu-toggle {
					color:".esc_attr($smof_data['menu_color_hover_first_level']).";
				}";
				echo ".zo-header-navigation .main-navigation .menu-main-menu > li:hover,
				.zo-header-navigation .main-navigation .menu-main-menu >ul > li:hover {
					border-top-color: ".esc_attr($smof_data['menu_color_hover_first_level']).";
				}";
			}
			if($smof_data['menu_color_active_first_level']){
				echo ".zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-item > a,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-ancestor > a,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_item > a,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_ancestor > a
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-item > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current-menu-ancestor > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_item > .zo-menu-toggle,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li.current_page_ancestor > .zo-menu-toggle,{
					color:".esc_attr($smof_data['menu_color_active_first_level']).";
				}";
			}
			if($smof_data['menu_first_level_uppercase']){
				echo ".zo-header-navigation .main-navigation .menu-main-menu > li > a,
				.zo-header-navigation .main-navigation .menu-main-menu > ul > li > a {
					text-transform: uppercase;
				}";
			}
        echo '}';
        /* End Main Menu */

        /* Main Menu Header Fixed Only Page */
        if($smof_data['menu_color_first_level']){
            echo "#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li > a {
				color:".esc_attr($smof_data['menu_color_first_level']).";
			}";
        }
        if($smof_data['menu_color_hover_first_level']){
            echo "#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li > a:hover {
				color:".esc_attr($smof_data['menu_color_hover_first_level']).";
			}";
        }
        if($smof_data['menu_color_active_first_level']){
            echo "#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-item > a,
			#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li.current-menu-ancestor > a,
			#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li.current_page_item > a,
			#zo-header.zo-main-header.header-fixed .zo-header-navigation .main-navigation .menu-main-menu > li.current_page_ancestor > a {
				color:".esc_attr($smof_data['menu_color_active_first_level']).";
			}";
        }
        /* End  Main Menu Header Fixed Only Page */
        /* Sub Menu */
        if(!empty($smof_data['menu_color_sub_level'])){
            echo ".zo-header-navigation .main-navigation .menu-main-menu > li ul li > a,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li > .zo-menu-toggle {
				color:".esc_attr($smof_data['menu_color_sub_level']).";
			}";
        }
        if(!empty($smof_data['menu_color_hover_sub_level'])){
            echo ".zo-header-navigation .main-navigation .menu-main-menu > li ul li:hover > a,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li:hover .zo-menu-toggle,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul a:focus,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-item > a,
			.zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li:hover a,
			.zo-header-navigation .main-navigation .menu-main-menu > ul > li ul a:focus,
			.zo-header-navigation .main-navigation .menu-main-menu > ul > li ul li.current-menu-item > a,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-parent > a,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-parent > .zo-menu-toggle,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-ancestor > a,
			.zo-header-navigation .main-navigation .menu-main-menu > li ul li.current-menu-ancestor > .zo-menu-toggle {
				color:".esc_attr($smof_data['menu_color_hover_sub_level']).";
			}";
        }
        /* End Sub Menu */

        /* ==========================================================================
           End Header
        ========================================================================== */
		
		
        /* ==========================================================================
           Start Footer
        ========================================================================== */
        /* Footer Top */
        if($smof_data['footer_heading_color']){
            echo "#zo-footer-top .wg-title:before {
				background-color:".esc_attr($smof_data['footer_heading_color']).";
			}";
        }
        /* End Footer Top */
		
        return ob_get_clean();
    }
}

new ZoTheme_StaticCss();
