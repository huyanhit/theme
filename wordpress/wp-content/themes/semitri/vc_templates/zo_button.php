<?php
	$icon_name = "icon_" . $atts['icon_type'];
	$iconClass = isset($atts[$icon_name])?$atts[$icon_name]:'';
    $button = '';
    echo '<style type="text/css" data-type="zo-button-custom-css">';
    echo '#' . esc_attr($atts['html_id']) . '{';
    echo 'text-align: ' . $atts['align'] . ';';
    echo '}';
    echo '</style>';
?>
<div class="zo-button-wraper <?php echo esc_attr($atts['template']);?>" id="<?php echo esc_attr($atts['html_id']);?>">
    <?php
    if($atts['is_icon']=='yes'){
        if($atts['icon_align']=='left'){
            $atts['text'] = '<i class="' . esc_attr($iconClass) . '"></i>' . $atts['text'];
        }else{
            $atts['text'] .= '<i class="' . esc_attr($iconClass) . '"></i>';
        }
    }
    if ( !empty($atts['link']) && preg_match('/url/',$atts['link'])) {
        $link = zo_build_link( $atts['link'] );
        $button = '<a href="' . esc_attr( $link['url'] ) . '"'
            . ( $link['target'] ? ' target="' . esc_attr( $link['target'] ) . '"' : '' )
            . ( $link['title'] ? ' title="' . esc_attr( $link['title'] ) . '"' : '' )
            . ' class="' . $atts['class'] . '"'
            . '>' . $atts['text'] . '</a>';
    }else{
        $button = '<button'
            . ' class="' . $atts['class'] . '"'
            . '>' . $atts['text'] . '</button>';
    }
    echo $button;
    ?>
</div>
