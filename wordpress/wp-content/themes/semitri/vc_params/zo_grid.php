<?php
	$params = array(
		array(
			"type" => "dropdown",
			"heading" => __("Title Size",'semitri'),
			"param_name" => "zo_title_size",
			"value" => array(
					"H2" => "h2",
					"H3" => "h3",
					"H4" => "h4",
					"H5" => "h5",
					"H6" => "h6"
			),
		),
        array(
            "type" => "dropdown",
            "heading" => __("Full Width",'semitri'),
            "param_name" => "zo_full_width",
            "value" => array(
                "Default" => "",
                "No Padding" => "no-padding"
            )
        ),
		array(
			"type" => "dropdown",
			"heading" => esc_html__("Pagination",'bluebird'),
			"param_name" => "zo_pagination",
			"value" => array(
				"Disable" => 0,
				"Enable" => 1,
			)
		)
	);
