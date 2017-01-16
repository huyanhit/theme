jQuery(document).ready(function($) {
	$('#navToggle').click(function(event) {
		$('body').toggleClass('menuopen');
		if ($(this).hasClass('menuopen')) {
			$(this).removeClass('menuopen');
			$('.top-menu').removeClass('menuopen');
		}
		else {
			$(this).addClass('menuopen');
			$('.top-menu').addClass('menuopen');
		}
	});

	$('#mobile-menu li.menu-item-has-children').prepend('<span class="caret"></span>');
	$('#mobile-menu li.menu-item-has-children .caret').click(function(event) {
		if ($(this).parent().hasClass('open_drop')) {
			$(this).parent().removeClass('open_drop');
		}
		else {
			$(this).parent().removeClass('open_drop');
			$(this).parent().addClass('open_drop');
		}
	});  
});


jQuery(document).ready(function($) {

	$(".owl-slider").owlCarousel({
	    navigation : false, 
	    slideSpeed : 300,
	    paginationSpeed : 400,
	    singleItem:true,
	    autoplay:true,
	    items : 1, 
	    pagination: true,
    });
    
    $('#ckbCheckAll').click(function () {
        var checked = $(this).is(':checked'); 
        if(checked) {
            $(".form_item .checkbox").prop("checked", true);
        } else {
            $(".form_item .checkbox").prop("checked", false);
        }     

    });
    $('.checkbox-chose-all input').click(function () {
            var checked = $(this).is(':checked'); 
            if(checked) {
                $(".frm_checkbox input").prop("checked", true);
            } else {
                $(".frm_checkbox input").prop("checked", false);
            }     

    }); 
});